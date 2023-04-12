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
                                                <th>Gambar</th>
                                                <th>Action</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($konten as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?php echo $data->nama_produk ?></td>
                                                    <td class="text-truncate" style="max-width:100px;"><?php echo $data->informasi_produk ?></td>
                                                    <td><?php echo $data->tagline_produk ?></td>
                                                    <td><?php echo $data->nama_kategori ?></td>
                                                    <td><?php echo $data->kode_produk ?></td>
                                                    <td class="text-truncate" style="max-width:100px;"><?php echo $data->feature_produk ?></td>
                                                    <td class="text-truncate" style="max-width:100px;"><?php echo $data->file_produk ?></td>
                                                    <td class="text-truncate" style="max-width:100px;"><?php echo $data->gambar1 ?></td>
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
                    <form action="<?php echo base_url('Distributor/save_dst') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">
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
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-user" name="kategori_produk" id="kategori_produk" placeholder="Kategori Produk" required autocomplete="off">
                                <label for="kategori_produk">Kategori Produk</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <table class="table-borderless col-md-12" id="dynamic_field">
                                <tr>
                                    <td class="col-6 col-sm-6 col-lg-6 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="id_produk_baru[]" name="id_produk_baru[]" aria-label="Floating label select example" required>
                                                <option disabled value="" selected>Pilih salah satu...</option>

                                            </select>
                                            <label for="id_produk_baru[]">Produk</label>
                                        </div>
                                    </td>
                                    <td class="col-5 col-sm-5 col-lg-5 col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="pabrik[]" id="pabrik[]" placeholder="Spare Part" class="form-control" autocomplete="off" required />
                                            <label for="Spare Part[]">Spare Part</label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" name="add" id="add" class="btn btn-success "><i class="fa fa-plus"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-user" name="kode_produk" id="kode_produk" placeholder="AKL / AKD Produk" required autocomplete="off">
                                <label for="kode_produk">AKL / AKD Produk</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-user" name="feature_produk" id="feature_produk" placeholder="Feature Produk" required autocomplete="off">
                                <label for="feature_produk">Feature Produk</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="informasi_produk">Informasi Produk</label>
                            <input type="file" class="form-control form-control-file" name="informasi_produk" id="informasi_produk" accept=".png,.jpg,.jpeg">
                        </div>
                        <div class="form-group">
                            <label for="file_produk">File Invoice</label>
                            <input type="file" class="form-control form-control-file" name="file_produk" id="file_produk" accept=".pdf">
                        </div>
                        <div class="form-group">
                            <label for="gambar1_produk">Gambar Produk</label>
                            <input type="file" class="form-control form-control-file" name="gambar1_produk" id="gambar1_produk" accept=".png,.jpg,.jpeg">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                </div>
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
                                <div class="form-group">
                                    <div class="form-floating">
                                        <input type="text" class="form-control form-control-user" name="kategori_produk" id="kategori_produk" placeholder="Kategori Produk" required autocomplete="off" value="<?= $data->kategori_produk ?>">
                                        <label for="kategori_produk">Kategori Produk</label>
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
            $(document).ready(function() {
                var i = 1;

                $('#add').click(function() {
                    i++;
                    $('#dynamic_field').append(
                        '<tr id="row' + i + '" class="dynamic-added"><td class="col-6 col-sm-6 col-lg-6 col-md-6"><div class="form-floating"><select class="form-select" id="id_produk_baru[]" name="id_produk_baru[]" aria-label="Floating label select example" required><option disabled value="" selected>Pilih salah satu...</option><?php foreach ($produk as $l) { ?><option value="<?php echo $l['id_produk']; ?>"><?php echo $l['jenis_produk'] . " - " . $l['nama_produk'] . " - " . $l['tipe_produk']; ?></option><?php } ?></select><label for="id_produk_baru[]">Produk</label></div></td><td class="col-5 col-sm-5 col-lg-5 col-md-5"><div class="form-floating"><input type="text" name="pabrik[]" id="pabrik[]" placeholder="Pabrik" class="form-control" autocomplete="off" required /><label for="pabrik[]">Pabrik</label></div></td><td class="text-center"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-times"></i></button></td></tr>'
                    );

                });

                $(document).on('click', '.btn_remove', function() {
                    var button_id = $(this).attr("id");
                    $('#row' + button_id + '').remove();
                });
            });
        </script>