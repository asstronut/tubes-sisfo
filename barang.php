<?php

session_start();

if ( !isset($_SESSION['login']) ) {
    header('Location: login.php');
    exit;
}

require 'functions.php';

$query = "SELECT * FROM t_barang";

// eksekusi query
$res = query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>
    <?php navigator(); ?>

    <h1>Data Barang</h1>

    <a href="tambah-barang.php">Tambah Data</a><br>

    <form action="" method="POST">
        <input type="text" name="keyword" id="keyword" autofocus placeholder="Cari" autocomplete="off">
        <button type="submit" name="bt-cari" id="bt-cari">Cari</button>
    </form>

    <div id="container">

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Modal</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
    
            <?php foreach($res as $row) : ?>
                <tr>
                    <td><?= $row['kode_barang']; ?></td>
                    <td><?= $row['nama_barang']; ?></td>
                    <td><?= $row['modal']; ?></td>
                    <td><?= $row['harga_jual']; ?></td>
                    <td><?= $row['stok']; ?></td>
                    <td>
                        <a href="ubah-barang.php?kode_barang=<?= $row['kode_barang']; ?>">Edit</a> | <a href="hapus-barang.php?kode_barang=<?= $row['kode_barang']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>

    <!-- <script src="js/jquery-3.6.0.js"></script>
    <script src="js/script.js"></script> -->
</body>
</html>