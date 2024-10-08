<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../../function.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $userId = $_POST['current_user'];
        $itemId = $_POST['item_id'];
        $itemVariant = $_POST['item_variant'];
        $itemAmount = intval($_POST['item_amount']);

        error_log("Updating cart: User ID: $userId, Item ID: $itemId, Variant: $itemVariant, Amount: $itemAmount");

        // Check if the new amount is within the valid range
        if ($itemAmount < 1) {
            throw new Exception("Quantity cannot be lower than 1");
        } elseif ($itemAmount > 10) {
            throw new Exception("Quantity cannot be higher than 10");
        }

        // Get the current quantity in the cart
        $currentQuantity = $cart->getCartItemQty($userId, $itemId, $itemVariant);

        // If the new quantity is the same as the current quantity, don't update
        if ($currentQuantity == $itemAmount) {
            error_log("No change in quantity. Current: $currentQuantity, New: $itemAmount");
            echo json_encode(['success' => true, 'message' => 'No change in quantity']);
            exit;
        }

        $result = $cart->updateCartItemQty($userId, $itemId, $itemVariant, $itemAmount);
        
        error_log("Update result: " . ($result ? "Success" : "Failure"));

        header('Content-Type: application/json');
        echo json_encode(['success' => $result, 'message' => 'Cart updated successfully!']);
    } catch (Exception $e) {
        error_log("Error updating cart: " . $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
    exit;
} else {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit;
}