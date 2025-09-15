@extends('admin.layout')

@section('title', 'Détail du message')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- En-tête du message -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 mb-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.messages') }}" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-arrow-left text-lg"></i>
                    </a>
                    <h1 class="text-xl font-semibold text-gray-900">Détail du message</h1>
                </div>
                <div class="flex items-center space-x-2">
                    @if(!$message->is_read)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            <i class="fas fa-dot-circle mr-1"></i>
                            Nouveau
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i>
                            Lu
                        </span>
                    @endif
                    <span class="text-sm text-gray-500">{{ $message->created_at->setTimezone('Europe/Paris')->format('d/m/Y à H:i') }}</span>
                </div>
            </div>
        </div>

        <!-- Informations du contact -->
        <div class="px-6 py-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-lg">{{ substr($message->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">{{ $message->name }}</h2>
                            <p class="text-gray-600">Contact client</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-gray-400 w-5"></i>
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <a href="mailto:{{ $message->email }}" class="text-blue-600 hover:text-blue-700 font-medium">
                                    {{ $message->email }}
                                </a>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-tag text-gray-400 w-5"></i>
                            <div>
                                <p class="text-sm text-gray-500">Sujet</p>
                                <p class="font-medium text-gray-900">{{ $message->subject }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-globe text-gray-400 w-5"></i>
                            <div>
                                <p class="text-sm text-gray-500">Adresse IP</p>
                                <p class="font-medium text-gray-900">{{ $message->ip_address ?? 'Non disponible' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions rapides -->
                <div class="space-y-4">
                    <h3 class="text-sm font-medium text-gray-900 uppercase tracking-wide">Actions rapides</h3>
                    
                    <div class="space-y-2">
                        @if(!$message->is_read)
                            <form action="{{ route('admin.messages.read', $message->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                    <i class="fas fa-check mr-2"></i>
                                    Marquer comme lu
                                </button>
                            </form>
                        @endif
                        
                        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                            <i class="fas fa-reply mr-2"></i>
                            Répondre par email
                        </a>
                        
                        <form action="{{ route('admin.messages.delete', $message->id) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full flex items-center justify-center px-4 py-2 border border-red-300 rounded-md shadow-sm text-sm font-medium text-red-700 bg-white hover:bg-red-50">
                                <i class="fas fa-trash mr-2"></i>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu du message -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Message original</h3>
        </div>
        <div class="px-6 py-6">
            <div class="prose max-w-none">
                <div class="bg-gray-50 border-l-4 border-blue-400 p-4 rounded-r-lg">
                    <p class="text-gray-800 whitespace-pre-wrap leading-relaxed">{{ $message->message }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Réponses existantes -->
    @if($message->replies->count() > 0)
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 mt-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">
                <i class="fas fa-reply text-green-600 mr-2"></i>
                Réponses envoyées ({{ $message->replies->count() }})
            </h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @foreach($message->replies as $reply)
                <div class="border border-gray-200 rounded-lg p-4 {{ $reply->sent_successfully ? 'bg-green-50' : 'bg-blue-50' }}">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <h4 class="font-medium text-gray-900">{{ $reply->subject }}</h4>
                            <p class="text-sm text-gray-600">
                                Par {{ $reply->admin_name }} • {{ $reply->created_at->setTimezone('Europe/Paris')->format('d/m/Y à H:i') }}
                            </p>
                        </div>
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $reply->status_badge }}">
                            {{ $reply->status }}
                        </span>
                    </div>
                    <div class="bg-white rounded p-3 border-l-4 {{ $reply->sent_successfully ? 'border-green-400' : 'border-blue-400' }}">
                        @php
                            $messageLength = strlen($reply->message);
                            $isLong = $messageLength > 300;
                            $shortMessage = $isLong ? substr($reply->message, 0, 300) . '...' : $reply->message;
                        @endphp
                        
                        @if($isLong)
                            <div class="reply-message-{{ $reply->id }}">
                                <p class="text-gray-800 whitespace-pre-wrap break-words overflow-hidden short-text">{{ $shortMessage }}</p>
                                <p class="text-gray-800 whitespace-pre-wrap break-words overflow-hidden full-text hidden">{{ $reply->message }}</p>
                                <button onclick="toggleMessage({{ $reply->id }})" class="mt-2 text-sm text-blue-600 hover:text-blue-700 toggle-btn">
                                    <i class="fas fa-chevron-down mr-1"></i>
                                    Voir plus
                                </button>
                            </div>
                        @else
                            <p class="text-gray-800 whitespace-pre-wrap break-words overflow-hidden">{{ $reply->message }}</p>
                        @endif
                    </div>
                    
                    <!-- Statut de l'envoi -->
                    <div class="mt-2 flex items-center justify-between">
                        <div class="flex items-center">
                            @if($reply->sent_successfully)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i>
                                    Email envoyé avec succès
                                </span>
                            @elseif($reply->error_message)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i>
                                    Erreur d'envoi
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    <i class="fas fa-clock mr-1"></i>
                                    En attente d'envoi
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    @if($reply->error_message)
                    <div class="mt-2 text-sm text-red-600">
                        <i class="fas fa-exclamation-triangle mr-1"></i>
                        {{ $reply->error_message }}
                    </div>
                    @endif
                    <div class="mt-3 flex space-x-3">
                        <button onclick="copyReplyToClipboard('{{ $reply->message }}')" 
                                class="text-sm text-blue-600 hover:text-blue-700">
                            <i class="fas fa-copy mr-1"></i>
                            Copier
                        </button>
                        <a href="mailto:{{ $message->email }}?subject={{ urlencode($reply->subject) }}&body={{ urlencode($reply->message) }}" 
                           class="text-sm text-green-600 hover:text-green-700">
                            <i class="fas fa-envelope mr-1"></i>
                            Renvoyer par email
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Formulaire de réponse -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 mt-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Répondre au message</h3>
            <p class="text-sm text-gray-600 mt-1">Préparer une réponse pour {{ $message->name }} ({{ $message->email }})</p>
        </div>
        <div class="px-6 py-6">
            <!-- Information importante -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <div class="flex">
                    <i class="fas fa-paper-plane text-green-600 mt-1 mr-3"></i>
                    <div>
                        <h4 class="text-sm font-medium text-green-800">Envoi automatique d'email</h4>
                        <p class="text-sm text-green-700 mt-1">
                            @if(config('mail.mailers.smtp.host') === 'smtp.gmail.com')
                                ✅ Gmail configuré ! Vos réponses seront envoyées automatiquement par email.
                            @else
                                ⚙️ Pour activer l'envoi automatique, configurez Gmail dans les 
                                <a href="{{ route('admin.settings') }}" class="text-blue-600 underline">paramètres</a>.
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Options de réponse -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Option 1: Réponse via formulaire -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <h4 class="font-medium text-gray-900 mb-2">
                        <i class="fas fa-paper-plane text-blue-600 mr-2"></i>
                        Option 1: Réponse via le système
                    </h4>
                    <p class="text-sm text-gray-600 mb-3">Utilisez le formulaire ci-dessous (sauvegarde dans les logs)</p>
                    
                    <form action="{{ route('admin.messages.reply', $message->id) }}" method="POST" id="replyForm">
                        @csrf
                        <div class="mb-4">
                            <label for="reply_subject" class="block text-sm font-medium text-gray-700 mb-2">
                                Sujet de la réponse
                            </label>
                            <input type="text" 
                                   id="reply_subject" 
                                   name="reply_subject" 
                                   value="Re: {{ $message->subject }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div class="mb-4">
                            <label for="reply_message" class="block text-sm font-medium text-gray-700 mb-2">
                                Votre réponse
                            </label>
                            <textarea id="reply_message" 
                                      name="reply_message" 
                                      rows="4" 
                                      placeholder="Bonjour {{ $message->name }},&#10;&#10;Merci pour votre message concernant {{ $message->subject }}.&#10;&#10;..."
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                      required></textarea>
                        </div>
                        
                        <button type="submit" id="submitReplyBtn" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-colors">
                            <i class="fas fa-save mr-2"></i>
                            Sauvegarder la réponse
                        </button>
                    </form>
                </div>

                <!-- Option 2: Email direct -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <h4 class="font-medium text-gray-900 mb-2">
                        <i class="fas fa-envelope text-green-600 mr-2"></i>
                        Option 2: Email direct
                    </h4>
                    <p class="text-sm text-gray-600 mb-3">Ouvrir votre client email avec le message pré-rempli</p>
                    
                    <div class="space-y-3">
                        <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}&body=Bonjour {{ $message->name }},%0D%0A%0D%0AMerci pour votre message concernant {{ $message->subject }}.%0D%0A%0D%0A[Votre réponse ici]%0D%0A%0D%0ACordialement,%0D%0AÉquipe Support" 
                           class="w-full flex items-center justify-center px-4 py-2 border border-green-300 rounded-lg text-green-700 hover:bg-green-50 transition-colors">
                            <i class="fas fa-external-link-alt mr-2"></i>
                            Ouvrir dans l'email
                        </a>
                        
                        <div class="bg-gray-50 rounded p-3">
                            <p class="text-xs text-gray-600">
                                <strong>Email :</strong> {{ $message->email }}<br>
                                <strong>Sujet :</strong> Re: {{ $message->subject }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Option 3: Copier les informations -->
            <div class="border border-gray-200 rounded-lg p-4">
                <h4 class="font-medium text-gray-900 mb-2">
                    <i class="fas fa-copy text-purple-600 mr-2"></i>
                    Option 3: Copier les informations
                </h4>
                <p class="text-sm text-gray-600 mb-3">Copiez les détails pour répondre avec votre client email habituel</p>
                
                <div class="bg-gray-50 rounded-lg p-3 font-mono text-sm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <strong>À :</strong> 
                            <span class="select-all">{{ $message->email }}</span>
                            <button onclick="copyToClipboard('{{ $message->email }}')" class="ml-2 text-blue-600 hover:text-blue-700">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                        <div>
                            <strong>Sujet :</strong> 
                            <span class="select-all">Re: {{ $message->subject }}</span>
                            <button onclick="copyToClipboard('Re: {{ $message->subject }}')" class="ml-2 text-blue-600 hover:text-blue-700">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script pour la copie -->
    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Feedback visuel
                const button = event.target;
                const originalIcon = button.innerHTML;
                button.innerHTML = '<i class="fas fa-check"></i>';
                button.classList.remove('text-blue-600');
                button.classList.add('text-green-600');
                
                setTimeout(() => {
                    button.innerHTML = originalIcon;
                    button.classList.remove('text-green-600');
                    button.classList.add('text-blue-600');
                }, 1000);
            });
        }

        function copyReplyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Notification simple
                alert('Réponse copiée dans le presse-papiers !');
            });
        }
        
        // Auto-resize textarea
        document.getElementById('reply_message').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        // Afficher une confirmation après sauvegarde
        @if(session('success'))
        setTimeout(() => {
            const successAlert = document.createElement('div');
            successAlert.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            successAlert.innerHTML = '<i class="fas fa-check mr-2"></i>{{ session("success") }}';
            document.body.appendChild(successAlert);
            
            setTimeout(() => {
                successAlert.remove();
            }, 5000);
        }, 100);
        @endif

        @if(session('error'))
        setTimeout(() => {
            const errorAlert = document.createElement('div');
            errorAlert.className = 'fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            errorAlert.innerHTML = '<i class="fas fa-exclamation-triangle mr-2"></i>{{ session("error") }}';
            document.body.appendChild(errorAlert);
            
            setTimeout(() => {
                errorAlert.remove();
            }, 5000);
        }, 100);
        @endif
    </script>

    <!-- Informations supplémentaires -->
    <div class="bg-gray-50 rounded-lg p-4 mt-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-600">
            <div>
                <span class="font-medium">Reçu le :</span>
                {{ $message->created_at->format('d/m/Y à H:i:s') }}
            </div>
            <div>
                <span class="font-medium">Il y a :</span>
                {{ $message->created_at->diffForHumans() }}
            </div>
            <div>
                <span class="font-medium">ID du message :</span>
                #{{ $message->id }}
            </div>
        </div>
    </div>
</div>

<script>
// Auto-resize textarea
document.getElementById('reply_message').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

// Protection contre la double soumission
document.querySelector('form').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitReplyBtn');
    if (submitBtn.disabled) {
        e.preventDefault();
        return false;
    }
    
    // Désactiver le bouton et changer le texte
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Envoi en cours...';
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    
    // Réactiver après 5 secondes en cas d'erreur
    setTimeout(function() {
        if (submitBtn.disabled) {
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fas fa-save mr-2"></i>Sauvegarder la réponse';
            submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    }, 5000);
});

// Toggle message length
function toggleMessage(replyId) {
    const container = document.querySelector(`.reply-message-${replyId}`);
    const shortText = container.querySelector('.short-text');
    const fullText = container.querySelector('.full-text');
    const toggleBtn = container.querySelector('.toggle-btn');
    
    if (shortText.classList.contains('hidden')) {
        // Montrer le texte court
        shortText.classList.remove('hidden');
        fullText.classList.add('hidden');
        toggleBtn.innerHTML = '<i class="fas fa-chevron-down mr-1"></i>Voir plus';
    } else {
        // Montrer le texte complet
        shortText.classList.add('hidden');
        fullText.classList.remove('hidden');
        toggleBtn.innerHTML = '<i class="fas fa-chevron-up mr-1"></i>Voir moins';
    }
}
</script>
@endsection
