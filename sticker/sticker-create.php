<?php
include_once('../file/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture and sanitize form data
    $sticker_start_no = (int) $_POST['sticker_start_no'];  // Ensure it's treated as a number
    $assign_inspector = htmlspecialchars($_POST['assign_inspector']);
    $no_of_stickers = (int) $_POST['no_of_stickers'];

    // Variable for single sticker count
    $single_sticker_count = 1;

    // Start a loop to create separate entries for each sticker
    for ($i = 0; $i < $no_of_stickers; $i++) {
        $current_sticker_no = $sticker_start_no + $i;  // Ensure unique sticker numbers

        // Prepare an SQL insert statement
        $sql = "INSERT INTO stickers (sticker_start_no, assign_inspector, no_of_stickers) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Preparation failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("ssi", $current_sticker_no, $assign_inspector, $single_sticker_count);

        // Execute and check if the data was saved
        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
            break; // Stop if there's an error in insertion
        }
    }

    // Success message after all stickers are created
    echo $no_of_stickers . " stickers created successfully from sticker number " . $sticker_start_no;

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>