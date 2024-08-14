<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php">Kelola Berita <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="show-kontak.php">Tampil Pesan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center">Kelola Berita</h2>
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Latest Posts</span>
                        <a href="tambah-berita.php"><button class="btn btn-primary">Tambah Data</button></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>JUDUL</th>
                                    <th>WAKTU</th>
                                    <th>GAMBAR</th>
                                    <th>DESKRIPSI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
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

                                // Ambil data dari tabel berita
                                $sql = "SELECT judul, waktu, gambar, deskripsi FROM tb_berita";
                                $result = $connect->query($sql);

                                if ($result->num_rows > 0) {
                                    // Loop melalui data dan tampilkan di tabel
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["judul"] . "</td>";
                                        echo "<td>" . $row["waktu"] . "</td>";
                                        echo "<td><img src='" . $row["gambar"] . "' alt='Gambar' style='width: 100px;'></td>";
                                        echo "<td>" . $row["deskripsi"] . "</td>";
                                        echo "<td>
                                                <a href='edit-berita.php?judul=" . $row["judul"] . "'><button class='btn btn-warning btn-sm'>Edit</button></a>
                                                <a href='hapus-berita.php?judul=" . $row["judul"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus berita ini?\")'><button class='btn btn-danger btn-sm'>Hapus</button></a>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>Tidak ada data berita</td></tr>";
                                }

                                $connect->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>