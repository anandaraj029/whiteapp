<?php
require 'config.php'; // Make sure to use your db connection script

// Function to hash passwords
function hash_password($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Dummy user data
$users = [
    ['username' => 'admin', 'password' => hash_password('1234'), 'role' => 'admin'],
    ['username' => 'inspector', 'password' => hash_password('1234'), 'role' => 'inspector'],
    ['username' => 'reviewer', 'password' => hash_password('1234'), 'role' => 'reviewer'],
];

$stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");

// Insert each user
foreach ($users as $user) {
    $stmt->bind_param("sss", $user['username'], $user['password'], $user['role']);
    $stmt->execute();
}

echo "Dummy users inserted successfully.";

$stmt->close();
$conn->close();
?>
