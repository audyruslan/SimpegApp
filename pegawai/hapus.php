<?php
session_start();
require '../functions.php';

$pegawai_id = $_GET["pegawai_id"];

// Hapus Data Image Pegawai
function hapus_pegawai($pegawai_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM tb_pegawai WHERE pegawai_id = '$pegawai_id'");
    return mysqli_affected_rows($conn);
}

// Ambil Image berdasarkan ID Pegawai
function getIMGPegawai($pegawai_id)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT img_dir FROM tb_pegawai WHERE pegawai_id = '$pegawai_id'");
    $row = mysqli_fetch_assoc($result);
    return $row['img_dir'];
}

$nama_file = getIMGPegawai($pegawai_id);

// Hapus Data Image Pegawai
if (hapus_pegawai($pegawai_id) > 0) {

    // Hapus Image Image dari direktori
    $file_path_doc = "image/" . $nama_file;
    if (file_exists($file_path_doc)) {
        unlink($file_path_doc);
    }

    $_SESSION['status'] = "Data Pegawai";
    $_SESSION['status_icon'] = "success";
    $_SESSION['status_info'] = "Berhasil DiHapus!";
    header("Location: ../home.php");
} else {
    $_SESSION['status'] = "Data Pegawai";
    $_SESSION['status_icon'] = "error";
    $_SESSION['status_info'] = "Gagal DiHapus!";
    header("Location: ../home.php");
}
