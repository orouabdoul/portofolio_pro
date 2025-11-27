<nav id="sidebar" class="sidebar col-lg-3 col-xl-2 d-lg-block p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h2 class="fw-bold fs-4 mb-0">Admin Portfolio</h2>
        <button id="closeSidebar" class="btn btn-link text-light d-lg-none fs-4" aria-label="Fermer le menu">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <ul class="nav flex-column mb-4">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-bar me-2"></i> Tableau de bord
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.messages') }}" class="nav-link {{ Request::routeIs('admin.messages*') || Request::routeIs('admin.message*') ? 'active' : '' }}">
                <i class="fas fa-envelope me-2"></i> Messages
                @if(isset($unreadCount) && $unreadCount > 0)
                    <span class="badge bg-danger ms-2">{{ $unreadCount }}</span>
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.projects') }}" class="nav-link {{ Request::routeIs('admin.projects*') ? 'active' : '' }}">
                <i class="fas fa-folder-open me-2"></i> Projets
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.analytics') }}" class="nav-link {{ Request::routeIs('admin.analytics') ? 'active' : '' }}">
                <i class="fas fa-chart-line me-2"></i> Analytics
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.settings') }}" class="nav-link {{ Request::routeIs('admin.settings') ? 'active' : '' }}">
                <i class="fas fa-cog me-2"></i> Paramètres
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.email-setup') }}" class="nav-link {{ Request::routeIs('admin.email-setup') ? 'active' : '' }}">
                <i class="fas fa-envelope-open-text me-2"></i> Config Email
            </a>
        </li>
    </ul>
    <div class="border-top border-light my-3"></div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('portfolio') }}" class="nav-link">
                <i class="fas fa-eye me-2"></i> Voir le site
            </a>
        </li>
    </ul>
    <div class="user-section mt-4">
        <div class="d-flex align-items-center mb-3">
            <div class="user-avatar">A</div>
            <div class="ms-3">
                <div class="fw-medium">{{ $adminDisplayName ?? 'Admin' }}</div>
                <div class="text-light small">Administrateur</div>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <i class="fas fa-sign-out-alt me-2"></i> Déconnexion
            </button>
        </form>
    </div>
</nav>
