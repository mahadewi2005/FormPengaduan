<?php
include '../db.php';
session_start();

// Cek login admin
if (!isset($_SESSION['admin'])) {
    header("Location: ../login_admin/admin_login.php");
    exit();
}

// =====================
// PROSES DELETE
// =====================
if (isset($_GET['delete'])) {

    $id = intval($_GET['delete']);

    $stmt = $conn->prepare("DELETE FROM pengaduan WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {

        // Redirect ke halaman daftar_pebfaduan.php
        header("Location: ./daftar_pengaduan.php?status=deleted");
        exit();

    } else {
        echo "Gagal menghapus data.";
    }

    $stmt->close();
}

// =====================
// AMBIL DATA
// =====================
$sql = "SELECT * FROM pengaduan ORDER BY created_at DESC";
$result = $conn->query($sql);
?>