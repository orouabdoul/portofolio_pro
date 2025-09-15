@extends('admin.layout')
@section('title', 'Analyse')
@section('content')
<h2 class="mb-4 text-info">Tableau de bord - Analyse</h2>
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card bg-dark text-white shadow-lg rounded-4">
            <div class="card-body text-center">
                <h5 class="card-title">Contacts</h5>
                <p class="display-6 fw-bold text-info">12</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-dark text-white shadow-lg rounded-4">
            <div class="card-body text-center">
                <h5 class="card-title">Projets</h5>
                <p class="display-6 fw-bold text-info">7</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-dark text-white shadow-lg rounded-4">
            <div class="card-body text-center">
                <h5 class="card-title">Produits</h5>
                <p class="display-6 fw-bold text-info">5</p>
            </div>
        </div>
    </div>
</div>
<div class="card bg-dark text-white shadow-lg rounded-4">
    <div class="card-body">
        <p>Graphiques et analyses à intégrer (ex : courbes d’évolution, stats avancées…)</p>
    </div>
</div>
@endsection
