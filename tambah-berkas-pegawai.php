<?php 
    $title = "Tambah Berkas Pegawai";
    $menu = "Tambah Berkas Pegawai";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';
?>

<main role="main" class="col-md-10 ml-sm-auto col-lg-10 main-content">
    <div class="row">
        <div class="col-lg-12">
            <div id="accordion">
                <div class="card">
                    <div class="card-header d-flex justify-content-between" id="headingOne">
                        <p class="mb-0 text-light">
                            Data Berkas Pegawai
                        </p>
                        <button class="badge badge-pill badge-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Tutup
                        </button>
                    </div>
                    <div id="collapseOne" class="collapse <?php if ($menu == "Tambah Berkas Pegawai") echo "show"; ?>" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body form-input">
                            <form id="berkasForm" action="berkas/tambah.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="pegawai_id" value="<?= $pegawai["pegawai_id"]; ?>">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="nama_berkas">Nama Berkas</label>
                                            <input type="input" class="form-control" id="nama_berkas" name="nama_berkas" placeholder="Nama Berkas" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_berkas">Jenis Berkas</label>
                                            <select class="form-control" name="jenis_berkas" id="jenis_berkas" autocomplete="off">
                                                <option value="">Pilih Jenis Berkas</option>
                                                <option value="Dokumen">Dokumen</option>
                                                <option value="Gambar">Gambar</option>
                                                <option value="Lampiran">Lampiran</option>
                                                <option value="Foto">Foto</option>
                                                <option value="Lampiran">Lampiran</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="uraian_berkas">Uraian</label>
                                            <textarea class="form-control" name="uraian_berkas" id="uraian_berkas" placeholder="Uraian" autocomplete="off"></textarea>
                                        </div>
                                        <div class="d-flex justify-content-end mt-3">
                                            <input type="file" id="fileInput" name="berkas" accept="application/pdf,image/*" style="display: none;" onchange="previewFile()">
                                            <button type="submit" class="btn btn-sm btn-primary mr-2" name="simpan">Simpan</button>
                                            <button type="button" class="btn btn-sm btn-light" onclick="document.getElementById('fileInput').click();">Pilih File</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="drop-zone">
                                            <span id="previewName" class="drop-zone__prompt">Preview berkas</span>
                                            <img id="previewImage" class="drop-zone__image" style="display: none; width: 100%; height: auto;">
                                            <embed id="previewFile" class="drop-zone__pdf" type="application/pdf" style="display: none; width: 100%; height: 100%;">
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