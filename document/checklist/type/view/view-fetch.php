<?php 
include_once('../../../../file/config.php'); // include your database connection

// Check if checklist_type and checklist_no parameters are set in the URL
$checklist_type = isset($_GET['checklist_type']) ? $_GET['checklist_type'] : null;
$checklist_no = isset($_GET['checklist_no']) ? $_GET['checklist_no'] : null;

// Debugging lines to verify received parameters
// echo "Checklist Type: " . htmlspecialchars($checklist_type) . "<br>";
// echo "Checklist No: " . htmlspecialchars($checklist_no) . "<br>";

// Validate both parameters
if (empty($checklist_type) || empty($checklist_no)) {
    echo "Both checklist_type and checklist_no are required.";
    exit;
}

// SQL query to fetch data from the 'checklist_information' table based on checklist_type and checklist_no
$query = "SELECT * FROM checklist_information WHERE checklist_type = ? AND checklist_id = ?;";
$stmt = $conn->prepare($query);
$stmt->bind_param("si", $checklist_type, $checklist_no); // "s" for string, "i" for integer
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No record found for the specified checklist type and checklist ID!";
    $row = []; // Initialize as an empty array if no record found
    exit;
}

// Fetch checklist results
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
