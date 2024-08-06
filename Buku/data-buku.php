<?php
include '../db.php';
include '../admin/sesi-admin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pekerjaan </title>
    <link rel="stylesheet" href="../style.css">
    <style>
        /* Styling for sidebar */
        .sidebar {
            background-color: #343a40; /* Warna latar belakang sidebar */
            color: white; /* Warna teks sidebar */
            height: 100vh;
            padding: 1rem;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px; /* Lebar sidebar */
            overflow-y: auto;
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
        }

        .main-content h1 {
            margin-bottom: 1rem;
        }

        .box-table {
            margin-top: 2rem;
        }

        .box-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .box-table th,
        .box-table td {
            padding: 0.75rem;
            text-align: left;
        }

        .box-table th {
            background-color: #007bff; /* Warna latar belakang header kolom */
            color: white; /* Warna teks header kolom */
        }

        .box-table td {
            border: 1px solid #dee2e6; /* Warna garis antar sel */
        }

        .box-table a {
            text-decoration: none;
            color: #007bff; /* Warna teks link */
            transition: color 0.3s ease;
        }

        .box-table a:hover {
            color: #0056b3; /* Warna teks link saat hover */
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <header>Hallo Admin</header>
        <ul>
            <li><a href="../admin/index.php" id="dashboard">Dashboard</a></li>
            <li><a href="data-buku.php" id="dbuku">Data Pekerjaan</a></li>
            <li><a href="../admin/data-user.php" id="duser">Data User</a></li>

            <li><a href="../logout.php">LogOut</a></li>
        </ul>
    </div>

    <div class="top">
        <button><?php echo $dlogin->nama ?></button>
    </div>

    <div class="main-content">
        <div class="box">
            <h1>Data Pekerjaan</h1>
            <a href="tbh-dtbuku.php"><button class="btn-tbh">Tambah Data</button></a>
            <div class="box-table">
                <table cellspacing="0" border="1px">
                    <thead>
                        <tr>
                            <th width="3%" align="center">No</th>
                            <th width="30%" align="center">Judul</th>
                            <th width="20%">Deskripsi Singkat</th>
                            <th width="13%">Deskripsi lengkap</th>
                            <th width="10%" align="center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $buku = mysqli_query($conn, "SELECT * FROM tb_buku ORDER BY id");
                        while ($row = mysqli_fetch_array($buku)) {
                        ?>
                        <tr>
                            <td align="center"><?php echo $no++ ?></td>
                            <td class="judul"><?php echo $row['judul'] ?></td>
                            <td class="Deskripsi Singkat"><?php echo $row['pengarang'] ?></td>
                            <td class="Deskripsi lengkap"><?php echo $row['penerbit'] ?></td>
                            <td align="center">
                                <a href="edit-buku.php?id=<?php echo $row['id'] ?>">Edit</a> ||
                                <a href="hapus-buku.php?id=<?php echo $row['id'] ?>"
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
