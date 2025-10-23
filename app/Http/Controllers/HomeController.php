<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function redirectPortfolio()
    {
        return redirect('/');
    }

    public function index()
    {
        $projects = \App\Models\Project::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return view('index', compact('projects'));
    }

    // Nouvelle méthode pour filtrer
    public function filterPortfolio(Request $request)
    {
        $category = $request->input('category');
        $query = \App\Models\Project::where('is_active', true)->orderBy('created_at', 'desc');

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
