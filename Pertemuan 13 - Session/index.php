<?php
    include 'config.php';
    session_start();

    if (isset($_SESSION['username'])) {
        header('Location: sukses_login.php');
        exit();
    }

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $_SESSION["username"] = $row["username"];
            header("Location: sukses_login.php");
            exit();
        } else {
            echo"<script>alert('Email atau Password SALAH. Coba Lagi')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight:800;">Login</p>
            <div class="input-group">
                <input type="email" name="email" placeholder="email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">login</button>
            </div>
            <p class="login-register-text">Belm punya akun? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>