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
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
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
                                        <i class="fas fa-angle-double-right"></i> Master Jadwal Teknisi
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
                                <h4 class="card-title">Daftar Jadwal Teknisi</h4>
                                <hr>
                                <h6 class="card-subtitle">
                                    <div class="btn-list">
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right"><i
                                                class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom"
                                                title="Refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-bs-toggle="modal"
                                            data-bs-target="#tambah"><i class="fas fa-user-plus" data-toggle="tooltip"
                                                data-placement="bottom" title="Add"></i></button>
                                        <button type="button" class="btn-outline-dark btn float-left" style="border:none;" disabled>Status</button>
                                        <button type="button" class="btn-outline-info btn float-left" id="all">Semua</button>
                                        <button type="button" class="btn btn-outline-primary float-left" id="baru" >Baru</button>
                                        <button type="button" class="btn btn-outline-warning float-left" id="dijadwalkan" >Dijadwalkan</button>
                                        <button type="button" class="btn btn-outline-success float-left" id="selesai">Selesai</button>
                                        <button type="button" class="btn btn-outline-danger float-left" id="tidak_selesai">Tidak Selesai</button>
                                    </div>
                                </h6>

                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>No Permohonan</th>
                                                <th>Jenis Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Tipe Produk</th>
                                                <th>Pabrik Produk</th>
                                                <th> Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($jadwal_tek as $data) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?php echo $data->no_permohonan ?></td>
                                                <td><?php echo $data->jenis_produk ?></td>
                                                <td><?php echo $data->nama_produk ?></td>
                                                <td><?php echo $data->tipe_produk ?></td>
                                                <td><?php echo $data->pabrik_produk ?></td>
                                                <td><?php echo $data->status ?></td>
                                                <td>
                                                    <a href="#!" class="btn btn-sm btn-outline-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#edit-<?= $data->id_jadwal ?>">
                                                        <i class="fas fa-edit" data-toggle="tooltip"
                                                            data-placement="bottom" title="Edit"></i>
                                                    </a>

                                                    <?php if ($data->status == 'Baru') : ?>
                                                    <a onclick="verifConfirm('<?php echo site_url('user/verifuser/' . $data->id_jadwal) ?>')"
                                                        href="#!" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-check" data-toggle="tooltip"
                                                            data-placement="bottom" title="Verifikasi"></i>
                                                    </a>
                                                    <?php else : ?>
                                                    <a href="" class="btn btn-sm btn-outline-primary disabled"
                                                        aria-disabled="true">
                                                        <i class="fas fa-check" data-toggle="tooltip"
                                                            data-placement="bottom" title="Verifikasi"></i>
                                                    </a>
                                                    <?php endif; ?>

                                                    <a onclick="deleteConfirm('<?php echo site_url('Jadwal_Teknisi/delete_jadtek/' . $data->id_jadwal) ?>')"
                                                        href="#!" class="btn btn-sm btn-outline-danger">
                                                        <i class="icon-trash" data-toggle="tooltip"
                                                            data-placement="bottom" title="Hapus"></i>
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
    
    <!-- Form Add Modal End -->
    <div class="modal fade" id="tambah" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Jadwal</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="<?php echo base_url('Jadwal_Teknisi/save_jadtek') ?>" method="post" autocomplete="off" enctype="multipart/form-data" class="pl-3 pr-3">
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="hidden" name="no_permohonan" id="no_permohonan"
                                        value="<?php $no_permohonan = "SIP-P" . date("dmY") . substr(md5(time()), 0, 5); echo $no_permohonan; ?>">
                                    <input type="text" class="form-control" id="kode" placeholder="No Permohonan"
                                        value="<?php $no_permohonan = "SIP-P" . date("dmY") . substr(md5(time()), 0, 5); echo $no_permohonan; ?>" disabled>
                                    <label for="No">No Permohonan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="id_produk" id="id_produk">
                                <!-- <div class="input-group"> -->
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="sproduk" id="sproduk" placeholder="Produk" required>
                                        <label for="sproduk">Pilih Produk disamping</label>
                                    </div>
                                    <!-- <a class="btn btn-primary text-white" data-bs-target="#modal-produk" data-bs-toggle="modal" data-bs-dismiss="modal"><i class="fas fa-search" style="vertical-align: -webkit-baseline-middle;"></i></a> -->
                                <!-- </div> -->
                            </div>
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-user" name="pabrik_produk"
                                        id="pabrik_produk" placeholder="Pabrik" required>
                                    <label for="pabrik_produk">Pabrik</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i
                                        class="fa fa-window-close"></i> Batal</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>    
                    </div>
                    <div class="col">
                        <h4 class="card-title text-dark">Pilih Produk</h4>
                        <hr>
                        <div class="form-group table-responsive">
                            <table id="produk" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Jenis Produk</th>
                                        <th>Tipe Produk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($produk as $p): ?>
                                    <tr>
                                        <td><?= $i++?></td>
                                        <td><?php echo $p['nama_produk'] ?></td>
                                        <td><?php echo $p['jenis_produk'] ?></td>
                                        <td><?php echo $p['tipe_produk'] ?></td>
                                        <td>
                                            <h5>
                                                <button class="btn badge bg-primary text-white" id="select" data-id="<?php echo $p['id_produk'] ?>" data-nama="<?php echo $p['nama_produk'] ?>" 
                                                data-jenis="<?php echo $p['jenis_produk'] ?>" data-tipe="<?php echo $p['tipe_produk'] ?>">Pilih </button>
                                            </h5>
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
    </div>

    <!-- Modal Edit -->
    <?php foreach ($jadwal_tek as $data) : ?>
    <div class="modal fade" id="edit-<?= $data->id_jadwal ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Jadwal Teknisi</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('Jadwal_Teknisi/update_jadtek') ?>" method="post"
                        enctype="multipart/form-data" class="pl-3 pr-3">
                        <input type="text" hidden name="id_jadwal" id="id_jadwal" value="<?= $data->id_jadwal ?>">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="hidden" name="no_permohonan" id="no_permohonan"
                                    value="<?= $data->no_permohonan ?>">
                                <input type="text" class="form-control" id="no_permohonan" placeholder="No Permohonan"
                                    value="<?= $data->no_permohonan ?>" disabled>
                                <label for="No">No Permohonan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <select class="form-select" data-live-search="true" id="id_produk" name="id_produk"
                                    aria-label="Floating label select example" required>
                                    <option disabled value="" selected>Pilih salah satu...</option>
                                    <?php foreach ($produk as $p) { ?>
                                    <?php if($p['id_produk']==$data->id_produk):?>
                                    <option value="<?php echo $p['id_produk']; ?>">
                                        <?php echo $p['jenis_produk'] . " - " . $p['nama_produk'] . " - " . $p['tipe_produk']; ?>
                                    </option>
                                    <?php else:?>
                                    <option value="<?php echo $p['id_produk']; ?>">
                                        <?php echo $p['jenis_produk'] . " - " . $p['nama_produk'] . " - " . $p['tipe_produk']; ?>
                                    </option>
                                    <?php endif;?>
                                    <?php } ?>
                                </select>
                                <label for="id_produk">Jenis, Nama dan Tipe Produk</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-user" name="pabrik_produk"
                                    id="pabrik_produk" placeholder="Pabrik" required>
                                <label for="pabrik_produk">Pabrik</label>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button"  class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit End -->
    <?php endforeach; ?>
    <script>
        $(document).ready(function() {
            $(document).on('click','#select', function() {
                var id = $(this).data('id');
                var nama_produk = $(this).data('nama');
                var jenis_produk = $(this).data('jenis');
                var tipe_produk = $(this).data('tipe');
                var data = jenis_produk+" - "+nama_produk+" - "+tipe_produk;

                $('#id_produk').val(id);
                $('#sproduk').val(data);
                // $('#tambah').modal('hide');
            });

            var table = $('#produk').DataTable(); 
            $('#sproduk').on( 'keyup', function () {
                table.search( this.value ).draw();  
            } );
        });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();

        function filterColumn(value) {
            table.column(6).search(value).draw();
        }

        var table = $('#multi_col_order').DataTable();
        $('#all').on('click', function() {
            filterColumn('');
        });
        $('#baru').on('click', function() {
            filterColumn('Baru');
        });
        $('#dijadwalkan').on('click', function() {
            filterColumn('Dijadwalkan');
        });
        $('#selesai').on('click', function() {
            filterColumn('Selesai');
        });
        $('#tidak_selesai').on('click', function() {
            filterColumn('Tidak Selesai');
        });

    });
    </script>