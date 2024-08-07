<?php
require '../functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    global $conn;

    $adminId = $_POST['admin_id'];
    $pegawaiId = $_POST['pegawai_id'];
    $berkasId = $_POST['berkas_id'];

    $stmt = $conn->prepare("UPDATE tb_validasi_berkas SET admin_id = ?, status = 1 WHERE berkas_id = ? AND pegawai_id = ?");
    $stmt->bind_param("iii", $adminId, $berkasId, $pegawaiId);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
}
?>
