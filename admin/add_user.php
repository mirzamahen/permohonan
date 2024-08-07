<?php
include 'includes/config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$role = $_POST['role'];

$sql = "INSERT INTO user (username, password, nama, nip, role) VALUES ('$username', '$password', '$nama', '$nip', '$role')";

if ($conn->query($sql) === TRUE) {
    header("Location: user.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
