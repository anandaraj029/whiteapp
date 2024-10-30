<?php
include './config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    $project_no = $_POST['project_no'];
    $creation_date = $_POST['creation_date'];
    $equipment_type = $_POST['equipment_type'];
    $sticker_status = $_POST['sticker_status'];
    $checklist_type = $_POST['checklist_type'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_mobile = $_POST['customer_mobile'];
    $inspector_name = $_POST['inspector_name'];
    $equipment_location = $_POST['equipment_location'];

    // SQL Insert statement
    $sql = "INSERT INTO project_info (project_no, creation_date, equipment_type, sticker_status, checklist_type, customer_name, customer_email, customer_mobile, inspector_name, equipment_location) 
            VALUES ('$project_no', '$creation_date', '$equipment_type', '$sticker_status', '$checklist_type', '$customer_name', '$customer_email', '$customer_mobile', '$inspector_name', '$equipment_location')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
 header("Location: ../job/overall-job-list.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
