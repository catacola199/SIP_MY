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
                                        <i class="fas fa-angle-double-right"></i> User Akun
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
                                <h4 class="card-title">Daftar User</h4>
                                <hr>
                                <h6 class="card-subtitle">
                                    <div class="btn-list">
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="Refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#success-header-modal"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                    </div>
                                </h6>
                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Profile</th>
                                                <th>Nama Lengkap</th>
                                                <th>Email</th>
                                                <th>Telepon</th>
                                                <th>Terverifikasi</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($user as $data) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td><img src="<?php echo base_url('upload/pengguna/'.$data->foto_pengguna) ?>" class="rounded-circle" alt="Foto" width="50" /></td>
                                                    <td><?php echo $data->nama_pengguna ?></td>
                                                    <td><?php echo $data->email_pengguna ?></td>
                                                    <td><?php echo $data->telepon_pengguna ?></td>
                                                    <td><?php if ($data->terverifikasi == 0) {
                                                            echo "Tidak";
                                                        } else {
                                                            echo "Ya";
                                                        } ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('user/edit_user/' . $data->id_pengguna) ?>" class="btn btn-sm btn-outline-success">
                                                            <i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                                                        </a>

                                                        <?php if ($data->terverifikasi != 1):?>
                                                            <a onclick="verifConfirm('<?php echo site_url('user/verifuser/' . $data->id_pengguna) ?>')" href="#!" class="btn btn-sm btn-outline-primary">
                                                                <i class="fas fa-check" data-toggle="tooltip" data-placement="bottom" title="Verifikasi"></i>
                                                            </a>
                                                        <?php else:?>
                                                            <a href="" class="btn btn-sm btn-outline-primary disabled" aria-disabled="true">
                                                                <i class="fas fa-check" data-toggle="tooltip" data-placement="bottom" title="Verifikasi"></i>
                                                            </a>
                                                        <?php endif;?>
                                                       
                                                        
                                                        <?php if ($this->fungsi->user_login()->nama_pengguna != $data->nama_pengguna):?>
                                                            <a onclick="deleteConfirm('<?php echo site_url('user/deleteuser/' . $data->id_pengguna) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
                                                                <i class="icon-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
                                                            </a>
                                                        <?php else:?>
                                                            <a href="#!" class="btn btn-sm btn-outline-danger disabled" aria-disabled="true">
                                                                <i class="icon-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
                                                            </a>
                                                        <?php endif;?>
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

    <!-- Form Add Modal -->
    <div id="success-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="success-header-modalLabel">Form Tambah Pengguna
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="<?php echo base_url('user/save_user') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">

                        <div class="form-group">
                            <label for="nama_pengguna"><strong>Nama</strong></label>
                            <input type="text" class="form-control form-control-user" name="nama_pengguna" id="nama_pengguna" placeholder="Nama Pengguna" required>
                        </div>
                        <div class="form-group">
                            <label for="email_pengguna"><strong>Email</strong></label>
                            <input type="text" class="form-control form-control-user" name="email_pengguna" id="email_pengguna" placeholder="Email Pengguna" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon_pengguna"><strong>No Hp</strong></label>
                            <input type="number" class="form-control form-control-user" name="telepon_pengguna" id="telepon_pengguna" placeholder="No Handphone" required>
                        </div>
                        <div class="form-group">
                            <label for="username_pengguna"><strong>Username</strong></label>
                            <input type="text" class="form-control form-control-user" name="username_pengguna" id="username_pengguna" placeholder="Username Pengguna" required>
                        </div>
                        <div class="form-group">
                            <label for="password_pengguna"><strong>Password</strong></label>
                            <input type="password" class="form-control form-control-user" name="password_pengguna" id="password_pengguna" placeholder="Password Pengguna" required>
                        </div>
                        <div class="form-group">
                            <label for="id_role"><strong>id Role</strong></label>
                            <input type="number" class="form-control form-control-user" name="id_role" id="id_role" required>
                        </div>
                        <div class="form-group">
                            <label for="image"><strong>Photo</strong></label>
                            <input type="file" class="form-control form-control-file" name="image" id="image" accept=".png,.jpg,.jpeg">

                        </div>
                        <!-- End Form -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>