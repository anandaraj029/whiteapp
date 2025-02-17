<?php
include_once('../file/config.php');

$projectNo = $_POST['qcProjectNo'];
$checklistNo = $_POST['qcChecklistNo'];
$checklistType = $_POST['qcChecklistType'];
$reportNo = $_POST['qcReportNo'];
$certificateType = $_POST['qcCertificateType'];
$reviewStatus = $_POST['qcReviewStatus'];

// Insert into QC Controller table
$query = "INSERT INTO qc_controller_reviews (project_no, checklist_no, checklist_type, report_no, certificate_type, review_status) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssssss", $projectNo, $checklistNo, $checklistType, $reportNo, $certificateType, $reviewStatus);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(['success' => true, 'reviewStatus' => $reviewStatus]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error saving QC review']);
}
?>