<?php
session_start();
if ($_SESSION['status_login'] = true) {
    session_destroy();
    echo '<script>alert("Logout berhasil")</script>';
    echo '<script>window.location="index.php"</script>';
}