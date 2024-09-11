<?php
session_start();
require '../functions.php';

function ubah_akun($data)
{
    global $conn;
    $pegawai_id = $data["pegawai_id"];

    $role_id = htmlspecialchars($data['role_id']);
    $nip_pegawai = htmlspecialchars($data['nip_pegawai']);
    $password = htmlspecialchars($data['password']);

      // Cek apakah password diisi
    if (!empty($password)) {
        // Enkripsi password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE tb_pegawai
                  SET role_id = '$role_id',
                      nip_pegawai = '$nip_pegawai',
                      password_pegawai = '$hashed_password'
                  WHERE pegawai_id = $pegawai_id";
    } else {
        // Jika password kosong, jangan update password
        $query = "UPDATE tb_pegawai
                  SET role_id = '$role_id',
                      nip_pegawai = '$nip_pegawai'
                  WHERE pegawai_id = $pegawai_id";
    }

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


if (isset($_POST["ubah_akun"])) {
    if (ubah_akun($_POST) > 0) {
        $_SESSION['status'] = "Data Akun Pegawai";
        $_SESSION['status_icon'] = "success";
        $_SESSION['status_info'] = "Berhasil DiUbah!";
        header("Location: ../home.php");
    } else {
        $_SESSION['status'] = "Data Akun Pegawai";
        $_SESSION['status_icon'] = "error";
        $_SESSION['status_info'] = "Gagal DiUbah!";
        header("Location: ../home.php");
    }
}