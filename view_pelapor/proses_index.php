<?php
include '../db.php';

function simpanPengaduan($conn, $nama, $kontak, $deskripsi, $kategori) {
    $sql = "INSERT INTO pengaduan (nama_pelapor, kontak_pelapor, deskripsi, kategori)
            VALUES ('$nama', '$kontak', '$deskripsi', '$kategori')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_pelapor'] ?: 'Anonim';
    $kontak = $_POST['kontak_pelapor'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];

    if (simpanPengaduan($conn, $nama, $kontak, $deskripsi, $kategori)) {
        echo "<script>
                alert('Pesan berhasil disimpan');
                document.location.href='./index.php';
              </script>";
    } else {
        die("Gagal memasukkan data " . mysqli_error($conn));
    }
}
?>