<?php
include '../file/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $rep_name = $_POST['rep_name'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $city = $_POST['city'];
    $info_correct = isset($_POST['info_correct']) ? 1 : 0;

    $uploadDir = '../uploads/profile_photos/';
    $signatureDir = '../uploads/signatures/';
    $filePath = null;
    $signaturePath = null;

    // Create directories if they don't exist
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
    if (!is_dir($signatureDir)) mkdir($signatureDir, 0777, true);

    // Profile Photo Upload
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === 0) {
        $fileName = time() . '_profile_' . basename($_FILES['profile_photo']['name']);
        $filePath = $uploadDir . $fileName;
        move_uploaded_file($_FILES['profile_photo']['tmp_name'], $filePath);
    } else {
        echo "Error uploading profile photo.";
    }

    // Signature Photo Upload
    if (isset($_FILES['signature_photo']) && $_FILES['signature_photo']['error'] === 0) {
        $signatureName = time() . '_signature_' . basename($_FILES['signature_photo']['name']);
        $signaturePath = $signatureDir . $signatureName;
        move_uploaded_file($_FILES['signature_photo']['tmp_name'], $signaturePath);
    } else {
        echo "Error uploading signature.";
    }

    // Auto-generate customer_id
    $result = $conn->query("SELECT MAX(cus_id) AS last_id FROM customers");
    $row = $result->fetch_assoc();
    $last_id = isset($row['last_id']) ? (int)$row['last_id'] : 0;
    $new_id = str_pad($last_id + 1, 3, "0", STR_PAD_LEFT); // 001, 002, 003

    // Insert data into the database
    $sql = "INSERT INTO customers (cus_id, customer_name, email, company, rep_name, mobile, password, address, city, info_correct, profile_photo, signature_photo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssss", $new_id, $customer_name, $email, $company, $rep_name, $mobile, $password, $address, $city, $info_correct, $filePath, $signaturePath);

    if ($stmt->execute()) {
        echo "Customer added successfully with ID $new_id and files uploaded!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
