<?php
session_start();
date_default_timezone_set('Asia/Ujung_Pandang');
require '../functions.php';

function tambah_berkas($data)
{
    global $conn;

    // Detail Data Berkas
    $pegawai_id = htmlspecialchars($data['pegawai_id']);
    $nama_berkas = htmlspecialchars($data['nama_berkas']);
    $jenis_berkas = htmlspecialchars($data['jenis_berkas']);
    $tgl_berkas = date("Y-m-d");
    $uraian_berkas = htmlspecialchars($data['uraian_berkas']);

    // Data File atau Gambar Berkas
    $berkas_dir = DocBerkas($nama_berkas, $jenis_berkas);

    $query = "INSERT INTO tb_berkas
                VALUES 
				('','$pegawai_id','$nama_berkas','$jenis_berkas','$tgl_berkas','$uraian_berkas','$berkas_dir')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Tambah Data Berkas Pegawai
if (isset($_POST["simpan"])) {
    if (tambah_berkas($_POST) > 0) {
        $_SESSION['status'] = "Data Berkas";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Ditambahkan!";
        header("Location: ../berkas-staf-pegawai.php");
    } else {
        $_SESSION['status'] = "Data Berkas";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Ditambahkan!";
        header("Location: ../berkas-staf-pegawai.php");
    }
}
