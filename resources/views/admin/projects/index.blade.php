@extends('admin.layout')

@section('title', 'Gestion des Projets')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="card mb-4 shadow-lg border-0 bg-gradient" style="background:#1E192D ;">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="h3 fw-bold text-white mb-2">Gestion des Projets</h1>
                <p class="text-light mb-0">Gérez vos projets portfolio : créez, modifiez et organisez vos réalisations.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.projects.create') }}" class="btn btn-light text-primary fw-bold shadow-sm"><i class="fas fa-plus me-2"></i>Nouveau Projet</a>
            </div>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="card text-center shadow border-0" style="background: linear-gradient(90deg, #6366f1 0%, #a78bfa 100%);">
                <div class="card-body text-white">
                    <div class="mb-2"><i class="fas fa-project-diagram fa-2x text-white"></i></div>
                    <div class="fw-bold h4 mb-0">{{ $projects->total() ?? 0 }}</div>
                    <div class="text-white">Total</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card text-center shadow border-0" style="background: linear-gradient(90deg, #6366f1 0%, #10b981 100%);">
                <div class="card-body text-white">
                    <div class="mb-2"><i class="fas fa-check-circle fa-2x text-white"></i></div>
                    <div class="fw-bold h4 mb-0">{{ $projects->where('is_active', true)->count() }}</div>
                    <div class="text-white">Actifs</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card text-center shadow border-0" style="background: linear-gradient(90deg, #a78bfa 0%, #f59e42 100%);">
                <div class="card-body text-white">
                    <div class="mb-2"><i class="fas fa-star fa-2x text-white"></i></div>
                    <div class="fw-bold h4 mb-0">{{ $projects->where('status', 'featured')->count() }}</div>
                    <div class="text-white">Vedettes</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="card text-center shadow border-0" style="background: linear-gradient(90deg, #6366f1 0%, #0ea5e9 100%);">
                <div class="card-body text-white">
                    <div class="mb-2"><i class="fas fa-mobile-alt fa-2x text-white"></i></div>
                    <div class="fw-bold h4 mb-0">{{ $projects->where('category', 'mobile')->count() }}</div>
                    <div class="text-white">Mobile</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table des projets -->
    <div class="card shadow-lg border-0 mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>Projet</th>
                            <th>Catégorie</th>
                            <th>Technologies</th>
                            <th>Statut</th>
                            <th>Durée</th>
                            <th>Visibilité</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @php
                                        $imageFullPath = public_path('storage/' . $project->image_path);
                                        $imageUrl = ($project->image_path && file_exists($imageFullPath))
                                            ? asset('storage/' . $project->image_path)
                                            : 'https://via.placeholder.com/64x64/6366f1/a78bfa?text=Projet';
                                    @endphp
                                    <img src="{{ $imageUrl }}" class="rounded shadow" alt="{{ $project->title }}" width="80" height="80" style="object-fit:cover;aspect-ratio:1/1;">
                                    <div>
                                        <div class="fw-bold text-primary">{{ $project->title }}</div>
                                        <div class="text-muted small">{{ $project->short_description }}</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge bg-info text-dark">{{ ucfirst($project->category) }}</span></td>
                            <td>
                                @php
                                    // Normalize technologies to an array whether stored as CSV or JSON/array
                                    if (is_array($project->technologies)) {
                                        $techs = $project->technologies;
                                    } elseif (is_string($project->technologies) && strlen($project->technologies) > 0) {
                                        $techs = array_filter(array_map('trim', explode(',', $project->technologies)));
                                    } else {
                                        $techs = [];
                                    }
                                @endphp
                                @if(count($techs) > 0)
                                    @foreach($techs as $tech)
                                        <span class="badge bg-secondary">{{ trim($tech) }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">Aucune</span>
                                @endif
                            </td>
                            <td>
                                @if($project->status === 'completed')
                                    <span class="badge bg-success">Terminé</span>
                                @elseif($project->status === 'in_progress')
                                    <span class="badge bg-info">En cours</span>
                                @elseif($project->status === 'planned')
                                    <span class="badge bg-warning text-dark">Planifié</span>
                                @elseif($project->status === 'featured')
                                    <span class="badge bg-gradient" style="background: linear-gradient(90deg, #6366f1 0%, #a78bfa 100%); color: #fff;">Vedette</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($project->status) }}</span>
                                @endif
                            </td>
                            <td>{{ $project->duration }}</td>
                            <td>
                                @if($project->is_active)
                                    <span class="badge bg-success">Actif</span>
                                @else
                                    <span class="badge bg-danger">Inactif</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-sm btn-outline-primary me-1" title="Voir"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-outline-info me-1" title="Modifier"><i class="fas fa-edit"></i></a>
                                @if($project->is_active)
                                    <form action="{{ route('admin.projects.toggle', $project) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-warning me-1" title="Désactiver"><i class="fas fa-eye-slash"></i></button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.projects.toggle', $project) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-outline-success me-1" title="Activer"><i class="fas fa-check"></i></button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.projects.delete', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce projet ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                                Aucun projet trouvé.<br>
                                <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mt-3"><i class="fas fa-plus me-2"></i>Créer un projet</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <nav aria-label="Pagination" class="d-flex justify-content-center">
        {{ $projects->links() }}
    </nav>
</div>
@endsection
