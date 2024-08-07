<div class="row mt-4">
    <?php
    include '../functions.php';

    $pegawaiID = $_GET['pegawai_id'];
    $query = $_GET['query'];

        $sqlDataBerkas = mysqli_query($conn, "SELECT * FROM tb_berkas
                                                        INNER JOIN tb_pegawai
                                                        ON tb_berkas.pegawai_id = tb_pegawai.pegawai_id
                                                        INNER JOIN tb_validasi_berkas
                                                        ON tb_validasi_berkas.berkas_id = tb_berkas.berkas_id
                                                        WHERE tb_pegawai.pegawai_id = $pegawaiID
                                                        AND tb_berkas.nama_berkas LIKE '%$query%'");

                if (mysqli_num_rows($sqlDataBerkas) > 0) {
                    while($row = mysqli_fetch_assoc($sqlDataBerkas)){
                        $cardBackground = $row["status"] == 1 ? 'style="background-color: #D2A9A4!important;"' : '';
            ?>
                <div class="col-2">
                    <div class="card text-center" <?= $cardBackground; ?>>
                        <img src="assets/img/pdf.png" alt="PDF">
                        <div class="card-body">
                            <h3><?= $row["nama_berkas"]; ?></h3>
                            <p><?= $row["tgl_berkas"]; ?></p>
                            <div class="d-flex tombol">
                                <a href="lihat-berkas-pegawai.php?berkas_id=<?= $row["berkas_id"]; ?>" class="badge badge-pill badge-primary mr-1">Lihat</a>
                                <a style="cursor:pointer;" class="badge badge-pill badge-danger ml-1 text-light tolak-berkas" data-berkas-id="<?= $row["berkas_id"]; ?>" data-admin-id="<?= $admin["admin_id"]; ?>" data-pegawai-id="<?= $row["pegawai_id"]; ?>">Tolak</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                    }
                } else { 
            ?>
        </div>
    <div class="row text-center mt-4">
        <h2>Berkas Belum Tersedia!</h2>
    </div>
    <?php
}
?>
