<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS doit être chargé AVANT les styles personnalisés pour permettre la surcharge -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-responsive.css') }}">
    <!-- FontAwesome 5.15.4 pour les icônes fab/fa-* et fas/fa-* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <header>
        @include('partials.header')
    </header>

    <div id="home">
        @include('partials.hero')
    </div>

    <div id="about">
        @include('partials.about')
    </div>

    <div id="skills">
        @include('partials.skills')
    </div>

    <div id="education">
        @include('partials.education')
    </div>

    @include('partials.why')

    <div id="services">
        @include('partials.services')
    </div>

    @include('partials.process')

    <div id="portfolio">
        @include('partials.projects')
    </div>

    @include('partials.testimonials')

    @include('partials.faq')

    <div id="contact">
        @include('partials.contact')
    </div>

</body>
@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>