<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wheel Loader Inspection Checklist</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="table-responsive">
    <table class="w-100">
            <tr>
        <td rowspan="4" class="logo-cell ">
            <img src="../logo.png"  alt="CIMS Logo" width="100"> <!-- Replace 'logo.png' with actual image path -->
        </td>
        <td colspan="3" class="no-border">
            <span class="main-title">CRANE INSPECTION & MAINTENANCE SERVICES</span><br>
            A DIVISION OF AL-KHOBAR GATE INTERNATIONAL TRADING EST.
        </td>
    </tr>
    <tr>
        <td colspan="3" class="">
            <strong>INSPECTION CHECKLIST FOR WHEEL LOADER</strong>
        </td>
    </tr>
    <tr>
        <td>FRM.0601-2.4</td>
        <td>Revision 00</td>
        <td><b>Issue Date: </b>01/JAN/2020</td>
    </tr>
    <tr>
        <td class="left-align"><b>Prepared By:</b><br>Operations Manager</td>
        <td  class="left-align"><b>Reviewed & Approved By:</b><br>Managing Director</td>
   
   <td><img src="../../code.png" width="80px" height="80px" alt="" /></td>
</tr>
</table>
      <!-- <table class="table table-bordered head"  style="width: 100%;">

      <tr>   
        <td colspan="3" style="width: 33%;">INSPECTION CHECKLIST FOR WHEEL LOADER</td>
       </tr>
       <tr>   
        <td style="width: 33%;">FRM.0601-2.4</td>
        <td style="width: 33%;">Revision 00</td>
        <td style="width: 33%;">Issue Date: 01/JAN/2020</td>
       </tr>

      </table> -->
    </div>
        <h5 id="title1"></h5>
        <h5 id="title2"></h5>
        <h5 id="title3"></h5>

        <!-- Client Information Table -->
        <div class="table-responsive">
            <table class="table table-bordered client-info">
                <tr>
                    <th style="width: 25%;">CLIENT’S NAME:</th>
                    <td></td>
                    <th style="width: 25%;">INSPECTION DATE:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>LOCATION:</th>
                    <td></td>
                    <th>REPORT NO:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>EQUIPMENT NO:</th>
                    <td></td>
                    <th>STICKER NO.:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>EQUIPMENT TYPE:</th>
                    <td></td>
                    <th>EQUIP. SERIAL NO.:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>MANUFACTURER:</th>
                    <td></td>
                    <th>YEAR MODEL:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>EQUIP. MODEL NO.:</th>
                    <td></td>
                    <th>CAPACITY (SWL):</th>
                    <td></td>
                </tr>
            </table>
        </div>

        <!-- Inspection Data Table -->
        <div class="table-responsive">
            <table class="table table-bordered inspection-data">
                <thead class="thead-dark">
                    <tr>
                        <th style="text-align: center;">S.N</th>
                        <th style="text-align: center;">ACCEPTANCE CRITERIA</th>
                        <th style="text-align: center;" colspan="3">RESULT</th>
                        <th style="text-align: center;">REMARKS</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Rows will be populated by JavaScript -->
                </tbody>
            </table>
        </div>

        <!-- Signatures Table -->
        <div class="table-responsive">
            <table class="table table-bordered signatures">
                <tr>
                    <th style="width: 25%;">INSPECTOR’S NAME:</th>
                    <td></td>
                    <th style="width: 25%;">CLIENT’S REP. NAME:</th>
                    <td></td>
                </tr>
                <tr>
                    <th>SIGNATURE & DATE:</th>
                    <td></td>
                    <th>SIGNATURE & DATE:</th>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('../datanew.json')
                .then(response => response.json())
                .then(data => {
                    populatePage(data);
                });

            function populatePage(data) {
                // Populate header
                document.getElementById('title1').innerText = data.header.title1;
                document.getElementById('title2').innerText = data.header.title2;
                document.getElementById('title3').innerText = data.header.title3;

                // Populate client info table
                const clientInfo = data.clientInfo;
                document.querySelectorAll('.client-info td').forEach((td, index) => {
                    td.innerText = Object.values(clientInfo)[index];
                });

                // Populate inspection data table
                const inspectionTableBody = document.querySelector('.inspection-data tbody');
                inspectionTableBody.innerHTML = ''; // Clear existing rows
                data.inspectionData.forEach(section => {
                    const sectionHeaderRow = document.createElement('tr');
                    sectionHeaderRow.innerHTML = `
                         <th style="text-align: center;">${section.section}</th>
                            <th style="text-align: center;">${section.criteria}</th>
                            <th style="text-align: center;">Pass</th>
                            <th style="text-align: center;">Fail</th>
                            <th style="text-align: center;">N/A</th>
                            <th style="text-align: center;">REMARKS </th>
                        
                    `;
                    inspectionTableBody.appendChild(sectionHeaderRow);

                    section.items.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${item.sn}</td>
                            <td>${item.criteria}</td>
                            <td><input type="checkbox" ${item.result.pass ? 'checked' : ''}></td>
                            <td><input type="checkbox" ${item.result.fail ? 'checked' : ''}></td>
                            <td><input type="checkbox" ${item.result.na ? 'checked' : ''}></td>
                            <td>${item.remarks}</td>
                        `;
                        inspectionTableBody.appendChild(row);
                    });
                });

                // Populate signatures table
                const signatures = data.signatures;
                document.querySelectorAll('.signatures td').forEach((td, index) => {
                    td.innerText = Object.values(signatures)[index];
                });
            }
        });
    </script>
</body>
</html>
