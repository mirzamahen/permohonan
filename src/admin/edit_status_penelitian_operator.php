<?php
session_start();
require 'includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Update status in the database
    $update_sql = "UPDATE penelitian SET status = '$status' WHERE id = $id";
    if ($conn->query($update_sql) === TRUE) {
        // Redirect to magang_administrator.php
        header("Location: penelitian_operator.php");
        exit; // Ensure that no other code is executed after redirection
    } else {
        echo "Error updating status: " . $conn->error;
    }
}

$conn->close();
?>

