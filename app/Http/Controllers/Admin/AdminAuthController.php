<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

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
        $admin = Admin::where('email', $request->email)->first();
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
