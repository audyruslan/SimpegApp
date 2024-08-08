<?php
session_start();
require 'functions.php';
if($_SESSION["level"] == 1){
  $username = $_SESSION["username"];
  $sqlAdmin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
  $admin = mysqli_fetch_assoc($sqlAdmin);

  $role_id = $admin["role_id"];
  $sqlRole = mysqli_query($conn, "SELECT * FROM tb_role WHERE role_id = '$role_id'");
  $role = mysqli_fetch_assoc($sqlRole);

  // Total Data Pegawai
  $totPegawai = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_pegawai"));
  // Total Data Pegawai PNS
  $totPegawaiPNS = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE jabatan_id = 6"));
  // Total Data Pegawai Non PNS
  $totPegawaiNonPNS = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE jabatan_id <> 6"));
  // Total Data Berkas
  $totBerkas = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_berkas"));

  // Total Data Surat Masuk
  $totSuratMasuk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Masuk'"));
  // Total Data Surat Keluar
  $totSuratKeluar = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Keluar'"));
  // Total Data Surat Keputusan
  $totSuratKeputusan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Keputusan'"));
  // Total Data Surat Tugas
  $totSuratTugas = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Tugas'"));
  // Total Data Surat Lainnya
  $totSuratLainnya = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Lainnya'"));

} else {
  $nip_pegawai = $_SESSION["nip_pegawai"];
  $sqlPegawai = mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE nip_pegawai = '$nip_pegawai'");
  $pegawai = mysqli_fetch_assoc($sqlPegawai);

  $role_id = $pegawai["role_id"];
  $sqlRole = mysqli_query($conn, "SELECT * FROM tb_role WHERE role_id = '$role_id'");
  $role = mysqli_fetch_assoc($sqlRole);

  $bidang = $pegawai["bidang"];

  // Total Data Surat Masuk
  $totSuratMasuk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Masuk' AND bidang = '$bidang'"));
  // Total Data Surat Keluar
  $totSuratKeluar = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Keluar' AND bidang = '$bidang'"));
  // Total Data Surat Keputusan
  $totSuratKeputusan = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Keputusan' AND bidang = '$bidang'"));
  // Total Data Surat Tugas
  $totSuratTugas = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Tugas' AND bidang = '$bidang'"));
  // Total Data Surat Lainnya
  $totSuratLainnya = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_surat WHERE tipe_surat = 'Surat Lainnya' AND bidang = '$bidang'"));

  // ChartSurat
  $sql = "SELECT tipe_surat, DATE_FORMAT(tgl_surat, '%m') as bulan, COUNT(*) as jumlah 
          FROM tb_surat 
          GROUP BY tipe_surat, bulan 
          ORDER BY bulan";
  $result = $conn->query($sql);

  $data = [];
  while($row = $result->fetch_assoc()) {
    $bulan_indonesia = ['01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April', '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus', '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'];
    $bulan = $bulan_indonesia[$row['bulan']];
    $data[$row['tipe_surat']][$bulan] = $row['jumlah'];
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?> | SimpegApp</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
    <!-- Sweetalert2 -->
    <link href="plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet">
</head>
<body>