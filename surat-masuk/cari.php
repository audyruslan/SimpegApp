<?php
include '../functions.php';

$tahun = $_GET['tahun'] ?? '';
$bulan = $_GET['bulan'] ?? '';
$keyword = $_GET['keyword'] ?? '';
$pegawaiID = $_GET['pegawai_id'] ?? '';

$query = "SELECT * FROM tb_surat 
          INNER JOIN tb_pegawai ON tb_surat.pegawai_id = tb_pegawai.pegawai_id 
          WHERE tb_surat.pegawai_id = $pegawaiID AND tb_surat.tipe_surat = 'Surat Masuk'";

if (!empty($tahun)) {
    $query .= " AND YEAR(tgl_surat) = '$tahun'";
}
if (!empty($bulan)) {
    $query .= " AND MONTH(tgl_surat) = '$bulan'";
}
if (!empty($keyword)) {
    $query .= " AND (perihal_surat LIKE '%$keyword%')";
}

$sqlSurat = mysqli_query($conn, $query);

if (mysqli_num_rows($sqlSurat) > 0) {
    while($surat = mysqli_fetch_assoc($sqlSurat)) { 
    echo '<div class="col-2">
            <div class="card text-center">
                <img src="assets/img/pdf.png" alt="PDF">
                <div class="card-body">
                    <h3>' . $surat["perihal_surat"] . '</h3>
                    <p>' . $surat["tgl_surat"] . '</p>
                    <div class="d-flex tombol">
                        <a href="detail-surat-masuk.php?surat_id=' . $surat["surat_id"] . '%" class="badge badge-pill badge-primary mr-1">Lihat</a>
                        <span class="badge badge-pill badge-dark ml-1">Cetak</span>
                    </div>
                </div>
            </div>
        </div>';
    }
} else {
    echo '
        <div class="col-12 text-center m-5">
            <h5>Maaf Surat Tidak Tersedia!</h5>
        </div>
    ';
}
?>