$(document).ready(function () {
  $('.password-toggle').click(function() {
    var passwordField = $(this).siblings('.password-field');
    var eyeIcon = $(this).find('.fa-eye');
    var eyeSlashIcon = $(this).find('.fa-eye-slash');
    
    if (passwordField.attr('type') === 'password') {
    passwordField.attr('type', 'text');
    eyeIcon.show();
    eyeSlashIcon.hide();
    } else {
    passwordField.attr('type', 'password');
    eyeIcon.hide();
    eyeSlashIcon.show();
    }
  });

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

});
