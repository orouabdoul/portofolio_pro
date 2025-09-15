<section class="py-5" id="hero" style="background: linear-gradient(120deg, #18142A 60%, #0FEDD3 100%); min-height:100vh; display:flex; align-items:center; position:relative; overflow:hidden;">
    <div class="container">
        <div class="row align-items-center justify-content-between position-relative">
            <div class="col-lg-7 d-flex flex-column gap-4 position-relative z-2">
                <h1 class="fw-bold text-white mb-1" style="font-size:2.8rem; line-height:1.1;">
                    <span style="color:#0FEDD3;">Vous rêvez d’une app mobile</span><br>
                    <span>qui séduit, convertit et fidélise&nbsp;?</span>
                </h1>
                <h2 class="fw-bold text-white mb-2" style="font-size:2.2rem;">Je m’appelle <span class="text-info">Abdoulaye AMADOU ISSIAKA</span></h2>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="fw-bold text-white" style="font-size:1.7rem;">
                        <span id="animated-roles"></span>
                    </span>
                </div>
                <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const roles = [
                        { text: "Développeur mobile", color: "#0FEDD3" },
                        { text: "Designer UI/UX", color: "#ffFFFf" },
                         
                    ];
                    const container = document.getElementById('animated-roles');
                    let roleIndex = 0;
                    let charIndex = 0;
                    let typing = true;
                    let delay = 80;
                    let pause = 1200;

                    function typeRole() {
                        const role = roles[roleIndex];
                        if (typing) {
                            if (charIndex <= role.text.length) {
                                container.innerHTML = '';
                                roles.forEach((r, i) => {
                                    let content = '';
                                    if (i < roleIndex) {
                                        content = `<span style="color:${r.color};">${r.text}</span>`;
                                    } else if (i === roleIndex) {
                                        content = `<span style="color:${r.color};">${r.text.substring(0, charIndex)}</span>`;
                                    }
                                    if (content) {
                                        container.innerHTML += content;
                                        if (i < roles.length - 1) container.innerHTML += ' <span class="text-white">|</span> ';
                                    }
                                });
                                charIndex++;
                                setTimeout(typeRole, delay);
                            } else {
                                typing = false;
                                setTimeout(typeRole, pause);
                            }
                        } else {
                            charIndex = 0;
                            roleIndex = (roleIndex + 1) % roles.length;
                            typing = true;
                            setTimeout(typeRole, 400);
                        }
                    }
                    typeRole();
                });
                </script>
                <p class="fs-4 text-white mb-3" style="max-width:600px;">
                    J’accompagne les startups et entrepreneurs à transformer leurs idées en applications <span class="text-info">rapides</span>, <span class="text-info">élégantes</span> et <span class="text-info">centrées utilisateur</span>.<br>
                    <span class="fw-semibold text-info">Mon secret&nbsp;?</span> Un mix unique de design émotionnel, de code robuste et d’écoute attentive pour créer des expériences qui marquent et font grandir votre business.
                </p>
                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <a href="#contact" class="btn btn-info text-dark fw-bold rounded-pill px-4 py-2 shadow-sm" style="font-size:1.3rem; min-width:200px;">Discutons de votre projet</a>
                    <a href="/cv.pdf" class="btn btn-outline-light fw-bold rounded-pill px-4 py-2 shadow-sm" style="font-size:1.3rem; min-width:180px;" download>Télécharger mon CV</a>
                </div>
            </div>
            <div class="col-lg-5 d-none d-lg-flex justify-content-center align-items-center position-relative">
                <div class="position-relative">
                    <img src="/profil.png" alt="Photo Abdoulaye" class="img-fluid rounded-circle shadow-lg border border-4 border-info position-relative z-2" style="width: 270px; height: 270px; object-fit: cover; background:#18142A;">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info text-dark shadow" style="font-size:1.1rem;">+3 ans<br>expérience</span>
                </div>
            </div>
        </div>
        <!-- Effet décoratif cercle -->
        <div style="position:absolute; right:-120px; bottom:-120px; width:320px; height:320px; background:rgba(15,237,211,0.12); border-radius:50%; z-index:1;"></div>
    </div>
</section>
