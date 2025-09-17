<!-- Étape 3: Technologies & Métriques -->
<div class="space-y-8">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">🛠️ Technologies & Performance</h2>
        <p class="text-gray-600">Détaillez les technologies utilisées et les métriques de performance</p>
    </div>

    <!-- Technologies utilisées -->
    <div class="space-y-4">
        <label class="block text-sm font-semibold text-gray-900">
            💻 Technologies utilisées <span class="text-red-500">*</span>
        </label>
        
        <!-- Grille de technologies -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Frontend -->
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 border border-blue-200 rounded-xl p-4">
                <h4 class="text-sm font-semibold text-blue-900 mb-3">🎨 Frontend</h4>
                <div class="space-y-2">
                    @php
                        $frontendTechs = ['HTML5', 'CSS3', 'JavaScript', 'Vue.js', 'React', 'Angular', 'TailwindCSS', 'Bootstrap', 'SASS', 'TypeScript'];
                    @endphp
                    @foreach($frontendTechs as $tech)
                        <button type="button" onclick="toggleTech('{{ $tech }}')" 
                                class="tech-btn w-full text-left px-3 py-2 text-sm border border-blue-200 rounded-lg hover:bg-blue-100 transition-colors">
                            {{ $tech }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Mobile -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4">
                <h4 class="text-sm font-semibold text-green-900 mb-3">📱 Mobile</h4>
                <div class="space-y-2">
                    @php
                        $mobileTechs = ['Flutter', 'Dart', 'React Native', 'Ionic', 'Swift', 'Kotlin', 'Xamarin', 'Cordova'];
                    @endphp
                    @foreach($mobileTechs as $tech)
                        <button type="button" onclick="toggleTech('{{ $tech }}')" 
                                class="tech-btn w-full text-left px-3 py-2 text-sm border border-green-200 rounded-lg hover:bg-green-100 transition-colors">
                            {{ $tech }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Backend -->
            <div class="bg-gradient-to-br from-purple-50 to-violet-50 border border-purple-200 rounded-xl p-4">
                <h4 class="text-sm font-semibold text-purple-900 mb-3">⚙️ Backend</h4>
                <div class="space-y-2">
                    @php
                        $backendTechs = ['PHP', 'Laravel', 'Node.js', 'Python', 'Django', 'Express.js', 'Java', 'Spring Boot', 'C#', '.NET'];
                    @endphp
                    @foreach($backendTechs as $tech)
                        <button type="button" onclick="toggleTech('{{ $tech }}')" 
                                class="tech-btn w-full text-left px-3 py-2 text-sm border border-purple-200 rounded-lg hover:bg-purple-100 transition-colors">
                            {{ $tech }}
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- Base de données -->
            <div class="bg-gradient-to-br from-orange-50 to-red-50 border border-orange-200 rounded-xl p-4">
                <h4 class="text-sm font-semibold text-orange-900 mb-3">🗄️ Base de données</h4>
                <div class="space-y-2">
                    @php
                        $dbTechs = ['MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'SQLite', 'Firebase', 'MariaDB', 'Oracle'];
                    @endphp
                    @foreach($dbTechs as $tech)
                        <button type="button" onclick="toggleTech('{{ $tech }}')" 
                                class="tech-btn w-full text-left px-3 py-2 text-sm border border-orange-200 rounded-lg hover:bg-orange-100 transition-colors">
                            {{ $tech }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Champ de saisie des technologies -->
        <div class="relative">
            <input type="text" name="technologies" id="technologies" required
                   value="{{ old('technologies', $formData['technologies'] ?? '') }}"
                   class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
                   placeholder="Laravel, Vue.js, MySQL, TailwindCSS...">
            <p class="mt-2 text-sm text-gray-500">
                Cliquez sur les technologies ci-dessus ou séparez-les par des virgules
            </p>
        </div>

        <!-- Aperçu des technologies sélectionnées -->
        <div id="selected-techs" class="hidden">
            <p class="text-sm font-medium text-gray-700 mb-2">🔧 Technologies sélectionnées:</p>
            <div id="tech-preview" class="flex flex-wrap gap-2"></div>
        </div>
        
        @error('technologies')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Métriques de performance -->
    <div class="space-y-6">
        <div class="border-l-4 border-yellow-400 pl-6">
            <h3 class="text-xl font-bold text-gray-900 mb-2">📊 Métriques de Performance</h3>
            <p class="text-gray-600">Mettez en valeur les résultats de votre projet (optionnel)</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Score de performance -->
            <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-200 rounded-xl p-6">
                <label for="performance_score" class="block text-sm font-semibold text-green-800 mb-3">
                    🚀 Score de performance (%)
                </label>
                <div class="space-y-4">
                    <div class="relative">
                        <input type="number" name="performance_score" id="performance_score" min="0" max="100" 
                               value="{{ old('performance_score', $formData['performance_score'] ?? '') }}"
                               class="block w-full px-4 py-3 border-2 border-green-200 rounded-xl shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200 text-center text-2xl font-bold"
                               placeholder="95">
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-3">
                        <div id="performance-bar" class="bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-300" style="width: 0%"></div>
                    </div>
                    <div class="text-xs text-green-700 text-center" id="performance-label">Excellent !</div>
                </div>
                @error('performance_score')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Nombre d'utilisateurs -->
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 border border-blue-200 rounded-xl p-6">
                <label for="users_count" class="block text-sm font-semibold text-blue-800 mb-3">
                    👥 Nombre d'utilisateurs
                </label>
                <div class="space-y-4">
                    <div class="relative">
                        <input type="number" name="users_count" id="users_count" min="0" 
                               value="{{ old('users_count', $formData['users_count'] ?? '') }}"
                               class="block w-full px-4 py-3 border-2 border-blue-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-center text-2xl font-bold"
                               placeholder="1000">
                    </div>
                    <div class="text-xs text-blue-700 text-center" id="users-formatted">0 utilisateur</div>
                    <div class="flex justify-center space-x-2">
                        <button type="button" onclick="setUsers(100)" class="px-2 py-1 text-xs bg-blue-100 hover:bg-blue-200 text-blue-700 rounded transition-colors">100</button>
                        <button type="button" onclick="setUsers(1000)" class="px-2 py-1 text-xs bg-blue-100 hover:bg-blue-200 text-blue-700 rounded transition-colors">1K</button>
                        <button type="button" onclick="setUsers(10000)" class="px-2 py-1 text-xs bg-blue-100 hover:bg-blue-200 text-blue-700 rounded transition-colors">10K</button>
                    </div>
                </div>
                @error('users_count')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Taux de satisfaction -->
            <div class="bg-gradient-to-br from-yellow-50 to-orange-50 border border-yellow-200 rounded-xl p-6">
                <label for="satisfaction_rate" class="block text-sm font-semibold text-yellow-800 mb-3">
                    😊 Taux de satisfaction (%)
                </label>
                <div class="space-y-4">
                    <div class="relative">
                        <input type="number" name="satisfaction_rate" id="satisfaction_rate" min="0" max="100" 
                               value="{{ old('satisfaction_rate', $formData['satisfaction_rate'] ?? '') }}"
                               class="block w-full px-4 py-3 border-2 border-yellow-200 rounded-xl shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition-all duration-200 text-center text-2xl font-bold"
                               placeholder="98">
                    </div>
                    <div class="text-center">
                        <span id="satisfaction-emoji" class="text-2xl">😊</span>
                        <div class="text-xs text-yellow-700 mt-1" id="satisfaction-label">Très satisfaisant</div>
                    </div>
                </div>
                @error('satisfaction_rate')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- Conseils -->
    <div class="bg-indigo-50 border border-indigo-200 rounded-xl p-4">
        <h4 class="text-sm font-semibold text-indigo-900 mb-2">🎯 Conseils pour cette étape :</h4>
        <ul class="text-sm text-indigo-800 space-y-1">
            <li>• Sélectionnez toutes les technologies importantes utilisées dans votre projet</li>
            <li>• Les métriques de performance sont optionnelles mais impressionnent les recruteurs</li>
            <li>• Soyez honnête avec les chiffres - la crédibilité est essentielle</li>
            <li>• Si vous n'avez pas de métriques, laissez les champs vides</li>
        </ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion des technologies
    let selectedTechs = new Set();
    const techInput = document.getElementById('technologies');
    const techPreview = document.getElementById('tech-preview');
    const selectedTechsDiv = document.getElementById('selected-techs');
    
    // Initialiser avec les technologies existantes
    if (techInput.value) {
        techInput.value.split(',').forEach(tech => {
            const trimmedTech = tech.trim();
            if (trimmedTech) {
                selectedTechs.add(trimmedTech);
            }
        });
        updateTechPreview();
    }
    
    window.toggleTech = function(tech) {
        if (selectedTechs.has(tech)) {
            selectedTechs.delete(tech);
        } else {
            selectedTechs.add(tech);
        }
        updateTechInput();
        updateTechPreview();
        updateTechButtons();
    };
    
    function updateTechInput() {
        techInput.value = Array.from(selectedTechs).join(', ');
    }
    
    function updateTechPreview() {
        if (selectedTechs.size > 0) {
            selectedTechsDiv.classList.remove('hidden');
            techPreview.innerHTML = '';
            selectedTechs.forEach(tech => {
                const tag = document.createElement('span');
                tag.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm bg-purple-100 text-purple-800 border border-purple-200';
                tag.innerHTML = `${tech} <button type="button" onclick="removeTech('${tech}')" class="ml-2 text-purple-600 hover:text-purple-800">×</button>`;
                techPreview.appendChild(tag);
            });
        } else {
            selectedTechsDiv.classList.add('hidden');
        }
    }
    
    function updateTechButtons() {
        document.querySelectorAll('.tech-btn').forEach(btn => {
            const tech = btn.textContent.trim();
            if (selectedTechs.has(tech)) {
                btn.classList.add('bg-purple-200', 'border-purple-400', 'text-purple-900', 'font-semibold');
            } else {
                btn.classList.remove('bg-purple-200', 'border-purple-400', 'text-purple-900', 'font-semibold');
            }
        });
    }
    
    window.removeTech = function(tech) {
        selectedTechs.delete(tech);
        updateTechInput();
        updateTechPreview();
        updateTechButtons();
    };
    
    // Synchroniser l'input manuel avec la sélection
    techInput.addEventListener('input', function() {
        selectedTechs.clear();
        this.value.split(',').forEach(tech => {
            const trimmedTech = tech.trim();
            if (trimmedTech) {
                selectedTechs.add(trimmedTech);
            }
        });
        updateTechPreview();
        updateTechButtons();
    });
    
    // Métriques de performance
    const performanceInput = document.getElementById('performance_score');
    const performanceBar = document.getElementById('performance-bar');
    const performanceLabel = document.getElementById('performance-label');
    
    performanceInput.addEventListener('input', function() {
        const value = parseInt(this.value) || 0;
        performanceBar.style.width = value + '%';
        
        if (value >= 90) {
            performanceLabel.textContent = 'Exceptionnel !';
            performanceBar.className = 'bg-gradient-to-r from-green-500 to-emerald-500 h-3 rounded-full transition-all duration-300';
        } else if (value >= 75) {
            performanceLabel.textContent = 'Excellent !';
            performanceBar.className = 'bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-300';
        } else if (value >= 50) {
            performanceLabel.textContent = 'Bon';
            performanceBar.className = 'bg-gradient-to-r from-yellow-400 to-yellow-600 h-3 rounded-full transition-all duration-300';
        } else {
            performanceLabel.textContent = 'À améliorer';
            performanceBar.className = 'bg-gradient-to-r from-red-400 to-red-600 h-3 rounded-full transition-all duration-300';
        }
    });
    
    // Utilisateurs
    const usersInput = document.getElementById('users_count');
    const usersFormatted = document.getElementById('users-formatted');
    
    window.setUsers = function(count) {
        usersInput.value = count;
        usersInput.dispatchEvent(new Event('input'));
    };
    
    usersInput.addEventListener('input', function() {
        const value = parseInt(this.value) || 0;
        if (value >= 1000000) {
            usersFormatted.textContent = (value / 1000000).toFixed(1) + 'M utilisateurs';
        } else if (value >= 1000) {
            usersFormatted.textContent = (value / 1000).toFixed(1) + 'K utilisateurs';
        } else if (value > 1) {
            usersFormatted.textContent = value + ' utilisateurs';
        } else if (value === 1) {
            usersFormatted.textContent = '1 utilisateur';
        } else {
            usersFormatted.textContent = '0 utilisateur';
        }
    });
    
    // Satisfaction
    const satisfactionInput = document.getElementById('satisfaction_rate');
    const satisfactionEmoji = document.getElementById('satisfaction-emoji');
    const satisfactionLabel = document.getElementById('satisfaction-label');
    
    satisfactionInput.addEventListener('input', function() {
        const value = parseInt(this.value) || 0;
        
        if (value >= 95) {
            satisfactionEmoji.textContent = '🤩';
            satisfactionLabel.textContent = 'Extraordinaire !';
        } else if (value >= 85) {
            satisfactionEmoji.textContent = '😊';
            satisfactionLabel.textContent = 'Très satisfaisant';
        } else if (value >= 70) {
            satisfactionEmoji.textContent = '🙂';
            satisfactionLabel.textContent = 'Satisfaisant';
        } else if (value >= 50) {
            satisfactionEmoji.textContent = '😐';
            satisfactionLabel.textContent = 'Correct';
        } else {
            satisfactionEmoji.textContent = '😞';
            satisfactionLabel.textContent = 'À améliorer';
        }
    });
    
    // Initialiser les valeurs
    performanceInput.dispatchEvent(new Event('input'));
    usersInput.dispatchEvent(new Event('input'));
    satisfactionInput.dispatchEvent(new Event('input'));
    updateTechButtons();
});
</script>

<style>
.tech-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.tech-btn.selected {
    background-color: #e0e7ff;
    border-color: #6366f1;
    color: #3730a3;
    font-weight: 600;
}
</style>
