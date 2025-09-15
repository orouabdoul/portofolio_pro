@extends('admin.layout')

@section('title', 'Message de ' . $message->name)

@push('styles')
<style>
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .glass-effect {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .card-shadow {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    .floating-animation {
        animation: float 6s ease-in-out infinite;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    
    .pulse-animation {
        animation: pulse 2s infinite;
    }
    
    @media (max-width: 768px) {
        .mobile-stack {
            flex-direction: column;
            gap: 1rem;
        }
        
        .mobile-full {
            width: 100% !important;
        }
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">
        <!-- En-tête moderne avec retour -->
        <div class="glass-effect rounded-2xl p-6 card-shadow">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.messages') }}" 
                       class="group flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-arrow-left text-lg group-hover:-translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">
                            Message de {{ $message->name }}
                        </h1>
                        <p class="text-gray-600 mt-1">Gestion des messages de contact</p>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                    @if(!$message->is_read)
                        <form action="{{ route('admin.messages.read', $message->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" 
                                    class="w-full sm:w-auto bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <i class="fas fa-check mr-2"></i>Marquer comme lu
                            </button>
                        </form>
                    @endif
                    
                    <form action="{{ route('admin.messages.delete', $message->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')"
                                class="w-full sm:w-auto bg-gradient-to-r from-red-500 to-pink-600 text-white px-6 py-3 rounded-xl hover:from-red-600 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <i class="fas fa-trash mr-2"></i>Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Message original moderne -->
        <div class="glass-effect rounded-2xl overflow-hidden card-shadow">
            <div class="gradient-bg p-6">
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                    <div class="flex items-start space-x-4">
                        <div class="relative">
                            <div class="h-16 w-16 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center floating-animation">
                                <span class="text-white font-bold text-xl">
                                    {{ substr($message->name, 0, 1) }}
                                </span>
                            </div>
                            <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-400 rounded-full border-2 border-white pulse-animation"></div>
                        </div>
                        <div class="text-white">
                            <h3 class="text-xl sm:text-2xl font-bold">{{ $message->name }}</h3>
                            <p class="text-blue-100 text-lg">{{ $message->email }}</p>
                            <p class="text-blue-200 text-sm mt-1">
                                <i class="fas fa-clock mr-2"></i>{{ $message->created_at->format('d/m/Y à H:i') }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:items-end gap-2">
                        @if($message->is_read)
                            <span class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold bg-green-100/90 text-green-800 backdrop-blur-sm">
                                <i class="fas fa-check-circle mr-2"></i>Lu
                            </span>
                        @else
                            <span class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold bg-blue-100/90 text-blue-800 backdrop-blur-sm">
                                <i class="fas fa-envelope mr-2"></i>Non lu
                            </span>
                        @endif
                        
                        @if($message->replies && $message->replies->count() > 0)
                            <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-medium bg-purple-100/90 text-purple-800 backdrop-blur-sm">
                                <i class="fas fa-reply mr-1"></i>{{ $message->replies->count() }} réponse(s)
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="p-6 bg-white">
                <div class="mb-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                        <i class="fas fa-tag mr-2"></i>{{ $message->subject }}
                    </span>
                </div>
                
                <div class="prose max-w-none">
                    <div class="bg-gray-50 rounded-xl p-6 border-l-4 border-blue-500">
                        <p class="text-gray-800 leading-relaxed whitespace-pre-line text-lg">{{ $message->message }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Réponses existantes modernes -->
        @if($message->replies && $message->replies->count() > 0)
            <div class="space-y-6">
                <div class="glass-effect rounded-2xl p-6 card-shadow">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">
                        <i class="fas fa-reply mr-3 text-purple-600"></i>Réponses envoyées ({{ $message->replies->count() }})
                    </h3>
                    
                    <div class="space-y-4">
                        @foreach($message->replies as $index => $reply)
                            <div class="relative">
                                <!-- Ligne de connexion -->
                                @if(!$loop->last)
                                    <div class="absolute left-6 top-20 w-0.5 h-full bg-gradient-to-b from-purple-300 to-transparent"></div>
                                @endif
                                
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center">
                                            <span class="text-white font-bold">{{ $index + 1 }}</span>
                                        </div>
                                    </div>
                                    
                                    <div class="flex-1 bg-white rounded-xl p-6 shadow-md border border-gray-100">
                                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4 mb-4">
                                            <div>
                                                <h4 class="font-semibold text-gray-900 text-lg">{{ $reply->subject }}</h4>
                                                <p class="text-sm text-gray-600 mt-1">
                                                    <i class="fas fa-user mr-2"></i>{{ $reply->admin_name }} ({{ $reply->admin_email }})
                                                </p>
                                                <p class="text-sm text-gray-500">
                                                    <i class="fas fa-clock mr-2"></i>{{ $reply->created_at->format('d/m/Y à H:i') }}
                                                </p>
                                            </div>
                                            
                                            <div class="flex flex-col items-end gap-2">
                                                @if($reply->sent_successfully)
                                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold bg-green-100 text-green-800">
                                                        <i class="fas fa-check mr-2"></i>Envoyé avec succès
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 rounded-lg text-xs font-semibold bg-red-100 text-red-800">
                                                        <i class="fas fa-times mr-2"></i>Échec d'envoi
                                                    </span>
                                                @endif
                                                
                                                @if(!$reply->sent_successfully && $reply->error_message)
                                                    <button type="button" 
                                                            class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                                            onclick="showErrorModal('{{ addslashes($reply->error_message) }}')">
                                                        <i class="fas fa-info-circle mr-1"></i>Voir l'erreur
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-purple-400">
                                            <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $reply->message }}</p>
                                        </div>
                                        
                                        @if($reply->error_message)
                                            <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                                                <p class="text-sm text-red-700">
                                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                                    Erreur d'envoi : {{ $reply->error_message }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Formulaire de réponse moderne -->
        <div class="glass-effect rounded-2xl overflow-hidden card-shadow">
            <div class="gradient-bg p-6">
                <h3 class="text-2xl font-bold text-white mb-4">
                    <i class="fas fa-reply mr-3"></i>Répondre au message
                </h3>
                
                <!-- Statut de configuration email moderne -->
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center">
                                <i class="fas fa-check-circle text-white text-xl"></i>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-white font-semibold text-lg">Envoi automatique d'email</h4>
                            <p class="text-blue-100">✅ Gmail configuré ! Vos réponses seront envoyées automatiquement par email.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-6 sm:p-8">
                <!-- Notifications -->
                @if(session('success'))
                    <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-check-circle text-green-500 text-xl"></i>
                            </div>
                            <p class="ml-3 text-green-800 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 p-4 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-xl">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                            </div>
                            <p class="ml-3 text-red-800 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-xl">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                            </div>
                            <div class="ml-3">
                                <h5 class="text-red-800 font-semibold mb-2">Erreurs de validation :</h5>
                                <ul class="text-red-700 space-y-1">
                                    @foreach($errors->all() as $error)
                                        <li class="flex items-center">
                                            <i class="fas fa-dot-circle text-xs mr-2"></i>{{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                
                <!-- Option 1: Réponse via le système -->
                <div class="mb-8">
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center">
                                <span class="text-white font-bold">1</span>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-xl font-bold text-gray-900">Option 1: Réponse via le système</h4>
                            <p class="text-gray-600">Utilisez le formulaire ci-dessous (sauvegarde dans les logs)</p>
                        </div>
                    </div>
                    
                    <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div class="lg:col-span-2">
                                <label for="reply_subject" class="block text-sm font-semibold text-gray-700 mb-3">
                                    <i class="fas fa-tag mr-2 text-purple-600"></i>Sujet de la réponse
                                </label>
                                <input type="text" 
                                       id="reply_subject" 
                                       name="reply_subject" 
                                       value="{{ old('reply_subject', 'Re: ' . $message->subject) }}"
                                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition-all duration-300 text-lg"
                                       required>
                            </div>
                            
                            <div class="lg:col-span-2">
                                <label for="reply_message" class="block text-sm font-semibold text-gray-700 mb-3">
                                    <i class="fas fa-edit mr-2 text-purple-600"></i>Votre réponse
                                </label>
                                <textarea id="reply_message" 
                                          name="reply_message" 
                                          rows="10" 
                                          class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition-all duration-300 text-lg resize-none"
                                          placeholder="Tapez votre réponse professionnelle ici..."
                                          required>{{ old('reply_message') }}</textarea>
                                <div id="char-counter" class="text-sm text-gray-500 text-right mt-2"></div>
                            </div>
                        </div>
                        
                        <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl p-6 border border-blue-200">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                                <div class="flex items-center text-gray-700">
                                    <i class="fas fa-info-circle mr-3 text-blue-600 text-lg"></i>
                                    <span class="font-medium">La réponse sera automatiquement envoyée à {{ $message->email }}</span>
                                </div>
                                
                                <button type="submit" 
                                        class="mobile-full bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 shadow-lg font-semibold text-lg">
                                    <i class="fas fa-paper-plane mr-3"></i>Envoyer la réponse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Option 2: Email externe moderne -->
                <div class="border-t border-gray-200 pt-8">
                    <div class="flex items-center mb-6">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                                <span class="text-white font-bold">2</span>
                            </div>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-xl font-bold text-gray-900">Option 2: Email externe</h4>
                            <p class="text-gray-600">Ouvrir votre client email pour répondre manuellement</p>
                        </div>
                    </div>
                    
                    <a href="mailto:{{ $message->email }}?subject=Re: {{ urlencode($message->subject) }}&body={{ urlencode('Bonjour ' . $message->name . ',\n\nMerci pour votre message.\n\n[Votre réponse ici]\n\nCordialement,\nAMADOU ISSIAKA Abdoulaye') }}"
                       class="mobile-full inline-flex items-center bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-8 py-4 rounded-xl hover:from-blue-700 hover:to-cyan-700 transition-all duration-300 transform hover:scale-105 shadow-lg font-semibold text-lg">
                        <i class="fas fa-external-link-alt mr-3"></i>Ouvrir dans votre client email
                    </a>
                </div>
            </div>
        </div>
</div>
    </div>
</div>

<!-- Modal pour afficher les erreurs -->
<div id="errorModal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-2xl p-6 max-w-lg w-full shadow-2xl">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold text-red-800">
                    <i class="fas fa-exclamation-triangle mr-2"></i>Erreur d'envoi
                </h3>
                <button onclick="closeErrorModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="errorContent" class="text-gray-700"></div>
            <div class="mt-6 text-right">
                <button onclick="closeErrorModal()" 
                        class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-focus sur le textarea de réponse avec animation
    const replyTextarea = document.getElementById('reply_message');
    if (replyTextarea && !replyTextarea.value) {
        setTimeout(() => {
            replyTextarea.focus();
            replyTextarea.style.transform = 'scale(1.02)';
            setTimeout(() => {
                replyTextarea.style.transform = 'scale(1)';
            }, 200);
        }, 500);
    }
    
    // Compteur de caractères amélioré
    const textarea = document.getElementById('reply_message');
    if (textarea) {
        const counter = document.getElementById('char-counter');
        
        const updateCounter = () => {
            const length = textarea.value.length;
            const words = textarea.value.trim().split(/\s+/).filter(word => word.length > 0).length;
            
            if (length < 10) {
                counter.innerHTML = `<span class="text-red-500 font-medium">${length} caractères (minimum 10 requis)</span>`;
            } else {
                counter.innerHTML = `<span class="text-gray-500">${length} caractères • ${words} mots</span>`;
            }
        };
        
        textarea.addEventListener('input', updateCounter);
        updateCounter(); // Initial update
        
        // Animation au focus
        textarea.addEventListener('focus', function() {
            this.parentElement.classList.add('transform', 'scale-105');
        });
        
        textarea.addEventListener('blur', function() {
            this.parentElement.classList.remove('transform', 'scale-105');
        });
    }
    
    // Animation des boutons
    const buttons = document.querySelectorAll('button[type="submit"], a[class*="bg-gradient"]');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
    
    // Validation en temps réel
    const form = document.querySelector('form');
    if (form) {
        const subjectInput = document.getElementById('reply_subject');
        const messageTextarea = document.getElementById('reply_message');
        
        function validateField(field, minLength = 1) {
            const value = field.value.trim();
            const isValid = value.length >= minLength;
            
            if (isValid) {
                field.classList.remove('border-red-300');
                field.classList.add('border-green-300');
            } else {
                field.classList.remove('border-green-300');
                field.classList.add('border-red-300');
            }
            
            return isValid;
        }
        
        subjectInput.addEventListener('input', () => validateField(subjectInput));
        messageTextarea.addEventListener('input', () => validateField(messageTextarea, 10));
    }
});

// Fonctions pour le modal d'erreur
function showErrorModal(errorMessage) {
    document.getElementById('errorContent').textContent = errorMessage;
    document.getElementById('errorModal').classList.remove('hidden');
}

function closeErrorModal() {
    document.getElementById('errorModal').classList.add('hidden');
}

// Fermer le modal en cliquant à l'extérieur
document.addEventListener('click', function(e) {
    const modal = document.getElementById('errorModal');
    if (e.target === modal) {
        closeErrorModal();
    }
});

// Animation d'apparition progressive
window.addEventListener('load', function() {
    const elements = document.querySelectorAll('.glass-effect');
    elements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            element.style.transition = 'all 0.6s ease-out';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, index * 200);
    });
});
</script>
@endsection
