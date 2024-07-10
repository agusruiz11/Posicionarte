;(function($) {
    'use strict';
    $(window).on( 'elementor/frontend/init', function() {


        //-------------------Banner-------------------//

        elementorFrontend.hooks.addAction('frontend/element_ready/dilabsbanner.default',function($scope) {

            const bannerStyleOne = new Swiper(".banner-style-one-carousel", {
                // Optional parameters
                direction: "horizontal",
                loop: true,
                autoplay: false,
                effect: "fade",
                fadeEffect: {
                    crossFade: true
                },
                
                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    clickable: true,
                },

                // Navigation arrows
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                }

                // And if we need scrollbar
                /*scrollbar: {
                el: '.swiper-scrollbar',
              },*/
            });
        });

        elementorFrontend.hooks.addAction('frontend/element_ready/dilabsappfeature.default',function($scope) {

            const overviewCarousel = new Swiper(".overview-carousel", {
                // Optional parameters
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    clickable: true,
                },

                // Navigation arrows
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                }

                // And if we need scrollbar
                /*scrollbar: {
                el: '.swiper-scrollbar',
              },*/
            });
        });


        elementorFrontend.hooks.addAction('frontend/element_ready/dilabsproject2.default',function($scope) {

            $('#gallery-masonary,.blog-masonry').imagesLoaded(function() {

                /* Filter menu */
                $('.mix-item-menu').on('click', 'button', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({
                        filter: filterValue
                    });
                });

                /* filter menu active class  */
                $('.mix-item-menu button').on('click', function(event) {
                    $(this).siblings('.active').removeClass('active');
                    $(this).addClass('active');
                    event.preventDefault();
                });

                /* Filter active */
                var $grid = $('#gallery-masonary').isotope({
                    itemSelector: '.gallery-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.gallery-item',
                    }
                });

                /* Filter active */
                $('.blog-masonry').isotope({
                    itemSelector: '.blog-item',
                    percentPosition: true,
                    masonry: {
                        columnWidth: '.blog-item',
                    }
                });

            });
        });

        elementorFrontend.hooks.addAction('frontend/element_ready/dilabstestimonials.default',function($scope) {

            const testimonialStage = new Swiper(".testimonial-stage-carousel", {
                // Optional parameters
                loop: true,
                freeMode: true,
                grabCursor: true,
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 30,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                // Navigation arrows
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
                breakpoints: {
                    991: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                        centeredSlides: false,
                    },
                    1200: {
                        slidesPerView: 3.5,
                        spaceBetween: 40,
                    },
                    1800: {
                        slidesPerView: 3.8,
                        spaceBetween: 50,
                    },
                },
            });

        });


        //-------------------Brand-------------------//

        elementorFrontend.hooks.addAction('frontend/element_ready/dilabsclientlogo.default',function($scope) {

            const bannerStyleOne = new Swiper(".brand-carousel", {
               loop: true,
                autoplay: {
                    delay: 1,
                    disableOnInteraction: false
                },
                slidesPerView: 'auto',
                speed: 5000,
                grabCursor: true,
                mousewheelControl: true,
                keyboardControl: true,
                breakpoints: {
                    450: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    992: {
                        slidesPerView: 4,
                    }
                },
            });
            const brandTwoCarousel = new Swiper(".brand-two-carousel", {
                // Optional parameters
                loop: true,
                autoplay: {
                    delay: 1,
                    disableOnInteraction: false
                },
                slidesPerView: 2,
                speed: 5000,
                grabCursor: true,
                mousewheelControl: true,
                keyboardControl: true,
                breakpoints: {
                    450: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    992: {
                        slidesPerView: 4,
                    }
                },
            });
        });

        //-------------------project-------------------//

        elementorFrontend.hooks.addAction('frontend/element_ready/dilabsprojects.default',function($scope) {

            const project_one = new Swiper(".project-center-stage-carousel", {
                loop: true,
                freeMode: true,
                grabCursor: true,
                slidesPerView: 1,
                centeredSlides: true,
                spaceBetween: 30,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                // Navigation arrows
                navigation: {
                    nextEl: ".project-button-next",
                    prevEl: ".project-button-prev"
                },
                breakpoints: {
                    991: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                        centeredSlides: false,
                    },
                    1200: {
                        slidesPerView: 2.5,
                        spaceBetween: 60,
                    },
                    1800: {
                        slidesPerView: 2.8,
                        spaceBetween: 80,
                    },
                },
            });


            const project_two = new Swiper(".case-carousel", {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 30,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },

                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    type: 'bullets',
                    clickable: true,
                },

                // Navigation arrows
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                }
            });


        });
        

        
        

    });
}(jQuery));