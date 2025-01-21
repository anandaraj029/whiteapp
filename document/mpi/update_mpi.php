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
    $ndt_inspector = $_POST['ndt_inspector'];
    $ndt_level = $_POST['ndt_level'];    
    $companyName = $_POST['companyName'];

    // Image upload handling
$target_dir = "./img/";
$image_path = null;

// Fetch current image path from the database
$sql_current_image = "SELECT image_path FROM mpi_certificates WHERE report_no = '$report_no'";
$result_current_image = $conn->query($sql_current_image);
$current_image_path = '';

if ($result_current_image->num_rows > 0) {
    $row = $result_current_image->fetch_assoc();
    $current_image_path = $row['image_path'];
}

if (!empty($_FILES['image']['name'])) { // Changed 'image_path' to 'image'
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . uniqid() . "_" . $image_name;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image type
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            exit;
        }

        $allowed_formats = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_formats)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit;
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $target_file;

            // Remove old image if new image is uploaded
            if (!empty($current_image_path) && file_exists($current_image_path)) {
                unlink($current_image_path);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    } else {
        echo "File is not an image.";
        exit;
    }
} else {
    // If no new image is uploaded, use the current image
    $image_path = $current_image_path;
}


    // Prepare the SQL update query
    $query = "UPDATE mpi_certificates SET 
        report_no = '$report_no',
        date_of_report = '$date_of_report',
        certificate_no = '$certificate_no',        
        jrn = '$jrn',
        customer_name = '$customer_name',
        customer_email = '$customer_email',
        mobile = '$mobile',
        inspector = '$inspector',
        location = '$location',
        inspection_date = '$inspection_date',
        reference_no = '$reference_no',
        next_inspection_date = '$next_inspection_date',
        inspected_item = '$inspected_item',
        serial_numbers = '$serial_numbers',
        id_numbers = '$id_numbers',
        manufacturer = '$manufacturer',
        standards = '$standards',
        swl = '$swl',
        mpi_equip_type = '$mpi_equip_type',
        current = '$current',
        contrast_paint = '$contrast_paint',
        particle_medium = '$particle_medium',
        calibration_expiry_date = '$calibration_expiry_date',
        brand = '$brand',
        prod_spacing = '$prod_spacing',
        ink = '$ink',
        yoke_sn = '$yoke_sn',
        model_no = '$model_no',
        result = '$result',
        comments = '$comments',
        ndt_inspector = '$ndt_inspector',
        ndt_level = '$ndt_level',
        companyName = '$companyName',
        image_path = '$image_path'
        WHERE project_no = '$project_no'"; // Removed the extra comma before WHERE clause

    // Execute the query
    if ($conn->query($query) === TRUE) { // Changed $sql to $query
        // Redirect to the list page after successful update
        header("Location: index.php?msg=MPI updated successfully");
        exit(); // Ensure the script stops executing after redirect
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close the database connection
// mysqli_close($conn);
ob_end_flush();
?>
