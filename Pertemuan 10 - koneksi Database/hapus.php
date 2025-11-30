<?php 
    include 'koneksi.php';
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM data_siswa WHERE id='$id'");
    header("location:data_siswa.php");
?>