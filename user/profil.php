<?php
include '../db.php';
include 'sesi-user.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
</head>

<body id="bd-dashboard">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="sidebar-header">
                        <h3><?php echo $dlogin->nama ?></h3>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profil.php">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">Log Out</a>
                        </li>
                        
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Profil</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="form-control" autocomplete="on" required value="<?php echo $dlogin->nama ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" autocomplete="on" required value="<?php echo $dlogin->username ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="no_wa" class="form-label">No. WA</label>
                                    <input type="number" name="no_wa" id="no_wa" class="form-control" autocomplete="on" required value="<?php echo $dlogin->no_wa ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="level" class="form-label">Level Akses</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="2" <?php if ($dlogin->level == 2) echo 'selected'; ?>>User</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                                <a href="ubah_password.php" class="btn btn-secondary">Edit Password</a>
                                <a href="index.php" class="btn btn-outline-secondary">Back</a>
                            </form>
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
                                    WHERE id= '" . $dlogin->id . "'
                                ");

                                if ($update) {
                                    echo '<script>alert("Update data berhasil")</script>';
                                    session_destroy();
                                    echo '<script>window.location="../index.php"</script>';
                                } else {
                                    echo '<script>alert("Update data gagal")</script>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
