// Import des packages
//import gsap from 'gsap';

// Import des managers
/*import HomePageManager from "./managers/HomePageManager";
import BlogPageManager from "./managers/BlogPageManager";*/
import SwiperManager from "./managers/SwiperManager";

// Initialisation des variables
const homePage = document.querySelector('.home');
const headerSlider = document.querySelector('.header-slider');
const detailRealisationSlider = document.querySelector('.detail-realisation-slider');
const paginationBullets = document.querySelectorAll('.pagination-bullet');
const swiperContainer = document.querySelector('.swiper-container');
let currentIndex = 0; // Variable pour stocker l'index courant



window.onload = () => {
    if (homePage) {
        //const homePageManager = new HomePageManager();
        // Console log with style the gsap lib
        //console.log('%c GSAP version: ' + gsap.version, 'background: #222; color: #bada55');
    }
    if (headerSlider) {
        const SwiperHeaderSlider = new SwiperManager(headerSlider, {
            loop: false,
            autoplay: {
                //delay: 3000,
                disableOnInteraction: false
            },
            slidesPerGroup: 1,
            slidesPerView: 1, // total number of slides must be >= slidesPerView * 2
            speed: 3000,
            mousewheelControl: true,
            keyboardControl: true,
        });

        SwiperHeaderSlider.addEventListener('onMomentumScrollEnd', (e, state, context) => {
            if (state.index > currentIndex && currentIndex > 0) {
                SwiperHeaderSlider.scrollBy(-1);
              }
            currentIndex = state.realIndex;
            console.log(currentIndex);
        });

        SwiperHeaderSlider.addEventListener('transitionEnd', () => {
            document.querySelector('.header-slider .swiper-button-prev').classList.remove('disabled');
            document.querySelector('.header-slider .swiper-button-next').classList.remove('disabled');
            //const currentSlide = SwiperHeaderSlider.slides[index_currentSlide];
            const activeSlide = swiperContainer.querySelector('.swiper-slide.swiper-slide-active');
            const activeSlideIndex = Array.from(swiperContainer.querySelectorAll('.swiper-slide')).indexOf(activeSlide);
            if (paginationBullets) {
                // Parcourez toutes les bulles de pagination
                paginationBullets.forEach((bullet, index) => {
                    // Vérifiez si la slide correspond à l'index de la bulle
                    if ((index) === (activeSlideIndex)) {
                    // Appliquez un style différent à la bulle de la slide active
                    bullet.classList.add('active');
                    } else {
                    // Supprimez le style de la bulle des autres slides
                    bullet.classList.remove('active');
                    }
                });
            }
        });

        SwiperHeaderSlider.addEventListener('reachEnd', () => {
            console.log("reach to End");
            document.querySelector('.header-slider .swiper-button-next').classList.add('disabled');
        });
    }

    // slider page detail realisation "produit utilisés pour ce projet"
    if (detailRealisationSlider) {
        let slidesPerView = 2; // Nombre d'éléments par page par défaut
        if (window.innerWidth < 1024) {
            slidesPerView = 1; // Passage à 1 élément par page pour les écrans plus petits
        } else {
            slidesPerView = 2; // Retour à 3 éléments par page pour les écrans plus larges
        }

        const SwiperdetailRealisationSlider = new SwiperManager(detailRealisationSlider, {
            loop: false,
            autoplay: {
                //delay: 3000,
                disableOnInteraction: false
            },
            spaceBetween: 22,
            slidesPerView: slidesPerView, // Utilisation de la variable pour définir le nombre d'éléments par page
            speed: 3000,
            mousewheelControl: true,
            keyboardControl: true,
        });

        SwiperdetailRealisationSlider.addEventListener('onMomentumScrollEnd', (e, state, context) => {
            if(state.index > this.currentIndex && this.currentIndex > 0) {
                this._swiper.scrollBy(-1)
            }
            this.currentIndex = state.index;
        });

    }
}


/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  Function to detect browser 
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
if (isSafari) {
    var body = document.getElementsByTagName('body')[0];   
    body.classList.add("safari_only");
}

var isFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
if (isFirefox) {
    var body = document.getElementsByTagName('body')[0];   
    body.classList.add("firefox_only");
}


/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  Function to detect mobile devices 
 * --------------------------------------------------------------------------------------------------------------
 */
/**/
// var md = new MobileDetect(window.navigator.userAgent);  // if (isMobile.any()) 

var isSmartphone = { // if (isSmartphone.any())
    Android: function () {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function () {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function () {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function () {
        return (isSmartphone.Android() || isSmartphone.BlackBerry() || isSmartphone.iOS() || isSmartphone.Opera() || isSmartphone.Windows());
    }
};
if (isSmartphone.any()) {
    console.log('Smartphone device : ' + isSmartphone.any());
}

var isTablet = { // if (isTablet.any())
    Tablet: function () {
        const userAgent = navigator.userAgent.toLowerCase();
        const isTablette = /(ipad|tablet|(android(?!.*mobile))|(windows(?!.*phone)(.*touch))|kindle|playbook|silk|(puffin(?!.*(IP|AP|WP))))/.test(userAgent);
        return isTablette;
    },
    Surface: function () {
        const isWindows = navigator.userAgent.indexOf('Windows') > -1;
        const maxTouchPoints = navigator.maxTouchPoints || navigator.msMaxTouchPoints;
        const isTouchable = 'ontouchstart' in window
            || maxTouchPoints > 0
            || window.matchMedia && matchMedia('(any-pointer: coarse)').matches;

        return isWindows && isTouchable;
    },
    any: function () {
        return (isTablet.Tablet() || isTablet.Surface());
    }
};
if (isTablet.any()) {   
    console.log('Tablette device : ' + isTablet.any());
}

var isMobile = { // if (isMobile.any())
    any: function () {
        if ( isSmartphone.any() || isTablet.any() ) {   
            return true;
        }
    }
};
if (isMobile.any()) {   
    console.log('Mobile device : ' + isMobile.any());
}


/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  HEADER
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

jQuery(function ($) {

    var timer;
    // All headers
    var header = document.getElementsByTagName('header')[0];   

    /**
     * --------------------------------------------------------------------------------------------------------------
     * DESKTOP : HEADER STICKY ON SCROLL AND FADE FROM TOP ANIMATION (+ CSS)
     * --------------------------------------------------------------------------------------------------------------
     */
    /**/ 
    
    if (!isMobile.any()) {

        // $(window).scroll(example);
        // function example() {
        //     var tempScrollTop = $(window).scrollTop();
        //     //console.log("Scroll from Top: " + tempScrollTop.toString());

        //     if (tempScrollTop == 0) {
        //         //header.classList.remove("header-fadeInDown");
        //         //header.classList.remove("header-fadeOutUp");
        //         header.classList.add("top-reached");
        //     } else {
        //         header.classList.remove("top-reached");
        //         /*function checkScrollDirection(event) {
        //             if (checkScrollDirectionIsUp(event)) {
        //                 timer = window.setTimeout(function() {
        //                     header.classList.remove("header-fadeInDown");
        //                     header.classList.add("header-fadeOutUp");
        //                 }, 500); 
        //             } else {
        //                 timer = window.setTimeout(function() {
        //                     header.classList.remove("header-fadeOutUp");
        //                     header.classList.add("header-fadeInDown");
        //                 }, 500);
        //             }
        //         }
                
        //         function checkScrollDirectionIsUp(event) {
        //             if (event.wheelDelta) {
        //                 return event.wheelDelta > 0;
        //             }
        //             return event.deltaY < 0;
        //         }
            
        //         var scrollableElement = document.body; 
            
        //         scrollableElement.addEventListener('wheel', checkScrollDirection);*/
        //     }
        // };

    } else if (isMobile.any()) {
    

    /**
     * --------------------------------------------------------------------------------------------------------------
     * MOBILES : HEADER STICKY ON SCROLL AND FADE FROM TOP ANIMATION (+ CSS)
     * --------------------------------------------------------------------------------------------------------------
     */
    /**/
    
        // var lastScrollTop = 0;

        // // element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
        // window.addEventListener("scroll", function(){ // or window.addEventListener("scroll"....
        //     var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
        //     if (st == 0) {
        //         //header.classList.remove("header-fadeInDown");
        //         //header.classList.remove("header-fadeOutUp");
        //         header.classList.add("top-reached");
        //     } else if (st > lastScrollTop){
        //         /*timer = window.setTimeout(function() {
        //             header.classList.remove("top-reached");
        //         }, 100);*/
        //         header.classList.remove("top-reached");
        //     } /*else {
        //         timer = window.setTimeout(function() {
        //             header.classList.remove("top-reached");
        //         }, 500); 
        //     }*/
        //     lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
        // }, false);

    }

    /*-----------------------------------------------*/
    //                    CTA PRIMARY action on focused out
    /*-----------------------------------------------*/

    /*var expirationTime;
    $(".cta-primary").focusout(function () {
        $(this).css({
            "background-color": "rgba(255,255,255,0.8)"
        });
        expirationTime = window.setTimeout(function() {
            $(this).css({
                "background-color": "rgba(255,255,255,0.3)"
            }); 
        }, 1500);
    });*/


});



/*-----------------------------------------------*/
//                    Menu burger
/*-----------------------------------------------*/


/*function widthResizer(){
    var width = window.innerWidth;
    var header = document.querySelector('#overlay-header > .wrap');
    if (width < 1500)  {
        console.log("Largeur de l'écran = " + width)
        header.classList.add("burger"); 
    } else {
        header.classList.remove("burger"); 
    }
  }
// Getting the width of the browser whenever the screen resolution changes.
window.addEventListener('resize', widthResizer)*/


/*if (isMobile.any()) {*/
   /* var header = document.querySelector('#overlay-header > .wrap');
    header.classList.add("burger"); */
    //const body = document.querySelector('body');
    const headers = document.querySelectorAll('.site-header');

    headers.forEach(header => {
    const burgerMenu = header.querySelector('.wrap.burger > .burger-menu');
    const openBurgerMenu = header.querySelector('.wrap.burger > .burger-header > .menu');
    const burgerHeader = header.querySelectorAll('.wrap.burger > .burger-header');
    //const closeBurgerMenu = header.querySelector('.wrap.burger > .burger-menu > .burger-menu-wrapper > .close > .close-button-box');
    const closeBurgerMenu2 = header.querySelector('.wrap.burger > .burger-header > .close > .close-button-box');
    const logo = header.querySelector('.wrap.burger > .burger-header > .logo');
    closeBurgerMenu2.style.display = 'none';
    openBurgerMenu.addEventListener('click', () => {
        if (!burgerMenu.classList.contains('open')) {
            burgerMenu.classList.add('open');
            logo.classList.add('open');
            openBurgerMenu.style.display = 'none';
            document.querySelector('body').style.overflow = 'hidden';
            closeBurgerMenu2.style.display = 'block';
            burgerHeader.forEach(element => {
                element.classList.add('open');
            });
        }
    });
    closeBurgerMenu2.addEventListener('click', () => {
        if (burgerMenu.classList.contains('open')) {
            burgerMenu.classList.remove('open');
            logo.classList.remove('open');
            openBurgerMenu.style.display = 'block';
            document.querySelector('body').style.overflow = 'auto';
            closeBurgerMenu2.style.display = 'none';
            burgerHeader.forEach(element => {
                element.classList.remove('open');
            });
            jQuery(".accordion.active").trigger("click");
            jQuery("a.sub-menu-openned").trigger("click");
        }
    });
});
/*}*/


/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  Action on hover Header sub-menu chevrons desktop 
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

jQuery(function ($) {
    var menu = $(".site-header>.wrap>.site-navigation ul>li.menu-item-has-children");
    var headerSubMenuOpen = $(".site-header");
    menu.each(function() {
        var subMenuChevron = $(this).find("a");
        $(this).mouseenter(
            function() {
                subMenuChevron.addClass( "sub-menu-openned" );
                console.log(subMenuChevron);
                var subMenu = subMenuChevron.next(".sub-menu");
                var subMenuHeight = subMenu.height() + 20;
                if (headerSubMenuOpen.hasClass("top-reached")) {
                    headerSubMenuOpen.css({
                        "background-image": "linear-gradient(rgba(255, 255, 255, 1), rgba(255, 255, 255, 1))"
                    });
                } else {
                    headerSubMenuOpen.css({
                        "background-image": "linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1))",
                    });
                }
                headerSubMenuOpen.css({
                    "padding": "0 0 " + subMenuHeight + "px 0",
                    "text-decoration": "none",
                    "background-size": "100% 1px",
                    "background-position": "0 100px",
                    "background-repeat": "no-repeat",
                    "transition": "background-size 2s linear",
                });
            }
        );
        $(this).mouseleave(
            function() {
                subMenuChevron.removeClass( "sub-menu-openned" );
                headerSubMenuOpen.css({
                    "padding": "0 0",
                    "color": "",
                    "text-decoration": "",
                    "background-image": "",
                    "background-size": "",
                    "background-position": "",
                    "background-repeat": "",
                    "transition": "",
            }   );
            }
        );
    });
});


/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  Action on click Footer sub-menu chevrons desktop 
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

jQuery(function ($) {
    var subMenuChevron = $(".site-footer .wrap .site-navigation nav.main-navigation ul>li.menu-item-has-children>a");
    subMenuChevron.each(function() {
        $(this).on("click", function(){
            $(this).toggleClass('sub-menu-openned'); 
        });
    });
});

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  Action on click sub-menu chevrons tablettes/mobiles toggle 
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

jQuery(function ($) {
    var subMenuChevron = $(".site-header>.wrap>.burger-menu nav.main-navigation ul>li.menu-item-has-children>a");
    subMenuChevron.each(function() {
        $(this).on("click", function(){
            $(this).toggleClass('sub-menu-openned');  
        });
    });
});

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  TABULATIONS
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

const tabs = document.querySelectorAll('[data-tab-target]')
const tabContents = document.querySelectorAll('[data-tab-content]')

tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    const target = document.querySelector(tab.dataset.tabTarget)
    tabContents.forEach(tabContent => {
      tabContent.classList.remove('active')
    })
    tabs.forEach(tab => {
      tab.classList.remove('active')
    })
    tab.classList.add('active')
    target.classList.add('active')
  })
})


/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  ACCORDION'S ITEM
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

var footerNavItemHasChildren = document.querySelectorAll("footer .menu-item-has-children");
for (i = 0; i < footerNavItemHasChildren.length; i++) {
    footerNavItemHasChildren[i].classList.add('accordion');
}
var navItemsChildrenPanel = document.querySelectorAll("footer .sub-menu");
for (i = 0; i < navItemsChildrenPanel.length; i++) {
    navItemsChildrenPanel[i].classList.add('panel');
}

var BurgerNavItemHasChildren = document.querySelectorAll(".principal-menu-burger .menu-item-has-children");
for (i = 0; i < BurgerNavItemHasChildren.length; i++) {
    BurgerNavItemHasChildren[i].classList.add('accordion');
}
var BurgerNavItemHasChildren = document.querySelectorAll(".principal-menu-burger .sub-menu");
for (i = 0; i < BurgerNavItemHasChildren.length; i++) {
    BurgerNavItemHasChildren[i].classList.add('panel');
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.querySelector('.panel');
        panel.classList.toggle("openned");
    });
}  



