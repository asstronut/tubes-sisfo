<?php

session_start();

if ( !isset($_SESSION['login']) ) {
    header('Location: login.php');
    exit;
}

require 'functions.php';

$query = "SELECT * FROM t_pembeli";

// eksekusi query
$res = query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembeli</title>
</head>
<body>
    <?php navigator(); ?>
    <h1>Data Pembeli</h1>

    <form action="" method="POST">
        <input type="text" name="keyword" id="keyword" autofocus placeholder="Cari" autocomplete="off">
        <button type="submit" name="bt-cari" id="bt-cari">Cari!</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Id Pembeli</th>
            <th>Nama Pembeli</th>
            <th>Alamat Pembeli</th>
            <th>No. HP</th>
        </tr>
        
        <?php foreach($res as $row) : ?>
            <tr>
                <td><?= $row['id_pembeli']; ?></td>
                <td><?= $row['nama_pembeli']; ?></td>
                <td><?= $row['alamat_pembeli']; ?></td>
                <td><?= $row['no_hp']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>