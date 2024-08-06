<?php
include '../db.php';

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE  FROM tb_user WHERE id = '" . $_GET['id'] . "' ");
    $alter = mysqli_query($conn, "ALTER TABLE tb_user drop id");
    $alter = mysqli_query($conn, "ALTER TABLE  tb_user ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
    echo '<script>window.location="data-user.php"</script>';
}