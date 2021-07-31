<?php

session_start();

if ( !isset($_SESSION['login']) ) {
    header('Location: login.php');
    exit;
}

require 'functions.php';

$query = "SELECT * FROM t_pembelian";
$res = query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembelian</title>
</head>
<body>
    <?php navigator(); ?>
    <h1>Data Pembelian</h1>

    <a href="tambah-pembelian.php">Tambah Pembelian</a>

    <form action="" method="post">
        <input type="text" name="keyword" id="keyword">
        <button type="submit" name="btn-cari" id="btn-cari">Cari!</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Id Pembelian</th>
            <th>Id Pembeli</th>
            <th>Nama Pembeli</th>
            <th>Barang</th>
            <th>Harga</th>
            <th>Qty.</th>
            <th>Total Harga</th>
        </tr>

        <?php foreach($res as $row) : ?>
            <tr>
                <td><?= $row['id_pembelian']; ?></td>
                <td><?= $row['id_pembeli']; ?></td>
                <?php
                $query = "SELECT nama_pembeli FROM t_pembeli WHERE id_pembeli='".$row['id_pembeli']."'";
                $pbeli = query($query)[0];
                ?>
                <td><?= $pbeli['nama_pembeli']; ?></td>
                <?php
                $query = "SELECT nama_barang, harga_jual FROM t_barang WHERE kode_barang='".$row['kode_barang']."'";
                $barang = query($query)[0];
                ?>
                <td><?= $row['kode_barang']. " - " .$barang['nama_barang']; ?></td>
                <td><?= $barang['harga_jual']; ?></td>
                <td><?= $row['qty']; ?></td>
                <td><?= $row['total_harga']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>