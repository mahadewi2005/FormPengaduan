<?php
include '../db.php';
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Ambil ID pengaduan dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Ambil data pengaduan berdasarkan ID
$sql = "SELECT * FROM pengaduan WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "Data pengaduan tidak ditemukan!";
    exit();
}

$pengaduan = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pengaduan</title>
    <link rel="stylesheet" href="../navbar/style.css">
    <link rel="stylesheet" href="./style_update.css">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
<?php require "../navbar/index.php" ?>

    <div class="container">
        <h2>Update Pengaduan</h2>
        <form method="POST" action="update_pengaduan_proses.php">
            <input type="hidden" name="id" value="<?= $pengaduan['id'] ?>">
            <strong>Nama Pelapor:</strong> 
            <p><?= htmlspecialchars($pengaduan['nama_pelapor'] ?: 'Anonim') ?></p>

            <strong>Kontak Pelapor:</strong>
            <p><?= htmlspecialchars($pengaduan['kontak_pelapor']) ?></p>

            <strong>Deskripsi:</strong> 
            <p><?= htmlspecialchars($pengaduan['deskripsi']) ?></p>

            <strong>Kategori:</strong> 
            <p><?= htmlspecialchars($pengaduan['kategori']) ?></p>

            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="Terkirim" <?= $pengaduan['status'] == 'Terkirim' ? 'selected' : '' ?>>Terkirim</option>
                <option value="Dalam Proses" <?= $pengaduan['status'] == 'Dalam Proses' ? 'selected' : '' ?>>Dalam Proses</option>
                <option value="Selesai" <?= $pengaduan['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
            </select>

            <label for="tanggapan_admin">Tanggapan Admin:</label>
            <textarea name="tanggapan_admin" id="tanggapan_admin" rows="5" placeholder="Masukkan tanggapan admin"><?= htmlspecialchars($pengaduan['tanggapan_admin'] ?? '') ?></textarea>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
