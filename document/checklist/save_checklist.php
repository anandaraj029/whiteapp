<?php

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;

// Include database connection
include_once('../../file/config.php'); // Ensure this points to your database connection file

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and validate project_no
    $project_no = isset($_POST['project_no']) ? trim($_POST['project_no']) : '';

    if (!empty($project_no)) {
        // Check if project exists and status is 'Pending'
        $status_check = $conn->prepare("SELECT checklist_status FROM project_info WHERE project_no = ?");
        $status_check->bind_param("s", $project_no);
        $status_check->execute();
        $status_result = $status_check->get_result();

        if ($status_result->num_rows > 0) {
            $row = $status_result->fetch_assoc();

            if ($row['checklist_status'] === 'Pending') {
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
                        (checklist_no, report_no, client_name, location, crane_asset_no, equipment_type, checklist_type, inspection_date, inspected_by, sticker_no, crane_serial_no, capacity_swl, remarks, manufacturer, year_model, equipment_no, project_no) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sssssssssssssssss', 
                    $checklist_no, $report_no, $client_name, $location, $crane_asset_no, $equipment_type, 
                    $checklist_type, $inspection_date, $inspected_by, $sticker_no, $crane_serial_no, 
                    $capacity_swl, $remarks, $manufacturer, $year_model, $equipment_no, $project_no);

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

                    // Update checklist_status to 'Created' in project_info
                    $update_status = $conn->prepare("UPDATE project_info SET checklist_status = 'Created' WHERE project_no = ?");
                    $update_status->bind_param("s", $project_no);
                    $update_status->execute();
                    $update_status->close();

                    // Redirect on successful insertion
                    echo "<script>alert('Checklist created successfully!'); window.location.href='index.php';</script>";
                } else {
                    echo "<script>alert('Error saving checklist information: " . $stmt->error . "'); window.history.back();</script>";
                }

                // Close main statement
                $stmt->close();
            } else {
                echo "<script>alert('Checklist has already been created for this project.'); window.location.href='index.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid Project ID.'); window.history.back();</script>";
        }
        // Close status check
        $status_check->close();
    } else {
        echo "<script>alert('Invalid Project ID received.'); window.history.back();</script>";
    }
} else {
    echo "Form submission error.";
}

// Close database connection
$conn->close();
?>
