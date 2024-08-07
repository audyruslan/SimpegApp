<?php
session_start();
require '../functions.php';

$berkas_id = $_GET["berkas_id"];

// Hapus Data Berkas Pegawai
function hapus_berkas($berkas_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_berkas WHERE berkas_id = '$berkas_id'");
    return mysqli_affected_rows($conn);
}

// Ambil Document Berkas berdasarkan ID Berkas
function getDocBerkas($berkas_id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT berkas_dir FROM tb_berkas WHERE berkas_id = '$berkas_id'");
    $row = mysqli_fetch_assoc($result);
    return $row['berkas_dir'];
}

$nama_file = getDocBerkas($berkas_id);

// Hapus Data Berkas Pegawai
if (hapus_berkas($berkas_id) > 0) {
    // Hapus Dokumen Berkas dari direktori
    $file_path_image = $nama_image;
    if (file_exists($file_path_image)) {
        unlink($file_path_image);
    }

    // Hapus Document Berkas dari direktori
    $file_path_doc = "document/" . $nama_file;
    if (file_exists($file_path_doc)) {
        unlink($file_path_doc);
    }

    $_SESSION['status'] = "Berkas Pegawai";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil DiHapus!";
    header("Location: ../berkas-staf-pegawai.php");
} else {
    $_SESSION['status'] = "Berkas Pegawai";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal DiHapus!";
    header("Location: ../berkas-staf-pegawai.php");
}
