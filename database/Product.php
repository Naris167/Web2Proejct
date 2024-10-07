<?php

// Use to fetch product data
class Product
{
    private $dbOps = null;

    public function __construct(DatabaseOperations $dbOps)
    {
        if (!$dbOps instanceof DatabaseOperations) {
            throw new Exception("Invalid DatabaseOperations object");
        }

        $this->dbOps = $dbOps;
    }

    // fetch menu data using getData Method


    public function getData(string $table = 'menu', ?string $filter = null): array {
        try {
            $columns = ['*'];  // Retrieve all columns
            $conditions = null;
    
            if ($filter !== null) {
                $conditions = [$filter => 'true'];
            }
    
            $resultArray = $this->dbOps->retrieve_data($table, $columns, $conditions);
    
            if ($resultArray === null) {
                error_log("[PRODUCT] Error retrieving data from $table");
                return [];
            }
    
            return $resultArray;
    
        } catch (Exception $e) {
            error_log("[PRODUCT] Error in getData: " . $e->getMessage());
            return [];
        }
    }

    // get menu using item id
    public function getMenu($item_id = null): mixed {
        try {
            // If item_id is not set, return an empty array
            if (!isset($item_id)) {
                return [];
            }
            
            if (is_array($item_id)) {
                // Handle array of item_ids
                $data_to_check_condition = [$item_id];
            } else {
                // Handle single item_id
                $data_to_check_condition = [[$item_id]]; // Wrap in array to use IN clause
            }
        
            $resultArray = $this->dbOps->retrieve_data('menu', ['*'], ['item_id'], $data_to_check_condition);
        
            // If no results found, return an empty array
            if ($resultArray === null || empty($resultArray)) {
                error_log("[PRODUCT] Error retrieving data from `menu`");
                return [];
            }
        
            // If it's a single item_id (not an array), return the first (and only) result
            if (!is_array($item_id)) {
                return $resultArray[0];
            }
        
            // Otherwise, return the entire result array
            return $resultArray;
        } catch (Exception $e) {
            error_log("[PRODUCT] Error in getData: " . $e->getMessage());
            return [];
        }
    }

    public function getUniqueMenuTypes(): array {
        try {
            $table = 'menu';
            $columns = ['item_type'];  // Retrieve all columns
            
            $resultArray = $this->dbOps->retrieve_data($table, $columns);
    
            if ($resultArray === null) {
                error_log("[PRODUCT] Error retrieving data from $table");
                return [];
            }

            $uniqueResultArray = array_unique(array_column($resultArray, 'item_type'));
    
            return $uniqueResultArray;
    
        } catch (Exception $e) {
            error_log("[PRODUCT] Error in getData: " . $e->getMessage());
            return [];
        }
    }



}