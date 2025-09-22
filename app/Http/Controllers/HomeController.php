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
}
