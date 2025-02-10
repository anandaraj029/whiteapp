<?php
include_once('../file/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projectNo = $_POST['projectNo'];
    $checklistNo = $_POST['checklistNo'];
    $checklistType = $_POST['checklistType'];
    $reportNo = $_POST['reportNo'];
    $reviewStatus = $_POST['reviewStatus'];
    $commentBox = $_POST['commentBox'];

    // Start a transaction to ensure both queries are executed successfully
    $conn->begin_transaction();

    try {
        // Insert the review into the reviewer table
        $query = "INSERT INTO reviewer (project_no, checklist_no, checklist_type, report_no, review_status, comment) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $projectNo, $checklistNo, $checklistType, $reportNo, $reviewStatus, $commentBox);

        if (!$stmt->execute()) {
            throw new Exception("Failed to insert review: " . $stmt->error);
        }

        // Update the review_status in the project_info table
        $updateQuery = "UPDATE project_info SET review_status = ? WHERE project_no = ?";
        $updateStmt = $conn->prepare($updateQuery);
        $updateStmt->bind_param("ss", $reviewStatus, $projectNo);

        if (!$updateStmt->execute()) {
            throw new Exception("Failed to update review status: " . $updateStmt->error);
        }

        // Commit the transaction if both queries succeed
        $conn->commit();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        // Rollback the transaction if any query fails
        $conn->rollback();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    } finally {
        // Close the statements and connection
        if (isset($stmt)) $stmt->close();
        if (isset($updateStmt)) $updateStmt->close();
        $conn->close();
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>