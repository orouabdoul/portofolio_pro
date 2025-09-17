@extends('admin.layout')

@section('title', 'Créer un Nouveau Projet')

@push('styles')
<link href="{{ asset('css/admin-form.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 px-4 sm:px-6 lg:px-8 py-6">
    <div class="max-w-6xl mx-auto">
        <!-- Header avec animation et navigation améliorée -->
        <div class="relative bg-gradient-to-br from-purple-600 via-indigo-600 to-blue-600 rounded-3xl p-6 sm:p-8 mb-8 overflow-hidden shadow-2xl">
        <!-- Motifs décoratifs animés -->
        <div class="absolute top-0 right-0 w-40 h-40 bg-white opacity-10 rounded-full -mr-20 -mt-20 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-white opacity-5 rounded-full -ml-16 -mb-16 animate-bounce"></div>
        <div class="absolute top-1/2 left-1/4 w-6 h-6 bg-white opacity-20 rounded-full animate-ping"></div>
        <div class="absolute bottom-1/4 right-1/3 w-4 h-4 bg-white opacity-30 rounded-full animate-pulse"></div>
        
        <!-- Fil d'Ariane interactif -->
        <div class="relative mb-6">
            <nav class="flex items-center space-x-2 text-sm text-purple-100">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-white transition-colors">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                    </svg>
                    Tableau de bord
                </a>
                <span>/</span>
                <a href="{{ route('admin.projects') }}" class="hover:text-white transition-colors">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                    </svg>
                    Gestion des Projets
                </a>
                <span>/</span>
                <span class="text-white font-medium">Nouveau Projet</span>
            </nav>
        </div>
        
        <div class="relative md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <div class="flex items-center space-x-4 mb-6">
                    <div class="flex-shrink-0">
                        <div class="h-16 w-16 bg-white bg-opacity-20 rounded-2xl flex items-center justify-center backdrop-blur-sm border border-white border-opacity-30">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-4xl font-extrabold text-white sm:text-5xl tracking-tight">
                            Créer un Nouveau Projet
                        </h1>
                        <p class="mt-3 text-xl text-purple-100 leading-relaxed">
                            🚀 Donnez vie à votre vision créative et partagez votre excellence avec le monde
                        </p>
                    </div>
                </div>
                
                <!-- Statistiques motivantes avec animations -->
                <div class="grid grid-cols-3 gap-6 mt-8">
                    <div class="text-center group">
                        <div class="text-3xl font-bold text-white mb-2 group-hover:scale-110 transition-transform duration-200">✨</div>
                        <div class="text-sm text-purple-100 font-medium">Créativité</div>
                        <div class="text-xs text-purple-200 mt-1">Exprimez votre art</div>
                    </div>
                    <div class="text-center group">
                        <div class="text-3xl font-bold text-white mb-2 group-hover:scale-110 transition-transform duration-200">💡</div>
                        <div class="text-sm text-purple-100 font-medium">Innovation</div>
                        <div class="text-xs text-purple-200 mt-1">Révolutionnez l'usage</div>
                    </div>
                    <div class="text-center group">
                        <div class="text-3xl font-bold text-white mb-2 group-hover:scale-110 transition-transform duration-200">🎯</div>
                        <div class="text-sm text-purple-100 font-medium">Excellence</div>
                        <div class="text-xs text-purple-200 mt-1">Visez la perfection</div>
                    </div>
                </div>
            </div>
            
            <!-- Actions de navigation -->
            <div class="mt-6 flex flex-col md:mt-0 md:ml-8 space-y-3">
                <a href="{{ route('admin.projects') }}" class="inline-flex items-center px-6 py-3 border border-white border-opacity-30 rounded-xl shadow-sm text-sm font-medium text-white bg-white bg-opacity-10 hover:bg-opacity-20 transition-all duration-200 backdrop-blur-sm group">
                    <svg class="-ml-1 mr-2 h-5 w-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Retour à la liste
                </a>
                
                <!-- Indicateur de progression -->
                <div class="bg-white bg-opacity-10 rounded-xl p-4 backdrop-blur-sm border border-white border-opacity-20">
                    <div class="text-xs text-purple-100 mb-2 font-medium">Progression</div>
                    <div class="w-full bg-white bg-opacity-20 rounded-full h-2">
                        <div id="form-progress" class="bg-white h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>
                    <div class="text-xs text-purple-200 mt-1" id="progress-text">Commencez à remplir le formulaire</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulaire avec design moderne et gestion avancée -->
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 backdrop-blur-sm">
        <!-- Progress indicator amélioré -->
        <div class="bg-gradient-to-r from-gray-50 via-blue-50 to-purple-50 px-8 py-6 border-b border-gray-100">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center text-purple-600" id="step-1">
                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center mr-3 transition-all duration-300 border-2 border-purple-300">
                            <span class="text-purple-700 font-bold text-sm">1</span>
                        </div>
                        <span class="font-semibold text-sm">Identité</span>
                    </div>
                    <div class="w-16 h-1 bg-gray-200 rounded-full relative overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-purple-400 to-blue-400 rounded-full transition-all duration-500" style="width: 0%" id="progress-1-2"></div>
                    </div>
                    <div class="flex items-center text-gray-400" id="step-2">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mr-3 transition-all duration-300 border-2 border-gray-200">
                            <span class="text-gray-400 font-bold text-sm">2</span>
                        </div>
                        <span class="font-medium text-sm">Contenu</span>
                    </div>
                    <div class="w-16 h-1 bg-gray-200 rounded-full relative overflow-hidden">
                        <div class="h-full bg-gradient-to-r from-blue-400 to-green-400 rounded-full transition-all duration-500" style="width: 0%" id="progress-2-3"></div>
                    </div>
                    <div class="flex items-center text-gray-400" id="step-3">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mr-3 transition-all duration-300 border-2 border-gray-200">
                            <span class="text-gray-400 font-bold text-sm">3</span>
                        </div>
                        <span class="font-medium text-sm">Médias</span>
                    </div>
                </div>
                
                <!-- Actions rapides -->
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2 text-xs">
                        <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                        <span class="text-gray-600">Sauvegarde auto</span>
                    </div>
                    <div class="text-xs text-gray-500 bg-white px-4 py-2 rounded-full border border-gray-200 shadow-sm">
                        💡 <span class="font-medium">Astuce:</span> Tous les champs marqués d'un <span class="text-red-500 font-bold">*</span> sont obligatoires
                    </div>
                    <button type="button" onclick="togglePreviewMode()" class="text-xs bg-blue-50 text-blue-700 px-4 py-2 rounded-full border border-blue-200 hover:bg-blue-100 transition-colors">
                        👁️ Aperçu
                    </button>
                </div>
            </div>
        </div>

        <!-- Zone de gestion des projets existants -->
        <div class="bg-gradient-to-r from-yellow-50 to-orange-50 border-b border-orange-100 px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="flex items-center text-orange-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <span class="font-semibold">Gestion des Projets</span>
                    </div>
                    <span class="text-sm text-orange-600 bg-white px-3 py-1 rounded-full border">
                        � <span id="projects-count">{{ $projectsCount ?? 0 }}</span> projet(s) existant(s)
                    </span>
                </div>
                
                <div class="flex items-center space-x-3">
                    <button type="button" onclick="showProjectsList()" class="text-sm bg-white text-orange-700 px-4 py-2 rounded-lg border border-orange-200 hover:bg-orange-50 transition-colors flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        Voir la liste
                    </button>
                    <button type="button" onclick="duplicateProject()" class="text-sm bg-white text-orange-700 px-4 py-2 rounded-lg border border-orange-200 hover:bg-orange-50 transition-colors flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                        </svg>
                        Dupliquer un projet
                    </button>
                    <button type="button" onclick="showTemplates()" class="text-sm bg-white text-orange-700 px-4 py-2 rounded-lg border border-orange-200 hover:bg-orange-50 transition-colors flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Templates
                    </button>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            
            <div class="px-8 py-8">
                <!-- Section 1: Informations générales -->
                <div class="space-y-8">
                    <div class="border-l-4 border-purple-400 pl-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 flex items-center">
                            <span class="mr-3 text-2xl">🎯</span>
                            Identité du Projet
                        </h3>
                        <p class="text-gray-600 mb-6">Définissez l'essence et l'identité unique de votre projet</p>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Titre avec compteur de caractères -->
                        <div class="lg:col-span-2">
                            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                <span class="flex items-center">
                                    ✨ Titre du projet
                                    <span class="ml-1 text-red-500">*</span>
                                    <span class="ml-auto text-xs text-gray-400" id="title-counter">0/100</span>
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text" name="title" id="title" value="{{ old('title') }}" required maxlength="100"
                                    class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 text-lg font-medium"
                                    placeholder="Ex: TaskFlow Pro - Gestionnaire de tâches nouvelle génération">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('title')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Slug avec prévisualisation -->
                        <div>
                            <label for="slug" class="block text-sm font-semibold text-gray-700 mb-2">
                                🔗 Slug (URL) <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required
                                    class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                    placeholder="taskflow-pro">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.1a4 4 0 001.12-2.77M10.172 13.828a4 4 0 015.656 0l4-4a4 4 0 10-5.656-5.656l-1.1 1.102a4 4 0 00-2.77 1.12"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-2 p-3 bg-blue-50 rounded-lg border border-blue-200">
                                <p class="text-xs text-blue-700 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Aperçu URL: <span class="font-mono bg-white px-2 py-1 rounded ml-1" id="url-preview">/projects/[slug]</span>
                                </p>
                            </div>
                            @error('slug')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Catégorie avec icônes -->
                        <div>
                            <label for="category" class="block text-sm font-semibold text-gray-700 mb-2">
                                📱 Catégorie <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <select name="category" id="category" required
                                    class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 appearance-none bg-white">
                                    <option value="">🎯 Choisissez votre domaine</option>
                                    <option value="mobile" {{ old('category') === 'mobile' ? 'selected' : '' }}>📱 Application Mobile</option>
                                    <option value="web" {{ old('category') === 'web' ? 'selected' : '' }}>🌐 Application Web</option>
                                    <option value="ecommerce" {{ old('category') === 'ecommerce' ? 'selected' : '' }}>🛒 E-commerce</option>
                                    <option value="design" {{ old('category') === 'design' ? 'selected' : '' }}>🎨 Design UI/UX</option>
                                    <option value="api" {{ old('category') === 'api' ? 'selected' : '' }}>⚙️ API & Backend</option>
                                    <option value="other" {{ old('category') === 'other' ? 'selected' : '' }}>🔧 Autre</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('category')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Durée avec sélecteur rapide -->
                        <div>
                            <label for="duration" class="block text-sm font-semibold text-gray-700 mb-2">
                                ⏱️ Durée du projet
                            </label>
                            <div class="space-y-3">
                                <input type="text" name="duration" id="duration" value="{{ old('duration') }}"
                                    class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                    placeholder="Ex: 3 mois">
                                <div class="flex flex-wrap gap-2">
                                    <button type="button" onclick="setDuration('1 semaine')" class="px-3 py-1 text-xs bg-gray-100 hover:bg-purple-100 text-gray-700 hover:text-purple-700 rounded-full transition-colors">1 semaine</button>
                                    <button type="button" onclick="setDuration('2 semaines')" class="px-3 py-1 text-xs bg-gray-100 hover:bg-purple-100 text-gray-700 hover:text-purple-700 rounded-full transition-colors">2 semaines</button>
                                    <button type="button" onclick="setDuration('1 mois')" class="px-3 py-1 text-xs bg-gray-100 hover:bg-purple-100 text-gray-700 hover:text-purple-700 rounded-full transition-colors">1 mois</button>
                                    <button type="button" onclick="setDuration('3 mois')" class="px-3 py-1 text-xs bg-gray-100 hover:bg-purple-100 text-gray-700 hover:text-purple-700 rounded-full transition-colors">3 mois</button>
                                    <button type="button" onclick="setDuration('6 mois')" class="px-3 py-1 text-xs bg-gray-100 hover:bg-purple-100 text-gray-700 hover:text-purple-700 rounded-full transition-colors">6 mois</button>
                                </div>
                            </div>
                            @error('duration')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 2: Descriptions avec éditeur enrichi -->
                <div class="space-y-8 mt-12">
                    <div class="border-l-4 border-indigo-400 pl-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 flex items-center">
                            <span class="mr-3 text-2xl">📝</span>
                            Contenu & Storytelling
                        </h3>
                        <p class="text-gray-600 mb-6">Racontez l'histoire de votre projet et captivez votre audience</p>
                    </div>
                    
                    <!-- Description courte avec suggestions -->
                    <div>
                        <label for="short_description" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                💭 Description courte <span class="text-red-500 ml-1">*</span>
                                <span class="ml-auto text-xs text-gray-400" id="short-counter">0/150</span>
                            </span>
                        </label>
                        <div class="relative">
                            <textarea name="short_description" id="short_description" rows="3" required maxlength="150"
                                class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 resize-none"
                                placeholder="Une description captivante qui donne envie d'en savoir plus sur votre projet..."></textarea>
                            <div class="absolute bottom-3 right-3">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="mt-2 flex flex-wrap gap-2">
                            <span class="text-xs text-gray-500">💡 Suggestions:</span>
                            <button type="button" onclick="addSuggestion('short_description', 'Solution innovante pour')" class="text-xs bg-blue-50 hover:bg-blue-100 text-blue-700 px-2 py-1 rounded transition-colors">Solution innovante</button>
                            <button type="button" onclick="addSuggestion('short_description', 'Application révolutionnaire qui')" class="text-xs bg-green-50 hover:bg-green-100 text-green-700 px-2 py-1 rounded transition-colors">App révolutionnaire</button>
                            <button type="button" onclick="addSuggestion('short_description', 'Plateforme moderne permettant de')" class="text-xs bg-purple-50 hover:bg-purple-100 text-purple-700 px-2 py-1 rounded transition-colors">Plateforme moderne</button>
                        </div>
                        @error('short_description')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Description complète avec structure guidée -->
                    <div>
                        <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                📖 Description complète <span class="text-red-500 ml-1">*</span>
                                <span class="ml-auto text-xs text-gray-400" id="desc-counter">0/1000</span>
                            </span>
                        </label>
                        <div class="bg-gray-50 border border-gray-200 rounded-xl p-4 mb-3">
                            <p class="text-sm text-gray-600 mb-3 font-medium">📋 Structure recommandée :</p>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs">
                                <div class="bg-white p-3 rounded-lg border">
                                    <div class="font-semibold text-blue-700 mb-1">🎯 Problématique</div>
                                    <div class="text-gray-600">Quel problème résolvez-vous ?</div>
                                </div>
                                <div class="bg-white p-3 rounded-lg border">
                                    <div class="font-semibold text-green-700 mb-1">💡 Solution</div>
                                    <div class="text-gray-600">Comment votre projet répond-il ?</div>
                                </div>
                                <div class="bg-white p-3 rounded-lg border">
                                    <div class="font-semibold text-purple-700 mb-1">🏆 Impact</div>
                                    <div class="text-gray-600">Quels résultats obtenus ?</div>
                                </div>
                            </div>
                        </div>
                        <textarea name="description" id="description" rows="8" required maxlength="1000"
                            class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                            placeholder="🎯 PROBLÉMATIQUE : Décrivez le défi que vous avez relevé...

💡 SOLUTION : Expliquez votre approche créative et technique...

🔧 DÉVELOPPEMENT : Détaillez le processus de création...

🏆 RÉSULTATS : Partagez les succès et l'impact de votre projet...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Fonctionnalités avec tags dynamiques -->
                    <div>
                        <label for="features" class="block text-sm font-semibold text-gray-700 mb-2">
                            <span class="flex items-center">
                                ⚡ Fonctionnalités principales
                                <span class="ml-2 text-xs bg-gray-100 text-gray-600 px-2 py-1 rounded-full">Optionnel</span>
                            </span>
                        </label>
                        <div class="space-y-3">
                            <textarea name="features" id="features" rows="5"
                                class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                placeholder="✅ Authentification sécurisée avec 2FA
✅ Interface utilisateur intuitive et responsive  
✅ Gestion avancée des données en temps réel
✅ Notifications push intelligentes
✅ Analytics et rapports détaillés">{{ is_array(old('features')) ? implode("\n", old('features')) : old('features') }}</textarea>
                            <div class="flex flex-wrap gap-2 items-center">
                                <span class="text-xs text-gray-500">🚀 Fonctionnalités populaires:</span>
                                <button type="button" onclick="addFeature('Authentification sécurisée')" class="text-xs bg-blue-50 hover:bg-blue-100 text-blue-700 px-2 py-1 rounded transition-colors">🔐 Auth</button>
                                <button type="button" onclick="addFeature('Interface responsive')" class="text-xs bg-green-50 hover:bg-green-100 text-green-700 px-2 py-1 rounded transition-colors">📱 Responsive</button>
                                <button type="button" onclick="addFeature('API REST')" class="text-xs bg-purple-50 hover:bg-purple-100 text-purple-700 px-2 py-1 rounded transition-colors">🔌 API</button>
                                <button type="button" onclick="addFeature('Base de données optimisée')" class="text-xs bg-yellow-50 hover:bg-yellow-100 text-yellow-700 px-2 py-1 rounded transition-colors">🗄️ BDD</button>
                            </div>
                        </div>
                        @error('features')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Section 3: Stack technique -->
                <div class="space-y-8 mt-12">
                    <div class="border-l-4 border-green-400 pl-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 flex items-center">
                            <span class="mr-3 text-2xl">🛠️</span>
                            Stack Technique
                        </h3>
                        <p class="text-gray-600 mb-6">Détaillez les technologies qui font la puissance de votre projet</p>
                    </div>
                    
                    <!-- Technologies avec sélecteur visuel -->
                    <div>
                        <label for="technologies" class="block text-sm font-semibold text-gray-700 mb-4">
                            💻 Technologies utilisées <span class="text-red-500">*</span>
                        </label>
                        
                        <!-- Catégories de technologies -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                                <h4 class="font-semibold text-blue-800 mb-3 flex items-center">
                                    🎨 Frontend
                                </h4>
                                <div class="space-y-2">
                                    <div class="flex flex-wrap gap-2">
                                        <button type="button" onclick="addTech('HTML5')" class="tech-tag">HTML5</button>
                                        <button type="button" onclick="addTech('CSS3')" class="tech-tag">CSS3</button>
                                        <button type="button" onclick="addTech('JavaScript')" class="tech-tag">JavaScript</button>
                                        <button type="button" onclick="addTech('Vue.js')" class="tech-tag">Vue.js</button>
                                        <button type="button" onclick="addTech('React')" class="tech-tag">React</button>
                                        <button type="button" onclick="addTech('Angular')" class="tech-tag">Angular</button>
                                        <button type="button" onclick="addTech('TailwindCSS')" class="tech-tag">TailwindCSS</button>
                                        <button type="button" onclick="addTech('Bootstrap')" class="tech-tag">Bootstrap</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-orange-50 border border-orange-200 rounded-xl p-4">
                                <h4 class="font-semibold text-orange-800 mb-3 flex items-center">
                                    📱 Mobile
                                </h4>
                                <div class="space-y-2">
                                    <div class="flex flex-wrap gap-2">
                                        <button type="button" onclick="addTech('Flutter')" class="tech-tag">Flutter</button>
                                        <button type="button" onclick="addTech('Dart')" class="tech-tag">Dart</button>
                                        <button type="button" onclick="addTech('React Native')" class="tech-tag">React Native</button>
                                        <button type="button" onclick="addTech('Ionic')" class="tech-tag">Ionic</button>
                                        <button type="button" onclick="addTech('Swift')" class="tech-tag">Swift</button>
                                        <button type="button" onclick="addTech('Kotlin')" class="tech-tag">Kotlin</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-green-50 border border-green-200 rounded-xl p-4">
                                <h4 class="font-semibold text-green-800 mb-3 flex items-center">
                                    ⚙️ Backend
                                </h4>
                                <div class="space-y-2">
                                    <div class="flex flex-wrap gap-2">
                                        <button type="button" onclick="addTech('PHP')" class="tech-tag">PHP</button>
                                        <button type="button" onclick="addTech('Laravel')" class="tech-tag">Laravel</button>
                                        <button type="button" onclick="addTech('Node.js')" class="tech-tag">Node.js</button>
                                        <button type="button" onclick="addTech('Python')" class="tech-tag">Python</button>
                                        <button type="button" onclick="addTech('Django')" class="tech-tag">Django</button>
                                        <button type="button" onclick="addTech('Express.js')" class="tech-tag">Express.js</button>
                                        <button type="button" onclick="addTech('Java')" class="tech-tag">Java</button>
                                        <button type="button" onclick="addTech('Spring Boot')" class="tech-tag">Spring Boot</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-purple-50 border border-purple-200 rounded-xl p-4">
                                <h4 class="font-semibold text-purple-800 mb-3 flex items-center">
                                    🗄️ Base de données
                                </h4>
                                <div class="space-y-2">
                                    <div class="flex flex-wrap gap-2">
                                        <button type="button" onclick="addTech('MySQL')" class="tech-tag">MySQL</button>
                                        <button type="button" onclick="addTech('PostgreSQL')" class="tech-tag">PostgreSQL</button>
                                        <button type="button" onclick="addTech('MongoDB')" class="tech-tag">MongoDB</button>
                                        <button type="button" onclick="addTech('Redis')" class="tech-tag">Redis</button>
                                        <button type="button" onclick="addTech('SQLite')" class="tech-tag">SQLite</button>
                                        <button type="button" onclick="addTech('Firebase')" class="tech-tag">Firebase</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Champ de saisie des technologies -->
                        <div class="relative">
                            <input type="text" name="technologies" id="technologies" value="{{ is_array(old('technologies')) ? implode(', ', old('technologies')) : old('technologies') }}" required
                                class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                placeholder="Sélectionnez ci-dessus ou tapez: PHP, Laravel, Vue.js, MySQL, TailwindCSS...">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Cliquez sur les technologies ci-dessus ou séparez-les par des virgules
                        </p>
                        
                        <!-- Aperçu des technologies sélectionnées -->
                        <div id="selected-techs" class="mt-3 hidden">
                            <p class="text-sm font-medium text-gray-700 mb-2">🔧 Technologies sélectionnées:</p>
                            <div id="tech-preview" class="flex flex-wrap gap-2"></div>
                        </div>
                        
                        @error('technologies')
                            <p class="mt-2 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <!-- Section 4: Performance et métriques -->
                <div class="space-y-8 mt-12">
                    <div class="border-l-4 border-yellow-400 pl-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 flex items-center">
                            <span class="mr-3 text-2xl">📊</span>
                            Performance & Métriques
                        </h3>
                        <p class="text-gray-600 mb-6">Mettez en valeur les résultats exceptionnels de votre projet</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Score de performance avec indicateur visuel -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-xl p-6">
                            <label for="performance_score" class="block text-sm font-semibold text-green-800 mb-3">
                                🚀 Score de performance
                            </label>
                            <div class="space-y-4">
                                <div class="relative">
                                    <input type="number" name="performance_score" id="performance_score" min="0" max="100" value="{{ old('performance_score') }}"
                                        class="block w-full px-4 py-3 border-2 border-green-200 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 text-center text-xl md:text-2xl font-bold"
                                        placeholder="95" oninput="updatePerformanceBar(this.value)">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-green-600 font-semibold">%</span>
                                    </div>
                                </div>
                                <!-- Barre de progression -->
                                <div class="w-full bg-gray-200 rounded-full h-3">
                                    <div id="performance-bar" class="bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-300" style="width: 0%"></div>
                                </div>
                                <div class="text-xs text-green-700 text-center" id="performance-label">Excellente performance !</div>
                            </div>
                            @error('performance_score')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Nombre d'utilisateurs avec format -->
                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 border border-blue-200 rounded-xl p-6">
                            <label for="users_count" class="block text-sm font-semibold text-blue-800 mb-3">
                                👥 Nombre d'utilisateurs
                            </label>
                            <div class="space-y-4">
                                <div class="relative">
                                    <input type="number" name="users_count" id="users_count" min="0" value="{{ old('users_count') }}"
                                        class="block w-full px-4 py-3 border-2 border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-center text-2xl font-bold"
                                        placeholder="1000" oninput="formatUserCount(this.value)">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="text-xs text-blue-700 text-center" id="users-formatted">0 utilisateur</div>
                                <div class="flex justify-center space-x-2">
                                    <button type="button" onclick="setUsers(100)" class="px-2 py-1 text-xs bg-blue-100 hover:bg-blue-200 text-blue-700 rounded transition-colors">100</button>
                                    <button type="button" onclick="setUsers(1000)" class="px-2 py-1 text-xs bg-blue-100 hover:bg-blue-200 text-blue-700 rounded transition-colors">1K</button>
                                    <button type="button" onclick="setUsers(10000)" class="px-2 py-1 text-xs bg-blue-100 hover:bg-blue-200 text-blue-700 rounded transition-colors">10K</button>
                                </div>
                            </div>
                            @error('users_count')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Taux de satisfaction avec emoji -->
                        <div class="bg-gradient-to-br from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl p-6">
                            <label for="satisfaction_rate" class="block text-sm font-semibold text-yellow-800 mb-3">
                                😊 Taux de satisfaction
                            </label>
                            <div class="space-y-4">
                                <div class="relative">
                                    <input type="number" name="satisfaction_rate" id="satisfaction_rate" min="0" max="100" value="{{ old('satisfaction_rate') }}"
                                        class="block w-full px-4 py-3 border-2 border-yellow-200 rounded-xl shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200 text-center text-2xl font-bold"
                                        placeholder="98" oninput="updateSatisfactionEmoji(this.value)">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-yellow-600 font-semibold">%</span>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="text-4xl" id="satisfaction-emoji">😊</div>
                                    <div class="text-xs text-yellow-700 mt-1" id="satisfaction-label">Très satisfaisant</div>
                                </div>
                            </div>
                            @error('satisfaction_rate')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 5: Liens et médias -->
                <div class="space-y-8 mt-12">
                    <div class="border-l-4 border-pink-400 pl-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 flex items-center">
                            <span class="mr-3 text-2xl">🔗</span>
                            Liens & Médias
                        </h3>
                        <p class="text-gray-600 mb-6">Connectez votre projet au monde extérieur</p>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- URL du projet en ligne -->
                        <div>
                            <label for="live_url" class="block text-sm font-semibold text-gray-700 mb-2">
                                🌐 URL du projet en ligne
                            </label>
                            <div class="relative">
                                <input type="url" name="live_url" id="live_url" value="{{ old('live_url') }}"
                                    class="block w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                    placeholder="https://mon-super-projet.com">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9v-9m0-9v9"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-gray-500 flex items-center">
                                💡 Permettra aux visiteurs de tester votre projet directement
                            </p>
                            @error('live_url')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- URL GitHub -->
                        <div>
                            <label for="github_url" class="block text-sm font-semibold text-gray-700 mb-2">
                                <svg class="inline w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                                URL GitHub
                            </label>
                            <div class="relative">
                                <input type="url" name="github_url" id="github_url" value="{{ old('github_url') }}"
                                    class="block w-full px-4 py-3 pl-12 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                                    placeholder="https://github.com/username/mon-projet">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-gray-500 flex items-center">
                                🔓 Montrez votre code aux recruteurs et à la communauté
                            </p>
                            @error('github_url')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Upload d'image moderne -->
                        <div class="md:col-span-2">
                            <label for="image" class="block text-sm font-semibold text-gray-700 mb-4">
                                📸 Image de présentation du projet
                            </label>
                            <div class="relative">
                                <div class="flex justify-center px-4 sm:px-6 pt-6 sm:pt-8 pb-6 sm:pb-8 border-3 border-gray-300 border-dashed rounded-2xl hover:border-purple-400 transition-colors duration-200 bg-gradient-to-br from-gray-50 to-gray-100 hover:from-purple-50 hover:to-purple-100">
                                    <div class="space-y-2 text-center">
                                        <svg class="mx-auto h-12 w-12 sm:h-16 sm:w-16 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="space-y-1">
                                            <div class="flex text-base sm:text-lg text-gray-600 justify-center">
                                                <label for="image" class="relative cursor-pointer bg-white rounded-xl font-semibold text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500 px-3 sm:px-4 py-2 transition-colors">
                                                    <span>📤 Télécharger une image</span>
                                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                                </label>
                                            </div>
                                            <p class="text-sm sm:text-base text-gray-500">ou glisser-déposer votre image ici</p>
                                        </div>
                                        <div class="flex flex-wrap justify-center gap-2 text-xs sm:text-sm text-gray-500">
                                            <span class="bg-white px-2 sm:px-3 py-1 rounded-full">PNG</span>
                                            <span class="bg-white px-2 sm:px-3 py-1 rounded-full">JPG</span>
                                            <span class="bg-white px-2 sm:px-3 py-1 rounded-full">GIF</span>
                                            <span class="bg-white px-2 sm:px-3 py-1 rounded-full">Max 2MB</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Aperçu de l'image -->
                                <div id="image-preview-container" class="mt-4 hidden">
                                    <p class="text-sm font-medium text-gray-700 mb-2">🖼️ Aperçu:</p>
                                    <div class="relative inline-block">
                                        <img id="image-preview" class="max-w-full sm:max-w-xs rounded-xl shadow-lg border border-gray-200" src="" alt="Aperçu">
                                        <button type="button" onclick="removeImage()" class="absolute -top-2 -right-2 bg-red-500 hover:bg-red-600 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm transition-colors">×</button>
                                    </div>
                                </div>
                            </div>
                            @error('image')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section 6: Options avancées -->
                <div class="space-y-8 mt-12">
                    <div class="border-l-4 border-indigo-400 pl-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2 flex items-center">
                            <span class="mr-3 text-2xl">⚙️</span>
                            Options & Visibilité
                        </h3>
                        <p class="text-gray-600 mb-6">Contrôlez comment votre projet apparaît dans votre portfolio</p>
                    </div>
                    
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Projet actif -->
                        <div class="bg-green-50 border border-green-200 rounded-xl p-6">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active') ? 'checked' : '' }}
                                            class="sr-only peer">
                                        <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-green-600"></div>
                                    </label>
                                </div>
                                <div class="flex-1">
                                    <label for="is_active" class="block text-sm font-semibold text-green-800 cursor-pointer">
                                        ✅ Projet actif
                                    </label>
                                    <p class="text-sm text-green-600 mt-1">
                                        Votre projet sera visible sur votre portfolio public et accessible aux visiteurs
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Projet en vedette -->
                        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-6">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input id="is_featured" name="is_featured" type="checkbox" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                            class="sr-only peer">
                                        <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-yellow-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-yellow-500"></div>
                                    </label>
                                </div>
                                <div class="flex-1">
                                    <label for="is_featured" class="block text-sm font-semibold text-yellow-800 cursor-pointer">
                                        ⭐ Projet en vedette
                                    </label>
                                    <p class="text-sm text-yellow-600 mt-1">
                                        Mettez en avant ce projet exceptionnel en tête de votre portfolio
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions avec style amélioré et gestion avancée -->
            <div class="bg-gradient-to-r from-gray-50 via-blue-50 to-purple-50 px-8 py-8 border-t border-gray-200">
                <!-- Résumé du projet avant soumission -->
                <div id="project-summary" class="hidden bg-white rounded-2xl p-6 mb-6 border border-gray-200 shadow-sm">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Résumé de votre projet
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                        <div class="bg-blue-50 p-4 rounded-xl">
                            <div class="font-semibold text-blue-800 mb-2">📋 Informations</div>
                            <div id="summary-title" class="text-gray-700"></div>
                            <div id="summary-category" class="text-gray-600 mt-1"></div>
                        </div>
                        <div class="bg-green-50 p-4 rounded-xl">
                            <div class="font-semibold text-green-800 mb-2">🛠️ Technologies</div>
                            <div id="summary-tech" class="text-gray-700"></div>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-xl">
                            <div class="font-semibold text-purple-800 mb-2">📊 Métriques</div>
                            <div id="summary-metrics" class="text-gray-700"></div>
                        </div>
                    </div>
                </div>

                <!-- Actions principales -->
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-6 lg:space-y-0">
                    <!-- Informations et conseils -->
                    <div class="flex-1 space-y-3">
                        <div class="flex items-center text-sm text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            💾 Sauvegarde automatique activée
                        </div>
                        <div class="flex items-center text-sm text-blue-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            💡 Vos données sont sécurisées et peuvent être récupérées
                        </div>
                        <div class="flex items-center text-sm text-purple-600">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            🎯 Projet visible immédiatement après création si activé
                        </div>
                    </div>
                    
                    <!-- Boutons d'action avec options avancées -->
                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">
                        <!-- Bouton Annuler -->
                        <a href="{{ route('admin.projects') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 sm:px-6 py-3 border-2 border-gray-300 rounded-xl shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 group">
                            <svg class="-ml-1 mr-2 h-5 w-5 group-hover:rotate-180 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Annuler
                        </a>
                        
                        <!-- Bouton Enregistrer principal -->
                        <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 rounded-xl shadow-2xl text-base font-bold text-white bg-gradient-to-br from-orange-500 via-red-500 to-pink-500 hover:from-orange-600 hover:via-red-600 hover:to-pink-600 focus:outline-none focus:ring-4 focus:ring-orange-300 focus:ring-offset-2 transition-all duration-300 relative overflow-hidden group transform hover:scale-105">
                            <!-- Animation de fond dynamique -->
                            <span class="absolute inset-0 bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400 opacity-0 group-hover:opacity-50 transition-opacity duration-300 pointer-events-none"></span>
                            <!-- Effet de brillance -->
                            <span class="absolute left-0 top-0 w-1/3 h-full bg-gradient-to-r from-white via-transparent to-transparent opacity-0 group-hover:opacity-40 group-hover:translate-x-full transition-all duration-700 pointer-events-none"></span>
                            <span class="flex items-center relative z-10 space-x-2">
                                <svg class="h-6 w-6 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="tracking-wide text-lg">🚀 CRÉER LE PROJET</span>
                            </span>
                            <!-- Badge d'action -->
                            <span class="absolute -top-3 -right-3 bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded-full shadow-lg animate-bounce">ENVOYER</span>
                        </button>
                        
                        <!-- Menu d'actions secondaires -->
                        <div class="relative">
                            <button type="button" onclick="toggleActionsMenu()" class="w-full sm:w-auto inline-flex items-center justify-center px-4 sm:px-6 py-3 border-2 border-gray-300 rounded-xl shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                                Plus d'options
                            </button>
                            
                            <!-- Menu déroulant -->
                            <div id="actions-menu" class="hidden absolute bottom-full mb-2 left-0 sm:right-0 w-full sm:w-64 bg-white rounded-xl shadow-xl border border-gray-200 py-2 z-10">
                                <button type="button" onclick="saveAsDraft()" class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 flex items-center">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    � Sauvegarder en brouillon
                                </button>
                                <button type="button" onclick="previewProject()" class="w-full text-left px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 flex items-center">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    👁️ Aperçu du projet
                                </button>
                                <button type="button" onclick="resetForm()" class="w-full text-left px-4 py-3 text-sm text-red-600 hover:bg-red-50 flex items-center">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                    </svg>
                                    � Réinitialiser le formulaire
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Conseils d'optimisation -->
                <div class="mt-6 bg-white rounded-xl p-4 border border-gray-200">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 mt-0.5">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                            </svg>
                        </div>
                        <div class="flex-1 text-sm">
                            <p class="font-medium text-gray-900 mb-1">💡 Conseils pour un projet remarquable :</p>
                            <ul class="text-gray-600 space-y-1 list-disc list-inside">
                                <li>Utilisez des mots-clés pertinents dans le titre et la description</li>
                                <li>Ajoutez une image de haute qualité qui illustre votre projet</li>
                                <li>Détaillez les technologies utilisées pour montrer vos compétences</li>
                                <li>Incluez des métriques pour prouver l'impact de votre travail</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
.tech-tag {
    @apply px-3 py-1 text-xs bg-white hover:bg-gray-100 text-gray-700 hover:text-gray-900 border border-gray-200 hover:border-gray-300 rounded-full transition-all duration-200 cursor-pointer;
}
.tech-tag:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
</style>

<script>
// Compteurs de caractères
function setupCharacterCounters() {
    const title = document.getElementById('title');
    const titleCounter = document.getElementById('title-counter');
    const shortDesc = document.getElementById('short_description');
    const shortCounter = document.getElementById('short-counter');
    const desc = document.getElementById('description');
    const descCounter = document.getElementById('desc-counter');

    function updateCounter(input, counter, max) {
        const count = input.value.length;
        counter.textContent = `${count}/${max}`;
        
        if (count > max * 0.9) {
            counter.classList.add('text-red-500');
            counter.classList.remove('text-gray-400', 'text-yellow-500');
        } else if (count > max * 0.7) {
            counter.classList.add('text-yellow-500');
            counter.classList.remove('text-gray-400', 'text-red-500');
        } else {
            counter.classList.add('text-gray-400');
            counter.classList.remove('text-yellow-500', 'text-red-500');
        }
    }

    title.addEventListener('input', () => updateCounter(title, titleCounter, 100));
    shortDesc.addEventListener('input', () => updateCounter(shortDesc, shortCounter, 150));
    desc.addEventListener('input', () => updateCounter(desc, descCounter, 1000));
}

// Auto-générer le slug à partir du titre avec aperçu URL
document.getElementById('title').addEventListener('input', function() {
    const title = this.value;
    const slug = title.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim('-');
    
    document.getElementById('slug').value = slug;
    document.getElementById('url-preview').textContent = `/projects/${slug || '[slug]'}`;
});

// Mise à jour de l'aperçu URL quand le slug change
document.getElementById('slug').addEventListener('input', function() {
    document.getElementById('url-preview').textContent = `/projects/${this.value || '[slug]'}`;
});

// Fonctions pour les durées rapides
function setDuration(duration) {
    document.getElementById('duration').value = duration;
}

// Suggestions pour les descriptions
function addSuggestion(fieldId, text) {
    const field = document.getElementById(fieldId);
    const currentValue = field.value;
    field.value = currentValue ? currentValue + ' ' + text : text;
    field.focus();
    field.setSelectionRange(field.value.length, field.value.length);
}

// Fonctions pour les fonctionnalités
function addFeature(feature) {
    const field = document.getElementById('features');
    const currentValue = field.value;
    const newFeature = `✅ ${feature}`;
    field.value = currentValue ? currentValue + '\n' + newFeature : newFeature;
    field.focus();
}

// Gestion des technologies
let selectedTechs = [];

function addTech(tech) {
    if (!selectedTechs.includes(tech)) {
        selectedTechs.push(tech);
        updateTechDisplay();
    }
}

function removeTech(tech) {
    selectedTechs = selectedTechs.filter(t => t !== tech);
    updateTechDisplay();
}

function updateTechDisplay() {
    const techField = document.getElementById('technologies');
    const selectedContainer = document.getElementById('selected-techs');
    const techPreview = document.getElementById('tech-preview');
    
    techField.value = selectedTechs.join(', ');
    
    if (selectedTechs.length > 0) {
        selectedContainer.classList.remove('hidden');
        techPreview.innerHTML = selectedTechs.map(tech => 
            `<span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                ${tech}
                <button type="button" onclick="removeTech('${tech}')" class="ml-2 text-purple-600 hover:text-purple-800">×</button>
            </span>`
        ).join('');
    } else {
        selectedContainer.classList.add('hidden');
    }
}

// Gestion de la progression du formulaire
function updateFormProgress() {
    const requiredFields = document.querySelectorAll('input[required], textarea[required], select[required]');
    let filledFields = 0;
    
    requiredFields.forEach(field => {
        if (field.value.trim() !== '') {
            filledFields++;
        }
    });
    
    const progress = Math.round((filledFields / requiredFields.length) * 100);
    const progressBar = document.getElementById('form-progress');
    const progressText = document.getElementById('progress-text');
    
    if (progressBar) {
        progressBar.style.width = progress + '%';
    }
    
    if (progressText) {
        if (progress === 0) {
            progressText.textContent = 'Commencez à remplir le formulaire';
        } else if (progress < 30) {
            progressText.textContent = `${progress}% - Bon début ! 🌱`;
        } else if (progress < 70) {
            progressText.textContent = `${progress}% - Vous progressez bien ! 🚀`;
        } else if (progress < 100) {
            progressText.textContent = `${progress}% - Presque terminé ! 🔥`;
        } else {
            progressText.textContent = `${progress}% - Parfait ! Prêt à créer 🎉`;
        }
    }
    
    // Mise à jour des étapes
    updateStepProgress(progress);
    
    // Mise à jour du résumé
    updateProjectSummary();
}

// Gestion des étapes visuelles
function updateStepProgress(progress) {
    const step1 = document.getElementById('step-1');
    const step2 = document.getElementById('step-2');
    const step3 = document.getElementById('step-3');
    const progress12 = document.getElementById('progress-1-2');
    const progress23 = document.getElementById('progress-2-3');
    
    // Étape 1 (0-33%)
    if (progress >= 10) {
        step1.classList.remove('text-gray-400');
        step1.classList.add('text-purple-600');
        step1.querySelector('div').classList.remove('bg-gray-100', 'border-gray-200');
        step1.querySelector('div').classList.add('bg-purple-100', 'border-purple-300');
        step1.querySelector('span').classList.remove('text-gray-400');
        step1.querySelector('span').classList.add('text-purple-700');
    }
    
    // Progression 1-2
    if (progress >= 33) {
        progress12.style.width = '100%';
        
        // Étape 2
        step2.classList.remove('text-gray-400');
        step2.classList.add('text-blue-600');
        step2.querySelector('div').classList.remove('bg-gray-100', 'border-gray-200');
        step2.querySelector('div').classList.add('bg-blue-100', 'border-blue-300');
        step2.querySelector('span').classList.remove('text-gray-400');
        step2.querySelector('span').classList.add('text-blue-700');
    } else if (progress > 10) {
        progress12.style.width = ((progress - 10) / 23 * 100) + '%';
    }
    
    // Progression 2-3
    if (progress >= 66) {
        progress23.style.width = '100%';
        
        // Étape 3
        step3.classList.remove('text-gray-400');
        step3.classList.add('text-green-600');
        step3.querySelector('div').classList.remove('bg-gray-100', 'border-gray-200');
        step3.querySelector('div').classList.add('bg-green-100', 'border-green-300');
        step3.querySelector('span').classList.remove('text-gray-400');
        step3.querySelector('span').classList.add('text-green-700');
    } else if (progress > 33) {
        progress23.style.width = ((progress - 33) / 33 * 100) + '%';
    }
}

// Mise à jour du résumé du projet
function updateProjectSummary() {
    const title = document.getElementById('title').value;
    const category = document.getElementById('category').value;
    const technologies = document.getElementById('technologies').value;
    const performance = document.getElementById('performance_score').value;
    const users = document.getElementById('users_count').value;
    const satisfaction = document.getElementById('satisfaction_rate').value;
    
    if (title || category || technologies || performance || users || satisfaction) {
        document.getElementById('project-summary').classList.remove('hidden');
        
        document.getElementById('summary-title').textContent = title || 'Titre non défini';
        document.getElementById('summary-category').textContent = category ? getCategoryLabel(category) : 'Catégorie non définie';
        document.getElementById('summary-tech').textContent = technologies || 'Technologies non définies';
        
        let metrics = [];
        if (performance) metrics.push(`Performance: ${performance}%`);
        if (users) metrics.push(`Utilisateurs: ${users}`);
        if (satisfaction) metrics.push(`Satisfaction: ${satisfaction}%`);
        document.getElementById('summary-metrics').textContent = metrics.length ? metrics.join(' • ') : 'Métriques non définies';
    }
}

// Fonctions de gestion des projets
function showProjectsList() {
    window.open('{{ route("admin.projects") }}', '_blank');
}

function duplicateProject() {
    // Simuler une liste de projets pour duplication
    const projects = [
        { id: 1, title: 'TaskFlow Pro', category: 'mobile' },
        { id: 2, title: 'ShopMaster Pro', category: 'ecommerce' },
        { id: 3, title: 'Dashboard Analytics', category: 'web' }
    ];
    
    let projectOptions = projects.map(p => `<option value="${p.id}">${p.title} (${getCategoryLabel(p.category)})</option>`).join('');
    
    const modal = `
        <div id="duplicate-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-2xl p-6 max-w-md w-full mx-4">
                <h3 class="text-lg font-bold mb-4">🔄 Dupliquer un projet existant</h3>
                <select id="project-select" class="w-full p-3 border border-gray-300 rounded-lg mb-4">
                    <option value="">Sélectionnez un projet à dupliquer</option>
                    ${projectOptions}
                </select>
                <div class="flex space-x-3">
                    <button onclick="closeDuplicateModal()" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Annuler</button>
                    <button onclick="executeDuplicate()" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Dupliquer</button>
                </div>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modal);
}

function closeDuplicateModal() {
    const modal = document.getElementById('duplicate-modal');
    if (modal) modal.remove();
}

function executeDuplicate() {
    const projectId = document.getElementById('project-select').value;
    if (projectId) {
        // Simuler le remplissage avec des données d'un projet existant
        const projectData = {
            1: {
                title: 'TaskFlow Pro (Copie)',
                slug: 'taskflow-pro-copie',
                category: 'mobile',
                duration: '3 mois',
                short_description: 'Application mobile de gestion des tâches',
                technologies: 'React Native, Node.js, MongoDB'
            },
            2: {
                title: 'ShopMaster Pro (Copie)',
                slug: 'shopmaster-pro-copie',
                category: 'ecommerce',
                duration: '4 mois',
                short_description: 'Plateforme e-commerce complète',
                technologies: 'PHP, Laravel, Vue.js, MySQL'
            }
        };
        
        const data = projectData[projectId];
        if (data) {
            Object.keys(data).forEach(key => {
                const field = document.getElementById(key);
                if (field) {
                    field.value = data[key];
                    field.dispatchEvent(new Event('input'));
                }
            });
        }
        
        closeDuplicateModal();
        updateFormProgress();
    }
}

function showTemplates() {
    const templates = [
        { name: 'Application Mobile Flutter', icon: '📱', fields: { category: 'mobile', technologies: 'Flutter, Dart, Firebase, API Laravel' }},
        { name: 'Application React Native', icon: '📱', fields: { category: 'mobile', technologies: 'React Native, Firebase, Node.js' }},
        { name: 'Site E-commerce', icon: '🛒', fields: { category: 'ecommerce', technologies: 'PHP, Laravel, MySQL, Stripe' }},
        { name: 'Application Web', icon: '🌐', fields: { category: 'web', technologies: 'Vue.js, Node.js, PostgreSQL' }},
        { name: 'API Backend', icon: '⚙️', fields: { category: 'api', technologies: 'Node.js, Express, MongoDB, JWT' }},
        { name: 'App Flutter + Laravel', icon: '🚀', fields: { category: 'mobile', technologies: 'Flutter, Dart, Laravel, MySQL' }}
    ];
    
    let templateOptions = templates.map(t => 
        `<div onclick="applyTemplate('${JSON.stringify(t.fields).replace(/"/g, '&quot;')}')" class="p-4 border border-gray-200 rounded-lg hover:bg-blue-50 hover:border-blue-300 cursor-pointer transition-colors">
            <div class="text-2xl mb-2">${t.icon}</div>
            <div class="font-semibold">${t.name}</div>
        </div>`
    ).join('');
    
    const modal = `
        <div id="template-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-2xl p-6 max-w-2xl w-full mx-4">
                <h3 class="text-lg font-bold mb-4">📝 Choisir un template de projet</h3>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    ${templateOptions}
                </div>
                <button onclick="closeTemplateModal()" class="w-full px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Fermer</button>
            </div>
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', modal);
}

function closeTemplateModal() {
    const modal = document.getElementById('template-modal');
    if (modal) modal.remove();
}

function applyTemplate(fieldsJson) {
    const fields = JSON.parse(fieldsJson.replace(/&quot;/g, '"'));
    Object.keys(fields).forEach(key => {
        const field = document.getElementById(key);
        if (field) {
            field.value = fields[key];
            field.dispatchEvent(new Event('input'));
        }
    });
    closeTemplateModal();
    updateFormProgress();
}

// Gestion du menu d'actions
function toggleActionsMenu() {
    const menu = document.getElementById('actions-menu');
    if (menu) {
        menu.classList.toggle('hidden');
    }
}

function saveAsDraft() {
    // Simuler la sauvegarde en brouillon
    const formData = new FormData(document.querySelector('form'));
    localStorage.setItem('project_draft', JSON.stringify(Object.fromEntries(formData)));
    
    showNotification('💾 Projet sauvegardé en brouillon', 'success');
    toggleActionsMenu();
}

function previewProject() {
    updateProjectSummary();
    document.getElementById('project-summary').scrollIntoView({ behavior: 'smooth' });
    showNotification('👁️ Aperçu du projet mis à jour', 'info');
    toggleActionsMenu();
}

function resetForm() {
    if (confirm('⚠️ Êtes-vous sûr de vouloir réinitialiser le formulaire ? Toutes les données seront perdues.')) {
        document.querySelector('form').reset();
        localStorage.removeItem('project_draft');
        updateFormProgress();
        showNotification('🔄 Formulaire réinitialisé', 'warning');
    }
    toggleActionsMenu();
}

// Notifications
function showNotification(message, type = 'info') {
    const colors = {
        success: 'bg-green-100 border-green-400 text-green-700',
        error: 'bg-red-100 border-red-400 text-red-700',
        warning: 'bg-yellow-100 border-yellow-400 text-yellow-700',
        info: 'bg-blue-100 border-blue-400 text-blue-700'
    };
    
    const notification = `
        <div class="fixed top-4 right-4 z-50 ${colors[type]} px-4 py-3 rounded-lg border shadow-lg transition-all duration-300 transform translate-x-full" id="notification">
            ${message}
        </div>
    `;
    
    document.body.insertAdjacentHTML('beforeend', notification);
    
    const notif = document.getElementById('notification');
    setTimeout(() => notif.classList.remove('translate-x-full'), 100);
    setTimeout(() => {
        notif.classList.add('translate-x-full');
        setTimeout(() => notif.remove(), 300);
    }, 3000);
}

function getCategoryLabel(category) {
    const labels = {
        mobile: '📱 Application Mobile',
        web: '🌐 Application Web',
        ecommerce: '🛒 E-commerce',
        design: '🎨 Design UI/UX',
        api: '⚙️ API & Backend',
        other: '🔧 Autre'
    };
    return labels[category] || category;
}

// Barre de progression pour le score de performance
function updatePerformanceBar(value) {
    const bar = document.getElementById('performance-bar');
    const label = document.getElementById('performance-label');
    
    if (!value) {
        bar.style.width = '0%';
        label.textContent = 'Aucun score';
        return;
    }
    
    const percentage = Math.min(100, Math.max(0, value));
    bar.style.width = percentage + '%';
    
    if (percentage >= 90) {
        bar.className = 'bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-300';
        label.textContent = '🚀 Performance exceptionnelle !';
    } else if (percentage >= 70) {
        bar.className = 'bg-gradient-to-r from-yellow-400 to-yellow-600 h-3 rounded-full transition-all duration-300';
        label.textContent = '✨ Bonne performance';
    } else {
        bar.className = 'bg-gradient-to-r from-red-400 to-red-600 h-3 rounded-full transition-all duration-300';
        label.textContent = '⚠️ Performance à améliorer';
    }
}

// Formatage du nombre d'utilisateurs
function formatUserCount(value) {
    const label = document.getElementById('users-formatted');
    if (!value || value == 0) {
        label.textContent = '0 utilisateur';
        return;
    }
    
    const num = parseInt(value);
    if (num >= 1000000) {
        label.textContent = `${(num / 1000000).toFixed(1)}M utilisateurs`;
    } else if (num >= 1000) {
        label.textContent = `${(num / 1000).toFixed(1)}K utilisateurs`;
    } else {
        label.textContent = `${num} utilisateur${num > 1 ? 's' : ''}`;
    }
}

function setUsers(count) {
    document.getElementById('users_count').value = count;
    formatUserCount(count);
}

// Emoji de satisfaction
function updateSatisfactionEmoji(value) {
    const emoji = document.getElementById('satisfaction-emoji');
    const label = document.getElementById('satisfaction-label');
    
    if (!value) {
        emoji.textContent = '😐';
        label.textContent = 'Aucune donnée';
        return;
    }
    
    const rate = parseInt(value);
    if (rate >= 95) {
        emoji.textContent = '🤩';
        label.textContent = 'Extraordinaire !';
    } else if (rate >= 85) {
        emoji.textContent = '😍';
        label.textContent = 'Excellent !';
    } else if (rate >= 75) {
        emoji.textContent = '😊';
        label.textContent = 'Très satisfaisant';
    } else if (rate >= 60) {
        emoji.textContent = '😐';
        label.textContent = 'Satisfaisant';
    } else {
        emoji.textContent = '😞';
        label.textContent = 'À améliorer';
    }
}

// Prévisualisation d'image améliorée
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const previewContainer = document.getElementById('image-preview-container');
    const preview = document.getElementById('image-preview');
    
    if (file) {
        if (file.size > 2 * 1024 * 1024) {
            alert('⚠️ L\'image est trop voluminieuse. Taille maximum: 2MB');
            this.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        previewContainer.classList.add('hidden');
    }
});

function removeImage() {
    document.getElementById('image').value = '';
    document.getElementById('image-preview-container').classList.add('hidden');
}

// Drag & Drop pour l'image
const imageUploadArea = document.querySelector('[for="image"]').closest('.flex');
imageUploadArea.addEventListener('dragover', function(e) {
    e.preventDefault();
    this.classList.add('border-purple-400', 'bg-purple-50');
});

imageUploadArea.addEventListener('dragleave', function(e) {
    e.preventDefault();
    this.classList.remove('border-purple-400', 'bg-purple-50');
});

imageUploadArea.addEventListener('drop', function(e) {
    e.preventDefault();
    this.classList.remove('border-purple-400', 'bg-purple-50');
    
    const files = e.dataTransfer.files;
    if (files.length > 0) {
        document.getElementById('image').files = files;
        document.getElementById('image').dispatchEvent(new Event('change'));
    }
});

// Animation au scroll pour les sections
function setupScrollAnimations() {
    const sections = document.querySelectorAll('[class*="border-l-4"]');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'slideInLeft 0.6s ease-out';
            }
        });
    }, { threshold: 0.1 });
    
    sections.forEach(section => observer.observe(section));
}

// Validation en temps réel
function setupRealtimeValidation() {
    const requiredFields = document.querySelectorAll('input[required], textarea[required], select[required]');
    
    requiredFields.forEach(field => {
        field.addEventListener('blur', function() {
            if (this.value.trim() === '') {
                this.classList.add('border-red-300', 'ring-red-500');
                this.classList.remove('border-gray-200', 'focus:ring-purple-500');
            } else {
                this.classList.remove('border-red-300', 'ring-red-500');
                this.classList.add('border-green-300');
            }
        });
        
        field.addEventListener('input', function() {
            if (this.value.trim() !== '') {
                this.classList.remove('border-red-300', 'ring-red-500');
                this.classList.add('border-green-300');
            }
        });
    });
}

// Sauvegarde automatique dans localStorage
function setupAutoSave() {
    const form = document.querySelector('form');
    const formData = new FormData(form);
    
    const inputs = form.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            localStorage.setItem(`project_form_${this.name}`, this.value);
        });
    });
    
    // Restaurer les données au chargement
    inputs.forEach(input => {
        const savedValue = localStorage.getItem(`project_form_${input.name}`);
        if (savedValue && !input.value) {
            input.value = savedValue;
        }
    });
}

// Initialisation complète
document.addEventListener('DOMContentLoaded', function() {
    setupCharacterCounters();
    setupScrollAnimations();
    setupRealtimeValidation();
    setupAutoSave();
    
    // Écouteurs pour la progression
    const formFields = document.querySelectorAll('input, textarea, select');
    formFields.forEach(field => {
        field.addEventListener('input', updateFormProgress);
        field.addEventListener('change', updateFormProgress);
    });
    
    // Fermer les menus en cliquant à l'extérieur
    document.addEventListener('click', function(e) {
        const actionsMenu = document.getElementById('actions-menu');
        if (actionsMenu && !e.target.closest('[onclick="toggleActionsMenu()"]') && !e.target.closest('#actions-menu')) {
            actionsMenu.classList.add('hidden');
        }
    });
    
    // Raccourcis clavier
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + S pour sauvegarder
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            saveAsDraft();
        }
        
        // Ctrl/Cmd + Enter pour soumettre
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            e.preventDefault();
            document.querySelector('form').submit();
        }
        
        // Escape pour fermer les modales
        if (e.key === 'Escape') {
            closeDuplicateModal();
            closeTemplateModal();
            const actionsMenu = document.getElementById('actions-menu');
            if (actionsMenu) actionsMenu.classList.add('hidden');
        }
    });
    
    // Restoration des données de brouillon
    const draftData = localStorage.getItem('project_draft');
    if (draftData) {
        try {
            const data = JSON.parse(draftData);
            Object.keys(data).forEach(key => {
                const field = document.querySelector(`[name="${key}"]`);
                if (field && !field.value) {
                    field.value = data[key];
                }
            });
            showNotification('📋 Brouillon restauré automatiquement', 'info');
        } catch (e) {
            console.log('Erreur lors de la restoration du brouillon');
        }
    }
    
    // Animation d'entrée progressive
    document.body.style.opacity = '0';
    setTimeout(() => {
        document.body.style.transition = 'opacity 0.8s ease-in';
        document.body.style.opacity = '1';
        
        // Animation des sections
        const sections = document.querySelectorAll('.space-y-8 > div');
        sections.forEach((section, index) => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            setTimeout(() => {
                section.style.transition = 'all 0.6s ease-out';
                section.style.opacity = '1';
                section.style.transform = 'translateY(0)';
            }, 150 * index);
        });
    }, 200);
    
    // Initialiser la progression
    updateFormProgress();
    
    // Messages d'encouragement aléatoires
    const encouragements = [
        '🌟 Vous créez quelque chose d\'exceptionnel !',
        '🚀 Votre projet va impressionner !',
        '💡 Chaque détail compte pour l\'excellence !',
        '🎯 Vous êtes sur la bonne voie !',
        '✨ Votre créativité brille déjà !'
    ];
    
    setInterval(() => {
        const randomMsg = encouragements[Math.floor(Math.random() * encouragements.length)];
        const progressText = document.getElementById('progress-text');
        if (progressText && Math.random() < 0.3) { // 30% de chance
            const originalText = progressText.textContent;
            progressText.textContent = randomMsg;
            setTimeout(() => {
                progressText.textContent = originalText;
            }, 2000);
        }
    }, 30000); // Toutes les 30 secondes
});

// CSS pour les animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    .form-section {
        transition: all 0.3s ease;
    }
    
    .form-section:hover {
        transform: translateY(-2px);
    }
`;
document.head.appendChild(style);
</script>

@push('scripts')
<script src="{{ asset('js/admin-form-enhancements.js') }}"></script>
@endpush
@endsection
