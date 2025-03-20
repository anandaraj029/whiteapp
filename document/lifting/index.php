<?php 
// session_start();
include_once('../../inc/function.php');
include_once('../../file/config.php'); // Include database connection

// Secure SQL query using prepared statements
$stmt = $conn->prepare("SELECT lgc.*, pi.project_status 
                        FROM lifting_gear_certificates lgc
                        LEFT JOIN project_info pi ON lgc.project_no = pi.project_no");
$stmt->execute();
$result = $stmt->get_result();
?>
<!-- Main Content -->
<div class="main-content d-flex flex-column flex-md-row">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card bg-transparent">
                    <!-- Contact Header -->
                    <div class="contact-header d-flex align-items-sm-center media flex-column flex-sm-row bg-white mb-30">
                        <div class="contact-header-left media-body d-flex align-items-center mr-4">
                            <div class="card-body bg-white">
                                <div class="main-header-btn">
                                    <a href="#" class="btn">Lifting Gears Certificate</a>
                                </div>
                            </div>
                            <!-- Search Form -->
                            <form action="#" class="search-form flex-grow">
                                <div class="theme-input-group style--two">
                                    <input type="text" class="theme-input-style" placeholder="Search Here">
                                    <button type="submit">
                                        <img src="<?php echo $url; ?>assets/img/svg/search-icon.svg" alt="" class="svg">
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="contact-header-right d-flex align-items-center justify-content-end mt-3 mt-sm-0">
                            <!-- Add New Contact Btn -->
                            <div class="add-new-contact mr-20">
                                <a href="./create.php" class="btn-circle">
                                    <img src="<?php echo $url; ?>assets/img/svg/plus_white.svg" alt="" class="svg">
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- End Contact Header -->

                    <div class="table-responsive">
                        <!-- Certificate List Table -->
                        <table class="contact-list-table text-nowrap bg-white">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th></th>
                                    <th>Certificate No</th>
                                    <th>Project ID</th>
                                    <th>Report No</th>
                                    <th class="text-center">Inspector Name</th>
                                    <th>Date of Inspection</th>                           
                                    <th>Serial Number</th>  
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result->num_rows > 0): ?>
                                    <?php while ($row = $result->fetch_assoc()): ?>
                                        <tr id="row_<?php echo $row['project_no']; ?>">
                                        <td>
                                                <input type="checkbox">
                                            </td>
                                        <td>
                    <div class='star d-flex align-items-center'>
                        <a href='./view.php?project_no=<?php echo $row['project_no']; ?>' class='mr-2'>
                            <div class='icon text-primary'>
                                <i class='et-clipboard'></i>
                            </div>
                        </a>
                        <a href='./download.php?project_no=<?php echo $row['project_no']; ?>'>
                            <div class='icon text-primary'>
                                <i class='et-download'></i>
                            </div>
                        </a>
                    </div>
                </td>
                                            
                                            <td><?php echo htmlspecialchars($row['certificate_no']); ?></td>
                                            <td><?php echo htmlspecialchars($row['project_no']); ?></td>
                                            <td><?php echo htmlspecialchars($row['report_no']); ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="img mr-20">
                                                        <img src="../../inspector/uploads/<?php echo htmlspecialchars($row['inspector']); ?>/images/profile_image.jpg" class="img-40" alt="">
                                                    </div>
                                                    <div class="name bold"><?php echo htmlspecialchars($row['inspector']); ?></div>
                                                </div>
                                            </td>
                                            <td><?php echo htmlspecialchars($row['date_of_this_examination']); ?></td>
                                            <td><?php echo htmlspecialchars($row['identification_no']); ?></td>
                                            <td class="actions">
                                                <!-- Check if the user is 'document controller' and project is not completed -->
                                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'document controller' && $row['project_status'] !== 'Completed'): ?>
                                                    <span class='contact-edit' onclick='redirectToEditLifting(<?php echo json_encode($row['project_no']); ?>)'>
                                                        <img src='<?php echo $url; ?>assets/img/svg/c-edit.svg' alt='' class='svg'>
                                                    </span>
                                                <?php else: ?>
                                                    <span class='contact-edit disabled'>
                                                        <img src='<?php echo $url; ?>assets/img/svg/c-edit.svg' alt='' class='svg' style='opacity: 0.5; cursor: not-allowed;'>
                                                    </span>
                                                <?php endif; ?>

                                                <!-- Delete action -->
                                                <!-- <span class='contact-close' onclick='deleteRow(<?php echo json_encode($row['project_no']); ?>)'>
                                                    <img src='<?php echo $url; ?>assets/img/svg/c-close.svg' alt='' class='svg'>
                                                </span> -->

                                                <!-- View & Download icons -->
    
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr><td colspan='8'>No records found.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <!-- End Certificate List Table -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
</div>
<!-- End Main Content -->

<script>
// Function to delete a row via AJAX
function deleteRow(projectNo) {
    if (confirm('Are you sure you want to delete this row?')) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_lifting.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            if (xhr.status === 200) {
                var row = document.getElementById('row_' + projectNo);
                if (row) {
                    row.remove();
                } else {
                    alert('Row not found.');
                }
            } else {
                alert('Error: Unable to delete record.');
            }
        };

        xhr.send('project_no=' + encodeURIComponent(projectNo));
    }
}

// Function to redirect to edit page
function redirectToEditLifting(project_no) {
    console.log("Redirecting to edit_lifting.php with project_no:", project_no);
    if (project_no) {
        window.location.href = 'edit_lifting.php?project_no=' + encodeURIComponent(project_no);
    } else {
        console.error("Project number is undefined.");
    }
}
</script>

<?php 
// Close database connection
$conn->close();
include_once('../../inc/footer.php');
?>