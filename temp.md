write a python script that read all the file name in its current folder. Take only the file name with ".png" format. Get both file name and ".png" of all picture. the gernerate the html file using the template here. The output should name "genHTML.html". Before that, you have to understand the format of the picture name first. For example, this picture has a name "[SALAD] Side Salad.png". You have to take the name in the bracket, this case is the "SALAD", and convert it to normal case which will be "Salad". Then put the result in the first div tag, in the class like in the code below. Next, go to the img tag. In the src part, you have to put the whole file name. In the alt part, you have to put only the actual name of the nemu, which show in the code below. Next, go to h6 tag, you can see that there is also a name of the food there, put the name there as well. This is finished for one html block. You have to repeate as many times as the number of .png picture you found. Just put the html code next to each other and save it as one file. Between each block, put 1 empty line, and ensure that tabs and indent are maintain.

```html
<div class="grid-item Salad">
    <div class="item py-2" style="width: 200px">
        <div class="product font-rale">
            <div class="d-flex flex-column">
                <a href="#">
                    <img
                    src="../assets/menu/[SALAD] Side Salad.png"
                    class="img-fluid"
                    alt="Side Salad"
                    />
                </a>
                <div class="text-center">
                    <h6 class="product-name">Side Salad</h6>
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <div class="price py-2">
                        <span>$152</span>
                    </div>
                    <button type="submit" class="btn btn-warning font-size-12">
                    Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
```

















You can see that these 2 quantity selector used difference css.

This is the first quantity selector
```html
<div class="col-6">
    <!-- product qty section -->
    <div class="qty quantity-selector">
    <h6 class="quantity-label">Qty</h6>
    <div class="quantity-controls">
        <button
        class="quantity-btn quantity-decrease qty-down"
        data-id="Real Beef Burger"
        >
        <i class="fas fa-angle-down"></i>
        </button>
        <input
        type="text"
        data-id="Real Beef Burger"
        class="qty_input quantity-input"
        disabled
        value="1"
        placeholder="1"
        />
        <button
        class="quantity-btn quantity-increase qty-up"
        data-id="Real Beef Burger"
        >
        <i class="fas fa-angle-up"></i>
        </button>
    </div>
    </div>
    <!-- !product qty section -->
</div>
```

and it used this scss

```scss
.quantity-selector {
  display: flex;
  align-items: center;
  font-family: Arial, sans-serif;

  .quantity-label {
    font-weight: bold;
    margin-right: 1rem;
    margin-bottom: 0;  // To match h6 default style
  }

  .quantity-controls {
    display: flex;
    align-items: center;

    .quantity-btn {
      @include button-reset;
      font-size: 1rem;
      padding: 0.25rem 0.5rem;
      transition: background-color 0.3s ease;

      &:hover {
        background-color: $hover-color;
      }

      .fas {
        font-size: 0.875rem;  // Slightly smaller icon
      }
    }

    .quantity-input {
      width: 2.5rem;
      text-align: center;
      font-size: 1rem;
      border: 1px solid $border-color;
      background-color: $background-color;
      padding: 0.25rem 0;
      margin: 0 -1px;  // Negative margin to overlap borders
      
      &:disabled {
        color: $botton-color-gray;
        opacity: 1;  // Ensure full opacity even when disabled
      }

      &:focus {
        outline: none;
      }
    }
  }
}
```

here is the second quantity selector

```html
<div class="qty d-flex pt-2">
    <div class="qty-control">
        <button class="qty-btn qty-down" data-id="Real Beef Burger">
        <i class="fas fa-angle-down"></i>
        </button>
        <input
        type="text"
        data-id="Real Beef Burger"
        class="qty_input"
        disabled
        value="1"
        placeholder="1"
        />
        <button class="qty-btn qty-up" data-id="Real Beef Burger">
        <i class="fas fa-angle-up"></i>
        </button>
    </div>

    <button
        type="submit"
        class="btn font-baloo text-danger px-3 border-right"
    >
        Delete
    </button>
    <button type="submit" class="btn font-baloo text-danger">
        Save for Later
    </button>
</div>
```

and it used the following scss

```scss
.qty-control {
    $border-color: #ced4da;
    $bg-color: #f8f9fa;
    $hover-color: #e9ecef;
  
    display: flex;
    width: 20%;
    font-family: Arial, sans-serif;
    border: 1px solid $border-color;
    border-radius: 4px;
    overflow: hidden;
  
    .qty-btn {
      background-color: $bg-color;
      border: none;
      padding: 0.375rem 0.75rem;
      cursor: pointer;
  
      &:hover {
        background-color: $hover-color;
      }
    }
  
    .qty_input {
      border: none;
      text-align: center;
      width: 50%;
      padding: 0.375rem 0;
      background-color: $bg-color;
    }
  }

```



I like the scss design of the second one, and I want to use it for my project. The thing is that when I try to change, it just breaks. Maybe because of the difference html structure. Help me do it by give me a final scss and html for both first and second one. For the button that has type="submit", don't have to touch it. I just put it there for you to have some overview of the html structure







convert this html to php statement that can populate more html based on data from DB

```html
<div class="item py-2">
    <div class="product font-rale">
    <a href="#"
        ><img
        src="./assetsPHP/menu/[BURGER] Deluxe Spicy Crispy Chicken Sandwich.png"
        alt="Deluxe Spicy Crispy Chicken Sandwich"
        class="img-fluid"
    /></a>
    <div class="text-center">
        <h6 class="product-name">
        Deluxe Spicy Crispy Chicken Sandwich
        </h6>
        <div class="rating text-warning font-size-12">
          <span><i class="fas fa-star"></i></span>
          <span><i class="fas fa-star"></i></span>
          <span><i class="fas fa-star"></i></span>
          <span><i class="fas fa-star"></i></span>
          <span><i class="far fa-star"></i></span>
        </div>
        <div class="price py-2">
          <span>฿152</span>
        </div>
        <button type="submit" class="btn btn-warning font-size-12">
        Add to Cart
        </button>
    </div>
    </div>
</div>
```

I have this variable that you can use `$product_shuffle = $product->getData('menu','is_top_sale')` that return the data like this 

Array ( [0] => Array ( [item_id] => 2 [item_type] => Breakfast [item_name] => Bacon, Egg & Cheese Griddles [item_price] => 129.00 [item_image] => ./assetsPHP/menu/[BREAKFAST] Bacon, Egg & Cheese Griddles.png [item_rating] => 5.0 [item_register] => 2024-09-28 11:08:57 [is_top_sale] => 1 [is_new] => 0 ) [1] => Array ( [item_id] => 11 [item_type] => Burger [item_name] => Deluxe Spicy Crispy Chicken Sandwich [item_price] => 89.00 [item_image] => ./assetsPHP/menu/[BURGER] Deluxe Spicy Crispy Chicken Sandwich.png [item_rating] => 4.5 [item_register] => 2024-09-28 11:08:57 [is_top_sale] => 1 [is_new] => 0 ))

You can see that that array have more array inside that each one are each record from database. For each record it is equal to that one html block, and you have to generate as many html block as the number of record you got here in array.

In each html block, there are some part that we have to change.
1. In the img tag, we have to change this src="./assetsPHP/menu/[BURGER] Deluxe Spicy Crispy Chicken Sandwich.png" to the value in [item_image]
2. In the img tag, we have to change this alt="Deluxe Spicy Crispy Chicken Sandwich" to the [item_name]
3. At the h6 tag, we have to use [item_name]
4. At this div tag, <div class="rating text-warning font-size-12">, is used to display the rating star. Here you have to create another function and call it here to generate <span><i class="..."></i></span> here. This function should accept the value from [item_rating] to convert it to star. Please note that the value in this field will be from 0 to 5 and only have half value like '2.5' '3.5' '4.5'. Here is how you can create a star
4.1 <span><i class="fas fa-star"></i></span> is 1 full star
4.2 <span><i class="far fa-star-half-stroke"></i></span> is half star
4.3 <span><i class="fas fa-star"></i></span> is empty star
5. At this div tag, <div class="price py-2">, is used to display the product price. Use the information from [item_price] for this part. Please output the <span>...</span> tag that have ฿ symbol and follow by [item_price]









Good, next, convert this html to php statement that can populate more html based on data from DB. It is very similar to the previous one.

```html
<div class="grid-item Breakfast">
    <div class="item py-2" style="width: 200px">
      <div class="product font-rale">
          <div class="d-flex flex-column">
            <a href="#">
                <img
                src="./assetsPHP/menu/[BREAKFAST] Bacon, Egg & Cheese Biscuit.png"
                alt="Bacon, Egg & Cheese Biscuit"
                class="img-fluid"
                />
            </a>
            <div class="text-center">
              <h6 class="product-name">Bacon, Egg & Cheese Biscuit</h6>
              <div class="rating text-warning font-size-12">
                <?php echo generateStarRating($item['item_rating']); ?>
              </div>
              <div class="price py-2">
                <span>฿152</span>
              </div>
              <button type="submit" class="btn btn-warning font-size-12">
                Add to Cart
              </button>
            </div>
          </div>
      </div>
    </div>
</div>
```

I have this variable that you can use `$all_menu = $product->getData('menu')` that return the data like this 

Array ( [0] => Array ( [item_id] => 2 [item_type] => Breakfast [item_name] => Bacon, Egg & Cheese Griddles [item_price] => 129.00 [item_image] => ./assetsPHP/menu/[BREAKFAST] Bacon, Egg & Cheese Griddles.png [item_rating] => 5.0 [item_register] => 2024-09-28 11:08:57 [is_top_sale] => 1 [is_new] => 0 ) [1] => Array ( [item_id] => 11 [item_type] => Burger [item_name] => Deluxe Spicy Crispy Chicken Sandwich [item_price] => 89.00 [item_image] => ./assetsPHP/menu/[BURGER] Deluxe Spicy Crispy Chicken Sandwich.png [item_rating] => 4.5 [item_register] => 2024-09-28 11:08:57 [is_top_sale] => 1 [is_new] => 0 ))

You can see that that array have more array inside that each one are each record from database. For each record it is equal to that one html block, and you have to generate as many html block as the number of record you got here in array.

In each html block, there are some part that we have to change.
1. At this div tag, <div class="grid-item Breakfast">, use the value from [item_type] to put in the class so it will be like <div class="grid-item [item_type]">
2. In the img tag, we have to change this src="./assetsPHP/menu/[BURGER] Deluxe Spicy Crispy Chicken Sandwich.png" to the value in [item_image]
3. In the img tag, we have to change this alt="Deluxe Spicy Crispy Chicken Sandwich" to the [item_name]
4. At the h6 tag, we have to use [item_name]
5. At this div tag, <div class="rating text-warning font-size-12">, is used to display the rating star. Here you can just use the same function that create previously. I already put it there for draft.
6. At this div tag, <div class="price py-2">, is used to display the product price. Use the information from [item_price] for this part. Please output the <span>...</span> tag that have ฿ symbol and follow by [item_price]













Also create another php code that populate the following html

```html
<button class="btn" data-filter=".Breakfast">Breakfast</button>
<button class="btn" data-filter=".Burger">Burger</button>
<button class="btn" data-filter=".Dessert">Dessert</button>
<button class="btn" data-filter=".Drinks">Drinks</button>
<button class="btn" data-filter=".Salad">Salad</button>
<button class="btn" data-filter=".Snacks">Snacks</button>
```

but before that, create one php function to get this data from db. Use "$result = $this->db->con->query" for the connection. Get `item_type` from `menu` table. Please note there are several items in this table so only get all the unique `item_type` and return it as an array. before return it, please sort it first.

Ok, back the the html. call that new function to get the `item_type`, and for each item type, you have to put it in one html line like this. For example, is the value from the `item_type` is "Breakfast", you have to put it in the data-filter like this (also have dot before it) and put in the text for button like this <button class="btn" data-filter=".Breakfast">Breakfast</button>. Do this as many items as it have in the array











modify this function so it can accept both normal item_id or array of item id. The reason to do this is because this function is used in other place with the normal item_id. When this function get an array of item_id, it should construct sql command to fetch all column of the specify item_id. For example, if the arrry have item_id 1, 2, 3 it should get only 3 record of each item_id. Now when you return the value of this function. If the input is just a normal item_id (only 1 id) return the value as an array. But if the input is an array of item_id, return an array of each record inside the array.

```php
public function getMenu($item_id = null, $table = 'menu') {
    if (isset($item_id)) {
        $item_id = $this->db->con->real_escape_string($item_id);  // Prevent SQL injection
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id = {$item_id} LIMIT 1");

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
    }
    
    return null;  // Return null if no item found or if $item_id is not set
}
```











convert this to PHP code the can ge data from database and populate this html block

```html
<div class="row border-top py-3 mt-3">
  <div class="col-sm-2">
      <img
      src="./assetsPHP/menu/[BURGER] Real Beef Burger.png"
      alt="cart1"
      class="img-fluid"
      style="height: 120px"
      />
  </div>
<div class="col-sm-8">
    <h5 class="font-baloo font-size-20">Real Beef Burger</h5>
    <!-- product rating -->
    <div class="d-flex">
      <div class="rating text-warning font-size-12">
          <?php echo generateStarRating($item_info['item_rating']); ?>
      </div>
      <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
    </div>
    <!--  !product rating-->

    <!-- product qty -->
    <div class="qty quantity-selector-container d-flex pt-2">
      <div class="quantity-selector">
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
      <button
          type="submit"
          class="btn font-baloo text-danger px-3 border-right"
      >
          Delete
      </button>
      <button type="submit" class="btn font-baloo text-danger">
          Save for Later
      </button>
  </div>
      <!-- !product qty -->
  </div>

  <div class="col-sm-2 text-right">
      <div class="font-size-20 text-danger font-baloo">
          <span class="product_price">฿152</span>
      </div>
  </div>
</div>
```


1. First, you will have to call this `$cart_item = $product->getData('cart');` to get the cart information
2. It will return the array inside array like this `Array ( [0] => Array ( [cart_id] => 1 [user_id] => 1 [item_id] => 2 ) [1] => Array ( [cart_id] => 2 [user_id] => 1 [item_id] => 2 ))`
3. But before that, you have to get the `[item_id]` from each inner array which will be used to get the product information from another table. Store them in the array. Make sure that the value will not duplicate.
4. Call this function and input that array into this function `$product->getMenu($arr_item_id, 'menu')`. This will return the array of array
5. for each array it is one cart record. You have to populate as many html block as the number of array. It will looks like this

Array ( [0] => Array ( [item_id] => 1 [item_type] => Breakfast [item_name] => Bacon, Egg & Cheese Biscuit [item_price] => 119.00 [item_image] => ./assetsPHP/menu/[BREAKFAST] Bacon, Egg & Cheese Biscuit.png [item_rating] => 5.0 [item_register] => 2024-09-28 11:08:57 [is_top_sale] => 0 [is_new] => 0 [item_description] => Introducing our Bacon, Egg & Cheese Biscuit - the perfect way to fuel your morning with deliciously balanced ingredients. ) [1] => Array ( [item_id] => 2 [item_type] => Breakfast [item_name] => Bacon, Egg & Cheese Griddles [item_price] => 129.00 [item_image] => ./assetsPHP/menu/[BREAKFAST] Bacon, Egg & Cheese Griddles.png [item_rating] => 5.0 [item_register] => 2024-09-28 11:08:57 [is_top_sale] => 1 [is_new] => 0 [item_description] => Enjoy the perfect blend of flavors in every bite, making this a clean, satisfying choice to fuel your morning right! ) )

6. Here is how you can create html.
6.1 In the img tag change this part src=[item_image]
6.2 In the img tag change this part alt="cart-1". Increment the number as you populate (cart-1, cart-2, cart-3 and so on).
6.3 At this h5 tag, do this <h5 class="font-baloo font-size-20">[item_name]</h5>, 
6.4 For the value of data-id, please use cart-1, cart-2, cart-3 and so on.
6.5 At <span class="product_price">฿152</span> change the price using [item_price]









```sql
SELECT m.*, c.item_amount, c.item_variant
FROM menu m
LEFT JOIN cart c ON m.item_id = c.item_id AND c.user_id = [specific_user_id]
WHERE m.item_id = [specific_item_id];
```













I want this button to take a value of item_variant and item_amount from the selector

```html
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

<form class="addToCartForm">
    <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
    <input type="hidden" name="user_id" value="1">
    <input type="hidden" name="item_variant" value="L">
    <input type="hidden" name="item_amount" value=1>
    <button type="submit" class="btn btn-warning form-control">Add to Cart</button>
</form>
```


Here is the full code


```html
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
                    <form class="addToCartForm">
                        <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                        <input type="hidden" name="user_id" value="1">
                        <input type="hidden" name="item_variant" value="L">
                        <input type="hidden" name="item_amount" value=1>
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
```


also here are 2 JS function for qty selector. so you know how it work, and can implement the button to take a value of item_variant and item_amount. For size selector, it don't have any js yet

```js
function initQuantityControls() {
    let $qty_up = $(".qty-up");
    let $qty_down = $(".qty-down");
    let $qty_input = $(".qty_input");
  
    function validateQuantity(value) {
      value = parseInt(value);
      if (isNaN(value) || value < 1) return 1;
      if (value > 10) return 10;
      return value;
    }
  
    $qty_up.click(function (e) {
      let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
      let currentVal = validateQuantity($input.val());
      if (currentVal < 10) {
        $input.val(currentVal + 1);
      }
    });
  
    $qty_down.click(function (e) {
      let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
      let currentVal = validateQuantity($input.val());
      if (currentVal > 1) {
        $input.val(currentVal - 1);
      }
    });
  
    $qty_input.on("input", function (e) {
      let inputVal = $(this).val();
      if (inputVal !== "") {
        let validatedVal = validateQuantity(inputVal);
        $(this).val(validatedVal);
      }
    });
  
    $qty_input.on("blur", function (e) {
      let inputVal = $(this).val();
      if (inputVal === "") {
        $(this).val(1);
      } else {
        let validatedVal = validateQuantity(inputVal);
        $(this).val(validatedVal);
      }
    });
  }
```




















This php function will be called upon user's action when they click on the add to cart button. 4 informations will be input into this function. However, this function will insert the item that already existed in the database which is not good. I want you to fix it.  


```php
public function addToCart($userid, $itemid, $variant = "L", $amount = 1):bool {
    try {
        $table = 'cart'; // Assuming your cart table is named 'cart'
        $columns = ['user_id', 'item_id', 'item_variant', 'item_amount'];
        $data_to_insert = [[$userid, $itemid, $variant, $amount]];

        $rows_inserted = $this->dbOps->insert_data($table, $columns, $data_to_insert);

        if ($rows_inserted > 0) {
            error_log("[CART] Successfully added item to cart for user $userid");
            return true;
        } else {
            error_log("[CART] Failed to add item to cart for user $userid");
            return false;
        }
    } catch (Exception $e) {
        error_log("[CART] Error adding item to cart: " . $e->getMessage());
        return false;
    }
}
```

here is the database design of cart table.
```sql
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_amount` int(11) NOT NULL,
  `item_variant` varchar(100) NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`),
  FOREIGN KEY (`item_id`) REFERENCES `menu`(`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

Before call the function insert_data(), you have to call retrieve_data() function which it works like this. I just let you know so you know how to use it. You have to call this function to check if the information input in the addToCart() is already existed in the database or not. For example, if the user with id `1` click on add to cart button for item that have `$itemid = 19, $variant = "L", $amount = 4`, you have to check if there is any record that have existed `$userid` and `$itemid` or not. If they are not existed yet, it mean this user just add this item for the first time, so you ca proceed with calling insert_data() function to insert this record of item into cart table. However, if they are existed, check if `$variant` of that record from database is the same as the one that will be add to database or not. If it is not the same, you can proceed with adding this new record to database. However, if the `$variant` is the same with the one in database, you have to call update_data() function to update the record. Take the value of `$amount` from that existing record from database, add the `$amount` calue from input of addToCart() function to it, and then update the record in the database. For example, if there is an record with the following value in the database `$userid = 1, $itemid = 19, $variant = "L", $amount = 1` and user with the same id just click on the button that have these value `$itemid = 19, $variant = "L", $amount = 4`, you have to update the column `$amount` in the existing record in the database to `5`

```php
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
```


```php
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
```


Please review my instruction again and see if this have any point that could cause potential bug or not. If there is any, fix it before implement this.










Now, write another function name `getCartItem`. This function should accept input as `$userid` and get all item related to this user id from cart table. However, this table only have the information about the cart like item id, amount, variant. So you have to call retrieve_data() function again after getting all item assosiated to that user from cart table. Use item to get the information about each item from menu table in database, the table look like this.


```sql
CREATE TABLE `menu` (
  `item_id` int(11) NOT NULL,
  `item_type` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_rating` decimal(2,1) NOT NULL,
  `item_register` datetime DEFAULT NULL,
  `is_top_sale` boolean DEFAULT FALSE,
  `is_new` boolean DEFAULT FALSE,
  `item_description` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

The function `getCartItem` should return the following array:

Array (
  [0] => Array ( [item_id] => 6 [item_name] => Sausage Biscuit with Egg [item_price] => 109.00 [item_image] => ./assetsPHP/menu/[BREAKFAST] Sausage Biscuit with Egg.png [item_rating] => 4.5 [item_variant] => M [item_amount] => 3)
  [1] => Array ( [item_id] => 6 [item_name] => Sausage Biscuit with Egg [item_price] => 109.00 [item_image] => ./assetsPHP/menu/[BREAKFAST] Sausage Biscuit with Egg.png [item_rating] => 4.5 [item_variant] => S [item_amount] => 7)
  [2] => Array ( [item_id] => 10 [item_name] => Crispy Chicken Burger [item_price] => 59.00 [item_image] => ./assetsPHP/menu/[BURGER] Crispy Chicken Burger.png [item_rating] => 5.0 [item_variant] => XL [item_amount] => 5)
)

The same item with difference variant will have to be in another array, you you call the function retrieve_data() just use it to get only the column that will be use in the process and output

Please review my instruction again and see if this have any point that could cause potential bug or not. If there is any, fix it before implement this.


Now write another function called `getTotalCartAmount`. This function should return an array of item amount of that user, it should take an user id as input. Let's say these are the things inside this user's cart

Array (
  [0] => Array ( [item_id] => 6 [item_name] => Sausage Biscuit with Egg [item_price] => 109.00 [item_image] => ./assetsPHP/menu/[BREAKFAST] Sausage Biscuit with Egg.png [item_rating] => 4.5 [item_variant] => M [item_amount] => 3) 327
  [1] => Array ( [item_id] => 6 [item_name] => Sausage Biscuit with Egg [item_price] => 109.00 [item_image] => ./assetsPHP/menu/[BREAKFAST] Sausage Biscuit with Egg.png [item_rating] => 4.5 [item_variant] => S [item_amount] => 7) 763
  [2] => Array ( [item_id] => 10 [item_name] => Crispy Chicken Burger [item_price] => 59.00 [item_image] => ./assetsPHP/menu/[BURGER] Crispy Chicken Burger.png [item_rating] => 5.0 [item_variant] => XL [item_amount] => 5) 295
)

function `getTotalCartAmount` should return the following array

Array ( [total_amount] => 15 [total_price] => 1385.00)

The reason [total_price] => 1385.00 because we take each item from cart of the user, get its [item_price] and [item_amount], multiply them, and do this for all item, then sum up the number to get the result. In this example, the multiplication of array [0] from cart will be 109.00x3=327.00, the next one 109.00x7=763.00, and last one is 59.00x5=295.00. Sum up all number we will get 1385.00. For [total_amount] is 15, very simple, just sum up all the [item_amount] from the cart. You can call getCartItem() function that I just asked you previously and use the result from it.




create another function that accept 4 value, similar to addToCart() function. This function will have a name and recieve the following values updateCartItemQty($userid, $itemid, $variant, $amount). This function should call the function from $this->dbOps->update_data() to update the quantity of the specific record from cart table. updateCartItemQty() function should cconstruct the input for update_data() function. $userid, $itemid, $variant will be used for identify the correct record, and $amount will be the new value to update.


















So I have these 2 product quantity selector from 2 difference page in my website.


This one is from cart page where user can see what are the item in the cart they have.
```html
<!-- cart product qty -->
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
<!-- !cart product qty -->
```


this one is from the product page where user can select the quantity before adding to the cart
```html
<!-- product page qty section -->
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
<!-- !product page qty section -->
```

When user view the product in the cart, I want them to be able to change the value in the quantity selector and it should update the value in the database right away.

This is the JavaScript code for the quantity selector. It respondsible for both quantity selector from 2 difference page. The one from the product page you don't have to make it update anything. Just let it work like that. I just show you and let you know because its machanism also linked with this JS which also work for the one in the cart page.

```js
// Initialize variables to store current selection
let currentSize = 'L';  // Default to 'L' as it's initially selected
let currentQuantity = 1;

function initQuantityControls() {
  $(".quantity-selector").each(function() {
    const $container = $(this);
    const $qty_up = $container.find(".qty-up");
    const $qty_down = $container.find(".qty-down");
    const $qty_input = $container.find(".qty_input");

    function validateQuantity(value) {
      value = parseInt(value);
      if (isNaN(value) || value < 1) return 1;
      if (value > 10) return 10;
      return value;
    }

    function updateQuantity(newValue) {
      let quantity = validateQuantity(newValue);
      $qty_input.val(quantity);
    }

    $qty_up.click(function (e) {
      updateQuantity(parseInt($qty_input.val()) + 1);
    });

    $qty_down.click(function (e) {
      updateQuantity(parseInt($qty_input.val()) - 1);
    });

    $qty_input.on("input", function (e) {
      updateQuantity($(this).val());
    });

    $qty_input.on("blur", function (e) {
      if ($(this).val() === "") {
        updateQuantity(1);
      }
    });
  });
}

function initSizeSelector() {
  let $sizeButtons = $(".size-button");

  $sizeButtons.click(function() {
      $sizeButtons.removeClass('selected');
      $(this).addClass('selected');
      currentSize = $(this).text();
      console.log("Current size:", currentSize);  // Debug log
  });
}

function initAddToCartForm() {
  $("#addToCartForm").submit(function(e) {
    e.preventDefault();
    
    // Ensure the current quantity is set before submitting
    let currentQuantity = $(".qty_input").val();
    $(this).find('input[name="item_amount"]').val(currentQuantity);

    // Ensure the current size is set before submitting
    let currentSize = $(".size-button.selected").text();
    $(this).find('input[name="item_variant"]').val(currentSize);

    console.log("Submitting form with:", {
      size: $(this).find('input[name="item_variant"]').val(),
      quantity: $(this).find('input[name="item_amount"]').val()
    });
  });
}

```

But here is how you can update the database and reload the page. after user update the quantity selector in the cart page. You see these JS below, they are respondsible for update database and reload the cart page


```js
function initCartFunctionality() {
    $(".addToCartForm").on("submit", function (e) {
      e.preventDefault();
      var form = $(this);
      var userId = form.find('input[name="user_id"]').val();
      var itemId = form.find('input[name="item_id"]').val();
      var itemVariant = form.find('input[name="item_variant"]').val();
      var itemAmount = form.find('input[name="item_amount"]').val();
  
      addToCart(userId, itemId, itemVariant, itemAmount);
    });
  
    $(document).on("click", '.deleteFromCartForm button[type="submit"]', function (e) {
      e.preventDefault();
      e.stopPropagation();
  
      var form = $(this).closest("form");
      var userId = form.find('input[name="user_id"]').val();
      var itemId = form.find('input[name="item_id"]').val();
      var itemVariant = form.find('input[name="item_variant"]').val();
      var itemAmount = form.find('input[name="item_amount"]').val();
  
      deleteCartItem(userId, itemId, itemVariant, itemAmount);
    });
  
    // Prevent form submission on enter key
    $(document).on("keypress", ".deleteFromCartForm", function (e) {
      return e.keyCode != 13;
    });
  }
  
  function addToCart(userId, itemId, itemVariant, itemAmount) {
    $.ajax({
      url: "helper_add_to_cart.php",
      method: "POST",
      data: { user_id: userId, item_id: itemId, item_variant: itemVariant, item_amount: itemAmount },
      dataType: "text",
      success: function (responseText) {
        try {
          var data = JSON.parse(responseText);
          if (data.success) {
            showNotification("Item added to cart successfully!", "success");
          } else {
            showNotification("Failed to add item to cart: " + (data.error || "Unknown error"), "error");
          }
        } catch (e) {
          console.error("Failed to parse JSON:", e);
          showNotification("An error occurred while processing the response.", "error");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", status, error);
        showNotification("An error occurred. Please try again.", "error");
      },
    });
  }
  
  function deleteCartItem(userId, itemId, itemVariant, itemAmount) {
    $.ajax({
      url: "helper_delete_from_cart.php",
      method: "POST",
      data: { user_id: userId, item_id: itemId, item_variant: itemVariant, item_amount: itemAmount },
      dataType: "text",
      success: function (responseText) {
        try {
          var data = JSON.parse(responseText);
          if (data.success) {
            showNotification("Item removed from cart successfully!", "success");
            updateCart();
          } else {
            showNotification("Failed to remove item from cart: " + (data.error || "Unknown error"), "error");
          }
        } catch (e) {
          console.error("Failed to parse JSON:", e);
          showNotification("An error occurred while processing the response.", "error");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", status, error);
        showNotification("An error occurred. Please try again.", "error");
      },
    });
  }
  
  function updateCart() {
    $.ajax({
      url: "helper_get_updated_cart.php",
      method: "GET",
      dataType: "html",
      success: function (response) {
        $("#cart").html(response);
      },
      error: function (xhr, status, error) {
        console.error("Error updating cart:", status, error);
        showNotification("Failed to update cart. Please refresh the page.", "error");
      },
    });
    $.ajax({
      url: "helper_get_updated_cart_amount.php",
      method: "GET",
      dataType: "html",
      success: function (response) {
        $("#amount").html(response);
      },
      error: function (xhr, status, error) {
        console.error("Error updating cart:", status, error);
        showNotification("Failed to update cart. Please refresh the page.", "error");
      },
    });
  }
```

You see that there will be a function to perform task like add to cart and dalete from cart, and below will be updateCart() function. In this task I am asking you to do, I think you would have to create another function to update the cart and then call updateCart() function to reload the cart.

Now another part, I will give example from the function deleteCartItem(). You see that it call ajax function with the "helper_delete_from_cart.php". Here is what this file looks like

```php
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('function.php');


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    try {
        $result = $cart->deleteFromCart($_POST['user_id'], $_POST['item_id'], $_POST['item_variant']);
        
        header('Content-Type: application/json');
        echo json_encode(['success' => $result]);
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
    exit;
} else {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
    exit;
};

```

you see it call `deleteFromCart($_POST['user_id'], $_POST['item_id'], $_POST['item_variant'])` function with 3 value. These 3 values are important to identify the correct record in the card to update the quantity.


but in case of an update, you will have to call updateCartItemQty() function which work like this.

```php
public function updateCartItemQty($userid, $itemid, $variant, $amount): bool {
    try {
        $table = 'cart';
        $columns_to_update = ['item_amount'];
        $data_to_update = [[$amount]];
        $columns_to_check_condition = ['user_id', 'item_id', 'item_variant'];
        $data_to_check_condition = [$userid, $itemid, $variant];

        $rows_updated = $this->dbOps->update_data(
            $table,
            $columns_to_update,
            $data_to_update,
            $columns_to_check_condition,
            $data_to_check_condition
        );

        if ($rows_updated > 0) {
            error_log("[CART] Successfully updated item quantity in cart for user $userid, item $itemid, variant $variant");
            return true;
        } else {
            error_log("[CART] Failed to update item quantity in cart for user $userid, item $itemid, variant $variant. Item may not exist.");
            return false;
        }
    } catch (Exception $e) {
        error_log("[CART] Error updating cart item quantity: " . $e->getMessage());
        return false;
    }
}
```

When you give me the code for this task, you don't have to provide everything to make it a complete file, but just tell me the part of the code that I have to put in the project.




























1. Add login and register page
2. cookies and sessions
3. dynamic form for register page
4. Implement client-side validation using JavaScript. (for user session?)
5. Advanced form validation and error handling.
6. User authentication (registration/login system) using sessions or cookies.