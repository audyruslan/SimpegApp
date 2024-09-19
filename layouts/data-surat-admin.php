<?php 
    // Total Data Surat Masuk
  $totSuratMasuk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Masuk' AND bidang = '$bidang_menu'"));
  // Total Data Surat Keluar
  $totSuratKeluar = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Keluar' AND bidang = '$bidang_menu'"));
  // Total Data Surat Keputusan
  $totSuratKeputusan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Keputusan' AND bidang = '$bidang_menu'"));
  // Total Data Surat Tugas
  $totSuratTugas = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Tugas' AND bidang = '$bidang_menu'"));
  // Total Data Surat Lainnya
  $totSuratLainnya = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Lainnya' AND bidang = '$bidang_menu'"));
?>

<div class="row">
    <div class="card-col mb-3">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Surat Masuk</p>
                <h2 class="card-title"><?= $totSuratMasuk; ?></h2>
            </div>
        </div>
    </div>
    <div class="card-col mb-3">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Surat Keluar</p>
                <h2 class="card-title"><?= $totSuratKeluar; ?></h2>
            </div>
        </div>
    </div>
    <div class="card-col mb-3">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Surat Keputusan</p>
                <h2 class="card-title"><?= $totSuratKeputusan; ?></h2>
            </div>
        </div>
    </div>
    <div class="card-col mb-3">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Surat Tugas</p>
                <h2 class="card-title"><?= $totSuratTugas; ?></h2>
            </div>
        </div>
    </div>
    <div class="card-col mb-3">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Surat Lainnya</p>
                <h2 class="card-title"><?= $totSuratLainnya; ?></h2>
            </div>
        </div>
    </div>
</div>