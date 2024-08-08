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
                    <?php 
                    $no = 1;
                    $sqlPegawai = mysqli_query($conn, "SELECT * FROM tb_pegawai
                                                        INNER JOIN tb_jabatan
                                                        ON tb_pegawai.jabatan_id = tb_jabatan.jabatan_id");
                    while($row = mysqli_fetch_assoc($sqlPegawai)){
                    ?>
                        <tr>
                            <td><?= $no++; ?>.</td>
                            <td><?= $row["nama_lengkap"]; ?></td>
                            <td><?= $row["nama_jabatan"]; ?></td>
                            <td><?= $row["email_pegawai"]; ?></td>
                            <td><?= $row["nip_pegawai"]; ?></td>
                            <td>
                                <a href="detail-pegawai.php?pegawai_id=<?= $row["pegawai_id"]; ?>" class="badge badge-pill badge-primary">Detail</a>
                                <a href="#"  class="badge badge-pill badge-danger">Reset</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</main>
    
<?php 
    require 'layouts/footer.php';
?>