<?php
include_once('../file/config.php'); // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $emp_id = $_POST['emp_id'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password
    $address = $_POST['address'];
    $city = $_POST['city'];
    $role = $_POST['role']; // Get selected role

    // Insert into new_users table
    $sql = "INSERT INTO new_users (user_id, user_name, email, emp_id, mobile, password, address, city, role) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $user_id, $user_name, $email, $emp_id, $mobile, $password, $address, $city, $role);

    if ($stmt->execute()) {
        // Map the role from new_users table to users table
        $role_mapping = [            
            'admin' => 'admin', // Map "admin" to "admin"
            'reviewer' => 'reviewer', // Map "reviewer" to "reviewer"
            'document_controller' => 'document controller', // Map "document_controller" to "document controller"
            'quality_controller' => 'quality controller', // Map "quality_controller" to "quality controller"
        ];

        // Get the mapped role for the users table
        $mapped_role = $role_mapping[$role] ?? 'default_role'; // Use 'default_role' if no mapping is found

        // Determine the role ID based on the selected role
        $role_id = 0; // Default role ID
        switch ($role) {            
            case 'admin':
                $role_id = 1;
                break;                         
            case 'reviewer':
                $role_id = 3;
                break;            
            case 'document_controller':
                $role_id = 4; // Role ID for document controller
                break;            
            case 'quality_controller':
                $role_id = 5; // Role ID for quality controller
                break;               
            default:
                $role_id = 0; // Default role ID for unknown roles
                break;
        }

        // Insert into users table
        $sql_users = "INSERT INTO users (username, password, role, id) 
                      VALUES (?, ?, ?, ?)";

        $stmt_users = $conn->prepare($sql_users);
        $stmt_users->bind_param("sssi", $user_name, $password, $mapped_role, $role_id);

        if ($stmt_users->execute()) {
            // Redirect to all-user.php after successful submission
            header("Location: all-user.php");
            exit(); // Ensure no further code is executed
        } else {
            echo "<script>alert('Error: Could not save user in users table'); window.history.back();</script>";
        }

        $stmt_users->close();
    } else {
        echo "<script>alert('Error: Could not save user in new_users table'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>