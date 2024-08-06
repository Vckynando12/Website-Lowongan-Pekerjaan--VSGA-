<?php include 'sesi-user.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <style>
        .sidebar {
            background-color: #343a40;
            color: white;
            height: 100vh;
            padding: 2rem;
        }

        .sidebar h2 {
            margin-bottom: 2rem;
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

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <header class="text-center mb-4">
                <h2>Hallo</h2>
            </header>
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

        <!-- Main content -->
        <div class="flex-grow-1">
            <!-- Top bar -->
            <div class="top-bar">
                <button class="btn btn-outline-primary"><?php echo $dlogin->nama ?></button>
            </div>

            <!-- Section -->
            <div class="container mt-3">
                <h2>Lowongan Pekerjaan</h2>
                <div class="row">
                    <?php
                    $dbuku = mysqli_query($conn, "SELECT * FROM tb_buku ORDER BY id DESC");
                    if (mysqli_num_rows($dbuku) > 0) {
                        while ($d = mysqli_fetch_array($dbuku)) {
                    ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <a href="#" class="stretched-link">
                                        <img src="../buku/img/<?php echo $d['gambar'] ?>" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $d['judul'] ?></h5>
                                            <p class="card-text"><?php echo $d['pengarang'] ?></p>
                                            <p class="card-text"><?php echo $d['penerbit'] ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<p class="text-muted">Tidak ada data buku.</p>';
                    }
                    ?>
                </div>
            </div>

            <!-- Footer -->
            
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
