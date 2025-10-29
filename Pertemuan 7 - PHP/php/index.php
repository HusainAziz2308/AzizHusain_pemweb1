<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Keuangan Detail</title>
</head>
<body>
    <h1>Laporan Perhitungan Keuangan</h1>
    <?php
        // Data Input
        $Pemasukan = 50000000;
        $HutangA = 16000000;
        $BungaHutangA = 5 / 100; // 5%
        $HutangB = 9500000;
        $BungaHutangB = 4.5 / 100; // 4.5%

        // Menghitung Bunga Masing-Masing Hutang
        $TotalBungaHutangA = $HutangA * $BungaHutangA; // 16.000.000 * 0.05 = 800.000
        $TotalBungaHutangB = $HutangB * $BungaHutangB; // 9.500.000 * 0.045 = 427.500

        // Menghitung Total
        $TotalHutang = $HutangA + $HutangB; // 25.500.000
        $TotalBungaHutang = $TotalBungaHutangA + $TotalBungaHutangB; // 800.000 + 427.500 = 1.227.500
        $TotalPembayaran = $TotalHutang + $TotalBungaHutang; // 26.727.500
        $SisaPemasukan = $Pemasukan - $TotalPembayaran; // 50.000.000 - 26.727.500 = 23.272.500

        // Output
        echo "<h2>Ringkasan Data</h2>";
        echo "Pemasukan Total: Rp " . number_format($Pemasukan, 0, ',', '.') . "<br>";
        echo "<hr>";

        echo "Hutang A (Pokok): Rp " . number_format($HutangA, 0, ',', '.') . " | Bunga (" . ($BungaHutangA * 100) . "%): Rp " . number_format($TotalBungaHutangA, 0, ',', '.') . "<br>";
        echo "Hutang B (Pokok): Rp " . number_format($HutangB, 0, ',', '.') . " | Bunga (" . ($BungaHutangB * 100) . "%): Rp " . number_format($TotalBungaHutangB, 0, ',', '.') . "<br>";
        echo "<hr>";

        echo "<h2>Hasil Perhitungan</h2>";
        echo "Total Pokok Hutang: Rp " . number_format($TotalHutang, 0, ',', '.') . "<br>";
        echo "Total Bunga Hutang (A + B): Rp " . number_format($TotalBungaHutang, 0, ',', '.') . "<br>";
        echo "Total Pembayaran (Pokok + Bunga): Rp " . number_format($TotalPembayaran, 0, ',', '.') . "<br>";
        echo "<h3>Sisa Pemasukan</h3>";
        echo "Sisa Pemasukan: Rp " . number_format($SisaPemasukan, 0, ',', '.') . "<br>";
    ?>
</body>
</html>