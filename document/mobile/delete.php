<?php
include_once('../../file/config.php'); // Include the database connection

if (isset($_POST['report_no'])) {
    $report_no = $_POST['report_no'];

    // SQL query to delete the record
    $sql = "DELETE FROM mobile_crane_certificate WHERE report_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $report_no);

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
