<?php
    $title = "Detail Pegawai";
    $menu = "Kelola Akun";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';

    $pegawaiID = $_GET["pegawai_id"];
    $sqlPegawai = mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE pegawai_id = '$pegawaiID'");
    $dataPegawai = mysqli_fetch_assoc($sqlPegawai);
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">

    <?php require_once 'layouts/data-pegawai.php'; ?>

    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card form-input">
                <div class="card-body">
                    <h5 class="mb-3">Detail Biodata</h5>
                    <form action="pegawai/ubah_detail_pegawai.php" method="POST">
                        <input type="hidden" name="pegawai_id" value="<?= $dataPegawai["pegawai_id"]; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                        value="<?= $dataPegawai["nama_lengkap"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="nip_pegawai">NIP</label>
                                    <input type="text" class="form-control" id="nip_pegawai" name="nip_pegawai"
                                        value="<?= $dataPegawai["nip_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="tmp_lahir_pegawai">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tmp_lahir_pegawai"
                                        name="tmp_lahir_pegawai" value="<?= $dataPegawai["tmp_lahir_pegawai"]; ?>"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir_pegawai">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir_pegawai"
                                        name="tgl_lahir_pegawai" value="<?= $dataPegawai["tgl_lahir_pegawai"]; ?>"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="agama_pegawai">Agama</label>
                                    <select class="form-control" name="agama_pegawai" id="agama_pegawai">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam"
                                            <?= ($dataPegawai["agama_pegawai"] == "Islam") ? "selected" : ""; ?>>Islam
                                        </option>
                                        <option value="Kristen"
                                            <?= ($dataPegawai["agama_pegawai"] == "Kristen") ? "selected" : ""; ?>>
                                            Kristen</option>
                                        <option value="Katolik"
                                            <?= ($dataPegawai["agama_pegawai"] == "Katolik") ? "selected" : ""; ?>>
                                            Katolik</option>
                                        <option value="Hindu"
                                            <?= ($dataPegawai["agama_pegawai"] == "Hindu") ? "selected" : ""; ?>>Hindu
                                        </option>
                                        <option value="Buddha"
                                            <?= ($dataPegawai["agama_pegawai"] == "Buddha") ? "selected" : ""; ?>>Buddha
                                        </option>
                                        <option value="Konghucu"
                                            <?= ($dataPegawai["agama_pegawai"] == "Konghucu") ? "selected" : ""; ?>>
                                            Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status_perkawinan">Status Perkawinan</label>
                                    <select class="form-control" name="status_perkawinan" id="status_perkawinan">
                                        <option value="" disabled selected>Pilih Status Perkawinan</option>
                                        <option value="Belum Menikah"
                                            <?= ($dataPegawai["status_perkawinan"] == "Belum Menikah") ? "selected" : ""; ?>>
                                            Belum Menikah</option>
                                        <option value="Menikah"
                                            <?= ($dataPegawai["status_perkawinan"] == "Menikah") ? "selected" : ""; ?>>
                                            Menikah</option>
                                        <option value="Cerai Hidup"
                                            <?= ($dataPegawai["status_perkawinan"] == "Cerai Hidup") ? "selected" : ""; ?>>
                                            Cerai Hidup</option>
                                        <option value="Cerai Mati"
                                            <?= ($dataPegawai["status_perkawinan"] == "Cerai Mati") ? "selected" : ""; ?>>
                                            Cerai Mati</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_pegawai">Alamat</label>
                                    <textarea class="form-control" name="alamat_pegawai" id="alamat_pegawai"
                                        autocomplete="off"><?= $dataPegawai["alamat_pegawai"]; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp_pegawai">No. HP</label>
                                    <input type="text" class="form-control" id="no_hp_pegawai" name="no_hp_pegawai"
                                        value="<?= $dataPegawai["no_hp_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="pangkat_pegawai">Pangkat/Gol</label>
                                    <select class="form-control" name="pangkat_pegawai" id="pangkat_pegawai">
                                        <option value="" disabled selected>Pilih Pangkat/Golongan</option>
                                        <option value="IA - Juru Muda"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IA - Juru Muda") ? "selected" : ""; ?>>
                                            IA - Juru Muda</option>
                                        <option value="IB - Juru Muda Tingkat I"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IB - Juru Muda Tingkat I") ? "selected" : ""; ?>>
                                            IB - Juru Muda Tingkat I</option>
                                        <option value="IC - Juru"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IC - Juru") ? "selected" : ""; ?>>
                                            IC - Juru</option>
                                        <option value="ID - Juru Tingkat I"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "ID - Juru Tingkat I") ? "selected" : ""; ?>>
                                            ID - Juru Tingkat I</option>
                                        <option value="IIA - Pengatur Muda"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IIA - Pengatur Muda") ? "selected" : ""; ?>>
                                            IIA - Pengatur Muda</option>
                                        <option value="IIB - Pengatur Muda Tingkat I"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IIB - Pengatur Muda Tingkat I") ? "selected" : ""; ?>>
                                            IIB - Pengatur Muda Tingkat I</option>
                                        <option value="IIC - Pengatur"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IIC - Pengatur") ? "selected" : ""; ?>>
                                            IIC - Pengatur</option>
                                        <option value="IID - Pengatur Tingkat I"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IID - Pengatur Tingkat I") ? "selected" : ""; ?>>
                                            IID - Pengatur Tingkat I</option>
                                        <option value="IIIA - Penata Muda"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IIIA - Penata Muda") ? "selected" : ""; ?>>
                                            IIIA - Penata Muda</option>
                                        <option value="IIIB - Penata Muda Tingkat I"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IIIB - Penata Muda Tingkat I") ? "selected" : ""; ?>>
                                            IIIB - Penata Muda Tingkat I</option>
                                        <option value="IIIC - Penata"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IIIC - Penata") ? "selected" : ""; ?>>
                                            IIIC - Penata</option>
                                        <option value="IIID - Penata Tingkat I"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IIID - Penata Tingkat I") ? "selected" : ""; ?>>
                                            IIID - Penata Tingkat I</option>
                                        <option value="IVA - Pembina"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IVA - Pembina") ? "selected" : ""; ?>>
                                            IVA - Pembina</option>
                                        <option value="IVB - Pembina Tingkat I"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IVB - Pembina Tingkat I") ? "selected" : ""; ?>>
                                            IVB - Pembina Tingkat I</option>
                                        <option value="IVC - Pembina Utama Muda"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IVC - Pembina Utama Muda") ? "selected" : ""; ?>>
                                            IVC - Pembina Utama Muda</option>
                                        <option value="IVD - Pembina Utama Madya"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IVD - Pembina Utama Madya") ? "selected" : ""; ?>>
                                            IVD - Pembina Utama Madya</option>
                                        <option value="IVE - Pembina Utama"
                                            <?= ($dataPegawai["pangkat_pegawai"] == "IVE - Pembina Utama") ? "selected" : ""; ?>>
                                            IVE - Pembina Utama</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                    <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                        <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                        <option value="Sekolah Dasar (SD)"
                                            <?= ($dataPegawai["pendidikan_terakhir"] == "Sekolah Dasar (SD)") ? "selected" : ""; ?>>
                                            Sekolah Dasar (SD)</option>
                                        <option value="Sekolah Menengah Pertama (SMP)"
                                            <?= ($dataPegawai["pendidikan_terakhir"] == "Sekolah Menengah Pertama (SMP)") ? "selected" : ""; ?>>
                                            Sekolah Menengah Pertama (SMP)</option>
                                        <option value="Sekolah Menengah Atas (SMA)"
                                            <?= ($dataPegawai["pendidikan_terakhir"] == "Sekolah Menengah Atas (SMA)") ? "selected" : ""; ?>>
                                            Sekolah Menengah Atas (SMA)</option>
                                        <option value="Diploma I (D1)"
                                            <?= ($dataPegawai["pendidikan_terakhir"] == "Diploma I (D1)") ? "selected" : ""; ?>>
                                            Diploma I (D1)</option>
                                        <option value="Diploma II (D2)"
                                            <?= ($dataPegawai["pendidikan_terakhir"] == "Diploma II (D2)") ? "selected" : ""; ?>>
                                            Diploma II (D2)</option>
                                        <option value="Diploma III (D3)"
                                            <?= ($dataPegawai["pendidikan_terakhir"] == "Diploma III (D3)") ? "selected" : ""; ?>>
                                            Diploma III (D3)</option>
                                        <option value="Diploma IV (D4)"
                                            <?= ($dataPegawai["pendidikan_terakhir"] == "Diploma IV (D4)") ? "selected" : ""; ?>>
                                            Diploma IV (D4)</option>
                                        <option value="Sarjana (S1)"
                                            <?= ($dataPegawai["pendidikan_terakhir"] == "Sarjana (S1)") ? "selected" : ""; ?>>
                                            Sarjana (S1)</option>
                                        <option value="Magister (S2)"
                                            <?= ($dataPegawai["pendidikan_terakhir"] == "Magister (S2)") ? "selected" : ""; ?>>
                                            Magister (S2)</option>
                                        <option value="Doktor (S3)"
                                            <?= ($dataPegawai["pendidikan_terakhir"] == "Doktor (S3)") ? "selected" : ""; ?>>
                                            Doktor (S3)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="bidang">Bidang</label>
                                    <select class="form-control" name="bidang" id="bidang" required>
                                        <option value="">Pilih Bidang</option>
                                        <option value="Bidang Sekretariat"
                                            <?= ($dataPegawai["bidang"] == "Bidang Sekretariat") ? "selected" : ""; ?>>
                                            Bidang Sekretariat</option>
                                        <option value="Bidang PSP"
                                            <?= ($dataPegawai["bidang"] == "Bidang PSP") ? "selected" : ""; ?>>Bidang
                                            PSP</option>
                                        <option value="Bidang Tanaman Pangan"
                                            <?= ($dataPegawai["bidang"] == "Bidang Tanaman Pangan") ? "selected" : ""; ?>>
                                            Bidang Tanaman Pangan</option>
                                        <option value="Bidang Hortikultura"
                                            <?= ($dataPegawai["bidang"] == "Bidang Hortikultura") ? "selected" : ""; ?>>
                                            Bidang Hortikultura</option>
                                        <option value="Bidang Penyuluhan"
                                            <?= ($dataPegawai["bidang"] == "Bidang Penyuluhan") ? "selected" : ""; ?>>
                                            Bidang Penyuluhan</option>
                                        <option value="UPT Proteksi"
                                            <?= ($dataPegawai["bidang"] == "UPT Proteksi") ? "selected" : ""; ?>>UPT
                                            Proteksi</option>
                                        <option value="UPT PMSB"
                                            <?= ($dataPegawai["bidang"] == "UPT PMSB") ? "selected" : ""; ?>>UPT PMSB
                                        </option>
                                        <option value="UPT Pemberitaan"
                                            <?= ($dataPegawai["bidang"] == "UPT Pemberitaan") ? "selected" : ""; ?>>UPT
                                            Pemberitaan</option>
                                        <option value="UPT Diklat"
                                            <?= ($dataPegawai["bidang"] == "UPT Diklat") ? "selected" : ""; ?>>UPT
                                            Diklat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan_id">Tipe Jabatan</label>
                                    <select class="form-control" name="jabatan_id" id="jabatan_id">
                                        <option value="" disabled selected>Pilih Jabatan</option>
                                        <?php 
                                            $sqlJabatan = mysqli_query($conn, "SELECT * FROM tb_jabatan");
                                            while($jabatan = mysqli_fetch_assoc($sqlJabatan)){
                                        ?>
                                        <option value="<?= $jabatan["jabatan_id"]; ?>"
                                            <?= ($dataPegawai["jabatan_id"] == $jabatan["jabatan_id"]) ? "selected" : ""; ?>>
                                            <?= $jabatan["nama_jabatan"]; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_jabatan_pegawai">Nama Jabatan</label>
                                    <input type="text" class="form-control" id="nama_jabatan_pegawai"
                                        name="nama_jabatan_pegawai" value="<?= $dataPegawai["nama_jabatan_pegawai"]; ?>"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="npwp_pegawai">NPWP</label>
                                    <input type="text" class="form-control" id="npwp_pegawai" name="npwp_pegawai"
                                        value="<?= $dataPegawai["npwp_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="ktp_pegawai">No. KTP</label>
                                    <input type="text" class="form-control" id="ktp_pegawai" name="ktp_pegawai"
                                        value="<?= $dataPegawai["ktp_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="kapreg_pegawai">No. KAPREG</label>
                                    <input type="text" class="form-control" id="kapreg_pegawai" name="kapreg_pegawai"
                                        value="<?= $dataPegawai["kapreg_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="email_pegawai">Alamat Email</label>
                                    <input type="text" class="form-control" id="email_pegawai" name="email_pegawai"
                                        value="<?= $dataPegawai["email_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="unit_organisasi">Unit Organisasi</label>
                                    <input type="text" class="form-control" id="unit_organisasi" name="unit_organisasi"
                                        value="<?= $dataPegawai["unit_organisasi"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="unit_kerja">Unit Kerja</label>
                                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja"
                                        value="<?= $dataPegawai["unit_kerja"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="nama_suami_istri">Nama Suami/Istri</label>
                                    <input type="text" class="form-control" id="nama_suami_istri"
                                        name="nama_suami_istri" value="<?= $dataPegawai["nama_suami_istri"]; ?>"
                                        autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                        value="<?= $dataPegawai["pekerjaan"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="nip_suami_istri">NIP Suami/Istri</label>
                                    <input type="text" class="form-control" id="nip_suami_istri" name="nip_suami_istri"
                                        value="<?= $dataPegawai["nip_suami_istri"]; ?>" autocomplete="off">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="#" class="btn btn-sm btn-dark">Cetak</a>
                                    <button type="submit" class="btn btn-sm btn-primary ml-2"
                                        name="ubah">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card form-input">
                <div class="card-body">
                    <h5 class="mb-3">Detail Akun</h5>
                    <form action="pegawai/ubah_detail_akun.php" method="POST">
                        <input type="hidden" name="pegawai_id" value="<?= $dataPegawai["pegawai_id"]; ?>">
                        <div class="form-group">
                            <label for="role_id">Jenis Akun</label>
                            <select class="form-control" name="role_id" id="role_id">
                                <option value="" disabled selected>Pilih Jenis Akun</option>
                                <?php 
                                    $sqlRole = mysqli_query($conn, "SELECT * FROM tb_role");
                                    while($role = mysqli_fetch_assoc($sqlRole)){
                                ?>
                                <option value="<?= $role["role_id"]; ?>"
                                    <?= ($dataPegawai["role_id"] == $role["role_id"]) ? "selected" : ""; ?>>
                                    <?= $role["role"]; ?></option>
                                <?php 
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nip_pegawai">Username</label>
                            <input type="text" class="form-control" id="nip_pegawai" name="nip_pegawai"
                                value="<?= $dataPegawai["nip_pegawai"]; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="password-wrapper">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Kosongkan apabila tidak dirubah" autocomplete="off">
                                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-sm btn-primary ml-2" name="ubah_akun">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    require 'layouts/footer.php';
?>