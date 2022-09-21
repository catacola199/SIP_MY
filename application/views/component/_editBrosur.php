<!-- Head -->
<?php $this->load->view('component/_head') ?>
<!-- Head -->

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
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
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a>
                                        <i class="fas fa-angle-double-right"></i> Edit Brosur
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

                <!-- Start Sales Charts Section -->
                <!-- <?php //$this->load->view('component/_grafikcard') 
                        ?> -->
                <!-- End Sales Charts Section -->

                <!-- Start Location and Earnings Charts Section -->
                <!-- <?php //$this->load->view('component/_grafikcardtwo') 
                        ?> -->
                <!-- Row -->
                <!-- multi-column ordering -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive bg-success">
                                    <!-- Form Add Modal -->

                                    <!-- <div class="modal-dialog"> -->
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-success">
                                            <h4 class="modal-title" id="success-header-modalLabel">Form Edit Data User Akun
                                            </h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form -->
                                            <form action="<?php echo base_url('brosur/update_brosur') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">

                                                <input type="text" hidden name="id" id="id" value="<?= $brosur->id ?>">
                                                <div class="form-group">
                                                    <label for="nama_brosur"><strong>Nama Brosur</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="nama_brosur" id="nama_brosur" placeholder="Nama Brosur" value="<?= $brosur->nama_brosur ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi_brosur">Deskripsi</label>
                                                    <textarea class="form-control" name="deskripsi_brosur" id="deskripsi_brosur" rows="2"><?= $brosur->deskripsi_brosur ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="thumb_brosur"><strong>Thumbnail</strong></label>
                                                    <input type="file" class="form-control form-control-file" name="thumb_brosur" id="thumb_brosur" accept=".png,.jpg,.jpeg" value="<?= $brosur->thumb_brosur ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="file_brosur"><strong>File Brosur</strong></label>
                                                    <input type="file" class="form-control form-control-file" name="file_brosur" id="file_brosur" accept=".pdf" value="<?= $brosur->file_brosur ?>">

                                                </div>
                                                <div class="form-group">
                                                    <label for="link_youtube"><strong>Link Youtube</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="link_youtube" id="link_youtube" placeholder="Link Youtube" value="<?= $brosur->link_youtube ?>" required>
                                                </div>
                                                <!-- End Form -->

                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('brosurs') ?>" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</a>
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                    <!--</div> /.modal-dialog -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
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
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>