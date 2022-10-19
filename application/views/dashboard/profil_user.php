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
                                        <i class="fas fa-angle-double-right"></i> <?= $this->uri->segment(1); ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->

            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card" style="height: 30rem;">
                            <img src="<?= base_url("src/assets/images/LoginPage.png")?>" class="card-img-top pp" style="height:10rem;"alt="...">
                            <div class="card-body mini-profile">
                                <center class=""> <img src="<?php if(file_exists(FCPATH.'upload/pengguna/'.$this->fungsi->user_login()->foto_pengguna) != 1){echo base_url('upload/pengguna/default.png');}else{ echo base_url('upload/pengguna/').$this->fungsi->user_login()->foto_pengguna;} ?>" class="rounded-circle pp foto-profile" alt="..." width="150" height="150" />
                                    <h4 class="card-title mt-4"><?= ucfirst($this->fungsi->user_login()->nama_pengguna)?></h4>
                                    <h6 class="card-subtitle"><?= ucfirst($this->fungsi->user_login()->instansi_pengguna)?></h6>
                                </center>
                                <hr class="dropdown-divider mt-1 mb-1">
                                <small class="text-muted">Alamat Email</small>
                                    <h6><?=$this->fungsi->user_login()->email_pengguna?></h6>
                                <small class="text-muted">Nomor Telepon </small>
                                    <h6><?=$this->fungsi->user_login()->telepon_pengguna?></h6>
                                <small class="text-muted">Dibuat </small>
                                    <h6><?=$this->fungsi->user_login()->date_created?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                                    <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab" data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password" aria-selected="false">Edit Password</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form action="<?php echo base_url('profile/update_user') ?>" method="post" enctype="multipart/form-data" class="p-2 mt-3" autocomplete="off">
                                        <input type="text" hidden name="id_pengguna" id="id_pengguna" value="<?= $this->fungsi->user_login()->id_pengguna ?>">

                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="text" class="form-control form-control-user" name="nama_pengguna" id="nama_pengguna" placeholder="Nama Pengguna" value="<?= $this->fungsi->user_login()->nama_pengguna ?>" required>
                                                <label for="nama_pengguna">Nama Pengguna</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="text" class="form-control form-control-user" name="instansi_pengguna" id="instansi_pengguna" placeholder="Instansi Pengguna" value="<?= $this->fungsi->user_login()->instansi_pengguna ?>" required>
                                                <label for="instansi_pengguna">Instansi Pengguna</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="email" class="form-control form-control-user" name="email_pengguna" id="email_pengguna" placeholder="Email Pengguna" value="<?= $this->fungsi->user_login()->email_pengguna ?>" required>
                                                <label for="email_pengguna">Email Pengguna</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="number" class="form-control form-control-user" name="telepon_pengguna" id="telepon_pengguna" placeholder="No Handphone" value="<?= $this->fungsi->user_login()->telepon_pengguna ?>"required>
                                                <label for="telepon_pengguna">No Handphone</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="text" class="form-control form-control-user" name="username_pengguna" id="username_pengguna" placeholder="Username Pengguna"  value="<?= $this->fungsi->user_login()->username_pengguna ?>"required>
                                                <label for="username_pengguna">Username</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <?php if (($this->fungsi->user_login()->id_role) != 1){?>
                                                    <select class="form-select" id="id_role" name="id_role" aria-label="Floating label select example" required>
                                                        <option disabled value="" selected>Pilih salah satu...</option>
                                                        <?php foreach ($role as $data) { ?>
                                                            <?php if($data->id_role == $this->fungsi->user_login()->id_role):?>
                                                                <option value="<?php echo $data->id_role; ?>" <?= 'selected ="selected"'?> ><?php echo $data->nama_role; ?> </option>
                                                            <?php else: ?>
                                                                <option value="<?php echo $data->id_role; ?>"><?php echo $data->nama_role; ?> </option>
                                                            <?php endif;?>
                                                        <?php } ?>
                                                    </select>
                                                <?php }else{ ?>
                                                    <input type="text" hidden name="id_role" id="id_role" value="1">
                                                    <select class="form-select" aria-label="Floating label select example" disabled required>
                                                        <option value="1" selected>Superadmin</option>
                                                    </select>
                                                <?php } ?>
                                                <label for="id_role">Role Pengguna</label>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="image"><strong>Photo</strong></label>
                                            <input type="file" class="form-control form-control-file" name="image" id="image" accept=".png,.jpg,.jpeg">
                                            <input type="hidden" name="old_image" id="old_image" value="<?= $this->fungsi->user_login()->foto_pengguna ?>" />
                                        </div>
                                        
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success text-white">Update Profile</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
                                    <form action="<?php echo base_url('profile/update_pass') ?>" method="post" enctype="multipart/form-data" class="p-2 mt-3" autocomplete="off">
                                        <input type="text" hidden name="id_pengguna" id="id_pengguna" value="<?= $this->fungsi->user_login()->id_pengguna ?>">
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="password" class="form-control form-control-user" name="password_pengguna_lama" id="password_pengguna_lama" placeholder="Password Pengguna" required>
                                                <label for="password_pengguna">Password Lama</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input type="password" class="form-control form-control-user" name="password_pengguna_baru" id="password_pengguna_baru" placeholder="Password Pengguna" required>
                                                <label for="password_pengguna">Password Baru</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-floating" >
                                                <input type="password" class="form-control form-control-user" name="password_pengguna_konfirm" id="password_pengguna_konfirm" placeholder="Password Pengguna" onChange="checkPasswordMatch();" required>
                                                <label for="password_pengguna">Konfirmasi Password Lama</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success text-white">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
            </div>
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