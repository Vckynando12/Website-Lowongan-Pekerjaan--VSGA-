<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .custom-bg-color {
            background: linear-gradient(to right, #D6F0FF, #A6D2EB) !important;
        }
        .custom-margin-left {
            margin-left: 80px;
        }
    </style>
</head>
<body>
    <!-- Registration Form -->
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="card border-light-subtle shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6 custom-bg-color">
                        <div class="d-flex align-items-center justify-content-center h-100 custom-margin-left">
                            <div class="col-10 col-xl-8 py-3">
                                <img class="img-fluid rounded mb-4" loading="lazy" src="/image/logo212.png" width="245" height="80" alt="Logo Perpustakaan Digital">
                                <hr class="border-primary-subtle mb-4">
                                <h2 class="h1 mb-4"></h2>
                                <p class="lead m-0">.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-5">
                                        <h2 class="h3">Mendaftar</h2>
                                        <h3 class="fs-6 fw-normal text-secondary m-0">Masukan detail informasi Anda</h3>
                                    </div>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <div class="row gy-3 gy-md-4 overflow-hidden">
                                    <div class="col-12">
                                        <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="username" id="username" placeholder="Email" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="no_wa" class="form-label">No. WA <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="no_wa" id="no_wa" required>
                                    </div>
                                    <!-- <div class="col-12">
                                        <label for="level" class="form-label">Level Akses</label>
                                        <select name="level" id="level" class="form-control">
                                            <option value="2">User</option>
                                        </select>
                                    </div> -->
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn bsb-btn-xl btn-primary" type="submit" name="submit" id="submit">Daftar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['submit'])) {
                                include 'db.php';

                                $nama = ucwords($_POST['nama']);
                                $username = $_POST['username'];
                                $password = sha1($_POST['password']);
                                $no_wa = $_POST['no_wa'];
                                $level = $_POST['level'];

                                $insert = mysqli_query($conn, "INSERT INTO tb_user VALUES (
                                    null,
                                    '" . $nama . "',
                                    '" . $username . "',
                                    '" . $password . "',
                                    '" . $no_wa . "',
                                    '" . $level . "'
                                )");

                                if ($insert) {
                                    echo '<script>alert("Pendaftaran Berhasil")</script>';
                                    echo '<script>window.location="index.php"</script>';
                                } else {
                                    echo '<script>Pendaftaran Gagal</script>';
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-12">
                                    <hr class="mt-5 mb-4 border-secondary-subtle">
                                    <p class="m-0 text-secondary text-center">Sudah Memiliki Akun? <a href="index.php" class="link-primary text-decoration-none">Masuk</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
