<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    public function index()
    {
        // Charger les paramètres depuis la base, le cache ou le fichier
        // Ici, on simule avec un tableau (à adapter selon votre logique)
        $settings = [
            'personal' => [
                'name' => config('settings.personal.name', 'John Doe'),
                'title' => config('settings.personal.title', 'Développeur Full Stack'),
                'email' => config('settings.personal.email', 'john@example.com'),
                'phone' => config('settings.personal.phone', '+33 6 12 34 56 78'),
                'location' => config('settings.personal.location', 'Paris, France'),
                'website' => config('settings.personal.website', 'https://johndoe.dev'),
                'bio' => config('settings.personal.bio', "Passionné par le développement web avec 5+ années d'expérience..."),
            ],
            'social' => [
                'linkedin' => config('settings.social.linkedin', ''),
                'github' => config('settings.social.github', ''),
                'twitter' => config('settings.social.twitter', ''),
                'instagram' => config('settings.social.instagram', ''),
                'youtube' => config('settings.social.youtube', ''),
                'dribbble' => config('settings.social.dribbble', ''),
            ],
            'site' => [
                'title' => config('settings.site.title', 'Mon Portfolio'),
                'lang' => config('settings.site.lang', 'fr'),
                'theme_color' => config('settings.site.theme_color', '#8B5CF6'),
                'google_analytics' => config('settings.site.google_analytics', ''),
                'description' => config('settings.site.description', ''),
                'maintenance_mode' => config('settings.site.maintenance_mode', false),
            ],
        ];
        return view('admin.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        // Valider les données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:30',
            'location' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'bio' => 'nullable|string',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'dribbble' => 'nullable|url',
            'site_title' => 'required|string|max:255',
            'site_lang' => 'required|in:fr,en,es',
            'theme_color' => 'required|string',
            'google_analytics' => 'nullable|string|max:50',
            'site_description' => 'nullable|string',
            'maintenance_mode' => 'nullable|in:0,1',
        ]);

        // Ici, il faudrait sauvegarder les paramètres dans la base, le cache ou le fichier
        // Pour la démo, on ne fait que simuler
        // ...

        // Message de succès
        Session::flash('success', 'Paramètres sauvegardés avec succès !');
        return redirect()->route('admin.settings');
    }
}
