<?php

session_start();

if ( isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
}

require 'functions.php';

if ( isset($_POST["login"]) ) {
    
    $username = $_POST["username"];
    $pass = $_POST["pass"];

    $conn = db_conn();
    $query = "SELECT * FROM t_karyawan WHERE id_karyawan='$username'";

    // eksekusi query
    $res = $conn->query($query);

    // cek username
    if ($res->num_rows === 1) {

        // cek password
        $row = $res->fetch_assoc();

        if ( $pass == $row["pass"] ) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;

            header("Location: index.php");
            exit;
        }
    }

    $error = true;


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DarkHorse</title>
</head>
<body>
    <h1>Login</h1>

    <?php

    if (isset($error)) {
        show_error("Username/Password salah");
    }

    ?>

    <form action="" method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Username" autofocus autocomplete="off">
        
        <br>
        
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass" placeholder="Password">

        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>