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
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs" id="inspectorTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="true">
                                Personal Details
                            </button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="cranes-tab" data-bs-toggle="tab" data-bs-target="#cranes" type="button" role="tab" aria-controls="cranes" aria-selected="false">
                                Handle Cranes
                            </button>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tab-content mt-3" id="inspectorTabContent">
                        <!-- Personal Details Tab -->
                        <div class="tab-pane fade show active" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <img src="./uploads/<?php echo strtolower(str_replace(' ', '_', $inspector['inspector_name'])); ?>/images/profile_image.jpg" alt="Profile Photo" class="rounded-circle" width="120">
                                <h5 class="card-title mb-0 mt-2"><?php echo htmlspecialchars($inspector['inspector_name']); ?></h5>
                            </div>
                            <div class="text-left">
                                <p><strong>Email:</strong> <?php echo htmlspecialchars($inspector['email']); ?></p>
                                <p><strong>City:</strong> <?php echo htmlspecialchars($inspector['city']); ?></p>
                                <p><strong>Phone:</strong> <?php echo htmlspecialchars($inspector['mobile']); ?></p>
                                <p><strong>Address:</strong> <?php echo htmlspecialchars($inspector['address']); ?></p>
                            </div>
                        </div>

                        <!-- Handle Cranes Tab -->
                        <div class="tab-pane fade" id="cranes" role="tabpanel" aria-labelledby="cranes-tab">
                            <div class="text-left">
                                <p><strong>Cranes:</strong>
                                    <?php 
                                        if (!empty($inspector['handle_crane'])) {
                                            $cranes = unserialize($inspector['handle_crane']);
                                            if ($cranes) {
                                                $formatted_cranes = array_map(function($crane) {
                                                    // Replace underscores and hyphens with spaces, and capitalize each word
                                                    return ucwords(str_replace(['_', '-'], ' ', $crane));
                                                }, $cranes);
                                                echo implode(', ', $formatted_cranes);
                                            } else {
                                                echo 'N/A';
                                            }
                                        } else {
                                            echo 'N/A';
                                        }
                                    ?>
                                </p>
                                <p><strong>Status:</strong> Active</p>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <p class="text-danger">Inspector not found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
