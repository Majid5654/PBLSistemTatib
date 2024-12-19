<?php
class Database {
    private $serverName = "LAPTOP-9JC0I58P"; // Ganti dengan server SQL Server Anda
    private $database = "PBLSistemTatib";   // Ganti dengan nama database Anda
    private $username = "";                 // Ganti dengan username SQL Server Anda
    private $password = "";                 // Ganti dengan password SQL Server Anda
    public $conn;

    // Method untuk membuat koneksi
    public function connect() {
        $this->conn = null;

        try {
            // Konfigurasi DSN untuk SQL Server
            $dsn = "sqlsrv:Server=" . $this->serverName . ";Database=" . $this->database;

            // Membuat koneksi PDO
            $this->conn = new PDO($dsn, $this->username, $this->password);

            // Mengatur mode error PDO
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Koneksi berhasil!";
        } catch (PDOException $e) {
            // Menangkap dan menampilkan error koneksi
            echo "Koneksi gagal: " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>
