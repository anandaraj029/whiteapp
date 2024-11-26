<?php
// Include the database connection script
include '../file/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $rep_name = $_POST['rep_name'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password
    $address = $_POST['address'];
    $city = $_POST['city'];
    $info_correct = isset($_POST['info_correct']) ? 1 : 0;

    // Insert data into the database
    $sql = "INSERT INTO customers (customer_name, email, company, rep_name, mobile, password, address, city, info_correct) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $customer_name, $email, $company, $rep_name, $mobile, $password, $address, $city, $info_correct);

    // Execute the query
    if ($stmt->execute()) {
        echo "Data submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
