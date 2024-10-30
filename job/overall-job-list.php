<?php 

include_once('../inc/function.php');

include '../file/config.php'; // Database connection

// Fetch data from the project_info table
$sql = "SELECT * FROM project_info";
$result = $conn->query($sql);
?>
<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card bg-transparent">
                    <!-- <div class="card-body bg-white ">

                    <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">Job List</h4>
                    </div>
                        <div class="col-6 text-right">
                       <button type="button" class="btn" >Create New</button>               
                        </div>
                    </div>
                    </div> -->
                    <div class="card mb-30">
    <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-center">
            <h4 class="font-20">Job List</h4>

            <div class="d-flex flex-wrap">
                <!-- Date Picker -->
                <div class=" mr-20 mt-3 mt-sm-0">
                   <!-- <span class="input-group-addon">
                      <img src="../../assets/img/svg/calender-color.svg" alt="" class="svg">
                    </span> -->

                  <a href="create-job.php"> <button type="button" class="btn" >Create New</button>   </a> 
                </div>
                <!-- End Date Picker -->

                <!-- Dropdown Button -->
                <div class="dropdown-button mt-3 mt-sm-0">
                    <button type="button" class="btn style--two orange" data-toggle="dropdown">Download <i class="icofont-simple-down"></i></button>

                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" id="print-button">Print</a>
                        <a class="dropdown-item" href="#" id="excel-button">EXL</a>
                        <a class="dropdown-item" href="#" id="pdf-button">PDF</a>
                    </div>
                </div>
                <!-- End Dropdown Button -->
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <!-- Invoice List Table -->
      
        <div class="table-responsive">
                  <table class="style--three table-centered text-nowrap">
                     <thead>
                        <tr>
                           <th>Project ID</th>
                           <th>Start Date</th>
                           <th>Progress</th>
                           <th>Customer</th>
                           <th>Status </th>
                           <th>Equip.type</th>
                           <th>Location</th>
                           <th>Inspector</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>

                     <?php
            if ($result->num_rows > 0) {
                // Loop through each row in the result
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td class="bold"><?php echo "#" . str_pad($row["id"], 5, "0", STR_PAD_LEFT); ?></td>
                        <td><?php echo date("d M Y", strtotime($row["creation_date"])); ?></td>
                        <td>
                            <div class="product-img">
                                <img src="../assets/img/product/product1.png" alt="">
                                <img src="../assets/img/product/product5.png" alt="">
                                <img src="../assets/img/product/product6.png" alt="">
                            </div>
                        </td>
                        <td><?php echo $row["customer_name"]; ?></td>
                        <td class="text-danger">Processing</td> <!-- Example status -->
                        <td class="bold"><?php echo $row["equipment_type"]; ?></td> <!-- Assuming Equip. ID is the project ID -->
                        <td class="bold"><?php echo $row["equipment_location"]; ?></td>
                        <td class="bold"><?php echo $row["inspector_name"]; ?></td>
                        <td>
                            <a href="job-details.php?id=<?php echo $row['id']; ?>">
                                <button type="button" class="details-btn">
                                    Details <i class="icofont-arrow-right"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='9' class='text-center'>No records found.</td></tr>";
            }
            ?>
                        <!-- <tr>
                           <td class="bold">#01254</td>
                           <td>12 Oct 2019</td>
                           <td>
                              <div class="product-img">
                                 <img src="../assets/img/product/product1.png" alt="">
                                 <img src="../assets/img/product/product5.png" alt="">
                                 <img src="../assets/img/product/product6.png" alt="">
                              </div>
                           </td>
                           <td>Kyle Lee</td>
                           <td class="text-danger">Processing</td>
                           <td class="bold">$2456.4</td>
                           <td class="bold">$24.6</td>
                           <td class="bold">2687</td>
                           <td><a href="job-details.php">
                            <button type="button" class="details-btn">Details <i class="icofont-arrow-right"></i></button></a></td>
                        </tr> -->

                        <!-- <tr>
                           <td class="bold">#01365</td>
                           <td>12 Oct 2019</td>
                           <td>
                              <div class="product-img d-flex align-ite">
                            
                                 <img src="../assets/img/product/product2.png" alt="">
                               
                                 <img src="../assets/img/product/product7.png" alt="">
                             
                                 <img src="../assets/img/product/product3.png" alt="">
                              </div>
                           </td>
                           <td>Lindo De Sire</td>
                           <td class="text-warning">Verified</td>
                           <td class="bold">$2456.4</td>
                           <td class="bold">$24.6</td>
                           <td class="bold">2687</td>
                           <td><a href="job-details.php"><button type="button" class="details-btn">Details <i class="icofont-arrow-right"></i></button></a></td>
                        </tr> -->

                        <!-- <tr>
                           <td class="bold">#03654</td>
                           <td>11 Oct 2019</td>
                           <td>
                              <div class="product-img">
                                 <img src="../assets/img/product/product8.png" alt="">
                                 <img src="../assets/img/product/product9.png" alt="">
                                 <img src="../assets/img/product/product10.png" alt="">
                              </div>
                           </td>
                           <td>Laturi Yasn</td>
                           <td class="text-success">Completed</td>
                           <td class="bold">$2456.4</td>
                           <td class="bold">$24.6</td>
                           <td class="bold">2687</td>
                           <td><a href="job-details.php">
                            <button type="button" class="details-btn">Details 
                                <i class="icofont-arrow-right"></i></button></a>
                            </td>
                        </tr> -->
                     </tbody>
                  </table>
               </div>
        <!-- End Invoice List Table -->
    </div>
</div>
<?php
// Close the database connection
$conn->close();
?>

<!-- Include the export scripts -->
<script>
// document.getElementById('pdf-button').addEventListener('click', function () {
//     const { jsPDF } = window.jspdf;
//     const doc = new jsPDF();
//     doc.autoTable({ html: '#job-table' });
//     doc.save('job-list.pdf');
// });

document.getElementById('excel-button').addEventListener('click', function () {
    var wb = XLSX.utils.table_to_book(document.getElementById('job-table'), { sheet: "Sheet JS" });
    XLSX.writeFile(wb, 'job-list.xlsx');
});
</script>


                  
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->
</div>
<!-- End Main Wrapper -->

<?php 
include_once('../inc/footer.php');
?>

<!-- DataTables scripts -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
    $(document).ready(function() {
        $('.order-list-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'Order List'
                }
            ],
            "searching": true
        });
    });
</script>
