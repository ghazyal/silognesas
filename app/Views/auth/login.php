<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SILOGNESAS | Masuk</title>
	<link rel="icon" href="<?= base_url('assets/img/icons/favicon.svg')?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/app.css')?>">
</head>
<body>
    
    <main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Selamat Datang!</h1>
							<p class="lead">
								Masukkan akun anda untuk melanjutkan
							</p>
						</div>

						<div class="card">
							<div class="card-body">

								<?= view('Myth\Auth\Views\_message_block') ?>

								<div class="m-sm-3">
									<form action="<?= url_to('login') ?>" method="post">

										<?= csrf_field() ?>

<?php if ($config->validFields === ['email']): ?>
						<div class="form-group">
							<label for="login"><?=lang('Auth.email')?></label>
							<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
<?php else: ?>
						<div class="form-group mb-3">
							<label for="login">Email atau Username</label>
							<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" placeholder="Email atau Username">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
<?php endif; ?>
						<div class="mb-3">
							<label class="form-label">Kata Sandi</label>

							<div class="input-group">

								<input
									id="password"
									class="form-control form-control-lg <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
									type="password"
									name="password"
									placeholder="Masukkan password">

								<button
									class="btn btn-outline-secondary"
									type="button"
									id="togglePassword">

									<i data-feather="eye"></i>

								</button>

								<div class="invalid-feedback">
									<?= session('errors.password') ?>
								</div>

							</div>

						</div>
										
						<div class="d-grid gap-2 mt-3">
							<button type="submit" class="btn btn-primary btn-block">Masuk</button>
						</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script>
		document.addEventListener("DOMContentLoaded", function () {

			const password = document.getElementById("password");
			const toggle = document.getElementById("togglePassword");

			toggle.addEventListener("click", function () {

				const type = password.getAttribute("type") === "password"
					? "text"
					: "password";

				password.setAttribute("type", type);

				this.innerHTML =
					type === "password"
					? '<i data-feather="eye"></i>'
					: '<i data-feather="eye-off"></i>';

				feather.replace();

			});

		});
	</script>
    <script src="<?= base_url('assets/js/app.js')?>"></script>
</body>
</html>