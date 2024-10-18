<?php
require_once('../../vendor/autoload.php');

use Mpdf\Mpdf;
$title = "MAGNETIC PARTICLE INSPECTION CERTIFICATE";
// Load Bootstrap CSS
// $bootstrapCSS = file_get_contents('../../assets/css/bootstrap.css');
$mpdf = new \Mpdf\Mpdf([
    'orientation' => 'P',
    'margin_left' => 5,
    'margin_right' => 5,
    'margin_top' => 5,
    'margin_bottom' => 5,
    'margin_header' => 5,
    'margin_footer' => 5
]);

// Your HTML content
$html = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magnetic Particle Inspection Certificate</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
	<style>

  body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0px;
          line-height: 1.6;
      }
      .container {
          max-width: 100%;
          /* margin: auto; */
          padding: 0px;
          border: none;
          /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
      }
      h1 {
          text-align: center;
          font-size: 12px;
         
      }
      h1 span {
          text-align: center;
          font-size: 10px;
         
      }
     
      table {
          width: 100%;
          border-collapse: collapse;
          margin-bottom: 5px;
      }
      th, td {
          padding: 5px;
          border: 1px solid #000;
          text-align: left;
          font-size: 10px;
      }
      .header-table, .details-table {
          border: none;
          margin-bottom: 0;
      }
      .header-table th, .header-table td {
          border: none;
          padding: 5px;
      }
      .section-title {
          background-color: #bfdaef;
          font-weight: bold;
          font-size: 10px;
      }
      .answer {
          color: red;
          font-weight: bold;
      }
       .header, .footer {
          text-align: center;
      }
      .header img{
          max-width: 100%;
          height: 126px;
      }
     .footer img {
          max-width: 100%;
          height: 86px;
      }

      .sign{
          width:120px;
          height:60px;
      }
      .sign2 {
        width: 107px;
       height: 87px;
       }
      .qrcode{
          width:73px;
          height:73px;
          float:right;
          margin-top:0px;
      }
      .leea{
        width: 69px;
        height: 67px;
          float:left;
          margin-top:0px;
      }
      .text-center{
            text-align: center;
            margin: 0px;
      }
      .text-center button{
        
    padding: 18px;
    font-size: 14px;
    font-weight: 800;
    /* background: rgb(8, 177, 255); */
    }

    .header-table, .details-table {
            border: none;
            margin-bottom: 0;
        }
        .header-table th, .header-table td {
            border: none;
            padding: 5px;
            font-size: 14px;
        }
        /* .section-title {
            background-color: #1b6bab47;
            font-weight: bold;
            font-size: 16px;
        } */
        .answer {
            color: red;
            font-weight: bold;
            font-size: 14px;
        }
    .space{
        padding:50px;
      }

      @media (max-width: 600px) {
          .header-table, .details-table, .content-table {
              font-size: 12px;
          }
      }
	</style>
</head>
<body>
    <div class="container">

    <div class="header">
      <img src="../head2.jpg" class="head" alt="Header Image">
    </div>
    <img src="../leea.png" class="leea" alt="Leea">
    <img src="../code.png" class="qrcode" alt="Qr Code">
    <h1>CERTIFICATE OF THOROUGH EXAMINATION <br/>
        <span>This report complies with the Lifting Equipment Engineers Association Technical requirements</span>
        </h1>
        <table class="content-table">
            <tr>
                <td><strong>Date of Thorough Examination: 03 August 2023</strong></td>
                <td><strong>Date of Report: 03 August 2023</strong></td>
                <td><strong>Report Number: 91126</strong><br/>
				<strong>Sticker Number: 14488</strong>
				</td>
                
            </tr>
        </table>

        <table class="content-table">
            <tr>
                <td colspan="3" style="text-align: center;"><strong>Name and Address of employer for whom the thorough examination was made:<br/>
				GULF HAULAGE RIG MOVE (GHRM)
				</strong></td>
                <td colspan="3" style="text-align: center;"><strong>Address of premises at which the examination was made:<br/>
				KCA DEUTAG RIG-T915 HAWIYAH</strong>
				</td>
            </tr>
            
            <tr>
                <td colspan="3">
      
                    <strong><span style="text-align: center;">Description and Identification of the equipment:</span></strong>   <br/>
                    <strong>ROUGH TERRAIN CRANE-TELESCOPING BOOM (RT-H)</strong><br/>
                    <strong>Manufacturer: ZOOMLION</strong> <span  style="text-align:right;"> <strong>Certificate No.: 24393</strong></span><br/>
                    <strong>Model: ZRT 851</strong>          <span  style="text-align:right;"> <strong>JRN: 8989</strong></span><br/>
                    <strong>Equipment ID No.: GHRM-4022</strong><br>
                    <strong>Equipment Serial No.: ZRT851-0010</strong><br>
                    <strong>Main Hook Block SWL: 70 Ton</strong><br>
                    <strong>Serial No.: 2103000021</strong><br>
                    <strong>Rope Dia.: 20.4 mm (Main Hoist)</strong><br/>
                    <strong>Falls: 8</strong>
                </td>
                <td style="text-align: center;"><strong>Safe Working Load(s):<br/>85 Ton</strong></td>
                <td  style="text-align: center;"><strong>Date of manufacture if known:<br/>2022</strong></td>
                <td  style="text-align: center;"><strong>Date of last thorough examination:<br>NIL</strong></td>
            </tr>
            <tr>
                <td colspan="3">
				
				
                    <div class="row align-items-start">
                        <div class="col-8">
                         <strong>   Is this the first examination after installation or assembly at a new site or location? </strong>
                        </div>
                        <div class="col-4">
                        <strong>    NO</strong>
                        </div>
                    </div>
                    <div class="row align-items-start">
                        <div class="col-8">
                      <strong>      If the answer to the above question is YES has the equipment been installed correctly? </strong>
                        </div>
                        <div class="col-4">
                       <strong>     NO</strong>
                        </div>
                    </div>
                    
                </td>
                <td colspan="3">
				
				<div class="row align-items-start">
                        <div class="col-12" style="text-align: center;">
                           <strong> Was the examination carried out: </strong>
                        </div>
                        
                    </div>
                    <div class="row align-items-start">
                        <div class="col-8">
                        <strong>    Within an interval of 6 months?  </strong>
                        </div>
                        <div class="col-4">
                       <strong>     NO</strong>
                        </div>
                    </div>
                    <div class="row align-items-start">
                        <div class="col-8">
                       <strong>     Within an interval of 12 months? </strong>
                        </div>
                        <div class="col-4">
                            <strong>YES</strong>
                        </div>
                    </div>
                    <div class="row align-items-start">
                        <div class="col-8">
                          <strong>  In accordance with an examination scheme? </strong>
                        </div>
                        <div class="col-4">
                          <strong>  YES</strong>
                        </div>
                    </div>
					
					<div class="row align-items-start">
                        <div class="col-8">
                        <strong>    After the occurrence of exceptional circumstances? </strong>
                        </div>
                        <div class="col-4">
                            <strong>NO</strong>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: center;">
				
				<strong>
				Identification of any part found to have a defect which is or could become a danger to persons and a description of the defect:
				
				<br/>
				
				(If none state NONE) 
				
				<br/>NONE
				</strong>
				</td>
				</tr>
			

			
			
				<tr>
				
				<td colspan="6">
				<div class="row align-items-start">
                        <div class="col-10">
                      <strong>      Is the above a defect which is of immediate danger to persons </strong>
                        </div>
                        <div class="col-2">
                       <strong>     NO</strong>
                        </div>
                    </div>
				
				
				</td>
				</tr>
				
				<tr>
				
				<td colspan="6">
				<div class="row align-items-start">
                        <div class="col-10">
                      <strong>      Is the above a defect which is not yet but could become a danger to persons: (If YES state the date by when)  </strong>
                        </div>
                        <div class="col-2">
                       <strong>     YES by:   </strong>
                        </div>
                    </div>
				
				
				</td>
				
				</tr>
				
				

				
				
				<tr>
				 <td colspan="6" style="text-align: center;">
				<strong>
				Particulars of any repair, renewal or alteration required to remedy the defect identified above: <br/>
                NOT APPLICABLE
				</strong>
				</td>
				</tr>
				
				
				<tr>
				 <td colspan="6" style="text-align: center;">
				<strong>
				Particulars of any tests carried out as part of the examination: (If none state NONE) <br/>
                (SEE ATTACHED PAGE 2) 
				</strong>
				</td>
				</tr>

<tr>
				
				<td colspan="6">
				<div class="row align-items-start">
                        <div class="col-10">
                      <strong>      IS THIS EQUIPMENT FIT FOR PURPOSE?  </strong>
                        </div>
                        <div class="col-2">
                       <strong>     YES`</strong>
                        </div>
                    </div>
				
				
				</td>
				</tr>				
				
				
				
				<tr>
				
				<td colspan="2" style="text-align: center;">
			<strong>	Name & Qualifications of person making this report: </strong><br/>

            <img src="../sign.jpg" class="sign" alt="Header Image"><br>

<strong>AFZAAL UMAIR  </strong><br/>

<strong>SAP No. 80019222 </strong>
				
				</td>
				<td colspan="2" style="text-align: center;">
				<strong>Name of person authenticating this report:</strong> <br/>
				<img src="../sign.jpg" class="sign" alt="Header Image"><br>
			<strong>	VENANCIO Z. VERA </strong><br/>

<strong>Technical Manager </strong>
				
				</td>
				<td colspan="2" style="text-align: center;">
				
<strong>				Latest date by which next thorough examination must be carried out: </strong><br/>
				<strong>02 August 2024 </strong><br>

                <img src="../sign.jpg" class="sign" alt="Header Image">
				</td>
				</tr>				
				
            
        </table>
        <div class="footer">
            <img src="../foot.jpg" alt="Footer Image">
        </div>
                </div>

                <!--certificate2-->

                <div class="container mt-5">
                <div class="header">
      <img src="../head2.jpg" class="head" alt="Header Image">
    </div>
    <img src="../leea.png" class="leea" alt="Leea">
    <img src="../code.png" class="qrcode" alt="Qr Code">
		
    <h1>CERTIFICATE OF THOROUGH EXAMINATION <br/>
        <span>This report complies with the Lifting Equipment Engineers Association Technical requirements</span>
        </h1>
        <table class="content-table">
            <tr>
                <td><strong>Sticker No.: 14488 </strong></td>
                <td><strong>Report No.: 91126  </strong></td>
                
                <td><strong>Certificate No.: 24393 </strong></td>
				
				
                
            </tr>
        </table>

        <table class="content-table">
            <tr class="section-title">
                <td colspan="5" style="text-align: center">B. LOAD TEST</td>
            </tr>
            <tr>
                <td style="text-align: center"><strong>Boom Length (m)</strong></td>
                <td style="text-align: center"><strong>Radius (m)</strong></td>
                <td style="text-align: center"><strong>Boom Angle (°)</strong></td>
				<td style="text-align: center"><strong>SWL/Test Weight</strong></td>
				<td style="text-align: center"><strong>Comments</strong></td>              
            </tr>
            <tr>
                <td style="text-align: center"><strong>25.1</strong></td>
                <td style="text-align: center"><strong>15</strong></td>
                <td style="text-align: center"><strong>49.4</strong></td>
				<td style="text-align: center"><strong>10.7 Ton</strong></td>
				<td style="text-align: center"><strong>SATISFACTORY</strong></td>           
            </tr>
			<tr>
                <td style="text-align: center"><strong></strong></td>
                <td style="text-align: center"><strong></strong></td>
                <td style="text-align: center"><strong></strong></td>
				<td style="text-align: center"><strong></strong></td>
				<td style="text-align: center"><strong></strong></td>           
            </tr>
        </table>
<p style="font-size: 10px; text-align: center; color: red;"><strong><i>Note: 	SWL Test weight is calculated by the following formula and includes the mass of lifting hook and slings, with test load rated lifting capacity of X 100% and outriggers are fully extended.</i></strong></p>
        <table class="content-table">
            <tr class="section-title">
                <td colspan="5" style="text-align: center">C. RESULT OF INSPECTION</td>
            </tr>
            <tr class="section-title" >
                <td style="text-align: center">OPERATION</td>
				<td style="text-align: center">COMMENTS</td>
				<td style="text-align: center">SAFETY DEVICES</td>
				<td style="text-align: center">COMMENTS</td>              
            </tr>
            <tr>
                <td style="text-align: center"><strong>Boom Lifting</strong></td>
                <td style="text-align: center"><strong>GOOD</strong></td>
                <td style="text-align: center"><strong>Auto Moment Limiter</strong></td>
				<td style="text-align: center"><strong>GOOD</strong></td>              
            </tr>
            <tr>
                <td style="text-align: center"><strong>M. Winch Hoist</strong></td>
                <td style="text-align: center"><strong>GOOD</strong></td>
                <td style="text-align: center"><strong>Swing & Winch Brake</strong></td>
				<td style="text-align: center"><strong>GOOD</strong></td>              
            </tr>
            <tr>
                <td style="text-align: center"><strong>Aux. Winch Hoist</strong></td>
                <td style="text-align: center"><strong>N/A</strong></td>
                <td style="text-align: center"><strong>Winch Drum Lock (Pawl)</strong></td>
				<td style="text-align: center"><strong>N/A</strong></td>              
            </tr>
            <tr>
                <td style="text-align: center"><strong>Boom Extending</strong></td>
                <td style="text-align: center"><strong>GOOD</strong></td>
                <td style="text-align: center"><strong>Leveling Device</strong></td>
				<td style="text-align: center"><strong>GOOD</strong></td>              
            </tr>
            <tr>
                <td style="text-align: center"><strong>Outriggers</strong></td>
                <td style="text-align: center"><strong>GOOD</strong></td>
                <td style="text-align: center"><strong>Hook Block Assembly</strong></td>
				<td style="text-align: center"><strong>GOOD</strong></td>              
            </tr>
            <tr>
                <td style="text-align: center"><strong>Swings / Slew</strong></td>
                <td style="text-align: center"><strong>GOOD</strong></td>
                <td style="text-align: center"><strong>Boom Angle Indicator</strong></td>
				<td style="text-align: center"><strong>GOOD</strong></td>              
            </tr>
            <tr>
                <td style="text-align: center"><strong>Hydraulic System</strong></td>
                <td style="text-align: center"><strong>GOOD</strong></td>
                <td style="text-align: center"><strong>Wind Speed Indicator (Anemometer)</strong></td>
				<td style="text-align: center"><strong>GOOD</strong></td>              
            </tr>
        </table>

        <p style="font-size: 10px; text-align: center; color: red;"><strong>We hereby certify that the above Crane has been duly inspected and load tested as per the Manufacturer’s Recommendation or based on ASME B30.5 and conducted by a competent person and witnessed by certified inspector.</strong></p>
<div class="space"></div>
        <p style="font-size: 10px; text-align: center;  color: red;"><strong>This certificate contained herein is the good-faith opinion of CIMS – AGITE as to the Visual Condition of the crane inspected. This Certificate is in no way represents any guarantee expressed or implied as to the classification fitness for use of merchantability of the crane and in no event shall CIMS – AGITE be held liable for any damage as result to its use.</strong></p>
		
		<p style="font-size: 11px;text-align: center;">
		
		<strong><i>OVERSEAS FULL MEMBER OF LIFTING EQUIPMENT ENGINEERS ASSOCIATION (LEEA, UNITED KINGDOM) 662</i></strong> 
		</p>

        <div class="footer">
            <img src="../foot.jpg" alt="Footer Image">
        </div>
<br>
        <!-- <div class="text-center">
    <a href="download.php" ><button>Download</button></a>
  </div> -->


    </div>
    </body>
</html>
HTML;

// $mpdf->SetWatermarkImage('../logo.png', 0.3, '', [70, 100]);
// $mpdf->showWatermarkImage = true;

$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']); // 'L' for landscape
$mpdf->WriteHTML($html);
$mpdf->Output('mobile-crane.pdf', 'D'); // 'D' to force download, use 'I' to inline view
