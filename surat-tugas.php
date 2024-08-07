<?php
    $title = "Surat Tugas";
    $menu = "Surat Tugas";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">

    <?php require_once 'layouts/data-surat.php'; ?>

    <div class="row mt-3">
        <div class="col-lg-12">
            <div id="accordion">
                <div class="card">
                    <div class="card-header d-flex justify-content-between" id="headingOne">
                        <p class="mb-0 text-light">
                            <a href="tambah-surat-tugas.php" class="text-light link-tambah">Tambah Surat Tugas</a>
                        </p>
                        <div id="berkasSurat" class="pencarian-berkas d-flex" data-pegawai-id="<?= $pegawai["pegawai_id"]; ?>">
                            <select class="form-control select-cari mr-2" id="cariTahunSurat" name="tahun_surat">
                                <option>Pilih Tahun</option>
                                <?php 
                                    $tahunSekarang = date("Y");
                                    for($tahun = 2020; $tahun <= $tahunSekarang; $tahun++){
                                ?>
                                <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                <?php } ?>
                            </select>
                            <select class="form-control select-cari mr-2" id="cariBulanSurat" name="bulan_surat">
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
                                <button id="btnSurat" class="btn btn-sm rounded tombol-cari mr-3">Cari</button>
                                <input type="text" class="form-control col-4 form-cari mr-5" id="cariSurat" placeholder="Cari Surat Tugas...">
                            <button class="badge badge-pill badge-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Lihat
                            </button>
                        </div>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div id="berkasPegawai" class="row">
                            <?php 
                                $pegawaiID = $pegawai["pegawai_id"];
                                $sqlSurat = mysqli_query($conn, "SELECT * FROM tb_surat
                                                                INNER JOIN tb_pegawai
                                                                ON tb_surat.pegawai_id = tb_pegawai.pegawai_id 
                                                                WHERE tb_surat.pegawai_id = $pegawaiID AND tb_surat.tipe_surat = 'Surat Tugas'");
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
                                        <a href="detail-surat-tugas.php?surat_id=<?= $surat["surat_id"]; ?>" class="badge badge-pill badge-primary mr-1">Lihat</a>
                                        <a href="#" class="badge badge-pill badge-dark ml-1">Cetak</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                }
                            } else {
                            ?>
                            <div class="col-12 text-center mt-5 mr-5 mb-5">
                                <h5>Maaf Surat Tugas Belum Tersedia!</h5>
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
    function fetchSurat(tahun, bulan, keyword) {
        const pegawaiID = document.getElementById('berkasSurat').dataset.pegawaiId;
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `surat-tugas/cari.php?tahun=${tahun}&bulan=${bulan}&keyword=${keyword}&pegawai_id=${pegawaiID}`, true);
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById('berkasPegawai').innerHTML = this.responseText;
            }
        }
        xhr.send();
    }

    document.getElementById('btnSurat').addEventListener('click', function() {
        const tahun = document.getElementById('cariTahunSurat').value;
        const bulan = document.getElementById('cariBulanSurat').value;
        fetchSurat(tahun, bulan, '');
    });

    document.getElementById('cariSurat').addEventListener('keyup', function() {
        const tahun = document.getElementById('cariTahunSurat').value;
        const bulan = document.getElementById('cariBulanSurat').value;
        const keyword = this.value;
        fetchSurat(tahun, bulan, keyword);
    });
});
</script>
    
<?php 
    require 'layouts/footer.php';
?>