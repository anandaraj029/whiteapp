<?php
include_once('../../file/config.php'); // include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['project_id'])) {
    $project_id = $_POST['project_id'];
    
    // SQL to delete a record from the table
    $sql = "DELETE FROM lifting_gear_certificates WHERE project_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $project_id);
    
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>
