@extends('admin.layout')

@section('title', 'Créer un Nouveau Projet - Étape ' . $step)

@push('styles')
<link href="{{ asset('css/admin-form.css') }}" rel="stylesheet">
<style>
    .step-indicator {
        display: flex;
        justify-content: center;
        margin-bottom: 2rem;
    }
    
    .step-item {
        display: flex;
        align-items: center;
        margin: 0 1rem;
        position: relative;
    }
    
    .step-number {
        width: 40px; <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3 rounded-xl shadow-lg text-base font-bold text-white bg-gradient-to-br from-indigo-700 via-purple-700 to-blue-700 hover:from-indigo-800 hover:via-purple-800 hover:to-blue-800 focus:outline-none focus:ring-4 focus:ring-purple-400 focus:ring-offset-2 transition-all duration-300 relative overflow-hidden group">
                            <!-- Animation de fond dynamique -->
                            <span class="absolute inset-0 bg-gradient-to-r from-purple-400 via-indigo-400 to-blue-400 opacity-0 group-hover:opacity-40 transition-opacity duration-300 pointer-events-none"></span>
                            <!-- Effet de brillance -->
                            <span class="absolute left-0 top-0 w-1/3 h-full bg-gradient-to-r from-white via-transparent to-transparent opacity-0 group-hover:opacity-30 group-hover:translate-x-full transition-all duration-700 pointer-events-none"></span>
                            <span class="flex items-center relative z-10 space-x-2">
                                <svg class="h-6 w-6 text-white group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                <span class="tracking-wide">Créer le Projet</span>
                            </span>
                            <!-- Badge d'action -->
                            <span class="absolute -top-3 -right-3 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md animate-bounce">Nouveau</span>
                        </button>
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        border: 2px solid #e5e7eb;
        background: white;
        color: #6b7280;
        transition: all 0.3s ease;
    }
    
    .step-item.active .step-number {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        color: white;
        border-color: #4f46e5;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }
    
    .step-item.completed .step-number {
        background: #10b981;
        color: white;
        border-color: #10b981;
    }
    
    .step-label {
        margin-left: 0.5rem;
        font-weight: 500;
        color: #6b7280;
    }
    
    .step-item.active .step-label {
        color: #4f46e5;
        font-weight: 600;
    }
    
    .step-item.completed .step-label {
        color: #10b981;
    }
    
    .step-connector {
        width: 60px;
        height: 2px;
        background: #e5e7eb;
        margin: 0 1rem;
    }
    
    .step-connector.completed {
        background: #10b981;
    }
    
    .form-container {
        max-width: 800px;
        margin: 0 auto;
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    
    .navigation-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
    }
    
    @media (max-width: 768px) {
        .step-indicator {
            flex-direction: column;
            align-items: center;
        }
        
        .step-connector {
            width: 2px;
            height: 30px;
            margin: 0.5rem 0;
        }
        
        .step-item {
            flex-direction: column;
            text-align: center;
            margin: 0;
        }
        
        .step-label {
            margin-left: 0;
            margin-top: 0.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-50 via-blue-50 to-indigo-100 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Créer un Nouveau Projet</h1>
            @php
                $stepTitles = [1 => 'Identité', 2 => 'Contenu', 3 => 'Technologies', 4 => 'Médias'];
            @endphp
            <p class="text-gray-600">Étape {{ $step }} sur 4 - {{ $stepTitles[$step] }}</p>
        </div>

        <!-- Indicateur d'étapes -->
        <div class="step-indicator">
            @for ($i = 1; $i <= 4; $i++)
                <div class="step-item {{ $i == $step ? 'active' : '' }} {{ $i < $step ? 'completed' : '' }}">
                    <div class="step-number">
                        @if ($i < $step)
                            <i class="fas fa-check"></i>
                        @else
                            {{ $i }}
                        @endif
                    </div>
                    <div class="step-label">{{ $stepTitles[$i] }}</div>
                </div>
                @if ($i < 4)
                    <div class="step-connector {{ $i < $step ? 'completed' : '' }}"></div>
                @endif
            @endfor
        </div>

        <!-- Formulaire -->
        <div class="form-container">
            <form method="POST" action="{{ route('admin.projects.store.step', $step) }}" enctype="multipart/form-data" id="stepForm">
                @csrf
                
                @if ($step == 1)
                    @include('admin.projects.steps.identity')
                @elseif ($step == 2)
                    @include('admin.projects.steps.content')
                @elseif ($step == 3)
                    @include('admin.projects.steps.technology')
                @elseif ($step == 4)
                    @include('admin.projects.steps.media')
                @endif

                <!-- Navigation -->
                <div class="navigation-buttons">
                    <div>
                        @if ($step > 1)
                            <a href="{{ route('admin.projects.create.step', $step - 1) }}" 
                               class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-200">
                                <i class="fas fa-arrow-left mr-2"></i>
                                Précédent
                            </a>
                        @else
                            <a href="{{ route('admin.projects') }}" 
                               class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-200">
                                <i class="fas fa-times mr-2"></i>
                                Annuler
                            </a>
                        @endif
                    </div>
                    
                    <div>
                        @if ($step < 4)
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-purple-500 shadow-lg transform hover:scale-105 transition-all duration-200">
                                Suivant
                                <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        @else
                            <button type="submit" 
                                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-green-500 shadow-lg transform hover:scale-105 transition-all duration-200">
                                <i class="fas fa-rocket mr-2"></i>
                                Créer le Projet
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>

        <!-- Progress Bar -->
        <div class="mt-8 max-w-md mx-auto">
            <div class="bg-gray-200 rounded-full h-2">
                <div class="bg-gradient-to-r from-purple-600 to-indigo-600 h-2 rounded-full transition-all duration-500" 
                     style="width: {{ ($step / 4) * 100 }}%"></div>
            </div>
            <p class="text-center text-sm text-gray-600 mt-2">{{ round(($step / 4) * 100) }}% complété</p>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-save functionality
    let autoSaveTimeout;
    const form = document.getElementById('stepForm');
    const inputs = form.querySelectorAll('input, textarea, select');
    
    inputs.forEach(input => {
        input.addEventListener('input', function() {
            clearTimeout(autoSaveTimeout);
            showAutoSaveIndicator('saving');
            
            autoSaveTimeout = setTimeout(() => {
                autoSaveFormData();
            }, 2000);
        });
    });
    
    function autoSaveFormData() {
        const formData = new FormData(form);
        // Simulation de sauvegarde automatique
        showAutoSaveIndicator('saved');
    }
    
    function showAutoSaveIndicator(status) {
        // Créer ou mettre à jour l'indicateur de sauvegarde
        let indicator = document.getElementById('autoSaveIndicator');
        if (!indicator) {
            indicator = document.createElement('div');
            indicator.id = 'autoSaveIndicator';
            indicator.className = 'fixed top-4 right-4 px-4 py-2 rounded-lg shadow-lg z-50 transition-all duration-300';
            document.body.appendChild(indicator);
        }
        
        if (status === 'saving') {
            indicator.className = 'fixed top-4 right-4 px-4 py-2 rounded-lg shadow-lg z-50 transition-all duration-300 bg-yellow-500 text-white';
            indicator.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Sauvegarde...';
        } else {
            indicator.className = 'fixed top-4 right-4 px-4 py-2 rounded-lg shadow-lg z-50 transition-all duration-300 bg-green-500 text-white';
            indicator.innerHTML = '<i class="fas fa-check mr-2"></i>Sauvegardé';
            
            setTimeout(() => {
                indicator.style.opacity = '0';
                setTimeout(() => {
                    if (indicator.parentNode) {
                        indicator.parentNode.removeChild(indicator);
                    }
                }, 300);
            }, 2000);
        }
    }
    
    // Validation en temps réel
    form.addEventListener('submit', function(e) {
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('border-red-500');
                field.classList.remove('border-gray-300');
            } else {
                field.classList.remove('border-red-500');
                field.classList.add('border-gray-300');
            }
        });
        
        if (!isValid) {
            e.preventDefault();
            showNotification('Veuillez remplir tous les champs obligatoires.', 'error');
        }
    });
    
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 left-1/2 transform -translate-x-1/2 px-6 py-3 rounded-lg shadow-lg z-50 transition-all duration-300`;
        
        const colors = {
            success: 'bg-green-500 text-white',
            error: 'bg-red-500 text-white',
            warning: 'bg-yellow-500 text-black',
            info: 'bg-blue-500 text-white'
        };
        
        notification.className += ` ${colors[type]}`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 300);
        }, 4000);
    }
});
</script>
@endpush
@endsection
