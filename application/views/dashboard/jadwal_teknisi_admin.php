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
                                <h4 class="card-title">Daftar Jadwal Admin Teknisi</h4>
                                <hr>
                                <h6 class="card-subtitle mt-4">
                                    <div class="btn-list">
                                        <button type="button" class="btn-outline-dark btn float-left" style="border:none;" disabled>Status</button>
                                        <select class="form-select float-left col-md-2 col-sm-4 mb-4" aria-label="Default select example" id="status">
                                            <option value="all">Semua</option>
                                            <option value="terjadwal">Terjadwal</option>
                                            <option value="tertunda">Tertunda</option>
                                            <option value="terlaksana">Terlaksana</option>
                                            <option value="terunggah">Terunggah</option>
                                            <option value="selesai">Selesai</option>
                                            <option value="gagal">Tidak Selesai</option>
                                        </select>
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right" data-toggle="tooltip" data-placement="bottom" title="Segarkan"><i class="fas fa-redo-alt"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-bs-toggle="modal" data-bs-target="#tambah" data-toggle="tooltip" data-placement="bottom" title="Tambah Data"><i class="fas fa-user-plus"></i></button>
                                    </div>
                                </h6>
                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>No BAP</th>
                                                <th>Kategori</th>
                                                <th>Rumah Sakit</th>
                                                <th>PIC</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($jadwal_teknisi as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><?php echo $data->no_permohonan ?></td>
                                                    <td><?php echo $data->kategori ?></td>
                                                    <td class="text-truncate" style="max-width:250px"><?php echo $data->nama_rs ?></td>
                                                    <td><?php echo $data->pic_name ?></td>

                                                    <td>
                                                        <?php if ($data->status == 'TERJADWAL') : ?>
                                                            <p class=" spstatus bg-yellow text-dark"><?php echo $data->status ?></p>
                                                        <?php elseif ($data->status == 'TERLAKSANA') : ?>
                                                            <p class=" spstatus bg-dark text-white"><?php echo $data->status ?></p>
                                                        <?php elseif ($data->status == 'TERTUNDA') : ?>
                                                            <p class=" spstatus bg-orange text-white"><?php echo $data->status ?></p>
                                                        <?php elseif ($data->status == 'TERUNGGAH') : ?>
                                                            <p class=" spstatus bg-primary text-white"><?php echo $data->status ?></p>
                                                        <?php elseif ($data->status == 'TIDAK SELESAI') : ?>
                                                            <p class=" spstatus bg-danger text-white"><?php echo $data->status ?></p>
                                                        <?php else : ?>
                                                            <p class=" spstatus bg-success text-white"><?php echo $data->status ?></p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#!" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#detail-<?= $data->id_permohonan ?>" data-toggle="tooltip" data-placement="bottom" title="Detail">
                                                            <i class="fas fa-info"></i>
                                                        </a>
                                                        <?php if ($data->status == 'BARU') : ?>
                                                            <a href="#!" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#jadwal-<?= $data->id_permohonan ?>" data-toggle="tooltip" data-placement="bottom" title="Buat Jadwal">
                                                                <i class="far fa-calendar-plus"></i>
                                                            </a>
                                                        <?php elseif ($data->status == 'TERJADWAL') : ?>
                                                            <a href="#!" class="btn btn-sm btn-outline-primary " data-bs-toggle="modal" data-bs-target="#gantijadwal-<?= $data->id_permohonan ?>" data-toggle="tooltip" data-placement="bottom" title="Ganti Jadwal">
                                                                <i class="fas fa-reply"></i>
                                                            </a>
                                                        <?php elseif ($data->status == 'TERTUNDA') : ?>
                                                            <a onclick="verifTeknisi('<?php echo site_url('Jadwal_Teknisi/verifadminteknisi/' . md5($data->no_permohonan)) ?>')" href="#!" class="btn btn-sm btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="Terlaksana">
                                                                <i class="fas fa-share"></i>
                                                            </a>
                                                        <?php elseif ($data->status == 'TERLAKSANA') : ?>
                                                            <a href="#!" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#upload-<?= $data->id_permohonan ?>" data-toggle="tooltip" data-placement="bottom" title="Unggah Dokumen">
                                                                <i class="fas fa-file"></i>
                                                            </a>
                                                        <?php elseif ($data->status == 'TERUNGGAH') : ?>
                                                            <a href="#!" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#selesai-<?= $data->id_permohonan ?>" data-toggle="tooltip" data-placement="bottom" title="Selesaikan Jadwal">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        <?php else : ?>
                                                            <a href="" class="btn btn-sm btn-outline-primary disabled" aria-disabled="true" data-toggle="tooltip" data-placement="bottom" title="Verifikasi">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        <?php endif; ?>

                                                        <a onclick="deleteConfirm('<?php echo site_url('Jadwal_Teknisi/delete_jadtek/' . md5($data->no_permohonan)) ?>')" href="#!" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus">
                                                            <i class="icon-trash"></i>
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
    <?php $this->load->view('dashboard/modal_jadwal/modal-baru') ?>

    <!-- Modal Edit -->
    <?php $this->load->view('dashboard/modal_jadwal/modal-edit') ?>

    <!-- Modal Terjadwal  -->

    <!-- Modal Terjadwal  -->
    <?php $this->load->view('dashboard/modal_jadwal/modal-gantijadwal') ?>

    <!-- Modal Tertunda -->



    <!-- Modal Upload -->
    <?php $this->load->view('dashboard/modal_jadwal/modal-upload') ?>

    <!-- Modal Selesai -->
    <?php $this->load->view('dashboard/modal_jadwal/modal-selesai') ?>

    <!-- Modal detail -->
    <?php $this->load->view('component/_modal-detail') ?>

    <script>
        $(document).ready(function() {
            var i = 1;

            $('#add').click(function() {
                i++;
                $('#dynamic_field').append(
                    '<tr id="row' + i + '" class="dynamic-added"><td class="col-6 col-sm-6 col-lg-6 col-md-6"><div class="form-floating"><select class="form-select" id="id_produk_baru[]" name="id_produk_baru[]" aria-label="Floating label select example" required><option disabled value="" selected>Pilih salah satu...</option><?php foreach ($produk as $l) { ?><option value="<?php echo $l['id_produk']; ?>"><?php echo $l['merk_produk'] . " - " . $l['nama_produk'] . " - " . $l['tipe_produk']; ?></option><?php } ?></select><label for="id_produk_baru[]">Produk</label></div></td><td class="col-5 col-sm-5 col-lg-5 col-md-5"><div class="form-floating"><input type="text" name="pabrik[]" id="pabrik[]" placeholder="Spare Part" class="form-control" autocomplete="off" required /><label for="pabrik[]">Spare Part</label></div></td><td class="text-center"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-times"></i></button></td></tr>'
                );

            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

            $('.uang').mask('0.000.000.000', {
                reverse: true
            });

            /* Tanpa Rupiah */
            var tanpa_rupiah = document.getElementById('tanpa-rupiah');
            tanpa_rupiah.addEventListener('keyup', function(e) {
                tanpa_rupiah.value = formatRupiah(this.value);
            });

            /* Dengan Rupiah */
            var dengan_rupiah = document.getElementById('dengan-rupiah');
            dengan_rupiah.addEventListener('keyup', function(e) {
                dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
            });

            /* Fungsi */
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

            function filterColumn(value) {
                table.column(5).search(value).draw();
            }
            var table = $('#multi_col_order').DataTable();
            $(document).on('change', '#status', function() {
                if ($('#status option:selected').val() === "all") {
                    filterColumn('');
                    console.log("1");
                } else if ($('#status option:selected').val() === "terjadwal") {
                    filterColumn('Terjadwal');
                    console.log("3");
                } else if ($('#status option:selected').val() === "tertunda") {
                    filterColumn('Tertunda');
                    console.log("4");
                } else if ($('#status option:selected').val() === "terlaksana") {
                    filterColumn('Terlaksana');
                    console.log("5");
                } else if ($('#status option:selected').val() === "terunggah") {
                    filterColumn('Terunggah');
                    console.log("6");
                } else if ($('#status option:selected').val() === "selesai") {
                    filterColumn('Selesai');
                    console.log("7");
                } else {
                    filterColumn('Tidak');
                    console.log("0");
                }
            });

        });
    </script>