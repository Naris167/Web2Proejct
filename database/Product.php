<?php

// Use to fetch product data
class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return;
        $this->db = $db;
    }

    // fetch menu data using getData Method
    public function getData(string $table = 'menu', ?string $filter = null): array {
        $resultArray = [];
    
        try {
            $query = "SELECT * FROM " . $this->db->con->real_escape_string($table);
            
            if ($filter === 'is_top_sale' || $filter === 'is_new') {
                // Check if the column exists in the table
                $columnCheck = $this->db->con->query("SHOW COLUMNS FROM " . $this->db->con->real_escape_string($table) . " LIKE '" . $this->db->con->real_escape_string($filter) . "'");
                if ($columnCheck && $columnCheck->num_rows > 0) {
                    $query .= " WHERE " . $this->db->con->real_escape_string($filter) . " = TRUE";
                }
            }
            
            $result = $this->db->con->query($query);
            
            if ($result) {
                // fetch data one by one
                while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $resultArray[] = $item;
                }
            }
        } catch (Exception $e) {
            // Log the error or handle it as appropriate for your application
            error_log("Error in getData: " . $e->getMessage());
        }
        
        return $resultArray;
    }

    // get menu using item id
    public function getMenu($item_id = null, $table = 'menu') {
        if (isset($item_id)) {
            if (is_array($item_id)) {
                // Handle array of item_ids
                $escaped_ids = array_map(function($id) {
                    return $this->db->con->real_escape_string($id);
                }, $item_id);
                
                $id_list = implode(',', $escaped_ids);
                $query = "SELECT * FROM {$table} WHERE item_id IN ({$id_list})";
                $result = $this->db->con->query($query);
    
                if ($result && $result->num_rows > 0) {
                    $items = [];
                    while ($row = $result->fetch_assoc()) {
                        $items[] = $row;
                    }
                    return $items;
                }
            } else {
                // Handle single item_id
                $escaped_id = $this->db->con->real_escape_string($item_id);
                $query = "SELECT * FROM {$table} WHERE item_id = {$escaped_id} LIMIT 1";
                $result = $this->db->con->query($query);
    
                if ($result && $result->num_rows > 0) {
                    return $result->fetch_assoc();
                }
            }
        }
        
        return []; // Return an empty array if no items found or if $item_id is not set
    }

    public function getUniqueItemTypes() {
        $query = "SELECT DISTINCT item_type FROM menu ORDER BY item_type ASC";
        $result = $this->db->con->query($query);

        if ($result) {
            $itemTypes = [];
            while ($row = $result->fetch_assoc()) {
                $itemTypes[] = $row['item_type'];
            }
            return $itemTypes;
        }
        return [];
    }

}