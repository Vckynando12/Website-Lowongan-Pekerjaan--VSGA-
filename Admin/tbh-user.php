<?php
include('sesi-admin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <style>
        .sidebar {
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding: 2rem;
        }

        .sidebar h3 {
            margin-bottom: 2rem;
            text-align: center;
        }

        .nav-link {
            color: white !important;
        }

        .top-bar {
            background-color: #f8f9fa;
            padding: 1rem;
            display: flex;
            justify-content: flex-end;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <div class="sidebar-header">
                        <h3>VSGA_POlije</h3>
                    </div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../buku/data-buku.php">Data Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="data-user.php">Data User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">LogOut</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tambahkan Data User</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" id="nama" class="form-control" autocomplete="on" required>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="email" name="username" id="username" class="form-control" placeholder="example@Buku" autocomplete="on" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" autocomplete="on" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_wa" class="form-label">No. WA</label>
                                    <input type="number" name="no_wa" id="no_wa" class="form-control" autocomplete="on" required>
                                </div>
                                <div class="mb-3">
                                    <label for="level" class="form-label">Level Akses</label>
                                    <select name="level" id="level" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="2">User</option>
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                                <a href="data-user.php" class="btn btn-secondary">Back</a>
                            </form>
                            <?php
                            if (isset($_POST['submit'])) {
                                include '../db.php';

                                $nama = $_POST['nama'];
                                $username = $_POST['username'];
                                $password = sha1($_POST['password']);
                                $no_wa = $_POST['no_wa'];
                                $level = $_POST['level'];

                                $insert = mysqli_query($conn, "INSERT INTO tb_user VALUES(
                                    null,
                                    '" . $nama . "',
                                    '" . $username . "',
                                    '" . $password . "',
                                    '" . $no_wa . "',
                                    '" . $level . "'
                                )");

                                if ($insert) {
                                    echo '<script>alert("Pendaftaran Berhasil")</script>';
                                    echo '<script>window.location="data-user.php"</script>';
                                } else {
                                    echo '<script>alert("Pendaftaran Gagal")</script>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
