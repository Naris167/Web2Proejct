<?php
class DatabaseOperations
{
    private $db;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) {
            throw new Exception("Database connection not established");
        }
        $this->db = $db;
    }

    public function execute_db_operation(string $query, string $operation_type, $params = null) {
        if ($this->db->con == null) {
            error_log("[DATABASE] No database connection available");
            return null;
        }

        try {
            switch ($operation_type) {
                case 'fetch':
                    $stmt = $this->db->con->prepare($query);
                    if ($params) {
                        $types = str_repeat('s', count($params));
                        $stmt->bind_param($types, ...$params);
                    }
                    $stmt->execute();
                    $result = $stmt->get_result();
                    return $result->fetch_all(MYSQLI_ASSOC);
                
                case 'insert':
                case 'update':
                case 'delete':
                    $stmt = $this->db->con->prepare($query);
                    $affected_rows = 0;
                    if ($params) {
                        if (is_array($params) && is_array($params[0])) {
                            // Multiple sets of parameters
                            $types = str_repeat('s', count($params[0]));
                            foreach ($params as $param) {
                                $stmt->bind_param($types, ...$param);
                                $stmt->execute();
                                $affected_rows += $stmt->affected_rows;
                            }
                        } else {
                            // Single set of parameters
                            $types = str_repeat('s', count($params));
                            $stmt->bind_param($types, ...$params);
                            $stmt->execute();
                            $affected_rows = $stmt->affected_rows;
                        }
                    } else {
                        // No parameters
                        $stmt->execute();
                        $affected_rows = $stmt->affected_rows;
                    }
                    return $affected_rows;
                
                default:
                    error_log("[DATABASE] Invalid operation_type or missing parameters");
                    return null;
            }
        } catch (Exception $e) {
            error_log("[DATABASE] Error executing $operation_type operation: " . $e->getMessage());
            throw $e;
        } finally {
            if (isset($stmt)) {
                $stmt->close();
            }
        }
    }

    /**
     * Retrieves data from a specified table with optional conditions.
     *
     * @param string $table The name of the table to query.
     * @param array $columns An array of column names to retrieve.
     * @param array|null $columns_to_check_condition Optional array of column names for conditions.
     * @param array|null $data_to_check_condition Optional array of condition values.
     * @return array|null The query results or null if an error occurred.
     */

    // // Example usage 1: Retrieve all columns with no conditions
    // $table = 'cctv_locations_general';
    // $columns = ['*'];
    // $results = $dbOps->retrieve_data($table, $columns);

    // // Example usage 2: Retrieve specific columns with multiple conditions
    // $table = 'cctv_locations_general';
    // $columns = ['Cam_ID', 'Location', 'IsActive', 'IsFlood'];
    // $columns_to_check_condition = ['IsActive', 'Location', 'Cam_ID'];
    // $data_to_check_condition = [
    //     true,
    //     ['New York', 'Los Angeles'],
    //     ['CAM001', 'CAM002', 'CAM003']
    // ];
    // $results = $dbOps->retrieve_data($table, $columns, $columns_to_check_condition, $data_to_check_condition);

    public function retrieve_data(
        string $table,
        array $columns,
        ?array $columns_to_check_condition = null,
        ?array $data_to_check_condition = null
    ): ?array {
        try {
            // Construct the base query
            $query = "SELECT " . implode(', ', $columns) . " FROM $table";
            
            // Construct WHERE clause only if conditions are provided
            $where_clause = "";
            $params = [];
            if ($columns_to_check_condition && $data_to_check_condition) {
                $where_conditions = [];
                foreach ($columns_to_check_condition as $i => $col) {
                    if (is_array($data_to_check_condition[$i])) {
                        $placeholders = implode(',', array_fill(0, count($data_to_check_condition[$i]), '?'));
                        $where_conditions[] = "$col IN ($placeholders)";
                        $params = array_merge($params, $data_to_check_condition[$i]);
                    } else {
                        $where_conditions[] = "$col = ?";
                        $params[] = $data_to_check_condition[$i];
                    }
                }
                $where_clause = "WHERE " . implode(' AND ', $where_conditions);
            }
            
            $query .= " $where_clause";

            // Execute the query
            $results = $this->execute_db_operation($query, "fetch", $params ?: null);
            
            error_log("[DATABASE] Successfully retrieved data from $table");
            return $results;

        } catch (Exception $e) {
            error_log("[DATABASE] Error retrieving data from $table: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Inserts multiple rows of data into a specified table.
     *
     * @param string $table The name of the table to insert data into.
     * @param array $columns An array of column names.
     * @param array $data_to_insert An array of arrays, each containing the values to insert.
     * @return int|null The number of rows inserted or null if an error occurred.
     */

    // $table = 'cctv_locations_general';
    // $columns = ['Cam_ID', 'Location', 'IsActive'];
    // $data_to_insert = [
    //     ['CAM001', 'New York', 1],
    //     ['CAM002', 'Los Angeles', 0],
    //     ['CAM003', 'Chicago', 1],
    //     ['CAM004', 'Houston', 1],
    //     ['CAM005', 'Phoenix', 0]
    // ];
    
    // $rows_inserted = $dbOps->insert_data($table, $columns, $data_to_insert);

    public function insert_data(string $table, array $columns, array $data_to_insert): ?int
    {
        try {
            // Construct the base query
            $placeholders = implode(', ', array_fill(0, count($columns), '?'));
            $query = "INSERT INTO $table (" . implode(', ', $columns) . ") VALUES ($placeholders)";

            // Execute the query
            $rows_inserted = $this->execute_db_operation($query, "insert", $data_to_insert);
            
            error_log("[DATABASE] Successfully inserted $rows_inserted rows to $table");
            return $rows_inserted;

        } catch (Exception $e) {
            error_log("[DATABASE] Error inserting data into $table: " . $e->getMessage());
            return null;
        }
    }


    /**
     * Deletes data from a specified table based on given conditions.
     *
     * @param string $table The name of the table to delete data from.
     * @param array $conditions An associative array of conditions for the WHERE clause.
     * @return int|null The number of rows deleted or null if an error occurred.
     */

    // $table = 'cctv_locations_general';
    // $conditions = ['IsActive' => 1, 'IsFlood' => 1];
    // $rows_deleted = $dbOps->delete_data($table, $conditions);

    public function delete_data(string $table, array $conditions): ?int
    {
        try {
            // Construct the base query
            $query = "DELETE FROM $table";
            
            // Add WHERE clause
            $where_clauses = [];
            $params = [];
            foreach ($conditions as $key => $value) {
                $where_clauses[] = "$key = ?";
                $params[] = $value;
            }
            
            $query .= " WHERE " . implode(' AND ', $where_clauses);

            // Execute the query
            $rows_deleted = $this->execute_db_operation($query, "delete", $params);
            
            error_log("[DATABASE] Successfully deleted $rows_deleted rows from $table");
            return $rows_deleted;

        } catch (Exception $e) {
            error_log("[DATABASE] Error deleting data from $table: " . $e->getMessage());
            return null;
        }
    }




    /**
     * Updates data in a specified table with optional conditions.
     *
     * @param string $table The name of the table to update.
     * @param array $columns_to_update An array of column names to update.
     * @param array $data_to_update An array of arrays containing the update values.
     * @param array|null $columns_to_check_condition Optional array of column names for conditions.
     * @param array|null $data_to_check_condition Optional array of condition values.
     * @return int|null The number of rows updated or null if an error occurred.
     */


    // // Example usage 1: Update all records
    // $table = 'cctv_locations_preprocessing';
    // $columns_to_update = ['is_online', 'last_checked'];
    // $data_to_update = [[1, '2023-10-03 12:00:00']];

    // $rows_updated = $dbOps->update_data($table, $columns_to_update, $data_to_update);

    // // Example usage 2: with multiple columns in WHERE clause
    // $table = 'cctv_locations_preprocessing';
    // $columns_to_update = ['is_online', 'last_checked'];
    // $data_to_update = [[1, '2023-10-03 12:00:00']];
    // $columns_to_check_condition = ['cam_id', 'location', 'status'];
    // $data_to_check_condition = [
    //     ['CAM001', 'CAM002', 'CAM003'],  // Array of CCTV IDs
    //     ['New York', 'Los Angeles'],     // Array of locations
    //     'active'                         // Single value for status
    // ];
    // $rows_updated = $dbOps->update_data($table, $columns_to_update, $data_to_update, $columns_to_check_condition, $data_to_check_condition);

    public function update_data(
        string $table,
        array $columns_to_update,
        array $data_to_update,
        ?array $columns_to_check_condition = null,
        ?array $data_to_check_condition = null
    ): ?int {
        try {
            // Construct the base query
            $set_clause = implode(', ', array_map(fn($col) => "$col = ?", $columns_to_update));
            
            // Construct WHERE clause only if conditions are provided
            $where_clause = "";
            if ($columns_to_check_condition && $data_to_check_condition) {
                $where_conditions = [];
                foreach ($columns_to_check_condition as $i => $col) {
                    if (is_array($data_to_check_condition[$i])) {
                        $placeholders = implode(',', array_fill(0, count($data_to_check_condition[$i]), '?'));
                        $where_conditions[] = "$col IN ($placeholders)";
                    } else {
                        $where_conditions[] = "$col = ?";
                    }
                }
                $where_clause = "WHERE " . implode(' AND ', $where_conditions);
            }
            
            $query = "UPDATE $table SET $set_clause $where_clause";

            // Prepare the parameters
            $params = [];
            foreach ($data_to_update as $row) {
                $param_row = $row;
                if ($data_to_check_condition) {
                    foreach ($data_to_check_condition as $condition) {
                        if (is_array($condition)) {
                            $param_row = array_merge($param_row, $condition);
                        } else {
                            $param_row[] = $condition;
                        }
                    }
                }
                $params[] = $param_row;
            }

            // Flatten the params array if it's a single update
            if (count($params) === 1) {
                $params = $params[0];
            }

            $rows_updated = $this->execute_db_operation($query, "update", $params);

            error_log("[DATABASE] Successfully updated $rows_updated records in $table");
            return $rows_updated;

        } catch (Exception $e) {
            error_log("[DATABASE] Error updating data in $table: " . $e->getMessage());
            return null;
        }
    }
}
?>