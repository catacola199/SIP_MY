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
                        <!-- <h6 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome Jason!</h6> -->
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a>
                                        <i class="fas fa-angle-double-right"></i> Company Profile
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="card-columns">
                    <?php foreach ($brosur as $data):?>
                        <?php if($data->link_youtube == null):?>
                            <div class="card shadow-sm">
                                <img src="<?= base_url('upload/brosur/thumbnail/'.$data->thumb_brosur) ?>" class="img-fluid card-img-top" alt="...">
                                <div class="card-body ">
                                    <h5 class="card-title"><?= $data->nama_brosur?></h5>
                                    <p class="card-text"><?= $data->deskripsi_brosur?></p>
                                    <a href="#!" class="btn btn-primary"><i class='bx bx-download mr-2'></i>Download</a>
                                </div>
                            </div>
                        <?php else:?> 
                            <div class="card shadow-sm">
                                <iframe src="https://www.youtube.com/embed/<?= $data->link_youtube?>" frameborder="0" allowfullscreen class="img-fluid card-img-top"></iframe>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data->nama_brosur?></h5>
                                    <p class="card-text"><?= $data->deskripsi_brosur?></p>
                                    <a href="#!" class="btn btn-primary"><i class='bx bx-download mr-2'></i>Download</a>
                                </div>
                            </div>
                        <?php endif;?>
                    <?php endforeach;?>
                </div>
                <?php $this->load->view('component/_footer') ?>
            </div>
        </div>
    </div>
    <?php $this->load->view('component/_jquery') ?>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>