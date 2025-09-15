
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
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-1">Gestion des produits</h2>
            <p class="text-gray-500">Ajouter, éditer ou supprimer les produits de votre portfolio.</p>
        </div>
        <button class="btn btn-gradient px-5 py-2 rounded-lg shadow-lg mt-4 sm:mt-0">
            <i class="fas fa-plus mr-2"></i> Ajouter un produit
        </button>
    </div>

    <div class="overflow-x-auto">
        <table class="product-table min-w-full rounded-xl overflow-hidden shadow-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nom</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Description</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Prix</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-6 py-4 font-medium text-gray-900">Produit exemple</td>
                    <td class="px-6 py-4 text-gray-700">Accessoire mobile</td>
                    <td class="px-6 py-4 text-blue-700 font-semibold">29,99 €</td>
                    <td class="px-6 py-4 text-center">
                        <button class="btn btn-edit btn-sm rounded-lg px-3 py-1 mr-2"><i class="fas fa-edit mr-1"></i>Éditer</button>
                        <button class="btn btn-delete btn-sm rounded-lg px-3 py-1"><i class="fas fa-trash-alt mr-1"></i>Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
