<?php
session_start();
include '../db.php';

if (!isset($_SESSION['user'])) {
    echo '<script>alert("Anda harus Login!")</script>';
    echo '<script>window.location="../index.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = '" . $_SESSION['id'] . "'");
$dlogin = mysqli_fetch_object($query);

