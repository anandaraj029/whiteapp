<?php
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', '3party');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // MD5 is used for example purposes; consider stronger hashing like bcrypt

    // Prepare and bind
    $stmt = $conn->prepare("SELECT u.id, u.username, u.role_id, r.role_name FROM users u JOIN roles r ON u.role_id = r.id WHERE u.username = ? AND u.password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $username, $role_id, $role_name);
        $stmt->fetch();
        
        // Set session variables
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['role_id'] = $role_id;
        $_SESSION['role_name'] = $role_name;

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
