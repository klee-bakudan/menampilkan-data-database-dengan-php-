<?php
require "../../config/db.php";

if (isset($_POST['create'])) {

    $lapangan_id = $_POST['lapangan'];
    $user_id     = $_POST['nama'];
    $tgl_booking = $_POST['tanggal'];
    $jam_mulai   = $_POST['jam'];
    $durasi      = $_POST['durasi'];
    $total_harga = $_POST['harga'];
    $status_pembayaran = $_POST['status_pembayaran'];

    $cekLapangan = mysqli_query($conn, "SELECT * FROM lapangan WHERE id = $lapangan_id");
    if (mysqli_num_rows($cekLapangan) == 0) {
        header("Location: booking.php?error=lapangan");
        exit;
    }

    $cekUser = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
    if (mysqli_num_rows($cekUser) == 0) {
        header("Location: booking.php?error=user");
        exit;
    }

    if ($status_pembayaran != 0 && $status_pembayaran != 1) {
        header("Location: booking.php?error=status");
        exit;
    }

    $query = "INSERT INTO bookings 
            (lapangan_id, user_id, tgl_booking, jam_mulai, durasi, harga, status_pembayaran) 
            VALUES 
            ('$lapangan_id', '$user_id', '$tgl_booking', '$jam_mulai', '$durasi', '$total_harga' ,'$status_pembayaran')";

    $create = mysqli_query($conn, $query);

    if ($create) {
        header("Location: booking.php?status=berhasil");
        exit;
    } else {
        echo "gagal booking: " . mysqli_error($conn);
    }
}
