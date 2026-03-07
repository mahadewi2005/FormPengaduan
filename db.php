<?php
/*
|--------------------------------------------------------------------------
| KONFIGURASI KONEKSI DATABASE
|--------------------------------------------------------------------------
| File ini digunakan untuk menghubungkan program PHP dengan database
| MySQL yang bernama "pengaduan_masyarakat".
*/

// Menyimpan informasi server database
$host = "localhost";   // alamat server database
$user = "root";        // username database
$pass = "";            // password database
$db   = "pengaduan_masyarakat"; // nama database

// Membuat koneksi ke database menggunakan mysqli
$conn = new mysqli($host, $user, $pass, $db);

// Mengecek apakah koneksi berhasil atau tidak
if ($conn->connect_error) {
    // Jika gagal maka akan menampilkan pesan error
    die("Koneksi gagal: " . $conn->connect_error);
}
?>