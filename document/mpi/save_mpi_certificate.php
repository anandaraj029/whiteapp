<?php
include '../../file/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $ndt_inspector = $_POST['ndt_inspector'];
    $ndt_level = $_POST['ndt_level'];
    $project_no = $_POST['project_no'];
    $companyName = $_POST['companyName'];
    $created_at = date('Y-m-d H:i:s');

    // Image upload handling for multiple images
    $target_dir = "./img/";
    $image_paths = [];

    if (!empty($_FILES['image']['name'][0])) { // Check if at least one image is uploaded
        foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
            $image_name = basename($_FILES['image']['name'][$key]);
            $unique_file_name = uniqid() . "_" . $image_name;
            $target_file = $target_dir . $unique_file_name;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if image file is valid
            $check = getimagesize($tmp_name);
            if ($check !== false) {
                // Check file size (limit to 5MB)
                if ($_FILES['image']['size'][$key] > 5000000) {
                    echo "Sorry, file $image_name is too large.";
                    exit;
                }

                // Allow certain file formats
                $allowed_formats = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($imageFileType, $allowed_formats)) {
                    echo "Sorry, file $image_name has an invalid format.";
                    exit;
                }

                // Try to upload file
                if (move_uploaded_file($tmp_name, $target_file)) {
                    $image_paths[] = $target_file; // Store the file path
                } else {
                    echo "Sorry, there was an error uploading file $image_name.";
                    exit;
                }
            } else {
                echo "File $image_name is not a valid image.";
                exit;
            }
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO mpi_certificates (
                date_of_report, certificate_no, report_no, jrn, customer_name, 
                customer_email, mobile, inspector, technical_manager, location, inspection_date, 
                reference_no, next_inspection_date, inspected_item, serial_numbers, id_numbers, 
                manufacturer, standards, swl, mpi_equip_type, current, contrast_paint, 
                particle_medium, calibration_expiry_date, brand, prod_spacing, ink, 
                yoke_sn, model_no, result, comments, ndt_inspector, ndt_level, project_no, companyName, created_at
            ) VALUES (
                '$date_of_report', '$certificate_no', '$report_no', '$jrn', '$customer_name', 
                '$customer_email', '$mobile', '$inspector', '$technical_manager', 
                '$location', '$inspection_date', 
                '$reference_no', '$next_inspection_date', '$inspected_item', '$serial_numbers', '$id_numbers',
                '$manufacturer', '$standards', '$swl', '$mpi_equip_type', '$current', '$contrast_paint', 
                '$particle_medium', '$calibration_expiry_date', '$brand', '$prod_spacing', '$ink', 
                '$yoke_sn', '$model_no', '$result', '$comments', '$ndt_inspector', '$ndt_level', '$project_no', '$companyName', '$created_at'
            )";

    if ($conn->query($sql) === TRUE) {
        $certificate_id = $conn->insert_id; // Get the ID of the inserted record

        // Insert image paths into a separate table (mpi_images)
        foreach ($image_paths as $path) {
            $image_sql = "INSERT INTO mpi_images (certificate_id, image_path) VALUES ('$certificate_id', '$path')";
            if (!$conn->query($image_sql)) {
                echo "Error inserting image: " . $conn->error;
                exit;
            }
        }

        // Update the certificatestatus in the project_info table
        $updateStatusSql = "UPDATE project_info SET certificatestatus = 'Certificate Created' WHERE project_no = '$project_no'";
        if ($conn->query($updateStatusSql) === TRUE) {
            echo "Certificate created and images uploaded successfully.";
            header("Location: index.php?message=Record uploaded successfully");
        } else {
            echo "Error updating certificatestatus: " . $conn->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
