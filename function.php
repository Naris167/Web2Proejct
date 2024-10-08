
<?php
    require('database/DatabaseOperations.php');
    require('database/DBController.php');
    require('database/Product.php');
    require('database/Cart.php');
    require('database/Auth.php');
    // require_once('session_auth.php');

    

    // Innitialized database connection
    $dbController = new DBController();
    $dbOps = new DatabaseOperations($dbController);

    // Innitialized classes
    $cart = new Cart($dbOps);
    $product = new Product($dbOps);
    $auth = new Auth($dbOps);

    // Check if user is logged in, if not, try auto-login
    if (!$auth->isLoggedIn()) {
        // User is not logged in, try auto-login
        if (!$auth->checkAutoLogin()) {
            // Auto-login failed, redirect to login page
            $auth->requireLogin();
        }
    }

    $current_user = $_SESSION['id'];



    //Get cart item for user
    $cart_items = $cart->getCartItem($current_user);
    $total_cart_item = $cart->getTotalCartAmount($current_user);
    // print_r($item_count);

    




    function generateStarRating($rating): string {
        $fullStars = floor($rating);
        $halfStar = $rating - $fullStars >= 0.5;
        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);

        $html = '';
        for ($i = 0; $i < $fullStars; $i++) {
            $html .= '<span><i class="fas fa-star"></i></span>';
        }
        if ($halfStar) {
            $html .= '<span><i class="far fa-star-half-stroke"></i></span>';
        }
        for ($i = 0; $i < $emptyStars; $i++) {
            $html .= '<span><i class="far fa-star"></i></span>';
        }
        return $html;
    };
    
?>