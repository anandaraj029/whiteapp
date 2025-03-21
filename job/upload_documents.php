<?php
include '../file/config.php'; // Your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $project_no = $_POST['project_no'];
    $uploaded_by = $_POST['uploaded_by'];

    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    $uploadDir = 'uploads/' . $project_no . '/'; // Create project-specific folder

    // Create directory if not exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $filePaths = [];

    foreach ($_FILES['documents']['tmp_name'] as $key => $tmpName) {
        if ($key >= 10) break; // Limit to 10 files

        $fileName = 'file_' . ($key + 1) . '_' . time() . '.' . pathinfo($_FILES['documents']['name'][$key], PATHINFO_EXTENSION);
        $fileType = $_FILES['documents']['type'][$key];
        $filePath = $uploadDir . $fileName;

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($tmpName, $filePath)) {
                $filePaths[$key + 1] = $fileName;
            }
        }
    }

    // Fill up to 10 columns
    for ($i = 1; $i <= 10; $i++) {
        $columns[] = "file_$i";
        $values[] = isset($filePaths[$i]) ? "'" . $filePaths[$i] . "'" : "NULL";
    }

    $columns = implode(", ", $columns);
    $values = implode(", ", $values);

    // Insert into DB
    $sql = "INSERT INTO documents (project_no, $columns, uploaded_by) VALUES ('$project_no', $values, '$uploaded_by')";
    $conn->query($sql);

    echo "Files uploaded successfully.";
}
?>
