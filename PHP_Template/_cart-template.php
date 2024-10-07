<!-- Shopping cart section  -->
<?php
    // Start output buffering
    ob_start();
?>

<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>
        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <!-- cart item -->
                <?php
                    // If cart is empty, show a message
                    if ($total_cart_item['total_amount'] == 0) {
                        // echo '<p class="text-center mt-3">Your cart is empty.</p>';
                        include('./PHP_Template/notFound/_cart_notFound.php');
                    }
                    
                    foreach ($cart_items as $index => $item) {
                        $cart_number = $index + 1;
                        ?>
                        <div class="row border-top py-3 mt-3">
                            <div class="col-sm-2">
                                <img
                                    src="<?php echo htmlspecialchars($item['item_image']); ?>"
                                    alt="cart-<?php echo $cart_number; ?>"
                                    class="img-fluid"
                                    style="height: 120px"
                                />
                            </div>
                            <div class="col-sm-8">
                                <h5 class="font-baloo font-size-20"><?php echo htmlspecialchars($item['item_name']); ?></h5>
                                <small>Size: <?php echo $item['item_variant']; ?></small>
                                <!-- product rating -->
                                <div class="d-flex">
                                    <div class="rating text-warning font-size-12">
                                        <?php echo generateStarRating($item['item_rating']); ?>
                                    </div>
                                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                                </div>
                                <!--  !product rating-->

                                <!-- product qty -->
                                <div class="qty quantity-selector-container d-flex pt-2">
                                    <div class="quantity-selector">
                                        <div class="quantity-controls">
                                            <button class="qty-btn qty-down" data-id="cart-<?php echo $cart_number; ?>">
                                                <i class="fas fa-angle-down"></i>
                                            </button>
                                            <input
                                                type="text"
                                                data-id="cart-<?php echo $cart_number; ?>"
                                                class="qty_input"
                                                value="<?php echo $item['item_amount']; ?>"
                                                placeholder="1"
                                            />
                                            <button class="qty-btn qty-up" data-id="cart-<?php echo $cart_number; ?>">
                                                <i class="fas fa-angle-up"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <form class="deleteFromCartForm">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                                        <input type="hidden" name="item_variant" value="<?php echo $item['item_variant']; ?>">
                                        <input type="hidden" name="user_id" value="1">
                                        <button type="submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                                    </form>
                                    <button type="submit" class="btn font-baloo text-danger">
                                        Save for Later
                                    </button>
                                </div>
                                <!-- !product qty -->
                            </div>

                            <div class="col-sm-2 text-right">
                                <div class="font-size-20 text-danger font-baloo">
                                    <span class="product_price">฿<?php echo number_format($item['item_price'], 2); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    // End output buffering and echo the content
                    echo ob_get_clean();
                ?>
                <!-- !cart item -->
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3">
                        <i class="fas fa-check"></i> Your order is eligible for FREE
                        Delivery.
                    </h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">
                        Subtotal (<?php echo $total_cart_item['total_amount']; ?> item):&nbsp;
                        <span class="text-danger">
                            <span class="text-danger">฿<?php echo number_format($total_cart_item['total_price'], 2); ?></span>
                        </span>
                        </h5>
                        <button type="submit" class="btn btn-warning mt-3">
                        Proceed to Buy
                        </button>
                    </div>
                </div>
            </div>
        <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->