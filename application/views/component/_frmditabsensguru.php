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
                                    <li class="breadcrumb-item"><a href="<?= site_url('welcome/steptwo') ?>">Dashboard</a>
                                        <i class="fas fa-angle-double-right"></i> Edit Absensi Pengajar
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
                                <?= $this->session->flashdata('notif') ?>
                                <div class="table-responsive bg-success">
                                    <!-- Form Add Modal -->

                                    <!-- <div class="modal-dialog"> -->
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-success">
                                            <h4 class="modal-title" id="success-header-modalLabel">Form Edit Absensi Pengajar
                                            </h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form -->
                                            <form action="<?php echo base_url('welcome/update_absensipengajar') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">

                                                <div class="form-group">
                                                    <label for="id_absensi"><strong>ID Absensi</strong></label>
                                                    <input class="form-control" <?php echo form_error('id_absensi') ? 'is-invalid' : '' ?> type="number" name="id_absensi" value="<?php echo $absensi_pengajar->id_absensi ?>" readonly>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('id_absensi') ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="status_kehadiran"><strong>Kehadiran</strong></label>
                                                    <select class="form-control text-secondary" name="status_kehadiran" required>
                                                        <option value="<?php echo $absensi_pengajar->status_kehadiran; ?>"><?php echo $absensi_pengajar->status_kehadiran; ?></option>
                                                        <option value="">--Pilih Status Kehadiran--</option>
                                                        <?php foreach ($ket_absensi as $data) : ?>
                                                            <option value="<?php echo $data->id_ket; ?>"> <?php echo $data->keterangan; ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="tgl_submit"><strong>Tanggal Submit</strong></label>
                                                    <input class="form-control" <?php echo form_error('tgl_submit') ? 'is-invalid' : '' ?> type="date" value="<?php echo date('Y-m-d') ?>" name="tgl_submit" readonly>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('tgl_submit') ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="note"><strong>Catatan</strong></label>
                                                    <textarea class="form-control" <?php echo form_error('note') ? 'is-invalid' : '' ?> type="text" name="note"> <?php echo $absensi_pengajar->note ?></textarea>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('note') ?>
                                                    </div>
                                                </div>
                                                <!-- End Form -->

                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('welcome/mas_absensiguru') ?>" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</a>
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