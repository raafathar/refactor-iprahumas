$(function () {
    // =================================
    // Fixed header
    // =================================
    window.addEventListener("scroll", function () {
        var topbar = document.querySelector(".header-fp");
        if (topbar) {
            if (window.scrollY >= 60) {
                topbar.classList.add("header-sticky");
            } else {
                topbar.classList.remove("header-sticky");
            }
        }
    });

    // Get the element
    let topBtn = document.querySelector(".top-btn");

    // On Click, Scroll to the page's top, replace 'smooth' with 'instant' if you don't want smooth scrolling
    topBtn.onclick = () => window.scrollTo({ top: 0, behavior: "smooth" });

    // On scroll, Show/Hide the btn with animation
    window.onscroll = () => topBtn.style.opacity = window.scrollY > 500 ? 1 : 0;

    $('.leadership-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        margin: 30,
        navText: [
            '<i class="ti ti-arrow-left fs-7 round-48 hstack justify-content-center bg-primary-subtle rounded-circle"></i>',  // Previous button
            '<i class="ti ti-arrow-right fs-7 round-48 hstack justify-content-center bg-primary-subtle rounded-circle"></i>'  // Next button
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            992: {
                items: 3
            },
            1024: {
                items: 4
            }
        }
    })

    $(".date-event-carousel").owlCarousel({
        nav: false,
        dots: true,
        loop: false,
        margin: 20,
        responsive: {
        0: {
            items: 3,
            loop: false,
        },
        576: {
            items: 3,
            loop: false,
        },
        768: {
            items: 4,
            loop: false,
        },
        1200: {
            items: 6,
            loop: false,
        },
        1400: {
            items: 8,
            loop: false,
        },
        },
    });

    $('.testimonial-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: [
            '<i class="ti ti-chevron-left fs-4 round-32 hstack justify-content-center bg-primary-subtle rounded-circle"></i>',  // Previous button
            '<i class="ti ti-chevron-right fs-4 round-32 hstack justify-content-center bg-primary-subtle rounded-circle"></i>'  // Next button
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    $(document).on('click', '.header-fp .navbar-nav .nav-link', function(){
        $(this).addClass('active').siblings().removeClass('active')
    })
    
});