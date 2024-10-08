<?php
// Auth.php

class Auth {
    private $dbOps = null;

    public function __construct(DatabaseOperations $dbOps)
    {
        if (!$dbOps instanceof DatabaseOperations) {
            throw new Exception("Invalid DatabaseOperations object");
        }

        $this->dbOps = $dbOps;
    }

    function performRegister($email, $password, $first_name, $last_name): array {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
        // Check if username already exists
        $existing_user = $this->dbOps->retrieve_data('user', ['id'], ['email'], [$email]);
    
        if ($existing_user && count($existing_user) > 0) {
            return [
                'success' => 'warning',
                'message' => 'This email has been taken'
            ];
        }
    
        // Username is available, proceed with registration
        // Insert new user into the database
        $columns = ['email', 'password_hash', 'first_name', 'last_name'];
        $data_to_insert = [$email, $hashed_password, $first_name, $last_name];
        $insert_result = $this->dbOps->insert_data('user', $columns, $data_to_insert);
    
        if ($insert_result) {
            return [
                'success' => 'success',
                'message' => 'Registration successful'
            ];
        } else {
            return [
                'success' => 'error',
                'message' => 'Registration failed. Please try again.'
            ];
        }
    }
    

    public function performLogin($email, $password): array {
        // Prepare data for retrieve_data function
        $table = 'user';
        $columns = ['id', 'first_name', 'last_name', 'password_hash'];
        $columns_to_check_condition = ['email'];
        $data_to_check_condition = [$email];
    
        // Call retrieve_data function to get user data including hashed password
        $result = $this->dbOps->retrieve_data(
            $table,
            $columns,
            $columns_to_check_condition,
            $data_to_check_condition
        );
    
        if ($result && count($result) > 0) {
            $user = $result[0];
            
            // Verify the password
            if (password_verify($password, $user['password_hash'])) {
                // Password is correct
                
                // Start session if not already started
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
    
                // Set session data
                $_SESSION['id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['last_activity'] = time();
    
                // Set cookie for auto-login (expires in 10 minutes)
                $expiration = time() + 600; // 600 seconds = 10 minutes
                $cookie_value = base64_encode($user['id'] . '|' . $email . '|' . $user['password_hash'] . '|' . $expiration);
                setcookie('auto_login', $cookie_value, $expiration, '/', '', true, true);
    
                return [
                    'success' => 'success',
                    'message' => 'Login successful',
                    'user' => $user
                ];
            } else {
                // Password is incorrect
                return [
                    'success' => 'error',
                    'message' => 'Invalid username or password'
                ];
            }
        } else {
            // User not found
            return [
                'success' => 'error',
                'message' => 'Invalid username or password'
            ];
        }
    }
    
    // Function to check if user is logged in and session is not expired
    public function isLoggedIn(): bool {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (isset($_SESSION['id']) && isset($_SESSION['last_activity'])) {
            if (time() - $_SESSION['last_activity'] > 600) {
                // Session expired
                session_unset();
                session_destroy();
                return false;
            }
            // Update last activity time
            $_SESSION['last_activity'] = time();
            return true;
        }
    
        return false;
    }
    
    // Function to check auto-login cookie and perform login if valid
    public function checkAutoLogin(): bool {
        if (isset($_COOKIE['auto_login'])) {
            list($id, $email, $hashed_password, $expiration) = explode('|', base64_decode($_COOKIE['auto_login']));
            
            if (time() < $expiration) {
                // Cookie is still valid
                $result = $this->dbOps->retrieve_data(
                    'user',
                    ['*'],
                    ['id', 'email', 'password_hash'],
                    [$id, $email, $hashed_password]
                );
                
                if ($result && count($result) > 0) {
                    $user = $result[0];
                    // Start session and set data
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['first_name'] = $user['first_name'];
                    $_SESSION['last_name'] = $user['last_name'];
                    $_SESSION['last_activity'] = time();
                    
                    // Refresh auto-login cookie
                    $new_expiration = time() + 600;
                    $cookie_value = base64_encode($user['id'] . '|' . $email . '|' . $hashed_password . '|' . $new_expiration);
                    setcookie('auto_login', $cookie_value, $new_expiration, '/', '', true, true);
                    
                    return true;
                }
            }
            
            // If we reach here, the cookie is invalid or expired
            setcookie('auto_login', '', time() - 3600, '/', '', true, true); // Delete the cookie
        }
        
        return false;
    }
    
    // Function to redirect to login page if not logged in
    public function requireLogin(): void {
        if (!$this->isLoggedIn() && !$this->checkAutoLogin()) {
            header('Location: index.php');
            exit();
        }
    }

    
    public function performAutoLogin($user_id, $email, $hashed_password): array {
        $user = $this->dbOps->retrieve_data('user', ['id', 'email', 'password_hash', 'first_name', 'last_name'], ['id', 'email'], [$user_id, $email]);
    
        if ($user && count($user) > 0) {
            $user = $user[0];
            if ($user['password_hash'] === $hashed_password) {
                // Auto-login successful
                $_SESSION['id'] = $user['id'];
                $_SESSION['first_name'] = $user['first_name'];
                $_SESSION['last_name'] = $user['last_name'];
                $_SESSION['last_activity'] = time();
    
                // Refresh the auto-login cookie
                $expiration = time() + 600; // 600 seconds = 10 minutes
                $cookie_value = base64_encode($user['id'] . '|' . $email . '|' . $hashed_password . '|' . $expiration);
                setcookie('auto_login', $cookie_value, $expiration, '/', '', true, true);
    
                return [
                    'success' => 'success',
                    'message' => 'Auto-login successful'
                ];
            }
        }
    
        return [
            'success' => 'error',
            'message' => 'Auto-login failed'
        ];
    }
    
    public function performLogout(): array {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        // Unset all session variables
        $_SESSION = array();
    
        // Destroy the session
        session_destroy();
    
        // Delete the auto-login cookie if it exists
        if (isset($_COOKIE['auto_login'])) {
            setcookie('auto_login', '', time() - 3600, '/', '', true, true);
        }
    
        return [
            'success' => 'success',
            'message' => 'Logout successful'
        ];
    }

    

}

// Generate dummy account
// echo'Win@2111240001';
// echo'<br>';
// print_r(password_hash('Win@2111240001', PASSWORD_DEFAULT));
// echo'<br>';
// echo'Jade@2106150005';
// echo'<br>';
// print_r(password_hash('Jade@2106150005', PASSWORD_DEFAULT));
// echo'<br>';
// echo'Naris@2106010007';
// echo'<br>';
// print_r(password_hash('Naris@2106010007', PASSWORD_DEFAULT));
// echo'<br>';
// echo'Saint@2207110046';
// echo'<br>';
// print_r(password_hash('Saint@2207110046', PASSWORD_DEFAULT));