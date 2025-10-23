<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class AnalyticsController extends Controller
{
    public function index()
    {
        $contactsCount = Contact::count();
        try {
            $projectsCount = Project::count();
        } catch (QueryException $e) {
            Log::error('Admin\\AnalyticsController@index QueryException (count): ' . $e->getMessage());
            $projectsCount = 0;
        } catch (\Exception $e) {
            Log::error('Admin\\AnalyticsController@index Exception (count): ' . $e->getMessage());
            $projectsCount = 0;
        }


        // Récupère les 6 dernières dates (toutes entités confondues)
        try {
            $dates = collect([
                ...Contact::orderBy('created_at','desc')->limit(6)->pluck('created_at')->toArray(),
                ...Project::orderBy('created_at','desc')->limit(6)->pluck('created_at')->toArray(),
            ])->sort()->unique()->take(6)->values();
        } catch (QueryException $e) {
            Log::error('Admin\\AnalyticsController@index QueryException (dates): ' . $e->getMessage());
            $dates = collect(Contact::orderBy('created_at','desc')->limit(6)->pluck('created_at')->toArray())->sort()->unique()->take(6)->values();
        } catch (\Exception $e) {
            Log::error('Admin\\AnalyticsController@index Exception (dates): ' . $e->getMessage());
            $dates = collect(Contact::orderBy('created_at','desc')->limit(6)->pluck('created_at')->toArray())->sort()->unique()->take(6)->values();
        }

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
            try {
                $projectsEvolution[] = Project::where('created_at', '<=', $date)->count();
            } catch (QueryException $e) {
                Log::error('Admin\\AnalyticsController@index QueryException (evolution): ' . $e->getMessage());
                $projectsEvolution[] = 0;
            } catch (\Exception $e) {
                Log::error('Admin\\AnalyticsController@index Exception (evolution): ' . $e->getMessage());
                $projectsEvolution[] = 0;
            }
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