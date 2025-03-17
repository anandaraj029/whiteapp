<?php
include_once('../../inc/function.php');
include_once('../../file/config.php');

// Fetch existing data based on the certificate ID
if (isset($_GET['id'])) {
    $certificate_id = $_GET['id'];
    $query = "SELECT * FROM certificates WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $certificate_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
} else {
    // Redirect if no ID is provided
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rocking Test Certificate</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
<div class="main-content">
    <div class="container-fluid">
        <div class="card bg-transparent pb-3">
            <div class="card-body bg-white">
                <div class="row">
                    <div class="col-6">
                        <h4 class="pl-2 pt-3 pb-2 font-20">Edit Rocking Test Certificate</h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="index.php" class="btn btn-primary" target="_blank">View List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <form action="update.php" method="POST">
            <!-- Hidden field to store the certificate ID -->
            <input type="hidden" name="certificate_id" value="<?php echo $data['id']; ?>">

            <!-- Header Data -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-element py-30 mb-30">
                        <h4 class="font-20 mb-30">Header Data</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Date of Inspection</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" class="theme-input-style" name="inspection_date" value="<?php echo $data['inspection_date']; ?>" placeholder="Date of Inspection">
                            </div>
                        </div>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Certificate No</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="certificate_no" value="<?php echo $data['certificate_no']; ?>" placeholder="Certificate No">
                            </div>
                        </div>
                        <!-- Repeat for other fields -->
                    </div>
                </div>

                <div class="col-lg-6">
                    <!-- Customer Information / Inspector -->
                    <div class="form-element py-30 mb-30" style="height: 660px;">
                        <h4 class="font-20 mb-30">Customer Information / Inspector</h4>
                        <div class="form-row mb-20">
                            <div class="col-sm-4">
                                <label class="font-14 bold">Customer Name</label>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" class="theme-input-style" name="customer_name" value="<?php echo $data['customer_name']; ?>" placeholder="Customer Name">
                            </div>
                        </div>
                        <!-- Repeat for other fields -->
                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="form-row">
                <div class="col-12 text-center mt-4">
                    <button type="submit" class="btn long" name="update_certificate">Update Certificate</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include_once('../../inc/footer.php'); ?>