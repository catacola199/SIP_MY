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
                                        <i class="fas fa-angle-double-right"></i> Master Kuis
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
                <div class="card-columns">
                <?php foreach ($dataUser as $data) : ?>
                    <?php if ($data->id_pengguna != null ) : ?>
                        <div class="card text-center">
                        <div class="card-header">
                        <?php echo $data->judul_soal ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">Score</p>
                            <p class="card-score" ><?php echo $data->jum_score ?></p>
                            <button type="button" class="btn btn-outline-primary" disable href="<?= base_url('soalis') ?>">Kerjakan</button>
                        </div>
                        <div class="card-footer text-muted">
                           Min : <?php echo $data->min_score ?>
                        </div>
                    </div>
                   
                    <?php else : ?>
                        <div class="card text-center">
                        <div class="card-header">
                            UKES
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">Score</p>
                            <p class="card-score" >0</p>
                            <a class="btn btn-outline-primary" href="<?= base_url('soalis') ?>"></i>Kerjakan</a>
                        </div>
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                    <?php endif; ?>
                    
                   
                <?php endforeach; ?>  
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
        $(document).ready(function() {
            var i = 1;

            $('#add').click(function() {
                i++;
                $('#dynamic_field').append(
                    '<tr id="row' + i + '" class="dynamic-added"><td class="col-6 col-sm-6 col-lg-6 col-md-6"><div class="form-floating"><select class="form-select" id="id_produk[]" name="id_produk[]"  aria-label="Floating label select example" required><option disabled value="" selected>Pilih salah satu...</option><?php foreach ($produk as $l) { ?><option value="<?php echo $l['id_produk']; ?>"><?php echo $l['nama_produk']; ?> </option><?php } ?></select><label for="id_produk[]">Kostumer & Instansi</label></div></td><td class="col-5 col-sm-5 col-lg-5 col-md-5"><div class="form-floating"><input type="text" name="qty[]" id="qty[]" placeholder="Quantity" class="form-control" autocomplete="off" required/><label for="qty[]">Quantity</label></div></td><td class="text-center"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"><i class="fa fa-times"></i></button></td></tr>'
                );

            });


            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>