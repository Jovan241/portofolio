<?php
header('Content-Type: application/json');
$host = "localhost";
$user = "root";
$pass = "";
$db   = "portofolio_20242031";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    echo json_encode(['status' => 'error', 'pesan' => 'Koneksi database gagal']);
    exit;
}

if (isset($_POST['email']) && isset($_POST['pesan'])) {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

    $sql = "INSERT INTO message (email, pesan) VALUES ('$email', '$pesan')";
    
    if (mysqli_query($koneksi, $sql)) {
        echo json_encode(['status' => 'sukses', 'pesan' => 'Pesan Anda berhasil dikirim!']);
    } else {
        echo json_encode(['status' => 'error', 'pesan' => 'Gagal menyimpan ke database.']);
    }
} else {
    echo json_encode(['status' => 'error', 'pesan' => 'Akses tidak sah.']);
}
?>