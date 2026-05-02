<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $ket = $_POST['keterangan'];

    mysqli_query($conn, "UPDATE barang SET
        nama_barang='$nama',
        jumlah='$jumlah',
        keterangan='$ket'
        WHERE id='$id'
    ");

    header("Location: dashboard.php");
}
?>
    
<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="col-md-6 mx-auto">

        <div class="card shadow">
            <div class="card-header text-center">
                <h4>Edit Barang</h4>
            </div>

            <div class="card-body">

                <form method="POST">

                    <div class="mb-3">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control"
                               value="<?= $row['nama_barang']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control"
                               value="<?= $row['jumlah']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label>Keterangan</label>
                        <textarea name="keterangan" class="form-control"><?= $row['keterangan']; ?></textarea>
                    </div>

                    <button class="btn btn-primary w-100" name="update">Update</button>

                    <a href="dashboard.php" class="btn btn-secondary w-100 mt-2">Kembali</a>

                </form>

            </div>
        </div>

    </div>
</div>

</body>
</html>