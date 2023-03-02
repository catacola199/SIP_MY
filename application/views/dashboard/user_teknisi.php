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
                                <h6 class="card-subtitle mt-4">
                                    <div class="btn-list">
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="Segarkan"></i> </a>
                                        <button type="button" class="btn-outline-dark btn float-left" style="border:none;" disabled>Status</button>
                                        <button type="button" class="btn-outline-info btn float-left" id="all">Semua</button>
                                        <button type="button" class="btn btn-outline-primary float-left" id="baru">Baru</button>
                                        <button type="button" class="btn btn-outline-warning float-left" id="terjadwal">Terjadwal</button>
                                        <button type="button" class="btn btn-outline-secondary float-left" id="terlaksana">Terlaksana</button>
                                        <button type="button" class="btn btn-outline-dark float-left" id="upload">Terunggah</button>
                                        <button type="button" class="btn btn-outline-success float-left" id="selesai">Selesai</button>
                                        <button type="button" class="btn btn-outline-danger float-left" id="gagal">Tidak Selesai</button>
                                    </div>
                                </h6>

                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>No Permohonan</th>
                                                <th>Kategori</th>
                                                <th>Rumah Sakit</th>
                                                <th>PIC</th>
                                                <th> Status</th>
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
                                                        <?php if ($data->status == 'BARU') : ?>
                                                            <p class="spstatus bg-info text-white"><?php echo $data->status ?></p>
                                                        <?php elseif ($data->status == 'TERJADWAL') : ?>
                                                            <p class="spstatus bg-warning text-white"><?php echo $data->status ?></p>
                                                        <?php elseif ($data->status == 'TERLAKSANA') : ?>
                                                            <p class="spstatus bg-secondary text-white"><?php echo $data->status ?></p>
                                                        <?php elseif ($data->status == 'TIDAK SELESAI') : ?>
                                                            <p class="spstatus bg-danger text-white"><?php echo $data->status ?></p>
                                                        <?php else : ?>
                                                            <p class="spstatus bg-success text-white"><?php echo $data->status ?></p>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#!" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#detail-<?= $data->id_permohonan ?>">
                                                            <i class="fas fa-info" data-toggle="tooltip" data-placement="bottom" title="Detail"></i>
                                                        </a>
                                                        <?php if ($data->status == 'TERJADWAL') : ?>
                                                            <a onclick="verifTeknisi('<?php echo site_url('Jadwal_Teknisi/verifteknisi/' . $data->no_permohonan) ?>')" href="#!" class="btn btn-sm btn-outline-primary">
                                                                <i class="fas fa-check" data-toggle="tooltip" data-placement="bottom" title="Terlaksana"></i>
                                                            </a>
                                                        <?php endif; ?>
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

    <!-- Modal detail -->
    <?php $this->load->view('component/_modal-detail') ?>


    <script>
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
            $('#terlaksana').on('click', function() {
                filterColumn('Terlaksana');
            });
            $('#upload').on('click', function() {
                filterColumn('Terunggah');
            });
            $('#selesai').on('click', function() {
                filterColumn('Selesai');
            });
            $('#gagal').on('click', function() {
                filterColumn('tidak');
            });

        });
    </script>