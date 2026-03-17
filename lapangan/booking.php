<?php
require "../config/db.php";

if (isset($_POST['create'])) {
    $lapangan_id = $_POST['lapangan'];
    $user_id = $_POST['nama'];
    $tgl_booking = $_POST['tanggal'];
    $jam_mulai = $_POST['jam'];
    $durasi = $_POST['durasi'];
    $status_pembayaran = $_POST['status_pembayaran'];

    $query = "INSERT INTO bookings (lapangan_id, user_id, tgl_booking, jam_mulai, durasi, status_pembayaran) 
              VALUES ('$lapangan_id', '$user_id', '$tgl_booking', '$jam_mulai', '$durasi' , '$status_pembayaran')";

    $create = mysqli_query($conn, $query);

    if ($create) {
        header('Location: ../index.php');
        exit(); 
    } else {
        echo "Gagal booking: " . mysqli_error($conn); 
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Lapangan</title>
</head>
<body>
    <h1>Booking Lapangan</h1>
    <a href=" ../index.php">Back</a>

    <form method="post">
        <input type="text" name="lapangan" placeholder="ID lapangan" required>
        <input type="text" name="nama" placeholder="ID user" required>
        <input type="date" name="tanggal" required>
        <input type="time" name="jam" required>
        <input type="number" name="durasi" placeholder="durasi (jam)" required>
        <input type="bool" name="status_pembayaran" placeholder="status" required>

        <button type="submit" name="create">Booking</button>
    </form>
</body>
</html>