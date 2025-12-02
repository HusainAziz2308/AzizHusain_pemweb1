<?php
    include 'config/koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Sekolah</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 80%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    
    <nav>
        <div class="judul">Data Siswa Sekolah</div>
        <ul class="menu">
            <li><a id="active" href="index.php">Home</a></li>
            <li><a href="admin.php">admin</a></li>
        </ul>
    </nav>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM siswa ORDER BY nis ASC";
            $result = mysqli_query($koneksi, $query);
            if(!$result){
                die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
            }

            $no = 1;
            while($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $row['nis']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>
        </tbody>
    </table>

</body>
</html>