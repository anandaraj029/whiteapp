<?php 
include_once('../inc/function.php');
include '../file/config.php'; // Database connection

// Fetch data from the stickers table
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
                    <div class="card-body bg-white">

                        <div class="row">
                            <div class="col-6">
                                <h4 class="pl-2 pt-3 pb-2">Sticker List</h4>
                            </div>
                            <div class="col-6 text-right">
                                <a href="./add-sticker.php">
                                    <button type="button" class="btn">Create New</button>    
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
                                    <th>Inspection Date</th>                                    
                                    <th>Date of Expiry</th>
                                    <th>Sticker Status</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php
                                // Check if there are any records in the result
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Calculate expiry date as 3 months from the inspection_date
                                        $expiry_date = date("Y-m-d", strtotime("+3 months", strtotime($row['inspection_date'])));

                                        // Update the expiry date in the database if it's not already correct
                                        if ($row['expiry_date'] !== $expiry_date) {
                                            $update_expiry_sql = "UPDATE stickers SET expiry_date = ? WHERE sticker_start_no = ?";
                                            $stmt_update_expiry = $conn->prepare($update_expiry_sql);
                                            $stmt_update_expiry->bind_param("ss", $expiry_date, $row['sticker_start_no']);
                                            $stmt_update_expiry->execute();
                                            $stmt_update_expiry->close();
                                        }

                                        // Determine the status dynamically based on the expiry date
                                        $current_date = date("Y-m-d");
                                        if ($current_date > $expiry_date) {
                                            $new_status = 'expired';
                                            $status_class = 'un_paid'; // Expired (Red color)
                                            $status_text = 'Expired';
                                        } else {
                                            $new_status = $row['status']; // Keep the original status if not expired
                                            switch ($row['status']) {
                                                case 'active':
                                                    $status_class = 'paid'; // Active (Green color)
                                                    $status_text = 'Active';
                                                    break;
                                                case 'on_hold':
                                                    $status_class = 'on_hold'; // On Hold (Yellow color)
                                                    $status_text = 'On Hold';
                                                    break;
                                                default:
                                                    $status_class = 'on_hold'; // Pending (Gray color)
                                                    $status_text = 'Pending';
                                                    break;
                                            }
                                        }

                                        // Update the status in the database if it has changed
                                        if ($new_status !== $row['status']) {
                                            $update_status_sql = "UPDATE stickers SET status = ? WHERE sticker_start_no = ?";
                                            $stmt_update_status = $conn->prepare($update_status_sql);
                                            $stmt_update_status->bind_param("ss", $new_status, $row['sticker_start_no']);
                                            $stmt_update_status->execute();
                                            $stmt_update_status->close();
                                        }

                                        // Assign different colors for "Passed" and "Failed" for sticker status
                                        if ($row['sticker_status'] === "Passed") {
                                            $sticker_status_class = 'text-success'; // Green text
                                            $sticker_status_text = 'Passed';
                                        } elseif ($row['sticker_status'] === "Failed") {
                                            $sticker_status_class = 'text-danger'; // Red text
                                            $sticker_status_text = 'Failed';
                                        } else {
                                            $sticker_status_class = 'text-muted'; // Gray text for undefined status
                                            $sticker_status_text = 'Pending';
                                        }

                                        // Render the table row
                                        echo "<tr>
                                            <td>#{$row['sticker_start_no']}</td>
                                            <td>{$row['project_no']}</td>
                                            <td>{$row['assign_inspector']}</td>
                                            <td>" . date("d/m/Y", strtotime($row['inspection_date'])) . "</td>
                                            <td>" . date("d/m/Y", strtotime($expiry_date)) . "</td>
                                            <td><button type='button' class='status-btn $sticker_status_class'>$sticker_status_text</button></td>
                                            <td><button type='button' class='status-btn $status_class'>$status_text</button></td>
                                            <td class='actions'>
                                                <a href='#'><span class='contact-edit' data-toggle='modal' data-target='#contactEditModal'>
                                                    <img src='{$url}assets/img/svg/c-edit.svg' alt='' class='svg'>
                                                </span></a>
                                                <a href='delete-sticker.php?id={$row['sticker_start_no']}' onclick='return confirm(\"Are you sure you want to delete this sticker?\");'>
                                                    <span class='contact-close'>
                                                        <img src='{$url}assets/img/svg/c-close.svg' alt='' class='svg'>
                                                    </span>
                                                </a>";

                                        // Check sticker_status to determine the appropriate download link
                                        if ($row['sticker_status'] === "Passed") {
                                            echo "<a href='download-white.php?sticker_start_no={$row['sticker_start_no']}' class='btn btn-sm btn-primary'>
                                                Download
                                            </a>";
                                        } elseif ($row['sticker_status'] === "Failed") {
                                            echo "<a href='download.php?sticker_start_no={$row['sticker_start_no']}' class='btn btn-sm btn-primary'>
                                                Download
                                            </a>";
                                        }

                                        echo "</td>
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
