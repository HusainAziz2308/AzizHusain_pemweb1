<?php
    $nilai = 65;
    $grade = "";

    if ($nilai >= 90 && $nilai <= 100) {
        $grade = "A";
    } else if ($nilai >= 80 && $nilai < 90) {
        $grade = "B";
    } else if ($nilai >= 70 && $nilai < 80) {
        $grade = "C";
    } else if ($nilai >= 60 && $nilai < 70) {
        $grade = "D";
    } else if ($nilai >= 0 && $nilai < 60) {
        $grade = "E";
    } else {
        $grade = "Nilai tidak valid";
    }

    echo "Hasil Penilaian \n";
    echo "========================== \n";
    echo "Nilaimu adalah $nilai, sehingga mendapatkan grade $grade. \n";

    $keterangan = "";

    switch ($grade) {
        case "A":
        case "B":
            $keterangan = "Sangat Memuaskan, Anda Lulus!";
            break;
        case "C":
            $keterangan = "Cukup Memuaskan, Anda Lulus dengan Syarat";
            break;
        case "D":
        case "E":
            $keterangan = "Mohon Maaf, Anda Tidak Lulus";
    }

    echo "\nKeterangan: $keterangan \n";
    echo "====================================================== \n";
    echo "Keterangan Kelulusan : $keterangan \n \n";

    $prioritas_bimbingan = ($grade == "D" || $grade == "E")
    ? "Wajib Bmbingan!"
    : "Tidak wajib Bimbingan.";

    echo "\nStatus Prioritas Bimbingan \n";
    echo "=========================================== \n";
    echo "Status Bimbingan : $prioritas_bimbingan \n";
?>