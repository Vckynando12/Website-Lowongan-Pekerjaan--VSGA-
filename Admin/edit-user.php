<?php
include 'sesi-admin.php';
include '../db.php';
$user = mysqli_query($conn, "SELECT * FROM tb_user WHERE id= '" . $_GET['id'] . "' ");
if (mysqli_num_rows($user) == 0) {
    echo '<script>alert("Data yang anda cari tidak ada")</script>';
    echo '<script>window.location="data-user.php"</script>';
}
$u = mysqli_fetch_object($user);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data </title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <header><?php echo $dlogin->nama ?></header>
            <ul>
                <li><a href="index.php" id="dashboard">Dashboard</a></li>
                <li><a href="../buku/data-buku.php" id="dbuku">Data Buku</a></li>
                <li><a href="data-user.php" id="duser">Data User</a></li>

                <li><a href="../logout.php">LogOut</a></li>
            </ul>
        </div>
        <div class="section">
            <div class="container">
                <div class="box">
                    <form action="" method="POST">
                        <div class="box-tbhdt">
                            <h2>Edit Data User</h2>
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="tbh-content" autocomplete="on" required
                                value="<?php echo $u->nama ?>">
                            <div class="signup-border"></div>
                            <label for="username">username</label>
                            <input type="text" name="username" id="username" class="tbh-content"
                                placeholder="example@buku" autocomplete="on" required
                                value="<?php echo $u->username ?>">
                            <div class="signup-border"></div>
                            <label for="no_wa">No. WA</label>
                            <input type="text" name="no_wa" id="no_wa" class="tbh-content" autocomplete="on" required
                                value="<?php echo $u->no_wa ?>">
                            <div class="signup-border"></div>
                            <label for="level">Level Akses</label>
                            <select name="level" id="level" class="tbh-content">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                            <div class="signup-border"></div>
                            <button name="submit" id="submit" class="btn-all">SUBMIT</button>
                            <p class="p-profil"><a href="data-user.php">
                                    < Back</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <?php
        if (isset($_POST['submit'])) {

            $nama = ucwords($_POST['nama']);
            $username = $_POST['username'];
            $no_wa = $_POST['no_wa'];
            $level = $_POST['level'];

            $update = mysqli_query($conn, "UPDATE tb_user SET
        nama = '" . $nama . "',
        username = '" . $username . "',
        no_wa = '" . $no_wa . "',
        level = '" . $level . "'  
        where id='" . $u->id . "'
        ");

            if ($update) {
                echo '<script>alert("Data berhasil diubah")</script>';
                echo '<script>window.location="data-user.php"</script>';
            } else {
                echo '<script>alert("Update Data User Gagal")</script>';
                echo '<script>window.location="edit-user.php"</script>';
            }
        }
        ?>
</body>

</html>