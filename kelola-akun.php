<?php
    $title = "Kelola Akun";
    $menu = "Kelola Akun";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">

    
    <?php require_once 'layouts/data-pegawai.php'; ?>    

    <div class="mt-3">
        <div class="card box-cari">
        <div class="card-body">
            <div class="d-flex justify-content-end">
            <input type="text" class="form-control col-4 mb-3" id="nip" placeholder="Cari Pegawai...">
            </div>
            <table class="table">
            <thead class="text-center" style="background-color: #4067A7; color: white;">
                <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>NIP/NIP DISTPH</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                <td>1</td>
                <td>Fikran, S.Kom</td>
                <td>Staff Kepegawaian</td>
                <td>fikranagmail.com</td>
                <td>19827327389272974</td>
                <td>
                    <div class="badge badge-pill badge-primary">Detail</div>
                    <div class="badge badge-pill badge-danger">Reset</div>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>
    </div>
</main>
    
<?php 
    require 'layouts/footer.php';
?>