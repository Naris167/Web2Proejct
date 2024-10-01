<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('function.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $result = $cart->deleteFromCart($_POST['user_id'], $_POST['item_id']);
        
        header('Content-Type: application/json');
        echo json_encode(['success' => $result]);
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
    exit;
} else {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit;
};
