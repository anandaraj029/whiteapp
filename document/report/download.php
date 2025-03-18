<?php
require_once('../../vendor/autoload.php');
include_once('../../file/config.php'); // Database connection file

if (!isset($_GET['project_no'])) {
    die("Project ID not provided!");
}

$project_no = $_GET['project_no'];

// Prepare and execute the main query for report details
$query = "SELECT * FROM reports WHERE project_no = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $project_no);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("No record found for the provided project ID!");
}

$row = $result->fetch_assoc();
$deficiencies = json_decode($row['deficiencies'], true);
$inspection_status = $row['inspection_status'];  // Fetching the inspection status

// Fetch the client name
$query_client = "SELECT client_name FROM checklist_results WHERE project_no = ?";
$stmt_client = $conn->prepare($query_client);
$stmt_client->bind_param("s", $project_no);
$stmt_client->execute();
$result_client = $stmt_client->get_result();

$client_name = $result_client->num_rows > 0 ? $result_client->fetch_assoc()['client_name'] : "No client found for this project ID";

// Start capturing the HTML output
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspection Report</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .inspection-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .inspection-table th, .inspection-table td {
            border: 1px solid black;
            padding: 4px;
            text-align: center;
            font-size: 11px; /* Consistent font size */

        }
        .inspection-table th {
            background-color: #277bbee0;
            color: white;
        }
        .footer {
            margin-top: 10px;
            text-align: center;
            font-size: 9px;
        }
        .manufac{
            background-color: #277bbee0 !important; /* Print background colors */
            color: #fff !important;
            font-weight: bold;
        }

        .signature-cell {        
        justify-content: flex-start; /* Align items to the left */
        height: 50px;
    }

    .signature-cell img {
        margin-right: 10px; /* Add some space between the image and the text */
    }

    .signature-cell span {
        flex-grow: 1; /* Ensure the name stays aligned correctly */
    }

    .checkbox-container {
        display: flex;
        align-items: center; /* Vertically center the items */
        gap: 10px; /* Add space between the checkbox and the text */
    }

    .checkbox-container input[type="checkbox"] {
        margin: 0; /* Remove default margin from checkbox */
        padding: 0; /* Remove default padding from checkbox */
    }

    .checkbox-container span {
        direction: rtl; /* Ensure proper alignment for Arabic text if needed */
    }
        @media print {
            body {
                margin: 0;
                padding: 0;
                transform: scale(0.95); /* Slight scaling for single page */
                transform-origin: top left;
                color-adjust: exact; /* Ensures color fidelity */
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .footer {
        color: black; /* Ensure footer text remains visible */
    }


    
            .manufac{
            background-color: #277bbee0 !important; /* Print background colors */
            color: #fff !important;
            font-weight: bold;
        }

            #non-printable {
        display: none; /* Hide buttons in print view */
    }
        }
    </style>
</head>
<body>
<div class="header">
        <table style="width: 100%; border-collapse: collapse;">
            <tr>
                <td style="width: 20%; text-align: left;">
                    <img src="../checklist/logo.png" height="100px" alt="TUV Rheinland Logo">
                </td>
                <td style="width: 60%; text-align: center;">
                    <h1 style="font-size: 18px; margin: 0;">Crane Inspection & Maintenance Services</h1>
                    <p style="font-size: 12px; margin: 5px 0;">
                        <b>P.O.BOX 74007, AL- Khobar 31952, Saudi Arabia</b><br>
                        <b>TEL.: 013 814 6861 - 013 814 6862 Ext.109 - Fax: 013 814 6863</b><br>
                        <b>Email: office@cims.com.sa - info@cims.com.sa</b>
                    </p>
                    <h3 style="font-size: 18px; margin-top: 15px;">Heavy Equipment & Elevating / Lifting Equipment Inspection Report</h3>
                </td>
                <td style="width: 20%; text-align: right;">
    <p style="font-size: 12px; margin: 0; text-align: right;">
        <b>Report No:</b> <?php echo htmlspecialchars($row['report_no']); ?><br>
        <b>JRN No:</b> <?php echo htmlspecialchars($row['jrn']); ?>
    </p>
    <div style="text-align: center; margin-top: 10px;">
        <img src="../../document/code.png" height="100px" alt="QR Code">
    </div>
</td>


            </tr>
        </table>
    </div>


    <table class="inspection-table">
    
    <tbody>
    <tr>
            <!-- <td rowspan="2"><b>Heavy Equipment & Elevating / Lifting Equipment Inspection Report</b></td> -->
            <td class="manufac"> Client Company / Name & Address:</td>
            <td class="manufac">Manufacturer:</td>
            <td class="manufac">Equipment Identification Number:</td>
            <td class="manufac">Date of Inspection:</td>
            <td class="manufac">Model:</td>
        </tr>
        <tr>
            <!-- <td> </td> -->
            <td><b> <?php echo htmlspecialchars($row['client_company_address']); ?></b> </td>
            <td><b><?php echo htmlspecialchars($row['manufacturer']); ?></b></td>
            <td><b><?php echo htmlspecialchars($row['equipment_id_no']); ?></b></td>
            <td><b><?php echo htmlspecialchars($row['date_of_inspection']); ?></b></td>
            <td><b><?php echo htmlspecialchars($row['model']); ?></b></td>
        </tr>

        <tr>
        <td class="manufac">Equipment Serial Number:</td>
        <td class="manufac">Next Inspection Due Date:</td>
        <td class="manufac">Type:</td>
        <td class="manufac">Location:</td>
        <td class="manufac">Inspection Status:</td>
        </tr>
        <tr>
            <td><b><?php echo htmlspecialchars($row['equipment_serial_no']); ?></b></td>
            <td><b><?php echo htmlspecialchars($row['next_inspection_due_date']); ?></b></td>
            <td><b><?php echo htmlspecialchars($row['type']); ?></b></td>
            <td><b><?php echo htmlspecialchars($row['location']); ?></b></td>
            <td>
    
        <div style="display: flex; flex-direction: column; margin-left: 20px;">
       <b> <?php 
                                if ($inspection_status === 'Passed') {
                                    echo "Passed";
                                } elseif ($inspection_status === 'Failed') {
                                    echo "Failed";
                                } else {
                                    echo "Status not available";
                                }
                            ?>
                            </b>
        </div>
    
</td>
        </tr>

        <tr>
        <td class="manufac">Previous Sticker S.No.:</td>
        <td class="manufac">Issued by:</td>
        <td class="manufac">Capacity:</td>
        <td colspan="2" class="manufac">Sticker Number Issued:</td>
        </tr>
        <tr>
            <td><b><?php echo htmlspecialchars($row['prev_sticker_no']); ?></b></td>
            <td><b><?php echo htmlspecialchars($row['issued_by']); ?></b></td>
            <td><b><?php echo htmlspecialchars($row['capacity']); ?></b></td>
            <td colspan="2"><b><?php echo htmlspecialchars($row['sticker_number_issued']); ?></b></td>
        </tr>

        
        <!-- <tr>
            <td colspan="4">Juyamah NSL-MSU<br>P.O.BOX 74007, AL- Khobar 31952, Saudi Arabia</td>
        </tr> -->
    </tbody>
</table>
    <p>
    <b>Above Equipment was visually inspected in accordance with local and international standards. Deficiencies that require corrective actions are listed
below. Specific repairs to correct each deficiency should be noted in the right column.</b>
    </p>

    <!-- <h3>Deficiencies</h3> -->
    <table class="inspection-table" style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr>
            <!-- <th style="padding: 15px; line-height: 1.5;">#</th> -->
            <th style="width: 65%; padding: 15px">Deficiency</th>
            <th style="width: 30%; padding: 15px">Corrective Action</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($deficiencies)): ?>
        <?php foreach ($deficiencies as $index => $entry): ?>
        <tr>
            <!-- <td style="padding: 15px; line-height: 1.5;">1</td> -->
            <td style="padding: 5px; height: 100px; text-align: left !important;">
            <?php echo htmlspecialchars($entry['deficiency']); ?>
</td>
<td style="padding: 15px; height: 100px;">
<?php echo htmlspecialchars($entry['corrective_action']); ?>
            
            </td>
        </tr>
        <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No deficiencies recorded for this project.</td>
                    </tr>
                <?php endif; ?>
        <!-- <tr>
            <td style="padding: 15px; line-height: 1.5;">2</td>
            <td style="padding: 15px; line-height: 1.5;">Wear on lifting cable</td>
            <td style="padding: 15px; line-height: 1.5;">Replace cable</td>
        </tr> -->
    </tbody>
</table>
<p>When re-inspected, a complete copy of this report should be ready for review by the inspector.</p>
<div class="col-md-12" style="border:2px solid #d0cece;">
                                    <div class="form-group1">
                                        <div class="form-check2">

                                        <!-- <input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" checked style="zoom:1;"> -->
                               
                                        <h6 class="checkbox-container">
    <input type="checkbox" checked>
    <span>اواوافق الى تحمل المسؤليه الكامله عن هذا الفحص
        <span> I agree to take full responsibility for this inspection</span>
    </span>
</h6>
                                            
                                          
                                            
                                        </div>
                                    </div>
                                </div>

    <div class="row">
        <div class="col-md-12">
        <table class="inspection-table" style="width: 100%;">
    <thead>
        <tr>
            <th>Report Receiver's Name & Signature</th>
            <th>Contact Tel. / Mobile Number</th>
            <th>Inspector Name & Signature</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="signature-cell">
                <!-- <img src="../../document/uploads/37.png" alt="Signature" height="30px"> -->
                <img src="../uploads/<?php echo $project_no; ?>.png" alt="" height="30px">
                <span><?php echo htmlspecialchars($client_name); ?></span>
            </td>
            <td class="signature-cell">
                99789456123
                <!-- <img src="../../document/uploads/37.png" alt="Signature" height="30px">
                <span><?php echo htmlspecialchars($client_name); ?></span> -->
            </td>                          
            <?php
// Include database connection
include_once('../../file/config.php');

// Retrieve the project ID from the request (GET or POST)
if (isset($_GET['project_no'])) {
    $project_no = $_GET['project_no'];

    // Query to fetch the inspector_name and signature_photo using the project_no
    $query = "
        SELECT pi.inspector_name, i.signature_photo 
        FROM project_info pi 
        JOIN inspectors i ON pi.inspector_name = i.inspector_name
        WHERE pi.project_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $project_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $inspector_name = $row['inspector_name'];
        $signature_photo = $row['signature_photo'];

        // Generate the inspector folder name
        $inspector_folder = preg_replace('/\s+/', '_', strtolower($inspector_name));
        $signature_image_path = "../../inspector/uploads/" . $inspector_folder . "/images/" . $signature_photo;

        // Render the table row
        echo "<td><img src='" . htmlspecialchars($signature_image_path) . "' alt='Signature' height='30px'> " . htmlspecialchars($inspector_name) . "</td>";
    } else {
        echo "<td>No inspector found for the provided project ID</td>";
    }

    $stmt->close();
} else {
    echo "<td>Project ID not provided</td>";
}

$conn->close();
?>
        </tr>
    </tbody>
</table>
        </div>
    </div>
    <!-- <div class="footer">
        <p>Generated by TUV Rheinland Arabia LLC</p>
    </div>    -->
    
    <div id="non-printable">
    <button type="button" class="btn btn-primary" id="downloadBtn">Save as PDF</button>
    <button type="button" class="btn btn-danger" onclick="window.print()">Print</button>
</div>


    <script>
        document.getElementById('downloadBtn').addEventListener('click', function () {
            window.location.href = 'download.php';
        });
    </script>
</body>
</html>

<?php
$html = ob_get_clean();

// Create an instance of mPDF
$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'L',
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5,
    'margin_header' => 5,
    'margin_footer' => 5
]);

// Write HTML content to the PDF
$mpdf->WriteHTML($html);
// Output as a PDF
$mpdf->Output('inspection_report.pdf', 'D'); // Download the PDF
?>
