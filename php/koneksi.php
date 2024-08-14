<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sekolah";

// Buat koneksi
$connect = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}
?>