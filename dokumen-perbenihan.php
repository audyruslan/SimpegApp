<?php 
    $title = "Dokumen UPT Perbenihan";
    $menu = "Dokumen UPT Perbenihan";
    $bidang_menu = "UPT Perbenihan";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';

    $sqlDataPegawai = mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE jabatan_id = 6");
    $pegawai = mysqli_fetch_assoc($sqlDataPegawai);
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">
    <div class="row judul">
        <div class="col-12">
            <h2>Dokumen Administrasi UPT Perbenihan</h2>
        </div>
    </div>

    <?php 
        require_once 'layouts/data-surat-admin.php';
    ?>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div id="accordion">

                <!-- Surat Masuk -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between" id="suratMasuk">
                        <p class="mb-0 text-light">Surat Masuk</a></p>
                        <div id="berkasSuratMasuk" class="pencarian-berkas d-flex"
                            data-pegawai-id="<?= $pegawai["pegawai_id"]; ?>" data-surat-type="masuk">
                            <select class="form-control select-cari mr-2" id="cariTahunSuratMasuk" name="tahun_surat">
                                <option>Pilih Tahun</option>
                                <?php 
                                    $tahunSekarang = date("Y");
                                    for($tahun = 2020; $tahun <= $tahunSekarang; $tahun++){
                                ?>
                                <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                <?php } ?>
                            </select>
                            <select class="form-control select-cari mr-2" id="cariBulanSuratMasuk" name="bulan_surat">
                                <option>Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <button id="btnSuratMasuk" class="btn btn-sm rounded tombol-cari mr-3">Cari</button>
                            <input type="text" class="form-control col-4 form-cari mr-5" id="cariSuratMasuk"
                                placeholder="Cari Surat Masuk...">
                            <button class="badge badge-pill badge-light" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Lihat
                            </button>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="suratMasuk" data-parent="#accordion">
                        <div class="card-body">
                            <div id="dataSuratMasuk" class="row dataSurat">
                                <?php 
                                    $pegawaiID = $pegawai["pegawai_id"];
                                    $sqlSurat = mysqli_query($conn, "SELECT * FROM tb_surat
                                                                    INNER JOIN tb_pegawai
                                                                    ON tb_surat.pegawai_id = tb_pegawai.pegawai_id 
                                                                    WHERE tb_surat.pegawai_id = $pegawaiID AND tb_surat.tipe_surat = 'Surat Masuk' AND tb_surat.bidang = 'UPT Perbenihan'");
                                    if (mysqli_num_rows($sqlSurat) > 0) {
                                        while($surat = mysqli_fetch_assoc($sqlSurat)) {
                                ?>
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                            <h3><?= $surat["perihal_surat"]; ?></h3>
                                            <p><?= $surat["tgl_surat"]; ?></p>
                                            <div class="d-flex tombol">
                                                <a href="lihat-detail-surat.php?surat_id=<?= $surat["surat_id"]; ?>&tipe_surat=Surat Masuk"
                                                    class="badge badge-pill badge-primary mr-1">Lihat</a>
                                                <a href="#" class="badge badge-pill badge-dark ml-1">Cetak</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                } else {
                                ?>
                                <div class="col-12 text-center">
                                    <h5>Surat Masuk Belum Tersedia!</h5>
                                </div>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Surat Keluar -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between" id="suratKeluar">
                        <p class="mb-0 text-light">Surat Keluar</p>
                        <div id="berkasSuratKeluar" class="pencarian-berkas d-flex"
                            data-pegawai-id="<?= $pegawai["pegawai_id"]; ?>" data-surat-type="keluar">
                            <select class="form-control select-cari mr-2" id="cariTahunSuratKeluar" name="tahun_surat">
                                <option>Pilih Tahun</option>
                                <?php 
                                    $tahunSekarang = date("Y");
                                    for($tahun = 2020; $tahun <= $tahunSekarang; $tahun++){
                                ?>
                                <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                <?php } ?>
                            </select>
                            <select class="form-control select-cari mr-2" id="cariBulanSuratKeluar" name="bulan_surat">
                                <option>Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <button id="btnSuratKeluar" class="btn btn-sm rounded tombol-cari mr-3">Cari</button>
                            <input type="text" class="form-control col-4 form-cari mr-5" id="cariSuratKeluar"
                                placeholder="Cari Surat Keluar...">
                            <button class="badge badge-pill badge-light" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Lihat
                            </button>
                        </div>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="suratKeluar" data-parent="#accordion">
                        <div class="card-body">
                            <div id="dataSuratKeluar" class="row dataSurat">
                                <?php 
                                    $pegawaiID = $pegawai["pegawai_id"];
                                    $sqlSurat = mysqli_query($conn, "SELECT * FROM tb_surat
                                                                    INNER JOIN tb_pegawai
                                                                    ON tb_surat.pegawai_id = tb_pegawai.pegawai_id 
                                                                    WHERE tb_surat.pegawai_id = $pegawaiID AND tb_surat.tipe_surat = 'Surat Keluar' AND tb_surat.bidang = 'UPT Pemberitaan'");
                                    if (mysqli_num_rows($sqlSurat) > 0) {
                                        while($surat = mysqli_fetch_assoc($sqlSurat)) {
                                ?>
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                            <h3><?= $surat["perihal_surat"]; ?></h3>
                                            <p><?= $surat["tgl_surat"]; ?></p>
                                            <div class="d-flex tombol">
                                                <a href="lihat-detail-surat.php?surat_id=<?= $surat["surat_id"]; ?>&tipe_surat=Surat Keluar"
                                                    class="badge badge-pill badge-primary mr-1">Lihat</a>
                                                <a href="#" class="badge badge-pill badge-dark ml-1">Cetak</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                } else {
                                ?>
                                <div class="col-12 text-center">
                                    <h5>Surat Keluar Belum Tersedia!</h5>
                                </div>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Surat Keputusan -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between" id="suratKeputusan">
                        <p class="mb-0 text-light">Surat Keputusan</p>
                        <div id="berkasSuratKeputusan" class="pencarian-berkas d-flex"
                            data-pegawai-id="<?= $pegawai["pegawai_id"]; ?>" data-surat-type="keputusan">
                            <select class="form-control select-cari mr-2" id="cariTahunSuratKeputusan"
                                name="tahun_surat">
                                <option>Pilih Tahun</option>
                                <?php 
                                    $tahunSekarang = date("Y");
                                    for($tahun = 2020; $tahun <= $tahunSekarang; $tahun++){
                                ?>
                                <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                <?php } ?>
                            </select>
                            <select class="form-control select-cari mr-2" id="cariBulanSuratKeputusan"
                                name="bulan_surat">
                                <option>Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <button id="btnSuratKeputusan" class="btn btn-sm rounded tombol-cari mr-3">Cari</button>
                            <input type="text" class="form-control col-4 form-cari mr-5" id="cariSuratKeputusan"
                                placeholder="Cari Surat Keputusan...">
                            <button class="badge badge-pill badge-light" data-toggle="collapse"
                                data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Lihat
                            </button>
                        </div>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="suratKeputusan" data-parent="#accordion">
                        <div class="card-body">
                            <div id="dataSuratKeputusan" class="row dataSurat">
                                <?php 
                                    $pegawaiID = $pegawai["pegawai_id"];
                                    $sqlSurat = mysqli_query($conn, "SELECT * FROM tb_surat
                                                                    INNER JOIN tb_pegawai
                                                                    ON tb_surat.pegawai_id = tb_pegawai.pegawai_id 
                                                                    WHERE tb_surat.pegawai_id = $pegawaiID AND tb_surat.tipe_surat = 'Surat Keputusan' AND tb_surat.bidang = 'UPT Pemberitaan'");
                                    if (mysqli_num_rows($sqlSurat) > 0) {
                                        while($surat = mysqli_fetch_assoc($sqlSurat)) {
                                ?>
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                            <h3><?= $surat["perihal_surat"]; ?></h3>
                                            <p><?= $surat["tgl_surat"]; ?></p>
                                            <div class="d-flex tombol">
                                                <a href="lihat-detail-surat.php?surat_id=<?= $surat["surat_id"]; ?>&tipe_surat=Surat Keputusan"
                                                    class="badge badge-pill badge-primary mr-1">Lihat</a>
                                                <a href="#" class="badge badge-pill badge-dark ml-1">Cetak</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                } else {
                                ?>
                                <div class="col-12 text-center">
                                    <h5>Surat Keputusan Belum Tersedia!</h5>
                                </div>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Surat Tugas -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between" id="suratTugas">
                        <p class="mb-0 text-light">Surat Tugas</p>
                        <div id="berkasSuratTugas" class="pencarian-berkas d-flex"
                            data-pegawai-id="<?= $pegawai["pegawai_id"]; ?>" data-surat-type="tugas">
                            <select class="form-control select-cari mr-2" id="cariTahunSuratTugas" name="tahun_surat">
                                <option>Pilih Tahun</option>
                                <?php 
                                    $tahunSekarang = date("Y");
                                    for($tahun = 2020; $tahun <= $tahunSekarang; $tahun++){
                                ?>
                                <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                <?php } ?>
                            </select>
                            <select class="form-control select-cari mr-2" id="cariBulanSuratTugas" name="bulan_surat">
                                <option>Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <button id="btnSuratTugas" class="btn btn-sm rounded tombol-cari mr-3">Cari</button>
                            <input type="text" class="form-control col-4 form-cari mr-5" id="cariSuratTugas"
                                placeholder="Cari Surat Tugas...">
                            <button class="badge badge-pill badge-light" data-toggle="collapse"
                                data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                Lihat
                            </button>
                        </div>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="suratTugas" data-parent="#accordion">
                        <div class="card-body">
                            <div id="dataSuratTugas" class="row dataSurat">
                                <?php 
                                    $pegawaiID = $pegawai["pegawai_id"];
                                    $sqlSurat = mysqli_query($conn, "SELECT * FROM tb_surat
                                                                    INNER JOIN tb_pegawai
                                                                    ON tb_surat.pegawai_id = tb_pegawai.pegawai_id 
                                                                    WHERE tb_surat.pegawai_id = $pegawaiID AND tb_surat.tipe_surat = 'Surat Tugas' AND tb_surat.bidang = 'UPT Pemberitaan'");
                                    if (mysqli_num_rows($sqlSurat) > 0) {
                                        while($surat = mysqli_fetch_assoc($sqlSurat)) {
                                ?>
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                            <h3><?= $surat["perihal_surat"]; ?></h3>
                                            <p><?= $surat["tgl_surat"]; ?></p>
                                            <div class="d-flex tombol">
                                                <a href="lihat-detail-surat.php?surat_id=<?= $surat["surat_id"]; ?>&tipe_surat=Surat Tugas"
                                                    class="badge badge-pill badge-primary mr-1">Lihat</a>
                                                <a href="#" class="badge badge-pill badge-dark ml-1">Cetak</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                } else {
                                ?>
                                <div class="col-12 text-center">
                                    <h5>Surat Tugas Belum Tersedia!</h5>
                                </div>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Surat Lainnya -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between" id="suratLainnya">
                        <p class="mb-0 text-light">Surat Lainnya</p>
                        <div id="berkasSuratLainnya" class="pencarian-berkas d-flex"
                            data-pegawai-id="<?= $pegawai["pegawai_id"]; ?>" data-surat-type="lainnya">
                            <select class="form-control select-cari mr-2" id="cariTahunSuratLainnya" name="tahun_surat">
                                <option>Pilih Tahun</option>
                                <?php 
                                    $tahunSekarang = date("Y");
                                    for($tahun = 2020; $tahun <= $tahunSekarang; $tahun++){
                                ?>
                                <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                <?php } ?>
                            </select>
                            <select class="form-control select-cari mr-2" id="cariBulanSuratLainnya" name="bulan_surat">
                                <option>Pilih Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <button id="btnSuratLainnya" class="btn btn-sm rounded tombol-cari mr-3">Cari</button>
                            <input type="text" class="form-control col-4 form-cari mr-5" id="cariSuratLainnya"
                                placeholder="Cari Surat Lainnya...">
                            <button class="badge badge-pill badge-light" data-toggle="collapse"
                                data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                Lihat
                            </button>
                        </div>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="suratLainnya" data-parent="#accordion">
                        <div class="card-body">
                            <div id="dataSuratLainnya" class="row dataSurat">
                                <?php 
                                    $pegawaiID = $pegawai["pegawai_id"];
                                    $sqlSurat = mysqli_query($conn, "SELECT * FROM tb_surat
                                                                    INNER JOIN tb_pegawai
                                                                    ON tb_surat.pegawai_id = tb_pegawai.pegawai_id 
                                                                    WHERE tb_surat.pegawai_id = $pegawaiID AND tb_surat.tipe_surat = 'Surat Lainnya' AND tb_surat.bidang = 'UPT Pemberitaan'");
                                    if (mysqli_num_rows($sqlSurat) > 0) {
                                        while($surat = mysqli_fetch_assoc($sqlSurat)) {
                                ?>
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                            <h3><?= $surat["perihal_surat"]; ?></h3>
                                            <p><?= $surat["tgl_surat"]; ?></p>
                                            <div class="d-flex tombol">
                                                <a href="lihat-detail-surat.php?surat_id=<?= $surat["surat_id"]; ?>&tipe_surat=Surat Lainnya"
                                                    class="badge badge-pill badge-primary mr-1">Lihat</a>
                                                <a href="#" class="badge badge-pill badge-dark ml-1">Cetak</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    }
                                } else {
                                ?>
                                <div class="col-12 text-center">
                                    <h5>Surat Lainnya Belum Tersedia!</h5>
                                </div>
                                <?php 
                                    } 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function fetchSurat(tahun, bulan, keyword, pegawaiID, suratType, targetID) {
        let url =
            `dokumen-administrasi/surat-${suratType}-pemberitaan.php?tahun=${tahun}&bulan=${bulan}&keyword=${keyword}&pegawai_id=${pegawaiID}`;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById(targetID).innerHTML = this.responseText;
            }
        };
        xhr.send();
    }

    function setupEventHandlers(containerID, tahunID, bulanID, btnID, inputID, targetID) {
        const container = document.getElementById(containerID);
        const pegawaiID = container.dataset.pegawaiId;
        const suratType = container.dataset.suratType;

        container.querySelector(`#${btnID}`).addEventListener('click', function() {
            const tahun = container.querySelector(`#${tahunID}`).value;
            const bulan = container.querySelector(`#${bulanID}`).value;
            fetchSurat(tahun, bulan, '', pegawaiID, suratType, targetID);
        });

        container.querySelector(`#${inputID}`).addEventListener('keyup', function() {
            const tahun = container.querySelector(`#${tahunID}`).value;
            const bulan = container.querySelector(`#${bulanID}`).value;
            const keyword = this.value;
            fetchSurat(tahun, bulan, keyword, pegawaiID, suratType, targetID);
        });
    }

    setupEventHandlers('berkasSuratMasuk', 'cariTahunSuratMasuk', 'cariBulanSuratMasuk', 'btnSuratMasuk',
        'cariSuratMasuk', 'dataSuratMasuk');
    setupEventHandlers('berkasSuratKeluar', 'cariTahunSuratKeluar', 'cariBulanSuratKeluar', 'btnSuratKeluar',
        'cariSuratKeluar', 'dataSuratKeluar');
    setupEventHandlers('berkasSuratKeputusan', 'cariTahunSuratKeputusan', 'cariBulanSuratKeputusan',
        'btnSuratKeputusan', 'cariSuratKeputusan', 'dataSuratKeputusan');
    setupEventHandlers('berkasSuratTugas', 'cariTahunSuratTugas', 'cariBulanSuratTugas', 'btnSuratTugas',
        'cariSuratTugas', 'dataSuratTugas');
    setupEventHandlers('berkasSuratLainnya', 'cariTahunSuratLainnya', 'cariBulanSuratLainnya',
        'btnSuratLainnya', 'cariSuratLainnya', 'dataSuratLainnya');
});
</script>


<?php 
    require 'layouts/footer.php';
?>