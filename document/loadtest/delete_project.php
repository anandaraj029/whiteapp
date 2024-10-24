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
        // If deletion was successful, send a success message
        echo json_encode(['success' => true]);
    } else {
        // If an error occurred, send an error message
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    // Close the connection
    $stmt->close();
    $conn->close();
} else {
    // No project_id provided, return error
    echo json_encode(['success' => false, 'error' => 'Invalid project ID']);
}
?>
