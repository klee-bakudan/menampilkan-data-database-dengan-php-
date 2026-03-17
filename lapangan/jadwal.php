<?php
require "config/db.php";
$bookings = mysqli_query($conn, "SELECT * FROM bookings")->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>data bookings</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Lapangan</th>
            <th>User</th>
            <th>Tanggal</th>
            <th>Jam Mulai</th>
            <th>Durasi</th>
            <th>Total Harga</th>
            <th>Status Pembayaran</th>
        </tr>

        <?php foreach ($bookings as $l): ?>
            <?php
            if ($l['status_pembayaran'] == 1) {
                $status = "lunas";
                $warna = "green";
            } else {
                $status = "kabur";
                $warna = "red";
            }
            ?>


            <tr>
                <td><?= $l['id']; ?></td>
                <td><?= $l['lapangan_id']; ?></td>
                <td><?= $l['user_id']; ?></td>
                <td><?= $l['tgl_booking']; ?></td>
                <td><?= $l['jam_mulai']; ?></td>
                <td><?= $l['durasi']; ?></td>
                <td><?= $l['total_harga']; ?></td>
                <td style="color: <?= $warna ?>;"><?= $status ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>