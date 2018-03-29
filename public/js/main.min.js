'use strict';

var timeOut = 0;

jQuery(document).ready(function($){
    $('#fullpage').fullpage({
        navigation: true,
        parallax: true,
        anchors: ['bienvenido', 'homepage', 'portfolio', 'servicios', 'clientes', 'acerca-de', 'contactanos'],
        navigationTooltips: ['Welcome', 'Home', 'Portfolio', 'Servicios', 'Clientes', 'Acerca de', 'Contacto'],
        scrollingSpeed: 700,
        onLeave: function(index, nextIndex, direction) {
            if(nextIndex === 3 || nextIndex === 5 || nextIndex === 7) {
                $('#fp-nav ul li a span, .socialbar').addClass('blueTheme');
            } else {
                $('#fp-nav ul li a span, .socialbar').removeClass('blueTheme');
            }
        },
        afterLoad: function(anchorLink, index) {
            navbarScroll();
            homeAnimateIn(index);
        }
    });

    navbarScroll();
    $('#fp-nav').addClass('no-mobile');

    if ($('.slider .item').length > 1) {
        timeOut = setInterval(bannerSlider, 4500);
    }

    new WOW().init();

    $(".menuOpen").on('tap click',function(){
        if (false === $(this).is('.active')) {
            menuIn();
        } else {
            menuOut();
        }
        $(this).toggleClass('active');
    });

    $("#works .project-carrusel .project .project-wrapper a").on("tap",function(){
        eval($(this).attr('href'));
    });

    $('form.dinamic input, form.dinamic textarea').focus(function() {
        $(this).removeClass('focus empty prepared hidden').addClass('focus');

        if($(this).next().val() == '') {
            $(this).next().removeClass('focus empty prepared hidden').addClass('prepared empty');
        }

        if($(this).prev().val() == '') {
            $(this).prev().removeClass('focus empty prepared hidden').addClass('prepared empty');
        }
    }).focusout(function() {
        $(this).removeClass('focus');
        if($(this).val() == '' && $(this).next().val() == '') {
            $(this).next().removeClass('focus prepared hidden').addClass('hidden');
        }
        if($(this).val() == '')
            $(this).addClass('empty');
    });

    $('form.dinamic input, form.dinamic textarea').on('keyup', function(){
        var valid = true;
        if($('#nombre').val() == '' || $('#email').val() == '' || $('#mensaje').val() == '') valid = false;

        if(valid) {
            $('form.dinamic input[type="submit"]').removeClass('fadeOutLeft').addClass('fadeInLeft').css('visibility', 'visible');
        }else{
            $('form.dinamic input[type="submit"]').removeClass('fadeInLeft').addClass('fadeOutLeft')
        }
    });

    var slider = $('.servicesWrapper').glide({
        base    : 'servicesWrapper',
        bullets : 'paginador',
        autoplay: false,
        animationDuration: 200
    });
    var slider_api = slider.data('glide_api');

    $('form#contacto input[type="submit"]').click(function(){
        $(this).val('Enviando...');
    });

    $('form#contacto').on('submit', function(){
        if ($('form#contacto input:invalid, form textarea:invalid').length > 0) {
            $('form#contacto input[type="submit"]').val('Enviar');
            alert('Por favor diligencia el formulario de contacto.');
            return false;
        } else {
            $.ajax({
                async	: false,
                type	: 'post',
                url		: 'mailgun/index.php?action=send',
                data	: $(this).serialize(),
                success	: function(response) {
                    if(response) {
                        $('form.dinamic textarea, form.dinamic input[name="email"], form.dinamic input[name="nombre"]').val("").removeClass('focus prepared hidden').addClass('hidden empty');
                        $('form.dinamic input[type="submit"]').removeClass('fadeInLeft').addClass('fadeOutLeft');
                        $('.form-message').removeClass('fadeOut').addClass('fadeInDown').css({'display':'block'});
                        setTimeout(function() {
                            $('.form-message').removeClass('fadeInDown').addClass('fadeOut');
                            setTimeout(function() {
                                $('form.dinamic input[name="nombre"]').removeClass('hidden');
                                $('.form-message').css({'display':'none'});
                            }, 1000);
                            $('form#contacto input[type="submit"]').val('Enviar');
                        }, 6000);
                    } else {
                        alert('Error');
                    }
                }
            });
        }

        return false;
    });

    $('.socialbar ul li a').on('mouseover, mouseenter', function(){
        $('#socialVisor').addClass($(this).attr('rel'));
        $('#socialVisor label').html($(this).attr('rel'));
    }).on('mouseleave', function() {
        $('#socialVisor').removeClass($(this).attr('rel'));
    });


});

var homeAnimateIn = function (indexSection) {
    if (3 === indexSection) {
        $('#works .animated').css('visibility', 'visible');
        /** PORTFOLIO **/
        $('div.project-wrapper').removeClass('bounceOutUp');
        $('div.project-wrapper').addClass('bounceInDown');
        $('a.leftRow').removeClass('bounceOutLeft');
        $('a.leftRow').addClass('bounceInLeft');
        $('a.rightRow').removeClass('bounceOutRight');
        $('a.rightRow').addClass('bounceInRight');
        $('ul.carrusel-controls').removeClass('bounceOutDown');
        $('ul.carrusel-controls').addClass('bounceInUp');
    }

    if (4 === indexSection) {
        $('#services ul.service_carrusel').addClass('flipInX').css('visibility', 'visible');
    }
}

var navbarScroll = function() {
    if(Math.ceil($('#welcome').offset().top) < -100) {
        $('nav, #home .slider .item.active .animated').css('visibility', 'visible');
        $('nav, .burger-icon').removeClass('slideOutUp').addClass('slideInDown');
        $('#home .slider .item.active .textSlider label').addClass('bounceInRight');
        $('#home .slider .item.active .devices').addClass('bounceInLeft');
        $('.start').removeClass('shake');
    } else {
        if(false === $('nav').is('slideOutUp')) {
            $('nav, .burger-icon').removeClass('slideInDown').addClass('slideOutUp');
            $('.start').addClass('shake');
        }
    }
}

var bannerIn = function(index) {
    var classIn  = 'fadeIn';
    var classOut  = 'fadeOut';
    $('.slider .item.active .textSlider label').removeClass(classIn).addClass(classOut);
    $('.slider .item.active .devices').removeClass('bounceInLeft').addClass('bounceOutLeft');
    $('.slider .item.active .button').removeClass('bounceInUp').addClass('bounceOutDown');
    $('.slider .item.active').removeClass('active');
    $($('.slider .item')[index]).addClass('active');
    setTimeout(function(){
        $('.slider .item.active .button').removeClass('bounceOutDown').addClass('bounceInUp').css('visibility', 'visible');
        $('.slider .item.active .textSlider label').removeClass(classOut).addClass(classIn).css('visibility', 'visible');
        $('.slider .item.active .devices').removeClass('bounceOutLeft').addClass('bounceInLeft').css('visibility', 'visible');
    },450);
}

var bannerSlider = function(){
    var index = 0;
    if($('.slider .item.active').next().index() > -1) {
        index = $('.slider .item.active').next().index();
    }
    bannerIn(index);
}

var menuIn = function(){
    $('.mobile-menu').animate({
        marginLeft: "0vw",
    }, {
        duration: 500,
        specialEasing: {
            width: "linear",
            height: "easeOutBounce"
        }
    });
}

var menuOut = function(){
    $('.mobile-menu').animate({
        marginLeft: "-100vw",
    }, {
        duration: 500,
        specialEasing: {
            width: "linear",
            height: "easeOutBounce"
        },
        complete: function(){
            $("#menuClose").removeClass('bounceIn');
        }
    });
}

var portfolioButton = function(dir, isRow) {
    console.log(dir, isRow);
    var index = 0;
    var inClass = 'bounceInDown'; var outClass = 'bounceOutUp';
    if(isRow == true) {
        dir = (!dir) ? 'next' : dir;
        index = (dir == 'prev') ? $('.project-wrapper .item.' + inClass).prev().index() : $('.project-wrapper .item.' + inClass).next().index();
        index = (index == -1) ? ((dir == 'prev') ? $('.project-wrapper .item').length - 1 : 0) : index;
    } else {
        index = dir;
    }
    $('.project-wrapper .item').removeClass(inClass).addClass(outClass);
    $($('.project-wrapper .item')[index]).removeClass(outClass).addClass(inClass).css('display', 'initial');
    $('.carrusel-controls li a').removeClass('active');
    $($('.carrusel-controls li')[index]).find('a').addClass('active');
    setTimeout(function(){
        $('.project-wrapper .item.' + outClass).css('display', 'none');
    }, 500);
}

var modalIn = function () {
    $('#modalWindow').removeClass('flipOutY').addClass('flipInY').css('visibility', 'visible');
}

var modalOut = function () {
    $('#modalWindow').removeClass('flipInY').addClass('flipOutY');
    setTimeout(function(){
        $('#modalWindow').css('visibility', 'hidden');
    }, 500);
}

var loadProject = function (indice, toGo) {
    console.log(indice, toGo);
    var classOut = 'bounceOut' + ((toGo == 'Right') ? 'Left' : 'Right');
    var classIn = 'bounceIn' + toGo;

    $('#modalWindow .content').removeClass('bounceInLeft bounceInRight').addClass(classOut);

    setTimeout(function(){
        $.ajax({
            url     : Routing.generate('project', {id:indice}),
            success : function (response) {
                $('#modalWindow .content').html(response);
                setTimeout(function(){
                    $('#modalWindow .content').removeClass('bounceOutLeft bounceOutRight').addClass(classIn);
                }, 2);
            }
        })
    }, 2);

    if ($('#modalWindow').css('visibility') === 'hidden') {
        modalIn();
    }
}

$(function(){
    setTimeout(navbarScroll, 5000);
    setTimeout(navbarScroll, 10000);
});