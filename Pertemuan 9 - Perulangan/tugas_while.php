<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>While</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #e6f7ff;
        }
    </style>
</head>
<body>
    <h1>Hasil Perulangan While</h1>
    <p>(Perkalian 3 sampe 10)</p>
    <ul>
        <?php
        $angka = 1;

        while ($angka <= 10) {
            $hasil = 3 * $angka;

            echo "<li>Operasi: 3 x " . $angka . " = " . $hasil . "</li>";

            $angka++;
        }
        ?>
    </ul>
</body>
</html>