<?php
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
$old_judul = $_POST['old_judul'];
$judul = $_POST['judul'];
$waktu = $_POST['waktu'];
$deskripsi = $_POST['deskripsi'];

// Proses upload gambar jika ada
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if ($_FILES["gambar"]["name"]) {
    $check = getimagesize($_FILES["gambar"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            // Update data dengan gambar baru
            $sql = "UPDATE tb_berita SET judul='$judul', waktu='$waktu', gambar='$target_file', deskripsi='$deskripsi' WHERE judul='$old_judul'";
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload gambar.";
            exit;
        }
    } else {
        echo "File yang diupload bukan gambar.";
        exit;
    }
} else {
    // Update data tanpa mengubah gambar
    $sql = "UPDATE tb_berita SET judul='$judul', waktu='$waktu', deskripsi='$deskripsi' WHERE judul='$old_judul'";
}

if ($connect->query($sql) === TRUE) {
    echo "<script>alert('Berita berhasil diupdate.'); window.location.href='admin.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>