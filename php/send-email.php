<?php
// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Konfigurasi email
    $to = 'recipient@example.com'; // Ganti dengan alamat email penerima
    $subject = 'Pesan dari Formulir Kontak';
    $message = "Nama: $nama\nEmail: $email\nPesan: $pesan";
    $headers = "From: your_email@example.com"; // Ganti dengan alamat email pengirim

    // Kirim email
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='index.html';</script>";
    } else {
        echo "Pesan tidak dapat dikirim.";
    }
}
?>