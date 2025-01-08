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

    $uploadDir = '/uploads/profile_photos/';
    $signatureDir = '/uploads/signatures/';
    $filePath = null;
    $signaturePath = null;

    // Profile Photo Upload
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] == 0) {
        $fileName = time() . '_profile_' . basename($_FILES['profile_photo']['name']);
        $filePath = $uploadDir . $fileName;
        move_uploaded_file($_FILES['profile_photo']['tmp_name'], $filePath);
    }

    // Signature Photo Upload
    if (isset($_FILES['signature_photo']) && $_FILES['signature_photo']['error'] == 0) {
        $signatureName = time() . '_signature_' . basename($_FILES['signature_photo']['name']);
        $signaturePath = $signatureDir . $signatureName;
        move_uploaded_file($_FILES['signature_photo']['tmp_name'], $signaturePath);
    }

    // Update query logic
    if ($filePath && $signaturePath) {
        $sql = "UPDATE customers SET customer_name=?, email=?, company=?, rep_name=?, mobile=?, address=?, city=?, profile_photo=?, signature_photo=? WHERE cus_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssss", $customer_name, $email, $company, $rep_name, $mobile, $address, $city, $filePath, $signaturePath, $cus_id);
    } elseif ($filePath) {
        $sql = "UPDATE customers SET customer_name=?, email=?, company=?, rep_name=?, mobile=?, address=?, city=?, profile_photo=? WHERE cus_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $customer_name, $email, $company, $rep_name, $mobile, $address, $city, $filePath, $cus_id);
    } elseif ($signaturePath) {
        $sql = "UPDATE customers SET customer_name=?, email=?, company=?, rep_name=?, mobile=?, address=?, city=?, signature_photo=? WHERE cus_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $customer_name, $email, $company, $rep_name, $mobile, $address, $city, $signaturePath, $cus_id);
    } else {
        $sql = "UPDATE customers SET customer_name=?, email=?, company=?, rep_name=?, mobile=?, address=?, city=? WHERE cus_id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $customer_name, $email, $company, $rep_name, $mobile, $address, $city, $cus_id);
    }

    if ($stmt->execute()) {
        echo "Customer updated successfully!";
        header("Location: customer-list.php");
    } else {
        echo "Error updating customer: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
