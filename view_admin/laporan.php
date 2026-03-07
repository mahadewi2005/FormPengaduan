<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login_admin/admin_login.php");
    exit();
}
?>

<?php
include '../db.php';

$kategori_result = $conn->query("SELECT kategori, COUNT(*) as jumlah FROM pengaduan GROUP BY kategori");
$status_result = $conn->query("SELECT status, COUNT(*) as jumlah FROM pengaduan GROUP BY status");
?>


<?php require "../navbar/index.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laporan</title>
    <link rel="stylesheet" href="../navbar/style.css">
    <link rel="stylesheet" href="./style_laporan.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    
    <h2>Laporan Pengaduan</h2>
    <hr/>
    
    <h3>Jumlah Pengaduan per Kategori</h3>
    <table>
        <tr>
            <th>Kategori</th>
            <th>Jumlah</th>
        </tr>
        <?php while ($row = $kategori_result->fetch_assoc()): ?>
        <tr><td><?= $row['kategori'] ?></td><td><?= $row['jumlah'] ?></td></tr>
        <?php endwhile; ?>
    </table>
    
    <h3>Jumlah Pengaduan Berdasarkan Status</h3>
    <table border="1">
        <tr>
            <th>Status</th>
            <th>Jumlah</th>
        </tr>
        <?php while ($row = $status_result->fetch_assoc()): ?>
        <tr><td><?= $row['status'] ?></td><td><?= $row['jumlah'] ?></td></tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
