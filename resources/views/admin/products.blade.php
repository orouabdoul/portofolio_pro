
@extends('admin.layout')
@section('title', 'Produits')

@push('styles')
<style>
    .product-table th, .product-table td {
        vertical-align: middle;
    }
    .product-table th {
        background: linear-gradient(90deg, #6366f1 0%, #8b5cf6 100%);
        color: #fff;
        border: none;
    }
    .product-table tbody tr {
        background: #f8fafc;
        transition: background 0.2s;
    }
    .product-table tbody tr:hover {
        background: #e0e7ff;
    }
    .btn-gradient {
        background: linear-gradient(90deg, #6366f1 0%, #8b5cf6 100%);
        color: #fff;
        border: none;
        transition: box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(99,102,241,0.08);
    }
    .btn-gradient:hover {
        background: linear-gradient(90deg, #7c3aed 0%, #6366f1 100%);
        box-shadow: 0 4px 16px rgba(99,102,241,0.15);
    }
    .btn-edit {
        background: linear-gradient(90deg, #fbbf24 0%, #f59e42 100%);
        color: #fff;
        border: none;
    }
    .btn-edit:hover {
        background: linear-gradient(90deg, #f59e42 0%, #fbbf24 100%);
    }
    .btn-delete {
        background: linear-gradient(90deg, #ef4444 0%, #a21caf 100%);
        color: #fff;
        border: none;
    }
    .btn-delete:hover {
        background: linear-gradient(90deg, #a21caf 0%, #ef4444 100%);
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-4">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-1">Gestion des produits</h2>
            <p class="text-gray-500">Ajouter, éditer ou supprimer les produits de votre portfolio.</p>
        </div>
        <button class="btn btn-gradient px-5 py-2 rounded-lg shadow-lg mt-4 sm:mt-0">
            <i class="fas fa-plus mr-2"></i> Ajouter un produit
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-primary">
                <tr>
                    <th>Produit</th>
                    <th>Catégorie</th>
                    <th>Prix</th>
                    <th>Statut</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ $product->image_path ? asset($product->image_path) : 'https://via.placeholder.com/64x64/6366f1/a78bfa?text=Produit' }}" class="rounded shadow" alt="{{ $product->title }}" width="48" height="48">
                            <div>
                                <div class="fw-bold text-primary">{{ $product->title }}</div>
                                <div class="text-muted small">{{ $product->short_description }}</div>
                            </div>
                        </div>
                    </td>
                    <td><span class="badge bg-info text-dark">{{ ucfirst($product->category) }}</span></td>
                    <td>{{ $product->price }} €</td>
                    <td>
                        @if($product->is_active)
                            <span class="badge bg-success">Actif</span>
                        @else
                            <span class="badge bg-danger">Inactif</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-outline-primary me-1" title="Voir"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-info me-1" title="Modifier"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.products.delete', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce produit ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Supprimer"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">
                        <i class="fas fa-box-open fa-2x mb-2"></i><br>
                        Aucun produit trouvé.<br>
                        <a href="#" class="btn btn-primary mt-3"><i class="fas fa-plus me-2"></i>Créer un produit</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
