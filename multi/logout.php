<?php
session_start();

// Logout user
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}
?>