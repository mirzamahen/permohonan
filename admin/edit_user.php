<?php
include 'includes/config.php';

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$nip = $_POST['nip'];
$role = $_POST['role'];

$sql = "UPDATE user SET username='$username', password= '$password',nama='$nama', nip='$nip', role='$role' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: user.php");
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
