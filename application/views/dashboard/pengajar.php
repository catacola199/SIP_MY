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
                                        <i class="fas fa-angle-double-right"></i> Pengajar
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
                                <h4 class="card-title">Daftar Pengajar</h4>
                                <hr>
                                <h6 class="card-subtitle">
                                    <div class="btn-list">
                                        <a href="<?php site_url('welcome/mas_pengajar') ?>" class="btn btn-outline-info float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#success-header-modal"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                    </div>
                                </h6>
                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-success text-white">
                                            <tr>
                                                <th>NIP/NIK</th>
                                                <th>NAMA LENGKAP</th>
                                                <th>GURU IDMAPEL</th>
                                                <th>KONTAK</th>
                                                <th>EMAIL</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($pengajar as $data) : ?>
                                                <tr>
                                                    <td><?php echo $data->nik_nip ?></td>
                                                    <td><?php echo $data->nama ?></td>
                                                    <td><?php echo $data->guru_mapel ?></td>
                                                    <td><?php echo $data->kontak ?></td>
                                                    <td><?php echo $data->email ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('welcome/edit_pengajar/' . $data->id_pengajar) ?>" class="btn btn-sm btn-outline-success">
                                                            <i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                                                        </a>
                                            
                                                        <a onclick="deleteConfirm('<?php echo site_url('welcome/deletepengajar/' . $data->id_pengajar) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
                                                            <i class="icon-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
                                                        </a>                                                       
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
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

    <!-- Modal Delete-->
    <!-- Delete Header Modal -->
    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="warning-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-warning">
                    <h4 class="modal-title" id="warning-header-modalLabel">Konfirmasi hapus data pengajar
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    Apakah anda akan menghapus data tersebut?
                    <!-- End Form -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    <a id="btn-delete" href="<?php echo site_url('welcome/deletepengajar/' . $data->id_pengajar) ?>" class="btn btn-success">Ya</a>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Form Add Modal -->
    <div id="success-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-success">
                    <h4 class="modal-title" id="success-header-modalLabel">Form Tambah Data Pengajar
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="<?php echo base_url('welcome/save_pengajar') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">

                        <div class="form-group">
                            <label for="nik_nip"><strong>NIP/NIK</strong></label>
                            <input class="form-control" <?php echo form_error('nik_nip') ? 'is-invalid' : '' ?> type="number" name="nik_nip" min="20" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('nik_nip') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama"><strong>Nama Lengkap & Gelar</strong></label>
                            <input class="form-control" <?php echo form_error('nama') ? 'is-invalid' : '' ?> type="text" name="nama" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('nama') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="emailaddress"><strong>Alamat Email</strong></label>
                            <input class="form-control" <?php echo form_error('email') ? 'is-invalid' : '' ?> type="email" name="email" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('email') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="guru_mapel"><strong>Guru Mapel</strong></label>
                            <select class="form-control" name="guru_mapel" required>
                                <option value="">--Pilih Mapel--</option>
                                <?php foreach ($mapel as $data) : ?>
                                    <option value="<?php echo $data->id_mapel; ?>"> <?php echo $data->nama_mapel; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kontak"><strong>Nomor Telp.</strong></label>
                            <input class="form-control" <?php echo form_error('kontak') ? 'is-invalid' : '' ?> type="number" name="kontak" min="08" required>
                            <div class="invalid-feedback">
                                <?php echo form_error('kontak') ?>
                            </div>
                        </div>
                        <!-- End Form -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>