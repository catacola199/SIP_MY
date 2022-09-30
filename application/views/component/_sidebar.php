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

                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Applications</span>
                </li>

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

                <!-- <li class="list-divider"></li> -->
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow btn btn-outline-light" href="javascript:void(0)" aria-expanded="false" style="border:0; border-radius: 0 50px 50px 0;"><i data-feather="sliders" class="feather-icon"></i>
                        <span class="hide-menu">Settings </span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="<?= site_url('welcome/mas_absensiguru') ?>" class="sidebar-link">
                                <span class="hide-menu">Absensi Guru</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?= site_url('welcome/mas_absensi') ?>" class="sidebar-link">
                                <span class="hide-menu">Absensi Siswa</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>