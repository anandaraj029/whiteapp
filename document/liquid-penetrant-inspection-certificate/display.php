<?php
include_once('../../file/config.php'); // Include your database configuration file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_all'])) {
    // Retrieve form data
    $inspection_date = $_POST['inspection_date'];
    $certificate_no = $_POST['certificate_no'];
    $report_no = $_POST['report_no'];
    $jrn = $_POST['jrn'];
    $project_no = $_POST['project_no'];
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

    
    // Insert data into the database
    $sql = "INSERT INTO liquid_penetrant_inspection (
        inspection_date, certificate_no, report_no, jrn, project_no, reference_no, location, next_inspection_date, 
        customer_name, customer_email, mobile, inspector, technical_manager, standard, material, surface_temperature, 
        technique_procedure, brand, penetrant, penetrant_apply, dwell_time, cleaner, remove_apply, developer, developer_apply, 
        developing_time, description, item_checked, results, condition_new, description_1, description_2, description_3, created_at
    ) VALUES (
        ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW()
    )";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssssssssssssssssssssssssss", 
        $inspection_date, $certificate_no, $report_no, $jrn, $project_no, $reference_no, $location, $next_inspection_date, 
        $customer_name, $customer_email, $mobile, $inspector, $technical_manager, $standard, $material, $surface_temperature, 
        $technique_procedure, $brand, $penetrant, $penetrant_apply, $dwell_time, $cleaner, $remove_apply, $developer, $developer_apply, 
        $developing_time, $description, $item_checked, $results, $condition_new, $description_1, $description_2, $description_3, 
        
    );

    if ($stmt->execute()) {
        // Update the project_info table to mark the certificate as created
        $update_query = "UPDATE project_info SET certificatestatus = 'Certificate Created' WHERE project_no = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("s", $project_no);

        if ($update_stmt->execute()) {
            $msg = "Data saved successfully, and project status updated.";
            header('Location: index.php?msg=' . urlencode($msg));
            exit();
        } else {
            echo "Error updating project status: " . $conn->error;
        }
        $update_stmt->close();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>