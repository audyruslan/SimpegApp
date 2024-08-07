  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
      <a class="navbar-brand" href="home.php">
        <img src="assets/img/logo.png" alt="Logo">
      </a>
      <span class="navbar-text">
        Sistem Informasi Kepegawaian versi 2.0 Dinas Tanaman Pangan dan Hortikultura Provinsi Sulawesi Tengah, Kota Palu
      </span>
      <?php 
        if($_SESSION["level"] == 1){
      ?>
      <div class="ml-auto">
        <div class="user-name">
          <h5><strong><?= $admin["nama_lengkap"]; ?></strong></h5>
          <p><?= $role["role"]; ?></p>
        </div>
        <img src="admin/image/<?= $admin["img_dir"]; ?>" class="user-profile" alt="User Image">
        <img src="assets/img/arrow_down.png" class="user-menu" alt="">
      </div>
      <?php }else{ ?>
        <div class="ml-auto">
        <div class="user-name">
          <h5><strong><?= $pegawai["nama_lengkap"]; ?></strong></h5>
          <p><?= $role["role"]; ?></p>
        </div>
        <img src="pegawai/image/<?= $pegawai["img_dir"]; ?>" class="user-profile" alt="User Image">
        <img src="assets/img/arrow_down.png" class="user-menu" alt="">
      </div>
      <?php } ?>
  </nav>