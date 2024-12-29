<?php
include_once('../file/config.php');

// Include your database connection file

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

    // Handling File Uploads
    $profile_photo = $_FILES['profile_photo']['name'];
    $signature_photo = $_FILES['signature_photo']['name'];
    move_uploaded_file($_FILES['profile_photo']['tmp_name'], "../uploads/$profile_photo");
    move_uploaded_file($_FILES['signature_photo']['tmp_name'], "../uploads/$signature_photo");

    // Insert data into the database
    $sql = "INSERT INTO inspectors (inspector_id, inspector_name, email, handle_crane, emp_id, mobile, password, address, city, profile_photo, signature_photo)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $inspector_name, $email, $handle_crane, $emp_id, $mobile, $password, $address, $city, $profile_photo, $signature_photo);

    if ($stmt->execute()) {
        echo "<script>alert('Inspector added successfully!'); window.location.href = './all-inspector.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>
