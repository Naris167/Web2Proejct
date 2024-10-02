<?php

// php cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return;
        $this->db = $db;
    }

    public function insertIntoCart($params = null, $table = "cart") {
        if ($this->db->con != null) {
            if ($params != null) {
                // Get table columns
                $columns = implode(',', array_keys($params));
    
                // Prepare values with placeholders
                $placeholders = implode(',', array_fill(0, count($params), '?'));
    
                // Create prepared statement
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $placeholders);
    
                // Prepare the statement
                $stmt = $this->db->con->prepare($query_string);
    
                if ($stmt) {
                    // Bind parameters
                    $types = str_repeat('s', count($params)); // Assume all parameters are strings
                    $values = array_values($params);
                    $bindParams = array_merge(array($types), $values);
                    $bindParamsRef = array();
                    foreach ($bindParams as $key => $value) {
                        $bindParamsRef[$key] = &$bindParams[$key];
                    }
                    call_user_func_array(array($stmt, 'bind_param'), $bindParamsRef);
    
                    // Execute the statement
                    $result = $stmt->execute();
    
                    // Close the statement
                    $stmt->close();
    
                    return $result;
                }
                return false;
            }
        }
        return false;
    }

    // delete from cart table
    public function deleteFromCartTable($params = null, $table = "cart") {
        if ($this->db->con != null) {
            if ($params != null) {
                // create conditions string
                $conditions = [];
                foreach ($params as $key => $value) {
                    $conditions[] = "$key = $value";
                }
                $conditions_string = implode(' AND ', $conditions);

                // create sql query
                $query_string = sprintf("DELETE FROM %s WHERE %s", $table, $conditions_string);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
            return false;
        }
    }

    // to get user_id and item_id and insert into cart table
    public function addToCart($userid, $itemid, $variant = "L", $amount = 1) {
        error_log("addToCart called with user_id: $userid, item_id: $itemid, item_variant: $variant, item_amount: $amount");
        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid,
                "item_variant" => $variant,
                "item_amount" => $amount
            );    
            // insert data into cart
            $result = $this->insertIntoCart($params);
            error_log("insertIntoCart result: " . ($result ? "true" : "false"));
            return $result;
        }
        error_log("addToCart failed: userid or itemid not set");
        return false;
    }

    // delete from cart table
    public function deleteFromCart($userid, $itemid) {
        error_log("deleteFromCart called with user_id: $userid, item_id: $itemid");
        if (isset($userid) && isset($itemid)) {
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            // delete data from cart
            $result = $this->deleteFromCartTable($params);
            error_log("deleteFromCartTable result: " . ($result ? "true" : "false"));
            return $result;
        }
        error_log("deleteFromCart failed: userid or itemid not set");
        return false;
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    // get item_it of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    // Save for later
    public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart"){
        if ($item_id != null){
            $query = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id={$item_id};";
            $query .= "DELETE FROM {$fromTable} WHERE item_id={$item_id};";

            // execute multiple query
            $result = $this->db->con->multi_query($query);

            if($result){
                header("Location :" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }


}