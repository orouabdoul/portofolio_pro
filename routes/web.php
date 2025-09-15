

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

 
 

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

// Afficher le formulaire de login admin
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

// Traiter la connexion admin (email/password)
Route::post('/admin/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    $admin = DB::table('admins')->where('email', $request->email)->first();
    if ($admin && Hash::check($request->password, $admin->password)) {
        Session::put('is_admin', true);
        return redirect('/admin/contacts');
    }
    return back()->with('error', 'Identifiants invalides');
});


// Protection admin via closure middleware dans le groupe
Route::group(['prefix' => 'admin', 'middleware' => function ($request, $next) {
    if (!Session::get('is_admin')) {
        return redirect()->route('admin.login');
    }
    return $next($request);
}], function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Messages/Contacts
    Route::view('/contacts', 'admin.contacts')->name('admin.messages');

    // Projets
    Route::view('/projects', 'admin.projects')->name('admin.projects');

    // Produits
    Route::view('/products', 'admin.products')->name('admin.products');

    // Analytics
    Route::view('/analytics', 'admin.analytics')->name('admin.analytics');

    // Paramètres
    Route::view('/settings', 'admin.settings')->name('admin.settings');

    // Config Email
    Route::view('/email-setup', 'admin.email-setup')->name('admin.email-setup');

    // Détail d'un message (dashboard et contacts)
    Route::get('/messages/{id}', function ($id) {
        return view('admin.message-show');
    })->name('admin.message.show');

    // Actions fictives pour éviter erreurs dans la vue message-show
    Route::post('/messages/{id}/read', function ($id) {
        return back()->with('success', 'Message marqué comme lu (simulation)');
    })->name('admin.messages.read');
    Route::delete('/messages/{id}', function ($id) {
        return redirect()->route('admin.messages')->with('success', 'Message supprimé (simulation)');
    })->name('admin.messages.delete');
    Route::post('/messages/{id}/reply', function ($id) {
        return back()->with('success', 'Réponse envoyée (simulation)');
    })->name('admin.messages.reply');

    // Déconnexion
    Route::post('/logout', function () {
        Session::forget('is_admin');
        return redirect()->route('admin.login');
    })->name('admin.logout');
});

// Lien portfolio public
Route::get('/portfolio', function () { return redirect('/'); })->name('portfolio');
