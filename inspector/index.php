<?php
include_once('../inc/function.php');
include_once('../file/config.php');

// Fetch inspector details
$sql = "SELECT * FROM inspectors";
$result = $conn->query($sql);
?>
<div class="main-content">
<div class="container-fluid mt-4">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Inspectors</h4>
        </div>
        <div class="card-body">
            <?php if ($result->num_rows > 0): ?>
                <div class="row">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col-md-12 col-lg-12 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <!-- Profile Image and Name -->
                                    <div class="d-flex flex-column align-items-center mb-3">
                                        <img src="../uploads/<?php echo htmlspecialchars($row['profile_photo']); ?>" alt="Profile Photo" 
                                             class="rounded-circle mb-2" style="width: 80px; height: 80px; object-fit: cover;">
                                        <h5 class="card-title mb-0"><?php echo htmlspecialchars($row['inspector_name']); ?></h5>
                                    </div>

                                    <!-- Inspector Details -->
                                    <div class="text-left">
                                        <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
                                        <p class="mb-1"><strong>City:</strong> <?php echo htmlspecialchars($row['city']); ?></p>

                                        <!-- Handle Cranes -->
                                        <?php if ($row['handle_crane']): ?>
                                            <p class="mb-1"><strong>Cranes:</strong> <?php echo implode(', ', unserialize($row['handle_crane'])); ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Action Buttons -->
                                    <!-- <div class="d-flex justify-content-center mt-3">
                                        <a href="#" class="btn btn-primary btn-sm mx-1">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm mx-1">Delete</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="text-center">No inspectors found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>

<?php
$conn->close();
?>