<?php
include ('../file/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cus_id = $_POST['cus_id'];
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $rep_name = $_POST['rep_name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    $uploadDir = '../uploads/profile_photos/';
    $signatureDir = '../uploads/signatures/';
    $profilePath = null;
    $signaturePath = null;

    // Ensure directories exist
    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
    if (!is_dir($signatureDir)) mkdir($signatureDir, 0777, true);

    // Profile Photo Upload
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0) {
        $profilePath = $uploadDir . $cus_id . '.png'; // Save as cus_id.png
        move_uploaded_file($_FILES['profile_photo']['tmp_name'], $profilePath);
    }

    // Signature Photo Upload
    if (isset($_FILES['signature_photo']) && $_FILES['signature_photo']['error'] == 0) {
        $signaturePath = $signatureDir . $cus_id . '.png'; // Save as cus_id.png
        move_uploaded_file($_FILES['signature_photo']['tmp_name'], $signaturePath);
    }

    // Update query logic
    $sql = "UPDATE customers SET customer_name=?, email=?, company=?, rep_name=?, mobile=?, address=?, city=?";
    $params = [$customer_name, $email, $company, $rep_name, $mobile, $address, $city];
    $types = "sssssss";

    if ($profilePath) {
        $sql .= ", profile_photo=?";
        $params[] = $profilePath;
        $types .= "s";
    }

    if ($signaturePath) {
        $sql .= ", signature_photo=?";
        $params[] = $signaturePath;
        $types .= "s";
    }

    $sql .= " WHERE cus_id=?";
    $params[] = $cus_id;
    $types .= "s";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        echo "Customer updated successfully!";
        header("Location: customer-list.php");
        exit;
    } else {
        echo "Error updating customer: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
