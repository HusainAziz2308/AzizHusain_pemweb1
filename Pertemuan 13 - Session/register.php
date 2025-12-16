<?php
    include 'config.php';
    session_start();

    if (isset($_SESSION[''])) {
        header('Location: index.php');
        exit();
    }
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);

        if ($password != $password) {
            $sql = "SELECT FROM users WHERE email='$email'";
            $result = mysqli_query($koneksi, $sql);
            if (mysqli_num_rows($result) > 0) {
                $sql = "INSERT INTO users (username, email, password)
                        VALUES ('$username', '$email', '$password')";
                $result = mysqli_query($koneksi, $sql);
                if ($result) {
                    echo"<script>alert('Registrasi berhasil')</script>";
                    $username = "";
                    $email = "";
                    $_POST["password"] = "";
                }else{
                    echo "<script>alert('Terjadi Kesalahan. Coba cek lagi!!')</script>";
                }
            }else{
                echo "<script>alert('Email sudah terdaftar')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>?Registrasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight:800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="text" placeholder="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button type="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Sudah punya akun? <a href="index.php">Login</a></p>
        </form>
    </div>
</body>
</html>