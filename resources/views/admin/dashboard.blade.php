
@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid py-4">
    <!-- Cards Totaux -->
    <div class="row g-4 mb-4">
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card text-white shadow-lg border-0" style="background: linear-gradient(90deg, #6366f1 0%, #a78bfa 100%);">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-envelope-open-text fa-2x"></i>
                    </div>
                    <div>
                        <div class="h3 mb-0 fw-bold">{{ $messages->count() ?? 0 }}</div>
                        <div class="small">Messages reçus</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card text-white shadow-lg border-0" style="background: linear-gradient(90deg, #10b981 0%, #6366f1 100%);">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="fas fa-folder-open fa-2x"></i>
                    </div>
                    <div>
                        <div class="h3 mb-0 fw-bold">{{ $projects->count() ?? 0 }}</div>
                        <div class="small">Projets</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Notifications -->
    <div class="alert alert-warning d-flex align-items-center mb-4" role="alert">
        <i class="fas fa-bell fa-lg me-3 text-warning"></i>
        <div>
            <strong>Alerte sécurité :</strong> N'oubliez pas de vérifier les accès admin et de mettre à jour vos mots de passe régulièrement.
        </div>
    </div>

    <!-- Section tâches à faire -->
    <div class="card mb-4 shadow">
        <div class="card-header bg-primary bg-gradient text-white fw-bold">
            <i class="fas fa-tasks me-2"></i> Tâches à faire
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Répondre aux nouveaux messages</li>
                <li class="list-group-item">Ajouter un nouveau projet au portfolio</li>

                <li class="list-group-item">Vérifier les statistiques de visite</li>
            </ul>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <!-- Graphique d'activité (placeholder) -->
            <div class="card mb-4 shadow">
                <div class="card-header bg-info bg-gradient text-white fw-bold">
                    <i class="fas fa-chart-line me-2"></i> Activité du portfolio
                </div>
                <div class="card-body d-flex align-items-center justify-content-center" style="height: 200px;">
                    <span class="text-info">[Graphique d'activité à intégrer]</span>
                </div>
            </div>

            <!-- Derniers projets (fictifs) -->
            <div class="card mb-4 shadow">
                <div class="card-header bg-success bg-gradient text-white fw-bold">
                    <i class="fas fa-folder-open me-2"></i> Derniers projets
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Site vitrine pour ABC Corp</span>
                        <span class="badge bg-secondary">Livré le 10/09/2025</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>E-commerce MobileX</span>
                        <span class="badge bg-secondary">Livré le 02/09/2025</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Refonte branding Vistronix</span>
                        <span class="badge bg-secondary">Livré le 28/08/2025</span>
                    </li>
                </ul>
                <div class="card-footer text-end">
                    <a href="{{ route('admin.projects') }}" class="btn btn-success">Voir tous les projets</a>
                </div>
            </div>

            <!-- Messages récents -->
            <div class="card shadow">
                <div class="card-header bg-primary bg-gradient text-white fw-bold d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-inbox me-2"></i> Messages récents</span>
                    <a href="{{ route('admin.messages') }}" class="btn btn-outline-light btn-sm">Voir tout <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
                <div class="card-body text-center py-5">
                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                    <h5 class="mb-2">Aucun message</h5>
                    <p class="text-muted">Les nouveaux contacts apparaîtront ici</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Conseils sécurité -->
            <div class="card mb-4 shadow">
                <div class="card-header bg-gradient bg-secondary text-white fw-bold">
                    <i class="fas fa-shield-alt me-2"></i> Conseils sécurité
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Utilisez un mot de passe complexe pour l’accès admin.</li>
                        <li class="list-group-item">Activez la double authentification si possible.</li>
                        <li class="list-group-item">Vérifiez régulièrement les logs d’accès.</li>
                        <li class="list-group-item">Gardez vos logiciels à jour.</li>
                    </ul>
                </div>
            </div>
            <!-- CTA support -->
            <div class="card text-white bg-primary bg-gradient shadow text-center">
                <div class="card-body">
                    <h5 class="fw-bold mb-2">Besoin d’aide ou d’un conseil ?</h5>
                    <p class="mb-3">Contactez le support ou consultez la documentation pour optimiser votre portfolio.</p>
                    <a href="mailto:contact@email.com" class="btn btn-light">Contacter le support</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
