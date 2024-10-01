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