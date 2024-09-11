<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 sidebar">
            <div class="sidebar-sticky">
                <?php 
            if($_SESSION["level"] == 1){
          ?>
                <ul class="nav flex-column">
                    <li class="nav-item mt-5">
                        <a class="nav-link <?php if ($menu == "Dashboard" || $menu == "Detail Pegawai") echo "active"; ?>"
                            href="home.php">
                            Halaman Utama
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($menu == "Berkas Pegawai" || $menu == "Detail Berkas Pegawai" || $menu == "Lihat Berkas Pegawai") echo "active"; ?>"
                            href="berkas-pegawai.php">
                            Berkas Pegawai
                        </a>
                    </li>
                    <li
                        class="nav-item <?php if ($menu == "Dokumen Sekretariat" || $menu == "Dokumen PSP" || $menu == "Dokumen Tanaman Pangan" || $menu == "Dokumen Hortikultura" || $menu == "Dokumen Penyuluhan" || $menu == "Dokumen UPT Proteksi" || $menu == "Dokumen UPT PMSB" || $menu == "Dokumen UPT Perbenihan" || $menu == "Dokumen UPT Diklat" || $menu == "Lihat Detail Surat") echo "active-menu"; ?>">
                        <a class="nav-link" data-toggle="collapse" href="#dokumenAdministrasiSubmenu" role="button"
                            aria-expanded="false" aria-controls="dokumenAdministrasiSubmenu">
                            <i class="fas fa-angle-left right"></i>
                            Dokumen Administrasi
                        </a>
                        <div class="collapse <?php if ($menu == "Dokumen Sekretariat" || $menu == "Dokumen PSP" || $menu == "Dokumen Tanaman Pangan" || $menu == "Dokumen Hortikultura" || $menu == "Dokumen Penyuluhan" || $menu == "Dokumen UPT Proteksi" || $menu == "Dokumen UPT PMSB" || $menu == "Dokumen UPT Perbenihan" || $menu == "Dokumen UPT Diklat" || $menu == "Lihat Detail Surat") echo "show"; ?>"
                            id="dokumenAdministrasiSubmenu">
                            <ul class="nav flex-column ml-3">
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Dokumen Sekretariat") echo "active"; ?>"
                                        href="dokumen-sekretariat.php">Bidang Sekertariat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Dokumen PSP") echo "active"; ?>"
                                        href="dokumen-psp.php">PSP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Dokumen Tanaman Pangan") echo "active"; ?>"
                                        href="dokumen-tanaman-pangan.php">Tanaman Pangan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Dokumen Hortikultura") echo "active"; ?>"
                                        href="dokumen-hortikultura.php">Hortikultura</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Dokumen Penyuluhan") echo "active"; ?>"
                                        href="dokumen-penyuluhan.php">Penyuluhan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Dokumen UPT Proteksi") echo "active"; ?>"
                                        href="dokumen-proteksi.php">UPT Proteksi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Dokumen UPT PMSB") echo "active"; ?>"
                                        href="dokumen-pmsb.php">UPT PMSB</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Dokumen UPT Perbenihan") echo "active"; ?>"
                                        href="dokumen-perbenihan.php">UPT Perbenihan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Dokumen UPT Diklat") echo "active"; ?>"
                                        href="dokumen-diklat.php">UPT Diklat</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($menu == "Kelola Akun") echo "active"; ?>" href="kelola-akun.php">
                            Kelola Akun
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModalAdmin">
                            Logout
                        </a>
                    </li>

                    <div class="modal fade" id="logoutModalAdmin" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModaAdmin" aria-hidden="true">
                        <div class="modal-dialog" role="document">z
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModaAdmin">
                                        <strong><?= $admin["nama_lengkap"]; ?></strong>
                                        , Anda
                                        Yakin
                                        Ingin
                                        Keluar?
                                    </h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Pilih Tombol "Keluar" jika ingin melanjtukan.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                    <a class="btn btn-primary" href="logout.php">Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
                <?php 
            } else if($_SESSION["level"] == 2){
          ?>
                <ul class="nav flex-column">
                    <li class="nav-item mt-5">
                        <a class="nav-link <?php if ($menu == "Dashboard") echo "active"; ?>" href="home.php">
                            Halaman Utama
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($menu == "Biodata") echo "active"; ?>" href="biodata.php">
                            Biodata
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($menu == "Berkas Pegawai" || $menu == "Tambah Berkas Pegawai" || $menu == "Lihat Berkas Pegawai") echo "active"; ?>"
                            href="berkas-staf-pegawai.php">
                            Berkas Pegawai
                        </a>
                    </li>
                    <li
                        class="nav-item <?php if ($menu == "Surat Masuk" || $menu == "Detail Surat Masuk" || $menu == "Tambah Surat Masuk"  || $menu == "Surat Keluar" || $menu == "Detail Surat Keluar" || $menu == "Tambah Surat Keluar" || $menu == "Surat Keputusan" || $menu == "Detail Surat Keputusan" || $menu == "Tambah Surat Keputusan" || $menu == "Surat Tugas" || $menu == "Detail Surat Tugas" || $menu == "Tambah Surat Tugas" || $menu == "Surat Lainnya" || $menu == "Detail Surat Lainnya" || $menu == "Tambah Surat Lainnya") echo "active-menu"; ?>">
                        <a class="nav-link" data-toggle="collapse" href="#submenu" role="button" aria-expanded="false"
                            aria-controls="submenu">
                            <i class="fas fa-angle-left right"></i>
                            Dokumen Administrasi
                        </a>
                        <div class="collapse <?php if ($menu == "Surat Masuk" || $menu == "Detail Surat Masuk" || $menu == "Tambah Surat Masuk" || $menu == "Surat Keluar" || $menu == "Detail Surat Keluar" || $menu == "Tambah Surat Keluar" || $menu == "Surat Keputusan" || $menu == "Detail Surat Keputusan" || $menu == "Tambah Surat Keputusan" || $menu == "Surat Tugas" || $menu == "Detail Surat Tugas" || $menu == "Tambah Surat Tugas" || $menu == "Surat Lainnya" || $menu == "Detail Surat Lainnya" || $menu == "Tambah Surat Lainnya") echo "show"; ?>"
                            id="submenu">
                            <ul class="nav flex-column ml-3">
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Surat Masuk" || $menu == "Detail Surat Masuk" || $menu == "Tambah Surat Masuk") echo "active"; ?>"
                                        href="surat-masuk.php">Surat Masuk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Surat Keluar" || $menu == "Detail Surat Keluar" || $menu == "Tambah Surat Keluar") echo "active"; ?>"
                                        href="surat-keluar.php">Surat Keluar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Surat Keputusan" || $menu == "Detail Surat Keputusan" || $menu == "Tambah Surat Keputusan") echo "active"; ?>"
                                        href="surat-keputusan.php">Surat Keputusan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Surat Tugas" || $menu == "Detail Surat Tugas" || $menu == "Tambah Surat Tugas") echo "active"; ?>"
                                        href="surat-tugas.php">Surat Tugas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link submenu-link <?php if ($menu == "Surat Lainnya" || $menu == "Detail Surat Lainnya" || $menu == "Tambah Surat Lainnya") echo "active"; ?>"
                                        href="surat-lainnya.php">Surat Lainnya</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" data-toggle="modal"
                            data-target="#logoutModalBidangPegawai">
                            Logout
                        </a>
                    </li>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModalBidangPegawai" tabindex="-1" role="dialog"
                        aria-labelledby="ModalBidangPegawai" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalBidangPegawai">
                                        <strong><?= $pegawai["nama_lengkap"]; ?></strong>
                                        , Anda
                                        Yakin
                                        Ingin
                                        Keluar?
                                    </h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Pilih Tombol "Keluar" jika ingin melanjtukan.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                    <a class="btn btn-primary" href="logout.php">Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
                <?php }else{ ?>
                <ul class="nav flex-column">
                    <li class="nav-item mt-5">
                        <a class="nav-link <?php if ($menu == "Biodata") echo "active"; ?>" href="biodata.php">
                            Biodata
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($menu == "Berkas Pegawai" || $menu == "Tambah Berkas Pegawai" || $menu == "Lihat Berkas Pegawai") echo "active"; ?>"
                            href="berkas-staf-pegawai.php">
                            Berkas Pegawai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" data-toggle="modal" data-target="#logoutModalPegawai">
                            Logout
                        </a>
                    </li>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModalPegawai" tabindex="-1" role="dialog"
                        aria-labelledby="ModalPegawai" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ModalPegawai">
                                        <strong><?= $pegawai["nama_lengkap"]; ?></strong>
                                        , Anda
                                        Yakin
                                        Ingin
                                        Keluar?
                                    </h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Pilih Tombol "Keluar" jika ingin melanjtukan.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                    <a class="btn btn-primary" href="logout.php">Keluar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
                <?php } ?>
            </div>
        </nav>