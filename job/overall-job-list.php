<?php 
include_once('../inc/function.php');
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
                           <th>Equip.Id</th>
                           <th>Location</th>
                           <th>Inspector</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
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
                        </tr>

                        <tr>
                           <td class="bold">#01365</td>
                           <td>12 Oct 2019</td>
                           <td>
                              <div class="product-img d-flex align-ite">
                              <!-- <div class="color-circle bg-success-light text-success mr-2 mb-2">Success</div> -->
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
                        </tr>

                        <tr>
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
                        </tr>
                     </tbody>
                  </table>
               </div>
        <!-- End Invoice List Table -->
    </div>
</div>

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


                    <!-- <div class="table-responsive">
                        <table class="order-list-table text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID <img src="../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th>
                                    <th>Purchase Date <img src="../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th>
                                    <th>Customer <img src="../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th>
                                    <th>Grand Total <img src="../../assets/img/svg/table-down-arrow.svg" alt="" class="svg"></th>
                                    <th>Tax</th>
                                    <th>Shipping</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr>
                                    <td>#00125</td>
                                    <td>14 November 2019</td>
                                    <td>Jim Spencer</td>
                                    <td>$2546.6</td>
                                    <td>$25.6</td>
                                    <td>$5.6</td>
                                    <td>12</td>
                                    <td><button type="button" class="status-btn un_paid">Unpaid</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00126</td>
                                    <td>15 November 2019</td>
                                    <td>Gordon Wood</td>
                                    <td>$645.2</td>
                                    <td>$6.2</td>
                                    <td>$6.2</td>
                                    <td>36</td>
                                    <td><button type="button" class="status-btn on_hold">On Hold</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00127</td>
                                    <td>16 November 2019</td>
                                    <td>Maggie Hawkins</td>
                                    <td>$1546.5</td>
                                    <td>$16.5</td>
                                    <td>$16.5</td>
                                    <td>25</td>
                                    <td><button type="button" class="status-btn on_hold">On Hold</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00128</td>
                                    <td>17 November 2019</td>
                                    <td>Chester Love</td>
                                    <td>$3568.8</td>
                                    <td>$38.8</td>
                                    <td>$8.8</td>
                                    <td>26</td>
                                    <td><button type="button" class="status-btn paid">Paid</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00129</td>
                                    <td>18 November 2019</td>
                                    <td>Clifton Morales</td>
                                    <td>$215.6</td>
                                    <td>$25.6</td>
                                    <td>$5.6</td>
                                    <td>16</td>
                                    <td><button type="button" class="status-btn completed">Completed</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00130</td>
                                    <td>19 November 2019</td>
                                    <td>Tasha Jackson</td>
                                    <td>$46.6</td>
                                    <td>$4.6</td>
                                    <td>$14.6</td>
                                    <td>36</td>
                                    <td><button type="button" class="status-btn completed">Completed</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00131</td>
                                    <td>20 November 2019</td>
                                    <td>Everett Aguilar</td>
                                    <td>$154.8</td>
                                    <td>$14.8</td>
                                    <td>$4.8</td>
                                    <td>25</td>
                                    <td><button type="button" class="status-btn un_paid">Unpaid</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00132</td>
                                    <td>21 November 2019</td>
                                    <td>Sarah Ramos</td>
                                    <td>$15.6</td>
                                    <td>$5.6</td>
                                    <td>$4.8</td>
                                    <td>14</td>
                                    <td><button type="button" class="status-btn on_hold">On Hold</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00133</td>
                                    <td>22 November 2019</td>
                                    <td>Eileen Figueroa</td>
                                    <td>$156.3</td>
                                    <td>$16.3</td>
                                    <td>$6.3</td>
                                    <td>54</td>
                                    <td><button type="button" class="status-btn completed">Completed</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00134</td>
                                    <td>23 November 2019</td>
                                    <td>Harold Harrington</td>
                                    <td>$254.1</td>
                                    <td>$4.1</td>
                                    <td>$4.1</td>
                                    <td>69</td>
                                    <td><button type="button" class="status-btn paid">Paid</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00135</td>
                                    <td>24 November 2019</td>
                                    <td>Tyler Howard</td>
                                    <td>$215.9</td>
                                    <td>$2.9</td>
                                    <td>$1.9</td>
                                    <td>14</td>
                                    <td><button type="button" class="status-btn un_paid">Unpaid</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00136</td>
                                    <td>25 November 2019</td>
                                    <td>Maxine Hogan</td>
                                    <td>$657.6</td>
                                    <td>$7.6</td>
                                    <td>$2.6</td>
                                    <td>47</td>
                                    <td><button type="button" class="status-btn completed">Completed</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00137</td>
                                    <td>26 November 2019</td>
                                    <td>Eleanor Bradley</td>
                                    <td>$2546.6</td>
                                    <td>$25.6</td>
                                    <td>$5.6</td>
                                    <td>26</td>
                                    <td><button type="button" class="status-btn on_hold">On Hold</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>

                                <tr>
                                    <td>#00138</td>
                                    <td>27 November 2019</td>
                                    <td>Nettie Stokes</td>
                                    <td>$645.2</td>
                                    <td>$6.2</td>
                                    <td>$6.2</td>
                                    <td>17</td>
                                    <td><button type="button" class="status-btn paid">Paid</button></td>
                                    <td><a href="#"><img src="../../assets/img/svg/table-colse.svg" alt="" class="svg"></a></td>
                                </tr>
                            </tbody>
                        </table>

                        
                    </div> -->
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
