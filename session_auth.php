<?php
require_once './database/Auth.php';
require_once './database/DBController.php';
require_once './database/DatabaseOperations.php';

$dbController = new DBController();
$dbOps = new DatabaseOperations($dbController);
$auth = new Auth($dbOps);

// Check if user is logged in, if not, try auto-login
if (!$auth->isLoggedIn()) {
    // User is not logged in, try auto-login
    if (!$auth->checkAutoLogin()) {
        // Auto-login failed, redirect to login page
        $auth->requireLogin();
    }
}

// If we've reached here, the user is authenticated
// You can add any additional session checks here if needed
?>