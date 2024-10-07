function initCarousels() {
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
        0: { items: 1 },
        600: { items: 3 },
        1000: { items: 5 },
      },
    });
  
    // new menu owl carousel
    $("#new-menu .owl-carousel").owlCarousel({
      loop: true,
      nav: false,
      dots: true,
      autoplay: true,
      autoplayTimeout: 5000,
      responsive: {
        0: { items: 1 },
        600: { items: 3 },
        1000: { items: 5 },
      },
    });
  
    // blogs owl carousel
    $("#blogs .owl-carousel").owlCarousel({
      loop: true,
      nav: false,
      dots: true,
      responsive: {
        0: { items: 1 },
        600: { items: 3 },
      },
    });
  }