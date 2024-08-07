<?php
session_start();
date_default_timezone_set('Asia/Ujung_Pandang');
require '../functions.php';

function tambah_surat($data)
{
    global $conn;

    // Detail Data Surat
    $pegawai_id = htmlspecialchars($data['pegawai_id']);
    $tahun_surat = htmlspecialchars($data['tahun_surat']);
    $bidang = htmlspecialchars($data['bidang']);
    $perihal_surat = htmlspecialchars($data['perihal_surat']);
    $tgl_surat = htmlspecialchars($data['tgl_surat']);
    $tgl_surat_masuk = "";
    $no_surat = htmlspecialchars($data['no_surat']);
    $uraian_surat = htmlspecialchars($data['uraian_surat']);
    $tipe_surat = "Surat Keputusan";

    // Data File atau Gambar Surat
    $surat_dir = DocSurat($perihal_surat, $bidang);

    $query = "INSERT INTO tb_surat
                VALUES 
				('','$pegawai_id','$tahun_surat','$bidang','$perihal_surat','$tgl_surat','$tgl_surat_masuk','$no_surat','$uraian_surat','$surat_dir','$tipe_surat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Tambah Data Surat
if (isset($_POST["simpan"])) {
    if (tambah_surat($_POST) > 0) {
        $_SESSION['status'] = "Data Surat Keputusan";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil Ditambahkan!";
        header("Location: ../surat-keputusan.php");
    } else {
        $_SESSION['status'] = "Data Surat Keputusan";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal Ditambahkan!";
        header("Location: ../surat-keputusan.php");
    }
}
