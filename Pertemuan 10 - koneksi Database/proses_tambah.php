<?php 
include 'koneksi.php';

$cek_id = mysqli_query($koneksi, "SELECT MAX(id) AS max_id FROM data_siswa");
$data_id = mysqli_fetch_assoc($cek_id);
$max_id_lama = $data_id['max_id'];

$base_id = 4124000; 

if (empty($max_id_lama)) {
    $id_siswa_baru = $base_id + 1;
} else {
    $id_siswa_baru = $max_id_lama + 1;
}

$nama           = $_POST['nama'];
$alamat         = $_POST['alamat'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$agama          = $_POST['agama'];
$asal_sekolah   = $_POST['asal_sekolah'];

if($jenis_kelamin == "belum memilih" || $agama == "belum memilih"){
    echo "<script>alert('Harap pilih Jenis Kelamin dan Agama!'); window.history.back();</script>";
} else {
    $query = mysqli_query($koneksi, "INSERT INTO data_siswa VALUES('$id_siswa_baru', '$nama', '$alamat', '$jenis_kelamin', '$agama', '$asal_sekolah')");

    if($query){
        header("location:data_siswa.php");
    } else {
        echo "Gagal menyimpan data. Pastikan kolom 'id' tidak Auto Increment: " . mysqli_error($koneksi);
    }
}
?>