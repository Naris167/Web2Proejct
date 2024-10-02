<!-- Top Sale -->
<?php
    $top_sale_menu = $product->getData('menu','is_top_sale');
    shuffle($top_sale_menu);
?>

<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr />
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">

            <?php foreach ($top_sale_menu as $item): ?>
                <div class="item py-2">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id'])?>">
                            <img src="<?php echo $item['item_image']; ?>" 
                                alt="<?php echo $item['item_name']; ?>" 
                                class="img-fluid" />
                        </a>
                        <div class="text-center">
                            <h6 class="product-name">
                                <?php echo $item['item_name']; ?>
                            </h6>
                            <div class="rating text-warning font-size-12">
                                <?php echo generateStarRating($item['item_rating']); ?>
                            </div>
                            <div class="price py-2">
                                <span>฿<?php echo number_format($item['item_price'], 2); ?></span>
                            </div>
                            <form class="addToCartForm">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="1">
                                <input type="hidden" name="item_variant" value="L">
                                <input type="hidden" name="item_amount" value=1>
                                <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale -->