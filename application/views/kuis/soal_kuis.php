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
                                        <i class="fas fa-angle-double-right"></i> Soal
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
                        <div class="card text-center">
                            <label for="no_permohonan_b" class="form-label">Soal Kalibrasi</label>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="alamat_rs" placeholder="Alamat Rumah Sakit" id="alamat_rs" style="height: 100px" required></textarea>
                                            <label for="nama_rs">1.	Apa yang dimaksud dengan Kalibrasi serta fungsi atau tujuannya? Jelaskan.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-floating">
                                        <textarea class="form-control" name="alamat_rs" placeholder="Alamat Rumah Sakit" id="alamat_rs" style="height: 100px" required></textarea>
                                            <label for="nama_rs">2. Sebutkan dan jelaskan fungsi dari masing-masing alat kalibrasi (kalibrator) yang Anda ketahui/ kuasai (minimal 5 jenis alat)? Uraikan secara rinci.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="alamat_rs" placeholder="Alamat Rumah Sakit" id="alamat_rs" style="height: 100px" required></textarea>
                                            <label for="alamat_rs">3. Bagaimana Anda dapat memastikan bahwa suatu Kalibrator (alat kalibrasi) itu masih akurat atau layak untuk dapat digunakan? Jelaskan.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="alamat_rs" placeholder="Alamat Rumah Sakit" id="alamat_rs" style="height: 100px" required></textarea>
                                            <label for="alamat_rs">4. Uraikan Langkah atau Urutan Kerja dari suatu aktivitas Kalibrasi yang Anda ketahui/ kuasai.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="alamat_rs" placeholder="Alamat Rumah Sakit" id="alamat_rs" style="height: 100px" required></textarea>
                                            <label for="alamat_rs">5. Apa yang Anda ketahui dari KAN ISO 17025? Jelaskan maksud dan beberapa hal persyaratan yang Anda ketahui di dalamnya. </label>
                                        </div>
                                    </div>
                                   
                                   
                                </div>
                            </div>
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