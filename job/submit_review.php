<?php
include_once('../file/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projectNo = $_POST['projectNo'];
    $checklistNo = $_POST['checklistNo'];
    $checklistType = $_POST['checklistType'];
    $reviewStatus = $_POST['reviewStatus'];
    $commentBox = $_POST['commentBox'];

    // Insert the review into the database
    $query = "INSERT INTO reviewer (project_no, checklist_no, checklist_type, review_status, comment) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $projectNo, $checklistNo, $checklistType, $reviewStatus, $commentBox);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>