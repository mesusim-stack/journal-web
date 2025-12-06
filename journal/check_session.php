<?php
require_once 'session.php';

if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}
// User is logged in, continue with the page content
?>