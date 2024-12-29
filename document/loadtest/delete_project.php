<?php
// Include your database connection file
include_once('../../file/config.php');

// Check if project_id is set via POST
if (isset($_POST['project_id'])) {
    $project_id = $_POST['project_id'];

    // Prepare and execute the SQL delete query
    $sql = "DELETE FROM loadtest_certificate WHERE project_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $project_id);

    if ($stmt->execute()) {
        // If deletion was successful, update the certificate_status in project_info table
        $update_sql = "UPDATE project_info SET certificate_status = 'Pending' WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param('s', $project_id);

        if ($update_stmt->execute()) {
            // If update was successful, send a success message
            echo json_encode(['success' => true, 'message' => 'Certificate deleted and status updated to Pending.']);
        } else {
            // If update failed, send an error message
            echo json_encode(['success' => false, 'error' => 'Certificate deleted but failed to update status: ' . $update_stmt->error]);
        }

        $update_stmt->close();
    } else {
        // If deletion failed, send an error message
        echo json_encode(['success' => false, 'error' => 'Failed to delete certificate: ' . $stmt->error]);
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // No project_id provided, return an error
    echo json_encode(['success' => false, 'error' => 'Invalid project ID']);
}
?>
