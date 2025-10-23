<section class="py-5" id="projects" style="background:#1E192D;">
  <div class="container">
    
    <!-- Titre -->
    <div class="text-center mb-5">
      <h2 class="fw-bold text-white" style="font-size:2.5rem;">Mes <span class="text-gradient">Projets</span></h2>
      <p class="text-secondary">Découvrez une sélection de réalisations modernes et élégantes</p>
    </div>

    <!-- Filtres -->
    <div class="d-flex justify-content-center gap-2 mb-5 flex-wrap">
      <a href="{{ route('portfolio.filter', ['category' => 'Tous']) }}#projects" 
        class="btn-filter {{ (request('category') == 'Tous' || !request('category')) ? 'active' : '' }}">Tous</a>
      <a href="{{ route('portfolio.filter', ['category' => 'design']) }}#projects" 
        class="btn-filter {{ request('category') == 'design' ? 'active' : '' }}">UI/UX</a>
      <a href="{{ route('portfolio.filter', ['category' => 'mobile']) }}#projects" 
        class="btn-filter {{ request('category') == 'mobile' ? 'active' : '' }}">Mobile</a>
    </div>

    <!-- Cartes projets -->
    <div class="row g-4 justify-content-center">
      @forelse($projects as $project)
        @php
          $imageFullPath = public_path('storage/' . $project->image_path);
          $imageUrl = ($project->image_path && file_exists($imageFullPath))
              ? asset('storage/' . $project->image_path)
              : 'https://via.placeholder.com/368x242/6366f1/a78bfa?text=Projet';
        @endphp

        <div class="col-12 col-md-6 col-lg-4">
          <div class="project-card h-100 shadow-lg rounded-4 overflow-hidden project-hover project-card-clickable"
            data-title="{{ e($project->title ?? $project->name) }}"
            data-category="{{ e($project->category ?? ($project->type ?? 'Projet')) }}"
            data-description="{{ e($project->description ?? $project->short_description) }}"
            data-image="{{ $imageUrl }}"
            data-technologies="{{ e(is_array($project->technologies) ? implode(',', $project->technologies) : ($project->technologies ?? '')) }}"
            data-demo-url="{{ e($project->demo_url ?? '') }}"
            data-github-url="{{ e($project->github_url ?? '') }}"
            style="cursor:pointer;">
            
            <!-- Image -->
            <div class="project-image-bg" style="background-image:url('{{ $imageUrl }}');">
              <div class="project-icon-overlay">
                <div class="icon-circle">
                  <i class="fas fa-search-plus"></i>
                </div>
              </div>
            </div>

            <!-- Contenu -->
            <div class="card-body bg-dark text-white p-4">
              <span class="text-uppercase text-gradient small fw-bold">{{ $project->category ?? ($project->type ?? 'Projet') }}</span>
              <h3 class="fw-bold mt-2 mb-3" style="font-size:1.5rem;">{{ $project->title ?? $project->name }}</h3>
              <p class="text-secondary">{{ $project->description ?? $project->short_description }}</p>
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

    <!-- Modale projet -->
    <div class="modal fade" id="projectDetailsModal" tabindex="-1" aria-labelledby="projectDetailsLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-responsive-width">
        <div class="modal-content bg-glass text-white rounded-4 border-0 shadow-lg modal-animate" style="max-width: 80vw; margin:auto;">
          
          <div class="modal-header border-0 align-items-start bg-transparent">
            <div>
              <span class="badge text-uppercase mb-2" id="modalProjectCategory"></span>
              <h4 class="modal-title fw-bold mb-0" id="modalProjectTitle"></h4>
            </div>
            <button type="button" class="btn-close btn-close-white ms-2" data-bs-dismiss="modal" aria-label="Fermer"></button>
          </div>

          <div class="modal-body py-4">
            <div class="row g-4 align-items-center flex-column flex-lg-row">
              <!-- Image -->
              <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                <div class="position-relative rounded-4 overflow-hidden shadow-lg modal-project-image">
                  <img id="modalProjectImage" src="" alt="Image projet" class="img-fluid w-100 h-100 modal-image-animate" style="object-fit:cover; min-height:220px; max-height:340px;">
                  <div class="modal-image-overlay"></div>
                </div>
              </div>
              <!-- Contenu -->
              <div class="col-12 col-lg-6">
                <p class="fs-5 text-light-emphasis mb-3" id="modalProjectDescription"></p>
                <div class="mb-3" id="modalProjectTechnologies"></div>
                <div class="d-flex flex-wrap gap-2 mt-4" id="modalProjectLinks"></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</section>

<!-- CSS -->
<style>
/* Titre dégradé */
.text-gradient {
  background: linear-gradient(90deg,#6366f1,#38bdf8);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

/* Filtres */
.btn-filter {
  padding: .6rem 1.4rem;
  border-radius: 50px;
  font-weight: 600;
  color: #bbb;
  border: 1px solid #444;
  transition: all .3s ease;
  text-decoration: none;
}
.btn-filter:hover, .btn-filter.active {
  background: linear-gradient(90deg,#6366f1,#38bdf8);
  color: #fff;
  border-color: transparent;
  box-shadow: 0 4px 20px rgba(99,102,241,.4);
}

/* Cartes projets */
.project-card {
  background: #18122B;
  border-radius: 1.2rem;
  transition: transform .3s, box-shadow .3s;
}
.project-hover:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 30px rgba(99,102,241,.4);
}

/* Image projet */
.project-image-bg {
  position: relative;
  height: 260px;
  background-size: cover;
  background-position: center;
  filter: brightness(0.95);
  transition: transform .4s, filter .4s;
}
.project-hover:hover .project-image-bg {
  transform: scale(1.05);
  filter: brightness(1.05) saturate(1.1);
}

/* Icône overlay */
.project-icon-overlay {
  position: absolute;
  inset: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(0,0,0,0.35);
  opacity: 0;
  transition: opacity .4s ease;
}
.project-hover:hover .project-icon-overlay {
  opacity: 1;
}
.icon-circle {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  background: rgba(99,102,241,0.9);
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 1.5rem;
  color: white;
  transition: transform .3s ease;
}
.icon-circle:hover {
  transform: scale(1.1);
}

/* Modale glass */
.bg-glass {
  background: rgba(24,18,43,0.85);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(99,102,241,0.3);
}

/* Modale animation */
.modal-animate {
  transform: scale(0.8);
  opacity: 0;
  transition: transform .35s ease, opacity .35s ease;
}
.modal.show .modal-animate {
  transform: scale(1);
  opacity: 1;
}

/* Badge catégorie modale */
#modalProjectCategory {
  background: linear-gradient(90deg,#6366f1,#38bdf8);
  padding: .4rem .9rem;
  font-size: .85rem;
  border-radius: 50px;
}

/* Overlay image modale */
.modal-project-image {
  position: relative;
}
.modal-image-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(180deg,rgba(0,0,0,0.05) 0%,rgba(0,0,0,0.4) 100%);
  transition: background .3s ease;
}
.modal-project-image:hover .modal-image-overlay {
  background: linear-gradient(180deg,rgba(0,0,0,0.0) 0%,rgba(0,0,0,0.2) 100%);
}

/* Image animation modale */
.modal-image-animate {
  transform: scale(0.9);
  opacity: 0;
  transition: transform .35s ease, opacity .35s ease;
}
.modal.show .modal-image-animate {
  transform: scale(1);
  opacity: 1;
}

/* Technologies badges */
#modalProjectTechnologies span {
  margin-right: .3rem;
  margin-bottom: .3rem;
}

/* Boutons dégradés modale */
#modalProjectLinks .btn {
  transition: all .3s ease;
}
#modalProjectLinks .btn-gradient {
  background: linear-gradient(90deg,#6366f1,#38bdf8);
  color: #fff !important;
}
#modalProjectLinks .btn-gradient:hover {
  background: linear-gradient(90deg,#38bdf8,#6366f1);
  box-shadow: 0 6px 22px rgba(99,102,241,.5);
}
</style>

<style>
/* Responsive modal width */
.modal-dialog.modal-responsive-width {
  max-width: 540px;
  width: 98vw;
}
@media (min-width: 576px) {
  .modal-dialog.modal-responsive-width {
    max-width: 600px;
  }
}
@media (min-width: 768px) {
  .modal-dialog.modal-responsive-width {
    max-width: 700px;
  }
}
@media (min-width: 992px) {
  .modal-dialog.modal-responsive-width {
    max-width: 850px;
  }
}
@media (min-width: 1200px) {
  .modal-dialog.modal-responsive-width {
    max-width: 950px;
  }
}
</style>

<!-- JS Modale -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.project-card-clickable').forEach(function(card) {
    card.addEventListener('click', function() {
      document.getElementById('modalProjectTitle').textContent = card.dataset.title;
      document.getElementById('modalProjectCategory').textContent = card.dataset.category;
      document.getElementById('modalProjectImage').src = card.dataset.image;
      document.getElementById('modalProjectImage').alt = card.dataset.title;
      document.getElementById('modalProjectDescription').textContent = card.dataset.description;

      // Technologies
      var techDiv = document.getElementById('modalProjectTechnologies');
      techDiv.innerHTML = '';
      if(card.dataset.technologies) {
        techDiv.innerHTML = '<span class="fw-bold text-gradient">Technologies :</span><br>' +
          card.dataset.technologies.split(',').map(function(tech) {
            return '<span class="badge bg-secondary me-1 mb-1">'+tech.trim()+'</span>';
          }).join(' ');
      }

      // Liens
      var linksDiv = document.getElementById('modalProjectLinks');
      linksDiv.innerHTML = '';
      if(card.dataset.demoUrl) {
        linksDiv.innerHTML += '<a href="'+card.dataset.demoUrl+'" target="_blank" class="btn btn-gradient rounded-pill px-4 py-2 fw-bold shadow-sm me-2 mb-2"><i class="fas fa-external-link-alt me-2"></i>Démo</a>';
      }
      if(card.dataset.githubUrl) {
        linksDiv.innerHTML += '<a href="'+card.dataset.githubUrl+'" target="_blank" class="btn btn-dark rounded-pill px-4 py-2 fw-bold shadow-sm mb-2"><i class="fab fa-github me-2"></i>Code source</a>';
      }

      var modal = new bootstrap.Modal(document.getElementById('projectDetailsModal'));
      modal.show();
    });
  });
});
</script>
