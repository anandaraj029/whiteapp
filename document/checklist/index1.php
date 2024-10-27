<?php 
include_once('../../inc/function.php');
include_once('../../file/config.php'); // include your database connection

// Fetch data from checklist_information table

$sql = "SELECT * FROM checklist_information";
$result = $conn->query($sql);
?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card bg-transparent">
                    <div class="card-body bg-white ">

                    <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2">Checklist List</h4>
                    </div>
                        <div class="col-6 text-right">
                            <a href="./add-sticker.php" >
                       <button type="button" class="btn" >Create New</button>    
                       </a>           
                        </div>
                    </div>
                    </div>

                    <div class="table-responsive">
                        <table class="order-list-table text-nowrap">
                            <thead>
                                <th></th>
                                    <th>Checklist No </th>
                                    <th>Project ID</th>
                                    <th>Inspect By</th>
                                    <th>Equipment</th>
                                    <th>Company</th>
                                    <!-- <th>Shipping</th>
                                    <th>Quantity</th> -->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php 
                                // Check if records exist
                                if(mysqli_num_rows($result) > 0) {
                                    // Loop through each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $checklist_type = $row['checklist_type']; // Get checklist type for each row

                                        echo "<tr>";
                                        echo "<td> 
        <div class='star'>
            <a href='./type/{$checklist_type}.php?checklist_type=$checklist_type'>
            
                <div class='icon text-primary'>
                    <i class='et-document'></i>
                </div>
            </a>
        </div>
    </td>";
                                        echo "<td>{$row['checklist_no']}</td>";
                                        echo "<td>project_id</td>";
                                        echo "<td>{$row['inspected_by']}</td>";
                                        echo "<td>{$row['equipment_type']}</td>";
                                        echo "<td>{$row['client_name']}</td>";
                                        
                                        // Dynamically set button style based on status
                                        // $statusClass = '';
                                        // if ($row['status'] == 'Closed') {
                                        //     $statusClass = 'un_paid';
                                        // } elseif ($row['status'] == 'Pending') {
                                        //     $statusClass = 'on_hold';
                                        // } else {
                                        //     $statusClass = 'paid';
                                        // }
                                        // echo "<td>
                                        // // <button type='button' class='status-btn {$statusClass}'>{$row['status']}</button></td>";

                                        echo "<td>
                                         <button type='button' class='status-btn'>'status'</button></td>";

                                        echo "<td class='actions'>
                                                <a href='#'>
                                                    <span class='contact-edit' data-toggle='modal' data-target='#contactEditModal'>
                                                        <img src='{$url}assets/img/svg/c-edit.svg' alt='' class='svg'>
                                                    </span>
                                                </a>
                                                <a href='#'>
                                                    <span class='contact-close'>
                                                        <img src='{$url}assets/img/svg/c-close.svg' alt='' class='svg'>
                                                    </span>
                                                </a>
                                            </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        
                    </div>
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
include_once('../../inc/footer.php');
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
