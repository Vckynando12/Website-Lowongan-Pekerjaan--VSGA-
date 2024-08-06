<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .bsb-tpl-bg-platinum { background-color: #E5E5E5; }
        .bsb-tpl-bg-lotion { background-color: #FAFAFA; }
    </style>
</head>
<body>
    <!-- Login 3 - Bootstrap Brain Component -->
    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 bsb-tpl-bg-platinum">
                    <div class="d-flex flex-column justify-content-between h-100 p-3 p-md-4 p-xl-5">
                        <h3 class="m-0">Welcome!</h3>
                        <img class="img-fluid rounded mx-auto my-4" loading="lazy" src="/image/logo212.png" width="245" height="80" alt="BootstrapBrain Logo">
                        
                    </div>
                </div>
                <div class="col-12 col-md-6 bsb-tpl-bg-lotion">
                    <div class="p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    <h3>Log in</h3>
                                </div>
                            </div>
                        </div>
                        <form action="" method="POST">
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">
                                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password" value="" required>
                                </div>
                                <div class="col-12">
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" type="submit" id="signin" name="signin">Log in now</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['signin'])) {
                            include 'db.php';
                            session_start();
                            $username = $_POST['username'];
                            $password = sha1($_POST['password']);

                            $login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username ='$username' and password ='$password'");
                            if (mysqli_num_rows($login) == 0) {
                                echo '<script>alert("Username atau password Salah!")</script>';
                            } else {
                                $row = mysqli_fetch_assoc($login);
                                if ($row['level'] == 1) {
                                    $_SESSION['admin'] = $username;
                                    $_SESSION['id'] = $row['id'];
                                    echo '<script>window.location="admin/index.php"</script>';
                                } else {
                                    if ($row['level'] == 2) {
                                        $_SESSION['user'] = $username;
                                        $_SESSION['id'] = $row['id'];
                                        echo '<script>window.location="user/index.php"</script>';
                                    }
                                }
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-5 mb-4 border-secondary-subtle">
                                <div class="text-end">
                                <p class="mb-0">Not a member yet? <a href="signup.php" class="link-secondary text-decoration-none">Register now</a></p>
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
