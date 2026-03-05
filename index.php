<?php
require "config/db.php";
$lapangan = mysqli_query($conn, "SELECT * FROM lapangan")->fetch_all(MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>data lapangan</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Lapangan</th>
            <th>Lokasi</th>
            <th>Harga per Jam</th>
        </tr>
        <?php foreach ($lapangan as $l): ?>
            <tr>
                <td><?= $l['id']; ?></td>
                <td><?= $l['nama_lapangan']; ?></td>
                <td><?= $l['lokasi']; ?></td>
                <td><?= $l['harga_per_jam']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>