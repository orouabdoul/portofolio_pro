@extends('admin.layout')

@section('title', 'Créer un projet')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Créer un projet</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" id="project-form">
                        @csrf
                        <div id="step-1" class="step-section">
                            <h4 class="mb-4 text-primary"><i class="bi bi-flag"></i> 1. Identité du Projet</h4>
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required maxlength="255">
                                @error('title')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Catégorie <span class="text-danger">*</span></label>
                                <select name="category" id="category" class="form-select" required>
                                    <option value="">Sélectionnez...</option>
                                    <option value="mobile" {{ old('category') == 'mobile' ? 'selected' : '' }}>Application Mobile</option>
                                    <option value="web" {{ old('category') == 'web' ? 'selected' : '' }}>Application Web</option>
                                    <option value="ecommerce" {{ old('category') == 'ecommerce' ? 'selected' : '' }}>E-commerce</option>
                                    <option value="design" {{ old('category') == 'design' ? 'selected' : '' }}>Design UI/UX</option>
                                    <option value="api" {{ old('category') == 'api' ? 'selected' : '' }}>API & Backend</option>
                                    <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Autre</option>
                                </select>
                                @error('category')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="duration" class="form-label">Durée</label>
                                <select name="duration" id="duration" class="form-select">
                                    <option value="">Sélectionnez...</option>
                                    <option value="1 semaine" {{ old('duration') == '1 semaine' ? 'selected' : '' }}>1 semaine</option>
                                    <option value="2 semaines" {{ old('duration') == '2 semaines' ? 'selected' : '' }}>2 semaines</option>
                                    <option value="1 mois" {{ old('duration') == '1 mois' ? 'selected' : '' }}>1 mois</option>
                                    <option value="3 mois" {{ old('duration') == '3 mois' ? 'selected' : '' }}>3 mois</option>
                                    <option value="6 mois" {{ old('duration') == '6 mois' ? 'selected' : '' }}>6 mois</option>
                                    <option value="autre" {{ old('duration') == 'autre' ? 'selected' : '' }}>Autre</option>
                                </select>
                                @error('duration')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-primary btn-lg" onclick="showStep(2)">Suivant</button>
                            </div>
                        </div>
                        <div id="step-2" class="step-section d-none">
                            <h4 class="mb-4 text-info"><i class="bi bi-journal-text"></i> 2. Description & Statut</h4>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Statut</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="">Sélectionnez...</option>
                                    <option value="en cours" {{ old('status') == 'en cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="terminé" {{ old('status') == 'terminé' ? 'selected' : '' }}>Terminé</option>
                                    <option value="brouillon" {{ old('status') == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                                </select>
                                @error('status')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active') ? 'checked' : '' }}>
                                <label for="is_active" class="form-check-label">Projet actif</label>
                                @error('is_active')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-4 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary btn-lg" onclick="showStep(1)">Précédent</button>
                                <button type="button" class="btn btn-info btn-lg" onclick="showStep(3)">Suivant</button>
                            </div>
                        </div>
                        <div id="step-3" class="step-section d-none">
                            <h4 class="mb-4 text-success"><i class="bi bi-tools"></i> 3. Technologies & Médias</h4>
                            <div class="mb-3">
                                <label for="technologies" class="form-label">Technologies <span class="text-danger">*</span></label>
                                <select name="technologies[]" id="technologies" class="form-select" multiple required>
                                    <option value="Flutter" {{ (is_array(old('technologies')) && in_array('Flutter', old('technologies'))) ? 'selected' : '' }}>Flutter</option>
                                    <option value="Laravel API" {{ (is_array(old('technologies')) && in_array('Laravel API', old('technologies'))) ? 'selected' : '' }}>Laravel API</option>
                                    <option value="UI/UX Design" {{ (is_array(old('technologies')) && in_array('UI/UX Design', old('technologies'))) ? 'selected' : '' }}>UI/UX Design</option>
                                    <option value="Firebase" {{ (is_array(old('technologies')) && in_array('Firebase', old('technologies'))) ? 'selected' : '' }}>Firebase</option>
                                    <option value="Figma" {{ (is_array(old('technologies')) && in_array('Figma', old('technologies'))) ? 'selected' : '' }}>Figma</option>
                                    <option value="Dart" {{ (is_array(old('technologies')) && in_array('Dart', old('technologies'))) ? 'selected' : '' }}>Dart</option>
                                    <option value="Autre" {{ (is_array(old('technologies')) && in_array('Autre', old('technologies'))) ? 'selected' : '' }}>Autre</option>
                                </select>
                                <small class="text-muted">Ctrl+Click pour sélectionner plusieurs</small>
                                @error('technologies')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image du projet</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                @error('image')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="demo_url" class="form-label">URL de démonstration</label>
                                <input type="url" name="demo_url" id="demo_url" class="form-control" value="{{ old('demo_url') }}" placeholder="https://mon-projet-demo.com">
                                @error('demo_url')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="github_url" class="form-label">URL GitHub</label>
                                <input type="url" name="github_url" id="github_url" class="form-control" value="{{ old('github_url') }}" placeholder="https://github.com/username/repo">
                                @error('github_url')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mt-4 d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary btn-lg" onclick="showStep(2)">Précédent</button>
                                <button type="submit" class="btn btn-success btn-lg">🚀 Créer le projet</button>
                            </div>
                        </div>
                    </form>
                    <script>
                    function showStep(step) {
                        for (let i = 1; i <= 3; i++) {
                            document.getElementById('step-' + i).classList.add('d-none');
                        }
                        document.getElementById('step-' + step).classList.remove('d-none');
                    }
                    showStep(1);
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush
@endsection
