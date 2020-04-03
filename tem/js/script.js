$(document).ready(function () {


    if(!isMobile.any){

        $(".btn_menu_mobile").css("display","none");
        $(".header_bottom .box_h_bottom").css("display","block");

    } else {

        $(".btn_menu_mobile").css("display","block");
        $(".header_bottom .box_h_bottom").css("display","none");
    }


    multi_menu();


    $(".wrapper").click( function () {
        if($(this).hasClass('background_night')){
            close_menu()
        }
    });

    $(".close_menu").click( function () {
        close_menu();
    });


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


!function(a){var b=/iPhone/i,c=/iPod/i,d=/iPad/i,e=/(?=.*\bAndroid\b)(?=.*\bMobile\b)/i,f=/Android/i,g=/(?=.*\bAndroid\b)(?=.*\bSD4930UR\b)/i,h=/(?=.*\bAndroid\b)(?=.*\b(?:KFOT|KFTT|KFJWI|KFJWA|KFSOWI|KFTHWI|KFTHWA|KFAPWI|KFAPWA|KFARWI|KFASWI|KFSAWI|KFSAWA)\b)/i,i=/IEMobile/i,j=/(?=.*\bWindows\b)(?=.*\bARM\b)/i,k=/BlackBerry/i,l=/BB10/i,m=/Opera Mini/i,n=/(CriOS|Chrome)(?=.*\bMobile\b)/i,o=/(?=.*\bFirefox\b)(?=.*\bMobile\b)/i,p=new RegExp("(?:Nexus 7|BNTV250|Kindle Fire|Silk|GT-P1000)","i"),q=function(a,b){return a.test(b)},r=function(a){var r=a||navigator.userAgent,s=r.split("[FBAN");return"undefined"!=typeof s[1]&&(r=s[0]),s=r.split("Twitter"),"undefined"!=typeof s[1]&&(r=s[0]),this.apple={phone:q(b,r),ipod:q(c,r),tablet:!q(b,r)&&q(d,r),device:q(b,r)||q(c,r)||q(d,r)},this.amazon={phone:q(g,r),tablet:!q(g,r)&&q(h,r),device:q(g,r)||q(h,r)},this.android={phone:q(g,r)||q(e,r),tablet:!q(g,r)&&!q(e,r)&&(q(h,r)||q(f,r)),device:q(g,r)||q(h,r)||q(e,r)||q(f,r)},this.windows={phone:q(i,r),tablet:q(j,r),device:q(i,r)||q(j,r)},this.other={blackberry:q(k,r),blackberry10:q(l,r),opera:q(m,r),firefox:q(o,r),chrome:q(n,r),device:q(k,r)||q(l,r)||q(m,r)||q(o,r)||q(n,r)},this.seven_inch=q(p,r),this.any=this.apple.device||this.android.device||this.windows.device||this.other.device||this.seven_inch,this.phone=this.apple.phone||this.android.phone||this.windows.phone,this.tablet=this.apple.tablet||this.android.tablet||this.windows.tablet,"undefined"==typeof window?this:void 0},s=function(){var a=new r;return a.Class=r,a};"undefined"!=typeof module&&module.exports&&"undefined"==typeof window?module.exports=r:"undefined"!=typeof module&&module.exports&&"undefined"!=typeof window?module.exports=s():"function"==typeof define&&define.amd?define("isMobile",[],a.isMobile=s()):a.isMobile=s()}(this);


