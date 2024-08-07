<?php 
    $title = "Detail Berkas Pegawai";
    $menu = "Detail Berkas Pegawai";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';

    $pegawaiID = $_GET["pegawai_id"];
    $sqlDataPegawai = mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE pegawai_id = '$pegawaiID'");
    $dataBerkas = mysqli_fetch_assoc($sqlDataPegawai);
?>

<main role="main" class="col-md-10 ml-sm-auto col-lg-10 main-content">

       <section id="detailBerkas" data-pegawai-id="<?= $dataBerkas["pegawai_id"]; ?>">
            <div class="row box-cari">
                <div class="col-12">
                    <div class="d-flex justify-content-between">
                        <h2><?= $dataBerkas["nama_lengkap"]; ?></h2>
                        <input type="text" class="form-control col-3"  id="dataBerkasPegawai" placeholder="Cari Pegawai...">
                    </div>
                </div>
            </div>

            <div id="berkasPegawaiList">
                <div class="row mt-4">
                    <?php 
                        $sqlDataBerkas = mysqli_query($conn, "SELECT * FROM tb_berkas
                                                                INNER JOIN tb_pegawai
                                                                ON tb_berkas.pegawai_id = tb_pegawai.pegawai_id
                                                                INNER JOIN tb_validasi_berkas
                                                                ON tb_validasi_berkas.berkas_id = tb_berkas.berkas_id
                                                                WHERE tb_pegawai.pegawai_id = '$pegawaiID'");

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
                        <h5>Data Berkas <?= $dataBerkas["nama_lengkap"]; ?> Belum Tersedia!</h5>
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
