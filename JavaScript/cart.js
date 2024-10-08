function initCartFunctionality() {
    $(".addToCartForm").on("submit", function (e) {
      e.preventDefault();
      var form = $(this);
      var userId = form.find('input[name="current_user"]').val();
      var itemId = form.find('input[name="item_id"]').val();
      var itemVariant = form.find('input[name="item_variant"]').val();
      var itemAmount = form.find('input[name="item_amount"]').val();
  
      addToCart(userId, itemId, itemVariant, itemAmount);
    });
  
    $(document).on("click", '.deleteFromCartForm button[type="submit"]', function (e) {
      e.preventDefault();
      e.stopPropagation();
  
      var form = $(this).closest("form");
      var userId = form.find('input[name="current_user"]').val();
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
      url: "php_template/helpers/helper_add_to_cart.php",
      method: "POST",
      data: { current_user: userId, item_id: itemId, item_variant: itemVariant, item_amount: itemAmount },
      dataType: "text",
      success: function (responseText) {
        try {
          console.log(responseText);
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
      url: "php_template/helpers/helper_delete_from_cart.php",
      method: "POST",
      data: { current_user: userId, item_id: itemId, item_variant: itemVariant, item_amount: itemAmount },
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

  function updateCartItemQuantity($container) {
    const $form = $container.closest('.quantity-selector-container').find('.deleteFromCartForm');
    const userId = $form.find('input[name="current_user"]').val();
    const itemId = $form.find('input[name="item_id"]').val();
    const itemVariant = $form.find('input[name="item_variant"]').val();
    const itemAmount = $container.find('.qty_input').val();
  
    console.log("Updating cart item:", { userId, itemId, itemVariant, itemAmount });
  
    $.ajax({
      url: "php_template/helpers/helper_update_cart_quantity.php",
      method: "POST",
      data: { current_user: userId, item_id: itemId, item_variant: itemVariant, item_amount: itemAmount },
      dataType: "json",
      success: function(response) {
        console.log("Update response:", response);
        if (response.success) {
          showNotification(response.message, "success");
          updateCart();
        } else {
          showNotification("Failed to update cart: " + (response.error || "Unknown error"), "error");
        }
      },
      error: function(xhr, status, error) {
        console.error("AJAX Error:", status, error);
        showNotification("An error occurred. Please try again.", "error");
      }
    });
  }
  
  function updateCart() {
    $.ajax({
      url: "php_template/helpers/helper_get_updated_cart.php",
      method: "GET",
      dataType: "html",
      success: function (response) {
        $("#cart").html(response);
        initQuantityControls(); // Reinitialize quantity controls
      },
      error: function (xhr, status, error) {
        console.error("Error updating cart:", status, error);
        showNotification("Failed to update cart. Please refresh the page.", "error");
      },
    });
    $.ajax({
      url: "php_template/helpers/helper_get_updated_cart_amount.php",
      method: "GET",
      dataType: "html",
      success: function (response) {
        $("#amount").html(response);
      },
      error: function (xhr, status, error) {
        console.error("Error updating cart amount:", status, error);
        showNotification("Failed to update cart amount. Please refresh the page.", "error");
      },
    });
  }