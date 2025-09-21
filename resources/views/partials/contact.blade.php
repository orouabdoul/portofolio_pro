<section class="py-5" id="contact" style="background:#18142A;">
	<div class="container">
	<h2 class="fw-bold text-white text-center mb-4">Contact</h2>
	<div class="row justify-content-center">
		<div class="col-md-7">
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
