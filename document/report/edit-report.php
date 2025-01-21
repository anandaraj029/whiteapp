<?php
include_once('../../file/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['project_no'])) {
    $project_no = $_GET['project_no'];

    // Fetch the report data
    $query = "SELECT * FROM reports WHERE project_no = ? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $project_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $report = $result->fetch_assoc();
    } else {
        echo "No report found for the provided Project ID!";
        exit;
    }
    $stmt->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission
    $project_no = $_POST['project_no'];
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

    // Combine deficiencies and corrective actions into JSON
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
    $deficiencyJson = json_encode($deficiencyData);

    // Update the report
    $updateQuery = "UPDATE reports SET 
        jrn = ?,
        checklist_no = ?,
        report_no = ?,
        client_company_name = ?,
        client_company_address = ?,
        manufacturer = ?,
        model = ?,
        type = ?,
        prev_sticker_no = ?,
        issued_by = ?,
        capacity = ?,
        equipment_id_no = ?,
        equipment_serial_no = ?,
        location = ?,
        date_of_inspection = ?,
        next_inspection_due_date = ?,
        inspection_status = ?,
        sticker_number_issued = ?,
        deficiencies = ?
        WHERE project_no = ?";

    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param(
        "ssssssssssssssssssss",
        $jrn,
        $checklist_no,
        $report_no,
        $client_company_name,
        $client_company_address,
        $manufacturer,
        $model,
        $type,
        $prev_sticker_no,
        $issued_by,
        $capacity,
        $equipment_id_no,
        $equipment_serial_no,
        $location,
        $date_of_inspection,
        $next_inspection_due_date,
        $inspection_status,
        $sticker_number_issued,
        $deficiencyJson,
        $project_no
    );

    if ($stmt->execute()) {
        $msg = "Report updated successfully.";
        header('Location: index.php?msg=' . urlencode($msg));
        exit;
    } else {
        error_log("Error updating report: " . $stmt->error);
        echo "Error updating report. Please try again.";
    }

    $stmt->close();
    $conn->close();
    exit;
}

?>