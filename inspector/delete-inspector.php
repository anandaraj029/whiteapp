<?php
include ('../file/config.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Cast to integer for security

    if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
        // Proceed to delete if confirmation is received
        $sql = "DELETE FROM inspectors WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Inspector deleted successfully.";
            header("Location: all-inspector.php"); // Redirect to the list page
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        // Ask for confirmation
        echo "
        <script>
            if (confirm('Are you sure you want to delete this inspector?')) {
                window.location.href = '?id=$id&confirm=yes';
            } else {
                window.location.href = 'all-inspector.php'; // Redirect to the list page
            }
        </script>";
    }
} else {
    echo "Invalid request.";
}
$conn->close();
?>
