(function ($) {
	"use strict";
    /*mobile responsive*/
    $(function(){
        var pageImg = 760/1440;
        var w = document.documentElement.offsetWidth;
        var h = window.screen.height;
        $('#slider-section').css('height',h+'px');
        // if(w > 1220){
        //     pageImg = 960/1440;
        // }
        // var firstPageHeight = w*pageImg >h ? h : w*pageImg
        // $('#slider-section').css('height',firstPageHeight+'px');
    })


    jQuery(document).ready(function($){
        $('.weixin-event').click(function(){
            $('.qrcode-modal').show();
            setTimeout(function(){
                $('.qrcode-modal-body').addClass('show');
            },100);
        });
        $('.qrcode-modal-body .close').click(function(){
            var el = $(this).parent().removeClass('show')
            setTimeout(function(){
                el.parent().hide();
            },350);
        })

        jQuery('header nav').meanmenu({
            meanScreenWidth: "767",
            meanRemoveAttrs: true,
            meanMenuCloseSize: "30px",
            onePage: true
        });
        // SMOOTH SCROLLING
        $(function() {
            $("#mainmenu a[href*='#'], a[href*='#']").bind('click', function(event) {
                var $anchor = $(this);
                if(window.location.href.split('#')[0] != this.href.split('#')[0] &&
                    this.href.indexOf('index.html') > -1){
                    window.location.href = this.href;
                }
                if($($anchor.attr('href')).offset()){
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1250);
                }
                event.preventDefault();
            });
        });
        /*----------------------------
            SCROLL TO TOP
        ------------------------------*/
        $(window).scroll(function () {
            var $totalHeight = $(window).scrollTop();
            var $scrollToTop = $(".scrolltotop");
            if ($totalHeight > 300) {
                $(".scrolltotop").fadeIn();
            } else {
                $(".scrolltotop").fadeOut();
            }

            if ($totalHeight + $(window).height() === $(document).height()) {
                $scrollToTop.css("bottom", "90px");
            } else {
                $scrollToTop.css("bottom", "20px");
            }
        });
        //STICKY NAV
        $("#sticker").sticky({
            topSpacing:-5,
        });
        //WOW ANIMATION
        new WOW().init();

        $(".embed-responsive iframe").addClass("embed-responsive-item");
        $(".carousel-inner .item:first-child").addClass("active");

        $('[data-toggle="tooltip"]').tooltip();


        //CAROUSEL
        $(".advisory-carosul-wrapper").owlCarousel({
                items:4,
                loop:true,
                dots:true,
                nav:false,
                autoplay:false,
                mouseDrag:false,
                margin:30,
                responsive:{
                    0:{
                        items:1,
                        dots:false,
                        nav:true,
                         navText:["<span class='ti-angle-left'>", "<span class='ti-angle-right'>"],
                    },
                    600:{
                        items:3,
                        dots:false,
                        autoplay:true,
                        mouseDrag:true,
                        nav:true,
                        navText:["<span class='ti-angle-left'>", "<span class='ti-angle-right'>"],
                    },
                    1000:{
                        items:4,
                    }
                }
        });

        //PREMENT DIV HOVER MOVE
          $(document).on('mousemove', function(e){
            $('.light').css({
               left:  e.pageX - 300,
               top:   e.pageY - 300
            });
        });

        var el = $('.js-tilt-container');

        el.on('mousemove', function(e){
            const {left, top} = $(this).offset();
            const cursPosX = e.pageX - left;
            const cursPosY = e.pageY - top;
            const cursFromCenterX = $(this).width()  - cursPosX;
            const cursFromCenterY = $(this).height()  - cursPosY;


            $(this).css('transform','perspective(500px) rotateX('+ (cursFromCenterY / 10) +'deg) rotateY('+ -(cursFromCenterX / 10) +'deg) translateZ(10px)');

            const invertedX = Math.sign(cursFromCenterX) > 0 ? -Math.abs( cursFromCenterX ) : Math.abs( cursFromCenterX );

            //Parallax transform on image
            $(this).find('.js-perspective-neg').css('transform','translateY('+ ( cursFromCenterY / 10) +'px) translateX('+ -(invertedX  / 10) +'px) scale(1.15)');

            $(this).removeClass('leave');
        });
        el.on('mouseleave', function(){
            $(this).addClass('leave');
        });
    });
    $(function(){
        var banner = $('.news-banner');
        if(banner.length >0  && window.THREE != undefined){
            var SEPARATION = 100,
                AMOUNTX = 100,
                AMOUNTY = 70;

            var container;
            var camera, scene, renderer;

            var particles, particle, count = 0;

            var mouseX = 85,
                mouseY = -342;

            var windowHalfX = banner.width() / 2;
            var windowHalfY = banner.height();

            init();
            animate();

            function init() {

                container = document.createElement('div');
                $(container).appendTo(banner);

                camera = new THREE.PerspectiveCamera(120, banner.width() / banner.height(), 1, 10000);
                camera.position.z = 1000;

                scene = new THREE.Scene();

                particles = new Array();

                var PI2 = Math.PI * 2;
                var material = new THREE.ParticleCanvasMaterial({

                    color: 0xe1e1e1,
                    program: function(context) {

                        context.beginPath();
                        context.arc(0, 0, .6, 0, PI2, true);
                        context.fill();

                    }

                });

                var i = 0;

                for (var ix = 0; ix < AMOUNTX; ix++) {

                    for (var iy = 0; iy < AMOUNTY; iy++) {

                        particle = particles[i++] = new THREE.Particle(material);
                        particle.position.x = ix * SEPARATION - ((AMOUNTX * SEPARATION) / 2);
                        particle.position.z = iy * SEPARATION - ((AMOUNTY * SEPARATION) / 2);
                        scene.add(particle);

                    }

                }

                renderer = new THREE.CanvasRenderer();
                renderer.setSize(banner.width(), banner.height());
                container.appendChild(renderer.domElement);

                document.addEventListener('mousemove', onDocumentMouseMove, false);
                document.addEventListener('touchstart', onDocumentTouchStart, false);
                document.addEventListener('touchmove', onDocumentTouchMove, false);

                window.addEventListener('resize', onWindowResize, false);

            }

            function onWindowResize() {

                windowHalfX = banner.width() / 2;
                windowHalfY = banner.height();

                camera.aspect = banner.width() / banner.height();
                camera.updateProjectionMatrix();

                renderer.setSize(banner.width(), banner.height());

            }

            //
            function onDocumentMouseMove(event) {

                mouseX = event.clientX - windowHalfX;
                // mouseY = event.clientY - windowHalfY;

            }

            function onDocumentTouchStart(event) {

                if (event.touches.length === 1) {

                    event.preventDefault();

                    mouseX = event.touches[0].pageX - windowHalfX;
                    // mouseY = event.touches[0].pageY - windowHalfY;
                }
            }

            function onDocumentTouchMove(event) {

                if (event.touches.length === 1) {

                    event.preventDefault();

                    mouseX = event.touches[0].pageX - windowHalfX;
                    // mouseY = event.touches[0].pageY - windowHalfY;
                }
            }

            //
            function animate() {
                requestAnimationFrame(animate);
                render();
            }

            function render() {

                camera.position.x += (mouseX - camera.position.x) * .05;
                camera.position.y += (-mouseY - camera.position.y) * .05;
                camera.lookAt(scene.position);

                var i = 0;

                for (var ix = 0; ix < AMOUNTX; ix++) {

                    for (var iy = 0; iy < AMOUNTY; iy++) {

                        particle = particles[i++];
                        particle.position.y = (Math.sin((ix + count) * 0.3) * 50) + (Math.sin((iy + count) * 0.5) * 50);
                        particle.scale.x = particle.scale.y = (Math.sin((ix + count) * 0.3) + 1) * 2 + (Math.sin((iy + count) * 0.5) + 1) * 2;

                    }

                }
                renderer.render(scene, camera);
                count += 0.1;
            }
        }
        
    })
    jQuery(window).load(function(){
    });
}(jQuery));
