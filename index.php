<?php

require 'functions.php';

session_start();

if ( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Menu Admin</h1>
    <p>Silakan pilih aktifitas yang ingin dilakukan dengan mengklik menu yang tersedia.</p>
    <?php navigator(); ?>
</body>
</html>