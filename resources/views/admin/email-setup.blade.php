@extends('admin.layout')
@section('title', 'Config Email')
@section('content')
<h2 class="mb-4 text-primary">Configuration Email</h2>
<div class="card bg-white shadow-lg rounded-4 mb-4 border border-blue-200">
    <div class="card-body">
        <p class="mb-3 text-gray-700">Configurez l'adresse d'envoi, le serveur SMTP et les notifications de votre portfolio.</p>
        <form>
            <div class="mb-3">
                <label class="form-label text-blue-700">Adresse d'expédition</label>
                <input type="email" class="form-control border-blue-300" placeholder="exemple@portfolio.com">
            </div>
            <div class="mb-3">
                <label class="form-label text-blue-700">Serveur SMTP</label>
                <input type="text" class="form-control border-blue-300" placeholder="smtp.mail.com">
            </div>
            <div class="mb-3">
                <label class="form-label text-blue-700">Mot de passe SMTP</label>
                <input type="password" class="form-control border-blue-300" placeholder="••••••••">
            </div>
            <button class="btn btn-primary bg-gradient-to-r from-blue-600 to-purple-600 border-0">Enregistrer</button>
        </form>
    </div>
</div>
@endsection
