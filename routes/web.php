 


<?php
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\MessageExportController;

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
    if ($admin) {
        if (Hash::check($request->password, $admin->password)) {
            Session::put('is_admin', true);
            return redirect('/admin/dashboard');
        } else {
            return back()->with('error', 'Mot de passe incorrect');
        }
    } else {
        return back()->with('error', 'Email inconnu');
    }
});


// Protection admin via closure middleware dans le groupe
Route::group(['prefix' => 'admin', 'middleware' => function ($request, $next) {
    // ...middleware uniquement...
    if (!Session::get('is_admin')) {
        return redirect()->route('admin.login');
    }
    return $next($request);
}], function () {
    // Export PDF/Excel des messages
    Route::get('/messages/export/{format}', [MessageExportController::class, 'export'])->name('admin.messages.export');
    // Dashboard
        Route::get('/dashboard', function () {
        $messages = \App\Models\Message::all();
        $projects = \App\Models\Project::all();
        $products = \App\Models\Product::all();
        return view('admin.dashboard', compact('messages', 'projects', 'products'));
        })->name('admin.dashboard');

    // Messages/Contacts
        Route::get('/contacts', function () {
            $messages = \App\Models\Message::paginate(10);
            $contacts = \App\Models\Contact::all();
            return view('admin.messages', compact('messages', 'contacts'));
        })->name('admin.messages');

    // Projets
    Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects');

    // Produits
    Route::get('/products', function () {
        $products = \App\Models\Product::all();
        return view('admin.products', compact('products'));
    })->name('admin.products');

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
