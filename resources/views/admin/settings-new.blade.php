@extends('admin.layout')

@section('title', 'Paramètres')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            <i class="fas fa-check mr-2"></i>{{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <i class="fas fa-times mr-2"></i>{{ session('error') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Informations générales -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                <h3 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-user-circle text-blue-600 mr-2"></i>
                    Informations personnelles
                </h3>
                <p class="text-sm text-gray-600 mt-1">Informations affichées sur votre portfolio public</p>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
                    <input type="text" name="admin_name" value="{{ $settings['admin_name'] ?? '' }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="admin_email" value="{{ $settings['admin_email'] ?? '' }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                    <input type="text" name="admin_phone" value="{{ $settings['admin_phone'] ?? '' }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Localisation</label>
                    <input type="text" name="admin_location" value="{{ $settings['admin_location'] ?? '' }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Site web</label>
                    <input type="url" name="admin_website" value="{{ $settings['admin_website'] ?? '' }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bio / Description</label>
                    <textarea name="admin_bio" rows="3" 
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $settings['admin_bio'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Réseaux sociaux -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-green-50 to-emerald-50">
                <h3 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-share-alt text-green-600 mr-2"></i>
                    Réseaux sociaux
                </h3>
                <p class="text-sm text-gray-600 mt-1">Liens vers vos profils sociaux</p>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fab fa-linkedin text-blue-600 mr-2"></i>LinkedIn
                    </label>
                    <input type="url" name="social_linkedin" value="{{ $settings['social_linkedin'] ?? '' }}" 
                           placeholder="https://linkedin.com/in/votre-profil"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fab fa-github text-gray-800 mr-2"></i>GitHub
                    </label>
                    <input type="url" name="social_github" value="{{ $settings['social_github'] ?? '' }}" 
                           placeholder="https://github.com/votre-username"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fab fa-twitter text-blue-400 mr-2"></i>Twitter
                    </label>
                    <input type="url" name="social_twitter" value="{{ $settings['social_twitter'] ?? '' }}" 
                           placeholder="https://twitter.com/votre-username"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fab fa-instagram text-pink-500 mr-2"></i>Instagram
                    </label>
                    <input type="url" name="social_instagram" value="{{ $settings['social_instagram'] ?? '' }}" 
                           placeholder="https://instagram.com/votre-username"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fab fa-facebook text-blue-600 mr-2"></i>Facebook
                    </label>
                    <input type="url" name="social_facebook" value="{{ $settings['social_facebook'] ?? '' }}" 
                           placeholder="https://facebook.com/votre-username"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- Configuration du site -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-purple-50 to-violet-50">
                <h3 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-cog text-purple-600 mr-2"></i>
                    Configuration du site
                </h3>
                <p class="text-sm text-gray-600 mt-1">Paramètres généraux du portfolio</p>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Titre du site</label>
                    <input type="text" name="site_title" value="{{ $settings['site_title'] ?? '' }}" 
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Couleur du thème</label>
                    <div class="flex">
                        <input type="color" name="theme_color" value="{{ $settings['theme_color'] ?? '#8B5CF6' }}" 
                               class="w-16 h-10 border border-gray-300 rounded-l-lg cursor-pointer">
                        <input type="text" value="{{ $settings['theme_color'] ?? '#8B5CF6' }}" 
                               class="flex-1 border border-gray-300 rounded-r-lg px-3 py-2 bg-gray-50" readonly>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Google Analytics ID</label>
                    <input type="text" name="google_analytics" value="{{ $settings['google_analytics'] ?? '' }}" 
                           placeholder="G-XXXXXXXXXX"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mode maintenance</label>
                    <div class="flex items-center space-x-3">
                        <input type="hidden" name="maintenance_mode" value="0">
                        <input type="checkbox" name="maintenance_mode" value="1" 
                               {{ $settings['maintenance_mode'] ? 'checked' : '' }}
                               class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="text-sm text-gray-600">Activer le mode maintenance (désactive temporairement le site public)</span>
                    </div>
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description SEO</label>
                    <textarea name="seo_description" rows="2" 
                              class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $settings['seo_description'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Configuration Email (lecture seule) -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-orange-50 to-amber-50">
                <h3 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-envelope text-orange-600 mr-2"></i>
                    Configuration Email SMTP
                </h3>
                <p class="text-sm text-gray-600 mt-1">Configuration actuelle pour l'envoi d'emails</p>
            </div>
            <div class="p-6">
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-center">
                        <i class="fas fa-info-circle text-blue-600 mr-3"></i>
                        <div>
                            <p class="text-sm text-blue-800">
                                <strong>Status :</strong> 
                                @if(config('mail.mailers.smtp.host') === 'smtp.gmail.com' && config('mail.mailers.smtp.username'))
                                    <span class="text-green-600">✅ Gmail configuré</span>
                                @else
                                    <span class="text-red-600">❌ Non configuré</span>
                                @endif
                            </p>
                            <p class="text-sm text-blue-800">
                                <strong>Email :</strong> {{ config('mail.from.address') }}
                            </p>
                            <p class="text-xs text-blue-600 mt-2">
                                Pour modifier la configuration email, consultez la page 
                                <a href="{{ route('admin.email-setup') }}" class="underline">Configuration Email</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Boutons d'action -->
        <div class="flex justify-between items-center">
            <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-800">
                <i class="fas fa-arrow-left mr-2"></i>Retour au tableau de bord
            </a>
            
            <div class="space-x-3">
                <button type="button" onclick="resetForm()" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    <i class="fas fa-undo mr-2"></i>Réinitialiser
                </button>
                
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium">
                    <i class="fas fa-save mr-2"></i>Sauvegarder les paramètres
                </button>
            </div>
        </div>
    </form>
</div>

<script>
function resetForm() {
    if (confirm('Êtes-vous sûr de vouloir réinitialiser tous les changements ?')) {
        location.reload();
    }
}

// Mise à jour du code couleur en temps réel
document.querySelector('input[name="theme_color"]').addEventListener('input', function() {
    document.querySelector('input[readonly]').value = this.value;
});
</script>
@endsection
