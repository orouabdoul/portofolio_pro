<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $messages = Contact::all();
        try {
            $projects = Project::all();
        } catch (QueryException $e) {
            Log::error('Admin\\DashboardController@index QueryException: ' . $e->getMessage());
            $projects = collect();
        } catch (\Exception $e) {
            Log::error('Admin\\DashboardController@index Exception: ' . $e->getMessage());
            $projects = collect();
        }
    return view('admin.dashboard', compact('messages', 'projects'));
    }
}
