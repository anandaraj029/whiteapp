<?php
include_once('../file/config.php'); // Include the database connection file

// Check if `cusid` is provided
if (isset($_GET['cusid'])) {
    $cus_id = $_GET['cusid'];

    // SQL query to delete the customer
    $sql = "DELETE FROM customers WHERE cus_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $cus_id);

    if ($stmt->execute()) {
        // Redirect back to the customer list with a success message
        header("Location: customer-list.php?message=Customer deleted successfully.");
        exit;
    } else {
        // Redirect back to the customer list with an error message
        header("Location: customer-list.php?error=Failed to delete customer.");
        exit;
    }

    $stmt->close();
} else {
    // Redirect back if no `cusid` is provided
    header("Location: customer-list.php?error=Invalid request.");
    exit;
}

$conn->close();
?>
