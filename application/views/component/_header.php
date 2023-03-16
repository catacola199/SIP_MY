<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="<?= base_url('dashboard') ?>">
                    <b class="logo-icon">
                        <!-- Dark Logo icon -->
                        <img src="<?= base_url('src') ?>/assets/images/sip.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="<?= base_url('src') ?>/assets/images/sip.png" alt="homepage" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text">
                        <!-- dark Logo text -->
                        <img src="<?= base_url('src') ?>/assets/images/siplab.png" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->
                        <img src="<?= base_url('src') ?>/assets/images/siplab.png" class="light-logo" alt="homepage" />
                    </span>
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-right ml-auto">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)" id="fullscreen" onclick="document.documentElement.requestFullscreen()">
                        <span><i data-feather="maximize" class="feather-icon"></i></span>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)"  id="exit_fullscreen" onclick="document.exitFullscreen()" style="display:none;">
                        <span><i data-feather="minimize" class="feather-icon"></i></span>
                    </a>
                </li>
                
                <?php $query = $this->db->query("SELECT * from notifikasi");?>
                
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle position-relative" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell" class="feather-icon"></i>
                        <?php if($query->num_rows() != 0):?>
                            <span class="position-absolute translate-middle bg-danger border border-light rounded-circle" style="padding:.35rem !important; left: 62% !important; top: 40% !important">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        <?php endif;?>

                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in " aria-labelledby="messagesDropdown" style="width: 400px;">
                        <h6 class="dropdown-header">
                            Notification Center
                        </h6>

                        <?php foreach ($query->result() as $row) : ?>
                            <a class="dropdown-item align-items-center" href="#">
                                <div class="row">
                                    <div class="col-2 text-center">
                                        <img src="<?= base_url("assets/logo_only.png")?>" alt=".." class="img-fluid">
                                    </div>
                                    <div class="col">
                                        <div class="small text-black-50"><?= $row->kategori ?></div>
                                        <div class="text-truncate"><?= $row->nama_rs ?></div>
                                        <div class="small text-black-50">Tanggal : <?= $row->tgl_jadwal ?></div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                        <a class="dropdown-item text-center small text-black-50" href="#">Read More Notification</a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php if(file_exists(FCPATH.'upload/pengguna/'.$this->fungsi->user_login()->foto_pengguna) != 1){echo base_url('upload/pengguna/default.png');}else{ echo base_url('upload/pengguna/').$this->fungsi->user_login()->foto_pengguna;} ?>" alt="user" class="rounded-circle pp" alt="Foto" width="45" height="45">
                        <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark text-capitalize"><?= $this->fungsi->user_login()->nama_pengguna ?></span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="<?= base_url('profiles')?>"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                            My Profile</a> 
                        <!-- <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail" class="svg-icon mr-2 ml-1"></i>
                            Inbox</a>
                        <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                            Account Setting</a> User profile and search -->
                        
                        <hr class="dropdown-divider">
                        <a class="dropdown-item" href="<?= base_url('login/logout') ?>"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                            Logout</a>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>