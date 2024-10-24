<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thorough Examination Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            line-height: 1.4;
        }
        .container-fluid {
            max-width: 800px;
            margin: auto;
            padding: 9px;
            /* border: 1px solid #000; */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        th, td {
            padding: 5px;
            border: 1px solid #000;
            text-align: left;
            font-size: 11px;
        }
        
        .section-title {
            background-color: #72c5f0;
            font-weight: bold;
        }
        
        .content-table td {
            vertical-align: top;
        }
        @media (max-width: 600px) {
            .header-table, .details-table, .content-table {
                font-size: 12px;
            }
        }
        .no-right-border {
            border-right: none;
        }
        .center-text {
            text-align: center;
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

    </style>
</head>
<body>
    <div class="container-fluid">

    <img src="../head2.jpg" alt="Header Image" style="width: 100%;">
        <img src="../leea.png" class="leea" alt="Leea">
    <img src="../code.png" class="qrcode" alt="Qr Code">

        <h1>CERTIFICATE OF THOROUGH EXAMINATION</h1>
        <p style="text-align: center; font-weight: bold;">This report complies with the Lifting Equipment<br> Engineers Association Technical requirements</p>

        <table class="content-table">
            <tr>
                <td colspan="3" class="center-text">Name and Address of employer for whom the thorough examination was made:<br/><strong> <?= $row['employer_address'] ?> </strong></td>
                <td colspan="3" class="center-text">Address of premises at which the examination was made:<br/><strong> <?= $row['premises_address'] ?></strong></td>
            </tr>
            <tr>
                <td colspan="3" class="center-text">Description and Identification of the equipment:</td>
                <td class="center-text">Safe Working Load(s):</td>
                <td class="center-text">Date of manufacture if known:</td>
                <td class="center-text">Date of last thorough examination:</td>
            </tr>
            <tr>
                <td colspan="3" class="no-right-border">
                    <span style="text-align: center;"> <strong> <?= $row['equipment_description'] ?></strong> </span><br/>
                    Manufacturer: <strong><?= $row['manufacturer'] ?></strong> <span style="margin-left: 30px;">Certificate No.: <strong><?= $row['certificate_no'] ?></strong></span><br/>
                    Model No.: <strong><?= $row['model'] ?></strong><br/>
                    Equipment ID No.: <strong><?= $row['equipment_id'] ?></strong><br/>
                    Equipment Serial No.: <strong><?= $row['equipment_serial_no'] ?></strong><br/>
                    Width: <strong><?= $row['width'] ?></strong><br/>
                    Thickness: <strong><?= $row['thickness'] ?></strong>
                </td>
                <td class="center-text"><strong>10 Ton</strong></td>
                <td class="center-text"><strong>NIL</strong></td>
                <td class="center-text"><strong>12 February 2023</strong> (CIMS – 12190)</td>
            </tr>
			
			<tr>
			   <td colspan="3"></td>
				<td class="center-text" colspan="3" ><strong>Within an interval of 6 months?</strong></td>
            
			</tr>
            <tr>
                <td colspan="2" rowspan="2" class="no-right-border"><strong>Is this the first examination after installation or assembly at a new site or location?</strong></td>
                <td class="center-text" rowspan="2" ><strong>NO</strong></td>
                <td colspan="2" ><strong>Within an interval of 6 months?</strong></td>
                <td class="center-text"><strong>YES</strong></td>
            </tr>
            <tr>
			
			    
                <td colspan="2"><strong>Within an interval of 12 months?</strong></td>
                <td class="center-text"><strong>NO</strong></td>
            </tr>
            <tr>
			
			<td colspan="2" rowspan="2" class="no-right-border"><strong>If the answer to the above question is YES has the equipment been installed correctly?</strong></td>
                <td class="center-text" rowspan="2"><strong>N/A</strong></td>
                <td colspan="2"><strong>In accordance with an examination scheme?</strong></td>
                <td class="center-text"><strong>YES</strong></td>
                
            </tr>
			<tr>
			
			<td colspan="2"><strong>After the occurrence of exceptional circumstances?</strong></td>
                <td class="center-text"><strong>NO</strong></td>
			</tr>
            <tr>
                <td colspan="6" class="center-text">
                    <strong>Identification of any part found to have a defect which is or could become a danger to persons and a description of the defect:<br/>(If none state NONE)</strong><br/>
                    <strong>NONE</strong>
                </td>
            </tr>
            <tr>
                <td colspan="5"><strong>Is the above a defect which is of immediate danger to persons</strong></td>
                <td class="center-text"><strong>NO</strong></td>
                
            </tr>
			
			<tr>
			<td colspan="5"><strong>Is the above a defect which is not yet but could become a danger to persons: (If YES state the date by when)</strong></td>
                <td class="center-text"><strong>YES by:</strong><br/>

            </td>
			</tr>
            <tr>
                <td colspan="6" class="center-text">
                    <strong>Particulars of any repair renewal or alteration required to remedy the defect identified above:</strong><br/>
                    <strong>NOT APPLICABLE</strong>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="center-text">
                    <strong>Particulars of any tests carried out as part of the examination: (If none state NONE)</strong><br/>
                    Fork Length – <strong>178 cm (Out)</strong> 171 cm (In)<br/>
                    Load Applied @ Load Centre – <strong>10 Ton @ 850 mm</strong>
                </td>
            </tr>
            <tr>
                <td colspan="5" >
                    <strong>IS THIS EQUIPMENT FIT FOR PURPOSE?</strong></td>
                    <td><strong>YES</strong>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="center-text">
                    <strong>Name & Qualifications of person making this report:</strong><br/>
                    <?= $row['name_qualifications_person'] ?><br/>
                    <?= $row['report_making_person_qualifications'] ?>
                </td>
				<td colspan="2" class="center-text">
                    <strong>Name of person authenticating this report:</strong><br/>
                    <?= $row['authenticating_person_name'] ?><br/>
                    Technical Manager
                </td>
				<td colspan="2" class="center-text">
                    <strong>Latest date by which next thorough examination must be carried out:</strong><br/>
                    02 February 2024
                </td>
            </tr>
            
            <tr>
                <td colspan="6" class="center-text">
                    <strong>Name and address of employer of persons making and authenticating this report:</strong><br/>
                    <span><strong><i>CIMS P.O. BOX 74007 AL ANDALUS STREET AL RAKAH AL KHOBAR 31952</i></strong></span>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="center-text">
                   <strong> <i>OVERSEAS FULL MEMBER OF LIFTING EQUIPMENT ENGINEERS ASSOCIATION (LEEA UNITED KINGDOM) 662</i></strong>
                </td>
            </tr>
        </table>

        <div class="footer">
                <img src="../foot.jpg" alt="Footer Image" style="width: 100%;">
            </div>

            <div class="text-center">
    <a href="download.php" ><button>download</button></a>
  </div>
    </div>
   
</body>
</html>
