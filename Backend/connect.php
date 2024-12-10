<?php
$serverName = "LAPTOP-309Q9DB4"; 
$database = "PBLSistemTatib";
$username = ""; 
$password = ""; 

try {
 
    $dsn = "sqlsrv:Server=$serverName;Database=$database";
    $conn = new PDO($dsn, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Koneksi berhasil!";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}


?>