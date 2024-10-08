$(document).ready(function () {
  initAllModules();
});

function initAllModules() {
  if (typeof window.initCarousels === 'function') {
    window.initCarousels();
  } else {
    console.error('Carousel module not loaded');
  }

  if (typeof window.initIsotopeFilter === 'function') {
    window.initIsotopeFilter();
  } else {
    console.error('Isotope module not loaded');
  }

  if (typeof window.initQuantityControls === 'function') {
    window.initQuantityControls();
  } else {
    console.error('Quantity module not loaded');
  }

  if (typeof window.initSizeSelector === 'function') {
    window.initSizeSelector();
  } else {
    console.error('Quantity module not loaded');
  }

  if (typeof window.initAddToCartForm === 'function') {
    window.initAddToCartForm();
  } else {
    console.error('Quantity module not loaded');
  }

  if (typeof window.initCartFunctionality === 'function') {
    window.initCartFunctionality();
  } else {
    console.error('Cart module not loaded');
  }

  if (typeof window.initLoginFunctionality === 'function') {
    window.initLoginFunctionality();
  } else {
    console.error('Login module not loaded');
  }

  if (typeof window.initScrollFunctionality === 'function') {
    window.initScrollFunctionality();
  } else {
    console.error('Scroll module not loaded');
  }

  initSizeSelection();
  initScrollFunctionality()
}

function initSizeSelection() {
  $(".size-button").on("click", function () {
    $(".size-button").removeClass("selected");
    $(this).addClass("selected");
  });
}