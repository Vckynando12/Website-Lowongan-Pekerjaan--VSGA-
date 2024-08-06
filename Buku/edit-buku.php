<?php
include '../admin/sesi-admin.php';
include '../db.php';

// Ambil data buku berdasarkan ID yang diterima dari parameter GET
$id = $_GET['id'];
$buku = mysqli_query($conn, "SELECT * FROM tb_buku WHERE id = '$id'");
if (mysqli_num_rows($buku) == 0) {
    echo '<script>alert("Data yang Anda cari tidak ada")</script>';
    echo '<script>window.location="data-buku.php"</script>';
}
$b = mysqli_fetch_object($buku);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data </title>
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

        .main-content h2 {
            margin-bottom: 1rem;
        }

        .box-tbhdt {
            margin-top: 2rem;
            max-width: 600px; /* Lebar maksimum form */
        }

        .box-tbhdt label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .box-tbhdt input[type="text"],
        .box-tbhdt textarea {
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

        .p-profil {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <header>VSGA_POlije</header>
        <ul>
            <li><a href="../admin/index.php" id="dashboard">Dashboard</a></li>
            <li><a href="data-buku.php" id="dbuku">Data Buku</a></li>
            <li><a href="../admin/data-user.php" id="duser">Data User</a></li>

            <li><a href="../logout.php">LogOut</a></li>
        </ul>
    </div>

    <div class="top">
        <button><?php echo $dlogin->nama ?></button>
    </div>

    <div class="main-content">
        <div class="box">
            <form action="" method="POST">
                <div class="box-tbhdt">
                    <h2>Edit Data Buku</h2>
                    <label for="judul">Judul Buku</label>
                    <input type="text" name="judul" id="judul" class="tbh-content" autocomplete="on" required
                        value="<?php echo $b->judul ?>">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" class="tbh-content" autocomplete="on" required
                        value="<?php echo $b->penerbit ?>">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" name="pengarang" id="pengarang" class="tbh-content" autocomplete="on" required
                        value="<?php echo $b->pengarang ?>">
                    <button name="submit" id="submit" class="btn-all">SUBMIT</button>
                    <p class="p-profil"><a href="data-buku.php">&lt; Back</a></p>
                </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $judul = ucwords($_POST['judul']);
                $penerbit = ucwords($_POST['penerbit']);
                $pengarang = ucwords($_POST['pengarang']);

                $update = mysqli_query($conn, "UPDATE tb_buku SET
                    judul = '$judul',
                    penerbit = '$penerbit',
                    pengarang = '$pengarang'
                    WHERE id = '$b->id'
                ");

                if ($update) {
                    echo '<script>alert("Data berhasil diubah")</script>';
                    echo '<script>window.location="data-buku.php"</script>';
                } else {
                    echo '<script>alert("Gagal mengubah data")</script>';
                }
            }
            ?>
        </div>
    </div>

</body>

</html>
