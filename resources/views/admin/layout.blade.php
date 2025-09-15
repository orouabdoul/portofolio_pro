<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Admin - Portfolio</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
    
    <style>
        <div class="min-h-screen flex">
            <!-- Sidebar minimal -->
            <aside class="w-64 bg-gray-900 text-white flex flex-col p-4">
                <h2 class="text-xl font-bold mb-6">Admin</h2>
                <nav class="flex-1 space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Dashboard</a>
                    <a href="{{ route('admin.messages') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Messages</a>
                    <a href="{{ route('admin.projects') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Projets</a>
                    <a href="{{ route('admin.settings') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Paramètres</a>
                    <a href="{{ route('portfolio') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Voir le site</a>
                </nav>
                <form action="{{ route('admin.logout') }}" method="POST" class="mt-6">
                    @csrf
                    <button type="submit" class="w-full py-2 px-3 rounded bg-red-600 hover:bg-red-700">Déconnexion</button>
                </form>
            </aside>
            <!-- Main content -->
            <main class="flex-1 p-8 bg-gray-50">
                @yield('content')
            </main>
        </div>
            .mobile-title {
                font-size: 1.2rem;
            }
            
            .mobile-subtitle {
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 min-h-screen">
    
    <!-- Mobile Overlay -->
    <div id="sidebar-overlay" class="sidebar-overlay fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm lg:hidden"></div>
    
    <div class="flex h-screen relative">
        <!-- Mobile/Desktop Sidebar -->
        <aside id="sidebar" class="sidebar fixed lg:relative top-0 left-0 w-72 h-full bg-gradient-to-b from-gray-900 via-gray-800 to-gray-900 text-white shadow-2xl">
            <!-- Sidebar Header -->
            <div class="p-6 border-b border-gray-700/50 bg-gradient-to-r from-purple-900/50 to-blue-900/50">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold bg-gradient-to-r from-white to-blue-200 bg-clip-text text-transparent">
                            Admin Portfolio
                        </h2>
                        <p class="text-xs text-gray-400 mt-1">Panel d'administration</p>
                    </div>
                    <button id="close-sidebar" class="lg:hidden text-gray-400 hover:text-white transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="mt-6 px-3">
                <div class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" 
                       class="nav-item flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-300 {{ Request::routeIs('admin.dashboard') ? 'active text-white' : 'hover:bg-gray-700/50' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-r from-blue-500 to-purple-600 mr-3 shadow-lg">
                            <i class="fas fa-chart-bar text-sm"></i>
                        </div>
                        <span class="font-medium">Tableau de bord</span>
                    </a>
                    
                    <a href="{{ route('admin.messages') }}" 
                       class="nav-item flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-300 {{ Request::routeIs('admin.messages*') || Request::routeIs('admin.message*') ? 'active text-white' : 'hover:bg-gray-700/50' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-r from-green-500 to-emerald-600 mr-3 shadow-lg">
                            <i class="fas fa-envelope text-sm"></i>
                        </div>
                        <span class="font-medium">Messages</span>
                        @if(isset($unreadCount) && $unreadCount > 0)
                            <span class="badge ml-auto bg-red-500 text-white rounded-full px-2 py-1 text-xs font-bold shadow-lg">{{ $unreadCount }}</span>
                        @endif
                    </a>
                    
                    <a href="{{ route('admin.projects') }}" 
                       class="nav-item flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-300 {{ Request::routeIs('admin.projects*') ? 'active text-white' : 'hover:bg-gray-700/50' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-r from-yellow-500 to-orange-600 mr-3 shadow-lg">
                            <i class="fas fa-folder-open text-sm"></i>
                        </div>
                        <span class="font-medium">Projets</span>
                    </a>
                    
                    <a href="{{ route('admin.analytics') }}" 
                       class="nav-item flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-300 {{ Request::routeIs('admin.analytics') ? 'active text-white' : 'hover:bg-gray-700/50' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-r from-pink-500 to-red-600 mr-3 shadow-lg">
                            <i class="fas fa-chart-line text-sm"></i>
                        </div>
                        <span class="font-medium">Analytics</span>
                    </a>
                    
                    <a href="{{ route('admin.settings') }}" 
                       class="nav-item flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-300 {{ Request::routeIs('admin.settings') ? 'active text-white' : 'hover:bg-gray-700/50' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-r from-indigo-500 to-purple-600 mr-3 shadow-lg">
                            <i class="fas fa-cog text-sm"></i>
                        </div>
                        <span class="font-medium">Paramètres</span>
                    </a>
                    
                    <a href="{{ route('admin.email-setup') }}" 
                       class="nav-item flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-300 {{ Request::routeIs('admin.email-setup') ? 'active text-white' : 'hover:bg-gray-700/50' }}">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-r from-cyan-500 to-blue-600 mr-3 shadow-lg">
                            <i class="fas fa-envelope-open-text text-sm"></i>
                        </div>
                        <span class="font-medium">Config Email</span>
                    </a>
                </div>
                
                <!-- Separator -->
                <div class="border-t border-gray-700/50 my-6"></div>
                
                <!-- Secondary Navigation -->
                <div class="space-y-2">
                    <a href="{{ route('portfolio') }}" 
                       class="nav-item flex items-center px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-300 hover:bg-gray-700/50">
                        <div class="flex items-center justify-center w-10 h-10 rounded-lg bg-gradient-to-r from-teal-500 to-green-600 mr-3 shadow-lg">
                            <i class="fas fa-eye text-sm"></i>
                        </div>
                        <span class="font-medium">Voir le site</span>
                    </a>
                </div>
            </nav>
            
            <!-- User Section -->
            <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-gray-900 to-transparent">
                <div class="bg-gray-800/50 backdrop-blur-sm rounded-xl p-4 border border-gray-700/50">
                    <div class="flex items-center mb-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                            A
                        </div>
                        <div class="ml-3">
                            <p class="text-white font-medium text-sm">Admin</p>
                            <p class="text-gray-400 text-xs">Administrateur</p>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-300 text-sm font-medium shadow-lg">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Déconnexion
                        </button>
                    </form>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col min-h-screen lg:ml-0">
            <!-- Top Header -->
            <header class="glass-effect shadow-lg border-b border-gray-200/50 sticky top-0 z-30">
                <div class="flex items-center justify-between px-4 sm:px-6 py-4">
                    <div class="flex items-center">
                        <button id="mobile-menu-btn" class="mobile-menu-btn lg:hidden mr-4 p-2 rounded-xl bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg hover:shadow-xl transition-all duration-300">
                            <i class="fas fa-bars text-lg"></i>
                        </button>
                        <div>
                            <h1 class="mobile-title text-xl sm:text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">
                                @yield('title', 'Dashboard')
                            </h1>
                            <p class="mobile-subtitle text-xs sm:text-sm text-gray-600 mt-1">Panel d'administration</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <div class="hidden sm:block text-right">
                            <div class="text-sm font-medium text-gray-900">{{ now()->format('d/m/Y') }}</div>
                            <div class="text-xs text-gray-500">{{ now()->format('H:i') }}</div>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center text-white font-bold shadow-lg">
                            A
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 p-4 sm:p-6 lg:p-8">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="glass-effect border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-6 shadow-lg">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-green-600"></i>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="glass-effect border border-red-200 text-red-800 px-6 py-4 rounded-xl mb-6 shadow-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-3 text-red-600"></i>
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JavaScript for Mobile Menu -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const closeSidebarBtn = document.getElementById('close-sidebar');
            
            // Open sidebar
            mobileMenuBtn?.addEventListener('click', function() {
                sidebar.classList.add('active');
                sidebarOverlay.classList.add('active');
                mobileMenuBtn.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent scroll
            });
            
            // Close sidebar
            function closeSidebar() {
                sidebar.classList.remove('active');
                sidebarOverlay.classList.remove('active');
                mobileMenuBtn.classList.remove('active');
                document.body.style.overflow = ''; // Restore scroll
            }
            
            closeSidebarBtn?.addEventListener('click', closeSidebar);
            sidebarOverlay?.addEventListener('click', closeSidebar);
            
            // Close sidebar when clicking a nav link on mobile
            const navLinks = sidebar.querySelectorAll('a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 1024) {
                        setTimeout(closeSidebar, 100);
                    }
                });
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    mobileMenuBtn.classList.remove('active');
                    document.body.style.overflow = '';
                }
            });
            
            // Auto-hide flash messages with enhanced animation
            setTimeout(() => {
                const alerts = document.querySelectorAll('.glass-effect');
                alerts.forEach(alert => {
                    if (alert.textContent.includes('succès') || alert.textContent.includes('erreur')) {
                        alert.style.transition = 'all 0.5s ease-out';
                        alert.style.transform = 'translateY(-10px)';
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 500);
                    }
                });
            }, 5000);
            
            // Add smooth animations to navigation items
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach((item, index) => {
                item.style.animationDelay = `${index * 0.1}s`;
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(5px)';
                });
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });
            
            // Enhanced visual feedback for interactions
            const interactiveElements = document.querySelectorAll('button, a, .nav-item');
            interactiveElements.forEach(element => {
                element.addEventListener('click', function(e) {
                    // Create ripple effect
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.className = 'ripple';
                    
                    this.style.position = 'relative';
                    this.style.overflow = 'hidden';
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
        
        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: scale(0);
                animation: ripple-animation 0.6s ease-out;
                pointer-events: none;
            }
            
            @keyframes ripple-animation {
                to {
                    transform: scale(2);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
    
    @stack('scripts')
</body>
</html>
