<?php
// Include the database connection and any required functions
include ('../file/config.php'); // Update with your actual database connection file
// session_start();

// Check if user is logged in
// if (!isset($_SESSION['customer_id'])) {
//     echo "Access denied. Please log in.";
//     exit;
// }

// Fetch customer ID from session
// $customer_id = $_SESSION['customer_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form inputs
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $retype_password = $_POST['retype_password'];

    // Validate inputs
    if (empty($old_password) || empty($new_password) || empty($retype_password)) {
        echo "All fields are required!";
        exit;
    }

    if ($new_password !== $retype_password) {
        echo "New passwords do not match!";
        exit;
    }

    if (strlen($new_password) < 8) {
        echo "New password must be at least 8 characters long.";
        exit;
    }

    try {
        // Fetch current password hash from the database
        $sql = "SELECT password FROM customers WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $customer_id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result && password_verify($old_password, $result['password'])) {
            // Hash the new password
            $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);

            // Update the password in the database
            $update_sql = "UPDATE customers SET password=? WHERE id=?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ss", $new_password_hash, $customer_id);

            if ($update_stmt->execute()) {
                echo "Password updated successfully!";
            } else {
                echo "Error updating password. Please try again later.";
            }
        } else {
            echo "Old password is incorrect!";
        }
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>
