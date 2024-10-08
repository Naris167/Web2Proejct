<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    require_once '../../database/Auth.php';
    require_once '../../database/DBController.php';
    require_once '../../database/DatabaseOperations.php';

    $dbController = new DBController();
    $dbOps = new DatabaseOperations($dbController);
    $auth = new Auth($dbOps);

    $result = $auth->performLogout();

    if ($result['success'] === 'success') {
        echo "SUCCESS:" . $result['message'];
    } else {
        echo "ERROR:" . $result['message'];
    }
} catch (Exception $e) {
    echo "ERROR:An error occurred: " . $e->getMessage();
}