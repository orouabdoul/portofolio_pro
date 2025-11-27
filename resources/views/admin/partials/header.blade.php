<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm py-3 px-4">
    <div class="d-flex align-items-center">
        <button id="openSidebar" class="btn btn-primary d-lg-none me-3" aria-label="Ouvrir le menu">
            <i class="fas fa-bars"></i>
        </button>
        <div>
            <span class="fs-5 fw-bold text-primary">@yield('title', 'Dashboard')</span>
            <span class="d-block text-muted small">Panel d'administration</span>
        </div>
    </div>
    <div class="ms-auto d-flex align-items-center">
        <div class="me-4 text-end d-none d-md-block">
            <div class="fw-medium">{{ now()->format('d/m/Y') }}</div>
            <div class="text-muted small">{{ now()->format('H:i') }}</div>
        </div>
        <div class="user-avatar">A</div>
    </div>
</nav>
