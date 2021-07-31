<?php

function db_conn() {
    $conn = new mysqli('localhost', 'root', '', 'db_darkhorse');
    return $conn;
}

function show_error($message) { ?>
    <div style="background-color: #faebd7; padding: 10px; border: 1px solid red;margin: 15px 0px; width:fit-content">
        <?= $message; ?>
    </div>
<?php }

function query($query) {

    $conn = db_conn();
    $res = $conn->query($query); // mysqli_query($conn, $query);
    $rows = [];

    // mysqli_fetch_assoc($res)
    while ( $row = $res->fetch_assoc() ) {

        $rows[] = $row;

    }

    return $rows;
}

// fungsi untuk db barang

function tambah_barang($data) {
    
    $conn = db_conn();

    if ($conn->connect_errno == 0) {

        $kode_barang = htmlspecialchars($data["kode_barang"]);
        $nama_barang = htmlspecialchars($data["nama_barang"]);
        $modal = htmlspecialchars($data["modal"]);
        $harga_jual = htmlspecialchars($data["harga_jual"]);
        $stok = htmlspecialchars($data["stok"]);

        $query = "INSERT INTO t_barang
        VALUES
        ('$kode_barang', '$nama_barang', '$modal', '$harga_jual', '$stok')";

        // perform a query
        $conn->query($query);
        return $conn->affected_rows;
        
    } else {

        return "Gagal : ".$conn->error."<br>";
    
    }
}

function ubah_barang($data) {
    $conn = db_conn();

    if ($conn->connect_errno == 0) {

        $kode_barang = htmlspecialchars($data["kode_barang"]);
        $nama_barang = htmlspecialchars($data["nama_barang"]);
        $modal = htmlspecialchars($data["modal"]);
        $harga_jual = htmlspecialchars($data["harga_jual"]);
        $stok = htmlspecialchars($data["stok"]);

        $query = "UPDATE t_barang SET
        nama_barang='$nama_barang',
        modal='$modal',
        harga_jual='$harga_jual',
        stok='$stok'
        WHERE kode_barang='$kode_barang'";

        // eksekusi query
        $conn -> query($query);
        return $conn->affected_rows;
    } else {
        return 'Gagal : '.$conn->error.'<br>';
    }
}

function hapus_barang($data) {
    $conn = db_conn();

    if ($conn->connect_errno == 0) {
        $query = "DELETE FROM t_barang WHERE kode_barang='$data'";
        $conn->query($query);
        return $conn->affected_rows;
    } else {
        return 'Gagal : '.$conn->error.'<br>';
    }
}

// fungsi untuk db pembeli

function tambah_pembeli($data) {
    
    $conn = db_conn();

    if ($conn->connect_errno == 0) {

        $id_pembeli = htmlspecialchars($data["id_pembeli"]);
        $nama_pembeli = htmlspecialchars($data["nama_pembeli"]);
        $alamat_pembeli = htmlspecialchars($data["alamat_pembeli"]);
        $no_hp = htmlspecialchars($data["no_hp"]);

        $query = "INSERT INTO t_pembeli 
        VALUES
        ('$id_pembeli', '$nama_pembeli', '$alamat_pembeli', '$no_hp')";

        // perform a query
        $conn->query($query);
        return $conn->affected_rows;
        
    } else {

        return "Gagal : ".$conn->error."<br>";
    
    }
}

function tambah_pembelian($data) {
    $conn = db_conn();

    if ($conn->connect_errno == 0) {
        $id_pembeli = htmlspecialchars($data["id_pembeli"]);
        $kode_barang = htmlspecialchars($data["barang"]);
        $qty = htmlspecialchars($data["qty"]);
        $total_harga = htmlspecialchars($data["total_harga"]);

        $query = "INSERT INTO t_pembelian (id_pembeli, kode_barang, qty, total_harga) 
        VALUES
        ('$id_pembeli', '$kode_barang', '$qty', '$total_harga')";

        // perform a query
        $conn->query($query);
        return $conn->affected_rows;
    } else {
        return "Gagal : ".$conn->error."<br>";
    }
}

// function ubah_pembeli($data) {
//     $conn = db_conn();

//     if ($conn->connect_errno == 0) {

//         $id_pembeli = htmlspecialchars($data["id_pembeli"]);
//         $nama_pembeli = htmlspecialchars($data["nama_pembeli"]);
//         $alamat_pembeli = htmlspecialchars($data["alamat_pembeli"]);
//         $no_hp = htmlspecialchars($data["no_hp"]);

//         $query = "UPDATE t_pembeli SET
//         nama_pembeli='$nama_pembeli',
//         alamat_pembeli='$alamat_pembeli',
//         no_hp='$no_hp' 
//         WHERE id_pembeli='$id_pembeli'";

//         // eksekusi query
//         $conn -> query($query);
//         return $conn->affected_rows;
//     } else {
//         return 'Gagal : '.$conn->error.'<br>';
//     }
// }

// function hapus_pembeli($data) {
//     $conn = db_conn();

//     if ($conn->connect_errno == 0) {
//         $query = "DELETE FROM t_barang WHERE kode_barang='$data'";
//         $conn->query($query);
//         return $conn->affected_rows;
//     } else {
//         return 'Gagal : '.$conn->error.'<br>';
//     }
// }

function navigator() { ?>
    | <a href="index.php">Home</a> | <a href="barang.php">Barang</a> | <a href="pembeli.php">Pembeli</a> | <a href="pembelian.php">Pembelian</a> | <a href="pembayaran.php">Pembayaran</a> | <a href="logout.php">Logout</a>
<?php }