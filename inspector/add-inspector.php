<?php
include_once('../file/config.php'); // Include database connection

// Define the upload directory using $url
 // Replace with the actual base path of your application
 $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/whiteapp/uploads/'; // Local filesystem path

if (isset($_POST['save_inspector'])) {
    $inspector_id = $_POST['inspector_id'];
    $inspector_name = $_POST['inspector_name'];
    $email = $_POST['email'];
    $handle_crane = isset($_POST['handle_crane']) ? serialize($_POST['handle_crane']) : null;
    $emp_id = $_POST['emp_id'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $city = $_POST['city'];

    // Ensure the upload directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Profile Photo Upload
    $profile_photo = time() . '_profile_' . basename($_FILES['profile_photo']['name']);
    $profile_photo_path = $upload_dir . $profile_photo;

    if (!move_uploaded_file($_FILES['profile_photo']['tmp_name'], $profile_photo_path)) {
        die("Error uploading profile photo.");
    }

    // Signature Photo Upload
    $signature_photo = time() . '_signature_' . basename($_FILES['signature_photo']['name']);
    $signature_photo_path = $upload_dir . $signature_photo;

    if (!move_uploaded_file($_FILES['signature_photo']['tmp_name'], $signature_photo_path)) {
        die("Error uploading signature photo.");
    }

    // Database Insert
    $sql = "INSERT INTO inspectors (inspector_id, inspector_name, email, handle_crane, emp_id, mobile, password, address, city, profile_photo, signature_photo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss", $inspector_id, $inspector_name, $email, $handle_crane, $emp_id, $mobile, $password, $address, $city, $profile_photo, $signature_photo);

    if ($stmt->execute()) {
        echo "<script>alert('Inspector added successfully!'); window.location.href = './all-inspector.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
