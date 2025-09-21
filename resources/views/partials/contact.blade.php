<section class="py-5" id="contact" style="background:#18142A;">
	<div class="container">
	<h2 class="fw-bold text-white text-center mb-4">Contact</h2>
	<div class="row justify-content-center">
		<div class="col-md-7">
			@if(session('success'))
			<div id="contact-success-dialog" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; min-width: 320px; max-width: 90vw; background: #fff; border-radius: 1rem; box-shadow: 0 8px 32px rgba(60,60,120,0.15); padding: 2rem 1.5rem; text-align: center;">
				<i class="fas fa-check-circle text-success mb-3" style="font-size:2.5rem;"></i>
				<div class="fw-bold mb-2" style="font-size:1.2rem;">{{ session('success') }}</div>
				<button type="button" class="btn btn-success px-4" onclick="document.getElementById('contact-success-dialog').style.display='none'">OK</button>
			</div>
			<script>
				setTimeout(function() {
					var dialog = document.getElementById('contact-success-dialog');
					if(dialog) {
						dialog.style.display = 'none';
					}
				}, 4000);
			</script>
			@endif
			@if(session('error'))
			<div id="contact-error-dialog" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; min-width: 320px; max-width: 90vw; background: #fff; border-radius: 1rem; box-shadow: 0 8px 32px rgba(220,60,60,0.15); padding: 2rem 1.5rem; text-align: center;">
				<i class="fas fa-exclamation-triangle text-danger mb-3" style="font-size:2.5rem;"></i>
				<div class="fw-bold mb-2" style="font-size:1.2rem;">{{ session('error') }}</div>
				<button type="button" class="btn btn-danger px-4" onclick="document.getElementById('contact-error-dialog').style.display='none'">OK</button>
			</div>
			<script>
				setTimeout(function() {
					var dialog = document.getElementById('contact-error-dialog');
					if(dialog) {
						dialog.style.display = 'none';
					}
				}, 4000);
			</script>
			@endif
			<form method="POST" action="{{ route('contact.submit') }}">
				@csrf
				<div class="mb-3">
					<label for="name" class="form-label text-info">Nom</label>
					<input type="text" class="form-control" id="name" name="name" required>
				</div>
				<div class="mb-3">
					<label for="email" class="form-label text-info">Email</label>
					<input type="email" class="form-control" id="email" name="email" required>
				</div>
				<div class="mb-3">
					<label for="message" class="form-label text-info">Message</label>
					<textarea class="form-control" id="message" name="message" rows="5" required></textarea>
				</div>
				<button type="submit" class="btn btn-info rounded-pill px-4">Envoyer</button>
			</form>
		</div>
	</div>
</div>
</section>
