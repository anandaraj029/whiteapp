<?php 
include_once('../../inc/function.php');
include_once('../../file/config.php'); // include your database connection

// Fetch data from checklist_information table

// Fetch data from checklist_information table in descending order of creation date
$sql = "SELECT * FROM checklist_information ORDER BY created_at DESC";
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
                            <a href="./add-checklist.php">
                       <button type="button" class="btn">Create New</button>    
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
                                    <th>Checklist Type</th>
                                    <th>Company</th>
                                    <!-- <th>Shipping</th>
                                    <th>Quantity</th> -->
                                    <!-- <th>Status</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
    <?php 
    // Check if records exist
    if (mysqli_num_rows($result) > 0) {
        // Loop through each row
        while ($row = mysqli_fetch_assoc($result)) {
            $checklist_type_raw = $row['checklist_type']; // Raw checklist type
            $checklist_no = $row['checklist_id']; // Get checklist number for each row
            
            // Format the checklist type: remove hyphens/underscores and capitalize words
            $formatted_checklist_type = str_replace(['-', '_'], ' ', $checklist_type_raw); // Replace hyphens/underscores with spaces
            $formatted_checklist_type = ucwords($formatted_checklist_type); // Capitalize each word


             // Get inspector's name from the database (assuming you already have it in $row['inspected_by'])
             $inspector_name = $row['inspected_by']; 

             // Define the path to the inspector's image
             $inspector_image_path = "../../inspector/uploads/{$inspector_name}/images/profile_image.jpg";
             
             // Check if the inspector's image exists
             if (file_exists($inspector_image_path)) {
                 $inspector_image = $inspector_image_path; // Set the image path if it exists
             } else {
                 // Fallback to a default image if the inspector's image doesn't exist
                 $inspector_image = "../uploads/default_profile_image.jpg";
             }
            
            echo "<tr>";
            echo "<td> 
                <div class='star'>
                    <a href='./type/view/{$checklist_type_raw}.php?checklist_type={$checklist_type_raw}&&checklist_no={$checklist_no}'>
                        <div class='icon text-primary'>
                            <i class='et-document'></i>
                        </div>
                    </a>
                </div>
            </td>";
            echo "<td>{$row['checklist_no']}</td>";
            echo "<td>{$row['project_id']}</td>";
            echo "<td>";
            // Display the inspector's image and name
            echo "<img src='{$inspector_image}' alt='{$inspector_name}' class='inspector-image' style='width: 30px; height: 30px; border-radius: 50%; margin-right: 10px;'>";
            echo "{$inspector_name}</td>";
            echo "<td>{$row['equipment_type']}</td>";
            
            // Use the formatted checklist type
            echo "<td>{$formatted_checklist_type}</td>";
            
            echo "<td>{$row['client_name']}</td>";
            // echo "<td>
            //     <button type='button' class='status-btn'>{$row['status']}</button>
            // </td>";
            echo "<td class='actions'>
                  <a href='./type/{$checklist_type_raw}.php?checklist_type={$checklist_type_raw}&&checklist_no={$checklist_no}'>
                        <span class='contact-edit'>
                            <img src='{$url}assets/img/svg/c-edit.svg' alt='' class='svg'>
                        </span>
                    </a>
                    <a href='#' class='delete-checklist' data-checklist-no='{$checklist_no}'>
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
                title: 'Order List',
                exportOptions: {
                    columns: ':not(:last-child)' // Exclude the last column (Action column)
                }
            }
        ],
        "searching": true
    });



        // Delete functionality
        $(document).on('click', '.delete-checklist', function(e) {
            e.preventDefault();

            // Confirm before deletion
            if (confirm("Are you sure you want to delete this checklist?")) {
                const row = $(this).closest('tr'); // Get the row
                const checklistNo = $(this).data('checklist-no'); // Get the checklist number

                // Send AJAX request to delete the checklist
                $.ajax({
                    url: './delete_checklist.php', // Backend URL
                    type: 'POST',
                    data: { checklist_no: checklistNo }, // Data to send
                    dataType: 'json', // Expect JSON response
                    success: function(response) {
                        if (response.status === 'success') {
                            row.fadeOut(300, function() { // Remove row from DOM
                                $(this).remove();
                            });
                        } else {
                            alert('Failed to delete the checklist: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('An error occurred while processing your request.');
                    }
                });
            }
        });
    });
</script>
