<?php
include_once('../../file/config.php'); // include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['projectid'])) {
    $projectid = $_POST['projectid'];
    
    // SQL to delete a record from the table
    $sql = "DELETE FROM lifting_gears_certificate WHERE projectid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $projectid);
    
    if ($stmt->execute()) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>
