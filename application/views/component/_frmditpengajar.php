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
                                        <i class="fas fa-angle-double-right"></i> Edit Pengajar
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
                                        <div class="modal-header modal-colored-header bg-warning">
                                            <h4 class="modal-title" id="success-header-modalLabel">Form Edit Data Pengajar
                                            </h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form -->
                                            <form action="<?php echo base_url('welcome/update_pengajar') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">
                                                <div class="form-group">
                                                    <label for="id_pengajar"><strong>ID Pengajar</strong></label>
                                                    <input class="form-control" <?php echo form_error('id_pengajar') ? 'is-invalid' : '' ?> type="number" name="id_pengajar" value="<?php echo $pengajar->id_pengajar ?>" readonly>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('id_pengajar') ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nik_nip"><strong>NIP/NIK</strong></label>
                                                    <input class="form-control" <?php echo form_error('nik_nip') ? 'is-invalid' : '' ?> type="number" name="nik_nip" value="<?php echo $pengajar->nik_nip ?>" min="20" required>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('nik_nip') ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nama"><strong>Nama Lengkap & Gelar</strong></label>
                                                    <input class="form-control" <?php echo form_error('nama') ? 'is-invalid' : '' ?> type="text" name="nama" value="<?php echo $pengajar->nama ?>" required>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('nama') ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="emailaddress"><strong>Alamat Email</strong></label>
                                                    <input class="form-control" <?php echo form_error('email') ? 'is-invalid' : '' ?> type="email" name="email" value="<?php echo $pengajar->email ?>" required>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('email') ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="guru_mapel"><strong>Guru MapelID</strong></label>
                                                    <select class="form-control" name="guru_mapel" required>
                                                        <option value="<?php echo $pengajar->guru_mapel ?>"> <?php echo $pengajar->guru_mapel ?> </option>
                                                        <option disabled>-- Pilih Mapel --</option>
                                                        <?php foreach ($mapel as $data) : ?>
                                                            <option value="<?php echo $data->id_mapel; ?>"> <?php echo $data->nama_mapel; ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="kontak"><strong>Nomor Telp.</strong></label>
                                                    <input class="form-control" <?php echo form_error('kontak') ? 'is-invalid' : '' ?> type="number" name="kontak" value="<?php echo $pengajar->kontak; ?>" required>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('kontak') ?>
                                                    </div>
                                                </div>
                                                <!-- End Form -->

                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('welcome/mas_pengajar') ?>" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</a>
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