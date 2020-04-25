$(document).ready(function () {

    multi_menu();


$(".btn_search").click(function(){

    check = $(".right_h_bottom .box_form").hasClass("active");

    if(check){

        $(".right_h_bottom .box_form").removeClass("active");
       

    } else {
        $(".right_h_bottom .box_form").addClass("active");
    }
    return false;
})

 $(".right_h_bottom .box_form , .btn_search").click(function(e){
        e.stopPropagation();
  });


  $("body").click(function(){

    $(".right_h_bottom .box_form").removeClass("active");

  })



    $(".btn_menu_mobile").click(function(e){
        e.stopPropagation();
    });

    $(".btn_menu_mobile").click(function(e){

        $(".mobile-menu-area").addClass("show_menu_mobile");
        $(".wrapper").addClass("background_night");
        $("html , body").css("overflow-y","hidden");

    });


    $('.search_open').on('click', function(){
        $('.search-inside').fadeIn();
        return false
    });

    $('.search-close').on('click', function(){
        $('.search-inside').fadeOut();
        return false
    });


    $(".has_child_mobile").append( "<i class='fa fa-angle-down show_menu'></i>" );


    $(".show_menu").click(function(){

        var check = $(this).siblings("ul.list_child_mobile").css("display");


        if(check=="block"){

            $(this).removeClass('rote');
            $(this).siblings("ul.list_child_mobile").slideToggle();


        } else {


            $(this).addClass('rote');
            $(this).siblings("ul.list_child_mobile").slideToggle();

        }



    });




    $('.slider_service').slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        autoplaySpeed:2000,
        autoplay: true,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 3,


                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,

                }
            },
             {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,

                }
            },
             {
                breakpoint: 380,
                settings: {
                    slidesToShow: 1,

                }
            }

        ]


    });


    $(".slider_accessories").slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        autoplaySpeed:2000,
        autoplay: false,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 3,


                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,

                }
            },
             {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,

                }
            },
             {
                breakpoint: 380,
                settings: {
                    slidesToShow: 1,

                }
            }

        ]


    });


    $(".slider_bestselling").slick({
        dots: false,
        infinite: true,
        slidesToShow: 3,
        autoplaySpeed:2000,
        autoplay: false,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 3,


                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,

                }
            },
             {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,

                }
            },
             {
                breakpoint: 380,
                settings: {
                    slidesToShow: 1,

                }
            }

        ]


    });



    $('.list_album').slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        autoplaySpeed:3000,
        autoplay: true,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    arrows:false

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrows:false
                }
            }

        ]


    });


    $('.slider_article').slick({
        dots: false,
        infinite: true,
        slidesToShow: 3,
        autoplaySpeed:2000,
        autoplay: false,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,


                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,

                }
            }

        ]


    });



    $('.slider_partner').slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        autoplaySpeed:2000,
        autoplay: true,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:false,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    arrows:false

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrows:false
                }
            }

        ]


    });


    $('.slider_product').slick({
        dots: false,
        infinite: true,
        slidesToShow: 3,
        autoplaySpeed:2000,
        autoplay: true,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    arrows:false

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrows:false
                }
            }

        ]


    });

    $('.slider_related').slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        autoplaySpeed:2000,
        autoplay: true,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,
                    arrows:true

                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    arrows:false
                }
            }

        ]


    });

    $('.slider_product_right').slick({
        dots: false,
        infinite: true,
        slidesToShow: 1,
        autoplaySpeed:2000,
        autoplay: true,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    arrows:false

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    arrows:false
                }
            }

        ]


    });

    $('.blog_slider').slick({

        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 800,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }

        ]
    });


    $('.main_slider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        autoplaySpeed:3000,
        autoplay: true,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:false,
        fade:true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 990,
                settings: {
                    arrows:false,
                    dots: false,
                }
            }

        ]

    });


    $('.slider_product_detail').slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        autoplaySpeed:10000,
        slidesToScroll: 3,
        autoplay: true,
        pauseOnHover:false,
        focusOnSelect: false,
        arrows:true,
        fade:false,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 800,
                settings: {
                    arrows:false,
                    slidesToShow: 2,
                    dots: false
                }
            }


        ]



    });



    $('.slider_testimonial').slick({
        dots: true,
        infinite: true,
        speed: 1000,
        slidesToShow: 2,
        slidesToScroll: 2,
        autoplay: false,
        autoplaySpeed: 3000,
        arrows:false,
        pauseOnHover:false,
        responsive: [

            {
                breakpoint: 980,
                settings: {
                    slidesToShow: 1,
                    arrows:false
                }
            }

        ]
    });


   

    var slider_for = $('.slider-for').slick({

        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'

    });


    var slider_nav = $('.slider-nav').slick({

        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        fade:false,
        infinite:true,
        focusOnSelect: true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 375,
                settings: {
                    slidesToShow: 2,

                }
            }

        ]

    }).on('afterChange', function(event, slick, currentSlide, nextSlide){

        var code = $(".slider-nav .slick-slide.slick-current").attr("data-idModel");
        var model = $(".slider-nav .slick-slide.slick-current").attr("data-Model");
        $(".text_model").html(model);
        $(".id_model").val(code);
        $(".model").val(model);
    });





    $(".menu_cat .has_child_cat").append( "<i class='fa fa-plus show_menu_cat'></i>" );

    $(".show_menu_cat").click(function(){

        var check = $(this).siblings("ul.list_child_cat").css("display");

        if(check=="block"){

            $(this).removeClass("fa-times").addClass('fa-plus');

        } else {
            $(this).addClass("fa-times").removeClass('fa-plus');

        }

        $(this).siblings("ul.list_child_cat").slideToggle();

    });


    $('[data-fancybox="images"]').fancybox({
        buttons : [
            'slideShow',
            'share',
            'zoom',
            'fullScreen',
            'close'
        ],
        thumbs : {
            autoStart : true
        }
    });


    $(".control_tab li").on("click",function () {

        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        var href = $(this).find('a').attr("href");
        if(href){
            $(href).addClass("active");
            $(href).siblings('.tab.active').removeClass('active');
            return false;
        }else {

            return false;
        }
    })


    var width_screen = $(window).width();


    if(width_screen<990) {

        $(".tab_main").append('<i class=\"fa fa-bars menu_tab\" aria-hidden=\"true\"></i>');

        $(".menu_tab").click(function () {
            if ($(this).hasClass('fa-bars')) {
                $(this).removeClass("fa-bars").addClass("fa-window-close-o");
                $(this).siblings(".control_tab").addClass("show_tab");
            } else {
                $(this).removeClass("fa-window-close-o").addClass("fa-bars");
                $(this).siblings(".control_tab").removeClass("show_tab");
            }
        });
    }




    var position = $(window).scrollTop();

    $(window).scroll(function() {

        var scroll = $(window).scrollTop();

        if(scroll<150){
            $('.scrollup').fadeOut();
            return;
        }

        if(scroll > position) {
            $('.scrollup').fadeOut();

        } else {

            $('.scrollup').fadeIn();
        }
        position = scroll;

    });

    $(".quick_view_video").click(function () {

        var  id = $(this).attr("data-youtube");
        var src_new = "https://www.youtube.com/embed/"+id;
        $("#iframe_youtube").attr("src",src_new );

    });




    $('.scrollup').click(function () {

        $('body,html').animate({
            scrollTop: 0
        }, 400);
        return false;

    });



    $(".loading").css("display","none");


});


function  set_menu(width_child,class_container,class_child) {

    $(class_container + ">li").each(function(e) {

        var w_window = $(window).width();
        var offset_project = $(this).offset();
        var left_offset_project = offset_project.left;
        if($(this).children(".menu_child").width() && (left_offset_project + $(this).children(".menu_child").width())>w_window)
        {$(this).children(".menu_child").css("left","inherit").css("right","0px");}

        $(this).find(".projects_menu").each(function (i) {

            var width_this = $(this).width()/2;
            var check = w_window - (left_offset_project + width_this);

            if(check<0){

                $(this).css("left", -(width_this-check+30));

            } else if(left_offset_project >= width_this) {

                $(this).css("left", - width_this);

            } else if (left_offset_project < width_this) {

                $(this).css("left", - (left_offset_project -30) );

            }

        });

        var left = 0;
        $(this).find(class_child).each(function (i) {
            var off = $(this).offset();

            if(i == 0 || left < off.left){
                left = off.left;
            }
        });

        var sum = width_child*2 + left  ;
        if (sum > w_window) {
            $(this).find(class_child).addClass('has_child_exception');
        }

    });

}

function multi_menu() {
    if($(window).width() >= 991) {

        var class_container = '.tree_parent';
        var class_child = '.has_child';

        if ($(class_container).find(class_child).length) {

            set_menu($(class_child + '> ul').width(),class_container,class_child);

        }
    }
}



function close_menu() {
    $(".mobile-menu-area").removeClass("show_menu_mobile");
    $(".wrapper").removeClass("background_night");
    $("html,body").css("overflow-y","auto");
}

