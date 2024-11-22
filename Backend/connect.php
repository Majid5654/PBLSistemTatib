<?php

$serverName = "localhost"; 
$database = "SistemTatib";
$username = "SA"; 
$password = "Arka@12345"; 

try {
 
    $dsn = "sqlsrv:Server=$serverName;Database=$database";
    $conn = new PDO($dsn, $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Koneksi berhasil!";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}




?>

