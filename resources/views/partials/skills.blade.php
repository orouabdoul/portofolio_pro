 
<section class="py-5" id="skills" style="background:#18122B;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-white" style="font-size:2.2rem;">Compétences <span class="text-gradient">Techniques</span></h2>
      <p class="text-secondary">Maîtrise des outils et technologies clés</p>
    </div>

    <div class="row g-4 justify-content-center">

      @php
  $skills_categories = [
          'IA' => [
            [
              'icon' => '<img src="https://upload.wikimedia.org/wikipedia/commons/0/04/ChatGPT_logo.svg" alt="ChatGPT" style="background:#fff;" onerror="this.onerror=null;this.src=\'https://upload.wikimedia.org/wikipedia/commons/4/4b/OpenAI_Logo.svg\';">',
              'name' => 'ChatGPT',
              'level' => 'Généraliste',
              'desc' => 'Assistant IA polyvalent pour la génération de texte, d’idées et d’aide à la rédaction.'
            ],
            [
              'icon' => '<img src="https://static-00.iconduck.com/assets.00/midjourney-icon-512x512-2v7qkzrn.png" alt="Midjourney" style="background:#fff;" onerror="this.onerror=null;this.src=\'https://cdn-icons-png.flaticon.com/512/5969/5969020.png\';">',
              'name' => 'Midjourney',
              'level' => 'Design',
              'desc' => 'Génération d’images créatives et illustrations par intelligence artificielle.'
            ],
            [
              'icon' => '<img src="https://uizard.io/favicon.ico" alt="Uizard" style="background:#fff;">',
              'name' => 'Uizard',
              'level' => 'UI/UX',
              'desc' => 'Prototypage rapide d’interfaces et wireframes grâce à l’IA.'
            ],
            [
              'icon' => '<img src="https://github.githubassets.com/favicons/favicon.svg" alt="GitHub Copilot" style="background:#fff;">',
              'name' => 'GitHub Copilot',
              'level' => 'Code',
              'desc' => 'Assistant de code IA pour l’autocomplétion et la génération de fonctions.'
            ],
          ],
          'Mobile' => [
            ['icon' => '<i class="fab fa-android text-success"></i>', 'name' => 'Android', 'level' => 'Avancé'],
            ['icon' => '<i class="fab fa-apple text-light"></i>', 'name' => 'iOS', 'level' => 'Intermédiaire'],
            ['icon' => '<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flutter/flutter-original.svg" alt="Flutter">', 'name' => 'Flutter', 'level' => 'Expert'],
            ['icon' => '<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dart/dart-original.svg" alt="Dart">', 'name' => 'Dart', 'level' => 'Avancé'],
          ],
          'Web' => [
            ['icon' => '<i class="fab fa-laravel text-danger"></i>', 'name' => 'Laravel', 'level' => 'Avancé'],
            ['icon' => '<i class="fab fa-php text-primary"></i>', 'name' => 'PHP', 'level' => 'Avancé'],
            ['icon' => '<i class="fab fa-html5 text-danger"></i>', 'name' => 'HTML5', 'level' => 'Expert'],
            ['icon' => '<i class="fas fa-plug text-info"></i>', 'name' => 'API Laravel', 'level' => 'Avancé'],
          ],
          'Outils' => [
            ['icon' => '<i class="fab fa-git-alt text-warning"></i>', 'name' => 'Git', 'level' => 'Avancé'],
            ['icon' => '<i class="fab fa-github text-white"></i>', 'name' => 'GitHub', 'level' => 'Avancé'],
            ['icon' => '<i class="fab fa-gitlab text-danger"></i>', 'name' => 'GitLab', 'level' => 'Intermédiaire'],
            ['icon' => '<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/figma/figma-original.svg" alt="Figma">', 'name' => 'Figma', 'level' => 'Expert'],
          ],
          'Base de données' => [
            ['icon' => '<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/firebase/firebase-plain.svg" alt="Firebase">', 'name' => 'Firebase', 'level' => 'Avancé'],
            ['icon' => '<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/supabase/supabase-original.svg" alt="Supabase">', 'name' => 'Supabase', 'level' => 'Intermédiaire'],
            ['icon' => '<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" alt="MySQL">', 'name' => 'MySQL', 'level' => 'Avancé'],
            ['icon' => '<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sqlite/sqlite-original.svg" alt="SQLite">', 'name' => 'SQLite', 'level' => 'Intermédiaire'],
          ],
        ];
      @endphp

      @foreach($skills_categories as $cat => $skills)
        <div class="col-12">
          <h4 class="fw-bold text-gradient mb-3 mt-4">{{ $cat }}</h4>
        </div>
        @foreach($skills as $skill)
          <div class="col-6 col-md-4 col-lg-3">
            <div class="skill-card text-center p-4 rounded-3 shadow-lg @if($cat === 'IA') skill-card-ia @endif">
              <div class="skill-icon mb-3">
                @if(Str::contains($skill['icon'], '<img'))
                  {!! $skill['icon'] !!}
                @else
                  {!! $skill['icon'] !!}
                @endif
              </div>
              <h5 class="text-white fw-bold">{{ $skill['name'] }}</h5>
              <span class="text-gradient fw-semibold">{{ $skill['level'] }}</span>
              @if(isset($skill['desc']))
                <div class="text-secondary small mt-2">{{ $skill['desc'] }}</div>
              @endif
            </div>
          </div>
        @endforeach
      @endforeach
@php use Illuminate\Support\Str; @endphp

    </div>
  </div>
</section>

<style>
.text-gradient {
  background: linear-gradient(90deg,#6366f1,#38bdf8);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
/* Cartes compétences */
.skill-card {
  background: #1E192D;
  transition: transform .3s, box-shadow .3s;
  cursor: default;
  border-radius: 1rem;
}
.skill-card:hover {
  transform: translateY(-6px) scale(1.05);
  box-shadow: 0 12px 30px rgba(99,102,241,0.4);
}
.skill-icon {
  font-size: 3rem;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 1rem;
  transition: transform .3s;
}
.skill-card:hover .skill-icon {
  transform: rotate(10deg) scale(1.2);
}
.skill-card img,
.skill-icon img {
  width: 3rem !important;
  height: 3rem !important;
  object-fit: contain;
  display: inline-block;
  vertical-align: middle;
  background: #fff;
  border-radius: 0.7rem;
  padding: 0.3rem;
  box-shadow: 0 2px 8px rgba(99,102,241,0.08);
}
.skill-icon i,
.skill-icon svg {
  font-size: 3rem !important;
  width: 3rem !important;
  height: 3rem !important;
  display: inline-block;
  vertical-align: middle;
}
.skill-card h5 {
  margin-bottom: .3rem;
}
</style>

<style>
/* Même hauteur pour toutes les cards IA */
.skill-card-ia {
  min-height: 250px;
  max-height: 250px;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}
.skill-card-ia .skill-icon {
  flex-shrink: 0;
}
.skill-card-ia h5, .skill-card-ia .text-gradient, .skill-card-ia .text-secondary {
  flex-shrink: 0;
}
.skill-card-ia .text-secondary.small {
  margin-top: auto;
}
</style>
