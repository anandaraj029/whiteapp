<?php

include_once('../inc/function.php');
include_once('../file/config.php'); // Include database connection


// Define the base upload directory
$upload_dir = './uploads/';

if (isset($_GET['id'])) {
    $inspector_id = $_GET['id'];

    // Fetch inspector details
    $sql = "SELECT * FROM inspectors WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $inspector_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "<script>alert('Invalid Inspector ID'); window.location.href = './all-inspector.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Inspector ID is missing'); window.location.href = './all-inspector.php';</script>";
    exit();
}

// Update inspector details
if (isset($_POST['update_inspector'])) {
    $inspector_name = $_POST['inspector_name'];
    $email = $_POST['email'];
    $handle_crane = isset($_POST['handle_crane']) ? serialize($_POST['handle_crane']) : null;
    // $emp_id = $_POST['emp_id'];
    $mobile = $_POST['mobile'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $row['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    // Create or retrieve inspector folder
    $inspector_folder = preg_replace('/\s+/', '_', strtolower($inspector_name)); // Replace spaces with underscores
    $target_dir = $upload_dir . $inspector_folder . '/images/';
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Handle Profile Photo Upload
    $profile_photo = $row['profile_photo']; // Retain existing photo by default
    if (!empty($_FILES['profile_photo']['name'])) {
        $profile_photo_path = $target_dir . 'profile_image.jpg';
        if (move_uploaded_file($_FILES['profile_photo']['tmp_name'], $profile_photo_path)) {
            $profile_photo = 'profile_image.jpg';
        } else {
            die("Error uploading profile photo.");
        }
    }

    // Handle Signature Photo Upload
    $signature_photo = $row['signature_photo']; // Retain existing photo by default
    if (!empty($_FILES['signature_photo']['name'])) {
        $signature_photo_path = $target_dir . 'signature_image.jpg';
        if (move_uploaded_file($_FILES['signature_photo']['tmp_name'], $signature_photo_path)) {
            $signature_photo = 'signature_image.jpg';
        } else {
            die("Error uploading signature photo.");
        }
    }

    // Update query
    $sql = "UPDATE inspectors SET 
            inspector_name = ?, email = ?, handle_crane = ?, mobile = ?, 
            password = ?, address = ?, city = ?, profile_photo = ?, signature_photo = ? 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssssssi",
        $inspector_name, $email, $handle_crane, $mobile,
        $password, $address, $city, $profile_photo, $signature_photo, $inspector_id
    );

    if ($stmt->execute()) {
        echo "<script>alert('Inspector updated successfully!'); window.location.href = './all-inspector.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>



<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">Edit Inspector</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="./all-inspector.php" class="btn btn-primary">View List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-element py-30 multiple-column">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Inspector Name</label>
                                    <input type="text" class="theme-input-style" name="inspector_name" 
                                           value="<?= htmlspecialchars($row['inspector_name']) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Email</label>
                                    <input type="email" class="theme-input-style" name="email" 
                                           value="<?= htmlspecialchars($row['email']) ?>" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Handle Crane</label>
                                    <div class="form-control" style="height:auto;">
                                        <?php
                                        $selected_cranes = unserialize($row['handle_crane']) ?: [];
                                        $cranes = [
                                            "arc-welding-machine" => "Arc Welding Machine",
                                            "articulating_boom" => "Articulating Boom",
                                            "base_mounted_drum" => "Base Mounted Drum Hoist (Winches)",
                                            "bulldozer" => "Bulldozer",
                                            "elevators" => "Elevators",
                                            "excavator" => "Excavator",
                                            "fixed-cranes-hoist" => "Fixed Cranes & Hoist",
                                            "forklift" => "Forklift",
                                            "frames-and-mobile-gantries" => "Frames and Mobile Gantries",
                                            "jib-davit" => "JIB & DAVIT",
                                            "lifting-beam-spreader-bar" => "Lifting Beam Spreader Bar",
                                            "manbaskets" => "Manbaskets",
                                            "marine-offshore-cranes" => "Marine & Offshore Cranes",
                                            "mobile_locomotive" => "Mobile Locomotive",
                                            "motor-grade" => "Motor Grade",
                                            "powered-platforms" => "Powered Platforms (Sky Climbers)",
                                            "side-boom-tractors" => "Side Boom Tractors",
                                            "storage-retrieval" => "Storage Retrieval",
                                            "tower-cranes" => "Tower Cranes",
                                            "vehicle_mounted_elevating" => "Vehicle-Mounted Elevating & Aerial Rotating Devices",                                            
                                            "wheel-loader" => "Wheel Loader"
                                            // Add other crane options here
                                        ];
                                        foreach ($cranes as $value => $label) {
                                            $checked = in_array($value, $selected_cranes) ? 'checked' : '';
                                            echo "<label><input type='checkbox' name='handle_crane[]' value='$value' $checked> $label</label><br>";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="font-14 bold mb-2">Emp ID</label>
                                    <input type="text" class="theme-input-style" name="emp_id" 
                                           value="<?= htmlspecialchars($row['emp_id']) ?>" required>
                                </div> -->
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Mobile</label>
                                    <input type="text" class="theme-input-style" name="mobile" 
                                           value="<?= htmlspecialchars($row['mobile']) ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Password (Leave blank to keep unchanged)</label>
                                    <input type="password" class="theme-input-style" name="password" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">Address</label>
                                    <textarea class="form-control" name="address" rows="4" required><?= htmlspecialchars($row['address']) ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="font-14 bold mb-2">City</label>
                                    <select class="form-control" name="city">
                                        <option value="Kobar" <?= $row['city'] == 'Kobar' ? 'selected' : '' ?>>Al Kobar</option>
                                        <option value="Riyadh" <?= $row['city'] == 'Riyadh' ? 'selected' : '' ?>>Riyadh</option>
                                    </select>
                                </div>
                                <div class="form-group">
    <label class="font-14 bold mb-2">Upload Photo</label>
    <input type="file" class="form-control" name="profile_photo" accept="image/*">
    <?php if (!empty($row['profile_photo'])): ?>
        <div>
            <small>Current:</small><br>
            <img src="<?= './uploads/' . preg_replace('/\s+/', '_', strtolower($row['inspector_name'])) . '/images/' . $row['profile_photo'] ?>" 
                 alt="Profile Photo" 
                 style="max-width: 150px; max-height: 150px; margin-top: 10px; border: 1px solid #ccc;">
        </div>
    <?php endif; ?>
</div>
<div class="form-group">
    <label class="font-14 bold mb-2">Upload Signature</label>
    <input type="file" class="form-control" name="signature_photo" accept="image/*">
    <?php if (!empty($row['signature_photo'])): ?>
        <div>
            <small>Current:</small><br>
            <img src="<?= './uploads/' . preg_replace('/\s+/', '_', strtolower($row['inspector_name'])) . '/images/' . $row['signature_photo'] ?>" 
                 alt="Signature Photo" 
                 style="max-width: 150px; max-height: 150px; margin-top: 10px; border: 1px solid #ccc;">
        </div>
    <?php endif; ?>
</div>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary" name="update_inspector">Update Inspector</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once('../inc/footer.php'); ?>
