<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="<?= base_url('dashboard') ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <?php if ($this->fungsi->user_login()->id_role == "1" || $this->fungsi->user_login()->id_role == "2") { ?>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap">
                        <span class="hide-menu">Applications</span>
                    </li>

                   <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="<?= base_url('compro') ?>" aria-expanded="false">
                            <i data-feather="book" class="feather-icon"></i>
                            <span class="hide-menu">Brosur</span>
                        </a>
                    </li>
                     <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="<?= base_url('pretraining') ?>" aria-expanded="false">
                            <i data-feather="book" class="feather-icon"></i>
                            <span class="hide-menu">Presentasi Training</span>
                        </a>
                    </li>
                     <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="<?= base_url('preproduk') ?>" aria-expanded="false">
                            <i data-feather="book" class="feather-icon"></i>
                            <span class="hide-menu">Presentasi Produk</span>
                        </a>
                    </li>


                    <li class="list-divider"></li>
                    <li class="nav-small-cap">
                        <span class="hide-menu">Teknisi</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="<?= base_url('teknisii') ?>" aria-expanded="false">
                            <i data-feather="file-text" class="feather-icon"></i>
                            <span class="hide-menu">Jadwal</span>
                        </a>
                    </li>

                    <li class="list-divider"></li>
                    <li class="nav-small-cap">
                        <span class="hide-menu">Admin</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="<?= base_url('produk') ?>" aria-expanded="false">
                            <i data-feather="database" class="feather-icon"></i>
                            <span class="hide-menu">Alat</span>
                        </a>
                    </li>
                    <?php if ($this->fungsi->user_login()->id_role == "1") { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow btn btn-outline-light" href="javascript:void(0)" aria-expanded="false" style="border:0; border-radius: 0 50px 50px 0;"><i data-feather="archive" class="feather-icon"></i>
                                <span class="hide-menu">Master Data</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">

                                <li class="sidebar-item">
                                    <a href="<?= base_url('users') ?>" class="sidebar-link">
                                        <span class="hide-menu">Pengguna </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?= base_url('brosurs') ?>" class="sidebar-link">
                                        <span class="hide-menu">Brosur </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?= base_url('dst') ?>" class="sidebar-link">
                                        <span class="hide-menu">Distributor </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?= base_url('produks') ?>" class="sidebar-link">
                                        <span class="hide-menu">Produk </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?= base_url('penawarans') ?>" class="sidebar-link">
                                        <span class="hide-menu">Penawaran </span>
                                    </a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="<?= base_url('permintaans') ?>" class="sidebar-link">
                                        <span class="hide-menu">Permintaan </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- 
                        <li class="sidebar-item">
                            <a class="sidebar-link has-arrow btn btn-outline-light" href="javascript:void(0)" aria-expanded="false" style="border:0; border-radius: 0 50px 50px 0;"><i data-feather="sliders" class="feather-icon"></i>
                                <span class="hide-menu">Settings </span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level base-level-line">

                            </ul>
                        </li>
                    -->
                    <?php } ?>
                <?php } ?>
                <!-- <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="<?= base_url('profiles') ?>" aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i>
                        <span class="hide-menu"> Profile</span>
                    </a>
                </li> -->
                <!--User Teknisi -->       
                <?php if ($this->fungsi->user_login()->id_role == "4") { ?>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap">
                        <span class="hide-menu">Applications</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="<?= base_url('compro') ?>" aria-expanded="false">
                            <i data-feather="book" class="feather-icon"></i>
                            <span class="hide-menu">Company Profile</span>
                        </a>
                    </li>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap">
                        <span class="hide-menu">Teknisi</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="<?= base_url('usertek') ?>" aria-expanded="false">
                            <i data-feather="file-text" class="feather-icon"></i>
                            <span class="hide-menu">Jadwal</span>
                        </a>
                    </li>
                <?php } ?>

                <!--User Distributor -->       
                <?php if ($this->fungsi->user_login()->id_role == "4") { ?>
                    <li class="list-divider"></li>
                    <li class="nav-small-cap">
                        <span class="hide-menu">Applications</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="<?= base_url('compro') ?>" aria-expanded="false">
                            <i data-feather="book" class="feather-icon"></i>
                            <span class="hide-menu">Brosur</span>
                        </a>
                    </li>
                     <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="<?= base_url('pretraining') ?>" aria-expanded="false">
                            <i data-feather="book" class="feather-icon"></i>
                            <span class="hide-menu">Presentasi Training</span>
                        </a>
                    </li>
                     <li class="sidebar-item">
                        <a class="sidebar-link sidebar-link" href="<?= base_url('preproduk') ?>" aria-expanded="false">
                            <i data-feather="book" class="feather-icon"></i>
                            <span class="hide-menu">Presentasi Produk</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>