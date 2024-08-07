<?php
require_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $alamat_domisili = $_POST['alamat_domisili'];
    $universitas = $_POST['universitas'];
    $status = 'Sedang Ditinjau';

    // Proses upload PDF proposal
    $target_dir_proposal = "../uploads/proposal/";
    if (!file_exists($target_dir_proposal)) {
        mkdir($target_dir_proposal, 0777, true);
    }
    $new_file_name_proposal = uniqid('proposal_', true) . '.pdf';
    $target_file_proposal = $target_dir_proposal . $new_file_name_proposal;
    move_uploaded_file($_FILES["pdf_proposal"]["tmp_name"], $target_file_proposal);

    // Proses upload PDF surat
    $target_dir_ktm = "../uploads/ktm/";
    if (!file_exists($target_dir_ktm)) {
        mkdir($target_dir_ktm, 0777, true);
    }
    $new_file_name_ktm = uniqid('ktm_', true) . '.pdf';
    $target_file_ktm = $target_dir_ktm . $new_file_name_ktm;
    move_uploaded_file($_FILES["pdf_ktm"]["tmp_name"], $target_file_ktm);

    // Proses upload PDF surat
    $target_dir_surat = "../uploads/surat/";
    if (!file_exists($target_dir_surat)) {
        mkdir($target_dir_surat, 0777, true);
    }
    $new_file_name_surat = uniqid('surat_', true) . '.pdf';
    $target_file_surat = $target_dir_surat . $new_file_name_surat;
    move_uploaded_file($_FILES["pdf_surat"]["tmp_name"], $target_file_surat);

    // Proses upload PDF ktp
    $target_dir_ktp = "../uploads/ktp/";
    if (!file_exists($target_dir_ktp)) {
        mkdir($target_dir_ktp, 0777, true);
    }
    $new_file_name_ktp = uniqid('ktp_', true) . '.pdf';
    $target_file_ktp = $target_dir_ktp . $new_file_name_ktp;
    move_uploaded_file($_FILES["pdf_ktp"]["tmp_name"], $target_file_ktp);

    // Generate nomor tracking
    $tracking_number = "PENELITIAN" . time() . rand(1000, 9999);

    // Simpan data ke database
    $stmt = $conn->prepare("INSERT INTO penelitian (nama, nik, no_hp, email, alamat_domisili, 
        universitas, ktp_path, ktm_path, pdf_path, proposal_path, status, tracking_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $nama, $nik, $no_hp, $email, $alamat_domisili, $universitas, 
        $target_file_ktp, $target_file_ktm, $target_file_surat, $target_file_proposal, $status, $tracking_number);

    $stmt->execute();
    $stmt->close();

    // Redirect to a confirmation page
    header("Location: confirmation.php?tracking_number=" . $tracking_number);
    exit();
}

$conn->close();
?>
