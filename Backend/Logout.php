<?php
session_start(); // Mulai sesi


session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

header("Location: ../Frontend/Login.php");
exit();
?>
