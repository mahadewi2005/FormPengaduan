<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="./style.css">


<!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />

    <!-- feather icons -->
    <script src="https://unpkg.com/feather-icons"></script>


</head>
<body>
<header>
        <nav class="navbar">
            <div class="logo">
                <a href="../view_admin/dashboard_admin.php">Pengaduan Masyarakat</a>
            </div>
            <ul class="nav-links">
                <li><a href="../view_admin/daftar_pengaduan.php">Daftar Pengaduan</a></li>
                <li><a href="../view_admin/laporan.php">Laporan</a></li>
                <li><a href="../view_admin/status.php">Status</a></li>
                <li><a href="../login_admin/logout.php" id="logout"><i data-feather="log-out"></i></a></li>
            </ul>
        </nav>
    </header>

    <!-- feather icons -->
    <script>
      feather.replace();
    </script>

</body>
</html>
