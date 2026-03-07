<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login_admin/admin_login.php");
    exit();
}
?>


<?php
include '../db.php';
$result = $conn->query("SELECT id, deskripsi, kategori, status FROM pengaduan");
?>


<?php require "../navbar/index.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>status</title>
    <link rel="stylesheet" href="../navbar/style.css">
    <link rel="stylesheet" href="./style_status.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    
    <h2>Status Pengaduan</h2>
    <hr/>
    <center>
    <table>
        <tr>
            <th>ID</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Status</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['deskripsi'] ?></td>
            <td><?= $row['kategori'] ?></td>
            <td><?= $row['status'] ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    </center>
</body>
</html>
