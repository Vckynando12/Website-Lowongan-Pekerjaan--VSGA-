<?php
include '../db.php';
include 'sesi-admin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <style>
        .sidebar {
            background-color: #343a40;
            color: white;
            padding: 1rem;
            height: 100%;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px;
            overflow-y: auto;
            z-index: 100;
        }

        .sidebar header {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .sidebar nav ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar nav ul li {
            margin-bottom: 1rem;
        }

        .sidebar nav ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.5rem;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        .sidebar nav ul li a:hover {
            background-color: #495057;
        }

        .top {
            background-color: #e9ecef;
            padding: 0.5rem;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-left: 250px;
            z-index: 10;
        }

        .top button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            margin-left: 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .top button:hover {
            background-color: #0056b3;
        }

        .section {
            margin-left: 250px;
            padding: 2rem;
        }

        .box {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 0.5rem;
        }

        .btn-read {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-read:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <header>Hallo Admin</header>
        <nav>
            <ul>
                <li><a href="index.php" id="dashboard">Dashboard</a></li>
                <li><a href="../buku/data-buku.php" id="dbuku">Data Pekerjaan</a></li>
                <li><a href="data-user.php" id="duser">Data User</a></li>

                <li><a href="../logout.php">LogOut</a></li>
            </ul>
        </nav>
    </div>

    <div class="top">
        <button class="btn btn-primary"><?php echo $dlogin->nama ?></button>
    </div>

    <div class="section">
        <div class="container">
            <div class="box">
                <div class="box-tbhdt">
                    <img src="../img/logo.png" alt="" id="img-logo">
                </div>
                <ul>
                    <li><strong>Dashboard</strong></li>
                    <li>Menu Dashboard adalah Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit earum
                        dicta
                        obcaecati ut vero neque veritatis sequi delectus in dolores.</li>
                    <li><strong>Data Buku</strong></li>
                    <li>Menu Data Buku adalah Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit earum
                        dicta
                        obcaecati ut vero neque veritatis sequi delectus in dolores.</li>
                    <li><strong>Data User</strong></li>
                    <li>Menu Data User adalah Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit earum
                        dicta
                        obcaecati ut vero neque veritatis sequi delectus in dolores.</li>
                    <li><strong>Peminjaman</strong></li>
                    <li>Menu Peminjaman adalah Lorem ipsum dolor sit amet consectetur, adipisicing elit. Impedit earum
                        dicta
                        obcaecati ut vero neque veritatis sequi delectus in dolores.</li>
                </ul>
                <a href="#" class="btn-read">Readmore...</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
