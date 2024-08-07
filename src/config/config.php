<?php
$servername = "kanwil-permohonan-db";
$username = "permohonan"; // ganti dengan username database Anda
$password = "y06y4k4rt4"; // ganti dengan password database Anda
$dbname = "permohonan";

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
