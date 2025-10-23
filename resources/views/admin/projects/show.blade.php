@extends('admin.layout')

@section('title', 'Projet : ' . $project->title)

@push('styles')
<!-- Bootstrap 5 is assumed loaded in layout -->
<style>
    .project-img {
        border-radius: 1rem;
        box-shadow: 0 4px 24px rgba(60,60,120,0.07);
    }
</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="card shadow-lg border-0 mb-4">
                <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                    <div>
                        <h1 class="h2 fw-bold text-primary mb-2">Projet : <span class="text-dark">{{ $project->title }}</span></h1>
                        @if($project->short_description)
                            <p class="text-muted mb-0">{{ $project->short_description }}</p>
                        @endif
                    </div>
                    <div class="mt-3 mt-md-0 d-flex align-items-center gap-2">
                        @if($project->is_featured)
                            <span class="badge bg-warning text-dark me-2"><i class="fas fa-star me-1"></i>Projet Vedette</span>
                        @endif
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit me-1"></i>Modifier</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card shadow-sm border-0 mb-4">
                <img src="{{ $project->image_path ? asset('storage/' . $project->image_path) : 'https://via.placeholder.com/600x400?text=Projet' }}" alt="{{ $project->title }}" class="card-img-top project-img img-fluid" style="max-width:400px;height:auto;display:block;margin:auto;">
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title text-secondary mb-3"><i class="fas fa-file-alt me-2"></i>Description du projet</h5>
                    <div class="text-dark">{!! nl2br(e($project->full_description ?? $project->description ?? '')) !!}</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title text-secondary mb-3"><i class="fas fa-info-circle me-2"></i>Informations</h5>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item"><strong>Catégorie :</strong> <span class="badge bg-info text-dark ms-2">{{ ucfirst($project->category) }}</span></li>
                        <li class="list-group-item"><strong>Statut :</strong> <span class="badge bg-success ms-2">{{ $project->status === 'completed' ? 'Terminé' : ($project->status === 'in_progress' ? 'En cours' : ($project->status === 'planned' ? 'Planifié' : ucfirst($project->status))) }}</span></li>
                        <li class="list-group-item"><strong>Visibilité :</strong> <span class="badge {{ $project->is_active ? 'bg-success' : 'bg-danger' }} ms-2">{{ $project->is_active ? 'Actif' : 'Inactif' }}</span></li>
                        <li class="list-group-item"><strong>Durée :</strong> <span class="ms-2">{{ $project->duration }}</span></li>
                        @if($project->client_type)
                        <li class="list-group-item"><strong>Type de client :</strong> <span class="ms-2">{{ ucfirst($project->client_type) }}</span></li>
                        @endif
                        <li class="list-group-item"><strong>Créé le :</strong> <span class="ms-2">{{ $project->created_at->format('d/m/Y à H:i') }}</span></li>
                        <li class="list-group-item"><strong>Modifié le :</strong> <span class="ms-2">{{ $project->updated_at->format('d/m/Y à H:i') }}</span></li>
                    </ul>
                </div>
            </div>
        </div>

        @if($project->technologies)
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title text-secondary mb-3"><i class="fas fa-code me-2"></i>Technologies</h5>
                    @php
                        // Normalize technologies: if string, split by commas; if array, use as-is; otherwise empty array
                        if (is_array($project->technologies)) {
                            $technologies = $project->technologies;
                        } elseif (is_string($project->technologies) && strlen($project->technologies) > 0) {
                            $technologies = array_filter(array_map('trim', explode(',', $project->technologies)));
                        } else {
                            $technologies = [];
                        }
                    @endphp
                    @foreach($technologies as $tech)
                        <span class="badge bg-gradient bg-primary text-light me-2 mb-2"><i class="fas fa-hashtag me-1"></i>{{ $tech }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title text-secondary mb-3"><i class="fas fa-link me-2"></i>Liens & Actions</h5>
                    <div class="mb-3">
                        @if($project->demo_url)
                            <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-outline-primary btn-sm me-2 mb-2"><i class="fas fa-external-link-alt me-1"></i>Voir la démonstration</a>
                        @endif
                        @if($project->github_url)
                            <a href="{{ $project->github_url }}" target="_blank" class="btn btn-outline-dark btn-sm me-2 mb-2"><i class="fab fa-github me-1"></i>Voir le code source</a>
                        @endif
                        @if(!$project->demo_url && !$project->github_url)
                            <div class="text-center text-muted py-3">
                                <div style="font-size:2rem;"><i class="fas fa-link"></i></div>
                                <div>Aucun lien disponible</div>
                                <div class="small">Les liens peuvent être ajoutés lors de la modification</div>
                            </div>
                        @endif
                    </div>
                    <a href="{{ route('admin.projects') }}" class="btn btn-primary w-100"><i class="fas fa-arrow-left me-2"></i>Retour aux projets</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection