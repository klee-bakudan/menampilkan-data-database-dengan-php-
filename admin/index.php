<?php
require "../config/db.php";

// JOIN tabel bookings + lapangan + users
$query = mysqli_query($conn, "SELECT bookings.*, lapangan.nama_lapangan, users.nama_lengkap
                              FROM bookings
                              JOIN lapangan ON bookings.lapangan_id = lapangan.id
                              JOIN users ON bookings.user_id = users.id");

$bookings = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Data Booking</h2>

    <a href="lapangan/booking.php">
        <button>booking now</button>
    </a>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nama Lapangan</th>
            <th>Nama User</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Durasi</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($bookings as $b): ?>
            <tr>
                <td><?= $b['id']; ?></td>
                <td><?= $b['nama_lapangan']; ?></td>
                <td><?= $b['nama_lengkap']; ?></td>
                <td><?= $b['tgl_booking']; ?></td>
                <td><?= $b['jam_mulai']; ?></td>
                <td><?= $b['durasi']; ?></td>
                <td><?= $b['total_harga']; ?></td>
                <td>
                    <?php if ($b['status_pembayaran'] == 1): ?>
                        <span style="color:green;">lunas bos</span>
                    <?php else: ?>
                        <span style="color:red;">blum lunas</span>
                    <?php endif; ?>
                </td>

                <td>
                    <a href="edit.php?id=<?= $b['id']; ?>">Edit</a> |
                    <a href="hapus.php?id=<?= $b['id']; ?>"
                        onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>
</html>

