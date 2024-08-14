<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sekolah";

// Koneksi ke database
$connect = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}

// Ambil judul dari parameter URL
$judul = $_GET['judul'];

// Ambil data gambar untuk dihapus dari direktori
$sql = "SELECT gambar FROM tb_berita WHERE judul='$judul'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $gambar = $row['gambar'];

    // Hapus gambar dari direktori
    if (file_exists($gambar)) {
        unlink($gambar);
    }

    // Hapus data dari tabel
    $sql = "DELETE FROM tb_berita WHERE judul='$judul'";
    if ($connect->query($sql) === TRUE) {
        echo "<script>alert('Berita berhasil dihapus.'); window.location.href='admin.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
} else {
    echo "Berita tidak ditemukan.";
}

$connect->close();
?>