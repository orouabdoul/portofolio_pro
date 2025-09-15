<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-1">
	<div class="container-fluid" style="max-width: 1151px;">
			<a class="navbar-brand d-flex align-items-center" href="#home" style="gap: 0.5rem;">
				<img src="{{ asset('logo.png') }}" alt="Vistronix Business Logo" style="width:80px; height:80px; object-fit:contain; background:transparent; margin-bottom:0; margin-top:0;" />
				<span class=" fw-bold" style="font-size:0.1 rem; color:#0ea5e9;">Vistronix <br> Business</span>
			</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="mainNavbar">
			<ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-lg-4 gap-2 menu-underline-hover">
				<li class="nav-item">
					<a class="nav-link menu-underline-link" href="#home">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link menu-underline-link" href="#about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link menu-underline-link" href="#services">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link menu-underline-link" href="#portfolio">Portofolio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link menu-underline-link" href="#contact">Contact</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

<style>
	.menu-underline-link {
		position: relative;
		cursor: pointer;
		transition: color 0.2s;
	}
	.menu-underline-link::after {
		content: '';
		position: absolute;
		left: 0;
		bottom: 0.2em;
		width: 100%;
		height: 2px;
		background: linear-gradient(90deg, #4f46e5 0%, #0ea5e9 100%);
		border-radius: 2px;
		transform: scaleX(0);
		transition: transform 0.3s cubic-bezier(.4,0,.2,1);
		z-index: 1;
	}
	.menu-underline-link:hover,
	.menu-underline-link:focus {
		color: #0ea5e9;
		text-decoration: none;
	}
	.menu-underline-link:hover::after,
	.menu-underline-link:focus::after {
		transform: scaleX(1);
	}
</style>
