<?php 
include_once('../inc/function.php');


include '../file/config.php'; // Database connection

// Fetch data from the project_info table
$sql = "SELECT * FROM stickers";
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
                        <h4 class="pl-2 pt-3 pb-2">Sticker List</h4>
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
                                <tr>
                                <th>Sticker ID</th>
                                <th>Project ID</th>
                                <th>Inspect By</th>
                                <th>Date of Issue</th>
                                <th>Date of Expiry</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                       


                             <?php
            // Check if there are any records in the result
            if ($result->num_rows > 0) {
                // Loop through each row in the result set
                while ($row = $result->fetch_assoc()) {
                    // Set status button class based on database_status
                    $status_class = '';
                    $status_text = '';
                    switch ($row['status']) {
                        case 'active':
                            $status_class = 'paid';
                            $status_text = 'Active';
                            break;
                        case 'expired':
                            $status_class = 'un_paid';
                            $status_text = 'Expired';
                            break;
                        case 'on_hold':
                            $status_class = 'on_hold';
                            $status_text = 'On Hold';
                            break;
                        default:
                            $status_class = 'on_hold';
                            $status_text = 'Pending';
                            break;
                    }

                    echo "<tr>
                            <td>#{$row['sticker_start_no']}</td>
                            <td>{$row['project_no']}</td>
                            <td>{$row['assign_inspector']}</td>
                            <td>" . date("d/m/Y", strtotime($row['created_at'])) . "</td>
                            <td>" . date("d/m/Y", strtotime($row['expiry_date'])) . "</td>
                            <td><button type='button' class='status-btn $status_class'>$status_text</button></td>
                            <td class='actions'>
                                <a href='#'><span class='contact-edit' data-toggle='modal' data-target='#contactEditModal'>
                                    <img src='{$url}assets/img/svg/c-edit.svg' alt='' class='svg'>
                                </span></a>
                               <a href='delete-sticker.php?id={$row['sticker_start_no']}' onclick='return confirm(\"Are you sure you want to delete this sticker?\");'>
                                <span class='contact-close'>
                                    <img src='{$url}assets/img/svg/c-close.svg' alt='' class='svg'>
                                </span>
                            </a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No stickers found</td></tr>";
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
