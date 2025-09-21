@extends('admin.layout')

@section('title', 'Modifier le Projet: ' . $project->title)

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 mb-4">
                <div class="card-body">
                    <h1 class="h3 fw-bold text-primary mb-3">Modifier le projet : <span class="text-dark">{{ $project->title }}</span></h1>
                    <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title) }}" required>
                                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">Catégorie</label>
                                <input type="text" name="category" id="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $project->category) }}">
                                @error('category')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12">
                                <label for="description" class="form-label">Description complète</label>
                                <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="status" class="form-label">Statut</label>
                                <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                                    <option value="completed" @if(old('status', $project->status)=='completed') selected @endif>Terminé</option>
                                    <option value="in_progress" @if(old('status', $project->status)=='in_progress') selected @endif>En cours</option>
                                    <option value="planned" @if(old('status', $project->status)=='planned') selected @endif>Planifié</option>
                                </select>
                                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="duration" class="form-label">Durée</label>
                                <input type="text" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration', $project->duration) }}">
                                @error('duration')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12">
                                <label for="technologies" class="form-label">Technologies <span class="text-danger">*</span></label>
                                <select name="technologies[]" id="technologies" class="form-select @error('technologies') is-invalid @enderror" multiple required style="height: 180px;">
                                    @php
                                        $techs = ['Laravel','PHP','Vue.js','React','Flutter','Node.js','Python','Django','Bootstrap','Tailwind'];
                                        $selectedTechs = old('technologies', is_array(old('technologies')) ? old('technologies') : explode(',', $project->technologies));
                                    @endphp
                                    @foreach($techs as $tech)
                                        <option value="{{ $tech }}" @if(in_array($tech, $selectedTechs)) selected @endif>{{ $tech }}</option>
                                    @endforeach
                                </select>
                                <small class="text-muted">Utilisez Ctrl ou Maj pour sélectionner plusieurs technologies dans la liste déroulante.</small>
                                @error('technologies')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Image du projet</label>
                                @if($project->image)
                                    <img src="{{ asset('storage/'.$project->image) }}" alt="Image projet" class="project-img-preview mb-2">
                                @endif
                                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="demo_url" class="form-label">URL de démonstration</label>
                                <input type="url" name="demo_url" id="demo_url" class="form-control @error('demo_url') is-invalid @enderror" value="{{ old('demo_url', $project->demo_url) }}">
                                @error('demo_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="github_url" class="form-label">URL GitHub</label>
                                <input type="url" name="github_url" id="github_url" class="form-control @error('github_url') is-invalid @enderror" value="{{ old('github_url', $project->github_url) }}">
                                @error('github_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-check mt-4">
                                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input @error('is_active') is-invalid @enderror" value="1" {{ old('is_active', $project->is_active) ? 'checked' : '' }}>
                                    <label for="is_active" class="form-check-label">Projet actif (visible sur le portfolio)</label>
                                    @error('is_active')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('admin.projects') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-2"></i>Retour</a>
                            <button type="submit" class="btn btn-success"><i class="fas fa-save me-2"></i>Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
