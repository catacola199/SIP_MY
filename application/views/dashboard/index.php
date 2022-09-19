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
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h6 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome Jason!</h6>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-12 align-self-center">
                        <div class="customize-input float-right">
                            <h6 class="form-control bg-white border-0 custom-shadow custom-radius">
                                <small>
                                    Hari ini <a class="badge-pill badge-warning"> <?php echo date('d F Y ')  ?> </a>
                                    Jam
                                    <a class="badge-pill badge-warning" id="jam"></a>
                                    <a class="badge-pill badge-warning" id="menit"></a>
                                    <a class="badge-pill badge-warning" id="detik"></a>
                                </small>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start First Cards -->
                <div class="card-group">
                    <div class="card border-right btn btn-outline-light">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <?php foreach ($usertotal as $data) : ?>
                                            <h2 class="text-dark mb-1 font-weight-medium"><?php echo $data->total_user ?></h2>
                                        <?php endforeach; ?>
                                        <!-- <span class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span> -->
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">User Akun</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right btn btn-outline-light">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <?php foreach ($totalpengajar as $data) : ?>
                                        <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?php echo $data->total_pengajar ?></h2>
                                    <?php endforeach; ?>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pengajar
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right btn btn-outline-light">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <?php foreach ($totalpeserta as $data) : ?>
                                            <h2 class="text-dark mb-1 font-weight-medium"><?php echo $data->total_peserta ?></h2>
                                        <?php endforeach; ?>
                                        <!-- <span class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span> -->
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Peserta Didik</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card btn btn-outline-light">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <?php foreach ($totalabsensi as $data) : ?>
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $data->totalabsensi ?></h2>
                                    <?php endforeach; ?>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Absensi</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End First Cards -->

                <!-- Start Sales Charts Section -->
                <!-- <?php //$this->load->view('component/_grafikcard') 
                        ?> -->
                <!-- End Sales Charts Section -->

                <!-- Start Location and Earnings Charts Section -->
                <!-- <?php //$this->load->view('component/_grafikcardtwo') 
                        ?> -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12 mt-4">
                        <h4 class="mb-0">Tentang aplikasi SIFAPEN</h4>
                        <p class="text-muted mt-0 font-12">
                            <!-- Add an optional header and/or footer within a card. -->
                        </p>
                        <!-- Card -->
                        <div class="card text-center">
                            <!-- <div class="card-header">
                                Sekilas tentang aplikasi IFAPEN
                            </div> -->
                            <div class="card-body btn btn-outline-light">
                                <h4 class="card-title">Sistem Informasi Absensi & Penjadwalan</h4>
                                <hr>
                                <img class="col-lg-10 col-md-8 modal-bg-img" src="<?= base_url('src') ?>/assets/images/big/4.png" alt="about">
                                <hr>
                                <p class="card-text">
                                    Sistem Informasi Absensi & Penjadwalan <b>(SIFAPEN)</b> merupakan sebuah sistem informasi yang berfungsi untuk mengelola dan memonitoring data, baik data absensi siswa dan penjadwalan kegiatan belajar mengajar.</p>
                                <a href="javascript:void(0)" class="btn btn-info">Selengkapnya...</a>
                            </div>
                            <div class="card-footer text-muted">
                                <!-- 2 days ago -->
                            </div>
                        </div>
                        <!-- Card -->
                    </div>
                </div>
                <!-- End Row -->
                <!-- End Location and Earnings Charts Section -->

                <!-- Start Top Leader Table -->
                <!-- <?php //$this->load->view('component/_table') 
                        ?> -->
                <!-- End Top Leader Table -->
            </div>

            <!-- End Container fluid  -->

            <!-- footer -->
            <?php $this->load->view('component/_footer') ?>
            <!-- End footer -->

        </div>
        <!-- End Page wrapper  -->

    </div>
    <!-- End Wrapper -->

    <!-- Jquery -->
    <?php $this->load->view('component/_jquery') ?>
    <!-- End JQuery -->

    <script>
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var waktu = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("jam").innerHTML = waktu.getHours();
            document.getElementById("menit").innerHTML = waktu.getMinutes();
            document.getElementById("detik").innerHTML = waktu.getSeconds();
        }
    </script>