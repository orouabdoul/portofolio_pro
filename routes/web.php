<?php
use App\Http\Controllers\Admin\MessageController;
// Route pour le formulaire de contact public
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\MessageExportController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

 
 

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

// Afficher le formulaire de login admin
use App\Http\Controllers\Admin\AdminAuthController;
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

// Traiter la connexion admin (email/password)
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');


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
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    // Messages
    Route::get('/messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('admin.messages');
    Route::post('/contact', [\App\Http\Controllers\Admin\MessageController::class, 'store'])->name('contact.submit');
    Route::get('/messages/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'show'])->name('admin.messages.show');
    Route::delete('/messages/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('admin.messages.destroy');

    // Projets
    Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
    Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('admin.projects.show');
    Route::patch('/projects/{project}/toggle', [ProjectController::class, 'toggle'])->name('admin.projects.toggle');

    // Produits
    Route::get('/products', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products');
    Route::get('/products/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('/products/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin.products.show');

    // Analytics
    Route::get('/analytics', [\App\Http\Controllers\Admin\AnalyticsController::class, 'index'])->name('admin.analytics');

    // Paramètres
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('admin.settings');
    Route::post('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');

    // Config Email
    Route::get('/email-setup', [\App\Http\Controllers\Admin\EmailSetupController::class, 'index'])->name('admin.email-setup');
    Route::post('/email-setup', [\App\Http\Controllers\Admin\EmailSetupController::class, 'update'])->name('admin.email-setup.update');

    // Détail d'un message (dashboard et contacts)

    // Actions fictives pour éviter erreurs dans la vue message-show
    Route::post('/messages/{id}/mark-read', [\App\Http\Controllers\Admin\MessageController::class, 'markAsReadAjax'])->name('admin.messages.markRead');
    Route::post('/messages/{id}/reply', [\App\Http\Controllers\Admin\MessageController::class, 'reply'])->name('admin.messages.reply');

    // Déconnexion
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Lien portfolio public
Route::get('/portfolio', [\App\Http\Controllers\HomeController::class, 'redirectPortfolio'])->name('portfolio');
Route::delete('/admin/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('admin.projects.delete');
