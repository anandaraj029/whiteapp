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
    $projectid = $_POST['projectid'];
    $companyName = $_POST['companyName'];


    // Image upload handling
    $target_dir = "./img/";
    $image_path = null;

    if (!empty($_FILES['image']['name'])) {
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . uniqid() . "_" . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a valid image type
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Check file size (limit to 5MB)
            if ($_FILES["image"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                exit;
            }

            // Allow certain file formats
            $allowed_formats = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array($imageFileType, $allowed_formats)) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                exit;
            }

            // Try to upload file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;  // Store the file path
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit;
            }
        } else {
            echo "File is not an image.";
            exit;
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO mpi_certificates (
                date_of_report, certificate_no, report_no, jrn, customer_name, 
                customer_email, mobile, inspector, location, inspection_date, 
                reference_no, next_inspection_date, inspected_item, serial_numbers, id_numbers, 
                manufacturer, standards, swl, mpi_equip_type, current, contrast_paint, 
                particle_medium, calibration_expiry_date, brand, prod_spacing, ink, 
                yoke_sn, model_no, result, comments, ndt_inspector, ndt_level, image_path, projectid, companyName
            ) VALUES (
                '$date_of_report', '$certificate_no', '$report_no', '$jrn', '$customer_name', 
                '$customer_email', '$mobile', '$inspector', '$location', '$inspection_date', 
                '$reference_no', '$next_inspection_date', '$inspected_item', '$serial_numbers', '$id_numbers',
                '$manufacturer', '$standards', '$swl', '$mpi_equip_type', '$current', '$contrast_paint', 
                '$particle_medium', '$calibration_expiry_date', '$brand', '$prod_spacing', '$ink', 
                '$yoke_sn', '$model_no', '$result', '$comments', '$ndt_inspector', '$ndt_level', '$image_path', '$projectid', '$companyName'
            )";

    if ($conn->query($sql) === TRUE) {
        echo "Certificate and image uploaded successfully.";
        header("Location: index.php?message=Record uploaded successfully");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>