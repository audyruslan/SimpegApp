<?php 
    $title = "Berkas Pegawai";
    $menu = "Berkas Pegawai";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';
    
    $pegawaiID = $pegawai["pegawai_id"];
?>

<main role="main" class="col-md-10 ml-sm-auto col-lg-10 main-content">

    <section id="berkasStaf" data-pegawai-id="<?= $pegawai["pegawai_id"]; ?>">
        <div class="row box-cari">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <a class="btn btn-tambah" href="tambah-berkas-pegawai.php"><i class="fas fa-plus"></i> Berkas</a>
                    <input type="text" class="form-control col-3" id="namaBerkasPegawai" placeholder="Cari Berkas...">
                </div>
            </div>
        </div>

        <div id="berkasList">
            <div class="row mt-4">
                    <?php 
                        $sqlBerkas = mysqli_query($conn, "SELECT * FROM tb_berkas
                                                        INNER JOIN tb_pegawai
                                                        ON tb_berkas.pegawai_id = tb_pegawai.pegawai_id
                                                        INNER JOIN tb_validasi_berkas
                                                        ON tb_validasi_berkas.berkas_id = tb_berkas.berkas_id
                                                        WHERE tb_berkas.pegawai_id = $pegawaiID");
                        if (mysqli_num_rows($sqlBerkas) > 0) {
                            while($berkas = mysqli_fetch_assoc($sqlBerkas)) {
                                $cardBackground = $berkas["status"] == 1 ? 'style="background-color: #D2A9A4!important;"' : '';
                    ?>
                        <div class="col-2">
                            <div class="card text-center" <?= $cardBackground; ?>>
                                <img src="assets/img/pdf.png" alt="PDF">
                                <div class="card-body">
                                    <h3><?= $berkas["nama_berkas"]; ?></h3>
                                    <p><?= tgl_indo($berkas["tgl_berkas"]); ?></p>
                                    <div class="d-flex tombol">
                                        <a href="lihat-berkas-pegawai.php?berkas_id=<?= $berkas["berkas_id"]; ?>" class="badge badge-pill badge-primary mr-1">Lihat</a>
                                        <a href="berkas/hapus.php?berkas_id=<?= $berkas["berkas_id"]; ?>" class="badge badge-pill badge-danger ml-1 hapus_berkas_pegawai">Hapus</a>
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
            </div>
        </div>
    </section>
</main>

<?php 
    require 'layouts/footer.php';
?>
