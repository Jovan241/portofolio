<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portofolio_20242031";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    echo json_encode(null);
    exit;
}

$sql = "SELECT 5star, 4star, 3star, 2star, 1star FROM rating";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    
    // Kirim data dalam format JSON ke JavaScript
    echo json_encode([
        'star5' => (int)$row['5star'],
        'star4' => (int)$row['4star'],
        'star3' => (int)$row['3star'],
        'star2' => (int)$row['2star'],
        'star1' => (int)$row['1star']
    ]);
} else {
    echo json_encode(null);
}
?>