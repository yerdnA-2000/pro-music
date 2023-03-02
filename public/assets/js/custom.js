$(document).ready(function () {

/* ===================================
    application form submit
    ====================================== */
    $('.ajax-form-default-js').submit(function (event) {
        var json;
        event.preventDefault();
        var form = $(this);
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.url) {
                    window.location.href = response.url;
                } else {
                    $('#application-modal-js').modal('show');
                    $('.modal-status-js').addClass('modal-status--' + response.status);
                    $('.modal__title-js').text(response.message);
                    $('.modal__body-js').text(response.desc);
                    form.find("input, textarea").val("");
                }
            },
            error: function () {
                $('#application-modal-js').modal('show');
                $('.modal-status-js').addClass('modal-status--error');
                $('.modal__title-js').text('Неизвестная ошибка');
                $('.modal__body-js').text('Произошла неизвестная ошибка. Повторите попытку или обратитесь в службу поддержки.');
            }
        });
    });
});

$(document).ready(function(){

/* ===================================
    toggle menu
    ====================================== */

    $(document).on("click", function(event){
        if($(event.target).closest(".toggle-menu-js").length){
            $(".header__navbar-collapse-js").toggleClass("static");
            $('.header-navbar__toggle-menu-js').toggleClass("static");
        } else if(!$(event.target).closest(".toggle-menu-js").length){
            $(".header__navbar-collapse-js").removeClass("static");
            $(".header-navbar__toggle-menu-js").removeClass("static");
        }
    });

});



/* ===================================
   header menu Active class
   ====================================== */

$(document).ready(function () {
    $(document).on("scroll", onScroll);

    //smoothscroll
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");

        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+1
        }, 300, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });


});

function onScroll(event){
    var currentScrollPos = $(document).scrollTop();
    $('.header__navbar-collapse-js ul li a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= currentScrollPos+1 && refElement.position().top + refElement.height() > currentScrollPos+1) {
            $('.header__navbar-collapse-js ul li a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}


/* review slider */
    var swiper = new Swiper(".review__slider", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      speed: 900,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    breakpoints: {
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 2,
        },
    },
});

/* ===================================
AOS Animation
====================================== */
AOS.init({
    once: true,
    disable:  function() {
        var maxWidth = 767;
        return window.innerWidth < maxWidth;
    }
});

/* ===================================
    Loading Timeout
    ====================================== */

$(window).on("load", function() {
    $('.preloader').fadeOut();
});


/* ===================================
    bottom-top scroll
    ====================================== */

!function(o){
    "use strict";
    o(document).ready(function(){
        function t(){var t=o(window).scrollTop(),e=o(document).height()-o(window).height();
            r.style.strokeDashoffset=n-t*n/e}var r=document.querySelector(".scroll-top path"),n=r.getTotalLength();
        r.style.transition=r.style.WebkitTransition="none",
            r.style.strokeDasharray=n+" "+n,r.style.strokeDashoffset=n,
            r.getBoundingClientRect(),
            r.style.transition=r.style.WebkitTransition="stroke-dashoffset 10ms linear",
            t(),
            o(window).scroll(t);
        $(window).on("scroll",function(){
            50<$(this).scrollTop()?$(".scroll-top").addClass("active"):
                $(".scroll-top").removeClass("active")}),
            $(".scroll-top").on("click",function(t){return t.preventDefault(),
                $("html, body").animate({
                    scrollTop:0
                },50),!1
            })
    })
}(jQuery)

