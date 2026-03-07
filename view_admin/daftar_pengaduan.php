<?php
declare(strict_types=1);

require_once __DIR__.'/../db.php';
require_once __DIR__.'/../class/Pengaduan.php';

session_start();

/*
|--------------------------------------------------------------------------
| CEK LOGIN ADMIN
|--------------------------------------------------------------------------
*/

if(!isset($_SESSION['admin'])){
    header("Location: ../login_admin/admin_login.php");
    exit;
}

/*
|--------------------------------------------------------------------------
| MEMBUAT OBJECT PENGADUAN
|--------------------------------------------------------------------------
*/

$pengaduan = new Pengaduan($conn);

/*
|--------------------------------------------------------------------------
| PROSES DELETE
|--------------------------------------------------------------------------
*/

if(isset($_GET['delete']) && is_numeric($_GET['delete'])){

    $id = (int)$_GET['delete'];

    if($pengaduan->hapus($id)){
        header("Location: daftar_pengaduan.php?status=deleted");
        exit;
    }

}

/*
|--------------------------------------------------------------------------
| AMBIL DATA
|--------------------------------------------------------------------------
*/

$result = $pengaduan->tampil();

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengaduan</title>
    <link rel="stylesheet" href="../navbar/style.css">
    <link rel="stylesheet" href="./style_pengaduan.css">
</head>
<body>

<?php require_once __DIR__ . '/../navbar/index.php'; ?>

<h2>Daftar Pengaduan</h2>
<hr>

<?php if (isset($_GET['status']) && $_GET['status'] === 'deleted'): ?>
    <script>alert('Data berhasil dihapus!');</script>
<?php endif; ?>

<div class="table-container">
<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Pelapor</th>
            <th>Kontak</th>
            <th>Deskripsi</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Tanggapan Admin</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= (int) $row['id']; ?></td>
                <td><?= htmlspecialchars($row['nama_pelapor'] ?? 'Anonim'); ?></td>
                <td><?= htmlspecialchars($row['kontak_pelapor'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($row['deskripsi'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($row['kategori'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($row['status'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($row['tanggapan_admin'] ?? '-'); ?></td>
                <td><?= htmlspecialchars($row['created_at'] ?? '-'); ?></td>
                <td>
                    <div class="aksi-button">
                        <a href="update_pengaduan.php?id=<?= (int) $row['id']; ?>" 
                           class="update-button">Update</a>

                        <a href="?delete=<?= (int) $row['id']; ?>" 
                           class="delete-button"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                           Delete
                        </a>
                    </div>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="9">Belum ada pengaduan.</td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>
</div>

</body>
</html>