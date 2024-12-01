<?php
// Include database connection
include_once('../../file/config.php');  // Include your database connection file

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve main form data
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
    $manufacturer = $_POST['manufacturer'];
    $year_model = $_POST['year_model'];
    $equipment_no = $_POST['equipment_no'];

    // Retrieve arrays of results and remarks
    $results = $_POST['results']; // Expecting an array from the form
    $remarks_array = $_POST['remarks_array']; // Expecting an array from the form

    // Insert main checklist data
    $sql = "INSERT INTO checklist_information 
            (checklist_no, report_no, client_name, location, crane_asset_no, equipment_type, checklist_type, inspection_date, inspected_by, sticker_no, crane_serial_no, capacity_swl, remarks, manufacturer, year_model, equipment_no) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssssssssssss', $checklist_no, $report_no, $client_name, $location, $crane_asset_no, $equipment_type, $checklist_type, $inspection_date, $inspected_by, $sticker_no, $crane_serial_no, $capacity_swl, $remarks, $manufacturer, $year_model, $equipment_no);

    if ($stmt->execute()) {
        // Retrieve the newly inserted checklist ID
        $checklist_id = $stmt->insert_id;

        // Prepare statement for inserting results and remarks
        $stmt_results = $conn->prepare("INSERT INTO checklist_results (checklist_id, result, checklist_remark) VALUES (?, ?, ?)");

        // Loop through results and remarks and insert each as a new row
        foreach ($results as $key => $result) {
            $checklist_remark = isset($remarks_array[$key]) ? $remarks_array[$key] : null; // Use null if no remark
            $stmt_results->bind_param("iss", $checklist_id, $result, $checklist_remark);
            $stmt_results->execute();
        }

        // Close the second statement
        $stmt_results->close();

        // Redirect on successful insertion
        // header("Location: type/$checklist_type.php");

        header("Location: index.php");

    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statements and connection
    $stmt->close();
    $conn->close();

} else {
    echo "Form submission error.";
}
?>
