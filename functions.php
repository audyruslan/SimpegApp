<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_simpeg");

// Upload Document Berkas
function DocBerkas($nama_berkas, $jenis_berkas)
{
    $namaFile = $_FILES['berkas']['name'];
    $tmpName = $_FILES['berkas']['tmp_name'];

    $ext = pathinfo($namaFile, PATHINFO_EXTENSION);

    $namaFileBaru = $nama_berkas . '_' . $jenis_berkas . '.' . $ext;

    move_uploaded_file($tmpName, 'document/' . $namaFileBaru);

    return $namaFileBaru;
}

// Upload Document Surat
function DocSurat($perihal_surat, $bidang)
{
    $namaFile = $_FILES['surat']['name'];
    $tmpName = $_FILES['surat']['tmp_name'];

    $ext = pathinfo($namaFile, PATHINFO_EXTENSION);

    $namaFileBaru = $perihal_surat . '_' . $bidang . '.' . $ext;

    move_uploaded_file($tmpName, 'document/' . $namaFileBaru);

    return $namaFileBaru;
}


// Upload File Gambar
function uploadImage()
{
    $namaFile = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmpName, 'image/' . $namaFile);

    return $namaFile;
}

// buat Avatar Pegawai
function avatarPegawai($character)
{
    $image_name = time() . ".png";
    $path = "pegawai/image/" . $image_name;
    $image = imagecreate(200, 200);
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);
    imagecolorallocate($image, $red, $green, $blue);
    $textcolor = imagecolorallocate($image, 255, 255, 255);

    $font = dirname(__FILE__) . "/assets/font/arial.ttf";

    imagettftext($image, 100, 0, 55, 150, $textcolor, $font, $character);
    imagepng($image, $path);
    imagedestroy($image);

    return $image_name;
}

// buat Avatar Admin
function avatarAdmin($character)
{
    $image_name = time() . ".png";
    $path = "admin/image/" . $image_name;
    $image = imagecreate(200, 200);
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);
    imagecolorallocate($image, $red, $green, $blue);
    $textcolor = imagecolorallocate($image, 255, 255, 255);

    $font = dirname(__FILE__) . "/assets/font/arial.ttf";

    imagettftext($image, 100, 0, 55, 150, $textcolor, $font, $character);
    imagepng($image, $path);
    imagedestroy($image);

    return $image_name;
}


// Format Tanggal ID
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function waktu($waktu)
{
    //ubah timezone 
    date_default_timezone_set('Asia/Ujung_Pandang');

    //ambil jam dan menit
    $jam = date('H:s', strtotime($waktu));

    //atur salam menggunakan IF
    if ($jam > '05:30' && $jam < '10:00') {
        $salam = 'Pagi';
    } elseif ($jam >= '10:00' && $jam < '15:00') {
        $salam = 'Siang';
    } elseif ($jam < '18:00') {
        $salam = 'Sore';
    } else {
        $salam = 'Malam';
    }

    //tampilkan pesan
    return $waktu . " " .  $salam;
}

function selisih_waktu($waktu)
{
    //ubah timezone 
    date_default_timezone_set('Asia/Ujung_Pandang');

    //hitung selisih waktu
    $waktu_sekarang = time();
    $waktu_dibuat = strtotime($waktu);
    $selisih_detik = $waktu_sekarang - $waktu_dibuat;

    //hitung detik, menit, jam, hari, bulan, tahun lalu
    $detik = $selisih_detik;
    $menit = floor($detik / 60);
    $jam = floor($menit / 60);
    $hari = floor($jam / 24);
    $bulan = floor($hari / 30);
    $tahun = floor($bulan / 12);

    //tampilkan pesan
    if ($tahun > 0) {
        return $tahun . " tahun yang lalu";
    } elseif ($bulan > 0) {
        return $bulan . " bulan yang lalu";
    } elseif ($hari > 0) {
        return $hari . " hari yang lalu";
    } elseif ($jam > 0) {
        return $jam . " jam yang lalu";
    } elseif ($menit > 0) {
        return $menit . " menit yang lalu";
    } else {
        return $detik . " detik yang lalu";
    }
}
