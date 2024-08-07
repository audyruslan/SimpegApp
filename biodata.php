<?php
    $title = "Biodata";
    $menu = "Biodata";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card form-input">
                <div class="card-body">
                    <h5 class="mb-3">Detail Biodata</h5>
                    <form action="pegawai/ubah.php" method="POST">
                        <input type="hidden" name="pegawai_id" value="<?= $pegawai["pegawai_id"]; ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $pegawai["nama_lengkap"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="nip_pegawai">NIP</label>
                                    <input type="text" class="form-control" id="nip_pegawai" name="nip_pegawai" value="<?= $pegawai["nip_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="tmp_lahir_pegawai">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tmp_lahir_pegawai" name="tmp_lahir_pegawai" value="<?= $pegawai["tmp_lahir_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_lahir_pegawai">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tgl_lahir_pegawai" name="tgl_lahir_pegawai" value="<?= $pegawai["tgl_lahir_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="agama_pegawai">Agama</label>
                                    <select class="form-control" name="agama_pegawai" id="agama_pegawai">
                                        <option value="">Pilih Agama</option>
                                        <option value="Islam" <?= ($pegawai["agama_pegawai"] == "Islam") ? "selected" : ""; ?>>Islam</option>
                                        <option value="Kristen" <?= ($pegawai["agama_pegawai"] == "Kristen") ? "selected" : ""; ?>>Kristen</option>
                                        <option value="Katolik" <?= ($pegawai["agama_pegawai"] == "Katolik") ? "selected" : ""; ?>>Katolik</option>
                                        <option value="Hindu" <?= ($pegawai["agama_pegawai"] == "Hindu") ? "selected" : ""; ?>>Hindu</option>
                                        <option value="Buddha" <?= ($pegawai["agama_pegawai"] == "Buddha") ? "selected" : ""; ?>>Buddha</option>
                                        <option value="Konghucu" <?= ($pegawai["agama_pegawai"] == "Konghucu") ? "selected" : ""; ?>>Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status_perkawinan">Status Perkawinan</label>
                                    <select class="form-control" name="status_perkawinan" id="status_perkawinan">
                                        <option value="" disabled selected>Pilih Status Perkawinan</option>
                                        <option value="Belum Menikah" <?= ($pegawai["status_perkawinan"] == "Belum Menikah") ? "selected" : ""; ?>>Belum Menikah</option>
                                        <option value="Menikah" <?= ($pegawai["status_perkawinan"] == "Menikah") ? "selected" : ""; ?>>Menikah</option>
                                        <option value="Cerai Hidup" <?= ($pegawai["status_perkawinan"] == "Cerai Hidup") ? "selected" : ""; ?>>Cerai Hidup</option>
                                        <option value="Cerai Mati" <?= ($pegawai["status_perkawinan"] == "Cerai Mati") ? "selected" : ""; ?>>Cerai Mati</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_pegawai">Alamat</label>
                                    <textarea class="form-control" name="alamat_pegawai" id="alamat_pegawai" autocomplete="off"><?= $pegawai["alamat_pegawai"]; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp_pegawai">No. HP</label>
                                    <input type="text" class="form-control" id="no_hp_pegawai" name="no_hp_pegawai" value="<?= $pegawai["no_hp_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="pangkat_pegawai">Pangkat/Gol</label>
                                    <select class="form-control" name="pangkat_pegawai" id="pangkat_pegawai">
                                        <option value="" disabled selected>Pilih Pangkat/Golongan</option>
                                        <option value="IA - Juru Muda" <?= ($pegawai["pangkat_pegawai"] == "IA - Juru Muda") ? "selected" : ""; ?>>IA - Juru Muda</option>
                                        <option value="IB - Juru Muda Tingkat I" <?= ($pegawai["pangkat_pegawai"] == "IB - Juru Muda Tingkat I") ? "selected" : ""; ?>>IB - Juru Muda Tingkat I</option>
                                        <option value="IC - Juru" <?= ($pegawai["pangkat_pegawai"] == "IC - Juru") ? "selected" : ""; ?>>IC - Juru</option>
                                        <option value="ID - Juru Tingkat I" <?= ($pegawai["pangkat_pegawai"] == "ID - Juru Tingkat I") ? "selected" : ""; ?>>ID - Juru Tingkat I</option>
                                        <option value="IIA - Pengatur Muda" <?= ($pegawai["pangkat_pegawai"] == "IIA - Pengatur Muda") ? "selected" : ""; ?>>IIA - Pengatur Muda</option>
                                        <option value="IIB - Pengatur Muda Tingkat I" <?= ($pegawai["pangkat_pegawai"] == "IIB - Pengatur Muda Tingkat I") ? "selected" : ""; ?>>IIB - Pengatur Muda Tingkat I</option>
                                        <option value="IIC - Pengatur" <?= ($pegawai["pangkat_pegawai"] == "IIC - Pengatur") ? "selected" : ""; ?>>IIC - Pengatur</option>
                                        <option value="IID - Pengatur Tingkat I" <?= ($pegawai["pangkat_pegawai"] == "IID - Pengatur Tingkat I") ? "selected" : ""; ?>>IID - Pengatur Tingkat I</option>
                                        <option value="IIIA - Penata Muda" <?= ($pegawai["pangkat_pegawai"] == "IIIA - Penata Muda") ? "selected" : ""; ?>>IIIA - Penata Muda</option>
                                        <option value="IIIB - Penata Muda Tingkat I" <?= ($pegawai["pangkat_pegawai"] == "IIIB - Penata Muda Tingkat I") ? "selected" : ""; ?>>IIIB - Penata Muda Tingkat I</option>
                                        <option value="IIIC - Penata" <?= ($pegawai["pangkat_pegawai"] == "IIIC - Penata") ? "selected" : ""; ?>>IIIC - Penata</option>
                                        <option value="IIID - Penata Tingkat I" <?= ($pegawai["pangkat_pegawai"] == "IIID - Penata Tingkat I") ? "selected" : ""; ?>>IIID - Penata Tingkat I</option>
                                        <option value="IVA - Pembina" <?= ($pegawai["pangkat_pegawai"] == "IVA - Pembina") ? "selected" : ""; ?>>IVA - Pembina</option>
                                        <option value="IVB - Pembina Tingkat I" <?= ($pegawai["pangkat_pegawai"] == "IVB - Pembina Tingkat I") ? "selected" : ""; ?>>IVB - Pembina Tingkat I</option>
                                        <option value="IVC - Pembina Utama Muda" <?= ($pegawai["pangkat_pegawai"] == "IVC - Pembina Utama Muda") ? "selected" : ""; ?>>IVC - Pembina Utama Muda</option>
                                        <option value="IVD - Pembina Utama Madya" <?= ($pegawai["pangkat_pegawai"] == "IVD - Pembina Utama Madya") ? "selected" : ""; ?>>IVD - Pembina Utama Madya</option>
                                        <option value="IVE - Pembina Utama" <?= ($pegawai["pangkat_pegawai"] == "IVE - Pembina Utama") ? "selected" : ""; ?>>IVE - Pembina Utama</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                    <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                        <option value="" disabled selected>Pilih Pendidikan Terakhir</option>
                                        <option value="Sekolah Dasar (SD)" <?= ($pegawai["pendidikan_terakhir"] == "Sekolah Dasar (SD)") ? "selected" : ""; ?>>Sekolah Dasar (SD)</option>
                                        <option value="Sekolah Menengah Pertama (SMP)" <?= ($pegawai["pendidikan_terakhir"] == "Sekolah Menengah Pertama (SMP)") ? "selected" : ""; ?>>Sekolah Menengah Pertama (SMP)</option>
                                        <option value="Sekolah Menengah Atas (SMA)" <?= ($pegawai["pendidikan_terakhir"] == "Sekolah Menengah Atas (SMA)") ? "selected" : ""; ?>>Sekolah Menengah Atas (SMA)</option>
                                        <option value="Diploma I (D1)" <?= ($pegawai["pendidikan_terakhir"] == "Diploma I (D1)") ? "selected" : ""; ?>>Diploma I (D1)</option>
                                        <option value="Diploma II (D2)" <?= ($pegawai["pendidikan_terakhir"] == "Diploma II (D2)") ? "selected" : ""; ?>>Diploma II (D2)</option>
                                        <option value="Diploma III (D3)" <?= ($pegawai["pendidikan_terakhir"] == "Diploma III (D3)") ? "selected" : ""; ?>>Diploma III (D3)</option>
                                        <option value="Diploma IV (D4)" <?= ($pegawai["pendidikan_terakhir"] == "Diploma IV (D4)") ? "selected" : ""; ?>>Diploma IV (D4)</option>
                                        <option value="Sarjana (S1)" <?= ($pegawai["pendidikan_terakhir"] == "Sarjana (S1)") ? "selected" : ""; ?>>Sarjana (S1)</option>
                                        <option value="Magister (S2)" <?= ($pegawai["pendidikan_terakhir"] == "Magister (S2)") ? "selected" : ""; ?>>Magister (S2)</option>
                                        <option value="Doktor (S3)" <?= ($pegawai["pendidikan_terakhir"] == "Doktor (S3)") ? "selected" : ""; ?>>Doktor (S3)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="jabatan_id">Tipe Jabatan</label>
                                    <select class="form-control" name="jabatan_id" id="jabatan_id">
                                        <option value="" disabled selected>Pilih Jabatan</option>
                                        <?php 
                                            $sqlJabatan = mysqli_query($conn, "SELECT * FROM tb_jabatan");
                                            while($jabatan = mysqli_fetch_assoc($sqlJabatan)){
                                        ?>
                                            <option value="<?= $jabatan["jabatan_id"]; ?>" <?= ($pegawai["jabatan_id"] == $jabatan["jabatan_id"]) ? "selected" : ""; ?>><?= $jabatan["nama_jabatan"]; ?></option>
                                        <?php 
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="npwp_pegawai">NPWP</label>
                                    <input type="text" class="form-control" id="npwp_pegawai" name="npwp_pegawai" value="<?= $pegawai["npwp_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="ktp_pegawai">No. KTP</label>
                                    <input type="text" class="form-control" id="ktp_pegawai" name="ktp_pegawai" value="<?= $pegawai["ktp_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="kapreg_pegawai">No. KAPREG</label>
                                    <input type="text" class="form-control" id="kapreg_pegawai" name="kapreg_pegawai" value="<?= $pegawai["kapreg_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="email_pegawai">Alamat Email</label>
                                    <input type="text" class="form-control" id="email_pegawai" name="email_pegawai" value="<?= $pegawai["email_pegawai"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="unit_organisasi">Unit Organisasi</label>
                                    <input type="text" class="form-control" id="unit_organisasi" name="unit_organisasi" value="<?= $pegawai["unit_organisasi"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="unit_kerja">Unit Kerja</label>
                                    <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="<?= $pegawai["unit_kerja"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="nama_suami_istri">Nama Suami/Istri</label>
                                    <input type="text" class="form-control" id="nama_suami_istri" name="nama_suami_istri" value="<?= $pegawai["nama_suami_istri"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $pegawai["pekerjaan"]; ?>" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="nip_suami_istri">NIP Suami/Istri</label>
                                    <input type="text" class="form-control" id="nip_suami_istri" name="nip_suami_istri" value="<?= $pegawai["nip_suami_istri"]; ?>" autocomplete="off">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="#" class="btn btn-sm btn-dark">Cetak</a>
                                    <button type="submit" class="btn btn-sm btn-primary ml-2" name="ubah">Update</button>
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
                    <form action="pegawai/ubah_akun.php" method="POST">
                        <input type="hidden" name="pegawai_id" value="<?= $pegawai["pegawai_id"]; ?>">
                        <div class="form-group">
                            <label for="role_id">Jenis Akun</label>
                            <select class="form-control" name="role_id" id="role_id">
                                <option value="" disabled selected>Pilih Jenis Akun</option>
                                <?php 
                                    $sqlRole = mysqli_query($conn, "SELECT * FROM tb_role");
                                    while($role = mysqli_fetch_assoc($sqlRole)){
                                ?>
                                    <option value="<?= $role["role_id"]; ?>" <?= ($pegawai["role_id"] == $role["role_id"]) ? "selected" : ""; ?>><?= $role["role"]; ?></option>
                                <?php 
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nip_pegawai">Username</label>
                            <input type="text" class="form-control" id="nip_pegawai" name="nip_pegawai" value="<?= $pegawai["nip_pegawai"]; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="password-wrapper">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Kosongkan apabila tidak dirubah" autocomplete="off">
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