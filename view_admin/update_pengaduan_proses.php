<?php
include '../db.php';
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: ../login_admin/admin_login.php");
    exit();
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $status = $_POST['status'];
    $tanggapan_admin = $_POST['tanggapan_admin'];

    // Validasi input
    if (empty($status)) {
        echo "Status tidak boleh kosong!";
        exit();
    }

    // Query update
    $sql = "UPDATE pengaduan SET status = ?, tanggapan_admin = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $status, $tanggapan_admin, $id);

    if ($stmt->execute()) {
        // Redirect ke halaman daftar pengaduan setelah berhasil update
        header("Location: ./daftar_pengaduan.php?update=success");
        exit();
    } else {
        echo "Gagal memperbarui data: " . $stmt->error;
    }

    $stmt->close();
}
?>
