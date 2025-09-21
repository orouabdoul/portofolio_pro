@extends('admin.layout')

@section('title', 'Fiche produit')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 mb-4">
        <div class="row g-0">
            <div class="col-md-4 text-center p-4">
                <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : 'https://via.placeholder.com/240x240?text=Produit' }}" alt="{{ $product->name }}" class="img-fluid rounded shadow" style="object-fit:cover;aspect-ratio:1/1;max-width:240px;">
            </div>
            <div class="col-md-8 p-4">
                <h2 class="fw-bold text-primary mb-2">{{ $product->name }}</h2>
                <div class="mb-3">
                    <span class="badge bg-info text-dark">{{ $product->category ?? 'Aucune catégorie' }}</span>
                    <span class="badge {{ $product->is_active ? 'bg-success' : 'bg-danger' }} ms-2">{{ $product->is_active ? 'Actif' : 'Inactif' }}</span>
                </div>
                <p class="mb-3">{{ $product->description }}</p>
                <div class="h4 fw-bold text-success mb-3">{{ number_format($product->price, 2, ',', ' ') }} €</div>
                <div class="text-muted small">Ajouté le {{ $product->created_at->format('d/m/Y') }}</div>
                <div class="mt-4">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-outline-info me-2"><i class="fas fa-edit me-1"></i>Modifier</a>
                    <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left me-1"></i>Retour</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
