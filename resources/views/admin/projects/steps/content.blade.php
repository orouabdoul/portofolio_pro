<!-- Étape 2: Contenu & Storytelling -->
<div class="space-y-8">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">📝 Contenu & Storytelling</h2>
        <p class="text-gray-600">Racontez l'histoire de votre projet et captivez votre audience</p>
    </div>

    <!-- Description courte -->
    <div class="space-y-2">
        <label for="short_description" class="block text-sm font-semibold text-gray-900">
            💭 Description courte <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <textarea name="short_description" id="short_description" required maxlength="500" rows="3"
                      class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 resize-none"
                      placeholder="Une description captivante qui donne envie d'en savoir plus sur votre projet...">{{ old('short_description', $formData['short_description'] ?? '') }}</textarea>
            <div class="absolute bottom-2 right-3 text-xs text-gray-500">
                <span id="short-desc-count">0</span>/500
            </div>
        </div>
        
        <!-- Suggestions -->
        <div class="mt-2">
            <p class="text-sm text-gray-600 mb-2">💡 Suggestions:</p>
            <div class="flex flex-wrap gap-2">
                <button type="button" onclick="applySuggestion('short_description', 'Solution innovante qui révolutionne...')" 
                        class="suggestion-btn px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs hover:bg-purple-200 transition-colors">
                    Solution innovante
                </button>
                <button type="button" onclick="applySuggestion('short_description', 'Application révolutionnaire qui change...')"
                        class="suggestion-btn px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs hover:bg-purple-200 transition-colors">
                    App révolutionnaire
                </button>
                <button type="button" onclick="applySuggestion('short_description', 'Plateforme moderne et intuitive pour...')"
                        class="suggestion-btn px-3 py-1 bg-purple-100 text-purple-700 rounded-full text-xs hover:bg-purple-200 transition-colors">
                    Plateforme moderne
                </button>
            </div>
        </div>
        @error('short_description')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description complète -->
    <div class="space-y-2">
        <label for="full_description" class="block text-sm font-semibold text-gray-900">
            📖 Description complète <span class="text-red-500">*</span>
        </label>
        
        <!-- Guide de structure -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-4 mb-4">
            <h4 class="text-sm font-semibold text-blue-900 mb-3">📋 Structure recommandée :</h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                <div class="bg-white rounded-lg p-3 border border-blue-100">
                    <h5 class="font-semibold text-blue-800 mb-1">🎯 Problématique</h5>
                    <p class="text-blue-700">Quel problème résolvez-vous ?</p>
                </div>
                <div class="bg-white rounded-lg p-3 border border-blue-100">
                    <h5 class="font-semibold text-blue-800 mb-1">💡 Solution</h5>
                    <p class="text-blue-700">Comment votre projet répond-il ?</p>
                </div>
                <div class="bg-white rounded-lg p-3 border border-blue-100">
                    <h5 class="font-semibold text-blue-800 mb-1">🏆 Impact</h5>
                    <p class="text-blue-700">Quels résultats obtenus ?</p>
                </div>
            </div>
        </div>
        
        <div class="relative">
            <textarea name="full_description" id="full_description" required maxlength="2000" rows="8"
                      class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 resize-vertical"
                      placeholder="Décrivez votre projet en détail. Expliquez le contexte, les défis rencontrés, les solutions apportées et les résultats obtenus...">{{ old('full_description', $formData['full_description'] ?? '') }}</textarea>
            <div class="absolute bottom-2 right-3 text-xs text-gray-500">
                <span id="full-desc-count">0</span>/2000
            </div>
        </div>
        @error('full_description')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Fonctionnalités principales -->
    <div class="space-y-2">
        <label for="features" class="block text-sm font-semibold text-gray-900">
            ⚡ Fonctionnalités principales <span class="text-gray-500">(Optionnel)</span>
        </label>
        <div class="relative">
            <textarea name="features" id="features" maxlength="1000" rows="4"
                      class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 resize-vertical"
                      placeholder="• Authentification sécurisée&#10;• Interface responsive&#10;• API REST complète&#10;• Base de données optimisée">{{ old('features', $formData['features'] ?? '') }}</textarea>
            <div class="absolute bottom-2 right-3 text-xs text-gray-500">
                <span id="features-count">0</span>/1000
            </div>
        </div>
        
        <!-- Fonctionnalités populaires -->
        <div class="mt-2">
            <p class="text-sm text-gray-600 mb-2">🚀 Fonctionnalités populaires:</p>
            <div class="flex flex-wrap gap-2">
                <button type="button" onclick="addFeature('🔐 Authentification sécurisée')" 
                        class="feature-btn px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs hover:bg-green-200 transition-colors">
                    🔐 Auth
                </button>
                <button type="button" onclick="addFeature('📱 Interface responsive')"
                        class="feature-btn px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs hover:bg-green-200 transition-colors">
                    📱 Responsive
                </button>
                <button type="button" onclick="addFeature('🔌 API REST complète')"
                        class="feature-btn px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs hover:bg-green-200 transition-colors">
                    🔌 API
                </button>
                <button type="button" onclick="addFeature('🗄️ Base de données optimisée')"
                        class="feature-btn px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs hover:bg-green-200 transition-colors">
                    🗄️ BDD
                </button>
                <button type="button" onclick="addFeature('🔒 Sécurité renforcée')"
                        class="feature-btn px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs hover:bg-green-200 transition-colors">
                    🔒 Sécurité
                </button>
                <button type="button" onclick="addFeature('⚡ Performance optimisée')"
                        class="feature-btn px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs hover:bg-green-200 transition-colors">
                    ⚡ Performance
                </button>
            </div>
        </div>
        @error('features')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Conseils -->
    <div class="bg-purple-50 border border-purple-200 rounded-xl p-4">
        <h4 class="text-sm font-semibold text-purple-900 mb-2">🎯 Conseils pour cette étape :</h4>
        <ul class="text-sm text-purple-800 space-y-1">
            <li>• Utilisez un langage clair et engageant pour décrire votre projet</li>
            <li>• Mettez en avant les bénéfices utilisateur plutôt que les aspects techniques</li>
            <li>• Structurez votre description : problème → solution → résultats</li>
            <li>• Listez les fonctionnalités clés pour donner une vue d'ensemble</li>
        </ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Compteurs de caractères
    const fields = [
        { id: 'short_description', countId: 'short-desc-count', max: 500 },
        { id: 'full_description', countId: 'full-desc-count', max: 2000 },
        { id: 'features', countId: 'features-count', max: 1000 }
    ];
    
    fields.forEach(field => {
        const textarea = document.getElementById(field.id);
        const counter = document.getElementById(field.countId);
        
        function updateCounter() {
            const length = textarea.value.length;
            counter.textContent = length;
            
            // Changer la couleur selon le pourcentage
            const percentage = (length / field.max) * 100;
            if (percentage > 90) {
                counter.className = 'text-red-500 font-bold';
            } else if (percentage > 75) {
                counter.className = 'text-yellow-600 font-medium';
            } else {
                counter.className = 'text-gray-500';
            }
        }
        
        textarea.addEventListener('input', updateCounter);
        updateCounter(); // Initial count
    });
});

function applySuggestion(fieldId, suggestion) {
    const field = document.getElementById(fieldId);
    if (field.value.trim() === '') {
        field.value = suggestion;
        field.dispatchEvent(new Event('input'));
        field.focus();
    }
}

function addFeature(feature) {
    const featuresField = document.getElementById('features');
    const currentValue = featuresField.value.trim();
    
    if (currentValue === '') {
        featuresField.value = '• ' + feature;
    } else {
        featuresField.value = currentValue + '\n• ' + feature;
    }
    
    featuresField.dispatchEvent(new Event('input'));
    featuresField.focus();
}
</script>

<style>
.suggestion-btn:hover, .feature-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

textarea:focus {
    transform: translateY(-1px);
}
</style>
