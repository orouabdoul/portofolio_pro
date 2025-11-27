<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contact;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share common admin view data (unread messages, admin display name)
        View::composer('admin.*', function ($view) {
            try {
                $unreadCount = Contact::where('is_read', false)->count();
            } catch (\Exception $e) {
                $unreadCount = 0;
            }
            $view->with('unreadCount', $unreadCount)->with('adminDisplayName', 'Admin');
        });
    }
}
