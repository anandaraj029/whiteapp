<?php
// Include the database connection file
include_once('../../file/config.php');



// Check if a certificate number is provided (e.g., via query string)
if (isset($_GET['project_no'])) {
    $project_no = $_GET['project_no'];

    // Prepare the SQL query
    $sql = "SELECT * FROM eddy_current_inspection WHERE project_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $project_no);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the data
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Assign fetched data to variables
        $inspection_date = $row['inspection_date'];
        $certificate_no = $row['certificate_no'];
        $reference_no = $row['reference_no'];
        $customer_name = $row['customer_name'];
        $site_location = $row['location'];
        $inspector = $row['inspector'];
        $technical_manager = $row['technical_manager'];
        $next_inspection_date = $row['next_inspection_date'];
        $inspected_item = $row['inspected_item'];
        $type_of_joint = $row['type_of_joint'];
        $specification = $row['specification'];
        $inspection_method = $row['inspection_method'];
        $calibration_details = $row['calibration_details'];
        $gain = $row['gain'];
        $probe_frequency = $row['probe_frequency'];
        $device_maker = $row['device_maker'];
        $model = $row['model'];
        $serial_no = $row['serial_no'];
        $cable_type = $row['cable_type'];
        $sensor_type = $row['sensor_type'];
        $ref_block_type = $row['ref_block_type'];
        $material = $row['material'];
        $description_1 = $row['description_1'];
        $description_2 = $row['description_2'];
        $description_3 = $row['description_3'];
        $description_of_inspection = $row['description_of_inspection'];
        $inspection_result = $row['inspection_result'];
        $reason = $row['reason'];        
    } else {
        echo "No record found for the given certificate number.";
        exit;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Certificate number not provided.";
    exit;
}
?>