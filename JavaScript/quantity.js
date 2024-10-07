// Initialize variables to store current selection
let currentSize = 'L';  // Default to 'L' as it's initially selected
let currentQuantity = 1;

function initQuantityControls() {
  $(".quantity-selector").each(function() {
    const $container = $(this);
    const $qty_up = $container.find(".qty-up");
    const $qty_down = $container.find(".qty-down");
    const $qty_input = $container.find(".qty_input");
    const isCartPage = $container.closest('.quantity-selector-container').find('.deleteFromCartForm').length > 0;

    function validateQuantity(value) {
      value = parseInt(value);
      if (isNaN(value) || value < 1) return 1;
      if (value > 10) return 10;
      return value;
    }

    function updateQuantity(newValue) {
      let quantity = validateQuantity(newValue);
      $qty_input.val(quantity);
      
      if (isCartPage) {
        updateCartItemQuantity($container);
      }
    }

    $qty_up.click(function (e) {
      e.preventDefault();
      updateQuantity(parseInt($qty_input.val()) + 1);
    });

    $qty_down.click(function (e) {
      e.preventDefault();
      updateQuantity(parseInt($qty_input.val()) - 1);
    });

    $qty_input.on("change", function (e) {
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
