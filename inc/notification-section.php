<?php
// session_start();
 // Ensure session is started
//  $url= 'http://localhost/whiteapp/';

// Ensure user is logged in
if (!isset($_SESSION['role']) || !isset($_SESSION['username'])) {
    return; // Stop execution if the user is not logged in
}

$role = $_SESSION['role']; // Get the user's role
$username = $_SESSION['username']; // Assuming username is unique and used as user_id

// Database connection
$servername = "localhost";  
$username_db = "root";       
$password = "";              
$dbname = "3party";         

$conn2 = new mysqli($servername, $username_db, $password, $dbname);

// Check the connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

// Fetch unread notifications from the notifications table for the current user
$query = "SELECT message FROM notifications WHERE user_id = ? AND is_read = 0 ORDER BY created_at DESC";
$stmt = $conn2->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$notifications = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $notifications[] = $row['message'];
    }
} else {
    $notifications[] = "No new notifications.";
}

// Close the statement
$stmt->close();

// If the user is an "inspector", fetch projects assigned to them that are pending
if ($role === 'inspector') {
    $query = "SELECT project_no FROM project_info WHERE inspector_name = ? AND checklist_status = 'pending' AND report_status = 'pending'";
    $stmt = $conn2->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $message = "Project " . htmlspecialchars($row['project_no']) . " is created. You can now create checklist and report.";
            $notifications[] = $message;

            // Save the notification to the notifications table
            $insert_query = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
            $insert_stmt = $conn2->prepare($insert_query);
            $insert_stmt->bind_param("ss", $username, $message);
            $insert_stmt->execute();
            $insert_stmt->close();
        }
    }
    $stmt->close();
}

// If the user is a "reviewer", fetch projects that need review
if ($role === 'reviewer') {
    $query = "SELECT project_no FROM project_info WHERE checklist_status = 'Created' AND report_status = 'Generated' AND review_status = 'Pending'";
    $result = mysqli_query($conn2, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $message = "Project " . htmlspecialchars($row['project_no']) . " is ready for review.";
            $notifications[] = $message;

            // Save the notification to the notifications table
            $insert_query = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
            $insert_stmt = $conn2->prepare($insert_query);
            $insert_stmt->bind_param("ss", $username, $message);
            $insert_stmt->execute();
            $insert_stmt->close();
        }
    }
}

// If the user is a "document controller", fetch projects with completed review and pending certificate
if ($role === 'document controller') {
    $query = "SELECT project_no FROM project_info WHERE checklist_status = 'Created' AND report_status = 'Generated' AND review_status = 'Completed' AND certificatestatus = 'pending'";
    $result = mysqli_query($conn2, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $message = "Review completed, you can now create the document for Project " . htmlspecialchars($row['project_no']) . ".";
            $notifications[] = $message;

            // Save the notification to the notifications table
            $insert_query = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
            $insert_stmt = $conn2->prepare($insert_query);
            $insert_stmt->bind_param("ss", $username, $message);
            $insert_stmt->execute();
            $insert_stmt->close();
        }
    }
}

// If the user is "admin", fetch all notifications
if ($role === 'admin') {
    $query = "SELECT project_no, checklist_status, report_status, review_status, certificatestatus FROM project_info";
    $result = mysqli_query($conn2, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['checklist_status'] === 'Created') {
                $message = "Checklist created for Project " . htmlspecialchars($row['project_no']) . ".";
                $notifications[] = $message;

                // Save the notification to the notifications table
                $insert_query = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
                $insert_stmt = $conn2->prepare($insert_query);
                $insert_stmt->bind_param("ss", $username, $message);
                $insert_stmt->execute();
                $insert_stmt->close();
            }
            if ($row['report_status'] === 'Generated') {
                $message = "Report generated for Project " . htmlspecialchars($row['project_no']) . ".";
                $notifications[] = $message;

                // Save the notification to the notifications table
                $insert_query = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
                $insert_stmt = $conn2->prepare($insert_query);
                $insert_stmt->bind_param("ss", $username, $message);
                $insert_stmt->execute();
                $insert_stmt->close();
            }
            if ($row['review_status'] === 'Completed') {
                $message = "Review completed for Project " . htmlspecialchars($row['project_no']) . ".";
                $notifications[] = $message;

                // Save the notification to the notifications table
                $insert_query = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
                $insert_stmt = $conn2->prepare($insert_query);
                $insert_stmt->bind_param("ss", $username, $message);
                $insert_stmt->execute();
                $insert_stmt->close();
            }
            if ($row['certificatestatus'] === 'Created') {
                $message = "Certificate created for Project " . htmlspecialchars($row['project_no']) . ".";
                $notifications[] = $message;

                // Save the notification to the notifications table
                $insert_query = "INSERT INTO notifications (user_id, message) VALUES (?, ?)";
                $insert_stmt = $conn2->prepare($insert_query);
                $insert_stmt->bind_param("ss", $username, $message);
                $insert_stmt->execute();
                $insert_stmt->close();
            }
        }
    }
}

// Close the database connection
$conn2->close();
?>

<!-- Main Header Notification -->
<div class="main-header-notification">
    <a href="#" class="header-icon notification-icon" data-toggle="dropdown">
        <span class="count" data-bg-img="assets/img/count-bg.png"><?php echo count($notifications); ?></span>
        <img src="<?php echo $url; ?>assets/img/svg/notification-icon.svg" alt="" class="svg">
    </a>
    <div class="dropdown-menu style--two dropdown-menu-right">
        <!-- Dropdown Header -->
        <div class="dropdown-header d-flex align-items-center justify-content-between">
            <h5><?php echo count($notifications); ?> New notifications</h5>
            <a href="<?php echo $url; ?>inc/clear_notifications.php" class="text-mute d-inline-block">Clear all</a>
        </div>
        <!-- End Dropdown Header -->

        <!-- Dropdown Body -->
        <div class="dropdown-body">
            <?php foreach ($notifications as $notification): ?>
                <!-- Item Single -->
                <a href="#" class="item-single d-flex align-items-center">
                    <div class="content">
                        <div class="mb-2">
                            <p class="time">Just now</p>
                        </div>    
                        <p class="main-text"><?php echo $notification; ?></p>
                    </div>
                </a>
                <!-- End Item Single -->
            <?php endforeach; ?>
        </div>
        <!-- End Dropdown Body -->
    </div>
</div>
<!-- End Main Header Notification -->