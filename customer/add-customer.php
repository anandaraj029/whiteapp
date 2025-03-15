<?php
include '../file/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    // $company = $_POST['company'];
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

    // Check for existing customer by email or mobile number
    $checkSql = "SELECT cus_id FROM customers WHERE email = ? OR mobile = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("ss", $email, $mobile);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo "Error: Customer with this email or mobile number already exists.";
        $checkStmt->close();
        $conn->close();
        exit();
    }
    $checkStmt->close();

    // Auto-generate customer_id
    $result = $conn->query("SELECT MAX(cus_id) AS last_id FROM customers");
    $row = $result->fetch_assoc();
    $last_id = isset($row['last_id']) ? (int)$row['last_id'] : 0;
    $new_id = str_pad($last_id + 1, 3, "0", STR_PAD_LEFT); // Format as 001, 002, etc.

    // Profile Photo Upload
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === 0) {
        $filePath = $uploadDir . $new_id . '.png';
        move_uploaded_file($_FILES['profile_photo']['tmp_name'], $filePath);
    } 

    // Signature Photo Upload
    if (isset($_FILES['signature_photo']) && $_FILES['signature_photo']['error'] === 0) {
        $signaturePath = $signatureDir . $new_id . '.png';
        move_uploaded_file($_FILES['signature_photo']['tmp_name'], $signaturePath);
    } 

    // Insert data into the database
    $sql = "INSERT INTO customers (cus_id, customer_name, email, rep_name, mobile, password, address, city, info_correct, profile_photo, signature_photo) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $new_id, $customer_name, $email, $rep_name, $mobile, $password, $address, $city, $info_correct, $filePath, $signaturePath);

    if ($stmt->execute()) {
        header("Location: customer-list.php"); // Redirect to the list page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>