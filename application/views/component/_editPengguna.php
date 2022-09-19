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
                                    <li class="breadcrumb-item"><a href="<?= site_url('welcome/steptwo') ?>">Dashboard</a>
                                        <i class="fas fa-angle-double-right"></i> Edit User
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
                                            <h4 class="modal-title" id="success-header-modalLabel">Form Edit Data User Akun
                                            </h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form -->
                                            <form action="<?php echo base_url('user/update_user') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">
                                               
                                                <input type="text" hidden name="id_pengguna" id="id_pengguna" value="<?= $user->id_pengguna ?>">
                                                <div class="form-group">
                                                    <label for="nama_pengguna"><strong>Nama</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="nama_pengguna" id="nama_pengguna" placeholder="Nama Pengguna" value="<?= $user->nama_pengguna ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email_pengguna"><strong>Email</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="email_pengguna" id="email_pengguna" placeholder="Email Pengguna" value="<?= $user->email_pengguna ?>"required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="telepon_pengguna"><strong>No Hp</strong></label>
                                                    <input type="number" class="form-control form-control-user" name="telepon_pengguna" id="telepon_pengguna" placeholder="No Handphone" value="<?= $user->telepon_pengguna ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="username_pengguna"><strong>Username</strong></label>
                                                    <input type="text" class="form-control form-control-user" name="username_pengguna" id="username_pengguna" placeholder="Username Pengguna" value="<?= $user->username_pengguna ?>"required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password_pengguna"><strong>Password</strong></label>
                                                    <input type="password" class="form-control form-control-user" name="password_pengguna" id="password_pengguna" placeholder="Password Pengguna" value="<?= $user->password_pengguna ?>"required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="id_role"><strong>id Role</strong></label>
                                                    <input type="number" class="form-control form-control-user" name="id_role" id="id_role" value="<?= $user->id_role ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image"><strong>Photo</strong></label>
                                                    <input type="file" class="form-control form-control-file" name="image" id="image" accept=".png,.jpg,.jpeg">
                                                    <input type="hidden" name="old_image" value="<?= $user->foto_pengguna ?>"/>
                                                </div>
                                                <!-- End Form -->

                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('users') ?>" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</a>
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