<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;

class AnalyticsController extends Controller
{
    public function index()
    {
        $contactsCount = Contact::count();
        $projectsCount = Project::count();


        // Récupère les 6 dernières dates (toutes entités confondues)
        $dates = collect([
            ...Contact::orderBy('created_at','desc')->limit(6)->pluck('created_at')->toArray(),
            ...Project::orderBy('created_at','desc')->limit(6)->pluck('created_at')->toArray(),
        ])->sort()->unique()->take(6)->values();

        // Format labels
        $labels = $dates->map(function($date) {
            return date('d/m/Y H:i', strtotime($date));
        })->toArray();

        // Evolution contacts
        $contactsEvolution = [];
        foreach ($dates as $date) {
            $contactsEvolution[] = Contact::where('created_at', '<=', $date)->count();
        }
        // Evolution projets
        $projectsEvolution = [];
        foreach ($dates as $date) {
            $projectsEvolution[] = Project::where('created_at', '<=', $date)->count();
        }


        return view('admin.analytics', compact(
            'contactsCount',
            'projectsCount',
            'labels',
            'contactsEvolution',
            'projectsEvolution'
        ));
    }
}