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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $result = $auth->performLogin($email, $password);

        if ($result['success'] === 'success') {
            echo "SUCCESS:" . $result['message'] . "|REDIRECT:home.php";
        } else {
            echo "ERROR:" . $result['message'];
        }
    } else {
        echo "ERROR:Invalid request method";
    }
} catch (Exception $e) {
    echo "ERROR:An error occurred: " . $e->getMessage();
}