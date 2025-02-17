<?php
include_once('../file/config.php'); // Database connection

if (isset($_GET['project_no'])) {
    $project_no = $_GET['project_no'];

    // Prepare a delete statement
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
    echo json_encode(['status' => 'error', 'message' => 'Project number not provided.']);
}
?>