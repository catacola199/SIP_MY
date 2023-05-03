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
                                        <i class="fas fa-angle-double-right"></i> Master Konten
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
                                <h4 class="card-title">Daftar Konten</h4>
                                <hr>
                                <h6 class="card-subtitle mt-4">
                                    <div class="btn-list">
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                    </div>
                                </h6>
                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>informasi</th>
                                                <th>Tagline</th>
                                                <th>Kategori</th>
                                                <th>Kode</th>
                                                <th>Feature</th>
                                                <th>File</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($konten as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?php echo $data->nama_produk ?></td>
                                                    <td><img src="<?php echo $data->informasi_produk ?>" alt="Foto" width="60" class="img-thumbnail rounded" /></td>
                                                    <td><?php echo $data->tagline_produk ?></td>
                                                    <td><?php foreach ($kategori as $a) {
                                                            if ($a->konten_id == $data->konten_id) { ?>
                                                                <span class="badge bg-primary"><?= $a->nama_kategori ?></span>
                                                        <?php }
                                                        } ?>
                                                    </td>
                                                    <td><?php echo $data->jenis_kode_produk ?> <?php echo $data->kode_produk ?></td>
                                                    <td class="text-truncate" style="max-width:100px;"><?php echo $data->feature_produk ?></td>
                                                    <td class="text-truncate" style="max-width:100px;"><?php echo $data->file_produk ?></td>
                                                    <td>
                                                        <a href="#!" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#edit-<?= $data->id_detailproduk ?>">
                                                            <i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                                                        </a>
                                                        <!-- <a href="<?php echo site_url('brosur/edit_brosur/' . $data->id_detailproduk) ?>" class="btn btn-sm btn-outline-success">
                                                            <i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                                                        </a> -->
                                                        <a onclick="deleteConfirm('<?php echo site_url('brosur/deletebrosur/' . $data->id_detailproduk) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Konten</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url('Konten/simpan_konten') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">
                        <input type="hidden" name="konten_id" id="konten_id" value="<?php $konten_id = "KONTEN-" . "SIP-" . substr(md5(time()), 0, 5);
                                                                                    echo $konten_id; ?>">
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-user" name="nama_produk" id="nama_produk" placeholder="Nama Produk" required autocomplete="off">
                                <label for="nama_produk">Nama Produk</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-user" name="tagline_produk" id="tagline_produk" placeholder="Tagline Produk" required autocomplete="off">
                                <label for="tagline_produk">Tagline Produk</label>
                            </div>
                        </div>
                        <div class="form-group ml-1">
                            <label for="kategori_produk">Kategori</label>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="X-ray">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" X-ray">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Analog">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Analog">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Stationery">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Stationery">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Mobile">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Mobile">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Dental">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Dental">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Printer">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Printer">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="USG">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" USG">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Film">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Film">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Grid">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Grid">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Digital Radiography">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Digital Radiography">
                                    </div>


                                </div>
                                <div class="col">
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Accesories Apron">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Accesories Apron">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Accesories Gloves">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Accesories Gloves">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Accesories Glasess">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Accesories Glasess">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Accesories Head">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Accesories Head">
                                    </div>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text rounded-2">
                                            <input type="checkbox" name="check_list[]" alt="Checkbox" value="Computed Radiography">
                                        </div>
                                        <input type="text" readonly class="form-control-plaintext" value=" Computed Radiography">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <select class="form-select" id="jenis_kode_produk" name="jenis_kode_produk" aria-label="Floating label select example" required>
                                                <option disabled value="" selected>Pilih salah satu...</option>
                                                <option value="AKL">AKL</option>
                                                <option value="AKD">AKD</option>
                                            </select>
                                            <label for="jenis_kode_produk">Jenis Kode</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-user" name="kode_produk" id="kode_produk" placeholder="AKL / AKD Produk" required autocomplete="off">
                                        <label for="kode_produk">Kode Produk</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <textarea class="form-control" name="feature_produk" placeholder="Feature Produk" id="feature_produk" style="height: 100px" required></textarea>
                                <label for="feature_produk">Feature Produk</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="informasi_produk">Informasi Produk</label>
                            <input type="file" class="form-control form-control-file" name="informasi_produk" id="informasi_produk" accept=".png,.jpg,.jpeg">
                        </div>
                        <div class="form-group">
                            <label for="file_produk">File Produk</label>
                            <input type="file" class="form-control form-control-file" name="file_produk" id="file_produk" accept=".pdf">
                        </div>
                        <div class="form-group">
                            <label for="gambar1_produk">Gambar Produk</label>
                            <input type="file" class="form-control form-control-file" name="gambar_produk[]" id="gambar_produk[]" multiple accept=".png,.jpg,.jpeg">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
        <!-- Form Add Modal End -->

        <!-- Modal Edit -->
        <?php foreach ($konten as $data) : ?>
            <div class="modal fade" id="edit-<?= $data->id_detailproduk ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Penjualan</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?php echo base_url('distributor/update_distributor') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">
                            <div class="modal-body">
                                <input type="text" hidden name="id" id="id" value="<?= $data->id_detailproduk ?>">
                                <div class="form-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-user" name="nama_produk" id="nama_produk" placeholder="Nama Produk" required autocomplete="off" value="<?= $data->nama_produk ?>">
                                        <label for="nama_produk">Nama Produk</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-user" name="informasi_produk" id="informasi_produk" placeholder="Informasi Produk" required autocomplete="off" value="<?= $data->informasi_produk ?>">
                                        <label for="informasi_produk">Informasi Produk</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-user" name="tagline_produk" id="tagline_produk" placeholder="Tagline Produk" required autocomplete="off" value="<?= $data->tagline_produk ?>">
                                        <label for="tagline_produk">Tagline Produk</label>
                                    </div>
                                </div>
                                <div class="form-group ml-1">
                                    <label for="kategori_produk">Kategori</label>
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group mb-1">
                                                <div class="input-group-text rounded-2">
                                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Instalasi">
                                                </div>
                                                <input type="text" readonly class="form-control-plaintext" value=" Instalasi">
                                            </div>
                                            <div class="input-group mb-1">
                                                <div class="input-group-text rounded-2">
                                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Service">
                                                </div>
                                                <input type="text" readonly class="form-control-plaintext" value=" Service">
                                            </div>
                                            <div class="input-group mb-1">
                                                <div class="input-group-text rounded-2">
                                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Survey">
                                                </div>
                                                <input type="text" readonly class="form-control-plaintext" value=" Survey">
                                            </div>
                                            <div class="input-group mb-1">
                                                <div class="input-group-text rounded-2">
                                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Training">
                                                </div>
                                                <input type="text" readonly class="form-control-plaintext" value=" Training">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-1">
                                                <div class="input-group-text rounded-2">
                                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Setting Ukes">
                                                </div>
                                                <input type="text" readonly class="form-control-plaintext" value=" Setting Ukes">
                                            </div>
                                            <div class="input-group mb-1">
                                                <div class="input-group-text rounded-2">
                                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Presentasi">
                                                </div>
                                                <input type="text" readonly class="form-control-plaintext" value=" Presentasi">
                                            </div>
                                            <div class="input-group mb-1">
                                                <div class="input-group-text rounded-2">
                                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Pre-Install">
                                                </div>
                                                <input type="text" readonly class="form-control-plaintext" value=" Preinstall">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-user" name="kode_produk" id="kode_produk" placeholder="AKL / AKD Produk" required autocomplete="off" value="<?= $data->kode_produk ?>">
                                        <label for="kode_produk">AKL / AKD Produk</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-user" name="feature_produk" id="feature_produk" placeholder="Feature Produk" required autocomplete="off" value="<?= $data->kode_produk ?>">
                                        <label for="feature_produk">Feature Produk</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="file_dst">File Invoice</label>
                                    <input type="file" class="form-control form-control-file" name="file_dst" id="file_dst" accept=".pdf">
                                </div>
                                <div class="form-group">
                                    <label for="thumb_brosur">Gambar Produk</label>
                                    <input type="file" class="form-control form-control-file" name="gambar1_produk" id="gambar1_produk" accept=".png,.jpg,.jpeg">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-window-close"></i> Close</button>
                                <button type="button" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <script>
            ClassicEditor.create(document.querySelector("#deskripsi_brosur"));
            $(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>