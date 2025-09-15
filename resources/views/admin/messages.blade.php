@extends('admin.layout')

@section('title', 'Messages de Contact')

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
    
    .message-row {
        transition: all 0.3s ease;
    }
    
    .message-row:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15);
    }
    
    .unread-indicator {
        animation: pulse 2s infinite;
    }
    
    @media (max-width: 768px) {
        .mobile-stack {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .mobile-hidden {
            display: none;
        }
        
        .mobile-full {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- En-tête moderne -->
        <div class="glass-effect rounded-2xl p-6 mb-8 card-shadow">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">
                        Messages de Contact
                    </h1>
                    <p class="text-gray-600 mt-2">Gérez tous vos messages reçus</p>
                </div>
                
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4">
                    <div class="bg-white/50 backdrop-blur-sm rounded-lg px-4 py-2 border border-gray-200">
                        <span class="text-sm font-medium text-gray-700">
                            <i class="fas fa-envelope mr-2 text-blue-600"></i>{{ $messages->total() }} message(s)
                        </span>
                    </div>
                    
                    <a href="{{ route('admin.contacts.export') }}" 
                       class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <i class="fas fa-download mr-2"></i>Exporter
                    </a>
                </div>
            </div>
        </div>
        <!-- Tableau des messages moderne -->
        <div class="glass-effect rounded-2xl overflow-hidden card-shadow">
            <div class="hidden md:block">
                <!-- Version desktop -->
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="gradient-bg">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                    <i class="fas fa-user mr-2"></i>Contact
                                </th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                    <i class="fas fa-tag mr-2"></i>Sujet
                                </th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                    <i class="fas fa-calendar mr-2"></i>Date
                                </th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                    <i class="fas fa-flag mr-2"></i>Statut
                                </th>
                                <th class="px-6 py-4 text-left text-sm font-bold text-white uppercase tracking-wider">
                                    <i class="fas fa-cog mr-2"></i>Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse($messages as $message)
                                <tr class="message-row {{ !$message->is_read ? 'bg-blue-50/50' : 'hover:bg-gray-50' }}">
                                    <td class="px-6 py-6">
                                        <div class="flex items-center">
                                            <div class="relative flex-shrink-0">
                                                <div class="h-12 w-12 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center shadow-lg">
                                                    <span class="text-white font-bold text-lg">
                                                        {{ substr($message->name, 0, 1) }}
                                                    </span>
                                                </div>
                                                @if(!$message->is_read)
                                                    <div class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full unread-indicator"></div>
                                                @endif
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-semibold text-gray-900">{{ $message->name }}</div>
                                                <div class="text-sm text-gray-600">{{ $message->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6">
                                        <div class="max-w-xs">
                                            <div class="text-sm font-medium text-gray-900 truncate">{{ $message->subject }}</div>
                                            <div class="text-sm text-gray-500 truncate mt-1">{{ Str::limit($message->message, 50) }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-medium">{{ $message->created_at->format('d/m/Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $message->created_at->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-6 whitespace-nowrap">
                                        @if($message->is_read)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                                <i class="fas fa-check-circle mr-1"></i>Lu
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                                <i class="fas fa-envelope mr-1"></i>Non lu
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-6 whitespace-nowrap">
                                        <div class="flex items-center space-x-3">
                                            <a href="{{ route('admin.message.show', $message->id) }}" 
                                               class="text-purple-600 hover:text-purple-900 transition-colors p-2 rounded-lg hover:bg-purple-50"
                                               title="Voir le message">
                                                <i class="fas fa-eye text-lg"></i>
                                            </a>
                                            
                                            @if(!$message->is_read)
                                                <form action="{{ route('admin.messages.read', $message->id) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit"
                                                            class="text-green-600 hover:text-green-900 transition-colors p-2 rounded-lg hover:bg-green-50"
                                                            title="Marquer comme lu">
                                                        <i class="fas fa-check text-lg"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <form action="{{ route('admin.messages.delete', $message->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')"
                                                        class="text-red-600 hover:text-red-900 transition-colors p-2 rounded-lg hover:bg-red-50"
                                                        title="Supprimer">
                                                    <i class="fas fa-trash text-lg"></i>
                                                </button>
                                            </form>
                                            
                                            <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}"
                                               class="text-blue-600 hover:text-blue-900 transition-colors p-2 rounded-lg hover:bg-blue-50"
                                               title="Répondre par email">
                                                <i class="fas fa-reply text-lg"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-16 text-center">
                                        <div class="text-gray-500">
                                            <i class="fas fa-inbox text-6xl mb-4 text-gray-300"></i>
                                            <p class="text-xl font-medium mb-2">Aucun message pour le moment</p>
                                            <p class="text-sm">Les nouveaux messages apparaîtront ici</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Version mobile -->
            <div class="md:hidden bg-white">
                @forelse($messages as $message)
                    <div class="p-4 border-b border-gray-100 {{ !$message->is_read ? 'bg-blue-50' : '' }}">
                        <div class="flex items-start space-x-3">
                            <div class="relative flex-shrink-0">
                                <div class="h-12 w-12 rounded-xl bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
                                    <span class="text-white font-bold">{{ substr($message->name, 0, 1) }}</span>
                                </div>
                                @if(!$message->is_read)
                                    <div class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></div>
                                @endif
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <p class="text-sm font-semibold text-gray-900 truncate">{{ $message->name }}</p>
                                        <p class="text-xs text-gray-600 truncate">{{ $message->email }}</p>
                                        <p class="text-sm font-medium text-gray-900 mt-1 truncate">{{ $message->subject }}</p>
                                        <p class="text-xs text-gray-500 mt-1">{{ Str::limit($message->message, 80) }}</p>
                                    </div>
                                    
                                    <div class="ml-2 flex-shrink-0">
                                        @if($message->is_read)
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-green-100 text-green-800">
                                                <i class="fas fa-check mr-1"></i>Lu
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-blue-100 text-blue-800">
                                                <i class="fas fa-envelope mr-1"></i>Non lu
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="flex items-center justify-between mt-3">
                                    <span class="text-xs text-gray-500">{{ $message->created_at->format('d/m/Y H:i') }}</span>
                                    
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('admin.message.show', $message->id) }}" 
                                           class="bg-purple-100 text-purple-600 p-2 rounded-lg">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        
                                        @if(!$message->is_read)
                                            <form action="{{ route('admin.messages.read', $message->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="bg-green-100 text-green-600 p-2 rounded-lg">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </form>
                                        @endif
                                        
                                        <form action="{{ route('admin.messages.delete', $message->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Supprimer ce message ?')"
                                                    class="bg-red-100 text-red-600 p-2 rounded-lg">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-16 text-center">
                        <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                        <p class="text-lg font-medium text-gray-500 mb-2">Aucun message</p>
                        <p class="text-sm text-gray-400">Les messages apparaîtront ici</p>
                    </div>
                @endforelse
            </div>
        </div>
        <!-- Pagination moderne -->
        @if($messages->hasPages())
            <div class="glass-effect rounded-2xl p-6 mt-8 card-shadow">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-700">
                        Affichage de {{ $messages->firstItem() }} à {{ $messages->lastItem() }} sur {{ $messages->total() }} résultats
                    </div>
                    
                    <div class="flex items-center space-x-2">
                        {{-- Bouton précédent --}}
                        @if ($messages->onFirstPage())
                            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                <i class="fas fa-chevron-left mr-2"></i>Précédent
                            </span>
                        @else
                            <a href="{{ $messages->previousPageUrl() }}" 
                               class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                <i class="fas fa-chevron-left mr-2"></i>Précédent
                            </a>
                        @endif

                        {{-- Numéros de pages --}}
                        @foreach ($messages->getUrlRange(1, $messages->lastPage()) as $page => $url)
                            @if ($page == $messages->currentPage())
                                <span class="px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" 
                                   class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Bouton suivant --}}
                        @if ($messages->hasMorePages())
                            <a href="{{ $messages->nextPageUrl() }}" 
                               class="px-4 py-2 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                                Suivant<i class="fas fa-chevron-right ml-2"></i>
                            </a>
                        @else
                            <span class="px-4 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                                Suivant<i class="fas fa-chevron-right ml-2"></i>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation d'apparition progressive des cartes
    const messageRows = document.querySelectorAll('.message-row');
    messageRows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            row.style.transition = 'all 0.6s ease-out';
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, index * 100);
    });
    
    // Animation des boutons d'action
    const actionButtons = document.querySelectorAll('a[title], button[title]');
    actionButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
    
    // Confirmation améliorée pour la suppression
    const deleteButtons = document.querySelectorAll('button[onclick*="confirm"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (confirm('Êtes-vous sûr de vouloir supprimer ce message ? Cette action est irréversible.')) {
                this.closest('form').submit();
            }
        });
    });
    
    // Indicateur de chargement pour les actions
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            if (button) {
                button.disabled = true;
                button.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            }
        });
    });
});

// Animation d'apparition globale
window.addEventListener('load', function() {
    const elements = document.querySelectorAll('.glass-effect');
    elements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        
        setTimeout(() => {
            element.style.transition = 'all 0.8s ease-out';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }, index * 300);
    });
});
</script>
@endsection