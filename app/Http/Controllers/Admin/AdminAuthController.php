<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        try {
            $admin = Admin::where('email', $request->email)->first();
        } catch (QueryException $e) {
            Log::error('AdminAuthController@login QueryException: ' . $e->getMessage());
            return back()->with('error', 'Problème de base de données. Veuillez réessayer plus tard.');
        } catch (\Exception $e) {
            Log::error('AdminAuthController@login Exception: ' . $e->getMessage());
            return back()->with('error', 'Erreur inconnue. Veuillez réessayer.');
        }

        if ($admin && \Illuminate\Support\Facades\Hash::check($request->password, $admin->password)) {
            Session::put('is_admin', true);
            return redirect('/admin/dashboard');
        }
        return back()->with('error', 'Email ou mot de passe incorrect');
    }

    public function logout()
    {
        Session::forget('is_admin');
        return redirect()->route('admin.login');
    }
}
