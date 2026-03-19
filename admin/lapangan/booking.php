<?php
require "../../config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Booking Lapangan</h1>
    <a href="../index.php">Back</a>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'lapangan'): ?>
        <p style="color:red;">pilih lapangan 1(gor unair) atau 2(gor liyue)</p>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'user'): ?>
        <p style="color:red;">user belum terdaftar</p>
    <?php endif; ?>

    <?php if (isset($_GET['error']) && $_GET['error'] == 'status'): ?>
        <p style="color:red;">isi lunas atau belum </p>
    <?php endif; ?>

    <?php if (isset($_GET['status'])): ?>
        <p style="color:green;">berhasil booking</p>
    <?php endif; ?>


    <form method="post" action="proses_booking.php">
        <input type="number" name="lapangan" placeholder="ID lapangan" required>
        <input type="number" name="nama" placeholder="ID user" required>
        <input type="date" name="tanggal" required>
        <input type="time" name="jam" required>
        <input type="number" name="durasi" placeholder="durasi (jam)" required>
        <input type="number" name="total" placeholder="total harga" required>

        <select name="status_pembayaran">
            <option value="0">blum lunas</option>
            <option value="1">lunas bos</option>
        </select>

        <button type="submit" name="create">Booking</button>
    </form>

</body>
</html>