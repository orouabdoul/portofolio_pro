<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        Contact::create($validated);
        return redirect()->back()->with('success', 'Votre message a bien été envoyé !');
    }

    public function index()
    {
        $messages = \App\Models\Contact::paginate(10);
        $contacts = \App\Models\Contact::all();
        return view('admin.messages.index', compact('messages', 'contacts'));
    }

    public function show($id)
    {
        $message = Contact::findOrFail($id);
        if (!$message->is_read) {
            $message->is_read = true;
            $message->save();
        }
        return view('admin.messages.show', compact('message'));
    }

    public function destroy($id)
    {
        $message = Contact::findOrFail($id);
        $message->delete();
        return redirect()->route('admin.messages')->with('success', 'Message supprimé.');
    }

    public function reply(Request $request, $id)
    {
        $message = Contact::findOrFail($id);
        $request->validate([
            'reply_subject' => 'required|string|max:255',
            'reply_message' => 'required|string|min:10',
        ]);

        $error_message = null;
        $sent_successfully = false;
        try {
            Mail::raw($request->input('reply_message'), function ($mail) use ($message, $request) {
                $mail->to($message->email)
                    ->subject($request->input('reply_subject'));
            });
            $sent_successfully = true;
        } catch (\Exception $e) {
            $error_message = $e->getMessage();
        }

        // Enregistre la réponse dans la base
        \App\Models\Reply::create([
            'contact_id' => $message->id,
            'subject' => $request->input('reply_subject'),
            'message' => $request->input('reply_message'),
            'admin_name' => auth()->user()->name ?? 'Admin',
            'admin_email' => auth()->user()->email ?? 'admin@portfolio.com',
            'sent_successfully' => $sent_successfully,
            'error_message' => $error_message,
        ]);

        if ($sent_successfully) {
            return back()->with('success', 'Réponse envoyée et enregistrée !');
        } else {
            return back()->with('error', 'Erreur lors de l\'envoi : ' . $error_message);
        }
    }
}
