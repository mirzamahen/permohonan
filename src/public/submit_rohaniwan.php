<?php
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $instansi = $_POST['instansi'];
    $status_penjemputan = $_POST['status_penjemputan'];
    $status = 'Sedang Ditinjau';

    // Proses upload PDF Rohaniwan
    $target_dir_rohaniwan = "../uploads/rohaniwan/";
    if (!file_exists($target_dir_rohaniwan)) {
        mkdir($target_dir_rohaniwan, 0777, true);
    }
    $new_file_name_rohaniwan = uniqid('rohaniwan_', true) . '.pdf';
    $target_file_rohaniwan = $target_dir_rohaniwan . $new_file_name_rohaniwan;
    
    if (move_uploaded_file($_FILES["pdf_rohaniwan"]["tmp_name"], $target_file_rohaniwan)) {
        // Generate nomor tracking
        $tracking_number = "ROHANIWAN" . time() . rand(1000, 9999);

        // Simpan data ke database
        $stmt = $conn->prepare("INSERT INTO rohaniwan (nama, no_hp, email, instansi, status_penjemputan, rohaniwan_path, status, tracking_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nama, $no_hp, $email, $instansi, $status_penjemputan, $target_file_rohaniwan, $status, $tracking_number);

        if ($stmt->execute()) {
            // Redirect to a confirmation page
            header("Location: confirmation.php?tracking_number=" . $tracking_number);
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>