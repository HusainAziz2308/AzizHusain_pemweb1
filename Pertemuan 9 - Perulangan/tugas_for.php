<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Hasil Perulangan For</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 1; $i <= 15; $i++) {
                echo "<tr>";
                echo "<td>" . $i . "</td>";
                echo "<td>Nama " . $i . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>