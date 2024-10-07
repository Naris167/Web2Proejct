
<?php
    require('database/DatabaseOperations.php');
    require('database/DBController.php');
    require('database/Product.php');
    require('database/Cart.php');

    // Innitialized database connection
    $dbController = new DBController();
    $dbOps = new DatabaseOperations($dbController);

    // Innitialized classes
    $cart = new Cart($dbOps);
    $product = new Product($dbOps);

    //Get cart item for user
    $cart_items = $cart->getCartItem('1');
    $total_cart_item = $cart->getTotalCartAmount('1');
    // print_r($item_count);

    $current_user = '1';


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