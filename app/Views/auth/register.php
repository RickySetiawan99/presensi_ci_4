<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.svg') ?>" type="image/x-icon" />
    <title>Sign In | Presensi CI</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/lineicons.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/materialdesignicons.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/fullcalendar.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>" />
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
                  <h1 class="text-primary mb-10">Get Started</h1>
                  <p class="text-medium">
                    Start creating the best possible user experience
                    <br class="d-sm-block" />
                    for your customers.
                  </p>
                </div>
                <div class="cover-image">
                  <img src="<?= base_url('assets/images/auth/signin-image.svg') ?>" alt="Sign In Image" />
                </div>
                <div class="shape-image">
                  <img src="<?= base_url('assets/images/auth/shape.svg') ?>" alt="Shape" />
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
          <div class="col-lg-6">
            <div class="signup-wrapper">
              <div class="form-wrapper">
                <h6 class="mb-15">Sign Up Form</h6>
                <p class="text-sm mb-25">
                  Start creating the best possible user experience for your customers.
                </p>
                <form id="form-register" method="post">
                  <div id="form-message"></div>
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Username</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Username" name="username" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Password</label>
                        <input type="password" id="input-password" class="form-control" placeholder="Password" name="password" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Confirm Password</label>
                        <input type="password" id="input-password-confirm" class="form-control" placeholder="Confirm Password" name="password_confirm" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="button-group d-flex justify-content-center flex-wrap">
                        <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center submit-button">
                          Sign Up
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
    <script>
      $("#form-register").on("submit", function (e) {
        e.preventDefault();

        let form = $(this);

        // animation
        $("input", form).prop("readonly", true);
        $(".submit-button").prop("disabled", true);
        $(".submit-button", form).html($(".submit-button", form).html() + '<span class="spinner-border spinner-border-sm ml-2"></span>');

        $.post("<?= base_url('register') ?>", form.serialize(), function (data) {
          if (data.status) {
            $("#form-message").html(`<div class="alert alert-info text-break">${data.response}</div>`);
            setTimeout(() => {
              window.location.href = data.redirect;
            }, 1000);
          } else {
            // revert animation and display error
            $("input", form).prop("readonly", false);
            $(".submit-button").prop("disabled", false).html("Sign Up");
            $("#form-message").html(`<div class="alert alert-danger text-break">${data.response}</div>`);
          }
        }, 'json')
        .fail(function (xhr) {
          alert("Error: " + xhr.responseText);
          // revert animation
          $("input", form).prop("readonly", false);
          $(".submit-button").prop("disabled", false).html("Sign Up");
        });
      });
    </script>
  </body>
</html>
