<?php
// Include the database connection file
include_once('../../file/config.php'); // Assuming your database connection is here

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $project_id = $_POST['project_id'];
    $jrn = $_POST['jrn'];
    $checklist_no = $_POST['checklist_no'];
    $report_no = $_POST['report_no'];    
    $client_company_name = $_POST['client_company_name'];
    $client_company_address = $_POST['client_company_address'];
    $manufacturer = $_POST['manufacturer'];
    $model = $_POST['model'];
    $type = $_POST['type'];
    $prev_sticker_no = $_POST['prev_sticker_no'];
    $issued_by = $_POST['issued_by'];
    $capacity = $_POST['capacity'];
    $equipment_id_no = $_POST['equipment_id_no'];
    $equipment_serial_no = $_POST['equipment_serial_no'];
    $location = $_POST['location'];
    $date_of_inspection = $_POST['date_of_inspection'];
    $next_inspection_due_date = $_POST['next_inspection_due_date'];
    $inspection_status = $_POST['inspection_status'];
    $sticker_number_issued = $_POST['sticker_number_issued'];
    $created_at = date('Y-m-d H:i:s');
    
    // Deficiencies and Corrective Actions
    // $deficiency_1 = $_POST['deficiency_1'];
    // $corrective_action_1 = $_POST['corrective_action_1'];
    // $deficiency_2 = $_POST['deficiency_2'];
    // $corrective_action_2 = $_POST['corrective_action_2'];
    // $deficiency_3 = $_POST['deficiency_3'];
    // $corrective_action_3 = $_POST['corrective_action_3'];
    // $deficiency_4 = $_POST['deficiency_4'];
    // $corrective_action_4 = $_POST['corrective_action_4'];
    // $deficiency_5 = $_POST['deficiency_5'];
    // $corrective_action_5 = $_POST['corrective_action_5'];
    // $deficiency_6 = $_POST['deficiency_6'];
    // $corrective_action_6 = $_POST['corrective_action_6'];


// Combine deficiencies and corrective actions into an array
$deficiencies = $_POST['deficiency'];
$corrective_actions = $_POST['corrective_action'];

$deficiencyData = [];
foreach ($deficiencies as $index => $deficiency) {
    $corrective_action = $corrective_actions[$index];
    $deficiencyData[] = [
        'deficiency' => $deficiency,
        'corrective_action' => $corrective_action,
    ];
}

// Encode the deficiency data as JSON
$deficiencyJson = json_encode($deficiencyData);

    // Validate Date Format (optional but recommended)
    if (!strtotime($date_of_inspection) || !strtotime($next_inspection_due_date)) {
        echo "Invalid date format provided.";
        exit;
    }

    // SQL Query using Prepared Statement to insert data into the 'reports' table
    $insertQuery = "INSERT INTO reports (
        project_id, jrn, checklist_no, report_no, client_company_name, client_company_address, manufacturer, model, type, prev_sticker_no, issued_by, capacity, 
        equipment_id_no, equipment_serial_no, location, date_of_inspection, next_inspection_due_date, 
        inspection_status, sticker_number_issued, created_at, deficiencies) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($insertQuery);

    // Bind parameters
    $stmt->bind_param("sssssssssssssssssssss", 
        $project_id, $jrn, $checklist_no, $report_no, $client_company_name, $client_company_address, $manufacturer, $model, $type, $prev_sticker_no, $issued_by, $capacity,
        $equipment_id_no, $equipment_serial_no, $location, $date_of_inspection, $next_inspection_due_date, 
        $inspection_status, $sticker_number_issued, $created_at, $deficiencyJson);

    // Execute statement and check for errors
    if ($stmt->execute()) {
        // Update the project status in 'project_info' table
        $updateQuery = "UPDATE project_info SET report_status = 'Generated' WHERE project_id = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("s", $project_id);

        if ($updateStmt->execute()) {
            $msg = "Report created successfully, and project status updated.";
            header('Location: index.php?msg=' . urlencode($msg)); 
            exit;
        } else {
            error_log("Error updating project status: " . $updateStmt->error);
            echo "Error updating project status.";
        }
        $updateStmt->close();
    } else {
        error_log("Error inserting data: " . $stmt->error);
        echo "Error saving report. Please try again.";
    }

    // Close statements and connection
    $stmt->close();
    $conn->close();
}
?>
