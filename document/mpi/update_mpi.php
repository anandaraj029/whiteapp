<?php
ob_start();
include_once('../../inc/function.php');
include_once('../../file/config.php'); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $date_of_report = $_POST['date_of_report'];
    $certificate_no = $_POST['certificate_no'];    
    $jrn = $_POST['jrn'];
    $report_no = $_POST['report_no'];
    $project_no = $_POST['project_no'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $mobile = $_POST['mobile'];
    $inspector = $_POST['inspector'];
    $location = $_POST['location'];
    $inspection_date = $_POST['inspection_date'];
    $reference_no = $_POST['reference_no'];
    $next_inspection_date = $_POST['next_inspection_date'];
    $inspected_item = $_POST['inspected_item'];
    $serial_numbers = $_POST['serial_numbers'];
    $id_numbers = $_POST['id_numbers'];
    $manufacturer = $_POST['manufacturer'];
    $standards = $_POST['standards'];
    $swl = $_POST['swl'];
    $mpi_equip_type = $_POST['mpi_equip_type'];
    $current = $_POST['current'];
    $contrast_paint = $_POST['contrast_paint'];
    $particle_medium = $_POST['particle_medium'];
    $calibration_expiry_date = $_POST['calibration_expiry_date'];
    $brand = $_POST['brand'];
    $prod_spacing = $_POST['prod_spacing'];
    $ink = $_POST['ink'];
    $yoke_sn = $_POST['yoke_sn'];
    $model_no = $_POST['model_no'];
    $result = $_POST['result'];
    $comments = $_POST['comments'];

    // Prepare the SQL update query for mpi_certificates
    $query = "UPDATE mpi_certificates SET 
        date_of_report = ?,
        certificate_no = ?,        
        jrn = ?,
        report_no = ?,
        customer_name = ?,
        customer_email = ?,
        mobile = ?,
        inspector = ?,
        location = ?,
        inspection_date = ?,
        reference_no = ?,
        next_inspection_date = ?,
        inspected_item = ?,
        serial_numbers = ?,
        id_numbers = ?,
        manufacturer = ?,
        standards = ?,
        swl = ?,
        mpi_equip_type = ?,
        current = ?,
        contrast_paint = ?,
        particle_medium = ?,
        calibration_expiry_date = ?,
        brand = ?,
        prod_spacing = ?,
        ink = ?,
        yoke_sn = ?,
        model_no = ?,
        result = ?,
        comments = ?
        WHERE project_no = ?";

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param(
        'sssssssssssssssssssssssssssssss',
        $date_of_report, $certificate_no, $jrn, $report_no, $customer_name, $customer_email, $mobile,
        $inspector, $location, $inspection_date, $reference_no, $next_inspection_date, $inspected_item,
        $serial_numbers, $id_numbers, $manufacturer, $standards, $swl, $mpi_equip_type, $current,
        $contrast_paint, $particle_medium, $calibration_expiry_date, $brand, $prod_spacing, $ink,
        $yoke_sn, $model_no, $result, $comments, $project_no
    );

    // Execute the update query
    if ($stmt->execute()) {
        // Handle multiple image uploads
        if (!empty($_FILES['images']['name'][0])) {
            $target_dir = "../../uploads/"; // Ensure this directory exists and is writable

            foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                $file_name = basename($_FILES['images']['name'][$key]);
                $file_tmp = $_FILES['images']['tmp_name'][$key];
                $file_path = $target_dir . uniqid() . "_" . $file_name;

                // Validate file type and size
                $allowed_formats = ['jpg', 'jpeg', 'png', 'gif'];
                $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                if (in_array($imageFileType, $allowed_formats) && $_FILES['images']['size'][$key] <= 5000000) {
                    if (move_uploaded_file($file_tmp, $file_path)) {
                        // Insert image path into mpi_images table
                        $imageQuery = "INSERT INTO mpi_images (certificate_id, image_path) VALUES (?, ?)";
                        $imageStmt = $conn->prepare($imageQuery);
                        $imageStmt->bind_param('is', $project_no, $file_path);
                        $imageStmt->execute();
                    } else {
                        echo "Error uploading file: " . $_FILES['images']['name'][$key];
                    }
                } else {
                    echo "Invalid file format or size for: " . $_FILES['images']['name'][$key];
                }
            }
        }

        // Redirect to the list page after successful update
        header("Location: index.php?msg=MPI updated successfully");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statements
    $stmt->close();
}

// Close the database connection
$conn->close();
ob_end_flush();
?>