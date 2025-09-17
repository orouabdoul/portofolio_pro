<!-- Étape 1: Identité du Projet -->
<div class="space-y-8">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">🎯 Identité du Projet</h2>
        <p class="text-gray-600">Définissez l'essence et l'identité unique de votre projet</p>
    </div>

    <!-- Titre du projet -->
    <div class="space-y-2">
        <label for="title" class="block text-sm font-semibold text-gray-900">
            ✨ Titre du projet <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <input type="text" name="title" id="title" required maxlength="100"
                   value="{{ old('title', $formData['title'] ?? '') }}"
                   class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200 text-lg"
                   placeholder="Mon Projet Incroyable">
            <div class="absolute bottom-2 right-3 text-xs text-gray-500">
                <span id="title-count">0</span>/100
            </div>
        </div>
        @error('title')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Slug automatique -->
    <div class="space-y-2">
        <label for="slug" class="block text-sm font-semibold text-gray-900">
            🔗 Slug (URL) <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <input type="text" name="slug" id="slug" readonly
                   value="{{ old('slug', $formData['slug'] ?? '') }}"
                   class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm bg-gray-50 text-gray-700"
                   placeholder="mon-projet-incroyable">
            <div class="mt-2 text-sm text-gray-500">
                Aperçu URL: <code class="bg-gray-100 px-2 py-1 rounded">/projects/<span id="slug-preview">votre-projet</span></code>
            </div>
        </div>
    </div>

    <!-- Catégorie -->
    <div class="space-y-2">
        <label for="category" class="block text-sm font-semibold text-gray-900">
            📱 Catégorie <span class="text-red-500">*</span>
        </label>
        <select name="category" id="category" required
                class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200">
            <option value="">Sélectionnez une catégorie</option>
            <option value="web" {{ old('category', $formData['category'] ?? '') == 'web' ? 'selected' : '' }}>🌐 Application Web</option>
            <option value="mobile" {{ old('category', $formData['category'] ?? '') == 'mobile' ? 'selected' : '' }}>📱 Application Mobile</option>
            <option value="design" {{ old('category', $formData['category'] ?? '') == 'design' ? 'selected' : '' }}>🎨 design UX/UI  </option>
            <option value="api" {{ old('category', $formData['category'] ?? '') == 'api' ? 'selected' : '' }}>🔌 API / Backend</option>
            <option value="ecommerce" {{ old('category', $formData['category'] ?? '') == 'ecommerce' ? 'selected' : '' }}>🛒 E-commerce</option>
            <option value="portfolio" {{ old('category', $formData['category'] ?? '') == 'portfolio' ? 'selected' : '' }}>🎨 Portfolio</option>
            <option value="blog" {{ old('category', $formData['category'] ?? '') == 'blog' ? 'selected' : '' }}>📝 Blog</option>
            <option value="other" {{ old('category', $formData['category'] ?? '') == 'other' ? 'selected' : '' }}>🔧 Autre</option>
        </select>
        @error('category')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Durée du projet -->
    <div class="space-y-2">
        <label for="duration" class="block text-sm font-semibold text-gray-900">
            ⏱️ Durée du projet <span class="text-red-500">*</span>
        </label>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
            @php
                $durations = [
                    '1 semaine' => '1 semaine',
                    '2 semaines' => '2 semaines', 
                    '1 mois' => '1 mois',
                    '2 mois' => '2 mois',
                    '3 mois' => '3 mois',
                    '6 mois' => '6 mois+'
                ];
                $selectedDuration = old('duration', $formData['duration'] ?? '');
            @endphp
            
            @foreach($durations as $key => $label)
                <label class="relative">
                    <input type="radio" name="duration" value="{{ $key }}" 
                           {{ $selectedDuration == $key ? 'checked' : '' }}
                           class="sr-only duration-radio">
                    <div class="duration-option cursor-pointer border-2 border-gray-200 rounded-lg p-3 text-center transition-all duration-200 hover:border-purple-300 {{ $selectedDuration == $key ? 'border-purple-500 bg-purple-50' : '' }}">
                        <span class="text-sm font-medium">{{ $label }}</span>
                    </div>
                </label>
            @endforeach
        </div>
        @error('duration')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Conseils -->
    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
        <h4 class="text-sm font-semibold text-blue-900 mb-2">💡 Conseils pour cette étape :</h4>
        <ul class="text-sm text-blue-800 space-y-1">
            <li>• Choisissez un titre accrocheur qui reflète l'essence de votre projet</li>
            <li>• Le slug sera généré automatiquement à partir du titre</li>
            <li>• Sélectionnez la catégorie qui correspond le mieux à votre projet</li>
            <li>• Indiquez une durée réaliste pour donner une idée de l'ampleur du projet</li>
        </ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    const slugPreview = document.getElementById('slug-preview');
    const titleCount = document.getElementById('title-count');
    
    // Générer le slug automatiquement
    titleInput.addEventListener('input', function() {
        const title = this.value;
        const slug = title.toLowerCase()
                         .replace(/[^a-z0-9\s-]/g, '')
                         .replace(/\s+/g, '-')
                         .replace(/-+/g, '-')
                         .trim('-');
        
        slugInput.value = slug;
        slugPreview.textContent = slug || 'votre-projet';
        
        // Mettre à jour le compteur
        titleCount.textContent = title.length;
        
        // Changer la couleur selon la longueur
        if (title.length > 80) {
            titleCount.className = 'text-red-500 font-bold';
        } else if (title.length > 60) {
            titleCount.className = 'text-yellow-600 font-medium';
        } else {
            titleCount.className = 'text-gray-500';
        }
    });
    
    // Gestion des boutons radio pour la durée
    const durationRadios = document.querySelectorAll('.duration-radio');
    const durationOptions = document.querySelectorAll('.duration-option');
    
    durationRadios.forEach((radio, index) => {
        radio.addEventListener('change', function() {
            durationOptions.forEach(option => {
                option.classList.remove('border-purple-500', 'bg-purple-50');
                option.classList.add('border-gray-200');
            });
            
            if (this.checked) {
                durationOptions[index].classList.remove('border-gray-200');
                durationOptions[index].classList.add('border-purple-500', 'bg-purple-50');
            }
        });
    });
    
    // Initialiser le compteur de titre
    titleCount.textContent = titleInput.value.length;
    
    // Générer le slug initial si le titre existe
    if (titleInput.value) {
        titleInput.dispatchEvent(new Event('input'));
    }
});
</script>

<style>
.duration-option:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.duration-radio:checked + .duration-option {
    transform: scale(1.02);
    box-shadow: 0 6px 16px rgba(147, 51, 234, 0.2);
}
</style>
