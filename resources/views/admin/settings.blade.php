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
        <!-- Informations personnelles -->
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
                    <input type="text" name="name" value="{{ $settings['personal']['name'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Titre professionnel</label>
                    <input type="text" name="title" value="{{ $settings['personal']['title'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ $settings['personal']['email'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                    <input type="text" name="phone" value="{{ $settings['personal']['phone'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Localisation</label>
                    <input type="text" name="location" value="{{ $settings['personal']['location'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Site web</label>
                    <input type="url" name="website" value="{{ $settings['personal']['website'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Bio / Description</label>
                    <textarea name="bio" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $settings['personal']['bio'] ?? '' }}</textarea>
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
                    <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fab fa-linkedin text-blue-600 mr-2"></i>LinkedIn</label>
                    <input type="url" name="linkedin" value="{{ $settings['social']['linkedin'] ?? '' }}" placeholder="https://linkedin.com/in/username" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fab fa-github text-gray-800 mr-2"></i>GitHub</label>
                    <input type="url" name="github" value="{{ $settings['social']['github'] ?? '' }}" placeholder="https://github.com/username" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fab fa-twitter text-blue-400 mr-2"></i>Twitter</label>
                    <input type="url" name="twitter" value="{{ $settings['social']['twitter'] ?? '' }}" placeholder="https://twitter.com/username" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fab fa-instagram text-pink-500 mr-2"></i>Instagram</label>
                    <input type="url" name="instagram" value="{{ $settings['social']['instagram'] ?? '' }}" placeholder="https://instagram.com/username" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fab fa-youtube text-red-600 mr-2"></i>YouTube</label>
                    <input type="url" name="youtube" value="{{ $settings['social']['youtube'] ?? '' }}" placeholder="https://youtube.com/channel/id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2"><i class="fab fa-dribbble text-purple-600 mr-2"></i>Dribbble</label>
                    <input type="url" name="dribbble" value="{{ $settings['social']['dribbble'] ?? '' }}" placeholder="https://dribbble.com/username" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
            </div>
        </div>
        <!-- Paramètres du site -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-purple-50 to-violet-50">
                <h3 class="text-lg font-semibold text-gray-900">
                    <i class="fas fa-cog text-purple-600 mr-2"></i>
                    Paramètres du site
                </h3>
                <p class="text-sm text-gray-600 mt-1">Paramètres généraux du portfolio</p>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Titre du site</label>
                    <input type="text" name="site_title" value="{{ $settings['site']['title'] ?? '' }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Langue</label>
                    <select name="site_lang" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <option value="fr" {{ ($settings['site']['lang'] ?? 'fr') == 'fr' ? 'selected' : '' }}>Français</option>
                        <option value="en" {{ ($settings['site']['lang'] ?? 'fr') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="es" {{ ($settings['site']['lang'] ?? 'fr') == 'es' ? 'selected' : '' }}>Español</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Couleur du thème</label>
                    <div class="flex">
                        <input type="color" name="theme_color" value="{{ $settings['site']['theme_color'] ?? '#8B5CF6' }}" class="w-16 h-10 border border-gray-300 rounded-l-lg cursor-pointer">
                        <input type="text" value="{{ $settings['site']['theme_color'] ?? '#8B5CF6' }}" class="flex-1 border border-gray-300 rounded-r-lg px-3 py-2 bg-gray-50" readonly>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Google Analytics ID</label>
                    <input type="text" name="google_analytics" value="{{ $settings['site']['google_analytics'] ?? '' }}" placeholder="GA-XXXXXXXXX" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description SEO</label>
                    <textarea name="site_description" rows="2" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500">{{ $settings['site']['description'] ?? '' }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mode maintenance</label>
                    <div class="flex items-center space-x-3">
                        <input type="hidden" name="maintenance_mode" value="0">
                        <input type="checkbox" name="maintenance_mode" value="1" {{ ($settings['site']['maintenance_mode'] ?? false) ? 'checked' : '' }} class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                        <span class="text-sm text-gray-600">Activer le mode maintenance (désactive temporairement le site public)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end space-x-4">
            <button type="button" onclick="resetForm()" class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Annuler</button>
            <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2"><i class="fas fa-save mr-2"></i>Sauvegarder les modifications</button>
        </div>
    </form>
</div>
<script>
function resetForm() {
    if (confirm('Êtes-vous sûr de vouloir réinitialiser tous les changements ?')) {
        location.reload();
    }
}
document.querySelector('input[name="theme_color"]').addEventListener('input', function() {
    document.querySelector('input[readonly]').value = this.value;
});
</script>
@endsection
