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
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="Refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                        <button type="button" class="btn-outline-dark btn float-left" style="border:none;" disabled>Status</button>
                                        <button type="button" class="btn-outline-info btn float-left" id="all">Semua</button>
                                        <button type="button" class="btn btn-outline-primary float-left" id="baru">Baru</button>
                                        <button type="button" class="btn btn-outline-warning float-left" id="terjadwal">Terjadwal</button>
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

                                                    <td><?php echo $data->status ?></td>
                                                    <td>
                                                        <a href="#!" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#detail-<?= $data->id_permohonan ?>">
                                                            <i class="fas fa-file" data-toggle="tooltip" data-placement="bottom" title="Detail"></i>
                                                        </a>

                                                        <?php if ($data->status == 'Baru') : ?>
                                                            <a href="#!" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#jadwal-<?= $data->id_permohonan ?>">
                                                                <i class="far fa-calendar-plus" data-toggle="tooltip" data-placement="bottom" title="Bikin Jadwal"></i>
                                                            </a>
                                                        <?php elseif ($data->status == 'Terjadwal') : ?>
                                                            <a href="#!" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#selesai-<?= $data->id_permohonan ?>">
                                                                <i class="fas fa-check" data-toggle="tooltip" data-placement="bottom" title="Selesai Jadwal"></i>
                                                            </a>
                                                        <?php else : ?>
                                                            <a href="" class="btn btn-sm btn-outline-primary disabled" aria-disabled="true">
                                                                <i class="fas fa-check" data-toggle="tooltip" data-placement="bottom" title="Verifikasi"></i>
                                                            </a>
                                                        <?php endif; ?>

                                                        <a onclick="deleteConfirm('<?php echo site_url('Jadwal_Teknisi/delete_jadtek/' . $data->id_permohonan) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
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

    <!-- Form Add Modal -->
    <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Permohonan</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <form action="<?php echo base_url('Jadwal_Teknisi/save_jadtek') ?>" method="post" autocomplete="off" enctype="multipart/form-data" class="pl-3 pr-3">
                                <div class="form-group">
                                    <div class="form-floating">
                                        <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?php $no_permohonan = "SIP-P" . date("dmY") . substr(md5(time()), 0, 5);
                                                                                                            echo $no_permohonan; ?>">
                                        <input type="text" class="form-control" id="kode" placeholder="No Permohonan" value="<?php $no_permohonan = "SIP-P" . date("dmY") . substr(md5(time()), 0, 5);
                                                                                                                                echo $no_permohonan; ?>" disabled>
                                        <label for="No">No Permohonan</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-floating">
                                        <select class="form-select" id="kategori_jadwal" name="kategori_jadwal" aria-label=".." required>
                                            <option disabled value="" selected>Pilih salah satu...</option>
                                            <option value="1">Instalasi</option>
                                            <option value="2">Kalibrasi</option>
                                            <option value="3">Pemeliharaan</option>
                                            <option value="4">Service</option>
                                        </select>
                                        <label for="kategori_jadwal">Kategori</label>
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
                                        <input type="text" class="form-control form-control-user" name="pabrik_produk" id="pabrik_produk" placeholder="Pabrik" required>
                                        <label for="pabrik_produk">Pabrik</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
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
                                        <?php $i = 1;
                                        foreach ($produk as $p) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?php echo $p['nama_produk'] ?></td>
                                                <td><?php echo $p['jenis_produk'] ?></td>
                                                <td><?php echo $p['tipe_produk'] ?></td>
                                                <td>
                                                    <h4>
                                                        <button class="btn badge bg-primary text-white" id="select" data-id="<?php echo $p['id_produk'] ?>" data-nama="<?php echo $p['nama_produk'] ?>" data-jenis="<?php echo $p['jenis_produk'] ?>" data-tipe="<?php echo $p['tipe_produk'] ?>">Pilih </button>
                                                    </h4>
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
    <!-- Form Add Modal End -->


    <!-- Modal Edit -->
    <?php foreach ($jadwal_tek as $data) : ?>
        <div class="modal fade" id="edit-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Jadwal Teknisi</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo base_url('Jadwal_Teknisi/update_baru') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3" autocomplete="off">
                            <input type="text" hidden name="id_permohonan" id="id_permohonan" value="<?= $data->id_permohonan ?>">
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?= $data->no_permohonan ?>">
                                    <input type="text" class="form-control" id="no_permohonan" placeholder="No Permohonan" value="<?= $data->no_permohonan ?>" disabled>
                                    <label for="No">No Permohonan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-floating">
                                    <select class="form-select" data-live-search="true" id="id_produk" name="id_produk" aria-label="Floating label select example" required>
                                        <option disabled value="" selected>Pilih salah satu...</option>
                                        <?php foreach ($produk as $p) { ?>
                                            <?php if ($p['id_produk'] == $data->id_produk) : ?>
                                                <option value="<?php echo $p['id_produk']; ?>">
                                                    <?php echo $p['jenis_produk'] . " - " . $p['nama_produk'] . " - " . $p['tipe_produk']; ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?php echo $p['id_produk']; ?>">
                                                    <?php echo $p['jenis_produk'] . " - " . $p['nama_produk'] . " - " . $p['tipe_produk']; ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php } ?>
                                    </select>
                                    <label for="id_produk">Jenis, Nama dan Tipe Produk</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-user" name="pabrik_produk" id="pabrik_produk" placeholder="Pabrik" required>
                                    <label for="pabrik_produk">Pabrik</label>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Edit End -->

    <!-- Form Terjadwal Modal -->
    <?php foreach ($jadwal_tek as $data) : ?>
        <div class="modal fade" id="jadwal-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Permohonan</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <form action="<?php echo base_url('Jadwal_Teknisi/update_terjadwal') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3" autocomplete="off">
                                    <input type="text" hidden name="id_permohonan" id="id_permohonan" value="<?= $data->id_permohonan ?>">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?= $data->no_permohonan ?>">
                                            <input type="text" class="form-control" id="no_permohonan" placeholder="No Permohonan" value="<?= $data->no_permohonan ?>" disabled>
                                            <label for="No">No Permohonan</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-control-user" name="nama_rs" id="nama_rs" placeholder="Nama Rumah Sakit" required>
                                            <label for="nama_rs">Nama Rumah Sakit</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-control-user" name="alamat_rs" id="nama_teknalamat_rsisi" placeholder="Alamat Rumah Sakit" required>
                                            <label for="alamat_rs">Alamat Rumah Sakit</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control form-control-user" name="pic_name" id="pic_name" placeholder="PIC Name" required>
                                                    <label for="pic_name">Nama PIC </label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control form-control-user" name="pic_phone" id="pic_phone" placeholder="PIC Phone" required>
                                                    <label for="pic_phone"> Phone PIC </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_teknisi" id="id_teknisi">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-control-user" name="nama_teknisi" id="nama_teknisi" placeholder="Nama Teknisi" required>
                                            <label for="nama_teknisi">Nama Teknisi</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <select class="form-select" id="id_pengguna" name="id_pengguna" aria-label="Floating label select example" required>
                                                <option disabled value="" selected>Pilih salah satu...</option>
                                                <?php foreach ($instansi as $l) { ?>
                                                    <option value="<?php echo $l['id_pengguna']; ?>"><?php echo $l['nama_pengguna'] . " - " . $l['instansi_pengguna']; ?> </option>
                                                <?php } ?>
                                            </select>
                                            <label for="nama_teknisi">Nama Teknisi</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <input type="text" class="form-control form-control-user" name="nama_driver" id="nama_driver" placeholder="Nama Driver" required>
                                            <label for="nama_driver">Nama Driver</label>
                                        </div>
                                    </div>
                                    <div class="input-group date" id="pengadaan_alat">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="tgl_jadwal" id="tgl_jadwal" placeholder="Pilih Tanggal" autocomplete="off" required />
                                            <label for="tgl_jadwal">Tanggal Jadwal</label>
                                        </div>
                                        <span class="input-group-append">
                                            <span class="input-group-text bg-light">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="form-group mt-1">
                                        <label for="file_invoice">File Invoice</label>
                                        <input type="file" class="form-control form-control-file" name="file_invoice" id="file_invoice" accept=".pdf">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Form Add Modal End -->

    <!-- Modal Selesai -->
    <?php foreach ($jadwal_tek as $data) : ?>
        <div class="modal fade" id="selesai-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Selesai </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="<?php echo base_url('Jadwal_Teknisi/update_selesai') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">
                            <input type="text" hidden name="id_permohonan" id="id_permohonan" value="<?= $data->id_permohonan ?>">
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?= $data->no_permohonan ?>">
                                    <input type="text" class="form-control" id="no_permohonan" placeholder="No Permohonan" value="<?= $data->no_permohonan ?>" disabled>
                                    <label for="No">No Permohonan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pembayaran"><strong>Status</strong></label>
                                <select id="status" name="status" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value="selesai">Selesai</option>
                                    <option value="tselesai">Tidak Selesai</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="pembayaran"><strong>Pembayaran</strong></label>
                                <select id="pembayaran" name="pembayaran" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Garansi</option>
                                    <option>Tidak Garansi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bukti_bayar">Bukti Bayar</label>
                                <input type="file" class="form-control form-control-file" name="bukti_bayar" id="bukti_bayar" accept=".pdf">
                            </div>
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-user" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                                    <label for="keterangan">Keterangan</label>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Selesai</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Selesai End -->

    <!-- Modal Detail -->
    <?php foreach ($jadwal_tek as $data) : ?>
        <div class="modal fade" id="detail-<?= $data->id_permohonan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Jadwal </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <section id="basic-horizontal-layouts">
                            <form action="<?php echo base_url('Jadwal_Teknisi/update_selesai') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">
                                <input type="text" hidden name="id_permohonan" id="id_permohonan" value="<?= $data->id_permohonan ?>">
                                <div class="row match-height">
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-6 col-12">
                                            <div class="card text-center text-black">
                                                <h4><?= $data->no_permohonan ?> </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Jadwal -->
                                    <section id="multiple-column-form">
                                        <div class="row match-height">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Detail</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <form class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label>Jenis Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->jenis_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Nama Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->nama_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Tipe Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->tipe_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Pabrik</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->pabrik_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Status</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->status ?></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label>Jenis Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->jenis_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Nama Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->nama_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Tipe Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->tipe_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Pabrik</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->pabrik_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Status</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->status ?></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Detail Jadwal End -->

                                    <!-- Detail Produk -->
                                    <div class="col-md-6 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title text-center"><?= $data->jenis_produk ?></h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Jenis Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->jenis_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Nama Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->nama_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Tipe Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->tipe_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Pabrik</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->pabrik_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Status</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->status ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title text-center"><?= $data->jenis_produk ?></h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Jenis Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->jenis_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Nama Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->nama_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Tipe Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->tipe_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Pabrik</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->pabrik_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Status</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->status ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Produk End -->
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Detail End -->

    <script>
        $(document).ready(function() {
            $(document).on('click', '#select', function() {
                var id = $(this).data('id');
                var nama_produk = $(this).data('nama');
                var jenis_produk = $(this).data('jenis');
                var tipe_produk = $(this).data('tipe');
                var data = jenis_produk + " - " + nama_produk + " - " + tipe_produk;

                $('#id_produk').val(id);
                $('#sproduk').val(data);
                // $('#tambah').modal('hide');
            });

            var table = $('#produk').DataTable();
            $('#sproduk').on('keyup', function() {
                table.search(this.value).draw();
            });
        });

        $(document).ready(function() {
            $(document).on('click', '#pilih_teknisi', function() {
                var teknisi_id = $(this).data('id_teknisi');
                var teknisi_nama = $(this).data('nama_teknisi');
                console.log(teknisi_nama + "-" + teknisi_id);

                $('#id_teknisi').val(teknisi_id);
                $('#nama_teknisi').val(teknisi_nama);
            });

            var teknisi = $('#teknisi').DataTable();
            $('#nama_teknisi').on('keyup', function() {
                teknisi.search(this.value).draw();
            });
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

            function filterColumn(value) {
                table.column(5).search(value).draw();
            }

            var table = $('#multi_col_order').DataTable();
            $('#all').on('click', function() {
                filterColumn('');
            });
            $('#baru').on('click', function() {
                filterColumn('Baru');
            });
            $('#terjadwal').on('click', function() {
                filterColumn('Terjadwal');
            });
            $('#selesai').on('click', function() {
                filterColumn('Selesai');
            });
            $('#tidak_selesai').on('click', function() {
                filterColumn('Tidak Selesai');
            });

        });
    </script>