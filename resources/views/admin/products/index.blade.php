@extends('admin.layout')

@section('title', 'Gestion des Produits')

@section('content')
<div class="container-fluid py-4">
    <div class="card mb-4 shadow-lg border-0" style="background-color: #6366f1;">
        <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <h1 class="h3 fw-bold text-white mb-2">Gestion des Produits</h1>
                <p class="text-light mb-0">Gérez vos produits : ajoutez, modifiez et organisez votre catalogue.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.products.create') }}" class="btn btn-light text-primary fw-bold shadow-sm"><i class="fas fa-plus me-2"></i>Nouveau Produit</a>
            </div>
        </div>
    </div>
    <div class="card shadow-lg border-0 mb-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 table-bordered table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-nowrap">Produit</th>
                            <th class="text-nowrap">Description</th>
                            <th class="text-nowrap">Catégorie</th>
                            <th class="text-nowrap">Prix</th>
                            <th class="text-nowrap">Date d'ajout</th>
                            <th class="text-nowrap">Statut</th>
                            <th class="text-center text-nowrap">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td style="min-width:120px;max-width:180px;">
                                <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : 'https://via.placeholder.com/80x80?text=Produit' }}" alt="{{ $product->name }}" width="80" height="80" style="object-fit:cover;aspect-ratio:1/1;" class="rounded shadow img-fluid mb-2">
                                <div class="fw-bold text-primary small text-break">{{ $product->name }}</div>
                            </td>
                            <td style="min-width:120px;max-width:220px;">
                                <div class="small text-break">{{ $product->description }}</div>
                            </td>
                            <td style="min-width:120px;max-width:180px;">
                                <span class="fw-bold">
                                    @if(!empty($product->category_name))
                                        {{ $product->category_name }}
                                    @elseif(isset($product->category) && is_object($product->category))
                                        {{ $product->category->name }}
                                    @else
                                        Aucune
                                    @endif
                                </span>
                            </td>
                            <td style="min-width:80px;max-width:120px;">
                                <span class="fw-bold">{{ number_format($product->price, 2, ',', ' ') }} €</span>
                            </td>
                            <td style="min-width:100px;max-width:140px;">{{ $product->created_at->format('d/m/Y') }}</td>

                            <td style="min-width:100px;max-width:140px;">
                                <span class="badge {{ $product->is_active ? 'bg-success' : 'bg-danger' }}">{{ $product->is_active ? 'Actif' : 'Inactif' }}</span>
                            </td>
                            <td class="text-center" style="min-width:120px;max-width:180px;">
                                <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-outline-primary me-1 mt-1" title="Voir"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-info me-1 mt-1" title="Modifier"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce produit ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger mt-1" title="Supprimer"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="fas fa-box-open fa-2x mb-2"></i><br>
                                Aucun produit trouvé.<br>
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary mt-3"><i class="fas fa-plus me-2"></i>Ajouter un produit</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
