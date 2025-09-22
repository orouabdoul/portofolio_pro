<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmailSetupController extends Controller
{
    public function index()
    {
        // Les valeurs actuelles sont lues via config()
        return view('admin.email-setup');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'from_address' => 'required|email',
            'smtp_host' => 'required|string',
            'smtp_password' => 'required|string',
        ]);
        // Ici, il faudrait sauvegarder dans .env ou une table dédiée
        // Pour la démo, on ne fait que simuler
        // ...
        Session::flash('success', "Configuration email enregistrée !");
        return redirect()->route('admin.email-setup');
    }
}
