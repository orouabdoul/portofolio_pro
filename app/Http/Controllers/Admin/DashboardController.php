<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $messages = Contact::all();
        $projects = Project::all();
        $products = Product::all();
        return view('admin.dashboard', compact('messages', 'projects', 'products'));
    }
}
