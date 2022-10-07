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
                                    <li class="breadcrumb-item"><a href="<?= site_url('dashboard') ?>">Dashboard</a>
                                        <i class="fas fa-angle-double-right"></i> Edit Penawaran
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
                                <div class="table-responsive bg-success">
                                    <!-- Form Add Modal -->

                                    <!-- <div class="modal-dialog"> -->
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-success">
                                            <h4 class="modal-title" id="success-header-modalLabel">Form Edit Data Penawaran
                                            </h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form -->
                                            <form action="<?php echo base_url('penawaran/update_penawaran') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">

                                                <input type="text" hidden name="id_penawaran" id="id_penawaran" value="<?= $penawaran->id_penawaran ?>">
                                                <div class="form-group">
                                                    <div class="form-floating">
                                                        <input type="hidden" name="kode_penawaran" id="kode_penawaran" value="<?= $penawaran->kode_penawaran ?>">
                                                        <input type="text" class="form-control" id="kode" placeholder="Kode Penawaran" value="<?= $penawaran->kode_penawaran ?>" disabled>
                                                        <label for="kode">Kode Penawaran</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="id_pengguna" placeholder="Kode Penawaran" value="<?= $all->instansi_pengguna ?>" disabled>
                                                        <label for="id_pengguna">Pengguna & Instansi</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <table class="table-borderless col-md-12" id="dynamic_field">
                                                        <tr>
                                                            <td class="col-6 col-sm-6 col-lg-6 col-md-6">
                                                                <div class="form-floating">
                                                                    <select class="form-select" id="id_produk[]" name="id_produk[]" aria-label="Floating label select example" required>
                                                                        <option disabled value="" selected>Pilih salah satu...</option>
                                                                        <?php foreach ($produk as $l) { ?>
                                                                            <option value="<?php echo $l['id_produk']; ?>"><?php echo $l['nama_produk']; ?> </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <label for="id_produk[]">Produk     </label>
                                                                </div>
                                                            </td>
                                                            <td class="col-5 col-sm-5 col-lg-5 col-md-5">
                                                                <div class="form-floating">
                                                                    <input type="text" name="qty[]" id="qty[]" placeholder="Quantity" class="form-control" autocomplete="off" value="<?= $penawaran->qty_penawaran ?>" required />
                                                                    <label for="qty[]">Quantity</label>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <button type="button" name="add" id="add" class="btn btn-success "><i class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div class="input-group date" id="pengadaan_alat">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" name="tgl_penawaran" id="tgl_penawaran" placeholder="Pilih Tanggal" autocomplete="off" value="<?= $penawaran->tgl_penawaran ?>" required />
                                                        <label for="tgl_penawaran">Tanggal Penawaran</label>
                                                    </div>
                                                    <span class="input-group-append">
                                                        <span class="input-group-text bg-light">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    </span>
                                                </div>
                                                <!-- End Form -->

                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('produks') ?>" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</a>
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