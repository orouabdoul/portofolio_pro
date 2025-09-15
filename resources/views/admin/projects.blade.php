@extends('admin.layout')
@section('title', 'Projets')
@section('content')
<h2 class="mb-4 text-info">Gestion des projets</h2>
<div class="card bg-dark text-white shadow-lg rounded-4 mb-4">
    <div class="card-body">
        <p>Ajouter, éditer ou supprimer des projets (à connecter à la base de données).</p>
        <button class="btn btn-info mb-3">Ajouter un projet</button>
        <!-- Exemple de tableau -->
        <table class="table table-dark table-hover rounded-4">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Projet exemple</td>
                    <td>Application mobile e-commerce</td>
                    <td>2025-09-15</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Éditer</button>
                        <button class="btn btn-danger btn-sm">Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
