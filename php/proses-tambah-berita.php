<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sekolah";

$connect = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($connect->connect_error) {
    die("Koneksi gagal: " . $connect->connect_error);
}

// Ambil data dari form
$judul = $_POST['judul'];
$waktu = $_POST['waktu'];
$deskripsi = $_POST['deskripsi'];

// Proses upload gambar
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Periksa apakah file gambar adalah gambar asli atau bukan
$check = getimagesize($_FILES["gambar"]["tmp_name"]);
if($check !== false) {
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        // Simpan data ke database
        $sql = "INSERT INTO tb_berita (judul, waktu, gambar, deskripsi) VALUES ('$judul', '$waktu', '$target_file', '$deskripsi')";

        if ($connect->query($sql) === TRUE) {
            echo "<script>alert('Berita berhasil ditambahkan.'); window.location.href='admin.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $connect->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengupload gambar.";
    }
} else {
    echo "File yang diupload bukan gambar.";
}

$connect->close();
?>