<?php
include '../functions.php';

$query = $_GET['query'];

$no = 1;
$sqlPegawai = mysqli_query($conn, "SELECT * FROM tb_pegawai
                                    INNER JOIN tb_jabatan
                                    ON tb_pegawai.jabatan_id = tb_jabatan.jabatan_id
                                    WHERE tb_pegawai.nama_lengkap LIKE '%$query%'");

if ($sqlPegawai && mysqli_num_rows($sqlPegawai) > 0) {
    while($row = mysqli_fetch_assoc($sqlPegawai)){
?>
<tr>
    <td><?= $no++; ?>.</td>
    <td><?= $row["nama_lengkap"]; ?></td>
    <td><?= $row["nama_jabatan"]; ?></td>
    <td><?= $row["nip_pegawai"]; ?></td>
    <td>
        <a href="detail-berkas-pegawai.php?pegawai_id=<?= $row["pegawai_id"]; ?>" class="badge badge-pill badge-primary">Lihat Berkas</a>
    </td>
</tr>
<?php
    }
} else {
    ?>
    <tr>
        <td colspan="6" class="text-center">Maaf Data Pegawai Tidak Tersedia!</td>
    </tr>
<?php
}
?>
