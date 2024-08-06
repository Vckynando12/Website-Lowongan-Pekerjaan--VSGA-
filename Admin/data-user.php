<?php
include('sesi-admin.php');
include '../db.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User </title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Styling for sidebar */
        .sidebar {
            background-color: #343a40; /* Warna latar belakang sidebar */
            color: white; /* Warna teks sidebar */
            height: 100%;
            padding: 1rem;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px; /* Lebar sidebar */
            overflow-y: auto;
            z-index: 100; /* Indeks z agar sidebar di atas konten utama */
        }

        .sidebar header {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            text-align: center;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 1rem;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.5rem;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #495057; /* Warna latar belakang saat hover */
        }

        /* Styling for top bar */
        .top {
            background-color: #e9ecef; /* Warna latar belakang top bar */
            padding: 0.5rem;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-left: 250px; /* Lebar sidebar */
            z-index: 10; /* Indeks z agar top bar di atas konten utama */
        }

        .top button {
            background-color: #007bff; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            border: none;
            padding: 0.5rem 1rem;
            margin-left: 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .top button:hover {
            background-color: #0056b3; /* Warna latar belakang saat hover */
        }

        /* Styling for main content */
        .main-content {
            margin-left: 250px; /* Lebar sidebar */
            padding: 1rem;
            margin-top: 3rem; /* Margin atas untuk menghindari tumpang tindih dengan sidebar */
        }

        .main-content h1 {
            margin-bottom: 1rem;
        }

        .box-table {
            margin-top: 1rem;
        }

        .box-table table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }

        .box-table th, .box-table td {
            padding: 0.75rem;
            text-align: left;
            border: 1px solid #ccc;
        }

        .box-table th {
            background-color: #007bff; /* Warna latar belakang header kolom */
            color: white; /* Warna teks header kolom */
        }

        .box-table td {
            background-color: #f8f9fa; /* Warna latar belakang sel */
        }

        .box-table a {
            color: #007bff; /* Warna teks tautan */
            text-decoration: none;
            margin-right: 0.5rem;
        }

        .box-table a:hover {
            text-decoration: underline; /* Garis bawah saat hover */
        }

        .btn-tbh {
            background-color: #28a745; /* Warna latar belakang tombol tambah */
            color: white; /* Warna teks tombol tambah */
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-tbh:hover {
            background-color: #218838; /* Warna latar belakang saat hover */
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <header>Hallo Admin</header>
        <ul>
            <li><a href="index.php" id="dashboard">Dashboard</a></li>
            <li><a href="../buku/data-buku.php" id="dbuku">Data Pekerjaan</a></li>
            <li><a href="data-user.php" id="duser">Data User</a></li>
            <li><a href="../logout.php">LogOut</a></li>
        </ul>
    </div>

    <div class="top">
        <button><?php echo $dlogin->nama ?></button>
    </div>

    <div class="main-content">
        <div class="box">
            <h1>Data User </h1>
            <a href="tbh-user.php"><button class="btn-tbh">Tambah User</button></a>
            <div class="box-table">
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Nama</th>
                            <th width="20%">Username</th>
                            <th width="15%">WA</th>
                            <th width="10%" align="center">Level Akses</th>
                            <th width="30%" align="center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $user = mysqli_query($conn, "SELECT * FROM tb_user ORDER BY id");
                        while ($row = mysqli_fetch_array($user)) {
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td class="nama"><?php echo $row['nama'] ?></td>
                            <td class="username"><?php echo $row['username'] ?></td>
                            <td class="no_wa"><?php echo $row['no_wa'] ?></td>
                            <td class="level" align="center"><?php echo $row['level'] ?></td>
                            <td align="center">
                                <a href="edit-user.php?id=<?php echo $row['id'] ?>">Edit</a> ||
                                <a href="hapus-user.php?id=<?php echo $row['id'] ?>"
                                    onclick="return confirm('Yakin untuk mengahapus data ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
