<?php
$Pemasukan = 50000000;
$HutangA = 16000000;
$BungaHutangA = 0.05;
$HutangB = 9500000;
$BungaHutangB = 0.045;

// Menghitung total bunga hutang
$TotalBungaHutangA = $HutangA * $BungaHutangA;
$TotalBungaHutangB = $HutangB * $BungaHutangB;

// Menghitung total
$TotalHutang = $HutangA + $HutangB;
$TotalBungaHutang = $TotalBungaHutangA + $TotalBungaHutangB;
$TotalPembayaran = $TotalHutang + $TotalBungaHutang;
$SisaPemasukan = $Pemasukan - $TotalPembayaran;

echo "Total Hutang: Rp " . number_format($TotalHutang, 0, ',', '.') . "<br>";
echo "Total Bunga Hutang: Rp " . number_format($TotalBungaHutang, 0, ',', '.') . "<br>";
echo "Total Pembayaran: Rp " . number_format($TotalPembayaran, 0, ',', '.') . "<br>";
echo "Sisa Pemasukan Setelah Pembayaran Hutang: Rp " . number_format($SisaPemasukan, 0, ',', '.') . "<br>";
?>