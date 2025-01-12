<?php
include_once('../file/config.php'); // Include the database connection file

// Check if `cusid` is provided
if (isset($_GET['cusid'])) {
    $cus_id = $_GET['cusid'];

    // Validate that `cusid` is numeric
    if (!is_numeric($cus_id)) {
        echo "Invalid request.";
        exit();
    }

    // Check if confirmation is provided
    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        // Use a prepared statement to delete the customer
        if ($stmt = $conn->prepare("DELETE FROM customers WHERE cus_id = ?")) { // Using `cus_id` as column name
            $stmt->bind_param("i", $cus_id); // Bind the parameter as an integer
            if ($stmt->execute()) {
                echo "Customer deleted successfully.";
                header("Location: customer-list.php"); // Redirect to the list page
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Failed to prepare the SQL statement.";
        }
    } else {
        // Ask for confirmation
        echo "
        <script>
            if (confirm('Are you sure you want to delete this customer?')) {
                window.location.href = '?cusid=$cus_id&confirm=yes';
            } else {
                window.location.href = 'customer-list.php'; // Redirect to the list page
            }
        </script>";
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
