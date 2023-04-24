<?php
// Start session
session_start();

// Check if admin is already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
    include '../frontened/dashboard.php';
    exit;
}

// Check if login form is submitted
if (isset($_POST['login'])) {
    // Check admin credentials
    $username = 'admin';
    $password = 'password';

    if ($_POST['username'] == $username && $_POST['password'] == $password) {
        // Set admin logged in session variable
        $_SESSION['admin_logged_in'] = true;
        include '../frontened/dashboard.php';
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
