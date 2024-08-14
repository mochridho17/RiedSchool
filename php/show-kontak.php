<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kontak</title>
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
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Kelola Berita</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="tampil-kontak.php">Tampil Pesan <span class="sr-only">(current)</span></a>
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
                <h2 class="text-center">Tampil Pesan</h2>
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Latest Messages</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>EMAIL</th>
                                    <th>PESAN</th>
    
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

                                // Ambil data dari tabel kontak
                                $sql = "SELECT nama, email, pesan FROM tb_kontak";
                                $result = $connect->query($sql);

                                if ($result->num_rows > 0) {
                                    // Loop melalui data dan tampilkan di tabel
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row["nama"] . "</td>";
                                        echo "<td>" . $row["email"] . "</td>";
                                        echo "<td>" . $row["pesan"] . "</td>";
                                       
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>Tidak ada pesan</td></tr>";
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