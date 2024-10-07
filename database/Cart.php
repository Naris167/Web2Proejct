<?php
class Cart
{
    private $dbOps = null;

    public function __construct(DatabaseOperations $dbOps)
    {
        if (!$dbOps instanceof DatabaseOperations) {
            throw new Exception("Invalid DatabaseOperations object");
        }

        $this->dbOps = $dbOps;
    }

    public function addToCart($userid, $itemid, $variant = "L", $amount = 1): bool {
        try {
            $table = 'cart';
            $columns = ['user_id', 'item_id', 'item_variant', 'item_amount'];
    
            // Check if the item already exists in the cart
            $existing_item = $this->dbOps->retrieve_data(
                $table,
                ['cart_id', 'item_amount'],
                ['user_id', 'item_id', 'item_variant'],
                [$userid, $itemid, $variant]
            );
    
            if ($existing_item && count($existing_item) > 0) {
                // Item exists, update the amount
                $new_amount = $existing_item[0]['item_amount'] + $amount;
                $rows_updated = $this->dbOps->update_data(
                    $table,
                    ['item_amount'],
                    [[$new_amount]],
                    ['cart_id'],
                    [$existing_item[0]['cart_id']]
                );
    
                if ($rows_updated > 0) {
                    error_log("[CART] Successfully updated item amount in cart for user $userid");
                    return true;
                } else {
                    error_log("[CART] Failed to update item amount in cart for user $userid");
                    return false;
                }
            } else {
                // Item doesn't exist, insert new record
                $data_to_insert = [[$userid, $itemid, $variant, $amount]];
                $rows_inserted = $this->dbOps->insert_data($table, $columns, $data_to_insert);
    
                if ($rows_inserted > 0) {
                    error_log("[CART] Successfully added new item to cart for user $userid");
                    return true;
                } else {
                    error_log("[CART] Failed to add new item to cart for user $userid");
                    return false;
                }
            }
        } catch (Exception $e) {
            error_log("[CART] Error managing cart: " . $e->getMessage());
            return false;
        }
    }

    public function deleteFromCart($userid, $itemid, $itemvariant):bool {
        error_log("deleteFromCart called with user_id: $userid, item_id: $itemid");
        if (isset($userid) && isset($itemid)) {
            $table = 'cart'; // Assuming your cart table is named 'cart'
            $conditions = [
                "user_id" => $userid,
                "item_id" => $itemid,
                "item_variant" => $itemvariant,
            ];

            try {
                $rows_deleted = $this->dbOps->delete_data($table, $conditions);
                
                if ($rows_deleted > 0) {
                    error_log("Successfully deleted $rows_deleted item(s) from cart for user $userid");
                    return true;
                } else {
                    error_log("No items found to delete from cart for user $userid and item $itemid");
                    return false;
                }
            } catch (Exception $e) {
                error_log("Error deleting from cart: " . $e->getMessage());
                return false;
            }
        }
        error_log("deleteFromCart failed: userid or itemid not set");
        return false;
    }

    public function getCartItem($userid): array {
        try {
            // Step 1: Retrieve cart items for the user
            $cart_items = $this->dbOps->retrieve_data(
                'cart',
                ['item_id', 'item_variant', 'item_amount'],
                ['user_id'],
                [$userid]
            );
    
            if (empty($cart_items)) {
                return [];
            }
    
            // Step 2: Get unique item IDs from cart items
            $item_ids = array_unique(array_column($cart_items, 'item_id'));
    
            // Step 3: Retrieve menu items
            $menu_items = $this->dbOps->retrieve_data(
                'menu',
                ['item_id', 'item_name', 'item_price', 'item_image', 'item_rating'],
                ['item_id'],
                [$item_ids]
            );
    
            // Step 4: Create a lookup array for menu items
            $menu_lookup = [];
            foreach ($menu_items as $item) {
                $menu_lookup[$item['item_id']] = $item;
            }
    
            // Step 5: Combine cart and menu data
            $result = [];
            foreach ($cart_items as $cart_item) {
                if (isset($menu_lookup[$cart_item['item_id']])) {
                    $result[] = array_merge(
                        $menu_lookup[$cart_item['item_id']],
                        [
                            'item_variant' => $cart_item['item_variant'],
                            'item_amount' => $cart_item['item_amount']
                        ]
                    );
                }
            }
    
            return $result;
        } catch (Exception $e) {
            error_log("[CART] Error retrieving cart items: " . $e->getMessage());
            return [];
        }
    }

    public function getTotalCartAmount($userid): array {
        try {
            // Get cart items using the previously created getCartItem function
            $cartItems = $this->getCartItem($userid);
    
            $totalAmount = 0;
            $totalPrice = 0;
    
            foreach ($cartItems as $item) {
                $totalAmount += $item['item_amount'];
                $totalPrice += $item['item_price'] * $item['item_amount'];
            }
    
            return [
                'total_amount' => $totalAmount,
                'total_price' => number_format($totalPrice, 2, '.', '')
            ];
        } catch (Exception $e) {
            error_log("[CART] Error calculating total cart amount: " . $e->getMessage());
            return [
                'total_amount' => 0,
                'total_price' => '0.00'
            ];
        }
    }


    public function updateCartItemQty($userid, $itemid, $variant, $amount): bool {
        try {
            $table = 'cart';
            $columns_to_update = ['item_amount'];
            $data_to_update = [[$amount]];
            $columns_to_check_condition = ['user_id', 'item_id', 'item_variant'];
            $data_to_check_condition = [$userid, $itemid, $variant];
    
            $rows_updated = $this->dbOps->update_data(
                $table,
                $columns_to_update,
                $data_to_update,
                $columns_to_check_condition,
                $data_to_check_condition
            );
    
            if ($rows_updated > 0) {
                error_log("[CART] Successfully updated item quantity in cart for user $userid, item $itemid, variant $variant");
                return true;
            } else {
                error_log("[CART] Failed to update item quantity in cart for user $userid, item $itemid, variant $variant. Item may not exist.");
                return false;
            }
        } catch (Exception $e) {
            error_log("[CART] Error updating cart item quantity: " . $e->getMessage());
            return false;
        }
    }


    public function getCartItemQty($userId, $itemId, $itemVariant): int {
        try {
            $table = 'cart';
            $columns = ['item_amount'];
            $columns_to_check_condition = ['user_id', 'item_id', 'item_variant'];
            $data_to_check_condition = [$userId, $itemId, $itemVariant];
    
            $result = $this->dbOps->retrieve_data(
                $table,
                $columns,
                $columns_to_check_condition,
                $data_to_check_condition
            );
    
            if ($result && isset($result[0]['item_amount'])) {
                return (int)$result[0]['item_amount'];
            } else {
                error_log("[CART] Item not found in cart for user $userId, item $itemId, variant $itemVariant");
                return 0;
            }
        } catch (Exception $e) {
            error_log("[CART] Error retrieving cart item quantity: " . $e->getMessage());
            return 0;
        }
    }


    // // get item_it of shopping cart list
    // public function getCartId($cartArray = null, $key = "item_id"){
    //     if ($cartArray != null){
    //         $cart_id = array_map(function ($value) use($key){
    //             return $value[$key];
    //         }, $cartArray);
    //         return $cart_id;
    //     }
    // }

    // // Save for later
    // public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
    //     if ($item_id != null){
    //         $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
    //         $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

    //         // execute multiple query
    //         $result = $this->db->con->multi_query($query);

    //         if($result){
    //             header("Location :" . $_SERVER['PHP_SELF']);
    //         }
    //         return $result;
    //     }
    // }

}