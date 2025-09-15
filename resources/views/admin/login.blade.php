<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body { background: #18142A; }
        .login-box { max-width: 400px; margin: 80px auto; background: #0D091C; border-radius: 18px; box-shadow: 0 8px 32px rgba(15,237,211,0.08); padding: 2.5rem 2rem; }
        .login-title { color: #0FEDD3; font-weight: bold; margin-bottom: 1.5rem; text-align: center; }
        .form-control { background: #23203a; color: #fff; border: none; border-radius: 8px; }
        .form-control:focus { border-color: #0FEDD3; box-shadow: 0 0 0 2px #0FEDD3; }
        .btn-info { background: #0FEDD3; color: #18142A; font-weight: bold; border-radius: 8px; }
        .btn-info:hover { background: #0dcab7; }
        .text-danger { font-size: 0.98rem; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 class="login-title"><i class="bi bi-person-circle me-2"></i>Connexion Admin</h2>
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-info w-100">Se connecter</button>
        </form>
    </div>
</body>
</html>
