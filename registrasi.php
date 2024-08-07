<?php
session_start();
require 'functions.php';

if (isset($_POST["daftar"])) {

  $nama_lengkap = $_POST["nama_lengkap"];
  $nip_pegawai = $_POST["nip_pegawai"];
  $password = $_POST["password"];
  $konfirmasi_password = $_POST["konfirmasi_password"];
  $role = 3;
  $img_dir = avatarPegawai(strtoupper($_POST["nama_lengkap"][0]));

  // Periksa apakah NIP sudah ada di database
  $result = mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE nip_pegawai = '$nip_pegawai'");

  if (mysqli_num_rows($result) > 0) {
      // NIP sudah terdaftar
      $_SESSION['error'] = "<strong>Akun Sudah Terdaftar!</strong>";
  } else {
      // Periksa kesesuaian password dengan konfirmasi password
      if ($password !== $konfirmasi_password) {
          $_SESSION['error'] = "<strong>Password dan Konfirmasi Password tidak sesuai!</strong>";
          $_SESSION['nama_lengkap'] = $nama_lengkap;
          $_SESSION['nip_pegawai'] = $nip_pegawai;
      } else {
          // Enkripsi password
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);

          // Tambahkan data ke dalam tabel
          $insert_query = "INSERT INTO tb_pegawai (role_id, nama_lengkap, nip_pegawai, password_pegawai, img_dir) VALUES ('$role', '$nama_lengkap', '$nip_pegawai', '$hashed_password', '$img_dir')";
          
          if (mysqli_query($conn, $insert_query)) {
              $_SESSION['success'] = "<strong>Registrasi berhasil, Silahkan Login!</strong>";
              $_SESSION['login_nip'] = $nip_pegawai;
              $_SESSION['login_password'] = $password;
              header('Location: index.php');
          } else {
              $_SESSION['error'] = "<strong>Gagal menambahkan data!</strong>";
          }
      }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/sign-in.css">

    <title>Daftar Pegawai | SIMPEG DISTPH VERSI 2.0</title>
  </head>
  <body class="bg-custom">
    <div class="container d-flex flex-column justify-content-center align-items-center">
      <div class="card register-card">
        <div class="row">
          <div class="col-md-12">
            <div class="card-body register-form">
              <div class="form-title">Form Daftar</div>
              <?php if (isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $_SESSION['error'];  ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php unset($_SESSION['error']); ?>
              <?php } ?>
              <form id="quickForm" method="POST">
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap'] : ''; ?>" placeholder="Nama Lengkap" autocomplete="off">
                <input type="text" class="form-control" id="nip_pegawai" name="nip_pegawai" value="<?php echo isset($_SESSION['nip_pegawai']) ? $_SESSION['nip_pegawai'] : ''; ?>" placeholder="NIP" autocomplete="off">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off"> 
                <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Password" autocomplete="off">
                <button type="submit" class="btn btn-lg text-white" name="daftar">Daftar</button>
              </form>
              <a href="index.php" class="text-dark daftar"><strong>Login</strong></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  <!-- jquery-validation -->
  <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="plugins/jquery-validation/additional-methods.min.js"></script>
  <script>
        $(function () {
          $.validator.setDefaults({
            submitHandler: function () {
              alert( "Form successful submitted!" );
            }
          });
          $('#quickForm').validate({
            rules: {
              nama_lengkap: {
                required: true,
                nama_lengkap: true,
              },
              nip_pegawai: {
                required: true,
                nip_pegawai: true,
              },
              password: {
                required: true,
              }
            },
            messages: {
              nama_lengkap: {
                required: "Form Nama Lengkap Tidak Boleh Kosong!",
              },
              nip_pegawai: {
                required: "Form NIP Tidak Boleh Kosong!",
              },
              password: {
                required: "Password Tidak Boleh Kosong!",
              }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
            }
          });
        });
  </script>
  </body>
</html>
