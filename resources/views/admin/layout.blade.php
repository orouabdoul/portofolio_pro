
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Portfolio</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 50%, #ede9fe 100%);
            /* allow normal scrolling; removing overflow:hidden which can hide content */
            overflow-x: hidden;
        }
        main {
            height: 100vh;
            overflow-y: auto;
        }
        .sidebar {
            background: linear-gradient(180deg, #312e81 0%, #6366f1 100%);
            color: #fff;
            min-height: 100vh;
            box-shadow: 0 0 40px 0 rgba(49,46,129,0.15);
        }
        .sidebar .nav-link.active {
            background: linear-gradient(90deg, #6366f1 0%, #a78bfa 100%);
            color: #fff;
            font-weight: 600;
        }
        .sidebar .nav-link {
            color: #e0e7ff;
            border-radius: 0.75rem;
            margin-bottom: 0.5rem;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar .nav-link:hover {
            background: #4338ca;
            color: #fff;
        }
        .sidebar .user-section {
            background: rgba(49,46,129,0.7);
            border-radius: 1rem;
            padding: 1rem;
            margin-top: 2rem;
        }
        .sidebar .user-avatar {
            background: linear-gradient(90deg, #a78bfa 0%, #6366f1 100%);
            color: #fff;
            font-weight: bold;
            border-radius: 0.75rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        @media (max-width: 991.98px) {
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                width: 260px;
                z-index: 1050;
                transform: translateX(-100%);
                transition: transform 0.3s cubic-bezier(.4,0,.2,1);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .sidebar-overlay {
                display: block;
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.4);
                z-index: 1040;
            }
        }
        @media (min-width: 992px) {
            .sidebar {
                position: relative;
                transform: none !important;
                /* fixed width for desktop to match Bootstrap columns and avoid wrapping */
                width: 260px;
                flex: 0 0 260px;
            }
            /* ensure main column grows and doesn't wrap below the sidebar */
            main {
                flex: 1 1 auto;
                min-height: 100vh;
            }
            .sidebar-overlay {
                display: none !important;
            }
        }
        .sidebar-overlay {
            display: none;
        }
        .sticky-top {
            top: 0;
            z-index: 1030;
        }
    </style>
</head>
<body>
    <!-- Sidebar Overlay (mobile) -->
    <div id="sidebarOverlay" class="sidebar-overlay"></div>
    <div class="container-fluid p-0">
        <div class="row g-0 flex-nowrap admin-row">
            <!-- Sidebar -->
            @include('admin.partials.sidebar')
            <!-- Main Content -->
            <main class="col-lg-9 col-xl-10">
                <!-- Header -->
                @include('admin.partials.header')
                <div class="container-fluid py-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" id="admin-success-alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <script>
                            setTimeout(function() {
                                var alert = document.getElementById('admin-success-alert');
                                if(alert) {
                                    alert.classList.remove('show');
                                    alert.classList.add('hide');
                                }
                            }, 4000);
                        </script>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="admin-error-alert">
                            <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <script>
                            setTimeout(function() {
                                var alert = document.getElementById('admin-error-alert');
                                if(alert) {
                                    alert.classList.remove('show');
                                    alert.classList.add('hide');
                                }
                            }, 4000);
                        </script>
                    @endif
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar mobile logic
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const openSidebarBtn = document.getElementById('openSidebar');
            const closeSidebarBtn = document.getElementById('closeSidebar');
            function openSidebar() {
                sidebar.classList.add('show');
                sidebarOverlay.style.display = 'block';
                // Le body reste overflow: hidden
            }
            function closeSidebar() {
                sidebar.classList.remove('show');
                sidebarOverlay.style.display = 'none';
                // Le body reste overflow: hidden
            }
            openSidebarBtn?.addEventListener('click', openSidebar);
            closeSidebarBtn?.addEventListener('click', closeSidebar);
            sidebarOverlay?.addEventListener('click', closeSidebar);
            // Close sidebar when clicking a nav link on mobile
            sidebar.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        setTimeout(closeSidebar, 100);
                    }
                });
            });
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992) {
                    closeSidebar();
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
              