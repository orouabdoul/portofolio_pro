@extends('admin.layout')
@section('title', 'Contacts')
@section('content')
<h2 class="mb-4 text-info">Gestion des contacts</h2>
<div class="card bg-dark text-white shadow-lg rounded-4">
    <div class="card-body">
        <p>Liste des messages de contact (à connecter à la base de données).</p>
        <!-- Exemple de tableau -->
        <table class="table table-dark table-hover rounded-4">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Exemple Nom</td>
                    <td>exemple@email.com</td>
                    <td>Bonjour, j'ai une question...</td>
                    <td>2025-09-15</td>
                    <td><button class="btn btn-danger btn-sm">Supprimer</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
