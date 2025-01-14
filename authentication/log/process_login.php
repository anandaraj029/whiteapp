<?php
session_start();

include_once ('../../index.php');
// Database connection
$conn = new mysqli('localhost', 'root', '', '3party');
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get form data
$username = trim($_POST['username']);
$password = trim($_POST['password']);

// Check if inputs are empty
if (empty($username) || empty($password)) {
    header('Location: index.php?error=empty_fields');
    exit();
}

// Query the database
$query = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
if (!$stmt) {
    die("SQL Error: " . $conn->error);
}
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify password
    if (password_verify($password, $user['password'])) {
        // Regenerate session ID for security
        session_regenerate_id(true);

        // Store user info in the session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['username'] = $user['username'];

        // Redirect based on role
        switch ($user['role_id']) {            
            case 1:
                header('Location: dashboard.php');
                break;
            case 2:
                header('Location: dashboard.php');
                break;
            case 3:
                header('Location: dashboard.php');
                break;
            default:
                header('Location: login.php?error=invalid_role');
        }
        exit();
    } else {
        // Invalid password
        header('Location: ../index.php?error=invalid_password');
        exit();
    }
} else {
    // User not found
    header('Location: login.php?error=user_not_found');
    exit();
}

// Close the connection
$stmt->close();
$conn->close();
?>
