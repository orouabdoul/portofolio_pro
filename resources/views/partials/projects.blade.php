<section class="py-5" id="projects" style="background:#1E192D;">
    <div class="container">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-white" style="font-size:2.2rem;">Nos <span class="text-info">Projects</span></h2>
    </div>
    <div class="d-flex justify-content-center gap-2 mb-5 flex-wrap">
            <button class="btn btn-primary px-4 fw-bold shadow-sm rounded-pill active" data-category="Tous">Tous</button>
            <button class="btn btn-outline-info px-4 fw-bold shadow-sm rounded-pill" data-category="Design UI/UX">Design UI/UX</button>
            <button class="btn btn-outline-success px-4 fw-bold shadow-sm rounded-pill" data-category="App Mobile">App Mobile</button>
            <button class="btn btn-outline-warning px-4 fw-bold shadow-sm rounded-pill" data-category="Produits">Produits</button>
    </div>
    <div class="row g-4 justify-content-center">
            @forelse($projects as $project)
                @php
                    $imageFullPath = public_path('storage/' . $project->image_path);
                    $imageUrl = ($project->image_path && file_exists($imageFullPath))
                        ? asset('storage/' . $project->image_path)
                        : 'https://via.placeholder.com/368x242/6366f1/a78bfa?text=Projet';
                    // Définir la catégorie du projet (adapter selon votre structure)
                    $category = $project->category->name ?? $project->category_name ?? 'Autre';
                @endphp
                <div class="col-12 col-md-6 col-lg-4 project-card" data-category="{{ $category }}">
                    <div class="card h-100 bg-dark text-white shadow-lg rounded-4">
                        <img src="{{ $imageUrl }}" class="card-img-top rounded-top-4" alt="{{ $project->title }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-info">{{ $project->title }}</h5>
                            <p class="card-text">{{ $project->short_description ?? $project->description }}</p>
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank" class="btn btn-outline-info btn-sm mt-2"><i class="fas fa-external-link-alt me-1"></i>Démo</a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank" class="btn btn-outline-light btn-sm mt-2"><i class="fab fa-github me-1"></i>Code</a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-light py-5">
                    <i class="fas fa-folder-open fa-2x mb-2"></i><br>
                    Aucun projet trouvé.<br>
                </div>
            @endforelse
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('[data-category]');
            const cards = document.querySelectorAll('.project-card');
            buttons.forEach(btn => {
                btn.addEventListener('click', function() {
                    buttons.forEach(b => b.classList.remove('active', 'btn-primary'));
                    btn.classList.add('active', 'btn-primary');
                    btn.classList.remove('btn-outline-info', 'btn-outline-success', 'btn-outline-warning');
                    // Remettre le style outline aux autres
                    buttons.forEach(b => {
                        if(b !== btn && b.textContent !== 'Tous') {
                            b.classList.remove('active', 'btn-primary');
                            if(b.textContent === 'Design UI/UX') b.classList.add('btn-outline-info');
                            if(b.textContent === 'App Mobile') b.classList.add('btn-outline-success');
                            if(b.textContent === 'Produits') b.classList.add('btn-outline-warning');
                        }
                    });
                    const selected = btn.getAttribute('data-category');
                    cards.forEach(card => {
                        if(selected === 'Tous' || card.getAttribute('data-category') === selected) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        });
        </script>
    </div>
</div>
</section>
