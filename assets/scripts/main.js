jQuery(document).ready(function($) {

    'use-strict';

    function RYLsmoothScroll() {
        if (navigator.appVersion.indexOf("Mac") == -1) {
            $('body').append("<script src='vendors/smooth-scroll/SmoothScroll.js'></script>");
        }
    }
    RYLsmoothScroll();

    //useful var
    var $window = $(window);
    var gsnavfixH = $('#ryl-navfix').outerHeight() || 0;

    function RYLpieChart() {
        $('.ryl-chart').easyPieChart({
            easing: 'easeOutBounce',
            onStep: function(from, to, percent) {
                $(this.el).find('.ryl-percent').text(Math.round(percent));
            },
            barColor: '#FFD953',
            trackColor: 'rgba(255,255,255,0.4)',
            lineWidth: '6',
            size: 160,
            lineCap: 'butt',
            animate: ({
                duration: 2000,
                enabled: true
            }),
            scaleColor: false,
        });
    }

    RYLpieChart();

    /**
     * Make easing scroll when click a link in page
     */
    function RYLeasingMoving() {
        $('a[href*=#]:not([href=#])').on('click', function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - gsnavfixH
                    }, 800, "easeOutQuad");
                    return false;
                }
            }
        });
    }

    RYLeasingMoving();


    function RYLhamburger() {
        $window.on('load scroll resize', function() {
            //must use window.innerWidth because its is same width of media query
            if ((window.innerWidth < 992) || ($window.scrollTop() >= $('#home').height())) {
                $('#ryl-main-hamburger').addClass('ryl-hamburger-appear');

                if (($window.scrollTop() < $('#home').height())) {
                    $('#ryl-main-hamburger').addClass('ryl-hamburger-appear-onhome');
                } else {
                    $('#ryl-main-hamburger').removeClass('ryl-hamburger-appear-onhome');
                }
            } else {
                $('#ryl-main-hamburger').removeClass('ryl-hamburger-appear');
            }
        });
    }
    RYLhamburger();


    /**
     * Config nav-right
     */

    function RYLnavRight() {
        var $selector;
        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $selector = $('#ryl-main,#ryl-main-hamburger,#ryl-nav-right');
        } else {
            $selector = $('#ryl-nav-right');
        }

        $('.ryl-hamburger').on('click', function(event) {
            $selector.toggleClass('ryl-nav-right-appear');
            return false;
        });

        $('.ryl-close-nav-right, *[data-toggle="modal"]').on('click', function(event) {
            $selector.removeClass('ryl-nav-right-appear');
            return false;
        });

        // //close nav after click
        $('#ryl-nav-right .ryl-nav-right-content a ').on('click', function() {
            setTimeout(function() {
                $selector.removeClass('ryl-nav-right-appear');

            }, 800);
        });
    }

    RYLnavRight();


    /**
     * Config process item
     */

    function RYLprocessAction() {
        var $parent = $('#ryl-process-list');
        $('.ryl-process-item').on('click', function(event) {
            var $this = $(this);
            $this.addClass('active').prevAll().addClass('active');
            $this.nextAll().removeClass('active');
            return false;
        });
    }

    RYLprocessAction();

    /**
     * Countdowm Clock in underconstruction
     * Use each you put more than one countdown clock in a page with html
     */

    var RYLcountdown = function() {
        $('.ryl-countdown-clock').each(function() {
            var countdownTime = $(this).attr('countdown-time');
            $(this).countdown({
                until: countdownTime,
                format: 'ODHMS',
                padZeroes: true
            });
        });
    };
    RYLcountdown();


    /**
     * Home slider
     */
    function RYLhomeSlider() {
        function fullwidth() {
            $('#ryl-home-slider-wrapper').width($('#ryl-main').width());
        }
        fullwidth();

        function middleSlider() {
            var space = $window.height() - $('#ryl-home-header').height();
            $('#ryl-home-content').css('height', space + "px");
        }
        middleSlider();

        $window.on('resize', function() {
            fullwidth();
            middleSlider();
        });
    }
    RYLhomeSlider();


    /**
     * Caption-slider
     */

    function RYLcaptionSlider() {
        //use class vs each make you can use this carousel more than one in a page
        //but performer is reduce
        $('.ryl-caption-slider').each(function() {
            $(this).owlCarousel({
                autoplay: true,
                mouseDrag: false,
                touchDrag: false,
                autoplayTimeout: 8000,
                singleItem: true,
                items: 1,
                dots: $(this).hasClass('has-dots'),
                nav: $(this).hasClass('has-nav'),
                smartSpeed: 600,
                loop: true,
                onInitialized: RYLSliderCaptionShow,
                onTranslate: RYLcaptionSliderCaptionHide,
                onTranslated: RYLSliderCaptionShow,
                onRefreshed: RYLSliderCaptionShow
            });
        });

    }

    RYLcaptionSlider();
    /**
     * Call back to hide Home slider caption
     */
    function RYLcaptionSliderCaptionHide() {
        var $caption = $('.ryl-caption-slider-item').children('.ryl-caption');
        if (Modernizr.cssanimations) {
            $caption.css('animation', 'fadeOutDown 0s 0.5s forwards');
        } else {
            $caption.css('opacity', '0');
        }
    }

    /**
     * Call back to show slider caption
     */

    function RYLSliderCaptionShow() {
        var $thisCaption = $('.active .ryl-caption-slider-item').children('.ryl-caption');
        if (Modernizr.cssanimations) {
            $thisCaption.each(function() {
                var delayTime = $(this).index() * 900 + 600;
                $(this).css('animation', 'fadeInUp 400ms ' + delayTime + 'ms forwards');
            });
        } else {
            $thisCaption
                .animate({
                    opacity: 1
                }, 500);
        }
    }


    // /**
    //  * Brand carousel
    //  */
    function RYLbrandCarousel() {

        //use class vs each make you can use this carousel more than one in a page
        //but performer is reduce
        $('.ryl-brand-carousel').each(function() {
            $(this).owlCarousel({
                autoplay: true,
                singleItem: true,
                // center: true,
                responsive: {
                    320: {
                        items: 2,
                    },
                    480: {
                        items: 3,
                    },
                    768: {
                        items: 4,
                    },
                    992: {
                        items: 5,
                    },
                    1200: {
                        items: 6,
                    },
                },
                dots: $(this).hasClass('has-dots'),
                nav: $(this).hasClass('has-nav'),
                smartSpeed: 800,
                loop: true
            });
        });
    }

    RYLbrandCarousel();


    /**
     * Fullwidth carousel
     */
    function RYLfullwidthCarousel() {

        //use class vs each make you can use this carousel more than one in a page
        //but performer is reduce
        $('.ryl-fullwidth-carousel').each(function() {
            $(this).owlCarousel({
                margin: 15,
                items: 1,
                dots: $(this).hasClass('has-dots'),
                nav: $(this).hasClass('has-nav'),
                smartSpeed: 800,
                loop: true
            });
        });
    }

    RYLfullwidthCarousel();
    /**
     * Text carousel
     */
    function RYLtextCarousel() {

        //use class vs each make you can use this carousel more than one in a page
        //but performer is reduce
        $('.ryl-text-carousel').each(function() {
            var $this = $(this);

            $this.owlCarousel({
                items: 1,
                dots: true,
                nav: $this.hasClass('has-nav'),
                smartSpeed: 300,
                loop: true,
                mouseDrag: false,
                animateIn: 'ryl-text-fadeIn',
                animateOut: 'ryl-text-fadeOut',
                onInitialized: updateSliderIndex,
                onTranslate: updateSliderIndex
            });

            function updateSliderIndex() {
                var items = $this.children().find('.owl-dots .owl-dot').length;
                var index = $this.children().find('.owl-dots .owl-dot.active').index() + 1;
                $this.attr('data-index', (index + "/" + items));
            }
        });

    }

    RYLtextCarousel();


    /**
     * Parallax
     */
    function RYLparallax() {
        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            var parallaxType = true;
            if (!Modernizr.csstransitions) {
                parallaxType = false;
            }

            $window.stellar({
                scrollProperty: 'scroll',
                positionProperty: 'transform',
                horizontalScrolling: false,
                verticalScrolling: (Modernizr.csstransitions),
                responsive: true,
                parallaxBackgrounds: true,
            });
        }

        //Fix error background-atachment :fixed + background-size: cover;
        if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
            $('body').addClass('ryl-ios');
        }
    }

    RYLparallax();

    /**
     * Skrollr active
     */
    function RYLskrollr() {
        if (!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            skrollr.init({
                smoothScrolling: true,
                forceHeight: false
            });
        }
    }

    RYLskrollr();


    /**
     * Jquery Input
     */
    function RYLinput() {
        $('input, textarea').placeholder();
    }
    RYLinput();
    window.html5 = {
        'shivCSS': true
    };

    /**
     * Modal video
     */

    function RYLvideoModal() {
        if ($('#ryl-modal-video').length) {
            var iframe = $('#rylVimeo')[0];
            var player = $f(iframe);

            $('#ryl-modal-video').on('show.bs.modal', function(event) {
                player.api('play');
            });
            $('#ryl-modal-video').on('hide.bs.modal', function(event) {
                player.api('pause');
            });
        } else {
            return false;
        }
    }
    RYLvideoModal();
    
    /**
     * Submit contact form with ajax
     * @constructor
     */
    function OsContactSubmit() {
        $('#contact_form').on('submit', function () {
            event.preventDefault();

            var $submit_button = $(this).find('button[type="submit"]');
            var backup_button = $submit_button.html();
            var data = $(this).serialize();

            $submit_button.html('PROCESANDO <i class="icon icon-back-in-time"</i>').attr('disabled','disabled');

            $.ajax({
                type : "POST",
                url : 'phpscript/contact.php',
                data : data,
                success : function (result) {
                    $submit_button.html('ENVIADO <i class="icon icon-check"></i>');
                    setTimeout(function(){
                        $submit_button.removeAttr('disabled').html(backup_button);
                    },2000)
                }
            });
        })
    }

    OsContactSubmit();

});

const ctMobileBurger = document.querySelector(".ct-mobile-burger");
ctMobileBurger.addEventListener("click", () => {
    ctShowMobileMenu();
});

const ctMobileMenuLinks = document.querySelectorAll(".ct-mobile-menu-links a");
ctMobileMenuLinks.forEach(element => {
    element.addEventListener("click", () => {
        ctHideMobileMenu()
    });
});

const ctMobileMenuClose = document.querySelector(".ct-mobile-menu-close");
ctMobileMenuClose.addEventListener("click", () => {
    ctHideMobileMenu();
});

const ctShowMobileMenu = () => {
    const ctMobileMenu = document.querySelector(".ct-mobile-menu")
    if (ctMobileMenu) ctMobileMenu.style.display = "block"
};

const ctHideMobileMenu = () => {
    const ctMobileMenu = document.querySelector(".ct-mobile-menu")
    if (ctMobileMenu) ctMobileMenu.style.display = "none"
};

window.addEventListener("scroll", () => {
    const ctNavbar = document.querySelector(".ct-navbar");
    const currentPosition = this.scrollY;
    if (currentPosition >= 50) {
        ctNavbar && ctNavbar.classList.add("ct-navbar-scroll")
    } else {
        ctNavbar && ctNavbar.classList.remove("ct-navbar-scroll")
    }
});

let slideIndex = 1
const slider = ".ct-slider"
const sliderInterval = 5000
const enableAutoplay = true

const plusSlides = (num) => {
    stopAutoplay()
    showSlides(slideIndex += num)
    enableAutoplay && startAutoplay(sliderInterval)
}

const sliderPrev = document.querySelector(".slider-prev")
sliderPrev && sliderPrev.addEventListener("click", () => {
    plusSlides(-1)
})

const sliderNext = document.querySelector(".slider-next")
sliderNext && sliderNext.addEventListener("click", () => {
    plusSlides(1)
})

const showSlides = (index) => {
    const slides = document.querySelectorAll(`${slider} > .slider-slide`)
    if (index > slides.length) slideIndex = 1
    if (index < 1) slideIndex = slides.length
    slides.forEach(element => {
        element.style.display = "none"
    })
    slides[slideIndex-1].style.display = "flex"
}

let autoplayInterval = null

const startAutoplay = (interval) => {
    stopAutoplay()
    autoplayInterval = setInterval(() => {
        plusSlides(1)
    }, interval);
}
const stopAutoplay = () => {
    clearInterval(autoplayInterval)
}

showSlides(slideIndex)
enableAutoplay && startAutoplay(sliderInterval)

const footerYear = document.querySelector("#ct-footer-year")
const year = new Date().getFullYear()
if (footerYear) footerYear.innerHTML = year

const showNewsModal = (item) => {
    if (item) {
        const overlay = document.querySelector("#ct-overlay")
        overlay.style.display = "block"
        const newsModal = document.querySelector("#ct-news-modal")
        newsModal.style.display = "block"
        const newsModalDate = document.querySelector(".ct-news-modal-date")
        newsModalDate.textContent = item.date
        const newsModalTitle = document.querySelector(".ct-news-modal-title")
        newsModalTitle.textContent = item.title
        const newsModalContent = document.querySelector(".ct-news-modal-content")
        newsModalContent.innerHTML = item.content
    }
}

const closeNewsModal = () => {
    const overlay = document.querySelector("#ct-overlay")
    overlay.style.display = "none"
    const newsModal = document.querySelector("#ct-news-modal")
    newsModal.style.display = "none"
}

const newsModalClose = document.querySelector(".ct-news-modal-close")
newsModalClose && newsModalClose.addEventListener("click", () => {
    closeNewsModal()
})

const displayNews = (data) => {
    const cards = document.querySelector(".ct-news-cards")
    data && data.news && data.news.forEach((item) => {
        const card = document.createElement("div")
        card.classList.add("ct-news-card")

        const cardHeader = document.createElement("div")
        cardHeader.classList.add("ct-news-card-header")
        cardHeader.style = 'background: url("'+item.image+'"); background-position: center; background-size: cover;'
        card.appendChild(cardHeader)
        
        const cardBody = document.createElement("div")
        cardBody.classList.add("ct-news-card-body")
        
        const cardBodyDate = document.createElement("small")
        cardBodyDate.textContent = item.date
        cardBody.appendChild(cardBodyDate)

        const cardBodyTitle = document.createElement("h3")
        cardBodyTitle.textContent = item.title
        cardBody.appendChild(cardBodyTitle)

        const cardBodyExtract = document.createElement("p")
        cardBodyExtract.innerHTML = item.extract
        cardBody.appendChild(cardBodyExtract)

        const cardBodyLink = document.createElement("a")
        cardBodyLink.textContent = "Leer más"
        cardBodyLink.addEventListener("click", () => {
            showNewsModal(item)
        })
        cardBody.appendChild(cardBodyLink)

        card.appendChild(cardBody)
        cards.appendChild(card)
    })
}

const getNews = async () => {
    await fetch("./assets/scripts/news.json")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Error trying get json file", response.statusText)
        }
        return response.json()
    })
    .then((data) => {
        displayNews(data)
    })
    .catch(error => {
        console.log("Error fetching json file", error)
    })
}
getNews()