<?php
require "../config/db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM bookings WHERE id = '$id'";
    $booking = mysqli_query($conn, $query)->fetch_assoc();
} else {
    header('Location: index.php');
    exit;
}

if (isset($_POST['update'])) {
    $lapangan_id = $_POST['lapangan'];
    $user_id     = $_POST['nama'];
    $tgl_booking = $_POST['tanggal'];
    $jam_mulai   = $_POST['jam'];
    $durasi      = $_POST['durasi'];
    $status      = $_POST['status_pembayaran'];

    if ($status != 0 && $status != 1) {
        echo "pilih status";
        exit;
    }

    $cekLapangan = mysqli_query($conn, "SELECT * FROM lapangan WHERE id = $lapangan_id");
    if (mysqli_num_rows($cekLapangan) == 0) {
        echo "lapangan 1 atau 2";
        exit;
    }

    $cekUser = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
    if (mysqli_num_rows($cekUser) == 0) {
        echo "user belum buat member";
        exit;
    }

    $query = "UPDATE bookings SET 
            lapangan_id='$lapangan_id',
            user_id='$user_id',
            tgl_booking='$tgl_booking',
            jam_mulai='$jam_mulai',
            durasi='$durasi',
            status_pembayaran='$status'
            WHERE id='$id'";

    $update = mysqli_query($conn, $query);

    if ($update) {
        header('Location: index.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Edit Booking</h1>
    <a href="index.php">Back</a>

    <form method="post">

        <input type="number" name="lapangan" value="<?= $booking['lapangan_id']; ?>" required>
        <input type="number" name="nama" value="<?= $booking['user_id']; ?>" required>
        <input type="date" name="tanggal" value="<?= $booking['tgl_booking']; ?>" required>
        <input type="time" name="jam" value="<?= $booking['jam_mulai']; ?>" required>
        <input type="number" name="durasi" value="<?= $booking['durasi']; ?>" required>
        <input type="number" name="total" id="total">
        <select name="status_pembayaran">
            <option value="0" <?= $booking['status_pembayaran'] == 0 ? 'selected' : ''; ?>>
                blum lunas
            </option>
            <option value="1" <?= $booking['status_pembayaran'] == 1 ? 'selected' : ''; ?>>
                lunas bos
            </option>
        </select>
        <br><br>
        <button type="submit" name="update">Update</button>

    </form>

</body>
</html>