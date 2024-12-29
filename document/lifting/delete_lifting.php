<?php
include_once('../../file/config.php'); // include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['project_id'])) {
    $project_id = $_POST['project_id'];

    // SQL to delete a record from the lifting_gear_certificates table
    $sql = "DELETE FROM lifting_gear_certificates WHERE project_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $project_id);

    if ($stmt->execute()) {
        // Update the certificate status in the project_info table
        $update_sql = "UPDATE project_info SET certificate_status = 'Pending' WHERE project_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param('s', $project_id);

        if ($update_stmt->execute()) {
            echo "Record deleted successfully and certificate status updated.";
        } else {
            echo "Record deleted, but failed to update certificate status: " . $conn->error;
        }

        $update_stmt->close();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
