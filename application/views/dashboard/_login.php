<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('src') ?>/assets/images/favicon.png">
    <title>Login Page</title>
    <!-- Custom CSS -->
    <link href="<?= base_url('src') ?>/dist/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.32/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


</head>

<body>
    <div class="main-wrapper">
        <!-- Preloader - style you can find in spinners.css -->
        <div class="preloader">
            <span class="loader"></span>
        </div>
        <!-- Preloader - style you can find in spinners.css -->

        <!-- Login box.scss -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background-color:#3C7FB0;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(<?= base_url('src') ?>/assets/images/LoginPage.png);">
                    <div class="cards">
                        <img src="<?= base_url('src') ?>/assets/images/SIPMEDic.png" class="card-img" alt="...">
                    </div>
                </div>
                <div class="col-lg-5 col-md-7 bg-white" style="border-radius: 2%;">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="<?= base_url('src') ?>/assets/images/sipmedic1.png" alt="wrapkit">
                        </div>
                        <h4 class="mt-3 text-center">
                            Welcome
                        </h4>
                        <p class="text-center">
                            <small>We Are Happy To Have You Back</small>
                        </p>
                        <form class="mt-4" action="<?= site_url('login') ?>" method="POST" autocomplete="off">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="username_pengguna" name="username_pengguna" placeholder="Username">
                                        <label for="floatingInput">Username</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password_pengguna" name="password_pengguna" placeholder="Password">
                                        <label for="floatingInput">Password</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="button-43">Sign In</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    <small>Don't have an account?
                                        <a href="#" class="text-danger">Contact admin</a>
                                    </small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Login box.scss -->

    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- All Required js -->
    <script src="<?= base_url('src') ?>/assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('src') ?>/assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="<?= base_url('src') ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- This page plugin js -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>
<?php if ($this->session->flashdata('notif')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "<?php echo $this->session->flashdata('notif'); ?>",
        });
    </script>
<?php endif ?>
<?php if ($this->session->flashdata('notif-logout')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "<?php echo $this->session->flashdata('notif-logout'); ?>",
        });
    </script>
<?php endif ?>

</html>