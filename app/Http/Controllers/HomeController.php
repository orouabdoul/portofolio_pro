<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function redirectPortfolio()
    {
        return redirect('/');
    }

    public function index()
    {
        try {
            $projects = \App\Models\Project::where('is_active', true)->orderBy('created_at', 'desc')->get();
        } catch (QueryException $e) {
            // Log and return an empty collection if the projects table is missing or other DB error
            Log::error('HomeController@index QueryException: ' . $e->getMessage());
            $projects = collect();
        } catch (\Exception $e) {
            Log::error('HomeController@index Exception: ' . $e->getMessage());
            $projects = collect();
        }

        return view('index', compact('projects'));
    }

    // Nouvelle méthode pour filtrer
    public function filterPortfolio(Request $request)
    {
        $category = $request->input('category');
        try {
            $query = \App\Models\Project::where('is_active', true)->orderBy('created_at', 'desc');
        } catch (QueryException $e) {
            Log::error('HomeController@filterPortfolio QueryException: ' . $e->getMessage());
            return view('index', ['projects' => collect()]);
        } catch (\Exception $e) {
            Log::error('HomeController@filterPortfolio Exception: ' . $e->getMessage());
            return view('index', ['projects' => collect()]);
        }

        if ($category && $category !== 'Tous') {
            // support either 'category_id' (numeric) or 'category' (name)
            if (is_numeric($category)) {
                $query->where('category_id', (int) $category);
            } else {
                $query->where('category', $category);
            }
        }

        $projects = $query->get();
        return view('index', ['projects' => $projects]);
    }
}
