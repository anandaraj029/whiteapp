<?php
include_once('../file/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Sticker Number</title>
    
    <!-- Load jQuery First -->
    <script src="<?php echo $url; ?>assets/js/jquery.min.js"></script>
    <script>
        // Fallback to jQuery CDN if local file is not found
        window.jQuery || document.write('<script src="https://code.jquery.com/jquery-3.6.0.min.js"><\/script>');
    </script>

    <!-- Load Bootstrap -->
    <script src="<?php echo $url; ?>assets/js/bootstrap.bundle.min.js"></script>
    
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo $url; ?>assets/css/style.css">
    
    <style>
        /* Basic Modal Styling */
        .modal {
            display: block; /* Ensure modal is shown */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            position: relative;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }
        input {
            padding: 10px;
            width: 80%;
            margin: 10px 0;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <!-- Popup Modal -->
    <div id="qrPopup" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Enter your sticker no</h3>
            <input type="text" id="stickerNo" placeholder="Sticker No">
            <button id="submitStickerNo">Submit</button>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            var modal = $("#qrPopup");  // Get modal element
            var closeBtn = $(".close"); // Get close button

            // Close modal on (X) click
            closeBtn.click(function() {
                modal.hide();
                window.location.href = "job-details.php"; // Redirect on close
            });

            // Close modal when clicking outside
            $(window).click(function(event) {
                if ($(event.target).is("#qrPopup")) {
                    modal.hide();
                    window.location.href = "job-details.php"; // Redirect
                }
            });

            // Handle Submit Button Click
            $("#submitStickerNo").click(function() {
                var stickerNo = $("#stickerNo").val().trim(); // Get input value
                if (stickerNo) {
                    window.location.href = "form.php?stickerNo=" + encodeURIComponent(stickerNo);
                } else {
                    alert("Please enter a sticker number.");
                }
            });
        });
    </script>

</body>
</html>
