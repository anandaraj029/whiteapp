<?php
include_once('../file/config.php'); // Include database connection

// Define the base upload directory
$upload_dir = './uploads/'; // Relative path to the uploads folder

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

    // Create a folder for the inspector by name
    $inspector_folder = preg_replace('/\s+/', '_', strtolower($inspector_name)); // Replace spaces with underscores
    $target_dir = $upload_dir . $inspector_folder . '/images/';

    // Ensure the upload directory exists
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Define common file names
    $profile_photo = 'profile_image.jpg';
    $signature_photo = 'signature_image.jpg';

    // Profile Photo Upload
    $profile_photo_path = $target_dir . $profile_photo;
    if (!move_uploaded_file($_FILES['profile_photo']['tmp_name'], $profile_photo_path)) {
        die("Error uploading profile photo.");
    }

    // Signature Photo Upload
    $signature_photo_path = $target_dir . $signature_photo;
    if (!move_uploaded_file($_FILES['signature_photo']['tmp_name'], $signature_photo_path)) {
        die("Error uploading signature photo.");
    }

    // Database Insert (store only file names)
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
