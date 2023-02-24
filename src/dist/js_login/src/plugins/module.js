    /* ---------------------------------------------
    Navigation menu
    --------------------------------------------- */
    // dropdown for mobile
    $(document).ready(function () {
        checkWidth(true);
        $(window).resize(function () {
            checkWidth(false);
        });
    });

    function checkWidth(init) {
        // If browser resized, check width again 
        if ($(window).width() <= 991) {
            $('.dropdown-submenu a').on("click", function (e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
            });
            $('.navbar-nav > .nav-item > .nav-link').on("click", function (e) {
                $(".navbar").removeClass("active");
                $(".navbar-toggler-icon").removeClass("active");
                $("body").removeClass("offcanvas--open");
            });    
        }
    }

    function navMenu() {

        // main menu toggleer icon (Mobile site only)
        $('[data-toggle="navbarToggler"]').click(function () {
            $('.navbar').toggleClass('active');
            $('body').toggleClass('offcanvas--open');
        });
        // main menu toggleer icon 
        $('.navbar-toggler').click(function (e) {
            $('.navbar-toggler-icon').toggleClass('active');
            e.stopPropagation();
            // e.preventDefault();

        });

        // Navbar moved up
        var $stickyNav = $(".navbar-sticky");
        
        // Close on outside cick
        $('body').on("click", function () {
            $('.navbar').removeClass('active');
            $('.navbar-toggler-icon').removeClass('active');
            $('body').removeClass('offcanvas--open');
        });
        $('body').on("click",".navbar-inner", function () {
            e.stopPropagation();
            e.preventDefault();
        });

        $(window).on("scroll load", function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 120) {
                $stickyNav.addClass("navbar-sticky--moved-up");
            } else {
                $stickyNav.removeClass("navbar-sticky--moved-up");
            }
            // apply transition
            if (scroll >= 250) {
                $stickyNav.addClass("navbar-sticky--transitioned");
            } else {
                $stickyNav.removeClass("navbar-sticky--transitioned");
            }
            // sticky on
            if (scroll >= 500) {
                $stickyNav.addClass("navbar-sticky--on");
            } else {
                $stickyNav.removeClass("navbar-sticky--on");
            }

        });
    }
    navMenu();

/* ---------------------------------------------
CountDown
--------------------------------------------- */
function countDown() {
    var second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    var xPdate = $("#date").data("date");
    var countDown = new Date(xPdate).getTime(),
        x = setInterval(function () {
            var now = new Date().getTime(),
                distance = countDown - now;
            var cDays = document.getElementById("days");
            if (cDays) {
                (document.getElementById("days").innerText = addZero(Math.floor(distance / day)),
                    (document.getElementById("hours").innerText = addZero(Math.floor(
                        (distance % day) / hour
                    ), 2))),
                (document.getElementById("minutes").innerText = addZero(Math.floor(
                    (distance % hour) / minute
                ), 2)),
                (document.getElementById("seconds").innerText = addZero(Math.floor(
                    (distance % minute) / second
                ), 2));
            }
        }, second);
}

function addZero(your_number, length) {
    var num = '' + your_number;
    while (num.length < length) {
        num = '0' + num;
    }
    return num;
}
countDown();
