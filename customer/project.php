<?php 
include_once('../inc/function.php');
include '../file/config.php'; // Database connection

// include ''; // Database connection

// Check if the user is logged in
$logged_in_user = $_SESSION['username'] ?? null;
$user_role = $_SESSION['role'] ?? null;

if (!$logged_in_user) {
    header("Location: ../index.php");
    exit;
}

// Fetch unique customer names for the dropdown
$customerQuery = "SELECT DISTINCT customer_name FROM project_info ORDER BY customer_name ASC";
$customerResult = $conn->query($customerQuery);

// Get selected customer ID from URL
$selected_customer_id = $_GET['cus_id'] ?? null;

// Prepare SQL to filter based on customer_id
if ($selected_customer_id) {
    // Fetch customer name based on cus_id
    $customerNameQuery = "SELECT customer_name FROM customers WHERE cus_id = ?";
    $stmt = $conn->prepare($customerNameQuery);
    $stmt->bind_param("s", $selected_customer_id);
    $stmt->execute();
    $customerNameResult = $stmt->get_result();
    
    if ($customerNameResult->num_rows > 0) {
        $customerNameRow = $customerNameResult->fetch_assoc();
        $selected_customer_name = $customerNameRow['customer_name'];
        
        $sql = "SELECT * FROM project_info WHERE customer_name = ? ORDER BY creation_date DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $selected_customer_name);
    } else {
        echo "No customer found with ID: $selected_customer_id";
        exit;
    }
} else {
    $sql = "SELECT * FROM project_info ORDER BY creation_date DESC";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card mb-30">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-between align-items-center">
                            <h4 class="font-20">Job List</h4>

                            
                        </div>
                    </div>

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
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <tr>
                                            <td class="bold"><?php echo "#" . str_pad($row["project_no"], 5, "0", STR_PAD_LEFT); ?></td>
                                            <td><?php echo date("d M Y", strtotime($row["creation_date"])); ?></td>
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
                                                    <?php } else { ?>
                                                        <span class="text-muted">
                                                            <i class="icofont-lock"></i> Access Restricted
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                            <td><?php echo htmlspecialchars($row["customer_name"]); ?></td>
                                            <td class="status-btn pending"><?php echo htmlspecialchars($row["project_status"]); ?></td>
                                            <td><?php echo htmlspecialchars($row["equipment_type"]); ?></td>
                                            <td><?php echo htmlspecialchars($row["equipment_location"]); ?></td>
                                            <td><?php echo htmlspecialchars($row["inspector_name"]); ?></td>
                                            <td>
                                                <a href="../job/job-details.php?id=<?php echo $row['project_no']; ?>">
                                                    <button type="button" class="details-btn">
                                                        Details <i class="icofont-arrow-right"></i>
                                                    </button>
                                                </a>
                                                
                                            </td>
                                        </tr>
                                    <?php }
                                } else {
                                    echo "<tr><td colspan='9' class='text-center'>No records found.</td></tr>";
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

<?php 
// Close the database connection
$conn->close();
include_once('../inc/footer.php');
?>

<!-- Include DataTables scripts -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

