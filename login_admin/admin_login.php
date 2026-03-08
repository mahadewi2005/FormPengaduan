<?php
session_start();

require_once '../db.php';
require_once '../clas/Admin.php';

/*
|--------------------------------------------------------------------------
| MEMBUAT OBJECT ADMIN
|--------------------------------------------------------------------------
*/

$admin = new Admin();

/*
|--------------------------------------------------------------------------
| PROSES LOGIN
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // mengirim username dan password ke class
    $admin->setLogin($username, $password);

    // menjalankan method login dari class Admin
    if ($admin->login($conn)) {

        $_SESSION['admin'] = $username;

        echo "<script>
        alert('Login berhasil');
        document.location.href='../view_admin/dashboard_admin.php';
        </script>";

    } else {

        echo "<script>
        alert('Username atau Password salah');
        document.location.href='admin_login.php';
        </script>";

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login admin</title>
    <link rel="stylesheet" href="./style_adminlogin.css">


    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>

    <form method="POST">
    <div class="login-container">
        <h2>Login Admin</h2>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
        <p>Don't have an account? <a href="#">Sign up</a></p>
    </div>
    </form>
    
</body>
</html>


