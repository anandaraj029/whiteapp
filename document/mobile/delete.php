<?php
include_once('../../file/config.php'); // Include the database connection

if (isset($_POST['project_id'])) {
    $project_id = $_POST['project_id'];

    // SQL query to delete the record
    $sql = "DELETE FROM mobile_crane_certificate WHERE project_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $project_id);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
