<?php
include '../file/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $company = $_POST['company'];
    $rep_name = $_POST['rep_name'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $city = $_POST['city'];
    $info_correct = isset($_POST['info_correct']) ? 1 : 0;

    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === 0) {
        // Define the upload directory
        $uploadDir = '../uploads/profile_photos/';

        // Check if the directory exists, if not, create it
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0777, true)) {
                die("Failed to create directory for photo upload.");
            }
        }

        // Prepare the file path
        $fileName = time() . '_' . basename($_FILES['profile_photo']['name']);
        $filePath = $uploadDir . $fileName;

        // Move the uploaded file to the directory
        if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $filePath)) {
            // Auto-generate customer_id
            $result = $conn->query("SELECT MAX(cus_id) AS last_id FROM customers");
            $row = $result->fetch_assoc();
            $last_id = isset($row['last_id']) ? (int)$row['last_id'] : 0;

            $new_id = str_pad($last_id + 1, 3, "0", STR_PAD_LEFT); // Generates ID like 001, 002, 003

            // Insert data into the database
            $sql = "INSERT INTO customers (cus_id, customer_name, email, company, rep_name, mobile, password, address, city, info_correct, profile_photo) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssss", $new_id, $customer_name, $email, $company, $rep_name, $mobile, $password, $address, $city, $info_correct, $filePath);

            if ($stmt->execute()) {
                echo "Customer added successfully with ID $new_id and photo!";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error saving photo to directory.";
        }
    } else {
        echo "Error uploading photo.";
    }

    $conn->close();
}
?>
