@extends('admin.layout')

@section('title', 'Gestion des Produits')

@section('content')
<div class="container-fluid py-4">
    <div class="card mb-4 shadow-lg border-0 bg-gradient" style="background: linear-gradient(90deg, #6366f1 0%, #a78bfa 100%);">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="h3 fw-bold text-white mb-2">Gestion des Produits</h1>
                <p class="text-light mb-0">Gérez vos produits : ajoutez, modifiez et organisez votre catalogue.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="#" class="btn btn-light text-primary fw-bold shadow-sm"><i class="fas fa-plus me-2"></i>Nouveau Produit</a>
            </div>
        </div>
    </div>
    <div class="card shadow-lg border-0 mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary">
                        <tr>
                            <th>Produit</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Date d'ajout</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="fw-bold text-primary">Produit exemple</div>
                            </td>
                            <td>Exemple de description produit</td>
                            <td>99.99 €</td>
                            <td>17/09/2025</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary me-1" title="Voir"><i class="fas fa-eye"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-info me-1" title="Modifier"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fas fa-box-open fa-2x mb-2"></i><br>
                                Aucun produit trouvé.<br>
                                <a href="#" class="btn btn-primary mt-3"><i class="fas fa-plus me-2"></i>Ajouter un produit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
