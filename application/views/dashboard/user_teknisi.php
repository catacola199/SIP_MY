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
                                                        <?php if ($data->status == 'TERJADWAL') : ?>
                                                            <a href="#!" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tunda-<?= $data->id_permohonan ?>" data-toggle="tooltip" data-placement="bottom" title="Ditunda <?php if($data->status_tertunda != null){echo $data->status_tertunda."/4";}?>">
                                                                <i class="fas fa-exclamation-circle"></i>
                                                            </a>
                                                            <a href="#!" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#uploadtek-<?= $data->id_permohonan ?>"  data-toggle="tooltip" data-placement="bottom" title="Terlaksana">
                                                                <i class="fas fa-check"></i>
                                                            </a>
                                                        <?php elseif ($data->status == 'TERTUNDA') : ?>
                                                            <?php if($data->status_tertunda != 4 ):?>
                                                                <a href="#!" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#tunda-<?= $data->id_permohonan ?>" data-toggle="tooltip" data-placement="bottom" title="Ditunda <?php if($data->status_tertunda != null){echo $data->status_tertunda."/4";}?>">
                                                                    <i class="fas fa-exclamation-circle"></i>
                                                                </a>
                                                            <?php else:?>
                                                                <a onclick="verifTeknisi('<?php echo site_url('Jadwal_Teknisi/veriftidakselesai/' . md5($data->no_permohonan)) ?>')" href="#!" class="btn btn-sm btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Tidak Selesai">
                                                                    <i class="fas fa-times"></i>
                                                                </a>
                                                            <?php endif;?>
                                                            <a onclick="verifTeknisi('<?php echo site_url('Jadwal_Teknisi/verifteknisi/' . md5($data->no_permohonan)) ?>')" href="#!" class="btn btn-sm btn-outline-primary"  data-toggle="tooltip" data-placement="bottom" title="Terlaksana">
                                                                <i class="fas fa-check"></i>
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

    <!-- Modal upload doc -->
    <?php $this->load->view('dashboard/modal_jadwal/modal-upload-teknisi') ?>

    <!-- Modal tertunda -->
    <?php $this->load->view('dashboard/modal_jadwal/modal-tertunda') ?>


    <script>
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