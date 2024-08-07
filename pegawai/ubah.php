<?php
session_start();
require '../functions.php';

function ubah_pegawai($data)
{
    global $conn;
    $pegawai_id = $data["pegawai_id"];

    $jabatan_id = htmlspecialchars($data['jabatan_id']);
    $nama_lengkap = htmlspecialchars($data['nama_lengkap']);
    $nip_pegawai = htmlspecialchars($data['nip_pegawai']);
    $tmp_lahir_pegawai = htmlspecialchars($data['tmp_lahir_pegawai']);
    $tgl_lahir_pegawai = htmlspecialchars($data['tgl_lahir_pegawai']);
    $agama_pegawai = htmlspecialchars($data['agama_pegawai']);
    $status_perkawinan = htmlspecialchars($data['status_perkawinan']);
    $alamat_pegawai = htmlspecialchars($data['alamat_pegawai']);
    $no_hp_pegawai = htmlspecialchars($data['no_hp_pegawai']);
    $pangkat_pegawai = htmlspecialchars($data['pangkat_pegawai']);
    $pendidikan_terakhir = htmlspecialchars($data['pendidikan_terakhir']);
    $npwp_pegawai = htmlspecialchars($data['npwp_pegawai']);
    $ktp_pegawai = htmlspecialchars($data['ktp_pegawai']);
    $kapreg_pegawai = htmlspecialchars($data['kapreg_pegawai']);
    $email_pegawai = htmlspecialchars($data['email_pegawai']);
    $unit_organisasi = htmlspecialchars($data['unit_organisasi']);
    $unit_kerja = htmlspecialchars($data['unit_kerja']);
    $nama_suami_istri = htmlspecialchars($data['nama_suami_istri']);
    $pekerjaan = htmlspecialchars($data['pekerjaan']);
    $nip_suami_istri = htmlspecialchars($data['nip_suami_istri']);
    
    $query = "UPDATE tb_pegawai
            SET
            jabatan_id = '$jabatan_id',
            nama_lengkap = '$nama_lengkap',
            nip_pegawai = '$nip_pegawai',
            tmp_lahir_pegawai = '$tmp_lahir_pegawai',
            tgl_lahir_pegawai = '$tgl_lahir_pegawai',
            agama_pegawai = '$agama_pegawai',
            status_perkawinan = '$status_perkawinan',
            alamat_pegawai = '$alamat_pegawai',
            no_hp_pegawai = '$no_hp_pegawai',
            pangkat_pegawai = '$pangkat_pegawai',
            pendidikan_terakhir = '$pendidikan_terakhir',
            npwp_pegawai = '$npwp_pegawai',
            ktp_pegawai = '$ktp_pegawai',
            kapreg_pegawai = '$kapreg_pegawai',
            email_pegawai = '$email_pegawai',
            unit_organisasi = '$unit_organisasi',
            unit_kerja = '$unit_kerja',
            nama_suami_istri = '$nama_suami_istri',
            pekerjaan = '$pekerjaan',
            nip_suami_istri = '$nip_suami_istri'
            WHERE pegawai_id = $pegawai_id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


if (isset($_POST["ubah"])) {
    $nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
    if (ubah_pegawai($_POST) > 0) {
        $_SESSION['status'] = "Data Pegawai " . $nama_lengkap;
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil DiUbah!";
        header("Location: ../biodata.php");
    } else {
        $_SESSION['status'] = "Data Pegawai";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal DiUbah!";
        header("Location: ../biodata.php");
    }
}
