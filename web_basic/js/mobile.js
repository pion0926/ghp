$(document).ready(function() {
    // Automatically trigger PC version for mobile users
    if (window.innerWidth <= 768) {
        desktopMode();
    }

    // Mobile menu toggle
    $('.mobile-menu-toggle').on('click', function() {
        $(this).toggleClass('active');
        $('.navList').slideToggle(300);
    });

    // Close mobile menu when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.navList, .mobile-menu-toggle').length) {
            $('.navList').slideUp(300);
            $('.mobile-menu-toggle').removeClass('active');
        }
    });

    // Handle window resize
    $(window).on('resize', function() {
        if ($(window).width() > 768) {
            $('.navList').show();
            $('.mobile-menu-toggle').removeClass('active');
        }
    });

    // Initialize Slick slider for mobile
    if ($(window).width() <= 768) {
        $('.mainBannerBox').slick({
            dots: true,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000
        });
    }

    // Handle mobile form submission
    $('.newsLetterForm form').on('submit', function(e) {
        if ($(window).width() <= 768) {
            e.preventDefault();
            // Add mobile-specific form validation here
            // You can add additional validation or modify the existing one
            newsApplywrite();
        }
    });
}); 