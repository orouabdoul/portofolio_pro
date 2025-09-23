<section class="py-5" id="education" style="background:#1E192D;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-white" style="font-size:2.2rem;">Parcours <span class="text-gradient">Académique & Expériences</span></h2>
      <p class="text-secondary">Formation & expériences professionnelles</p>
    </div>
    <div class="row g-4 justify-content-center">
      <!-- Colonne Éducation -->
      <div class="col-12 col-md-6">
        <div class="mb-3">
          <h4 class="fw-bold text-gradient mb-4"><i class="fas fa-graduation-cap me-2"></i>Éducation</h4>
        </div>
        <div class="d-flex flex-column gap-4">
          <div class="glass-card animate-glass">
            <h5 class="fw-bold text-white mb-1">Master Informatique</h5>
            <div class="text-secondary small mb-1">Université XYZ &mdash; 2022-2024</div>
            <div class="text-light">Spécialisation en développement web et mobile, projets innovants, stage en entreprise.</div>
          </div>
          <div class="glass-card animate-glass">
            <h5 class="fw-bold text-white mb-1">Licence Informatique</h5>
            <div class="text-secondary small mb-1">Université ABC &mdash; 2019-2022</div>
            <div class="text-light">Bases solides en algorithmique, programmation, bases de données, réseaux.</div>
          </div>
          <div class="glass-card animate-glass">
            <h5 class="fw-bold text-white mb-1">Baccalauréat Scientifique</h5>
            <div class="text-secondary small mb-1">Lycée DEF &mdash; 2019</div>
            <div class="text-light">Mention Bien, spécialité Mathématiques.</div>
          </div>
        </div>
      </div>
      <!-- Colonne Expériences -->
      <div class="col-12 col-md-6">
        <div class="mb-3">
          <h4 class="fw-bold text-gradient mb-4"><i class="fas fa-briefcase me-2"></i>Expériences</h4>
        </div>
        <div class="d-flex flex-column gap-4">
          <div class="glass-card animate-glass">
            <h5 class="fw-bold text-white mb-1">Développeur Web (Stage)</h5>
            <div class="text-secondary small mb-1">Startup WebDev &mdash; 2023</div>
            <div class="text-light">Développement d'applications Laravel, intégration d'API, UI responsive.</div>
          </div>
          <div class="glass-card animate-glass">
            <h5 class="fw-bold text-white mb-1">Freelance Web</h5>
            <div class="text-secondary small mb-1">Projets clients &mdash; 2022-2025</div>
            <div class="text-light">Création de sites vitrines, e-commerce, maintenance et accompagnement technique.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<style>
.glass-card {
  background: rgba(24,18,43,0.88);
  border-radius: 1.1rem;
  border: 1.5px solid rgba(99,102,241,0.18);
  box-shadow: 0 6px 32px 0 rgba(99,102,241,0.10), 0 1.5px 8px 0 rgba(0,0,0,0.13);
  padding: 1.5rem 1.3rem;
  position: relative;
  overflow: hidden;
  transition: box-shadow .4s cubic-bezier(.4,2,.6,1), transform .4s cubic-bezier(.4,2,.6,1);
}
.glass-card:before {
  content: '';
  position: absolute;
  top: -60px; left: -60px;
  width: 120px; height: 120px;
  background: linear-gradient(120deg,rgba(99,102,241,0.18),rgba(56,189,248,0.13));
  filter: blur(18px);
  z-index: 0;
  border-radius: 50%;
  pointer-events: none;
  opacity: 0.7;
  transition: opacity .4s;
}
.glass-card:hover {
  box-shadow: 0 12px 48px 0 rgba(99,102,241,0.18), 0 1.5px 8px 0 rgba(0,0,0,0.18);
  transform: translateY(-6px) scale(1.03);
}
.glass-card:hover:before {
  opacity: 1;
}
.animate-glass {
  animation: glassFadeIn 1.1s cubic-bezier(.4,2,.6,1);
}
@keyframes glassFadeIn {
  from { opacity: 0; transform: translateY(30px) scale(0.97); }
  to { opacity: 1; transform: translateY(0) scale(1); }
}
@media (max-width: 767.98px) {
  .glass-card { margin-bottom: 1.2rem; }
}
</style>
