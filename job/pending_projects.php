<?php 

include_once('../inc/function.php');
include '../file/config.php'; // Database connection

// Fetch data from the project_info table
// $sql = "SELECT * FROM project_info";
// $result = $conn->query($sql);


// Check if the user is logged in
$logged_in_user = $_SESSION['username'] ?? null; // Replace with the appropriate session key
$user_role = $_SESSION['role'] ?? null; // Assuming you have a role stored in the session
// $projectNo = $row["project_no"];
if ($logged_in_user) {
    if ($user_role === 'admin' || $user_role === 'reviewer' || $user_role === 'quality controller' || $user_role === 'document controller') {
        // Fetch only pending projects
        $sql = "SELECT * FROM project_info WHERE project_status = 'Pending' ORDER BY project_no DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        // Fetch only pending projects for the logged-in inspector
        $sql = "SELECT * FROM project_info WHERE inspector_name = ? AND project_status = 'Pending' ORDER BY project_no DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $logged_in_user);
        $stmt->execute();
        $result = $stmt->get_result();
    }
} else {
    // Redirect to login page if not logged in
    header("Location: ../index.php");
    exit;
}
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

            <!-- Status Filter Dropdown -->
    <!-- <div class="mr-20 mt-3 mt-sm-0">
        <select id="status-filter" class="form-control">
            <option value="">All</option>
            <option value="Pending">Pending</option>
            <option value="Completed">Completed</option>
            
        </select>
    </div> -->
    <!-- End Status Filter Dropdown -->
                <!-- Date Picker -->
                <!-- <div class="mr-20 mt-3 mt-sm-0"> -->
                   <!-- <span class="input-group-addon">
                      <img src="../../assets/img/svg/calender-color.svg" alt="" class="svg">
                    </span> -->

                    <!-- <a href="create-job.php" id="createJobBtn">
    <button type="button" class="btn btn-primary">Create New</button>
</a>
                </div> -->
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
        <table id="job-table" class="order-list-table style--three table-centered text-nowrap">
    <thead>
        <tr>
            <th>Project ID</th>
            <th>Start Date</th>
            <th>Progress</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Equip. Type</th>
            <th>Location</th>
            <th>Inspector</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td class="bold"><?php echo "#" . str_pad($row["project_no"], 5, "0", STR_PAD_LEFT); ?></td>
                    <td><?php echo date("d M Y", strtotime($row["creation_date"])); ?></td>
                    <!-- <td>
                        <div class="product-img">
                        <badge class="primary">
                       <a href=""><i class="icofont-checked color-primary"></i> Checklist</a> </badge>
                       <a href=""><i class="icofont-edit color-primary"></i> Report</a> 
                       <a href=""><i class="icofont-data color-primary"></i> Certificate</a> 
                             <img src="../assets/img/product/product1.png" alt="">
                            <img src="../assets/img/product/product1.png" alt="">
                            <img src="../assets/img/product/product1.png" alt=""> 
                        </div>
                    </td> -->


                    <td>
    <div class="product-img">
        <?php if ($user_role === 'inspector') { ?>
            <?php if ($row['checklist_status'] === 'Pending') { ?>
                <a href="../document/checklist/add-checklist.php?project_no=<?php echo $row['project_no']; ?>" class="text-primary">
                    <i class="icofont-checked color-primary"></i> Create Checklist
                </a>
            <?php } else { ?>
                <span class="text-success">
                    <i class="icofont-check color-success"></i> Checklist Created
                </span>
            <?php } ?>

            <!-- Report Button Logic -->
            <?php if ($row['checklist_status'] === 'Created') { ?>
                <?php if ($row['report_status'] === 'Pending') { ?>
                    <a href="../document/report/create.php?project_no=<?php echo $row['project_no']; ?>" class="text-primary">
                        <i class="icofont-edit color-primary"></i> Create Report
                    </a>
                <?php } elseif ($row['report_status'] === 'Generated') { ?>
                    <span class="text-success">
                        <i class="icofont-check color-success"></i> Report Created
                    </span>
                <?php } else { ?>
                    <span class="text-muted">
                        <i class="icofont-lock"></i> Report Locked
                    </span>
                <?php } ?>
            <?php } else { ?>
                <span class="text-muted">
                    <i class="icofont-lock"></i> Checklist Pending
                </span>
            <?php } ?>
        <?php } else { ?>
            <span class="text-muted">
                <i class="icofont-lock"></i> Access Restricted
            </span>
        <?php } ?>
    </div>
</td>

                    <td><?php echo htmlspecialchars($row["customer_name"]); ?></td>
                    <!-- <td class="status-btn pending"><?php echo htmlspecialchars($row["project_status"]); ?></td> -->
                    <td class="status-btn">
    <a href="#" class="btn s_alert <?php echo ($row["project_status"] === "Completed") ? 'bg-success-light text-success' : 'bg-danger-light text-danger'; ?> mb-10">
        <?php echo ($row["project_status"] === "Completed") ? 'Completed' : 'Pending'; ?>
    </a>
</td>
                    <td><?php echo htmlspecialchars($row["equipment_type"]); ?></td>
                    <td><?php echo htmlspecialchars($row["equipment_location"]); ?></td>
                    <td><?php echo htmlspecialchars($row["inspector_name"]); ?></td>
                    <td>
                                                    <a href="job-details.php?id=<?php echo $row['project_no']; ?>">
                                                        <button type="button" class="details-btn">
                                                            Details <i class="icofont-arrow-right"></i>
                                                        </button>
                                                    </a>
                                                    <!-- Delete Button (Visible only to Admin) -->
                                                    <?php if ($user_role === 'admin') { ?>
        <a href="delete_project.php?id=<?php echo urlencode($row['project_no']); ?>">
    <button type="button" class="btn btn-sm text-danger">
        Delete <i class="icofont-arrow-right"></i>
    </button>
</a>
                                                    <?php } ?>
                                                </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='9' class='text-center'>No records found.</td></tr>";
        }
        ?>
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
                text: 'Export',
                title: 'Project List',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            }
        ],
        "order": [[0, "desc"]],  // Sort by the first column (Project ID) in descending order
        "searching": true
    });
});

</script>

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        const statusFilter = document.getElementById('status-filter');
        const table = document.getElementById('job-table');
        const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

        statusFilter.addEventListener('change', function() {
            const selectedStatus = this.value;

            for (let row of rows) {
                const statusCell = row.getElementsByClassName('status-btn')[0];
                if (statusCell) {
                    const status = statusCell.textContent.trim();
                    if (selectedStatus === "" || status === selectedStatus) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const userRole = <?php echo json_encode($user_role); ?>;
        if (userRole !== "admin") {
            document.getElementById("createJobBtn").style.display = "none";
        }
    });
</script>


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


<script>

// Delete Project Function
function deleteProject(projectNo) {
    if (confirm("Are you sure you want to delete this project?")) {
        fetch(`delete_project.php?project_no=${projectNo}`, {
            method: 'GET',
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert("Project deleted successfully.");
                location.reload(); // Reload the page to reflect changes
            } else {
                alert("Failed to delete project: " + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("An error occurred while deleting the project.");
        });
    }
}
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

<script>
document.getElementById('pdf-button').addEventListener('click', function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Define columns (excluding "Action" column)
    const columns = [];
    document.querySelectorAll("#job-table thead th").forEach((th, index) => {
        if (index !== 8) { // Assuming "Action" is the 9th column (index starts at 0)
            columns.push(th.textContent.trim());
        }
    });

    // Extract row data excluding "Action" column
    const rows = [];
    document.querySelectorAll("#job-table tbody tr").forEach(tr => {
        const row = [];
        tr.querySelectorAll("td").forEach((td, index) => {
            if (index !== 8) { // Exclude "Action" column
                row.push(td.textContent.trim());
            }
        });
        rows.push(row);
    });

    // Generate PDF with autoTable
    doc.autoTable({
        head: [columns], 
        body: rows,
        startY: 20,
        theme: 'striped',
        styles: { fontSize: 10 }
    });

    doc.save('job-list.pdf');
});
</script>
