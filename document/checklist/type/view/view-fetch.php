<?php 
include_once('../../../../file/config.php'); // include your database connection

// Check if checklist_type parameter is set in the URL, use 'wheel-loader' as default for testing
$checklist_type = isset($_GET['checklist_type']) ? $_GET['checklist_type'] : 'wheel-loader';

// Debug line to check the checklist_type
// echo "Checklist Type: " . htmlspecialchars($checklist_type) . "<br>";

if (!empty($checklist_type)) {
    // SQL query to fetch data from the 'checklist_information' table based on checklist type
    $query = "SELECT * FROM checklist_information WHERE checklist_type = '$checklist_type';";
    
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cheklist_no = $row['checklist_id'];  // Fetch record into $row array
    } else {
        echo "No record found!";
        $row = []; // Initialize as an empty array if no record found
    }
} else {
    echo "No checklist type provided!";
    $row = []; // Initialize as an empty array if checklist type is not provided
}

//fetch checklist
// Example checklist ID to fetch
$checklist_no = $_GET['checklist_no'] ?? null; // Assuming checklist_no is passed via GET

// Initialize variables
$selected_results = [];
$db_remark = '';

if ($checklist_no) {
    // Fetch checklist data
    $stmt = $conn->prepare("SELECT result, checklist_remark FROM checklist_results WHERE checklist_id = ?");
    $stmt->bind_param("i", $checklist_no);
    $stmt->execute();
    $stmt->bind_result($db_result, $db_remark);
    $stmt->fetch();
    $stmt->close();

    // Debugging output
    // echo "Database Result: " . htmlspecialchars($db_result) . "<br>";
    // echo "Database Remark: " . htmlspecialchars($db_remark) . "<br>";

    // Convert the result to an array for easy checking
    $selected_results = explode(",", $db_result);
    $chek_remark = explode(",", $db_remark);
} else {
    echo "Checklist ID is required.";
    exit;
}


?>
