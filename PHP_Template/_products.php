<!--   product  -->
<?php
    $item_id = $_GET['item_id']??1;
    // $test = array("1", "2", "3");
    $item_info = $product->getMenu($item_id);
    $discount = 10.00;
    // print_r($item_id);
    // print_r($item_info);
    // Array ( [0] => Array ( [item_id] => 2 [item_type] => Breakfast [item_name] => Bacon, Egg & Cheese Griddles
    // [item_price] => 129.00 [item_image] => ./assetsPHP/menu/[BREAKFAST] Bacon, Egg & Cheese Griddles.png [item_rating] => 5.0
    // [item_register] => 2024-09-28 11:08:57 [is_top_sale] => 1 [is_new] => 0 ) )
?>

<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img
                src="<?php echo $item_info['item_image']; ?>"
                alt="<?php echo $item_info['item_name']; ?>"
                class="img-fluid"
                />
                <div class="form-row pt-4 font-size-16 font-baloo">
                <div class="col">
                    <button type="submit" class="btn btn-danger form-control">
                    Proceed to Buy
                    </button>
                </div>
                <div class="col">
                    <form id="addToCartForm" class="addToCartForm">
                        <input type="hidden" name="item_id" value="<?php echo $item_id ?? '1'; ?>">
                        <input type="hidden" name="current_user" value="<?php echo $current_user; ?>">
                        <input type="hidden" name="item_variant">
                        <input type="hidden" name="item_amount">
                        <button type="submit" class="btn btn-warning form-control">Add to Cart</button>
                    </form>
                </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item_info['item_name']; ?></h5>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <?php echo generateStarRating($item_info['item_rating']); ?>
                    </div>
                    <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                </div>
                <hr class="m-0" />

                <!---    product price       -->
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>M.R.P:</td>
                        <td><strike>฿<?php echo number_format(max(0, $item_info['item_price'] + $discount), 2);?></strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal Price:</td>
                        <td><span class="font-size-20 text-danger">฿<?php echo number_format($item_info['item_price'], 2); ?></span></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>You Save:</td>
                        <td><span class="font-size-16 text-danger">฿<?php echo $discount; ?></span></td>
                    </tr>
                </table>
                <!---    !product price       -->

                <!--    #policy -->
                <div id="policy" class="container">
                <div class="row justify-content-between">
                    <div class="col-md-4 mb-3 mb-md-0">
                    <div class="policy-item text-center">
                        <div class="icon-wrapper my-2">
                        <span
                            class="fa-solid fa-cow border p-3 rounded-pill"
                        ></span>
                        </div>
                        <p class="policy-text">
                        <strong>Always Fresh</strong><br />quality ingredients
                        </p>
                    </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                    <div class="policy-item text-center">
                        <div class="icon-wrapper my-2">
                        <span
                            class="fas fa-truck-fast border p-3 rounded-pill"
                        ></span>
                        </div>
                        <p class="policy-text">
                        <strong>30-Minute</strong><br />Guarantee Delivery
                        </p>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="policy-item text-center">
                        <div class="icon-wrapper my-2">
                        <span
                            class="fa-solid fa-leaf border p-3 rounded-pill"
                        ></span>
                        </div>
                        <p class="policy-text">
                        <strong>Eco-Friendly</strong><br />Packaging
                        </p>
                    </div>
                    </div>
                </div>
                </div>
                <!--    !policy -->
                <hr />

                <!-- order-details -->
                <div
                id="order-details"
                class="font-rale d-flex flex-column text-dark"
                >
                <small>Delivery within : 20 mins</small>
                <small>
                    <i class="fas fa-map-marker-alt color-primary"> </i>
                    &nbsp;&nbsp;Deliver to Customer - 424201
                </small>
                </div>
                <!-- !order-details -->

                <div class="row my-3">
                    <div class="col-6">
                        <!-- product qty section -->
                        <div class="qty quantity-selector">
                            <h6 class="quantity-label">Qty</h6>
                            <div class="quantity-controls">
                                <button class="qty-btn qty-down" data-id="Real Beef Burger">
                                    <i class="fas fa-angle-down"></i>
                                </button>
                                <input
                                    type="text"
                                    data-id="Real Beef Burger"
                                    class="qty_input"
                                    value="1"
                                    placeholder="1"
                                />
                                <button class="qty-btn qty-up" data-id="Real Beef Burger">
                                    <i class="fas fa-angle-up"></i>
                                </button>
                            </div>
                        </div>
                        <!-- !product qty section -->
                    </div>
                </div>

                <!-- size -->

                <div class="size my-3">
                    <h6 class="font-baloo">Size :</h6>
                    <div class="custom-gap size-selector">
                        <div class="size-option">
                            <button class="size-button">S</button>
                        </div>
                        <div class="size-option">
                            <button class="size-button">M</button>
                        </div>
                        <div class="size-option">
                            <button class="size-button selected">L</button>
                        </div>
                        <div class="size-option">
                            <button class="size-button">XL</button>
                        </div>
                        <div class="size-option">
                            <button class="size-button">XXL</button>
                        </div>
                    </div>
                </div>

                <!-- !size -->
            </div>

            <div class="col-12">
                <h6 class="font-rubik mt-5">Product Description</h6>
                <hr />
                <p class="font-rale font-size-14">
                    <?php echo $item_info['item_description']; ?>
                </p>
            </div>
        </div>
    </div>
</section>
<!--   !product  -->