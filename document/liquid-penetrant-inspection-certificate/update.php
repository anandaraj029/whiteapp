<?php
// Include necessary files
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Ensure the "uploads" directory exists
$upload_dir = 'uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true); // Create directory with full permissions
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $project_no = $_POST['project_no'];
    $inspection_date = $_POST['inspection_date'];
    $certificate_no = $_POST['certificate_no'];
    $report_no = $_POST['report_no'];
    $jrn = $_POST['jrn'];
    $companyName = $_POST['companyName'];
    $reference_no = $_POST['reference_no'];
    $location = $_POST['location'];
    $next_inspection_date = $_POST['next_inspection_date'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $mobile = $_POST['mobile'];
    $inspector = $_POST['inspector'];
    $technical_manager = $_POST['technical_manager'];
    $standard = $_POST['standard'];
    $material = $_POST['material'];
    $surface_temperature = $_POST['surface_temperature'];
    $technique_procedure = $_POST['technique_procedure'];
    $brand = $_POST['brand'];
    $penetrant = $_POST['penetrant'];
    $penetrant_apply = $_POST['penetrant_apply'];
    $dwell_time = $_POST['dwell_time'];
    $cleaner = $_POST['cleaner'];
    $remove_apply = $_POST['remove_apply'];
    $developer = $_POST['developer'];
    $developer_apply = $_POST['developer_apply'];
    $developing_time = $_POST['developing_time'];
    $description = $_POST['description'];
    $item_checked = $_POST['item_checked'];
    $results = $_POST['results'];
    $condition_new = $_POST['condition_new'];
    $description_1 = $_POST['description_1'];
    $description_2 = $_POST['description_2'];
    $description_3 = $_POST['description_3'];
    $inspector_name = $_POST['inspector_name'];
    $authenticating_person_name = $_POST['authenticating_person_name'];

    


    // Handle file uploads with only names as filenames
    $inspector_signature = '';
    $authenticating_person_signature = '';

    if (isset($_FILES['inspector_signature']) && $_FILES['inspector_signature']['error'] == UPLOAD_ERR_OK) {
        $inspector_filename = $upload_dir . preg_replace('/\s+/', '_', $inspector_name) . '.' . pathinfo($_FILES['inspector_signature']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['inspector_signature']['tmp_name'], $inspector_filename);
        $inspector_signature = $inspector_filename;
    } else {
        $inspector_signature = $_POST['existing_inspector_signature']; // Keep existing file if no new file is uploaded
    }

    if (isset($_FILES['authenticating_person_signature']) && $_FILES['authenticating_person_signature']['error'] == UPLOAD_ERR_OK) {
        $authenticating_person_filename = $upload_dir . preg_replace('/\s+/', '_', $authenticating_person_name) . '.' . pathinfo($_FILES['authenticating_person_signature']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['authenticating_person_signature']['tmp_name'], $authenticating_person_filename);
        $authenticating_person_signature = $authenticating_person_filename;
    } else {
        $authenticating_person_signature = $_POST['existing_authenticating_person_signature']; // Keep existing file if no new file is uploaded
    }


    // Prepare the SQL query to update the record
    $query = "UPDATE inspection_certificates SET
                inspection_date = ?,
                certificate_no = ?,
                report_no = ?,
                jrn = ?,
                companyName = ?,
                reference_no = ?,
                location = ?,
                next_inspection_date = ?,
                customer_name = ?,
                customer_email = ?,
                mobile = ?,
                inspector = ?,
                technical_manager = ?,
                standard = ?,
                material = ?,
                surface_temperature = ?,
                technique_procedure = ?,
                brand = ?,
                penetrant = ?,
                penetrant_apply = ?,
                dwell_time = ?,
                cleaner = ?,
                remove_apply = ?,
                developer = ?,
                developer_apply = ?,
                developing_time = ?,
                description = ?,
                item_checked = ?,
                results = ?,
                condition_new = ?,
                description_1 = ?,
                description_2 = ?,
                description_3 = ?,
                inspector_name = ?,
                inspector_signature = ?,
                authenticating_person_name = ?,
                authenticating_person_signature = ?
              WHERE project_no = ?";

    // Prepare and execute the statement
    $stmt = $conn->prepare($query);
    $stmt->bind_param(
        "ssssssssssssssssssssssssssssssssssss",
        $inspection_date,
        $certificate_no,
        $report_no,
        $jrn,
        $companyName,
        $reference_no,
        $location,
        $next_inspection_date,
        $customer_name,
        $customer_email,
        $mobile,
        $inspector,
        $technical_manager,
        $standard,
        $material,
        $surface_temperature,
        $technique_procedure,
        $brand,
        $penetrant,
        $penetrant_apply,
        $dwell_time,
        $cleaner,
        $remove_apply,
        $developer,
        $developer_apply,
        $developing_time,
        $description,
        $item_checked,
        $results,
        $condition_new,
        $description_1,
        $description_2,
        $description_3,
        $inspector_name,
        $inspector_signature,
        $authenticating_person_name,
        $authenticating_person_signature,
        $project_no
    );

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to the view page or display a success message
        header("Location: index.php?status=updated");
        exit();
    } else {
        // Handle the error
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // If the form is not submitted, redirect to the edit page
    header("Location: edit.php?project_no=" . $project_no);
    exit();
}

// Function to handle file uploads
function uploadFile($file, $target_dir) {
    $target_file = $target_dir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        return $target_file;
    } else {
        return null;
    }
}
?>