<?php
$servername = "kanwil-permohonan-db";
$username = "permohonan"; // Ganti dengan username MySQL Anda
$password = "y06y4k4rt4"; // Ganti dengan password MySQL Anda
$dbname = "permohonan"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
