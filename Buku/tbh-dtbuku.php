<?php
include('../admin/sesi-admin.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data </title>
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

        .main-content h2 {
            margin-bottom: 1rem;
        }

        .box-tbhdt {
            max-width: 600px; /* Lebar maksimum form */
        }

        .box-tbhdt label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .box-tbhdt input[type="text"],
        .box-tbhdt input[type="file"] {
            width: 100%;
            padding: 0.5rem;
            font-size: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
        }

        .box-tbhdt .btn-all {
            background-color: #007bff; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .box-tbhdt .btn-all:hover {
            background-color: #0056b3; /* Warna latar belakang saat hover */
        }

        .box-tbhdt .p-profil {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <header>VSGA_POlije</header>
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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="box-tbhdt">
                    <h2>Tambah Data Pekerjaan</h2>
                    <label for="judul">Nama Pekerjaan</label>
                    <input type="text" name="judul" id="judul" class="tbh-content" autocomplete="on" required>
                    <label for="penerbit">Deskripsi singkat</label>
                    <input type="text" name="penerbit" id="penerbit" class="tbh-content" autocomplete="on" required>
                    <label for="pengarang">Deskripsi Lengkap</label>
                    <input type="text" name="pengarang" id="pengarang" class="tbh-content" autocomplete="on" required>
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="tbh-img">
                    <button name="submit" id="submit" class="btn-all">SUBMIT</button>
                    <p class="p-profil"><a href="data-buku.php">&lt; Back</a></p>
                </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                include '../db.php';

                $judul = $_POST['judul'];
                $penerbit = $_POST['penerbit'];
                $pengarang = $_POST['pengarang'];

                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                $type1 = explode('.', $filename);
                $type2 = $type1[1];
                $newname = 'Buku-' . $judul . '.' . $type2;

                $allowed_types = array('jpg', 'jpeg', 'png', 'PNG');

                if (!in_array($type2, $allowed_types)) {
                    echo '<script>alert("Tipe file tidak didukung")</script>';
                } else {
                    $insert = mysqli_query($conn, "INSERT INTO tb_buku (judul, penerbit, pengarang, gambar) VALUES (
                        '$judul',
                        '$penerbit',
                        '$pengarang',
                        '$newname'
                    )");

                    if ($insert) {
                        move_uploaded_file($tmp_name, '../buku/img/' . $newname);
                        echo '<script>alert("Buku berhasil ditambahkan")</script>';
                        echo '<script>window.location="data-buku.php"</script>';
                    } else {
                        echo 'gagal' . mysqli_error($conn);
                    }
                }
            }
            ?>

        </div>
    </div>

</body>

</html>
