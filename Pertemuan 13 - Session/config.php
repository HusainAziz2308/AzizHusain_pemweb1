<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "tm_13";
    
    $koneksi = mysqli_connect($host, $user, $pass, $database);
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }else{
        // echo "Koneksi Berhasil";
    }
?>