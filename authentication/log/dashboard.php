<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Retrieve user role
$role_name = $_SESSION['role_name'];

// Content based on role
if ($role_name == 'admin') {
    echo "<h1>Admin Dashboard</h1>";
    echo "<p>Welcome, " . $_SESSION['username'] . "! You have admin access.</p>";
} elseif ($role_name == 'editor') {
    echo "<h1>Editor Dashboard</h1>";
    echo "<p>Welcome, " . $_SESSION['username'] . "! You have editor access.</p>";
} elseif ($role_name == 'user') {
    echo "<h1>User Dashboard</h1>";
    echo "<p>Welcome, " . $_SESSION['username'] . "! You have user access.</p>";
} else {
    echo "<h1>Unknown Role</h1>";
}

?>

<a href="logout.php">Logout</a>
