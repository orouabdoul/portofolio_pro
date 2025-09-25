<section class="py-5" id="testimonials" style="background:linear-gradient(120deg,#18142A 60%,#23203a 100%);">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold text-info" style="font-size:2.2rem;">Témoignages</h2>
      <p class="fs-5 text-white-50">Des clients satisfaits partagent leur expérience.</p>
    </div>
    <!-- Script pour rendre le carousel infini -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var carousel = document.getElementById('testimonialCarousel');
        if (carousel) {
          var bsCarousel = bootstrap.Carousel.getOrCreateInstance(carousel, {
            interval: 5000,
            ride: 'carousel',
            wrap: true // boucle infinie
          });
        }
      });
    </script>

    <!-- Carrousel -->
    <div id="testimonialCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">

        <!-- Témoignage 1 -->
        <div class="carousel-item active">
          <div class="testimonial-card text-center text-white rounded-4 p-5 mx-auto" style="max-width:720px;">
            <div class="mb-4">
              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah" class="rounded-circle shadow" style="width:90px; height:90px; object-fit:cover; border:3px solid #38bdf8;">
            </div>
            <blockquote class="testimonial-quote mx-auto mb-4">
              “Un accompagnement exceptionnel, une app livrée en avance et un design qui fait l’unanimité !”
            </blockquote>
            <h5 class="fw-bold text-info mb-0">Sarah</h5>
            <small class="text-white-50">Fondatrice de StartupX</small>
          </div>
        </div>

        <!-- Témoignage 2 -->
        <div class="carousel-item">
          <div class="testimonial-card text-center text-white rounded-4 p-5 mx-auto" style="max-width:720px;">
            <div class="mb-4">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Julien" class="rounded-circle shadow" style="width:90px; height:90px; object-fit:cover; border:3px solid #38bdf8;">
            </div>
            <blockquote class="testimonial-quote mx-auto mb-4">
              “Pédagogie, expertise et disponibilité. Je recommande à 100 % pour tout projet mobile !”
            </blockquote>
            <h5 class="fw-bold text-info mb-0">Julien</h5>
            <small class="text-white-50">Solopreneur</small>
          </div>
        </div>

        <!-- Témoignage 3 -->
        <div class="carousel-item">
          <div class="testimonial-card text-center text-white rounded-4 p-5 mx-auto" style="max-width:720px;">
            <div class="mb-4">
              <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Fatou" class="rounded-circle shadow" style="width:90px; height:90px; object-fit:cover; border:3px solid #38bdf8;">
            </div>
            <blockquote class="testimonial-quote mx-auto mb-4">
              “Un vrai partenaire, force de proposition et toujours à l’écoute. Résultat : une appli qui cartonne !”
            </blockquote>
            <h5 class="fw-bold text-info mb-0">Fatou</h5>
            <small class="text-white-50">Responsable produit</small>
          </div>
        </div>

      </div>

      <!-- Indicateurs minimalistes -->
      <div class="carousel-indicators mt-4">
        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active rounded-circle" style="width:10px; height:10px;"></button>
        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" class="rounded-circle" style="width:10px; height:10px;"></button>
        <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" class="rounded-circle" style="width:10px; height:10px;"></button>
      </div>
    </div>
  </div>
</section>

<style>
.testimonial-card {
  background: rgba(24,18,43,0.92);
  backdrop-filter: blur(10px);
  border: 1.5px solid rgba(56,189,248,0.18);
  box-shadow: 0 8px 32px rgba(56,189,248,0.15), 0 4px 12px rgba(0,0,0,0.2);
}
.testimonial-quote {
  font-size: 1.25rem;
  font-style: italic;
  line-height: 1.8;
  color: #e6faff;
  max-width: 600px;
}
.carousel-fade .carousel-item {
  transition: opacity 1s ease-in-out;
}
</style>
