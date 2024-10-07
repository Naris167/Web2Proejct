<!-- All Menu -->
<?php
    $all_menu = $product->getData('menu');
    shuffle($all_menu);
    $itemTypes = $product->getUniqueMenuTypes();
?>

<section id="all-menu">
    <div class="container">
        <h4 class="font-rubik font-size-20">Menu</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Menu</button>
            <?php foreach ($itemTypes as $itemType): ?>
                <button class="btn" data-filter=".<?php echo $itemType; ?>"><?php echo $itemType; ?></button>
            <?php endforeach; ?>
        </div>
        <div class="grid">

            <?php foreach ($all_menu as $item): ?>
                <div class="grid-item <?php echo $item['item_type']; ?>">
                    <div class="item py-2" style="width: 200px">
                        <div class="product font-rale">
                            <div class="d-flex flex-column">
                                <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id'])?>">
                                    <img
                                        src="<?php echo $item['item_image']; ?>"
                                        alt="<?php echo $item['item_name']; ?>"
                                        class="img-fluid"
                                    />
                                </a>
                                <div class="text-center">
                                    <h6 class="product-name"><?php echo $item['item_name']; ?></h6>
                                    <div class="rating text-warning font-size-12">
                                        <?php echo generateStarRating($item['item_rating']); ?>
                                    </div>
                                    <div class="price py-2">
                                        <span>฿<?php echo number_format($item['item_price'], 2); ?></span>
                                    </div>
                                    <form class="addToCartForm">
                                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                        <input type="hidden" name="current_user" value="<?php echo $current_user; ?>">
                                        <input type="hidden" name="item_variant" value="L">
                                        <input type="hidden" name="item_amount" value=1>
                                        <button type="submit" class="btn btn-warning font-size-12">Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- !All Menu -->