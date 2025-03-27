<?php
include ('../file/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cus_id = $_POST['cus_id'];
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    // $company = $_POST['company'];
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

    // Initialize password variable
    $hashed_password = null;

    // Password update logic
    if (!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['retype_password'])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $retype_password = $_POST['retype_password'];

        // Fetch the existing password hash from customers table
        $sql = "SELECT password FROM customers WHERE cus_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $cus_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $customer = $result->fetch_assoc();
        $stmt->close();

        if (!$customer || !password_verify($old_password, $customer['password'])) {
            echo "Old password is incorrect!";
            exit;
        }

        if ($new_password !== $retype_password) {
            echo "New password and retype password do not match!";
            exit;
        }

        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Fetch the corresponding user_id from customers table
        $sql_user_id = "SELECT user_id FROM customers WHERE cus_id = ?";
        $stmt_user_id = $conn->prepare($sql_user_id);
        $stmt_user_id->bind_param("s", $cus_id);
        $stmt_user_id->execute();
        $result_user_id = $stmt_user_id->get_result();
        $user = $result_user_id->fetch_assoc();
        $stmt_user_id->close();

        if (!$user) {
            echo "User ID not found for this customer!";
            exit;
        }

        $user_id = $user['user_id']; // Extract user_id
    }

    // Update customer details in the database
    $conn->begin_transaction();
    try {
        $sql = "UPDATE customers SET customer_name=?, email=?, rep_name=?, mobile=?, address=?, city=?";
        $params = [$customer_name, $email, $rep_name, $mobile, $address, $city];
        $types = "ssssss";

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

        if (!empty($hashed_password)) {
            $sql .= ", password=?";
            $params[] = $hashed_password;
            $types .= "s";
        }

        $sql .= " WHERE cus_id=?";
        $params[] = $cus_id;
        $types .= "s";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();

        // If password is updated, update in users table as well
        if (!empty($hashed_password)) {
            $sql_users = "UPDATE users SET password=? WHERE user_id=?";
            $stmt_users = $conn->prepare($sql_users);
            $stmt_users->bind_param("ss", $hashed_password, $user_id);
            $stmt_users->execute();
            $stmt_users->close();
        }

        $conn->commit();
        echo "Customer updated successfully!";
        header("Location: customer-list.php");
        exit;
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error updating customer: " . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
?>