<?php 
    $conn = new mysqli("localhost", "root", "", "db_booking_lapangan");
    if ($conn->connect_error) {
        die("koneksi gagal: ". $conn->connect_error);
    }
?>


