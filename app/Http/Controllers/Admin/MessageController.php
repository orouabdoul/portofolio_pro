<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function markAsRead($id)
    {
        try {
            $message = Contact::findOrFail($id);
            $message->is_read = true;
            $message->save();
            return back()->with('success', 'Message marqué comme lu.');
        } catch (QueryException $e) {
            Log::error('MessageController@markAsRead QueryException: ' . $e->getMessage());
            return back()->with('error', 'Problème de base de données. Veuillez réessayer plus tard.');
        } catch (\Exception $e) {
            Log::error('MessageController@markAsRead Exception: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue.');
        }
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        try {
            if (\App\Models\Contact::where('email', $validated['email'])->exists()) {
                return redirect('/')->with('error', 'Cet email a déjà été utilisé pour envoyer un message.');
            }
            Contact::create($validated);
            return redirect('/')->with('success', 'Votre message a bien été envoyé !');
        } catch (QueryException $e) {
            Log::error('MessageController@store QueryException: ' . $e->getMessage());
            return redirect('/')->with('error', 'Problème de base de données. Veuillez réessayer plus tard.');
        } catch (\Exception $e) {
            Log::error('MessageController@store Exception: ' . $e->getMessage());
            return redirect('/')->with('error', 'Une erreur est survenue.');
        }
    }

    public function index()
    {
        try {
            $messages = \App\Models\Contact::paginate(10);
            $contacts = \App\Models\Contact::all();
        } catch (QueryException $e) {
            Log::error('MessageController@index QueryException: ' . $e->getMessage());
            $messages = collect();
            $contacts = collect();
            return view('admin.messages.index', compact('messages', 'contacts'))->with('error', 'Problème de base de données.');
        } catch (\Exception $e) {
            Log::error('MessageController@index Exception: ' . $e->getMessage());
            $messages = collect();
            $contacts = collect();
        }
        return view('admin.messages.index', compact('messages', 'contacts'));
    }

    public function show($id)
    {
        try {
            $message = Contact::findOrFail($id);
            if (!$message->is_read) {
                $message->is_read = true;
                $message->save();
            }
            return view('admin.messages.show', compact('message'));
        } catch (QueryException $e) {
            Log::error('MessageController@show QueryException: ' . $e->getMessage());
            return redirect()->route('admin.messages')->with('error', 'Problème de base de données. Veuillez réessayer plus tard.');
        } catch (\Exception $e) {
            Log::error('MessageController@show Exception: ' . $e->getMessage());
            return redirect()->route('admin.messages')->with('error', 'Une erreur est survenue.');
        }
    }

    public function destroy($id)
    {
        try {
            $message = Contact::findOrFail($id);
            $message->delete();
            return redirect()->route('admin.messages')->with('success', 'Message supprimé.');
        } catch (QueryException $e) {
            Log::error('MessageController@destroy QueryException: ' . $e->getMessage());
            return redirect()->route('admin.messages')->with('error', 'Problème de base de données. Veuillez réessayer plus tard.');
        } catch (\Exception $e) {
            Log::error('MessageController@destroy Exception: ' . $e->getMessage());
            return redirect()->route('admin.messages')->with('error', 'Une erreur est survenue.');
        }
    }

    public function reply(Request $request, $id)
    {
        try {
            $message = Contact::findOrFail($id);
        } catch (QueryException $e) {
            Log::error('MessageController@reply QueryException (find): ' . $e->getMessage());
            return back()->with('error', 'Problème de base de données. Veuillez réessayer plus tard.');
        } catch (\Exception $e) {
            Log::error('MessageController@reply Exception (find): ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue.');
        }
        $request->validate([
            'reply_subject' => 'required|string|max:255',
            'reply_message' => 'required|string|min:10',
        ]);

        $error_message = null;
        $sent_successfully = false;
        $whatsapp_link = "\n\nEnvoyez un message à Vistronix Business sur WhatsApp. https://wa.me/22959000892";
        $full_reply = $request->input('reply_message') . $whatsapp_link;
        try {
            Mail::raw($full_reply, function ($mail) use ($message, $request) {
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
            'message' => $full_reply,
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
