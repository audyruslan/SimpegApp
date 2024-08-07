<?php 
    $title = "Detail Surat Masuk";
    $menu = "Detail Surat Masuk";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';

    // Get Data Surat
    $suratID = $_GET["surat_id"];
    $sqlSurat = mysqli_query($conn, "SELECT * FROM tb_surat WHERE surat_id = $suratID");
    $surat = mysqli_fetch_assoc($sqlSurat);
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">

        <div class="row">
          <div class="card-col mb-3">
            <div class="card">
              <div class="card-body">
                <p class="card-text">Surat Masuk</p>
                <h2 class="card-title">1.250</h2>
              </div>
            </div>
          </div>
          <div class="card-col mb-3">
            <div class="card">
              <div class="card-body">
                <p class="card-text">Surat Keluar</p>
                <h2 class="card-title">200</h2>
              </div>
            </div>
          </div>
          <div class="card-col mb-3">
            <div class="card">
              <div class="card-body">
                <p class="card-text">Surat Keputusan</p>
                <h2 class="card-title">350</h2>
              </div>
            </div>
          </div>
          <div class="card-col mb-3">
            <div class="card">
              <div class="card-body">
                <p class="card-text">Surat Tugas</p>
                <h2 class="card-title">290</h2>
              </div>
            </div>
          </div>
          <div class="card-col mb-3">
            <div class="card">
              <div class="card-body">
                <p class="card-text">Surat Lainnya</p>
                <h2 class="card-title">20</h2>
              </div>
            </div>
          </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-12">
                <div id="accordion">
                    <div class="card">
                       <div class="card-header d-flex justify-content-between" id="headingOne">
                            <p class="mb-0 text-light">
                                Detail Data Surat Masuk
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
                                        <label for="tahun_surat">Tahun</label>
                                        <select class="form-control" name="tahun_surat" id="tahun_surat" required>
                                            <option value="">Pilih Tahun</option>
                                            <?php 
                                                $tahunSekarang = date("Y");
                                                for($tahun = 2020; $tahun <= $tahunSekarang; $tahun++){
                                            ?>
                                            <option value="<?= $tahun; ?>" <?= ($surat["tahun_surat"] == $tahun) ? "selected" : ""; ?>><?= $tahun; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bidang">Bidang</label>
                                        <select class="form-control" name="bidang" id="bidang" required>
                                            <option value="">Pilih Bidang</option>
                                            <option value="Bidang Sekretariat" <?= ($surat["bidang"] == "Bidang Sekretariat") ? "selected" : ""; ?>>Bidang Sekretariat</option>
                                            <option value="Bidang PSP" <?= ($surat["bidang"] == "Bidang PSP") ? "selected" : ""; ?>>Bidang PSP</option>
                                            <option value="Bidang Tanaman Pangan" <?= ($surat["bidang"] == "Bidang Tanaman Pangan") ? "selected" : ""; ?>>Bidang Tanaman Pangan</option>
                                            <option value="Bidang Hortikultura" <?= ($surat["bidang"] == "Bidang Hortikultura") ? "selected" : ""; ?>>Bidang Hortikultura</option>
                                            <option value="Bidang Penyuluhan" <?= ($surat["bidang"] == "Bidang Penyuluhan") ? "selected" : ""; ?>>Bidang Penyuluhan</option>
                                            <option value="UPT Proteksi" <?= ($surat["bidang"] == "UPT Proteksi") ? "selected" : ""; ?>>UPT Proteksi</option>
                                            <option value="UPT PMSB" <?= ($surat["bidang"] == "UPT PMSB") ? "selected" : ""; ?>>UPT PMSB</option>
                                            <option value="UPT Pemberitaan" <?= ($surat["bidang"] == "UPT Pemberitaan") ? "selected" : ""; ?>>UPT Pemberitaan</option>
                                            <option value="UPT Diklat" <?= ($surat["bidang"] == "UPT Diklat") ? "selected" : ""; ?>>UPT Diklat</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="perihal_surat">Perihal Surat</label>
                                        <input type="text" class="form-control" id="perihal_surat" name="perihal_surat" value="<?= $surat["perihal_surat"]; ?>" placeholder="Perihal Surat" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_surat">Tanggal Surat</label>
                                        <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="<?= $surat["tgl_surat"]; ?>" placeholder="Tanggal Surat" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_surat_masuk">Tanggal Surat Masuk</label>
                                        <input type="date" class="form-control" id="tgl_surat_masuk" name="tgl_surat_masuk" value="<?= $surat["tgl_surat_masuk"]; ?>" placeholder="Tanggal Surat Masuk" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_surat">Nomor Surat</label>
                                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $surat["no_surat"]; ?>" placeholder="No. Surat" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="uraian_surat">Uraian</label>
                                        <textarea class="form-control" name="uraian_surat" id="uraian_surat" placeholder="Uraian Surat" autocomplete="off" required><?= $surat["uraian_surat"]; ?></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="drop-zone">
                                        <embed id="previewSuratFile" class="drop-zone__pdf" src="surat-masuk/document/<?= $surat["surat_dir"]; ?>" type="application/pdf" style="display: <?= strpos($surat["surat_dir"], '.pdf') !== false ? 'block' : 'none'; ?>; width: 100%; height: 100%;">
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <input type="hidden" name="surat_dir_lama" value="<?= $surat["surat_dir"]; ?>">
                                        <input type="file" id="fileInput" name="surat" accept="application/pdf,image/*" style="display: none;" onchange="previewSurat()">
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