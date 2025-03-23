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
        <!-- Profile Card -->
        <div class="card shadow-sm p-3">
            <div class="d-flex flex-column align-items-center">
                <img src="./uploads/<?php echo strtolower(str_replace(' ', '_', $inspector['inspector_name'])); ?>/images/profile_image.jpg" 
                     alt="Profile Photo" class="rounded-circle shadow" width="130">
                <h4 class="mt-3 mb-1"><?php echo htmlspecialchars($inspector['inspector_name']); ?></h4>
                <span class="badge bg-success px-3 py-2">Active</span>
            </div>
        </div>

        <?php if ($inspector): ?>
            <!-- Personal Details Card with Accordion -->
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Inspector Details</h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="personalAccordion">
                        <!-- Personal Details -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="personalHeading">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#personalDetails" aria-expanded="true" aria-controls="personalDetails">
                                    <i class="bi bi-person-fill me-2"></i> Personal Information
                                </button>
                            </h3>
                            <div id="personalDetails" class="accordion-collapse collapse show" aria-labelledby="personalHeading" data-bs-parent="#personalAccordion">
                                <div class="accordion-body mt-4">
                                    <p><strong>Email:</strong> <?php echo htmlspecialchars($inspector['email']); ?></p>
                                    <p><strong>City:</strong> <?php echo htmlspecialchars($inspector['city']); ?></p>
                                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($inspector['mobile']); ?></p>
                                    <p><strong>Address:</strong> <?php echo htmlspecialchars($inspector['address']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Handle Cranes Card with Accordion -->
            <div class="card mt-4 shadow-sm">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Cranes Management</h5>
                </div>
                <div class="card-body">
                    <div class="accordion" id="craneAccordion">
                        <!-- Handle Cranes -->
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="craneHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#craneDetails" aria-expanded="false" aria-controls="craneDetails">
                                    <i class="bi bi-truck me-2"></i> Cranes Handled
                                </button>
                            </h3>
                            <div id="craneDetails" class="accordion-collapse collapse" aria-labelledby="craneHeading" data-bs-parent="#craneAccordion">
                                <div class="accordion-body mt-4">
                                    <p><strong>Cranes List:</strong></p>
                                    <?php 
                                        if (!empty($inspector['handle_crane'])) {
                                            $cranes = unserialize($inspector['handle_crane']);
                                            if ($cranes) {
                                                echo '<div class="row">';
                                                foreach ($cranes as $crane) {
                                                    $formatted_crane = ucwords(str_replace(['_', '-'], ' ', $crane));
                                                    echo '
                                                    <div class="col-md-6">
                                                        <div class="card shadow-sm mb-2">
                                                            <div class="card-body d-flex align-items-center">
                                                                <i class="bi bi-cone-striped fs-3 text-primary me-3"></i>
                                                                <span class="fw-bold">' . $formatted_crane . '</span>
                                                            </div>
                                                        </div>
                                                    </div>';
                                                }
                                                echo '</div>';
                                            } else {
                                                echo '<span class="text-muted">N/A</span>';
                                            }
                                        } else {
                                            echo '<span class="text-muted">N/A</span>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-danger mt-3">Inspector not found.</div>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap & Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
