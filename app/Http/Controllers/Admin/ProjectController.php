<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(10);
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
        $project = Project::create($validated);
        return redirect()->route('admin.projects')->with('success', 'Projet créé avec succès.');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    // ...existing code...
public function update(Request $request, $id)
{
    $project = Project::findOrFail($id);
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
    $project->update($validated);
    return redirect()->route('admin.projects')->with('success', 'Projet mis à jour.');
}

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect()->route('admin.projects')->with('success', 'Projet supprimé.');
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        if (property_exists($project, 'is_read') && !$project->is_read) {
            $project->is_read = true;
            $project->save();
        }
        return view('admin.projects.show', compact('project'));
    }

    public function toggle($id)
    {
        $project = Project::findOrFail($id);
        $project->is_active = !$project->is_active;
        $project->save();
        return redirect()->route('admin.projects')->with('success', 'Statut du projet modifié.');
    }
}
