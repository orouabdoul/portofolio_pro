<section class="py-5" id="education" style="background:#1E192D;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-white" style="font-size:2.2rem;">Parcours 
        <span class="text-gradient">Académique & Expériences</span>
      </h2>
      <p class="text-secondary">Formation & expériences professionnelles</p>
    </div>

    <div class="row g-5">
      <!-- Colonne Éducation -->
      <div class="col-12 col-md-6">
        <h4 class="fw-bold text-gradient mb-4"><i class="fas fa-graduation-cap me-2"></i>Formation</h4>
        <div class="timeline">
          <div class="timeline-item glass-card">
            <h5 class="fw-bold text-white mb-1">Programme “Réussir en Afrique”</h5>
            <div class="text-secondary small mb-1">Cotonou &mdash; Mars 2025 – Aujourd’hui</div>
            <p class="text-light mb-0">Entrepreneuriat digital, freelancing, marketing d’affiliation, stratégies réseaux sociaux.</p>
          </div>
          <div class="timeline-item glass-card">
            <h5 class="fw-bold text-white mb-1">Formation Design UI/UX</h5>
            <div class="text-secondary small mb-1">2023 - 2024</div>
            <p class="text-light mb-0">Principes de design, prototypage, Figma, Adobe XD, expérience utilisateur, accessibilité.</p>
          </div>
          <div class="timeline-item glass-card">
            <h5 class="fw-bold text-white mb-1">Licence Professionnelle en Génie Informatique</h5>
            <div class="text-secondary small mb-1">Ecole supérieure Faucon &mdash; 2021 - 2024</div>
            <p class="text-light mb-0">Formation professionnelle & développement mobile.</p>
          </div>
          <div class="timeline-item glass-card">
            <h5 class="fw-bold text-white mb-1">Baccalauréat</h5>
            <div class="text-secondary small mb-1">CEG Gomparou &mdash; 2017 - 2021</div>
            <p class="text-light mb-0">Série scientifique.</p>
          </div>
          <div class="timeline-item glass-card">
            <h5 class="fw-bold text-white mb-1">Certificat d'Études du Premier Cycle</h5>
            <div class="text-secondary small mb-1">CEG Kokey &mdash; 2013 - 2017</div>
          </div>
        </div>
      </div>

      <!-- Colonne Expériences -->
      <div class="col-12 col-md-6">
        <h4 class="fw-bold text-gradient mb-4"><i class="fas fa-briefcase me-2"></i>Expérience</h4>
        <div class="timeline">
          <div class="timeline-item glass-card">
              <h5 class="fw-bold text-white mb-1">Développeur mobile – COSIT-BENIN</h5>
              <div class="text-secondary small mb-1">Akpakpa, Cotonou | 2024 – aujourd’hui</div>
              <p class="text-light mb-0">
                <strong>SIM</strong> : Application mobile pour le suivi des prix sur les marchés agricoles (collecte, analyse, reporting terrain).<br>
                <strong>MyMonto</strong> : Deux apps (garages & utilisateurs) pour la gestion des réparations automobiles, assurances, suivi des interventions/révisions, localisation GPS, marketplace, prise de rendez-vous.<br>
              </p>
          </div>
          <div class="timeline-item glass-card">
            <h5 class="fw-bold text-white mb-1">UI/UX Designer</h5>
            <div class="text-secondary small mb-1">Smart Bulk Editor</div>
          </div>
          <div class="timeline-item glass-card">
            <h5 class="fw-bold text-white mb-1">Stagiaire développement mobile (Flutter)</h5>
            <div class="text-secondary small mb-1">COSIT-BENIN, Akpakpa | 2023 – 2024</div>
          </div>
          <div class="timeline-item glass-card">
            <h5 class="fw-bold text-white mb-1">Stagiaire développement web Laravel</h5>
            <div class="text-secondary small mb-1">Institut Numérique, Calavi | 2022 – 2023</div>
          </div>
          <div class="timeline-item glass-card">
            <h5 class="fw-bold text-white mb-1">Stagiaire développement web PHP</h5>
            <div class="text-secondary small mb-1">COSIT-BENIN, Akpakpa | 2021 – 2022</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* Glass Card */
.glass-card {
  background: rgba(24,18,43,0.85);
  border-radius: 1rem;
  border-left: 3px solid #38bdf8;
  padding: 1.2rem 1.5rem;
  margin-bottom: 1.5rem;
  position: relative;
  box-shadow: 0 8px 28px rgba(0,0,0,0.25);
  transition: transform .3s ease, box-shadow .3s ease;
}
.glass-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 12px 36px rgba(0,0,0,0.35);
}

/* Timeline */
.timeline {
  position: relative;
  padding-left: 1.5rem;
}
.timeline:before {
  content: '';
  position: absolute;
  top: 0; left: 8px;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg,#38bdf8,#6366f1);
  opacity: 0.4;
}
.timeline-item {
  position: relative;
}
.timeline-item:before {
  content: '';
  position: absolute;
  left: -19px; top: 12px;
  width: 12px; height: 12px;
  background: #38bdf8;
  border-radius: 50%;
  box-shadow: 0 0 12px rgba(56,189,248,0.7);
}

/* Animation entrée */
.timeline-item {
  animation: fadeUp 0.8s ease forwards;
  opacity: 0; transform: translateY(20px);
}
@keyframes fadeUp {
  to { opacity: 1; transform: translateY(0); }
}

@media (max-width: 767.98px) {
  .timeline:before { left: 4px; }
  .timeline-item:before { left: -12px; }
}
</style>
