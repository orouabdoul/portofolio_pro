@extends('admin.layout')

@section('title', 'Détails du Projet - ' . $project->title)

@push('styles')
<style>
    .glass-effect {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .floating-back-btn {
        animation: float 3s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
    }
    
    .project-hero {
        background: linear-gradient(135deg, rgba(139, 69, 19, 0.1), rgba(255, 255, 255, 0.9));
    }
    
    @media (max-width: 768px) {
        .mobile-hidden {
            display: none;
        }
        
        .mobile-stack {
            display: block;
        }
    }
    
    @media (min-width: 769px) {
        .mobile-stack {
            display: grid;
        }
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        
        <!-- Header Hero avec breadcrumb -->
        <div class="project-hero glass-effect rounded-2xl p-6 sm:p-8 mb-8 shadow-xl">
            <!-- Breadcrumb moderne -->
            <nav class="flex mb-6" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.projects') }}" 
                           class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-purple-600 transition-colors">
                            <i class="fas fa-project-diagram mr-2 text-purple-600"></i>
                            Projets
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right w-4 h-4 text-gray-400 mx-2"></i>
                            <span class="text-sm font-medium text-gray-500 truncate max-w-[200px] sm:max-w-none">
                                {{ $project->title }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
            
            <!-- Titre et actions -->
            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">
                <div class="flex-1 min-w-0">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-4">
                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">
                            {{ $project->title }}
                        </h1>
                        @if($project->is_featured)
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-bold bg-yellow-100 text-yellow-800 shadow-lg">
                                <i class="fas fa-star mr-2"></i>
                                Projet Vedette
                            </span>
                        @endif
                    </div>
                    
                    <p class="text-gray-600 text-lg leading-relaxed">
                        {{ $project->short_description }}
                    </p>
                </div>
                
                <!-- Actions responsive -->
                <div class="flex flex-col sm:flex-row gap-3 lg:min-w-0">
                    <a href="{{ route('admin.projects.edit', $project) }}" 
                       class="bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-6 py-3 rounded-xl hover:from-blue-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-edit mr-2"></i>
                        <span class="hidden sm:inline">Modifier le projet</span>
                        <span class="sm:hidden">Modifier</span>
                    </a>
                    
                    @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" 
                           class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            <span class="hidden sm:inline">Voir la démo</span>
                            <span class="sm:hidden">Démo</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Contenu principal responsive -->
        <div class="mobile-stack lg:grid lg:grid-cols-3 gap-8">
            <!-- Colonne principale -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Image du projet -->
                @if($project->image_path)
                <div class="glass-effect rounded-2xl overflow-hidden shadow-xl">
                    <div class="aspect-video bg-gradient-to-br from-purple-100 to-pink-100">
                        <img class="w-full h-full object-cover" 
                             src="{{ asset($project->image_path) }}" 
                             alt="{{ $project->title }}"
                             loading="lazy">
                    </div>
                </div>
                @endif

                <!-- Description complète -->
                <div class="glass-effect rounded-2xl p-6 sm:p-8 shadow-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-file-alt text-white text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 ml-4">Description du projet</h2>
                    </div>
                    <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                        {!! nl2br(e($project->full_description)) !!}
                    </div>
                </div>

                <!-- Fonctionnalités -->
                @if($project->features)
                <div class="glass-effect rounded-2xl p-6 sm:p-8 shadow-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-list-check text-white text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 ml-4">Fonctionnalités principales</h2>
                    </div>
                    <div class="prose prose-lg max-w-none">
                        @if(is_array($project->features))
                            <ul class="space-y-3">
                                @foreach($project->features as $feature)
                                    <li class="flex items-start">
                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-3 flex-shrink-0"></i>
                                        <span class="text-gray-700">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <div class="text-gray-700 leading-relaxed">
                                {!! nl2br(e($project->features)) !!}
                            </div>
                        @endif
                    </div>
                </div>
                @endif

                <!-- Métriques de performance -->
                @if($project->metrics && is_array($project->metrics) && count($project->metrics) > 0)
                <div class="glass-effect rounded-2xl p-6 sm:p-8 shadow-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-chart-line text-white text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 ml-4">Métriques de performance</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach($project->metrics as $metric => $value)
                        <div class="bg-gradient-to-br from-white to-gray-50 border border-gray-200 rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                            <dt class="text-sm font-medium text-gray-600 uppercase tracking-wider">
                                {{ ucfirst(str_replace('_', ' ', $metric)) }}
                            </dt>
                            <dd class="mt-2 text-3xl font-bold text-gray-900">{{ $value }}</dd>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Sidebar responsive -->
            <div class="space-y-6 mt-8 lg:mt-0">
                <!-- Informations générales -->
                <div class="glass-effect rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-info-circle text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 ml-3">Informations</h3>
                    </div>
                    <dl class="space-y-4">
                        <div class="flex flex-col sm:flex-row sm:justify-between lg:flex-col lg:justify-start">
                            <dt class="text-sm font-medium text-gray-600 mb-1">Catégorie</dt>
                            <dd>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold shadow-sm
                                    @if($project->category === 'mobile') bg-blue-100 text-blue-800
                                    @elseif($project->category === 'ecommerce') bg-green-100 text-green-800
                                    @elseif($project->category === 'design') bg-purple-100 text-purple-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    <i class="fas fa-tag mr-2"></i>
                                    {{ ucfirst($project->category) }}
                                </span>
                            </dd>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:justify-between lg:flex-col lg:justify-start">
                            <dt class="text-sm font-medium text-gray-600 mb-1">Statut</dt>
                            <dd>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold shadow-sm
                                    @if($project->status === 'completed') bg-green-100 text-green-800
                                    @elseif($project->status === 'in_progress') bg-blue-100 text-blue-800
                                    @elseif($project->status === 'planned') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    <i class="fas fa-flag mr-2"></i>
                                    @if($project->status === 'completed') Terminé
                                    @elseif($project->status === 'in_progress') En cours
                                    @elseif($project->status === 'planned') Planifié
                                    @else {{ ucfirst($project->status) }} @endif
                                </span>
                            </dd>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:justify-between lg:flex-col lg:justify-start">
                            <dt class="text-sm font-medium text-gray-600 mb-1">Visibilité</dt>
                            <dd>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold shadow-sm
                                    @if($project->is_active) bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                    <i class="fas fa-{{ $project->is_active ? 'eye' : 'eye-slash' }} mr-2"></i>
                                    {{ $project->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                            </dd>
                        </div>

                        <div class="flex flex-col sm:flex-row sm:justify-between lg:flex-col lg:justify-start">
                            <dt class="text-sm font-medium text-gray-600 mb-1">Durée</dt>
                            <dd class="text-sm font-semibold text-gray-900">
                                <i class="fas fa-clock mr-2 text-blue-600"></i>{{ $project->duration }}
                            </dd>
                        </div>

                        @if($project->client_type)
                        <div class="flex flex-col sm:flex-row sm:justify-between lg:flex-col lg:justify-start">
                            <dt class="text-sm font-medium text-gray-600 mb-1">Type de client</dt>
                            <dd class="text-sm font-semibold text-gray-900">
                                <i class="fas fa-user mr-2 text-purple-600"></i>{{ ucfirst($project->client_type) }}
                            </dd>
                        </div>
                        @endif

                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex flex-col sm:flex-row sm:justify-between lg:flex-col lg:justify-start mb-2">
                                <dt class="text-sm font-medium text-gray-600 mb-1">Créé le</dt>
                                <dd class="text-sm text-gray-900">{{ $project->created_at->format('d/m/Y à H:i') }}</dd>
                            </div>

                            <div class="flex flex-col sm:flex-row sm:justify-between lg:flex-col lg:justify-start">
                                <dt class="text-sm font-medium text-gray-600 mb-1">Modifié le</dt>
                                <dd class="text-sm text-gray-900">{{ $project->updated_at->format('d/m/Y à H:i') }}</dd>
                            </div>
                        </div>
                    </dl>
                </div>

                </div>

                <!-- Technologies -->
                @if($project->technologies)
                <div class="glass-effect rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-blue-500 rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-code text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 ml-3">Technologies</h3>
                    </div>
                    <div class="flex flex-wrap gap-3">
                        @php
                            $technologies = is_string($project->technologies) 
                                ? explode(',', $project->technologies) 
                                : ($project->technologies ?? []);
                            $technologies = array_filter(array_map('trim', $technologies));
                        @endphp
                        @foreach($technologies as $tech)
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-purple-100 to-pink-100 text-purple-800 shadow-sm hover:shadow-md transition-shadow">
                                <i class="fas fa-hashtag mr-2 text-xs"></i>
                                {{ $tech }}
                            </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Liens et actions -->
                <div class="glass-effect rounded-2xl p-6 shadow-xl">
                    <div class="flex items-center mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-500 rounded-lg flex items-center justify-center shadow-lg">
                            <i class="fas fa-link text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 ml-3">Liens & Actions</h3>
                    </div>
                    <div class="space-y-4">
                        @if($project->demo_url)
                        <a href="{{ $project->demo_url }}" target="_blank" 
                           class="flex items-center justify-between p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl hover:from-purple-100 hover:to-pink-100 transition-all duration-300 border border-purple-200">
                            <div class="flex items-center">
                                <i class="fas fa-external-link-alt text-purple-600 mr-3"></i>
                                <span class="font-medium text-purple-800">Voir la démonstration</span>
                            </div>
                            <i class="fas fa-arrow-right text-purple-600"></i>
                        </a>
                        @endif

                        @if($project->github_url)
                        <a href="{{ $project->github_url }}" target="_blank" 
                           class="flex items-center justify-between p-4 bg-gradient-to-r from-gray-50 to-gray-100 rounded-xl hover:from-gray-100 hover:to-gray-200 transition-all duration-300 border border-gray-200">
                            <div class="flex items-center">
                                <i class="fab fa-github text-gray-700 mr-3"></i>
                                <span class="font-medium text-gray-800">Voir le code source</span>
                            </div>
                            <i class="fas fa-arrow-right text-gray-600"></i>
                        </a>
                        @endif

                        @if(!$project->demo_url && !$project->github_url)
                        <div class="text-center py-8">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-link text-gray-400 text-xl"></i>
                            </div>
                            <p class="text-gray-500 font-medium">Aucun lien disponible</p>
                            <p class="text-sm text-gray-400 mt-1">Les liens peuvent être ajoutés lors de la modification</p>
                        </div>
                        @endif

                        <!-- Action de retour -->
                        <div class="pt-4 border-t border-gray-200">
                            <a href="{{ route('admin.projects') }}" 
                               class="flex items-center justify-center w-full p-4 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-xl hover:from-blue-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-arrow-left mr-3"></i>
                                <span class="font-medium">Retour aux projets</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton de retour flottant pour mobile -->
    <div class="fixed bottom-6 left-6 z-50 block sm:hidden">
        <a href="{{ route('admin.projects') }}" 
           class="floating-back-btn w-14 h-14 bg-gradient-to-r from-blue-600 to-cyan-600 text-white rounded-full shadow-lg flex items-center justify-center focus:outline-none focus:ring-4 focus:ring-blue-300 hover:from-blue-700 hover:to-cyan-700 transition-all duration-300">
            <i class="fas fa-arrow-left text-xl"></i>
        </a>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation des éléments au scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observer les cartes et sections
    document.querySelectorAll('.glass-effect').forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });

    // Animation de parallaxe légère pour l'image
    const projectImage = document.querySelector('.aspect-video img');
    if (projectImage) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            projectImage.style.transform = `translateY(${rate}px)`;
        });
    }

    // Smooth scroll pour les liens d'ancrage
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
</script>
@endpush
@endsection
