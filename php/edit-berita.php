<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Berita</h2>
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

        // Ambil data berita berdasarkan judul
        $judul = $_GET['judul'];
        $sql = "SELECT * FROM tb_berita WHERE judul='$judul'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>
        <form action="proses-edit-berita.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="old_judul" value="<?php echo $row['judul']; ?>">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul']; ?>" required>
            </div>
            <div class="form-group">
                <label for="waktu">Waktu:</label>
                <input type="date" class="form-control" id="waktu" name="waktu" value="<?php echo $row['waktu']; ?>" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required><?php echo $row['deskripsi']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="gambar">Gambar:</label>
                <input type="file" class="form-control-file" id="gambar" name="gambar">
                <img src="<?php echo $row['gambar']; ?>" alt="Gambar" style="width: 100px; margin-top: 10px;">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
        <?php
        } else {
            echo "Berita tidak ditemukan.";
        }

        $connect->close();
        ?>
    </div>
</body>
</html>