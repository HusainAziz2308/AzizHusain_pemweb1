<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "sekolah";
   
    
    $koneksi = mysqli_connect($host, $user, $pass, "sekolah");
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }else{
        // echo "Koneksi Berhasil";
    }
?>