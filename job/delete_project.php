<?php
include '../file/config.php'; // Database connection

if (isset($_GET['project_no'])) {
    $project_no = $_GET['project_no'];

    // Prepare and execute the delete query
    $sql = "DELETE FROM project_info WHERE project_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $project_no);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Project deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete project.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>