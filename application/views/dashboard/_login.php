
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- Preloader - style you can find in spinners.css -->
        <div class="preloader">
            <span class="loader"></span>
        </div>
        <!-- Preloader - style you can find in spinners.css -->

        <!-- Login box.scss -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(<?= base_url('src') ?>/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(<?= base_url('src') ?>/assets/images/big/4.png);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="<?= base_url('src') ?>/assets/images/big/icon.png" alt="wrapkit">
                        </div>
                        <h4 class="mt-3 text-center">
                        	Start your session!
                        </h4>
                        <p class="text-center">
                        	<small>Enter your email address and password to access admin panel.</small>
                        </p>
                        <form class="mt-4" action="<?= site_url('login')?>" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">
                                        	<strong><small>Username</small></strong>
                                        </label>
                                        <input class="form-control" id="username_pengguna" name="username_pengguna" type="text"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">
                                        	<strong><small>Password</small></strong>
                                        </label>
                                        <input class="form-control" id="password_pengguna" name="password_pengguna" type="password"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Sign In</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    <small>Don't have an account? 
                                        <a href="https://api.whatsapp.com/send?phone=6289517832540&text=Assalamualaikum%20admin,%20tolong%20buatin%20akun%20SIFAPEN%20Terimakasih."class="text-danger">Contact admin</a>
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
    <?php if ($this->session->flashdata('notif')):?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "<?php echo $this->session->flashdata('notif'); ?>",
        });
        </script>
    <?php endif ?>
    <?php if ($this->session->flashdata('notif-logout')):?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "<?php echo $this->session->flashdata('notif-logout'); ?>",
        });
        </script>
    <?php endif ?>
</html>


