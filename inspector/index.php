<?php
include_once('../inc/function.php');
include_once('../file/config.php');

// Initialize $inspector as null
$inspector = null;

// Check if `id` is provided in the query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input

    // Fetch the inspector details based on the provided ID
    if ($stmt = $conn->prepare("SELECT * FROM inspectors WHERE id = ?")) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Fetch the data if a row exists
        if ($result->num_rows > 0) {
            $inspector = $result->fetch_assoc();
        }

        $stmt->close();
    }
}
?>

<div class="main-content">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Inspector Details</h4>
            </div>
            <div class="card-body">
                <?php if ($inspector): ?>
                    <div class="d-flex flex-column align-items-center mb-3">
                    <img src="./uploads/<?php echo strtolower(str_replace(' ', '_', $inspector['inspector_name'])); ?>/images/profile_image.jpg" alt="Profile Photo">


                        <h5 class="card-title mb-0"><?php echo htmlspecialchars($inspector['inspector_name']); ?></h5>
                    </div>
                    <div class="text-left">
                        <p><strong>Email:</strong> <?php echo htmlspecialchars($inspector['email']); ?></p>
                        <p><strong>City:</strong> <?php echo htmlspecialchars($inspector['city']); ?></p>
                        <p><strong>Phone:</strong> <?php echo htmlspecialchars($inspector['mobile']); ?></p>
                        <p><strong>Address:</strong> <?php echo htmlspecialchars($inspector['address']); ?></p>
                        <p><strong>Cranes:</strong> 
                            <?php 
                                if (!empty($inspector['handle_crane'])) {
                                    $cranes = unserialize($inspector['handle_crane']);
                                    echo $cranes ? implode(', ', $cranes) : 'N/A';
                                } else {
                                    echo 'N/A';
                                }
                            ?>
                        </p>
                        <p><strong>Status:</strong> Active</p>
                    </div>
                <?php else: ?>
                    <p class="text-danger">Inspector not found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
$conn->close();
?>
