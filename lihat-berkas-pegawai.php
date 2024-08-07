<?php 
    $title = "Lihat Berkas Pegawai";
    $menu = "Lihat Berkas Pegawai";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';

    // Get Data Berkas Pegawai
    $berkasID = $_GET["berkas_id"];
    $sqlBerkas = mysqli_query($conn, "SELECT * FROM tb_berkas WHERE berkas_id = $berkasID");
    $berkas = mysqli_fetch_assoc($sqlBerkas);
?>

<main role="main" class="col-md-10 ml-sm-auto col-lg-10 main-content">
    <div class="row">
        <div class="col-lg-12">
            <div id="accordion">
                <div class="card">
                    <div class="card-header d-flex justify-content-between" id="headingOne">
                        <p class="mb-0 text-light">
                            Data Berkas
                        </p>
                        <button class="badge badge-pill badge-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Tutup
                        </button>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body form-input">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="nama_berkas">Nama Berkas</label>
                                        <input type="input" class="form-control" id="nama_berkas" name="nama_berkas" value="<?= $berkas["nama_berkas"]; ?>" placeholder="Nama Berkas" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_berkas">Jenis Berkas</label>
                                        <select class="form-control" name="jenis_berkas" id="jenis_berkas" autocomplete="off">
                                            <option value="">Pilih Jenis Berkas</option>
                                            <option value="Dokumen" <?= ($berkas["jenis_berkas"] == "Dokumen") ? "selected" : ""; ?>>Dokumen</option>
                                            <option value="Gambar" <?= ($berkas["jenis_berkas"] == "Gambar") ? "selected" : ""; ?>>Gambar</option>
                                            <option value="Lampiran" <?= ($berkas["jenis_berkas"] == "Lampiran") ? "selected" : ""; ?>>Lampiran</option>
                                            <option value="Foto" <?= ($berkas["jenis_berkas"] == "Foto") ? "selected" : ""; ?>>Foto</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="uraian_berkas">Uraian</label>
                                        <textarea class="form-control" name="uraian_berkas" id="uraian_berkas" placeholder="Uraian" autocomplete="off"><?= $berkas["uraian_berkas"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="drop-zone">
                                        <img id="previewImage" class="drop-zone__image" style="display: none; width: 100%; height: auto;">
                                        <embed id="previewFile" class="drop-zone__pdf" type="application/pdf" src="berkas/document/<?= $berkas["berkas_dir"]; ?>" style="width: 100%; height: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
    require 'layouts/footer.php';
?>