<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "sistemtatatertib";

$db = mysqli_connect($server,$user,$password,$dbname);

if (!$db){
    die("Koneksi gagal: " . mysqli_connect_error());
}
else{
    echo "Koneksi Berhasil";
}

?>