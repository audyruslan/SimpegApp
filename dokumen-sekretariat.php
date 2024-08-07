<?php 
    $title = "Dokumen Sekretariat";
    $menu = "Dokumen Sekretariat";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">
        <div class="row judul">
            <div class="col-12">
                <h2>Dokumen Administrasi Bidang Sekertariat</h2>
            </div>
        </div>

        <div class="row mt-3">
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
                                Surat Masuk
                            </p>
                            <div class="pencarian-berkas d-flex">
                                <select class="form-control select-cari mr-2" id="exampleFormControlSelect1">
                                    <option>Pilih Tahun</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <select class="form-control select-cari mr-2" id="exampleFormControlSelect1">
                                    <option>Pilih Bulan</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <button class="btn btn-sm rounded tombol-cari mr-3">Cari</button>
                                <input type="text" class="form-control col-4 form-cari mr-5" id="nip" placeholder="Cari Berkas...">
                                <button class="badge badge-pill badge-light" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Tutup
                                </button>
                            </div>
                        </div>
                      <div id="collapseOne" class="collapse<?php if ($menu == "Dokumen Sekretariat") echo "show"; ?>" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div id="berkasPegawai" class="row">
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                        <h3>Nama Berkas</h3>
                                        <p>Tanggal Upload</p>
                                        <div class="d-flex tombol">
                                            <span class="badge badge-pill badge-primary mr-1">Lihat</span>
                                            <span class="badge badge-pill badge-dark ml-1">Cetak</span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                        <h3>Nama Berkas</h3>
                                        <p>Tanggal Upload</p>
                                        <div class="d-flex tombol">
                                            <span class="badge badge-pill badge-primary mr-1">Lihat</span>
                                            <span class="badge badge-pill badge-dark ml-1">Cetak</span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                        <h3>Nama Berkas</h3>
                                        <p>Tanggal Upload</p>
                                        <div class="d-flex tombol">
                                            <span class="badge badge-pill badge-primary mr-1">Lihat</span>
                                            <span class="badge badge-pill badge-dark ml-1">Cetak</span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                        <h3>Nama Berkas</h3>
                                        <p>Tanggal Upload</p>
                                        <div class="d-flex tombol">
                                            <span class="badge badge-pill badge-primary mr-1">Lihat</span>
                                            <span class="badge badge-pill badge-dark ml-1">Cetak</span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                        <h3>Nama Berkas</h3>
                                        <p>Tanggal Upload</p>
                                        <div class="d-flex tombol">
                                            <span class="badge badge-pill badge-primary mr-1">Lihat</span>
                                            <span class="badge badge-pill badge-dark ml-1">Cetak</span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="card text-center">
                                        <img src="assets/img/pdf.png" alt="PDF">
                                        <div class="card-body">
                                        <h3>Nama Berkas</h3>
                                        <p>Tanggal Upload</p>
                                        <div class="d-flex tombol">
                                            <span class="badge badge-pill badge-primary mr-1">Lihat</span>
                                            <span class="badge badge-pill badge-dark ml-1">Cetak</span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header d-flex justify-content-between" id="headingTwo">
                        <p class="mb-0 text-light">
                            Surat Keluar
                        </p>
                        <button class="badge badge-pill badge-light collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Lihat
                          </button>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                          Isi Surat Keluar
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header d-flex justify-content-between" id="headingThree">
                        <p class="mb-0 text-light">
                            Surat Keputusan
                        </p>
                        <button class="badge badge-pill badge-light collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Lihat
                          </button>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                          Isi Surat Keputusan
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