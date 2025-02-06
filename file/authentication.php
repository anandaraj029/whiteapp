<?php
session_start();
require 'config.php'; // Include your database connection script
// require ''; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $hashed_password, $role); // Fetch role
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Create a unique session ID
            $session_id = session_create_id();

            // Save session information in the database, including the role
            $stmt = $conn->prepare("INSERT INTO user_sessions (session_id, user_id, user_agent, ip_address, login_time, role, username) VALUES (?, ?, ?, ?, NOW(), ?, ?)");
            $stmt->bind_param("sissss", $session_id, $user_id, $_SERVER['HTTP_USER_AGENT'], $_SERVER['REMOTE_ADDR'], $role, $username);
            $stmt->execute();

            // Set session variables
            $_SESSION['session_id'] = $session_id;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role; // Store role in session
            $_SESSION['username'] = $username;

            // Redirect based on role
            switch ($role) {
                case 'admin':
                    header("Location: ../dashboard/index.php");
                    break;
                case 'customer':
                    header("Location: ../dashboard/customer.php");
                    break;
                case 'inspector':
                    header("Location: ../dashboard/inspector.php");
                    break;
                case 'qcchecker':
                    header("Location: ../dashboard/qcchecker.php");
                    break;
                case 'certified':
                    header("Location: ../dashboard/certified.php");
                    break;
                default:
                    // Default redirect if role is not recognized
                    header("Location: ../index.php");
                    break;
            }
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }
}
?>