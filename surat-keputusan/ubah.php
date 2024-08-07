<?php
session_start();
require '../functions.php';

function ubah_surat($data)
{
    global $conn;

    // Detail Data Surat
    $surat_id = htmlspecialchars($data['surat_id']);
    $tahun_surat = htmlspecialchars($data['tahun_surat']);
    $bidang = htmlspecialchars($data['bidang']);
    $perihal_surat = htmlspecialchars($data['perihal_surat']);
    $tgl_surat = htmlspecialchars($data['tgl_surat']);
    $no_surat = htmlspecialchars($data['no_surat']);
    $uraian_surat = htmlspecialchars($data['uraian_surat']);
    $surat_dir_lama = htmlspecialchars($data['surat_dir_lama']);

    // Data File atau Gambar Surat
    if ($_FILES['surat']['error'] === UPLOAD_ERR_NO_FILE) {
        // Jika tidak ada file baru yang diunggah, gunakan surat_dir_lama
        $surat_dir = $surat_dir_lama;
    } else {
        // Hapus file lama
        if (file_exists('document/' . $surat_dir_lama)) {
            unlink('document/' . $surat_dir_lama);
        }
        // Proses upload file baru
        $surat_dir = DocSurat($perihal_surat, $bidang);
    }

    $query = "UPDATE tb_surat
            SET
            tahun_surat = '$tahun_surat',
            bidang = '$bidang',
            perihal_surat = '$perihal_surat',
            tgl_surat = '$tgl_surat',
            no_surat = '$no_surat',
            uraian_surat = '$uraian_surat',
            surat_dir = '$surat_dir'
            WHERE surat_id = $surat_id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

if (isset($_POST["ubah"])) {
    if (ubah_surat($_POST) > 0) {
        $_SESSION['status'] = "Data Surat Keputusan";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil DiUbah!";
        header("Location: ../surat-keputusan.php");
    } else {
        $_SESSION['status'] = "Data Surat Keputusan";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal DiUbah!";
        header("Location: ../surat-keputusan.php");
    }
}
?>
