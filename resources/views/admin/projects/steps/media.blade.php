<!-- Étape 4: Médias & Options -->
<div class="space-y-8">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">🔗 Médias & Options</h2>
        <p class="text-gray-600">Finalisez votre projet avec les médias et options de visibilité</p>
    </div>

    <!-- Liens du projet -->
    <div class="space-y-6">
        <div class="border-l-4 border-blue-400 pl-6">
            <h3 class="text-xl font-bold text-gray-900 mb-2">🌐 Liens du Projet</h3>
            <p class="text-gray-600">Connectez votre projet au monde extérieur</p>
        </div>

        <!-- URL du projet en ligne -->
        <div class="space-y-2">
            <label for="demo_url" class="block text-sm font-semibold text-gray-900">
                🌐 URL du projet en ligne <span class="text-gray-500">(Facultatif)</span>
            </label>
            <div class="relative">
                <input type="url" name="demo_url" id="demo_url" 
                       value="{{ old('demo_url', $formData['demo_url'] ?? '') }}"
                       class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
                       placeholder="https://mon-super-projet.com">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                    </svg>
                </div>
            </div>
            <p class="text-sm text-gray-500">💡 Permettra aux visiteurs de tester votre projet directement</p>
            @error('demo_url')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- URL GitHub -->
        <div class="space-y-2">
            <label for="github_url" class="block text-sm font-semibold text-gray-900">
                <i class="fab fa-github mr-1"></i> URL GitHub <span class="text-gray-500">(Facultatif)</span>
            </label>
            <div class="relative">
                <input type="url" name="github_url" id="github_url" 
                       value="{{ old('github_url', $formData['github_url'] ?? '') }}"
                       class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-all duration-200"
                       placeholder="https://github.com/username/mon-projet">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <i class="fab fa-github text-gray-400"></i>
                </div>
            </div>
            <p class="text-sm text-gray-500">🔓 Montrez votre code aux recruteurs et à la communauté</p>
            @error('github_url')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Upload d'image -->
    <div class="space-y-4">
        <div class="border-l-4 border-purple-400 pl-6">
            <h3 class="text-xl font-bold text-gray-900 mb-2">📸 Image du Projet</h3>
            <p class="text-gray-600">Ajoutez une image qui représente votre projet</p>
        </div>

        <div class="space-y-4">
            <!-- Zone de drop -->
            <div id="uploadZone" class="border-3 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer transition-all duration-200 hover:border-purple-400 hover:bg-purple-50">
                <div class="space-y-4">
                    <div class="mx-auto w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-cloud-upload-alt text-2xl text-purple-600"></i>
                    </div>
                    <div>
                        <p class="text-lg font-medium text-gray-900 mb-2">📤 Télécharger une image</p>
                        <p class="text-sm text-gray-500 mb-4">ou glisser-déposer votre image ici</p>
                        <div class="flex items-center justify-center space-x-4 text-xs text-gray-400">
                            <span class="px-2 py-1 bg-gray-100 rounded">PNG</span>
                            <span class="px-2 py-1 bg-gray-100 rounded">JPG</span>
                            <span class="px-2 py-1 bg-gray-100 rounded">GIF</span>
                            <span class="px-2 py-1 bg-gray-100 rounded">Max 2MB</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input file caché -->
            <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">

            <!-- Aperçu de l'image -->
            <div id="imagePreview" class="hidden">
                <p class="text-sm font-medium text-gray-700 mb-2">🖼️ Aperçu:</p>
                <div id="previewContainer" class="relative inline-block">
                    <!-- L'image sera insérée ici par JavaScript -->
                </div>
            </div>

            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Options de visibilité -->
    <div class="space-y-6">
        <div class="border-l-4 border-green-400 pl-6">
            <h3 class="text-xl font-bold text-gray-900 mb-2">⚙️ Options & Visibilité</h3>
            <p class="text-gray-600">Contrôlez comment votre projet apparaît dans votre portfolio</p>
        </div>

        <div class="space-y-4">
            <!-- Statut du projet -->
            <div class="space-y-2">
                <label for="status" class="block text-sm font-semibold text-gray-900">
                    Statut du projet <span class="text-red-500">*</span>
                </label>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <label class="relative">
                        <input type="radio" name="status" value="active" 
                               {{ old('status', $formData['status'] ?? 'active') == 'active' ? 'checked' : '' }}
                               class="sr-only status-radio">
                        <div class="status-option cursor-pointer border-2 border-gray-200 rounded-xl p-4 transition-all duration-200 hover:border-green-300">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-green-500 rounded-full mr-3"></div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">✅ Projet actif</h4>
                                    <p class="text-sm text-gray-600">Votre projet sera visible sur votre portfolio public et accessible aux visiteurs</p>
                                </div>
                            </div>
                        </div>
                    </label>

                    <label class="relative">
                        <input type="radio" name="status" value="draft" 
                               {{ old('status', $formData['status'] ?? '') == 'draft' ? 'checked' : '' }}
                               class="sr-only status-radio">
                        <div class="status-option cursor-pointer border-2 border-gray-200 rounded-xl p-4 transition-all duration-200 hover:border-yellow-300">
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-yellow-500 rounded-full mr-3"></div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">📝 Brouillon</h4>
                                    <p class="text-sm text-gray-600">Projet en cours de développement, visible uniquement dans l'admin</p>
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
                @error('status')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Projet en vedette -->
            <div class="border border-yellow-200 bg-yellow-50 rounded-xl p-4">
                <label class="flex items-start">
                    <input type="checkbox" name="is_featured" value="1" 
                           {{ old('is_featured', $formData['is_featured'] ?? false) ? 'checked' : '' }}
                           class="mt-1 h-4 w-4 text-yellow-600 border-yellow-300 rounded focus:ring-yellow-500">
                    <div class="ml-3">
                        <h4 class="font-semibold text-yellow-900">⭐ Projet en vedette</h4>
                        <p class="text-sm text-yellow-800">Mettez en avant ce projet exceptionnel en tête de votre portfolio</p>
                    </div>
                </label>
            </div>
        </div>
    </div>

    <!-- Résumé final -->
    <div class="bg-gradient-to-r from-purple-50 to-indigo-50 border border-purple-200 rounded-xl p-6">
        <h3 class="text-lg font-bold text-purple-900 mb-4">📋 Résumé de votre projet</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div>
                <h4 class="font-semibold text-purple-800 mb-2">📋 Informations</h4>
                <p id="summary-title" class="text-purple-700">-</p>
                <p id="summary-category" class="text-purple-600">-</p>
            </div>
            <div>
                <h4 class="font-semibold text-purple-800 mb-2">🛠️ Technologies</h4>
                <p id="summary-techs" class="text-purple-700">-</p>
            </div>
        </div>
        
        <div class="mt-4 p-3 bg-white bg-opacity-50 rounded-lg">
            <p class="text-xs text-purple-600 flex items-center">
                <i class="fas fa-save mr-2"></i>
                💾 Sauvegarde automatique activée
            </p>
            <ul class="text-xs text-purple-600 mt-2 space-y-1">
                <li>💡 Vos données sont sécurisées et peuvent être récupérées</li>
                <li>🎯 Projet visible immédiatement après création si activé</li>
            </ul>
        </div>
    </div>

    <!-- Conseils finaux -->
    <div class="bg-green-50 border border-green-200 rounded-xl p-4">
        <h4 class="text-sm font-semibold text-green-900 mb-2">🚀 Conseils pour finaliser :</h4>
        <ul class="text-sm text-green-800 space-y-1">
            <li>• Ajoutez une image de haute qualité qui illustre bien votre projet</li>
            <li>• Incluez les liens vers la démo et le code source pour crédibiliser</li>
            <li>• Activez le projet pour qu'il soit visible dans votre portfolio</li>
            <li>• Marquez comme "vedette" vos meilleurs projets</li>
        </ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion de l'upload d'image
    const uploadZone = document.getElementById('uploadZone');
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const previewContainer = document.getElementById('previewContainer');
    
    // Click sur la zone de drop
    uploadZone.addEventListener('click', () => imageInput.click());
    
    // Drag & Drop
    uploadZone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-purple-500', 'bg-purple-100');
    });
    
    uploadZone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('border-purple-500', 'bg-purple-100');
    });
    
    uploadZone.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('border-purple-500', 'bg-purple-100');
        
        const files = e.dataTransfer.files;
        if (files.length > 0) {
            handleImageUpload(files[0]);
        }
    });
    
    // Changement de fichier
    imageInput.addEventListener('change', function() {
        if (this.files.length > 0) {
            handleImageUpload(this.files[0]);
        }
    });
    
    function handleImageUpload(file) {
        // Vérifier le type de fichier
        if (!file.type.startsWith('image/')) {
            alert('Veuillez sélectionner un fichier image valide.');
            return;
        }
        
        // Vérifier la taille (2MB max)
        if (file.size > 2 * 1024 * 1024) {
            alert('Le fichier est trop volumineux. Taille maximum : 2MB.');
            return;
        }
        
        // Créer l'aperçu
        const reader = new FileReader();
        reader.onload = function(e) {
            previewContainer.innerHTML = `
                <img src="${e.target.result}" alt="Preview" class="max-w-xs max-h-48 rounded-lg shadow-md">
                <button type="button" onclick="removeImage()" 
                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center hover:bg-red-600 transition-colors text-xs">
                    ×
                </button>
            `;
            imagePreview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    }
    
    window.removeImage = function() {
        imageInput.value = '';
        imagePreview.classList.add('hidden');
        previewContainer.innerHTML = '';
    };
    
    // Gestion des boutons radio de statut
    const statusRadios = document.querySelectorAll('.status-radio');
    const statusOptions = document.querySelectorAll('.status-option');
    
    statusRadios.forEach((radio, index) => {
        radio.addEventListener('change', function() {
            statusOptions.forEach(option => {
                option.classList.remove('border-green-500', 'bg-green-50', 'border-yellow-500', 'bg-yellow-50');
                option.classList.add('border-gray-200');
            });
            
            if (this.checked) {
                statusOptions[index].classList.remove('border-gray-200');
                if (this.value === 'active') {
                    statusOptions[index].classList.add('border-green-500', 'bg-green-50');
                } else {
                    statusOptions[index].classList.add('border-yellow-500', 'bg-yellow-50');
                }
            }
        });
    });
    
    // Initialiser les options de statut
    statusRadios.forEach((radio, index) => {
        if (radio.checked) {
            radio.dispatchEvent(new Event('change'));
        }
    });
    
    // Mise à jour du résumé
    function updateSummary() {
        // Récupérer les données des étapes précédentes depuis le sessionStorage ou les champs
        const title = sessionStorage.getItem('project_title') || '{{ $formData["title"] ?? "Titre du projet" }}';
        const category = sessionStorage.getItem('project_category') || '{{ $formData["category"] ?? "Catégorie" }}';
        const technologies = sessionStorage.getItem('project_technologies') || '{{ $formData["technologies"] ?? "Technologies" }}';
        
        document.getElementById('summary-title').textContent = title;
        document.getElementById('summary-category').textContent = getCategoryIcon(category) + ' ' + getCategoryName(category);
        document.getElementById('summary-techs').textContent = technologies;
    }
    
    function getCategoryIcon(category) {
        const icons = {
            'web': '🌐',
            'mobile': '📱',
            'desktop': '💻',
            'api': '🔌',
            'ecommerce': '🛒',
            'portfolio': '🎨',
            'blog': '📝',
            'other': '🔧'
        };
        return icons[category] || '📁';
    }
    
    function getCategoryName(category) {
        const names = {
            'web': 'Application Web',
            'mobile': 'Application Mobile',
            'desktop': 'Application Desktop',
            'api': 'API / Backend',
            'ecommerce': 'E-commerce',
            'portfolio': 'Portfolio',
            'blog': 'Blog',
            'other': 'Autre'
        };
        return names[category] || 'Non définie';
    }
    
    // Initialiser le résumé
    updateSummary();
    
    // Validation des URLs
    const urlInputs = document.querySelectorAll('input[type="url"]');
    urlInputs.forEach(input => {
        input.addEventListener('blur', function() {
            if (this.value && !isValidUrl(this.value)) {
                this.classList.add('border-red-500');
                this.classList.remove('border-gray-200');
            } else {
                this.classList.remove('border-red-500');
                this.classList.add('border-gray-200');
            }
        });
    });
    
    function isValidUrl(string) {
        try {
            new URL(string);
            return true;
        } catch (_) {
            return false;
        }
    }
});
</script>

<style>
.status-option:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

#uploadZone.dragover {
    transform: scale(1.02);
}

#uploadZone:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.status-radio:checked + .status-option {
    transform: scale(1.02);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
}
</style>
