function initScrollFunctionality() {
    var isScrolling = false;

    function smoothScroll(target) {
        var $target = $(target);
        if ($target.length) {
            isScrolling = true;
            $('html, body').animate({
                scrollTop: $target.offset().top
            }, {
                duration: 1000,
                easing: 'swing',
                complete: function() {
                    isScrolling = false;
                    window.location.hash = target;
                }
            });
        }
    }

    $(document).on('click', 'a[href^="#"]', function(event) {
        event.preventDefault();
        var target = this.hash;
        smoothScroll(target);
    });

    // Allow manual scroll override
    $(window).on('wheel touchmove', function() {
        if (isScrolling) {
            isScrolling = false;
            $('html, body').stop();
        }
    });

    // Handle initial page load with hash
    if (window.location.hash) {
        setTimeout(function() {
            smoothScroll(window.location.hash);
        }, 500);
    }

    // Fallback for dynamically loaded content
    $(window).on('load', function() {
        if (window.location.hash) {
            smoothScroll(window.location.hash);
        }
    });
}