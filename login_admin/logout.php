<?php
session_start(); // Memulai session
session_destroy(); // Menghapus semua session yang aktif
header("Location: ./admin_login.php"); // Redirect ke halaman login
exit();
?>

