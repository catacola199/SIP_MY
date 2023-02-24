<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sri Intan Perkasa | Login</title>
    <!-- favicon CSS -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('src') ?>/assets/images/logo_only.png">
    <!-- fonts -->
    <link href="fonts/sfuidisplay.css" rel="stylesheet">
    <link href="<?= base_url('src') ?>/dist/fonts/sfuidisplay.css" rel="stylesheet">
    <!-- Icon fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <link href="<?= base_url('src') ?>/dist/css_login/custom.css" rel="stylesheet">
    <link href="<?= base_url('src') ?>/dist/css_login/plugins.min.css" rel="stylesheet">
    <link href="<?= base_url('src') ?>/dist/css_login/app.css" rel="stylesheet">

</head>


<body class="theme-royal-blue" data-spy="scroll" data-target="#navbar-nav" data-appearance="light" data-animation="false" data-appearance="light">

    <!-- =========== Start of Loader ============ -->
    <div class="preloader">
        <div class="wrapper">
            <div class="blobs">
                <div class="blob-center"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
            </div>
            <div>
                <div class="loader-canvas canvas-left"></div>
                <div class="loader-canvas canvas-right"></div>
            </div>
        </div>
    </div>
    <!-- =========== End of Loader ============ -->

    <main class="main hidden">
        <!-- =========== Start of Navigation (main menu) ============ -->

        <!-- =========== End of Navigation (main menu)  ============ -->

        <!-- =========== Start of Body ============ -->
        <section class="space bg-color--primary h-min-100vh d-flex align-items-center">
            <div class="svg-shape--top w-100 opacity--05">
                <img src="<?= base_url('src') ?>/assets/images/background/wave-8.svg" alt="wave" class="svg fill--white">
            </div>
            <!-- end of whole area svg bg -->
            <div class="svg-shape--top opacity--10">
                <img src="<?= base_url('src') ?>/assets/images/background/wave-9.svg" alt="wave" class="svg fill--white">
            </div>
            <!-- end of top right mini svg shape -->

            <div class="container">
                <div class="row ">
                    <div class="col-12 mx-auto color--white text-center mb-4 mb-lg-5">
                        <img class="navbar-brand__regular pb-2" src="<?= base_url('src') ?>/assets/images/logo_white.png" alt="brand-logo">
                        <h1 class="h2-font mb-1">Welcome back</h1>
                        <p class="opacity--60 font-size--20">Sign in to continue to Sri Intan Perkasa</p>
                    </div>
                    <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 mx-auto">
                        <div class="form--v5 bg-color--primary-light--1 px-3 py-4 px-md-5 pt-md-6 rounded--10">
                            <form action="<?= site_url('login') ?>" method="POST" autocomplete="off">
                                <div class="form-group">
                                    <label class="form__label text-uppercase font-size--15 font-w--500">Username:</label>
                                    <input id="username_pengguna" name="username_pengguna" type="text" class="form-control" placeholder="Enter your Username" required />
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="password" class="form__label text-uppercase font-size--15 font-w--500">Password:</label>
                                        <small>
                                            <a href="recover-account.html" class="text-color--400">Forgot password?</a>
                                        </small>
                                    </div>
                                    <input id="password_pengguna" name="password_pengguna" type="password" class="form-control" placeholder="Choose a password" required />
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        <button class="btn btn-bg--primary btn-size--md btn-hover--3d mx-auto" type="submit"><span class="btn__text">Log in</span></button>
                                    </div>
                                </div>





                            </form>
                            <!-- end of form -->
                            <div class="text-center mt-4 pt-2 border--top">
                                <p class="text-color--400">Don't have an account? <a href="signup.html" class="color--primary">Signup</a></p>
                            </div>
                            <!-- end of bottom text -->
                        </div>
                        <!-- end of from area -->
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Body ============ -->
    </main>

    <script src="<?= base_url('src') ?>/dist/js_login/plugins.min.js"></script>
    <script src="<?= base_url('src') ?>/dist/js_login/app.js"></script>


</body>

</html>