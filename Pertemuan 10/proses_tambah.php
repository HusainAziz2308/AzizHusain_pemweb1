<?php 
include 'koneksi.php';

$id_siswa = rand(1000000, 9999999);

$nama           = $_POST['nama'];
$alamat         = $_POST['alamat'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$agama          = $_POST['agama'];
$asal_sekolah   = $_POST['asal_sekolah'];

if($jenis_kelamin == "belum memilih" || $agama == "belum memilih"){
    echo "<script>alert('Harap pilih Jenis Kelamin dan Agama!'); window.history.back();</script>";
} else {
    $query = mysqli_query($koneksi, "INSERT INTO data_siswa VALUES('$id_siswa', '$nama', '$alamat', '$jenis_kelamin', '$agama', '$asal_sekolah')");

    if($query){
        header("location:data_siswa.php");
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
?>