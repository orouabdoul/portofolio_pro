@extends('admin.layout')

@section('title', 'Paramètres')

@section('content')
<div class="space-y-6">
    <!-- Configuration Email SMTP -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">
                <i class="fas fa-envelope text-blue-600 mr-2"></i>
                Configuration Email SMTP
            </h3>
            <p class="text-sm text-gray-600 mt-1">Pour envoyer automatiquement les réponses par email</p>
        </div>
        <div class="p-6">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <div class="flex">
                    <i class="fas fa-info-circle text-blue-600 mt-1 mr-3"></i>
                    <div>
                        <h4 class="text-sm font-medium text-blue-800">Configuration actuelle</h4>
                        <p class="text-sm text-blue-700 mt-1">
                            <strong>Status :</strong> 
                            @if(config('mail.mailers.smtp.host') === 'smtp.gmail.com')
                                <span class="text-green-600">✅ Gmail configuré</span>
                            @else
                                <span class="text-red-600">❌ SMTP non configuré</span>
                            @endif
                        </p>
                        <p class="text-sm text-blue-700">
                            <strong>Email admin :</strong> {{ config('mail.from.address') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Configuration rapide Gmail -->
            <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <h4 class="font-medium text-green-900 mb-3">
                    <i class="fab fa-google text-red-500 mr-2"></i>
                    Configuration rapide Gmail (Recommandé)
                </h4>
                <div class="space-y-3">
                    <div class="text-sm text-green-800">
                        <p><strong>Étapes :</strong></p>
                        <ol class="list-decimal list-inside space-y-1 mt-2">
                            <li>Allez sur <a href="https://myaccount.google.com/security" target="_blank" class="text-blue-600 underline">Google Security</a></li>
                            <li>Activez la validation à 2 facteurs</li>
                            <li>Générez un "Mot de passe d'application"</li>
                            <li>Utilisez ce mot de passe (pas votre mot de passe Gmail normal)</li>
                        </ol>
                    </div>
                    
                    <div class="bg-white rounded-lg p-3 border border-green-300">
                        <p class="text-sm text-green-700 mb-2"><strong>Modifiez votre fichier .env avec :</strong></p>
                        <div class="bg-gray-800 text-green-400 p-2 rounded font-mono text-xs">
                            <div>MAIL_MAILER=smtp</div>
                            <div>MAIL_HOST=smtp.gmail.com</div>
                            <div>MAIL_PORT=587</div>
                            <div>MAIL_USERNAME=<span class="text-yellow-400">votre-email@gmail.com</span></div>
                            <div>MAIL_PASSWORD=<span class="text-yellow-400">votre-mot-de-passe-application</span></div>
                            <div>MAIL_ENCRYPTION=tls</div>
                            <div>MAIL_FROM_ADDRESS="<span class="text-yellow-400">admin@portfolio.com</span>"</div>
                            <div>MAIL_FROM_NAME="Portfolio Admin"</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Gmail -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <h4 class="font-medium text-gray-900 mb-3">
                        <i class="fab fa-google text-red-500 mr-2"></i>
                        Gmail
                    </h4>
                    <div class="bg-gray-50 rounded-lg p-3 font-mono text-xs">
                        <div class="space-y-1 text-gray-700">
                            <div>MAIL_MAILER=smtp</div>
                            <div>MAIL_HOST=smtp.gmail.com</div>
                            <div>MAIL_PORT=587</div>
                            <div>MAIL_USERNAME=votre@gmail.com</div>
                            <div>MAIL_PASSWORD=mot-de-passe-app</div>
                            <div>MAIL_ENCRYPTION=tls</div>
                        </div>
                    </div>
                </div>

                <!-- SendGrid -->
                <div class="border border-gray-200 rounded-lg p-4">
                    <h4 class="font-medium text-gray-900 mb-3">
                        <i class="fas fa-paper-plane text-purple-600 mr-2"></i>
                        SendGrid (Recommandé)
                    </h4>
                    <div class="bg-gray-50 rounded-lg p-3 font-mono text-xs">
                        <div class="space-y-1 text-gray-700">
                            <div>MAIL_MAILER=smtp</div>
                            <div>MAIL_HOST=smtp.sendgrid.net</div>
                            <div>MAIL_PORT=587</div>
                            <div>MAIL_USERNAME=apikey</div>
                            <div>MAIL_PASSWORD=votre-api-key</div>
                            <div>MAIL_ENCRYPTION=tls</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                <div class="text-sm text-yellow-700">
                    <strong>Après configuration :</strong> 
                    Redémarrez votre serveur avec <code>php artisan serve</code>
                </div>
            </div>
        </div>
    </div>

    <!-- Informations personnelles -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Informations personnelles</h3>
            <p class="text-sm text-gray-600 mt-1">Gérez vos informations personnelles affichées sur le portfolio</p>
        </div>
        <form class="p-6 space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom complet</label>
                    <input type="text" id="name" name="name" value="{{ $settings['personal']['name'] ?? 'John Doe' }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre professionnel</label>
                    <input type="text" id="title" name="title" value="{{ $settings['personal']['title'] ?? 'Développeur Full Stack' }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ $settings['personal']['email'] ?? 'john@example.com' }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                    <input type="tel" id="phone" name="phone" value="{{ $settings['personal']['phone'] ?? '+33 6 12 34 56 78' }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Localisation</label>
                    <input type="text" id="location" name="location" value="{{ $settings['personal']['location'] ?? 'Paris, France' }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div>
                    <label for="website" class="block text-sm font-medium text-gray-700 mb-2">Site web</label>
                    <input type="url" id="website" name="website" value="{{ $settings['personal']['website'] ?? 'https://johndoe.dev' }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
            </div>
            
            <div>
                <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Bio / Description</label>
                <textarea id="bio" name="bio" rows="4" 
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">{{ $settings['personal']['bio'] ?? 'Passionné par le développement web avec 5+ années d\'expérience...' }}</textarea>
            </div>
        </form>
    </div>
    
    <!-- Réseaux sociaux -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Réseaux sociaux</h3>
            <p class="text-sm text-gray-600 mt-1">Ajoutez vos liens de réseaux sociaux</p>
        </div>
        <form class="p-6 space-y-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <i class="fab fa-linkedin text-blue-600"></i>
                    </div>
                    <input type="url" placeholder="https://linkedin.com/in/username" 
                           value="{{ $settings['social']['linkedin'] ?? '' }}"
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-gray-100 rounded-lg">
                        <i class="fab fa-github text-gray-800"></i>
                    </div>
                    <input type="url" placeholder="https://github.com/username" 
                           value="{{ $settings['social']['github'] ?? '' }}"
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <i class="fab fa-twitter text-blue-400"></i>
                    </div>
                    <input type="url" placeholder="https://twitter.com/username" 
                           value="{{ $settings['social']['twitter'] ?? '' }}"
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-pink-100 rounded-lg">
                        <i class="fab fa-instagram text-pink-600"></i>
                    </div>
                    <input type="url" placeholder="https://instagram.com/username" 
                           value="{{ $settings['social']['instagram'] ?? '' }}"
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-red-100 rounded-lg">
                        <i class="fab fa-youtube text-red-600"></i>
                    </div>
                    <input type="url" placeholder="https://youtube.com/channel/id" 
                           value="{{ $settings['social']['youtube'] ?? '' }}"
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-purple-100 rounded-lg">
                        <i class="fab fa-dribbble text-purple-600"></i>
                    </div>
                    <input type="url" placeholder="https://dribbble.com/username" 
                           value="{{ $settings['social']['dribbble'] ?? '' }}"
                           class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
            </div>
        </form>
    </div>
    
    <!-- Paramètres du site -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-900">Paramètres du site</h3>
            <p class="text-sm text-gray-600 mt-1">Configuration générale du portfolio</p>
        </div>
        <form class="p-6 space-y-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <label for="site_title" class="block text-sm font-medium text-gray-700 mb-2">Titre du site</label>
                    <input type="text" id="site_title" name="site_title" value="{{ $settings['site']['title'] ?? 'Mon Portfolio' }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
                
                <div>
                    <label for="site_lang" class="block text-sm font-medium text-gray-700 mb-2">Langue</label>
                    <select id="site_lang" name="site_lang" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="fr" {{ ($settings['site']['lang'] ?? 'fr') == 'fr' ? 'selected' : '' }}>Français</option>
                        <option value="en" {{ ($settings['site']['lang'] ?? 'fr') == 'en' ? 'selected' : '' }}>English</option>
                        <option value="es" {{ ($settings['site']['lang'] ?? 'fr') == 'es' ? 'selected' : '' }}>Español</option>
                    </select>
                </div>
                
                <div>
                    <label for="theme_color" class="block text-sm font-medium text-gray-700 mb-2">Couleur du thème</label>
                    <div class="flex items-center space-x-3">
                        <input type="color" id="theme_color" name="theme_color" value="{{ $settings['site']['theme_color'] ?? '#8B5CF6' }}" 
                               class="w-12 h-10 border border-gray-300 rounded cursor-pointer">
                        <input type="text" value="{{ $settings['site']['theme_color'] ?? '#8B5CF6' }}" 
                               class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                </div>
                
                <div>
                    <label for="google_analytics" class="block text-sm font-medium text-gray-700 mb-2">Google Analytics ID</label>
                    <input type="text" id="google_analytics" name="google_analytics" placeholder="GA-XXXXXXXXX" 
                           value="{{ $settings['site']['google_analytics'] ?? '' }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>
            </div>
            
            <div>
                <label for="site_description" class="block text-sm font-medium text-gray-700 mb-2">Description SEO</label>
                <textarea id="site_description" name="site_description" rows="3" 
                          placeholder="Description du site pour les moteurs de recherche..."
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">{{ $settings['site']['description'] ?? '' }}</textarea>
            </div>
            
            <div class="flex items-center">
                <input type="checkbox" id="maintenance_mode" name="maintenance_mode" 
                       {{ ($settings['site']['maintenance_mode'] ?? false) ? 'checked' : '' }}
                       class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                <label for="maintenance_mode" class="ml-2 block text-sm text-gray-700">
                    Mode maintenance (désactive temporairement le site)
                </label>
            </div>
        </form>
    </div>
    
    <!-- Actions -->
    <div class="flex justify-end space-x-4">
        <button type="button" class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            Annuler
        </button>
        <button type="submit" class="px-6 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            Sauvegarder les modifications
        </button>
    </div>
</div>

<script>
// Synchronisation du color picker et de l'input text
document.getElementById('theme_color').addEventListener('change', function() {
    document.querySelector('input[type="text"][value*="#"]').value = this.value;
});
</script>
@endsection
