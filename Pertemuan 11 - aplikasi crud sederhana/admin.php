<?php
include 'config/koneksi.php'; // Pastikan file koneksi.php sudah ada

// Mengambil parameter action dari URL. Defaultnya adalah 'read' (menampilkan tabel)
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$id = isset($_GET['id']) ? $_GET['id'] : null;

// ==================================================================================================
// 1. LOGIKA CRUD (HAPUS, INSERT, UPDATE) - Berjalan di awal sebelum HTML
// ==================================================================================================

// --- LOGIKA DELETE (HAPUS) ---
if ($action == 'hapus' && $id) {
    $query = "DELETE FROM siswa WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        header('Location: admin.php?status=success_delete');
    } else {
        die("Gagal Hapus: " . mysqli_error($koneksi));
    }
    exit; // Penting agar tidak menjalankan kode di bawahnya
}

// --- LOGIKA INSERT/UPDATE (HANDLE POST) ---
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nis    = $_POST['nis'];
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];

    if (isset($_POST['action_type']) && $_POST['action_type'] == 'insert') {
        // LOGIKA INSERT
        $query = "INSERT INTO siswa (nis, nama, alamat) VALUES ('$nis', '$nama', '$alamat')";
        $status_msg = 'success_add';
    } elseif (isset($_POST['action_type']) && $_POST['action_type'] == 'update') {
        // LOGIKA UPDATE
        $id_update = $_POST['id'];
        $query = "UPDATE siswa SET nis='$nis', nama='$nama', alamat='$alamat' WHERE id='$id_update'";
        $status_msg = 'success_edit';
    }

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header('Location: admin.php?status=' . $status_msg);
    } else {
        die("Gagal Query: " . mysqli_error($koneksi));
    }
    exit; // Penting agar tidak menjalankan kode di bawahnya
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Sistem Informasi Sekolah</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 80%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; padding: 10px; }
        .success { color: green; font-weight: bold; margin-bottom: 10px; }
        .nav-link { margin-right: 15px; }
    </style>
</head>
<body>
    <nav>
        <div class="judul">Data Siswa Sekolah</div>
        <ul class="menu">
            <li><a href="index.php">Home</a></li>
            <li><a id="active" href="admin.php">admin</a></li>
        </ul>
    </nav>

    <?php 
    if (isset($_GET['status'])) {
        $msg = '';
        if ($_GET['status'] == 'success_add') $msg = 'Data siswa berhasil ditambahkan!';
        if ($_GET['status'] == 'success_edit') $msg = 'Data siswa berhasil diubah!';
        if ($_GET['status'] == 'success_delete') $msg = 'Data siswa berhasil dihapus!';
        echo '<div class="success">' . $msg . '</div>';
    }
    ?>
    
    <div>
        <a class="nav-link" href="admin.php">Lihat Data</a> | 
        <a class="nav-link" href="admin.php?action=tambah">Tambah Data Baru</a>
    </div>
    
    <hr>

    <?php
    switch ($action) {
        // --- VIEW TAMBAH DATA ---
        case 'tambah':
            ?>
            <h3>Tambah Data Siswa</h3>
            <form method="POST" action="admin.php">
                <input type="hidden" name="action_type" value="insert">
                <table>
                    <tr><td>NIS</td><td><input type="text" name="nis" required></td></tr>
                    <tr><td>Nama</td><td><input type="text" name="nama" required></td></tr>
                    <tr><td>Alamat</td><td><input type="text" name="alamat" required></td></tr>
                    <tr><td></td><td><input type="submit" value="Simpan Data"></td></tr>
                </table>
            </form>
            <?php
            break;

        // --- VIEW EDIT DATA ---
        case 'edit':
            // Ambil data lama
            $query_edit = "SELECT * FROM siswa WHERE id = '$id'";
            $result_edit = mysqli_query($koneksi, $query_edit);
            $data = mysqli_fetch_assoc($result_edit);
            
            if (!$data) {
                echo "Data tidak ditemukan!";
                break;
            }
            ?>
            <h3>Edit Data Siswa (ID: <?php echo $id; ?>)</h3>
            <form method="POST" action="admin.php">
                <input type="hidden" name="action_type" value="update">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <table>
                    <tr><td>NIS</td><td><input type="text" name="nis" value="<?php echo $data['nis']; ?>" required></td></tr>
                    <tr><td>Nama</td><td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" required></td></tr>
                    <tr><td>Alamat</td><td><input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required></td></tr>
                    <tr><td></td><td><input type="submit" value="Update Data"></td></tr>
                </table>
            </form>
            <?php
            break;

        // --- VIEW LIST DATA (READ) ---
        default:
        case 'read':
            ?>
            <h3>Daftar Siswa</h3>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_read = "SELECT * FROM siswa ORDER BY nis ASC";
                    $result_read = mysqli_query($koneksi, $query_read);
                    $no = 1;
                    while($row = mysqli_fetch_assoc($result_read)) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['nis']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td>
                            <a href="admin.php?action=edit&id=<?php echo $row['id']; ?>">Edit</a> | 
                            <a href="admin.php?action=hapus&id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php
            break;
    }
    ?>
</body>
</html>