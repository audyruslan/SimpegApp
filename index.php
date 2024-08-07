<?php
session_start();
require 'functions.php';

if (isset($_POST["login"])) {
    $username = $_POST["nip_pegawai"];
    $password = $_POST["password"];

    // Cek di tabel admin
    $result_admin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
    if (mysqli_num_rows($result_admin) === 1) {
        // cek password admin
        $row_admin = mysqli_fetch_assoc($result_admin);
        if (password_verify($password, $row_admin["password"])) {
            // set session
            $_SESSION["username"] = $row_admin["username"];
            $_SESSION["level"] = 1; // level admin
            header("Location: home.php");
            exit();
        } else {
            $_SESSION['error'] = "<strong>Password Salah!</strong>";
        }
    } else {
        // Cek di tabel pegawai
        $result_pegawai = mysqli_query($conn, "SELECT * FROM tb_pegawai WHERE nip_pegawai = '$username'");
        if (mysqli_num_rows($result_pegawai) === 1) {
            // cek password pegawai
            $row_pegawai = mysqli_fetch_assoc($result_pegawai);
            if (password_verify($password, $row_pegawai["password_pegawai"])) {
                // set session
                $_SESSION["nip_pegawai"] = $row_pegawai["nip_pegawai"];
                $_SESSION["level"] = $row_pegawai["role_id"];
                if ($row_pegawai["role_id"] == 2) {
                    header("Location: home.php");
                } elseif ($row_pegawai["role_id"] == 3) {
                    header("Location: biodata.php");
                }
                exit();
            } else {
                $_SESSION['error'] = "<strong>Password Salah!</strong>";
            }
        } else {
            $_SESSION['error'] = "<strong>Akun Tidak Terdaftar!</strong>";
        }
    }

    $error = true;
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

    <title>Login | SIMPEG DISTPH VERSI 2.0</title>
  </head>
  <body class="bg-custom">
    <div class="container h-100 d-flex flex-column justify-content-center align-items-center">
      <div class="main-header">
        SELAMAT DATANG DI<br>SISTEM INFORMASI KEPEGAWAIAN VERSI 2.0
      </div>
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-4 d-flex align-items-center justify-content-center">
            <img src="assets/img/logo.png" alt="Logo Sulawesi Tengah" class="img-fluid w-75">
          </div>
          <div class="col-md-8 d-flex align-items-center">
            <div class="card-body login-form">
              <div class="form-title">Form Login</div>
              <!-- Menampilkan pesan sukses jika ada -->
              <?php if (isset($_SESSION['success'])) { ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= $_SESSION['success']; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <?php unset($_SESSION['success']); ?>
              <?php } ?>

              <!-- Menampilkan pesan error jika ada -->
              <?php if (isset($_SESSION['error'])) { ?>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?= $_SESSION['error']; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <?php unset($_SESSION['error']); ?>
              <?php } ?>
              <form action="" method="POST">
                  <input type="text" class="form-control bordered" id="nip_pegawai" name="nip_pegawai" value="<?php echo isset($_SESSION['login_nip']) ? $_SESSION['login_nip'] : ''; ?>" placeholder="NIP" autocomplete="off">
                  <div class="password-wrapper">
                      <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($_SESSION['login_password']) ? $_SESSION['login_password'] : ''; ?>" placeholder="Password" autocomplete="off">
                      <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                  </div>
                  
                <button type="submit" class="btn btn-lg text-white" name="login">Login</button>
                <a href="registrasi.php" class="text-dark daftar"><strong>Daftar</strong></a>
              </form>
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
    <script src="https://kit.fontawesome.com/77842dda5c.js" crossorigin="anonymous"></script>
    <script>
        // Toggle Password
        document.getElementById('togglePassword').addEventListener('click', function (e) {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
  </body>
</html>
