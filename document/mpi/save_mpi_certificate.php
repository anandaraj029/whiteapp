<?php
include '../../file/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // Get form data
        $date_of_report = $_POST['date_of_report'];
        $certificate_no = $_POST['certificate_no'];
        $report_no = $_POST['report_no'];
        $jrn = $_POST['jrn'];
        $customer_name = $_POST['customer_name'];
        $customer_email = $_POST['customer_email'];
        $mobile = $_POST['mobile'];
        $inspector = $_POST['inspector'];
        $technical_manager = $_POST['technical_manager'];
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
        $project_no = $_POST['project_no'];
        $created_at = date('Y-m-d H:i:s');

        // Image upload handling
        $target_dir = "./img/";
        $image_paths = [];

        if (!empty($_FILES['image']['name'][0])) {
            foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
                $image_name = basename($_FILES['image']['name'][$key]);
                $unique_file_name = uniqid() . "_" . $image_name;
                $target_file = $target_dir . $unique_file_name;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Validate image
                $check = getimagesize($tmp_name);
                if ($check === false) {
                    throw new Exception("File $image_name is not a valid image.");
                }

                if ($_FILES['image']['size'][$key] > 5000000) {
                    throw new Exception("File $image_name is too large (max 5MB).");
                }

                $allowed_formats = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($imageFileType, $allowed_formats)) {
                    throw new Exception("File $image_name has invalid format. Only JPG, JPEG, PNG & GIF allowed.");
                }

                if (!move_uploaded_file($tmp_name, $target_file)) {
                    throw new Exception("Error uploading file $image_name.");
                }
                $image_paths[] = $target_file;
            }
        }

        // Insert certificate data
        $sql = "INSERT INTO mpi_certificates (
                    date_of_report, certificate_no, report_no, jrn, customer_name, 
                    customer_email, mobile, inspector, technical_manager, location, inspection_date, 
                    reference_no, next_inspection_date, inspected_item, serial_numbers, id_numbers, 
                    manufacturer, standards, swl, mpi_equip_type, current, contrast_paint, 
                    particle_medium, calibration_expiry_date, brand, prod_spacing, ink, 
                    yoke_sn, model_no, result, comments, project_no, created_at
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssssssssssssssssssssssssssssss",
            $date_of_report, $certificate_no, $report_no, $jrn, $customer_name, 
            $customer_email, $mobile, $inspector, $technical_manager, $location, $inspection_date, 
            $reference_no, $next_inspection_date, $inspected_item, $serial_numbers, $id_numbers,
            $manufacturer, $standards, $swl, $mpi_equip_type, $current, $contrast_paint, 
            $particle_medium, $calibration_expiry_date, $brand, $prod_spacing, $ink, 
            $yoke_sn, $model_no, $result, $comments, $project_no, $created_at
        );

        if (!$stmt->execute()) {
            throw new Exception("Error inserting certificate: " . $stmt->error);
        }

        $certificate_id = $conn->insert_id;

        // Insert images
        foreach ($image_paths as $path) {
            $image_sql = "INSERT INTO mpi_images (certificate_id, image_path) VALUES (?, ?)";
            $image_stmt = $conn->prepare($image_sql);
            $image_stmt->bind_param("is", $certificate_id, $path);
            
            if (!$image_stmt->execute()) {
                throw new Exception("Error inserting image: " . $image_stmt->error);
            }
            $image_stmt->close();
        }

        // Update project status
        $updateStatusSql = "UPDATE project_info SET certificatestatus = 'Certificate Created' WHERE project_no = ?";
        $update_stmt = $conn->prepare($updateStatusSql);
        $update_stmt->bind_param("s", $project_no);
        
        if (!$update_stmt->execute()) {
            throw new Exception("Error updating project status: " . $update_stmt->error);
        }

        // Create QC notification
        $notification_message = "MPI Certificate $certificate_no for project $project_no is ready for QC review";
        $notification_query = "INSERT INTO project_notifications 
                             (project_no, certificate_no, notification_message, quality_controller, created_at) 
                             VALUES (?, ?, ?, 'pending', NOW())";
        $notification_stmt = $conn->prepare($notification_query);
        $notification_stmt->bind_param("sss", $project_no, $certificate_no, $notification_message);
        
        if (!$notification_stmt->execute()) {
            throw new Exception("Failed to notify QC: " . $notification_stmt->error);
        }

        // Commit transaction
        mysqli_commit($conn);

        header("Location: index.php?success=MPI certificate created successfully and QC notified");
        exit();

    } catch (Exception $e) {
        // Rollback and clean up
        mysqli_rollback($conn);
        foreach ($image_paths as $path) {
            if (file_exists($path)) unlink($path);
        }
        
        header("Location: mpi_create.php?error=" . urlencode($e->getMessage()));
        exit();
    } finally {
        // Close resources
        if (isset($stmt)) $stmt->close();
        if (isset($update_stmt)) $update_stmt->close();
        if (isset($notification_stmt)) $notification_stmt->close();
        $conn->close();
    }
}
?>