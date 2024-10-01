$(document).ready(function () {
  // banner owl carousel
  $("#banner-area .owl-carousel").owlCarousel({
    loop: true,
    dots: true,
    items: 1,
    autoplay: true,
    autoplayTimeout: 5000,
  });

  // top sale owl carousel
  $("#top-sale .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 5000,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  // isotope filter
  var $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    layoutMode: "fitRows",
  });

  // filter items on button click
  $(".button-group").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({ filter: filterValue });
  });

  // new menu owl carousel
  $("#new-menu .owl-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 5000,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  // blogs owl carousel
  $("#blogs .owl-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
    },
  });

  // product qty section
  let $qty_up = $(".qty-up");
  let $qty_down = $(".qty-down");
  let $qty_input = $(".qty_input");

  // Function to ensure value is within 1-10 range
  function validateQuantity(value) {
      value = parseInt(value);
      if (isNaN(value) || value < 1) return 1;
      if (value > 10) return 10;
      return value;
  }

  // click on qty up button
  $qty_up.click(function(e) {
      let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
      let currentVal = validateQuantity($input.val());
      if (currentVal < 10) {
          $input.val(currentVal + 1);
      }
  });

  // click on qty down button
  $qty_down.click(function(e) {
      let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
      let currentVal = validateQuantity($input.val());
      if (currentVal > 1) {
          $input.val(currentVal - 1);
      }
  });

  // Handle direct input
  $qty_input.on('input', function(e) {
      let inputVal = $(this).val();
      if (inputVal !== '') {
          let validatedVal = validateQuantity(inputVal);
          $(this).val(validatedVal);
      }
  });

  // Ensure valid value on blur
  $qty_input.on('blur', function(e) {
      let inputVal = $(this).val();
      if (inputVal === '') {
          $(this).val(1);
      } else {
          let validatedVal = validateQuantity(inputVal);
          $(this).val(validatedVal);
      }
  });

  $('.size-button').on('click', function() {
    $('.size-button').removeClass('selected');
    $(this).addClass('selected');
  });

  






  $('.addToCartForm').on('submit', function(e) {
    e.preventDefault();

    var form = $(this);
    var userId = form.find('input[name="user_id"]').val();
    var itemId = form.find('input[name="item_id"]').val();

    $.ajax({
        url: 'add_to_cart.php',
        method: 'POST',
        data: {
            user_id: userId,
            item_id: itemId
        },
        dataType: 'text', 
        success: function(responseText) {
          console.log('Raw response:', responseText);
          
          try {
              var data = JSON.parse(responseText);
              if (data.success) {
                  showNotification('Item added to cart successfully!', 'success');
                  // You can add more actions here, like updating the cart count
              } else {
                  showNotification('Failed to add item to cart: ' + (data.error || 'Unknown error'), 'error');
              }
          } catch (e) {
              console.error('Failed to parse JSON:', e);
              showNotification('An error occurred while processing the response.', 'error');
          }
      },
      error: function(xhr, status, error) {
          console.error('AJAX Error:', status, error);
          console.log('Response Text:', xhr.responseText);
          showNotification('An error occurred. Please try again.', 'error');
      }
    });
});

var notificationCount = 0;
var notifications = [];

function showNotification(message, type = 'success') {
    var backgroundColor, borderColor, icon;
    if (type === 'success') {
        backgroundColor = '#4CAF50';
        borderColor = '#45a049';
        icon = '✓';
    } else {
        backgroundColor = '#f44336';
        borderColor = '#da190b';
        icon = '✕';
    }

    var notification = $('<div></div>')
        .html(`<strong style="margin-right: 10px;">${icon}</strong><span>${message}</span>`)
        .css({
            position: 'fixed',
            top: '-100px',
            right: '20px',
            padding: '15px 20px',
            backgroundColor: backgroundColor,
            color: 'white',
            borderRadius: '5px',
            boxShadow: '0 4px 8px rgba(0,0,0,0.2)',
            zIndex: 9999,
            display: 'flex',
            alignItems: 'center',
            fontFamily: 'Arial, sans-serif',
            fontSize: '16px',
            opacity: 0,
            transition: 'all 0.5s ease',
            border: `2px solid ${borderColor}`,
            maxWidth: '300px',
            wordWrap: 'break-word'
        })
        .appendTo('body');

    notifications.push(notification);

    // Remove excess notifications
    while (notifications.length > 5) {
        var oldNotification = notifications.shift();
        oldNotification.remove();
    }

    // Position notifications
    repositionNotifications();

    setTimeout(function() {
        notification.css({
            opacity: 1
        });
    }, 100);

    setTimeout(function() {
        notification.css({
            opacity: 0
        });
        setTimeout(function() {
            var index = notifications.indexOf(notification);
            if (index > -1) {
                notifications.splice(index, 1);
            }
            notification.remove();
            repositionNotifications();
        }, 500);
    }, 5000);
}

function repositionNotifications() {
    var topOffset = 20;
    notifications.forEach(function(notification, index) {
        notification.css({
            top: topOffset + 'px'
        });
        topOffset += notification.outerHeight() + 10; // 10px gap between notifications
    });
}

});
