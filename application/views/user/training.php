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
                                        <i class="fas fa-angle-double-right"></i> Presentasi Training
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
                                <img src="<?= base_url('upload/brosur/thumbnail/'.$data->thumb_brosur)?>" class="card-img-top pp" style="height:10rem;"alt="...">
                                <div class="card-body ">
                                    <h5 class="card-title"><?= $data->nama_brosur?></h5>
                                    <p class="card-text"><?= $data->deskripsi_brosur?></p>
                                    <a class="btn btn-outline-primary" href="#!" data-bs-toggle="modal" data-bs-target="#brosur-<?= $data->id ?>"><i class='bx bx-download mr-2'></i>Download</a>
                                </div>
                            </div>
                        <?php else:?> 
                            <div class="card shadow-sm">
                                <iframe src="https://www.youtube.com/embed/<?= $data->link_youtube?>" frameborder="0" allowfullscreen class="img-fluid card-img-top"></iframe>
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data->nama_brosur?></h5>
                                    <p class="card-text"><?= $data->deskripsi_brosur?></p>
                                    <a class="btn btn-outline-primary" target="_blank" href="<?= base_url('upload/brosur/file/'.$data->file_brosur)?>"><i class='bx bx-download mr-2'></i>Download</a>
                                </div>
                            </div>
                        <?php endif;?>
                        <div class="modal fade" id="brosur-<?= $data->id ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" ria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?= $data->file_brosur ?></h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <embed type="application/pdf" src="<?= base_url('upload/brosur/file/' . $data->file_brosur) ?>" height="530"></embed>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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