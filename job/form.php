<?php
include_once('../file/config.php');

// Retrieve the sticker number from the query parameter
$stickerNo = isset($_GET['stickerNo']) ? $_GET['stickerNo'] : '';

// Initialize variables to store the fetched data
$projectId = '';
$checklistNo = '';
$checklistType = '';
$reportNo = '';
$certificates = [];

if (!empty($stickerNo)) {
    // Step 1: Connect to the database (assuming config.php already does this)
    // Step 2: Query the stickers table to get project_no
    $query = "SELECT project_no FROM stickers WHERE sticker_start_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $stickerNo);
    $stmt->execute();
    $stmt->bind_result($projectId);
    $stmt->fetch();
    $stmt->close();

    if (!empty($projectId)) {
        // Step 3: Query the project_info table to get checklist_type and report_no
        $query = "SELECT checklist_type FROM project_info WHERE project_no = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $projectId);
        $stmt->execute();
        $stmt->bind_result($checklistType);
        $stmt->fetch();
        $stmt->close();

        // Step 4: Query the checklist_information table for checklist_no
        $query = "SELECT checklist_id, report_no FROM checklist_information WHERE project_no = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $projectId);
        $stmt->execute();
        $stmt->bind_result($checklistNo, $reportNo);
        $stmt->fetch();
        $stmt->close();

        // Step 5: Query the certificates table
        $query = "
            SELECT 
                'health-check' AS certificate_type,
                hc.certificate_no, hc.created_at
            FROM crane_health_check_certificate hc
            WHERE hc.project_no = ?        

            UNION

            SELECT 
                'loadtestwithload' AS certificate_type,
                lw.certificate_no, lw.created_at
            FROM loadtest_certificate lw
            WHERE lw.project_no = ?

            UNION

            SELECT 
                'mobile' AS certificate_type,
                mc.certificate_no, mc.created_at
            FROM mobile_crane_loadtest mc
            WHERE mc.project_no = ?

            UNION

            SELECT 
                'lifting' AS certificate_type,
                lc.certificate_no, lc.created_at
            FROM lifting_gear_certificates lc
            WHERE lc.project_no = ?

            UNION

            SELECT 
                'mpi' AS certificate_type,
                mp.certificate_no, mp.created_at
            FROM mpi_certificates mp
            WHERE mp.project_no = ?

            UNION

            SELECT 
                'eddycurrent' AS certificate_type,
                ec.certificate_no, ec.created_at
            FROM eddy_current_inspection ec
            WHERE ec.project_no = ?
        ";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssss", $projectId, $projectId, $projectId, $projectId, $projectId, $projectId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $certificates[] = $row;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspection Card</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f1f1f1;
            font-family: 'Arial', sans-serif;
        }

        .card {
            width: 350px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: white;
            text-align: center;
            border: 2px solid green;
        }

        .card-header {
            background-color: green;
            color: white;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            position: relative;
        }

        .card-header::after {
            content: "✔";
            font-size: 22px;
            position: absolute;
            right: 15px;
        }

        .card-body {
            padding: 15px;
            background-color: #fff;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .row:last-child {
            border-bottom: none;
        }

        .label {
            color: gray;
            font-size: 14px;
        }

        .value {
            font-weight: bold;
            font-size: 16px;
        }

        .download-link {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            Verified
        </div>
        <div class="card-body">
            <div class="row">
                <div class="value"><?php echo htmlspecialchars($projectId); ?></div>
                <div class="label">Project ID:</div>
            </div>
            <div class="row">
                <div class="value" id="stickerNo"><?php echo htmlspecialchars($stickerNo); ?></div>
                <div class="label">Sticker No:</div>
            </div>
            <div class="row">
                <div class="value"><?php echo htmlspecialchars($checklistType); ?></div>
                <div class="label">Checklist Type:</div>
            </div>
            <?php if (!empty($checklistNo)): ?>
                <div class="row">
                    <div class="value">
                        <a href="../document/checklist/type/view/<?php echo htmlspecialchars($checklistType); ?>.php?checklist_type=<?php echo htmlspecialchars($checklistType); ?>&checklist_no=<?php echo htmlspecialchars($checklistNo); ?>" class="download-link">Download Checklist</a>
                    </div>
                    <div class="label">Checklist:</div>
                </div>
            <?php endif; ?>
            <?php if (!empty($reportNo)): ?>
                <div class="row">
                    <div class="value">
                        <a href="../document/report/download.php?project_no=<?php echo htmlspecialchars($projectId); ?>" class="download-link">Download Report</a>
                    </div>
                    <div class="label">Report:</div>
                </div>
            <?php endif; ?>
            <?php if (!empty($certificates)): ?>
                <div class="row">
                    <div class="value">
                        <?php foreach ($certificates as $certificate): ?>
                            <a href="../document/<?php echo htmlspecialchars($certificate['certificate_type']); ?>/download.php?project_no=<?php echo htmlspecialchars($projectId); ?>" style="margin-left: -34px;" class="download-link">Download <?php echo ucfirst(htmlspecialchars($certificate['certificate_type'])); ?> Certificate</a><br>
                        <?php endforeach; ?>
                    </div>
                    <div class="label">Certificates:</div>
                </div>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>
