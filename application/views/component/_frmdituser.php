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
                                <?= $this->session->flashdata('notif') ?>
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
                                            <form action="<?php echo base_url('welcome/update_user') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">
                                                <div class="form-group">
                                                    <label for="id_user"><strong>User ID</strong></label>
                                                    <input class="form-control" <?php echo form_error('id_user') ? 'is-invalid' : '' ?> type="number" name="id_user" value="<?php echo $user->id_user ?>" readonly>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('id_user') ?>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="emailaddress"><strong>Alamat Email</strong></label>
                                                    <input class="form-control" <?php echo form_error('email') ? 'is-invalid' : '' ?> type="email" name="username" value="<?php echo $user->username ?>" required>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('email') ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="password"><strong>Password</strong></label>
                                                    <input class="form-control" <?php echo form_error('password') ? 'is-invalid' : '' ?> type="password" name="password" value="<?php echo $user->password ?>" required>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('password') ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="role"><strong>Role Akses</strong></label>
                                                    <select class="form-control" name="role_id" required>
                                                        <option value="<?php echo $user->role ?>"> <?php echo $user->role ?> </option>
                                                        <option disabled>-- Pilih Mapel --</option>
                                                        <?php foreach ($role as $data) : ?>
                                                            <option value="<?php echo $data->role_id; ?>"> <?php echo $data->role_name; ?> </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="nickname"><strong>Nickname</strong></label>
                                                    <input class="form-control" <?php echo form_error('nickname') ? 'is-invalid' : '' ?> type="text" name="nickname" value="<?php echo $user->nickname ?>" min="20" required>
                                                    <div class="invalid-feedback">
                                                        <?php echo form_error('nickname') ?>
                                                    </div>
                                                </div>
                                                <!-- End Form -->

                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('welcome/mas_user') ?>" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</a>
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