<?php 
    $title = "Tambah Surat Keputusan";
    $menu = "Tambah Surat Keputusan";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">

  <?php require_once 'layouts/data-surat.php'; ?>

    <div class="row mt-2">
        <div class="col-lg-12">
            <div id="accordion">
                <div class="card">
                    <div class="card-header d-flex justify-content-between" id="headingOne">
                        <p class="mb-0 text-light">
                            Data Baru Surat Keputusan
                        </p>
                        <button class="badge badge-pill badge-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Tutup
                        </button>
                    </div>
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body form-input">
                        <form id="berkasForm" action="surat-keputusan/tambah.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="pegawai_id" value="<?= $pegawai["pegawai_id"]; ?>">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="tahun_surat">Tahun</label>
                                        <select class="form-control" name="tahun_surat" id="tahun_surat" required>
                                            <option value="">Pilih Tahun</option>
                                            <?php 
                                                $tahunSekarang = date("Y");
                                                for($tahun = 2020; $tahun <= $tahunSekarang; $tahun++){
                                            ?>
                                            <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="bidang">Bidang</label>
                                        <select class="form-control" name="bidang" id="bidang" required>
                                          <option value="">Pilih Bidang</option>
                                          <option value="Bidang Sekretariat" <?= ($pegawai["bidang"] == "Bidang Sekretariat") ? "selected" : ""; ?>>Bidang Sekretariat</option>
                                          <option value="Bidang PSP" <?= ($pegawai["bidang"] == "Bidang PSP") ? "selected" : ""; ?>>Bidang PSP</option>
                                          <option value="Bidang Tanaman Pangan" <?= ($pegawai["bidang"] == "Bidang Tanaman Pangan") ? "selected" : ""; ?>>Bidang Tanaman Pangan</option>
                                          <option value="Bidang Hortikultura" <?= ($pegawai["bidang"] == "Bidang Hortikultura") ? "selected" : ""; ?>>Bidang Hortikultura</option>
                                          <option value="Bidang Penyuluhan" <?= ($pegawai["bidang"] == "Bidang Penyuluhan") ? "selected" : ""; ?>>Bidang Penyuluhan</option>
                                          <option value="UPT Proteksi" <?= ($pegawai["bidang"] == "UPT Proteksi") ? "selected" : ""; ?>>UPT Proteksi</option>
                                          <option value="UPT PMSB" <?= ($pegawai["bidang"] == "UPT PMSB") ? "selected" : ""; ?>>UPT PMSB</option>
                                          <option value="UPT Pemberitaan" <?= ($pegawai["bidang"] == "UPT Pemberitaan") ? "selected" : ""; ?>>UPT Pemberitaan</option>
                                          <option value="UPT Diklat" <?= ($pegawai["bidang"] == "UPT Diklat") ? "selected" : ""; ?>>UPT Diklat</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="perihal_surat">Perihal Surat</label>
                                        <input type="text" class="form-control" id="perihal_surat" name="perihal_surat" placeholder="Perihal Surat" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_surat">Tanggal Surat</label>
                                        <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" placeholder="Tanggal Surat" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_surat">Nomor Surat</label>
                                        <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="No. Surat" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="uraian_surat">Uraian</label>
                                        <textarea class="form-control" name="uraian_surat" id="uraian_surat" autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="drop-zone">
                                        <span id="previewName" class="drop-zone__prompt">Preview surat</span>
                                        <img id="previewImage" class="drop-zone__image" style="display: none; width: 100%; height: auto;">
                                        <embed id="previewFile" class="drop-zone__pdf" type="application/pdf" style="display: none; width: 100%; height: 100%;">
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <input type="file" id="fileInput" name="surat" accept="application/pdf,image/*" style="display: none;" onchange="previewFile()">
                                        <button type="button" class="btn btn-sm btn-light" onclick="document.getElementById('fileInput').click();">Pilih File</button>
                                        <button type="submit" class="btn btn-sm btn-primary mr-2" name="simpan">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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