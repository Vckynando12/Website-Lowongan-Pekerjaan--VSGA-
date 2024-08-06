<?php
include '../db.php';

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE  FROM tb_buku WHERE id = '" . $_GET['id'] . "' ");
    $alter = mysqli_query($conn, "ALTER TABLE tb_buku drop id");
    $alter = mysqli_query($conn, "ALTER TABLE  tb_buku ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST");
    echo '<script>window.location="data-buku.php"</script>';
}