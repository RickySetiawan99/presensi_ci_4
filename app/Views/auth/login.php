<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Sign In | Presensi CI</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/lineicons.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/main.css" />
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ========== signin-section start ========== -->
    <section class="signin-section">
    <div class="container-fluid">

        <div class="row g-0 auth-row">
        <div class="col-lg-6">
            <div class="auth-cover-wrapper bg-primary-100">
            <div class="auth-cover">
                <div class="title text-center">
                <h1 class="text-primary mb-10">Welcome Back</h1>
                <p class="text-medium">
                    Sign in to your Existing account to continue
                </p>
                </div>
                <div class="cover-image">
                <img src="<?= base_url('assets') ?>/images/auth/signin-image.svg" alt="" />
                </div>
                <div class="shape-image">
                <img src="<?= base_url('assets') ?>/images/auth/shape.svg" alt="" />
                </div>
            </div>
            </div>
        </div>
        <!-- end col -->
        <div class="col-lg-6">
            <div class="signin-wrapper">
            <div class="form-wrapper">
                <h6 class="mb-15">Sign In Form</h6>

                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('message') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('login') ?>" method="POST">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Username</label>
                                <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : '' ?>" placeholder="Username" name="username" value="<?= old('username') ?>" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username') ?>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Password</label>
                                <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : '' ?>" placeholder="Password" name="password" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-xxl-6 col-lg-12 col-md-6">
                        <div class="form-check checkbox-style mb-30">
                            <input class="form-check-input" type="checkbox" value="" id="checkbox-remember" />
                            <label class="form-check-label" for="checkbox-remember">
                            Remember me</label>
                        </div>
                        </div>
                        <!-- end col -->
                        <div class="col-xxl-6 col-lg-12 col-md-6">
                        <div class="text-start text-md-end text-lg-start text-xxl-end mb-30">
                            <a href="reset-password.html" class="hover-underline">
                            Forgot Password?
                            </a>
                        </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                            Sign In
                            </button>
                        </div>
                        </div>
                    </div>
                <!-- end row -->
                </form>
                <div class="singin-option pt-40">
                    <p class="text-sm text-medium text-dark text-center">
                        Don’t have any account yet?
                        <a href="<?= base_url('register') ?>">Create an account</a>
                    </p>
                </div>
            </div>
            </div>
        </div>
        <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    </section>
    <!-- ========== signin-section end ========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="<?= base_url('assets') ?>/js/main.js"></script>
  </body>
</html>
