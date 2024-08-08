<?php
    $title = "Dashboard";
    $menu = "Dashboard";
    require 'layouts/header.php';
    require 'layouts/navbar.php';
    require 'layouts/sidebar.php';
?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 main-content">

    <?php 
        if($_SESSION["level"] == 1){
    ?>
        <?php require_once 'layouts/data-pegawai.php'; ?>

        <div class="mt-3">
            <div class="card box-cari">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <input type="text" class="form-control col-4 mb-3" id="nip" placeholder="Cari Pegawai...">
                    </div>
                    <table class="table" id="pegawaiTable">
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
                                    <a href="pegawai/hapus.php?pegawai_id=<?= $row["pegawai_id"]; ?>"  class="badge badge-pill badge-danger hapus_pegawai">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php 
        } else{
    ?>
       <?php require_once 'layouts/data-surat.php'; ?>

        <!-- Grafik Data Surat -->
         <div class="row mt-3">
            <div class="col-12">
                <canvas id="suratChart"></canvas>
            </div>
         </div>
    <?php } ?>

</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const data = <?php echo json_encode($data); ?>;
    
    const labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    const datasets = Object.keys(data).map(type => {
        return {
            label: type,
            data: labels.map(month => data[type][month] || 0),
            backgroundColor: '#4067A7',
        };
    });

    const ctx = document.getElementById('suratChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        callback: function(value) {
                            if (Number.isInteger(value)) {
                                return value;
                            }
                        }
                    }
                }
            }
        }
    });
});
</script>

    
<?php 
    require 'layouts/footer.php';
?>