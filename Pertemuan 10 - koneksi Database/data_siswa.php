<?php
    include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
</head>
<body>
    <h2>Data Siswa</h2>
    <a href="tambah_siswa.php" style="border: 1px; border-radius: 8px;">+ Tambah Siswa Baru</a>
    <br><br>
    
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID Siswa</th> 
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Asal Sekolah</th>
            <th>Aksi</th>
        </tr>
    
    <?php
        $data = mysqli_query($koneksi, "SELECT * FROM data_siswa");
        while($d = mysqli_fetch_array($data)){
    ?>

    <tr>
        <td><?php echo $d['id']; ?></td>
        
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['alamat']; ?></td>
        <td><?php echo $d['jenis_kelamin']; ?></td>
        <td><?php echo $d['agama']; ?></td>
        <td><?php echo $d['asal_sekolah']; ?></td>
        <td>
            <a href="hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Yakin?')">Hapus</a>
        </td>
    </tr>

    <?php
        }
    ?>
    </table>
</body>
</html>