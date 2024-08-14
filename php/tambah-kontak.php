<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sekolah";

// Buat koneksi
$connect = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Escape input untuk menghindari SQL Injection
    $nama = $connect->real_escape_string($nama);
    $email = $connect->real_escape_string($email);
    $pesan = $connect->real_escape_string($pesan);

    // Query untuk menyimpan data ke tabel kontak
    $sql = "INSERT INTO tb_kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='../index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$connect->close();
?>