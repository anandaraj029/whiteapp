<?php
// Include the database connection file
include_once('../../file/config.php'); // Assuming your database connection is here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $project_id = mysqli_real_escape_string($conn, $_POST['project_id']);
    $jrn = mysqli_real_escape_string($conn, $_POST['jrn']);
    $checklist_no = mysqli_real_escape_string($conn, $_POST['checklist_no']);
    $report_no = mysqli_real_escape_string($conn, $_POST['report_no']);    
    $client_company_name = mysqli_real_escape_string($conn, $_POST['client_company_name']);
    $client_company_address = mysqli_real_escape_string($conn, $_POST['client_company_address']);
    $manufacturer = mysqli_real_escape_string($conn, $_POST['manufacturer']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $prev_sticker_no = mysqli_real_escape_string($conn, $_POST['prev_sticker_no']);
    $issued_by = mysqli_real_escape_string($conn, $_POST['issued_by']);
    $capacity = mysqli_real_escape_string($conn, $_POST['capacity']);
    $equipment_id_no = mysqli_real_escape_string($conn, $_POST['equipment_id_no']);
    $equipment_serial_no = mysqli_real_escape_string($conn, $_POST['equipment_serial_no']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $date_of_inspection = mysqli_real_escape_string($conn, $_POST['date_of_inspection']);
    $next_inspection_due_date = mysqli_real_escape_string($conn, $_POST['next_inspection_due_date']);
    $inspection_status = mysqli_real_escape_string($conn, $_POST['inspection_status']);
    $sticker_number_issued = mysqli_real_escape_string($conn, $_POST['sticker_number_issued']);
    
    // Deficiencies and Corrective Actions
    $deficiency_1 = mysqli_real_escape_string($conn, $_POST['deficiency_1']);
    $corrective_action_1 = mysqli_real_escape_string($conn, $_POST['corrective_action_1']);
    $deficiency_2 = mysqli_real_escape_string($conn, $_POST['deficiency_2']);
    $corrective_action_2 = mysqli_real_escape_string($conn, $_POST['corrective_action_2']);
    $deficiency_3 = mysqli_real_escape_string($conn, $_POST['deficiency_3']);
    $corrective_action_3 = mysqli_real_escape_string($conn, $_POST['corrective_action_3']);
    $deficiency_4 = mysqli_real_escape_string($conn, $_POST['deficiency_4']);
    $corrective_action_4 = mysqli_real_escape_string($conn, $_POST['corrective_action_4']);
    $deficiency_5 = mysqli_real_escape_string($conn, $_POST['deficiency_5']);
    $corrective_action_5 = mysqli_real_escape_string($conn, $_POST['corrective_action_5']);
    $deficiency_6 = mysqli_real_escape_string($conn, $_POST['deficiency_6']);
    $corrective_action_6 = mysqli_real_escape_string($conn, $_POST['corrective_action_6']);

    // SQL Query to insert data into the table
    $query = "INSERT INTO reports (
        project_id, jrn, checklist_no, report_no, client_company_name, client_company_address, manufacturer, model, type, prev_sticker_no, issued_by, capacity, 
        equipment_id_no, equipment_serial_no, location, date_of_inspection, next_inspection_due_date, 
        inspection_status, sticker_number_issued, deficiency_1, corrective_action_1, deficiency_2, corrective_action_2, 
        deficiency_3, corrective_action_3, deficiency_4, corrective_action_4, deficiency_5, corrective_action_5, deficiency_6, corrective_action_6
    ) VALUES (
        '$project_id', '$jrn', '$checklist_no', '$report_no', '$client_company_name', '$client_company_address', '$manufacturer', '$model', '$type', '$prev_sticker_no', '$issued_by', '$capacity', 
        '$equipment_id_no', '$equipment_serial_no', '$location', '$date_of_inspection', '$next_inspection_due_date', 
        '$inspection_status', '$sticker_number_issued', '$deficiency_1', '$corrective_action_1', '$deficiency_2', '$corrective_action_2', 
        '$deficiency_3', '$corrective_action_3', '$deficiency_4', '$corrective_action_4', '$deficiency_5', '$corrective_action_5', '$deficiency_6', '$corrective_action_6'
    )";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        echo "Record saved successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
