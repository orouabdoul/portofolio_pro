@extends('admin.layout')
@section('title', 'Config Email')
@section('content')
<h2 class="mb-4 text-primary">Configuration Email</h2>
<div class="card bg-white shadow-lg rounded-4 mb-4 border border-blue-200">
    <div class="card-body">
        <p class="mb-3 text-gray-700">Configurez l'adresse d'envoi, le serveur SMTP et les notifications de votre portfolio.</p>
        @if(session('success'))
            <div class="alert alert-success mb-3">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mb-3">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.email-setup.update') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label text-blue-700">Adresse d'expédition</label>
                <input type="email" name="from_address" class="form-control border-blue-300" placeholder="exemple@portfolio.com" value="{{ old('from_address', config('mail.from.address')) }}">
            </div>
            <div class="mb-3">
                <label class="form-label text-blue-700">Serveur SMTP</label>
                <input type="text" name="smtp_host" class="form-control border-blue-300" placeholder="smtp.mail.com" value="{{ old('smtp_host', config('mail.mailers.smtp.host')) }}">
            </div>
            <div class="mb-3">
                <label class="form-label text-blue-700">Mot de passe SMTP</label>
                <input type="password" name="smtp_password" class="form-control border-blue-300" placeholder="••••••••" value="{{ old('smtp_password', config('mail.mailers.smtp.password')) }}">
            </div>
            <button type="submit" class="btn btn-primary bg-gradient-to-r from-blue-600 to-purple-600 border-0">Enregistrer</button>
        </form>
    </div>
</div>
@endsection
