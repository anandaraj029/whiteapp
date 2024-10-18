<?php
session_start();
require 'config.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Create a unique session ID
            $session_id = session_create_id();

            // Save session information in the database
            $stmt = $conn->prepare("INSERT INTO user_sessions (session_id, user_id, user_agent, ip_address, login_time) VALUES (?, ?, ?, ?, NOW())");
            $stmt->bind_param("siss", $session_id, $user_id, $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR']);
            $stmt->execute();

            // Set session ID
            $_SESSION['session_id'] = $session_id;
            $_SESSION['user_id'] = $user_id;

            header("Location: ../dashboard/index.php"); // Redirect to dashboard or another page
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>
