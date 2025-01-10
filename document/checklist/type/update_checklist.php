<?php
// include_once('../../../file/config.php');

// // Prepare the data for insertion
// $results = [];
// $remarks = [];

// // Check if 'result' is an array before iterating
// if (isset($_POST['result']) && is_array($_POST['result'])) {
//     foreach ($_POST['result'] as $key => $value) {
//         // Ensure $value is an array before using implode
//         $results[$key] = is_array($value) ? implode(",", $value) : $value;
//     }
// } else {
//     echo "Warning: 'result' is not an array.";
// }

// // Check if 'remarks' is an array; if not, make it an array
// if (isset($_POST['remarks'])) {
//     if (!is_array($_POST['remarks'])) {
//         // Wrap single remark in an array
//         $remarks = [$_POST['remarks']];
//     } else {
//         $remarks = $_POST['remarks'];
//     }
// }

// $checklist_no = $_POST['checklist_no'] ?? null;

// if (!$checklist_no) {
//     die("Checklist number is required.");
// }

// // Concatenate all results and remarks into single strings
// $combined_results = implode(" , ", $results); // Use a delimiter to separate each result
// $combined_remarks = implode(" , ", $remarks); // Use a delimiter to separate each remark

// // Check if the checklist ID already exists
// $checkQuery = $conn->prepare("SELECT 1 FROM checklist_results WHERE checklist_id = ?");
// $checkQuery->bind_param("i", $checklist_no);
// $checkQuery->execute();
// $checkQuery->store_result();

// if ($checkQuery->num_rows > 0) {
//     // If a record exists, update it
//     $stmt = $conn->prepare("UPDATE checklist_results SET result = ?, remark = ? WHERE checklist_id = ?");
// } else {
//     // If no record exists, insert a new one
//     $stmt = $conn->prepare("INSERT INTO checklist_results (result, remark, checklist_id) VALUES (?, ?, ?)");
// }

// $checkQuery->close();

// if ($stmt === false) {
//     die("MySQL Error: " . $conn->error);
// }

// // Bind parameters and execute the query
// $stmt->bind_param("ssi", $combined_results, $combined_remarks, $checklist_no);

// if (!$stmt->execute()) {
//     die("Execution failed: " . $stmt->error);
// }

// echo "Data inserted or updated successfully.";
// $stmt->close();
// $conn->close();
?>
<?php
// Debugging: Show all errors and warnings
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once('../../../file/config.php');

// Prepare the data for insertion
$results = [];
$remarks = [];

// Validate and fetch POST inputs
$client_name = $_POST['client_name'] ?? null;
$client_signature = $_POST['client_signature'] ?? null;
$checklist_no = $_POST['checklist_no'] ?? null;


if (!$client_name || !$client_signature || !$checklist_no) {
    die("Client name, signature, and checklist number are required.");
}

// Fetch project_id from the checklistinformation table
$projectQuery = $conn->prepare("SELECT project_id FROM checklist_information WHERE checklist_id = ?");
$projectQuery->bind_param("i", $checklist_no);
$projectQuery->execute();
$projectQuery->bind_result($project_id);
$projectQuery->fetch();
$projectQuery->close();

if (empty($project_id)) {
    die("Project ID not found for the given checklist number.");
}

// Decode the Base64 image string and save the signature
$signature_folder = '../../uploads/';
if (!file_exists($signature_folder)) {
    mkdir($signature_folder, 0777, true);
}

// Generate a unique filename
// $signature_filename = 'signature_' . uniqid() . '.png';
// $signature_file_path = $signature_folder . $signature_filename;


$signature_filename = $project_id . '.png';
$signature_file_path = $signature_folder . $signature_filename;

// Decode Base64 and save as image
$signature_data = explode(',', $client_signature);
if (count($signature_data) === 2) {
    $decoded_signature = base64_decode($signature_data[1]);
    if (file_put_contents($signature_file_path, $decoded_signature) === false) {
        die("Failed to save signature.");
    }
} else {
    die("Invalid signature format.");
}

// Check if 'result' is an array before iterating
if (isset($_POST['result']) && is_array($_POST['result'])) {
    foreach ($_POST['result'] as $key => $value) {
        $results[$key] = is_array($value) ? implode(",", $value) : $value;
    }
}

// Check if 'remarks' is an array; if not, make it an array
if (isset($_POST['checklist_remark'])) {
    $remarks = is_array($_POST['checklist_remark']) ? $_POST['checklist_remark'] : [$_POST['checklist_remark']];
}

$checklist_no = $_POST['checklist_no'] ?? null;

if (!$checklist_no) {
    die("Checklist number is required.");
}

// Concatenate all results and remarks into single strings
$combined_results = implode(",", $results);
$combined_remarks = implode(",", $remarks);

// Check if the checklist ID already exists
$checkQuery = $conn->prepare("SELECT 1 FROM checklist_results WHERE checklist_id = ?");
$checkQuery->bind_param("i", $checklist_no);
$checkQuery->execute();
$checkQuery->store_result();

if ($checkQuery->num_rows > 0) {
    // Update if a record exists
    $stmt = $conn->prepare("UPDATE checklist_results SET result = ?, checklist_remark = ?, client_name = ?, client_signature = ? WHERE checklist_id = ?");
} else {
    // Insert a new record if none exists
    $stmt = $conn->prepare("INSERT INTO checklist_results (result, checklist_remark, client_name, client_signature, checklist_id) VALUES (?, ?, ?, ?, ?)");
}

$checkQuery->close();

if ($stmt === false) {
    die("MySQL Error: " . $conn->error);
}

// Bind parameters and execute the query
$stmt->bind_param("ssssi", $combined_results, $combined_remarks, $client_name, $signature_filename, $checklist_no);

if (!$stmt->execute()) {
    die("Execution failed: " . $stmt->error);
}

echo "Data inserted or updated successfully.";
$stmt->close();
$conn->close();
?>
