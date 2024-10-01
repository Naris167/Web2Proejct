
<?php
    require('database/DBController.php');
    require('database/Product.php');
    require('database/Cart.php');
    $db = new DBController();
    $product = new Product($db);
    // print_r($product->getData('menu', 'is_top_sale'));
    $cart = new Cart($db);



    function generateStarRating($rating) {
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