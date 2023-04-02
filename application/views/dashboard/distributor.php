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
                                        <i class="fas fa-angle-double-right"></i> Master Distributor
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Distributor</h4>
                                <hr>
                                <h6 class="card-subtitle mt-4">
                                    <div class="btn-list">
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                    </div>
                                </h6>
                                <div class="table-responsive" >
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Rs</th>
                                                <th>Nama Distributor</th>
                                                <th>invoice</th>
                                                <th>Tanggal Invoice</th>
                                                <th>Jatuh Tempo</th>
                                                <th>Action</th>
                                               

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($dst as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?php echo $data->nama_rs_dst ?></td>
                                                    <td><?php echo $data->nama_pengguna ?></td>
                                                    <td class="text-truncate" style="max-width:100px;"><?php echo $data->invoice ?></td>
                                                    <td><?php echo $data->tgl_invoice ?></td>
                                                    <td><?php echo $data->jatuh_tempo ?></td>
                                                    <td>
                                                        <a href="#!" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit-<?= $data->id_penjualan ?>">
                                                            <i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                                                        </a>
                                                        <!-- <a href="<?php echo site_url('brosur/edit_brosur/' . $data->id_penjualan) ?>" class="btn btn-sm btn-outline-success">
                                                            <i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                                                        </a> -->
                                                        <a onclick="deleteConfirm('<?php echo site_url('brosur/deletebrosur/' . $data->id_penjualan) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
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

    <!-- Form Add Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Pengguna</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('Distributor/save_dst') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-user" name="nama_rs" id="nama_rs" placeholder="Nama Brosur" required autocomplete="off">
                                <label for="nama_rs">Nama Rumah Sakit</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <select class="form-select" id="id_pengguna" name="id_pengguna" aria-label="Floating label select example" required>
                                    <option disabled value="" selected>Pilih salah satu...</option>
                                    <?php foreach ($distributor as $l) { ?>
                                        <option value="<?php echo $l['id_pengguna']; ?>"><?php echo $l['nama_pengguna'] . " - " . $l['instansi_pengguna']; ?> </option>
                                    <?php } ?>
                                </select>
                                <label for="nama_dst">Nama Distributor</label>
                            </div>
                        </div>
                        
                        <div class="input-group date" id="pengadaan_alat">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="tgl_invoice" id="tgl_invoice" placeholder="Pilih Tanggal" autocomplete="off" required />
                                <label for="tgl_invoice">Tanggal Inovice </label>
                            </div>
                            <span class="input-group-append">
                                <span class="input-group-text bg-light">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="file_dst">File Invoice</label>
                            <input type="file" class="form-control form-control-file" name="file_dst" id="file_dst" accept=".pdf">
                        </div>
                        <div class="input-group date" id="pengadaan_alat">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="jatuh_tempo" id="jatuh_tempo" placeholder="Pilih Tanggal" autocomplete="off" required />
                                <label for="jatuh_tempo">Tanggal Jatuh Tempo </label>
                            </div>
                            <span class="input-group-append">
                                <span class="input-group-text bg-light">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Form Add Modal End -->

    <!-- Modal Edit -->
    <?php foreach ($dst as $data) : ?>
        <div class="modal fade" id="edit-<?= $data->id_penjualan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Brosur</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo base_url('brosur/update_brosur') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">

                            <input type="text" hidden name="id" id="id" value="<?= $data->id ?>">

                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-user" name="nama_brosur" id="nama_brosur" placeholder="Nama Brosur" required autocomplete="off" value="<?= $data->nama_brosur ?>">
                                    <label for="nama_brosur">Nama Brosur</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-floating">
                                    <textarea class="form-control" name="deskripsi_brosur" placeholder="Deskripsi" id="deskripsi_brosur" style="height: 100px" required autocomplete="off"><?= $data->deskripsi_brosur ?></textarea>
                                    <label for="deskripsi_brosur">Deskripsi</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="thumb_brosur">Thumbnail Brosur</label>
                                <input type="hidden" name="old_thumb" value="<?= $data->thumb_brosur ?>" />
                                <input type="file" class="form-control form-control-file" name="thumb_brosur" id="thumb_brosur" accept=".png,.jpg,.jpeg">
                            </div>
                            <div class="form-group">
                                <label for="file_brosur">File Brosur</label>
                                <input type="hidden" name="old_file" value="<?= $data->file_brosur ?>" />
                                <input type="file" class="form-control form-control-file" name="file_brosur" id="file_brosur" accept=".pdf">

                            </div>
                    </div>
                            <div class="modal-footer">
                                <a href="<?php echo site_url('brosurs') ?>" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</a>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit End -->
    <?php endforeach; ?>
    <script>
        ClassicEditor.create(document.querySelector("#deskripsi_brosur"));
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>