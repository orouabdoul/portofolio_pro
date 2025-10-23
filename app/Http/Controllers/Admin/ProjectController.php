<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index()
    {
        try {
            $projects = Project::paginate(10);
        } catch (QueryException $e) {
            Log::error('Admin\\ProjectController@index QueryException: ' . $e->getMessage());
            $projects = collect();
        } catch (\Exception $e) {
            Log::error('Admin\\ProjectController@index Exception: ' . $e->getMessage());
            $projects = collect();
        }

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'technologies' => 'required|array',
            'status' => 'nullable|string',
            'duration' => 'nullable|string',
            'is_active' => 'boolean',
            'image' => 'nullable|image|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:10240',
            'demo_url' => 'nullable|url',
            'github_url' => 'nullable|url',
        ]);
        $validated['technologies'] = implode(',', $validated['technologies']);
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('projects/images', 'public');
            unset($validated['image']); // retire le champ image si présent
        }
        // S'assurer qu'on ne passe pas le champ 'image' à la création
        if (isset($validated['image'])) {
            unset($validated['image']);
        }
        try {
            $project = Project::create($validated);
            return redirect()->route('admin.projects')->with('success', 'Projet créé avec succès.');
        } catch (QueryException $e) {
            Log::error('Admin\\ProjectController@store QueryException: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Impossible de créer le projet : problème de base de données.');
        }
    }

    public function edit($id)
    {
        try {
            $project = Project::findOrFail($id);
        } catch (QueryException $e) {
            Log::error('Admin\\ProjectController@edit QueryException: ' . $e->getMessage());
            return redirect()->route('admin.projects')->with('error', 'Projet introuvable ou problème de base de données.');
        }
        return view('admin.projects.edit', compact('project'));
    }

    // ...existing code...
public function update(Request $request, $id)
{
    try {
        $project = Project::findOrFail($id);
    } catch (QueryException $e) {
        Log::error('Admin\\ProjectController@update QueryException (find): ' . $e->getMessage());
        return redirect()->route('admin.projects')->with('error', 'Projet introuvable ou problème de base de données.');
    }
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'category' => 'nullable|string',
        'technologies' => 'required|array',
        'status' => 'nullable|string',
        'duration' => 'nullable|string',
        'is_active' => 'boolean',
        'image' => 'nullable|image|max:2048',
        'demo_url' => 'nullable|url',
        'github_url' => 'nullable|url',
    ]);
    $validated['technologies'] = implode(',', $validated['technologies']);
    if ($request->hasFile('image')) {
        $validated['image_path'] = $request->file('image')->store('projects/images', 'public');
    } else {
        $validated['image_path'] = $project->image_path;
    }
    try {
        $project->update($validated);
        return redirect()->route('admin.projects')->with('success', 'Projet mis à jour.');
    } catch (QueryException $e) {
        Log::error('Admin\\ProjectController@update QueryException (update): ' . $e->getMessage());
        return redirect()->back()->withInput()->with('error', 'Impossible de mettre à jour le projet : problème de base de données.');
    }
}

    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();
            return redirect()->route('admin.projects')->with('success', 'Projet supprimé.');
        } catch (QueryException $e) {
            Log::error('Admin\\ProjectController@destroy QueryException: ' . $e->getMessage());
            return redirect()->route('admin.projects')->with('error', 'Impossible de supprimer le projet : problème de base de données.');
        }
    }

    public function show($id)
    {
        try {
            $project = Project::findOrFail($id);
            if (property_exists($project, 'is_read') && !$project->is_read) {
                $project->is_read = true;
                $project->save();
            }
            return view('admin.projects.show', compact('project'));
        } catch (QueryException $e) {
            Log::error('Admin\\ProjectController@show QueryException: ' . $e->getMessage());
            return redirect()->route('admin.projects')->with('error', 'Projet introuvable ou problème de base de données.');
        }
    }

    public function toggle($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->is_active = !$project->is_active;
            $project->save();
            return redirect()->route('admin.projects')->with('success', 'Statut du projet modifié.');
        } catch (QueryException $e) {
            Log::error('Admin\\ProjectController@toggle QueryException: ' . $e->getMessage());
            return redirect()->route('admin.projects')->with('error', 'Impossible de modifier le statut : problème de base de données.');
        }
    }
}
