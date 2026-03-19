<?php
require "../config/db.php";
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM bookings WHERE id = $id");
header("Location: index.php");
exit;
?>