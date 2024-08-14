<?php
include 'koneksi.php';

// Ambil data dari tabel berita
$sql = "SELECT judul, waktu, gambar, deskripsi FROM tb_berita";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 col-sm-4">';
        echo '    <div class="item">';
        echo '        <div class="tst-image">';
        echo '            <img src="uploads/' . $row["gambar"] . '" class="img-responsive" alt="">';
        echo '        </div>';
        echo '        <div class="tst-author">';
        echo '            <h4>' . $row["judul"] . '</h4>';
        echo '            <span>' . date("d F Y", strtotime($row["waktu"])) . '</span>';
        echo '        </div>';
        echo '        <p>' . $row["deskripsi"] . '</p>';
        echo '    </div>';
        echo '</div>';
    }
} else {
    echo '<p>Tidak ada berita.</p>';
}

$connect->close();
?>