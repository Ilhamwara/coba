$(function(){
    var $toUp = $('.up');
    var scrollTop = $(window).scrollTop();
    
    $(window).on('scroll', function() {
      
        scrollTop = $(window).scrollTop();
    
        if(scrollTop > 0) {
            $toUp.addClass('up--visible')
        } else {
            $toUp.removeClass('up--visible')
        }
        if(scrollTop > 0 && !$('.js-topmenu').hasClass('top-menu--fixed') ) {
            
            $('.js-topmenu').addClass('top-menu--fixed');

        } else if(scrollTop == 0 && $('.js-topmenu').hasClass('top-menu--fixed') ) {
                $('.js-topmenu').removeClass('top-menu--fixed');
        }

    })

    $toUp.on('click touch', function(e) {

      e.preventDefault();
      $("html, body").animate({ scrollTop: 0 });

    })
    $('.scrollto-club').on('click touch', function() {
        $('.club-form').show();
    })
    
    $('.scrollto').on('click touch', function(e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: $($(this).data('scrollto')).offset().top - 100 });
    })

    function browserCanAnimate() {
        var animation = false,
            elm = document.createElement('div');

        if( elm.style.animationName !== undefined ) {
            $('body').removeClass('non-animation')
        }
    }
    browserCanAnimate();

    $('.show-menu').on('click touch', function() {
        if(!$(this).hasClass('show-menu--dashboard')) {
            $('.top-menu').toggleClass('mobile-menu');
        }

    })
    $('.show-menu--dashboard').on('click touch', function() {
        $('.dashboard-menu').toggle();
        $('.dashboard-nav').toggleClass('dashboard-nav--active');

    })
    if($('.tab-inv').length)
    $('.tab-inv').on('show.bs.tab', function (e) {
        $('.btn--buyinv').html($('.btn--buyinv').data('text') + " " + "<span>" + $(this).data('plan') + "</span>");
        $('.btn--buyinv').attr('href', $('.btn--buyinv').data('href') + $(this).data('plan-alias'));
        $(this).parent().removeClass('tab-inv--nonactive');
        $(this).parent().siblings('li').addClass('tab-inv--nonactive');
        $('.btn--buyinv').addClass('active');
        if($(window).width() < 992) {
            //$('body').stop().animate({scrollTop: $('.tab-list--inv').offset().top +  $('.tab-list--inv').height() - 50 });
        }
        resizePa();
    });


    var windowHeight = $(window).height();

    $(window).on('resize', function() {
        windowHeight = $(window).height();
        resizePa();
        //setInitialMenu();
        setloginHeight();
    });

    if($('.emulate-chart').length) {
        $('.emulate-chart').simplemarquee({
            handleHover: false,
            speed: 10,
            space: 0
        });
    }
    var $animtingBlocks = $('.js-animate, .js-animate-pa');
    var crystalLeft = $('.top-block .crystal--left'),
        crystalRight = $('.top-block .crystal--right');

    $(window).on('scroll', function() {



        var scrollTop  = $(window).scrollTop();
        addAnimateClass();
        crystalLeft.css({
            'transform' : 'translateY(' + scrollTop/6  +  'px)'
        })

        crystalRight.css({
            'transform' : 'translateY(' + scrollTop/6  +  'px)'
        })

    });


    function addAnimateClass() {

        var scrollTop = $(window).scrollTop();

        $animtingBlocks.each(function() {

            if($(this).offset().top < windowHeight + scrollTop) {
                    $(this).addClass('animate');
            }
        })
    }

    addAnimateClass();

    $('.venobox').venobox();

    $('.js-menu a').on('click touch', function(e) {
        var href = $(this).attr('href');
        var isHash = href.indexOf('#') && href.length > 1

        if(isHash) {
            var aTag = $($(this).attr("href").substr($(this).attr("href").indexOf("#")));
            if (aTag.length) {
                e.preventDefault();
                $("html, body").animate({ scrollTop: aTag.offset().top }, 1000);
            }
        }
    });
    
    $('.js-show-subrow').on('click touch', function(e) {
        e.preventDefault();
        var $parentRow = $(this).parents('tr');

        $parentRow.toggleClass('parentrow--active');

        $parentRow.nextUntil('.parentrow').toggle();
    })


    $('.text-danger + .input').on('keyup', function() {
        if($(this).val()) {
            $(this).siblings('.text-danger').fadeOut(function() {
                $(this).remove();
            });
        }
    })

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
      resizePa();
    });
    $('a[data-toggle="tab"]').on('hidden.bs.tab', function (e) {
      resizePa();
    });
    $('.accordion__data').on('show.bs.collapse', function () {
      $(this).parents('.accordion__item').addClass('accordion__item--active');
      resizePa();
    })
    $('.accordion__data').on('hide.bs.collapse', function () {
      $(this).parents('.accordion__item').removeClass('accordion__item--active');
      resizePa();
    })


    var countToOptions = {
      useEasing : true, 
      useGrouping : true, 
      separator : ' ', 
      decimal : '.', 
      prefix : '$', 
    };
    $('.js-count-to').each(function() {
        var $t = $(this);

        var count = new CountUp($t.attr('id'), 0, $t.data('to'), 2, 1.8, countToOptions);
        count.start();
    })

    $('.pa-well').on('mouseenter', function() {
        var $t = $(this),
            $svgDraw = $t.find('.svg__draw');

        if(!$svgDraw.length) return
            
        $t.find('.svg__draw').css({
            'animation-name': "none"
        })
        setTimeout(function() {
            $t.find('.svg__draw').css({
                'animation-name': "DrawLine, FillOpacity"
            })
        }, 100)
    })

    var testEl = document.createElement("test-el"),
        isSupportsWebkitBackgroundClipText = typeof testEl.style.webkitBackgroundClip !== "undefined" && ( testEl.style.webkitBackgroundClip = "text", testEl.style.webkitBackgroundClip === "text" );
    if(isSupportsWebkitBackgroundClipText) {
        $('.js-webkit-clip').addClass('webkkit-clip');
    }
    
    $('.accordion__data').on('shown.bs.collapse', function () {
        $(this).find('.js-faq-images').slick({
            slidesToShow: 4,
            prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"></button>',
            nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },{
                    breakpoint: 650,
                    settings: {
                        slidesToShow: 2
                    }
                },{
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
        resizePa();
    });
    $('.accordion__data').on('hidden.bs.collapse', function () {
      $(this).find('.js-faq-images').slick('unslick');
      resizePa();
    })

    var $parallax  = $('.js-parallax');

    $(window).on('scroll', function() {
        $.each($parallax, function() {
            var newPos = (window.scrollY) / 4;
            $(this).css({
                'background-position': "center "+newPos+"px"
            })

        })
    });
    
    $.each($('.slider-input'), function() {
        var $t = $(this),
        from = $t.data('from'),
        to = $t.data('to'),
        $dailyProfit = $($t.data('dailyprofit')),
        $totalProfit = $($t.data('totalprofit')),
        $val = $($t.data('valuetag')),
        perDay = $t.data('perday'),
        perYear = $t.data('peryear');

        $t.ionRangeSlider({
            input_values_separator: ";",
            prefix: "$",
            hide_min_max: true,
            force_edges: true,
            onChange: function(val) {
                $val.val( "$" + val.from);
                
                var profit = (val.from * perDay / 100).toFixed(1);
                profit  = "$" + profit.replace('.', ',') ;
                $dailyProfit.text(profit) ;

                profit = ( val.from * perYear / 100).toFixed(1);
                profit  =  "$" + profit.replace('.', ',');
                
                $totalProfit.text(profit);
            }
        });
    });
    $('.invest-type__profit--val').on('change', function(e) {

        var slider = $($(this).data('slider')).data("ionRangeSlider");

        slider.update({
            from: $(this).val().replace("$", "")
        });
    })
    
    var vid = document.getElementById('video');

    if(vid) {
      vid.addEventListener('ended', function(e) {

        var activesource = document.querySelector("#video source.active");
        var nextsource = document.querySelector("#video source.active + source") || document.querySelector("#video source:first-child");

        activesource.className = "";
        nextsource.className = "active";

        vid.src = nextsource.src;
        vid.play();
        
      });
    }
    
    $('a[data-toggle="tab"][href="#strategy"]').on('shown.bs.tab', function (e) {
      $('.strategy-block').addClass('strategy-block--active')
    });
    $('a[data-toggle="tab"][href="#strategy"]').on('hidden.bs.tab', function (e) {
      $('.strategy-block').removeClass('strategy-block--active')
    });
    
    if($('.video-slider').length)
      $('.video-slider').slick({
        dots: true,
        prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"></button>',
        nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"></button>',
        customPaging: function(slider, i) {
            return $('<span class="slick-page"></span>');
        }
    });
    
    if($('.currencies').length)
    $('.currencies').simplemarquee({
        handleHover: false
    });
    if($('.right-nav__show').length)
    $('.right-nav__show').on('click touch', function() {
        $('.right-nav').toggleClass('right-nav--small');
        if($('.right-nav').hasClass('right-nav--small')) {
            
            $('.right-nav').find('.collapse').collapse('hide');
        }
        resizePa();
        var $grid = $(".pa-table"),
            jqgrid = $grid.closest(".ui-jqgrid").parent();
        if(jqgrid.length) {
            $grid.jqGrid("setGridWidth", jqgrid.width(), true);    
        }
        return false;
    });
    if($('.pa-navigation__link--parent').length)
    $('.pa-navigation__link--parent').on('click touch', function() {
        if($('.right-nav').hasClass('right-nav--small')) {
            $('.right-nav').removeClass('right-nav--small')
        }
    });
    var $techShape = $('.tech__shape'),
        $techMap = $('.tech__map');
    if($techShape.length)
    $('.page--tech').mousemove(function(e){

        var tempX = -(e.pageX + this.offsetLeft) / 40
        var tempY = -(e.pageY + this.offsetTop) / 20;
                    
        $techShape.css('transform', 'translate('+ -tempX + 'px, '+ -tempY + 'px)');
        $techMap.css('transform', 'translate('+ tempX + 'px, '+ tempY + 'px)');
    });
    
    $('.js-showgallery').on('click touch', function() {
        $('.event-hotels div:nth-child(7) a').click();
        return false;
    })
    
    resizePa();
    setInitialMenu();
    setloginHeight();
    
    if($('.selectize').length)
    $('.selectize').selectize();
})

$(window).on("load", function() {
    $('#loader-wrapper').fadeOut(1000, function() {
        $(this).remove();
    });
    if($('#map.g-map').length) initMap();
    //$('.loader').fadeOut(700);
})
var map;
function initMap() {
    var coord = {lat: 38.346423, lng: -0.489105};

    if(!document.getElementById('map')) return;

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        scrollwheel: false,
        disableDefaultUI: true,
        center: coord,
        styles: [
        {"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},
        {"featureType":"landscape","elementType":"all","stylers":[{"color":"#f1f3f5"}]},
        {"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},
        {"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":25}]},
        {"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},
        {"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},
        {"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},
        {"featureType":"water","elementType":"all","stylers":[{"color":"#d9e1e5"},{"visibility":"on"}]}]
    });

    var image = new google.maps.MarkerImage('/assets/img/new/location.png', null, null, null, new google.maps.Size(50, 63));
    
    var marker2 = new google.maps.Marker({
          position: coord,
          map: map,
          icon: image
    });
}
function resizePa() {
    
    var $rightCol = $('.pa-right-col'),
    $rightNav = $('.right-nav');
    
    if(!$rightCol.length) return;
        
    $rightNav.css({
        "min-height": 0
    })
    $rightCol.css({
        "min-height": 0
    })
    var rightHeight = $rightCol.outerHeight(),
        leftHeight = $('.right-nav').outerHeight();

    if(rightHeight < leftHeight) {
        $rightCol.css({
            "min-height": leftHeight - 25,
            'margin-bottom': 0
        })
        $rightCol.children('.pa-well:last-child').css({
            'margin-bottom': 0
        })
    } else {
        $rightNav.css({
            "min-height": rightHeight + 15
        })
        $rightCol.css({
            'margin-bottom': 0
        });
        $rightCol.children('.pa-well:last-child').css({
            'margin-bottom': 0
        })
    }
}
function setInitialMenu() {
  
    $rightNav = $('.right-nav');
    if(!$rightNav.length) return;
  
    if($(window).width() <= 1100) {
        $('.right-nav').addClass('right-nav--small');
    }
}
function setloginHeight() {
    var height = 0;
    if($(window).width() > 992) {
        $.each($('.signpage .vertical-center>.block'), function() {
            if(height < $(this).outerHeight()) {
                height = $(this).outerHeight();
            }
        })
        $('.signpage .vertical-center').height(height + 50);
    }
}