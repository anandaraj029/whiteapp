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
include_once('../../../file/config.php');

// Prepare the data for insertion
$results = [];
$remarks = [];

// Check if 'result' is an array before iterating
if (isset($_POST['result']) && is_array($_POST['result'])) {
    foreach ($_POST['result'] as $key => $value) {
        $results[$key] = is_array($value) ? implode(",", $value) : $value;
    }
} else {
    echo "Warning: 'result' is not an array.";
}

// Check if 'remarks' is an array; if not, make it an array
if (isset($_POST['checklist_remark'])) {
    if (!is_array($_POST['checklist_remark'])) {
        $remarks = [$_POST['checklist_remark']];
    } else {
        $remarks = $_POST['checklist_remark'];
    }
}

$checklist_no = $_POST['checklist_no'] ?? null;

if (!$checklist_no) {
    die("Checklist number is required.");
}

// Concatenate all results and remarks into single strings
$combined_results = implode(" , ", $results);
$combined_remarks = implode(" , ", $remarks);

// Debugging output for remarks
echo "Combined Results: " . $combined_results . "<br>";
echo "Combined Remarks: " . $combined_remarks . "<br>";

// Check if the checklist ID already exists
$checkQuery = $conn->prepare("SELECT 1 FROM checklist_results WHERE checklist_id = ?");
$checkQuery->bind_param("i", $checklist_no);
$checkQuery->execute();
$checkQuery->store_result();

if ($checkQuery->num_rows > 0) {
    // Update if a record exists
    $stmt = $conn->prepare("UPDATE checklist_results SET result = ?, checklist_remark = ? WHERE checklist_id = ?");
} else {
    // Insert a new record if none exists
    $stmt = $conn->prepare("INSERT INTO checklist_results (result, checklist_remark, checklist_id) VALUES (?, ?, ?)");
}

$checkQuery->close();

if ($stmt === false) {
    die("MySQL Error: " . $conn->error);
}

// Bind parameters and execute the query
$stmt->bind_param("ssi", $combined_results, $combined_remarks, $checklist_no);

if (!$stmt->execute()) {
    die("Execution failed: " . $stmt->error);
}

echo "Data inserted or updated successfully.";
$stmt->close();
$conn->close();
?>
