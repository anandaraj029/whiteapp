<?php
include_once('../../file/config.php'); // Include your database connection

// Get the project ID from the query parameter (assuming it's passed via URL)
$project_no = $_GET['project_no']; // Adjust this according to how you are passing the project_no

// Fetch the data based on the project_no
$sql = "SELECT * FROM lifting_gear_certificates WHERE project_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $project_no);
$stmt->execute();
$result = $stmt->get_result();

// Check if records are found
if ($result->num_rows > 0) {
    $certificates = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "No certificates found for the given project ID.";
    exit();
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lifting Gears Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.4;
            margin: 20px;
            padding: 20px;
            font-size: 12px;
        }
        .container-fluid {
            width: 100%;
            margin: auto;
            padding: 10px;
        }
        h1, h2 {
            text-align: center;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
        }
        .no-border {
            border: none !important;
        }
        th, td {
            border: 1px solid black;
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: #83C1F5;
        }
        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .signature {
            text-align: center;
        }
        .signature p {
            margin: 0;
        }
        .signature span {
            display: block;
            margin-top: 30px;
            border-top: 1px solid #000;
        }
        .footer {
            text-align: center;
            margin-top: 10px;
        }
        .sign{
          width:120px;
          height:60px;
        }
        .qrcode {
      width: 70px;
      height: 70px;
      float: right;
      margin-top: 0px;
         z-index: 1;
    }
    .leea {
      width: 65px;
      height: 62px;
      float: left;
      margin-top: 0px;
      z-index: 1;
    }
    .text-center{
text-align: center;
margin: 5px;
      }
      .text-center button{
        
    padding: 18px;
    font-size: 14px;
    font-weight: 800;
    background: rgb(8, 177, 255);
    }


        @media (max-width: 768px) {
            .signature-section {
                flex-direction: column;
                align-items: center;
            }
            .signature {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-5">
        <img src="../head2.jpg" alt="Header Image" style="width: 100%;">
        <img src="../leea.png" class="leea" alt="Leea">
    <img src="../code.png" class="qrcode" alt="Qr Code">
    <?php foreach ($certificates as $certificate): ?>

        <table class="table no-border">
            <tr>
                <td colspan="3"></td>
                <!-- <td colspan="3"><strong>Job Ref. No.:</strong> <?= $certificate['jrn']; ?></td> -->

                <td colspan="3"><strong>Job Ref. No.:</strong> <?= $certificate['jrn']; ?></td>
                <td colspan="3"><strong>Certificate No.:</strong> <?= $certificate['certificate_no']; ?></td>
                <td colspan="3"></td>
            </tr>
            <tr>
            <td colspan="3"><strong>Report No.:</strong> <?= $certificate['report_no']; ?></td>
            <td colspan="3"><strong>Date of Report:</strong> <?= $certificate['date_of_report']; ?></td>
            <td colspan="3"><strong>Color Code (if required):</strong> <?= $certificate['color_code']; ?></td>
            <td colspan="3"><strong>Applicable Standard(s):</strong> <?= $certificate['applicable_standards']; ?></td>
            </tr>
        </table>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="6">Name & Address of the employer for whom the examination was made:
                            <?= $certificate['employer_name_address']; ?>

                        </th>
                        <th colspan="4">Address of the premises at which the examination was made:

                        <?= $certificate['address_of_premises']; ?>
                        </th>
                        <th colspan="2">Status:<br/>
                            ND-No Defect<br/>
                            SDR-See Defect Report<br/>
                            NF- Not Found
                        </th>
                    </tr>
                    <tr>
                        <th>Identification No./Serial No.</th>
                        <th>QTY.</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>WLL or SWL</th>
                        <th>Date of Last Examination</th>
                        <th>Date of this Examination</th>
                        <th>Latest date of the next examination</th>
                        <th>Reason for Examination (See Below)</th>
                        <th>Details of test</th>
                        <th>Status (See Above)</th>
                        <th>Safe to Use (Yes or No)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="height: 150px">
                    <td><?= $certificate['identification_no']; ?></td>
                    <td><?= $certificate['qty']; ?></td>
                    <td><?= $certificate['type']; ?></td>
                    <td>Manufacturer: <?= $certificate['manufacturer']; ?><br>Size: <?= $certificate['size']; ?><br>Length: <?= $certificate['length']; ?><br>Color: <?= $certificate['color']; ?><br>Ply: <?= $certificate['ply']; ?></td>
                    <td><?= $certificate['wll_swl']; ?></td>
                    <td><?= $certificate['date_last_examination']; ?></td>
                    <td><?= $certificate['date_of_this_examination']; ?></td>
                    <td><?= $certificate['next_examination_date']; ?></td>
                    <td><?= $certificate['reason_for_examination']; ?></td>
                    <td><?= $certificate['test_details']; ?></td>
                    <td><?= $certificate['status']; ?></td>
                    <td><?= $certificate['safe_to_use']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Reason for Examination</td>
                        <td colspan="2">3 Monthly: A</td>
                        <td colspan="2">6 Monthly: B</td>
                        <td colspan="2">12 Monthly: C</td>
                        <td colspan="2">Written Scheme: D</td>
                        <td colspan="2">Exceptional Circumstance: E</td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <strong>Name & Qualification of the person making the report:</strong>
                            <br>
                            SHAROON BOOTA MASIH<br>
                            Elevating/Lifting Equipment Inspector <span class="sign-space"><strong>Signature:</strong></span>
                        </td>
                        <td colspan="2"><img src="../sign.jpg" class="sign" alt="Sign"></td>
                        <td colspan="3">
                            <strong>Name of the person authentication of this report:</strong><br>
                            VENANCIO Z. VERA<br>
                            Technical Manager <span><strong>Signature:</strong></span>
                            
                        </td>
                        <td>
    <?php
    // Construct the signature image path
    $technical_manager_name = urlencode($row['technical_manager']);
    $technical_manager_signature_path = "../uploads/{$technical_manager_name}.png";

    // Check if the signature file exists
    if (file_exists($technical_manager_signature_path)) {
        echo "<img src='$technical_manager_signature_path' class='sign' alt='Technical Manager Signature'>";
    } else {
        // Placeholder image if the signature doesn't exist
        echo "<img src='../sign.jpg' class='sign' alt='Default Signature'>";
    }
    ?>
</td>
                        <td colspan="2"><img src="../seal.png" class="sign" alt="Header Image"></td>
         </tr>
                </tbody>
            </table>
        </div>
        <?php endforeach; ?>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td colspan="12" style="text-align: center;">
                            <strong>Overseas Full Member of Lifting Equipment Engineers Association (LEEA United Kingdom)</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="footer">
                <img src="../foot.jpg" alt="Footer Image" style="width: 100%;">
            </div>

            <div class="text-center">
    <a href="download.php?project_no=<?php echo $certificate['project_no']; ?>" >
        <button>Download</button>
    </a>
</div>

        </div>
    </div>
</body>
</html>