<?php
// Include database connection
include_once('../../file/config.php');  // Include your database connection file

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $checklist_no = $_POST['checklist_no'];
    $report_no = $_POST['report_no'];
    $client_name = $_POST['client_name'];
    $location = $_POST['location'];
    $crane_asset_no = $_POST['crane_asset_no'];
    $equipment_type = $_POST['equipment_type'];
    $checklist_type = $_POST['checklist_type'];
    $inspection_date = $_POST['inspection_date'];
    $inspected_by = $_POST['inspected_by'];
    $sticker_no = $_POST['sticker_no'];
    $crane_serial_no = $_POST['crane_serial_no'];
    $capacity_swl = $_POST['capacity_swl'];
    $remarks = $_POST['remarks'];

    // SQL to insert data into the checklist table
    $sql = "INSERT INTO checklist_information 
    (checklist_no, report_no, client_name, location, crane_asset_no, equipment_type, checklist_type, inspection_date, inspected_by, sticker_no, crane_serial_no, capacity_swl, remarks) 
    VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssssssss', $checklist_no, $report_no, $client_name, $location, $crane_asset_no, $equipment_type, $checklist_type, $inspection_date, $inspected_by, $sticker_no, $crane_serial_no, $capacity_swl, $remarks);

    if ($stmt->execute()) {
        // echo "Data saved successfully!";
        // header('Location: index1.php');
        header("Location: type/$checklist_type.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Form submission error.";
}
?>
