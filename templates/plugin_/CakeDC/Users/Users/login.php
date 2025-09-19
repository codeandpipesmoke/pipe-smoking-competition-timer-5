<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Astro v5.13.2" />
    <title><?= __('Signin Template · Bootstrap v5.3') ?></title>
    <link href="/bootstrap-5.3.8-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/sign-in.css" rel="stylesheet" />
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: #0000001a;
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow:
          inset 0 0.5em 1.5em #0000001a,
          inset 0 0.125em 0.5em #00000026;
      }
      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }
      .bi {
        vertical-align: -0.125em;
        fill: currentColor;
      }
      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }
      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }
      .bd-mode-toggle {
        z-index: 1500;
      }
      .bd-mode-toggle .bi {
        width: 1em;
        height: 1em;
      }
      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
  </head>
  <body class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
		<?= $this->Form->create(null) ?>

			<!-- img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57" / -->
			<h1 class="h3 mb-3 fw-normal">Please sign in</h1>
			<div class="form-floating">
				<input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" autofocus="autofocus" />
				<label for="username">Email address</label>
			</div>
			<div class="form-floating">
				<input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" />
				<label for="password">Password</label>
			</div>
			<div class="form-check text-start my-3">
				<input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault" />
				<label class="form-check-label" for="checkDefault">
					<?= __('Remember me') ?>
				</label>
			</div>
			<button class="btn btn-primary w-100 py-2" type="submit">
				<?= __('Sign in') ?>
			</button>
			<p class="mt-5 mb-3 text-body-secondary">&copy; 2025-2026</p>
		<?= $this->Form->end() ?>
	  
    </main>
    <script src="/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js" class="astro-vvvwv3sm"></script>
  </body>
  
  <?php // 65a4d02b7c6e4032a0194572b29faec1 ?>
  
</html>
