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
        #errorMessage {
    color: #ff0000;
    font-size: 14px;
    margin-top: 10px;
    display: none; /* Hidden by default */
    background: rgba(255, 0, 0, 0.1);
    padding: 8px;
    border-radius: 4px;
}

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
    <!-- Popup Modal -->
<div id="qrPopup" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Enter your sticker no</h3>
        <input type="text" id="stickerNo" placeholder="Sticker No">
        <p id="errorMessage" style="color: red; display: none;"></p> <!-- Error Message -->
        <button id="submitStickerNo">Submit</button>
    </div>
</div>


    <script>
      jQuery(document).ready(function($) {
    var modal = $("#qrPopup");  
    var closeBtn = $(".close"); 
    var errorMessage = $("#errorMessage"); // Error message element

    closeBtn.click(function() {
        modal.hide();
        window.location.href = "job-details.php"; 
    });

    $(window).click(function(event) {
        if ($(event.target).is("#qrPopup")) {
            modal.hide();
            window.location.href = "job-details.php"; 
        }
    });

    $("#submitStickerNo").click(function() {
        var stickerNo = $("#stickerNo").val().trim(); 

        if (stickerNo) {
            $.ajax({
                url: "verify_sticker.php",  // Backend script to check the status
                type: "POST",
                data: { stickerNo: stickerNo },
                dataType: "json",
                success: function(response) {
                    if (response.status === "active") {
                        window.location.href = "form.php?stickerNo=" + encodeURIComponent(stickerNo);
                    } else {
                        errorMessage.text("Your sticker number is not verified. Kindly contact admin.");
                        errorMessage.show(); // Show the error message
                    }
                },
                error: function() {
                    errorMessage.text("Error verifying sticker number. Please try again.");
                    errorMessage.show();
                }
            });
        } else {
            errorMessage.text("Please enter a sticker number.");
            errorMessage.show();
        }
    });
});

    </script>

</body>
</html>