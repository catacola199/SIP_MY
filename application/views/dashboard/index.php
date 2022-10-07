<!-- Head -->
<?php $this->load->view('component/_head') ?>
<!-- Head -->

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->

    <div class="preloader">
        <span class="loader"></span>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->


        <!-- ****** Top Header -->
        <?php $this->load->view('component/_header') ?>
        <!-- ****** Top Header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <?php $this->load->view('component/_sidebar') ?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- Start First Cards -->

                <div class="row">
                    <div class="col-12">
                        <div class="card text-center">
                            <img class="mx-auto d-block mt-4" style="width: 20%;" src="<?= base_url('assets/logo_only.png') ?>" alt="...">

                            <div class="card-body">
                                <h2 class="card-title">Sri Intan Perkasa</h2>

                                <h4 class="card-title">Selamat Datang, <?= $this->fungsi->user_login()->nama_pengguna ?></h4>

                                <marquee width="40%" direction="left">
                                    <h5 class="card-title">Selamat datang di halaman administrator Website Sri Intan Perkasa</h5>
                                </marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->load->view('component/_footer') ?>

        </div>
    </div>
    <?php $this->load->view('component/_jquery') ?>