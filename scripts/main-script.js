// // Import des packages
// //import gsap from 'gsap';

// // Import des managers
// /*import HomePageManager from "./managers/HomePageManager";
// import BlogPageManager from "./managers/BlogPageManager";*/
// import SwiperManager from "./managers/SwiperManager.js";

// // Initialisation des variables
// const homePage = document.querySelector('.home');
// const headerSlider = document.querySelector('.header-slider');
// const detailRealisationSlider = document.querySelector('.detail-realisation-slider');
// const paginationBullets = document.querySelectorAll('.pagination-bullet');
// const swiperContainer = document.querySelector('.swiper-container');
// let currentIndex = 0; // Variable pour stocker l'index courant



// window.onload = () => {

//     // Popup
//     // jQuery(document).ready(function ($) {
//     //     if(localStorage.getItem('popState') != 'shown'){
//     //         $("#popup_1").delay(2000).fadeIn();
//     //         localStorage.setItem('popState','shown')
//     //     }
//     //     else {
//     //         // DELETE THIS ELSE ON PRODUCTION
//     //         // Remove the 'popState' item from local storage
//     //         localStorage.removeItem('popState');
//     //         console.log('popup_1 is allready shown previously')
//     //     }
    
//     //     $('#popup_1 .close').click(function(e) { // You are clicking the close button
//     //         $('#popup_1').fadeOut(); // Now the pop up is hiden.
//     //     });
//     //     $('#popup_1').click(function(e) {
//     //         $('#popup_1').fadeOut(); 
//     //     });
//     // });

//     if (homePage) {
//         //const homePageManager = new HomePageManager();
//         // Console log with style the gsap lib
//         //console.log('%c GSAP version: ' + gsap.version, 'background: #222; color: #bada55');
//     }
//     if (headerSlider) {
//         const SwiperHeaderSlider = new SwiperManager(headerSlider, {
//             loop: false,
//             autoplay: {
//                 //delay: 3000,
//                 disableOnInteraction: false
//             },
//             slidesPerGroup: 1,
//             slidesPerView: 1, // total number of slides must be >= slidesPerView * 2
//             speed: 3000,
//             mousewheelControl: true,
//             keyboardControl: true,
//         });

//         SwiperHeaderSlider.addEventListener('onMomentumScrollEnd', (e, state, context) => {
//             if (state.index > currentIndex && currentIndex > 0) {
//                 SwiperHeaderSlider.scrollBy(-1);
//               }
//             currentIndex = state.realIndex;
//             console.log(currentIndex);
//         });

//         SwiperHeaderSlider.addEventListener('transitionEnd', () => {
//             document.querySelector('.header-slider .swiper-button-prev').classList.remove('disabled');
//             document.querySelector('.header-slider .swiper-button-next').classList.remove('disabled');
//             //const currentSlide = SwiperHeaderSlider.slides[index_currentSlide];
//             const activeSlide = swiperContainer.querySelector('.swiper-slide.swiper-slide-active');
//             const activeSlideIndex = Array.from(swiperContainer.querySelectorAll('.swiper-slide')).indexOf(activeSlide);
//             if (paginationBullets) {
//                 // Parcourez toutes les bulles de pagination
//                 paginationBullets.forEach((bullet, index) => {
//                     // Vérifiez si la slide correspond à l'index de la bulle
//                     if ((index) === (activeSlideIndex)) {
//                     // Appliquez un style différent à la bulle de la slide active
//                     bullet.classList.add('active');
//                     } else {
//                     // Supprimez le style de la bulle des autres slides
//                     bullet.classList.remove('active');
//                     }
//                 });
//             }
//         });

//         SwiperHeaderSlider.addEventListener('reachEnd', () => {
//             console.log("reach to End");
//             document.querySelector('.header-slider .swiper-button-next').classList.add('disabled');
//         });
//     }

//     // slider page detail realisation "produit utilisés pour ce projet"
//     if (detailRealisationSlider) {
//         let slidesPerView = 2; // Nombre d'éléments par page par défaut
//         if (window.innerWidth < 1024) {
//             slidesPerView = 1; // Passage à 1 élément par page pour les écrans plus petits
//         } else {
//             slidesPerView = 2; // Retour à 3 éléments par page pour les écrans plus larges
//         }

//         const SwiperdetailRealisationSlider = new SwiperManager(detailRealisationSlider, {
//             loop: false,
//             autoplay: {
//                 //delay: 3000,
//                 disableOnInteraction: false
//             },
//             spaceBetween: 22,
//             slidesPerView: slidesPerView, // Utilisation de la variable pour définir le nombre d'éléments par page
//             speed: 3000,
//             mousewheelControl: true,
//             keyboardControl: true,
//         });

//         SwiperdetailRealisationSlider.addEventListener('onMomentumScrollEnd', (e, state, context) => {
//             if(state.index > this.currentIndex && this.currentIndex > 0) {
//                 this._swiper.scrollBy(-1)
//             }
//             this.currentIndex = state.index;
//         });

//     }
// }


// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  Function to detect browser 
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/

// var isSafari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
// if (isSafari) {
//     var body = document.getElementsByTagName('body')[0];   
//     body.classList.add("safari_only");
// }

// var isFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
// if (isFirefox) {
//     var body = document.getElementsByTagName('body')[0];   
//     body.classList.add("firefox_only");
// }


// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  Function to detect mobile devices 
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/
// // var md = new MobileDetect(window.navigator.userAgent);  // if (isMobile.any()) 

// var isSmartphone = { // if (isSmartphone.any())
//     Android: function () {
//         return navigator.userAgent.match(/Android/i);
//     },
//     BlackBerry: function () {
//         return navigator.userAgent.match(/BlackBerry/i);
//     },
//     iOS: function () {
//         return navigator.userAgent.match(/iPhone|iPad|iPod/i);
//     },
//     Opera: function () {
//         return navigator.userAgent.match(/Opera Mini/i);
//     },
//     Windows: function () {
//         return navigator.userAgent.match(/IEMobile/i);
//     },
//     any: function () {
//         return (isSmartphone.Android() || isSmartphone.BlackBerry() || isSmartphone.iOS() || isSmartphone.Opera() || isSmartphone.Windows());
//     }
// };
// if (isSmartphone.any()) {
//     console.log('Smartphone device : ' + isSmartphone.any());
// }

// var isTablet = { // if (isTablet.any())
//     Tablet: function () {
//         const userAgent = navigator.userAgent.toLowerCase();
//         const isTablette = /(ipad|tablet|(android(?!.*mobile))|(windows(?!.*phone)(.*touch))|kindle|playbook|silk|(puffin(?!.*(IP|AP|WP))))/.test(userAgent);
//         return isTablette;
//     },
//     Surface: function () {
//         const isWindows = navigator.userAgent.indexOf('Windows') > -1;
//         const maxTouchPoints = navigator.maxTouchPoints || navigator.msMaxTouchPoints;
//         const isTouchable = 'ontouchstart' in window
//             || maxTouchPoints > 0
//             || window.matchMedia && matchMedia('(any-pointer: coarse)').matches;

//         return isWindows && isTouchable;
//     },
//     any: function () {
//         return (isTablet.Tablet() || isTablet.Surface());
//     }
// };
// if (isTablet.any()) {   
//     console.log('Tablette device : ' + isTablet.any());
// }

// var isMobile = { // if (isMobile.any())
//     any: function () {
//         if ( isSmartphone.any() || isTablet.any() ) {   
//             return true;
//         }
//     }
// };
// if (isMobile.any()) {   
//     console.log('Mobile device : ' + isMobile.any());
// }


// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  HEADER
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/

// jQuery(function ($) {

//     var timer;
//     // All headers
//     var header = document.getElementsByTagName('header')[0];   

//     /**
//      * --------------------------------------------------------------------------------------------------------------
//      * DESKTOP : HEADER STICKY ON SCROLL AND FADE FROM TOP ANIMATION (+ CSS)
//      * --------------------------------------------------------------------------------------------------------------
//      */
//     /**/ 
    
//     if (!isMobile.any()) {

//         // $(window).scroll(example);
//         // function example() {
//         //     var tempScrollTop = $(window).scrollTop();
//         //     //console.log("Scroll from Top: " + tempScrollTop.toString());

//         //     if (tempScrollTop == 0) {
//         //         //header.classList.remove("header-fadeInDown");
//         //         //header.classList.remove("header-fadeOutUp");
//         //         header.classList.add("top-reached");
//         //     } else {
//         //         header.classList.remove("top-reached");
//         //         /*function checkScrollDirection(event) {
//         //             if (checkScrollDirectionIsUp(event)) {
//         //                 timer = window.setTimeout(function() {
//         //                     header.classList.remove("header-fadeInDown");
//         //                     header.classList.add("header-fadeOutUp");
//         //                 }, 500); 
//         //             } else {
//         //                 timer = window.setTimeout(function() {
//         //                     header.classList.remove("header-fadeOutUp");
//         //                     header.classList.add("header-fadeInDown");
//         //                 }, 500);
//         //             }
//         //         }
                
//         //         function checkScrollDirectionIsUp(event) {
//         //             if (event.wheelDelta) {
//         //                 return event.wheelDelta > 0;
//         //             }
//         //             return event.deltaY < 0;
//         //         }
            
//         //         var scrollableElement = document.body; 
            
//         //         scrollableElement.addEventListener('wheel', checkScrollDirection);*/
//         //     }
//         // };

//     } else if (isMobile.any()) {
    

//     /**
//      * --------------------------------------------------------------------------------------------------------------
//      * MOBILES : HEADER STICKY ON SCROLL AND FADE FROM TOP ANIMATION (+ CSS)
//      * --------------------------------------------------------------------------------------------------------------
//      */
//     /**/
    
//         // var lastScrollTop = 0;

//         // // element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
//         // window.addEventListener("scroll", function(){ // or window.addEventListener("scroll"....
//         //     var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
//         //     if (st == 0) {
//         //         //header.classList.remove("header-fadeInDown");
//         //         //header.classList.remove("header-fadeOutUp");
//         //         header.classList.add("top-reached");
//         //     } else if (st > lastScrollTop){
//         //         /*timer = window.setTimeout(function() {
//         //             header.classList.remove("top-reached");
//         //         }, 100);*/
//         //         header.classList.remove("top-reached");
//         //     } /*else {
//         //         timer = window.setTimeout(function() {
//         //             header.classList.remove("top-reached");
//         //         }, 500); 
//         //     }*/
//         //     lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
//         // }, false);

//     }

//     /*-----------------------------------------------*/
//     //                    CTA PRIMARY action on focused out
//     /*-----------------------------------------------*/

//     /*var expirationTime;
//     $(".cta-primary").focusout(function () {
//         $(this).css({
//             "background-color": "rgba(255,255,255,0.8)"
//         });
//         expirationTime = window.setTimeout(function() {
//             $(this).css({
//                 "background-color": "rgba(255,255,255,0.3)"
//             }); 
//         }, 1500);
//     });*/


// });



// /*-----------------------------------------------*/
// //                    Menu burger
// /*-----------------------------------------------*/


// /*function widthResizer(){
//     var width = window.innerWidth;
//     var header = document.querySelector('#overlay-header > .wrap');
//     if (width < 1500)  {
//         console.log("Largeur de l'écran = " + width)
//         header.classList.add("burger"); 
//     } else {
//         header.classList.remove("burger"); 
//     }
//   }
// // Getting the width of the browser whenever the screen resolution changes.
// window.addEventListener('resize', widthResizer)*/


// /*if (isMobile.any()) {*/
//    /* var header = document.querySelector('#overlay-header > .wrap');
//     header.classList.add("burger"); */
//     //const body = document.querySelector('body');
//     const headers = document.querySelectorAll('.site-header');

//     headers.forEach(header => {
//     const burgerMenu = header.querySelector('.wrap.burger > .burger-menu');
//     const openBurgerMenu = header.querySelector('.wrap.burger > .burger-header > .menu');
//     const burgerHeader = header.querySelectorAll('.wrap.burger > .burger-header');
//     //const closeBurgerMenu = header.querySelector('.wrap.burger > .burger-menu > .burger-menu-wrapper > .close > .close-button-box');
//     const closeBurgerMenu2 = header.querySelector('.wrap.burger > .burger-header > .close > .close-button-box');
//     const logo = header.querySelector('.wrap.burger > .burger-header > .logo');
//     closeBurgerMenu2.style.display = 'none';
//     openBurgerMenu.addEventListener('click', () => {
//         if (!burgerMenu.classList.contains('open')) {
//             burgerMenu.classList.add('open');
//             logo.classList.add('open');
//             openBurgerMenu.style.display = 'none';
//             document.querySelector('body').style.overflow = 'hidden';
//             closeBurgerMenu2.style.display = 'block';
//             burgerHeader.forEach(element => {
//                 element.classList.add('open');
//             });
//         }
//     });
//     closeBurgerMenu2.addEventListener('click', () => {
//         if (burgerMenu.classList.contains('open')) {
//             burgerMenu.classList.remove('open');
//             logo.classList.remove('open');
//             openBurgerMenu.style.display = 'block';
//             document.querySelector('body').style.overflow = 'auto';
//             closeBurgerMenu2.style.display = 'none';
//             burgerHeader.forEach(element => {
//                 element.classList.remove('open');
//             });
//             jQuery(".accordion.active").trigger("click");
//             jQuery("a.sub-menu-openned").trigger("click");
//         }
//     });
// });
// /*}*/


// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  Action on hover Header sub-menu chevrons desktop 
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/

// jQuery(function ($) {
//     var menu = $(".site-header>.wrap>.site-navigation ul>li.menu-item-has-children");
//     var headerSubMenuOpen = $(".site-header");
//     menu.each(function() {
//         var subMenuChevron = $(this).find("a");
//         $(this).mouseenter(
//             function() {
//                 subMenuChevron.addClass( "sub-menu-openned" );
//                 console.log(subMenuChevron);
//                 var subMenu = subMenuChevron.next(".sub-menu");
//                 var subMenuHeight = subMenu.height() + 20;
//                 if (headerSubMenuOpen.hasClass("top-reached")) {
//                     headerSubMenuOpen.css({
//                         "background-image": "linear-gradient(rgba(255, 255, 255, 1), rgba(255, 255, 255, 1))"
//                     });
//                 } else {
//                     headerSubMenuOpen.css({
//                         "background-image": "linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1))",
//                     });
//                 }
//                 headerSubMenuOpen.css({
//                     "padding": "0 0 " + subMenuHeight + "px 0",
//                     "text-decoration": "none",
//                     "background-size": "100% 1px",
//                     "background-position": "0 100px",
//                     "background-repeat": "no-repeat",
//                     "transition": "background-size 2s linear",
//                 });
//             }
//         );
//         $(this).mouseleave(
//             function() {
//                 subMenuChevron.removeClass( "sub-menu-openned" );
//                 headerSubMenuOpen.css({
//                     "padding": "0 0",
//                     "color": "",
//                     "text-decoration": "",
//                     "background-image": "",
//                     "background-size": "",
//                     "background-position": "",
//                     "background-repeat": "",
//                     "transition": "",
//             }   );
//             }
//         );
//     });
// });


// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  Action on click Footer sub-menu chevrons desktop 
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/

// jQuery(function ($) {
//     var subMenuChevron = $(".site-footer .wrap .site-navigation nav.main-navigation ul>li.menu-item-has-children>a");
//     subMenuChevron.each(function() {
//         $(this).on("click", function(){
//             $(this).toggleClass('sub-menu-openned'); 
//         });
//     });
// });

// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  Action on click sub-menu chevrons tablettes/mobiles toggle 
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/

// jQuery(function ($) {
//     var subMenuChevron = $(".site-header>.wrap>.burger-menu nav.main-navigation ul>li.menu-item-has-children>a");
//     subMenuChevron.each(function() {
//         $(this).on("click", function(){
//             $(this).toggleClass('sub-menu-openned');  
//         });
//     });
// });

// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  TABULATIONS
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/

// const tabs = document.querySelectorAll('[data-tab-target]')
// const tabContents = document.querySelectorAll('[data-tab-content]')

// tabs.forEach(tab => {
//   tab.addEventListener('click', () => {
//     const target = document.querySelector(tab.dataset.tabTarget)
//     tabContents.forEach(tabContent => {
//       tabContent.classList.remove('active')
//     })
//     tabs.forEach(tab => {
//       tab.classList.remove('active')
//     })
//     tab.classList.add('active')
//     target.classList.add('active')
//   })
// })


// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  ACCORDION'S ITEM
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/

// var footerNavItemHasChildren = document.querySelectorAll("footer .menu-item-has-children");
// for (i = 0; i < footerNavItemHasChildren.length; i++) {
//     footerNavItemHasChildren[i].classList.add('accordion');
// }
// var navItemsChildrenPanel = document.querySelectorAll("footer .sub-menu");
// for (i = 0; i < navItemsChildrenPanel.length; i++) {
//     navItemsChildrenPanel[i].classList.add('panel');
// }

// var BurgerNavItemHasChildren = document.querySelectorAll(".principal-menu-burger .menu-item-has-children");
// for (i = 0; i < BurgerNavItemHasChildren.length; i++) {
//     BurgerNavItemHasChildren[i].classList.add('accordion');
// }
// var BurgerNavItemHasChildren = document.querySelectorAll(".principal-menu-burger .sub-menu");
// for (i = 0; i < BurgerNavItemHasChildren.length; i++) {
//     BurgerNavItemHasChildren[i].classList.add('panel');
// }

// var acc = document.getElementsByClassName("accordion");
// var i;

// for (i = 0; i < acc.length; i++) {
//     acc[i].addEventListener("click", function() {
//         this.classList.toggle("active");
//         var panel = this.querySelector('.panel');
//         panel.classList.toggle("openned");
//     });
// }  

// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  BLOG filter
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/

// // init Isotope
// /* ------------------------------------------------------------------------ */
// jQuery(document).ready(function ($) {
//     if($('body.page-template-influence').length) {

//         // function scrollToTop() {
//         //     var targetElement = document.getElementById('id-filters');

//         //     // Définir les options de défilement
//         //     var scrollOptions = {
//         //         behavior: 'smooth', // Défilement en douceur
//         //         block: 'start' // Défilement vers le début de l'élément
//         //     };

//         //     setTimeout(function() {
//         //         // Défiler vers l'élément cible avec animation
//         //         targetElement.scrollIntoView(scrollOptions);

//         //     }, 200);
//         // }

//         var itemSelector = '.blog-item'; 

//         var $grid = $('.blog-isotope').isotope({
//             itemSelector: itemSelector, // the elements to filter
//             stamp: '.stamp',
//             layoutMode: 'fitRows',
//             percentPosition: true,
//             fitRows: {
//                 columnWidth: '.item-sizer',
//                 gutter: '.gutter-sizer'
//             },
//             getSortData: {
//                 postDate: '.news__date'
//             }
//         });

//         var responsiveIsotope = [ [480, 4] , [720, 6] ];
//         var itemsPerPageDefault = 6;
//         var itemsPerPage = defineItemsPerPage();
//         var currentNumberPages = 1;
//         var currentPage = 1;
//         var startPage=1;
//         var currentFilter = '*';
//         var filterAttribute = 'data-filter';
//         var filterValue = "";
//         var pageAttribute = 'data-page';
//         var pagerClass = 'isotope-pagination-container';

//         // Change isotope filter
//         /* ------------------------------------------------------------------------ */
//         function changeFilter(selector) {
//             $grid.isotope({
//                 filter: selector
//             });
//         }

//         // Grab all checked filters and goto page on fresh isotope output
//         /* ------------------------------------------------------------------------ */
//         function goToPage(n, tabSelected) {
//             currentPage = n;
//             var selector = itemSelector;
//             var exclusives = [];

//                 // for the tab checked, add its value and push to array
//                 selector = tabSelected;
//                 exclusives.push(selector);

//                 // smash all values back together for 'and' filtering
//                 filterValue = exclusives.length ? exclusives.join('') : '*';
                
//                 // add page number to the string of filters
//                 var wordPage = currentPage.toString();
//                 filterValue += ('.'+wordPage);
           
//             changeFilter(filterValue);
//             if (currentPage == 1) {
//                 console.log('Page : 1 / ' + currentNumberPages);
//                 $('.isotope-pagination-item-prev').addClass('disabled');
//                 $('.isotope-pagination-item-next').removeClass('disabled');
//             } else if (currentPage == currentNumberPages) {
//                 console.log('Page : ' + currentPage + ' / ' + currentNumberPages);
//                 $('.isotope-pagination-item-next').addClass('disabled');
//                 $('.isotope-pagination-item-prev').removeClass('disabled');
//             } else {
//                 console.log('Page : ' + currentPage + ' / ' + currentNumberPages);
//                 $('.isotope-pagination-item-prev').removeClass('disabled');
//                 $('.isotope-pagination-item-next').removeClass('disabled');
//             }
//         }

//         // Determine page breaks based on window width and preset values
//         /* ------------------------------------------------------------------------ */
//         function defineItemsPerPage() {
//             var pages = itemsPerPageDefault;
    
//             for( var i = 0; i < responsiveIsotope.length; i++ ) {
//                 if( $(window).width() <= responsiveIsotope[i][0] ) {
//                     pages = responsiveIsotope[i][1];
//                     break;
//                 }
//             }
//             return pages;
//         }
       
//         // Set pagination 
//         /* ------------------------------------------------------------------------ */
//         function setPagination(tabSelected) {
    
//             var SettingsPagesOnItems = function(){
//                 var itemsLength = $grid.children(itemSelector).length;
//                 var pages = Math.ceil(itemsLength / itemsPerPage);
//                 var item = 1;
//                 var page = 1;
//                 var selector = itemSelector;
//                 var exclusives = [];
        
//                     // for the tab checked, add its value and push to array
//                     selector = tabSelected;
//                     exclusives.push(selector);
            
//                     // smash all values back together for 'and' filtering
//                     filterValue = exclusives.length ? exclusives.join('') : '*';
//                     // find each child element with current filter values
//                     $grid.children(filterValue).not('.gutter-sizer').each(function(){
//                         // increment page if a new one is needed
//                         if( item > itemsPerPage ) {
//                             page++;
//                             item = 1;
//                         }
//                         // add page number to element as a class
//                         var wordPage = page.toString();
                        
//                         var classes = $(this).attr('class').split(' ');
//                         var lastClass = classes[classes.length-1];
//                         // last class shorter than 4 will be a page number, if so, grab and replace
//                         if(lastClass.length < 6){
//                             $(this).removeClass();
//                             classes.pop();
//                             classes.push(wordPage);
//                             classes = classes.join(' ');
//                             $(this).addClass(classes);
//                         } else {
//                             // if there was no page number, add it
//                            $(this).addClass(wordPage); 
//                         }
//                         item++;
//                     });
//                 currentNumberPages = page;
//             }();
    
//             // create page number navigation
//             var CreatePagers = function() {
    
//                 if (isMobile.any()) {
//                     var currentFilter = $('#filters-list').val();
//                 } else {
//                     var currentFilter = $('.filter-button-group button.active').attr(filterAttribute);
//                 }
//                 var $isotopePager = ( $('.'+pagerClass).length == 0 ) ? $('<div class="'+pagerClass+'"></div>') : $('.'+pagerClass);
    
//                 $isotopePager.html('');

//                 var $page_prev_btn=$('<a href="#isotope-grid" type="button" class="isotope-pagination-item isotope-pagination-item-prev"><img class="img-arrow left" src="/wp-content/uploads/2023/06/right-arrow.png"></a>');  
//                 var $page_next_btn=$('<a href="#isotope-grid" type="button" class="isotope-pagination-item isotope-pagination-item-next"><img class="img-arrow right" src="/wp-content/uploads/2023/06/right-arrow.png"></a>');
//                 $page_prev_btn.appendTo($isotopePager);
                
//                 var $pagerContainer = $('<div class="isotope-pagination-item numbers-of-page-container"></div>');
//                 $pagerContainer.html('');

//                 for( var i = 0; i < currentNumberPages; i++ ) {
//                     var $pager = $('<a href="#isotope-grid" class="nb-page-item pager" '+pageAttribute+'="'+(i+1)+'"></a>'); //  <a href ="javascript:void(0);"
//                         $pager.html(i+1);
                        
//                         $pager.click(function(){
//                             scrollToTop();
//                             var page = $(this).eq(0).attr(pageAttribute);
//                             $('.isotope-pagination-container a').removeClass("active");
//                             $(this).addClass("active");
//                             goToPage(page, currentFilter);
//                         });
    
//                     $pager.appendTo($pagerContainer);
//                     $pagerContainer.appendTo($isotopePager);
//                     $isotopePager.find('a.pager:first').addClass('active');
//                 } 

//                 // Cacher la pagination lorsqu'1 seule page
//                 if( (currentNumberPages == 1) || (currentNumberPages == "") ) {
//                     $page_prev_btn.hide();
//                     $pagerContainer.hide();
//                     $page_next_btn.hide();
//                 }

//                 $page_next_btn.appendTo($isotopePager)
//                 $grid.after($isotopePager);
    
//                 $page_prev_btn.click(function(){
//                     scrollToTop();
//                     if( currentPage > startPage) {
//                         $('.isotope-pagination-item-prev').removeAttr('disabled');
//                         var page=  currentPage - 1;
//                         var page=currentPage - 1 < startPage ? startPage : currentPage - 1;
//                         $('.isotope-pagination-container a').removeClass("active");
//                         $('.pager[data-page="'+page+'"]').addClass('active');
//                         goToPage(page, currentFilter);
//                     }
//                     else {
//                         $('.isotope-pagination-item-prev').attr('disabled','disabled');
//                     }
    
//                 });

//                 $page_next_btn.click(function(){
//                     scrollToTop();
//                     if( currentPage < currentNumberPages) {
//                         $('.isotope-pagination-item-next').removeAttr('disabled');
//                         var page=currentPage + 1 > currentNumberPages ? currentNumberPages : currentPage + 1;
//                         $('.isotope-pagination-container a').removeClass("active");
//                         $('.pager[data-page="'+page+'"]').addClass('active');
//                         goToPage(page, currentFilter);
//                     }
//                     else {
//                         $('.isotope-pagination-item-next').attr('disabled','disabled');
//                     }
//                 });
//             }();
//         }

//         // Remove checks from all boxes and refilter
//         /* ------------------------------------------------------------------------ */
//         function clearAll(){
//            currentFilter = '*';
//            setPagination(currentFilter);
//            goToPage(1, currentFilter); //Attention pagination
//         }
 
//         // Set pagination et go to page
//         /* ------------------------------------------------------------------------ */
//         if (isMobile.any()) {
//             var currentFilter = $('#filters-list').val();
//         } else {
//             var currentFilter = $('.filter-button-group button.active').attr(filterAttribute);
//         }
//         setPagination(currentFilter);
//         goToPage(1, currentFilter);
     
//         // Change Filters tabs Event handler
//         /* ------------------------------------------------------------------------ */
//         $('.filter-button-group').on('click', 'button', function () {
//             $('.filter-button-group button.active').removeClass('active');
//             $(this).addClass('active');
//             var filter = $(this).attr(filterAttribute);
//             currentFilter = filter;
//             setPagination(currentFilter);
//             goToPage(1, currentFilter);
//         });

//         // MOBILE bind filter on select change
//         /* ------------------------------------------------------------------------ */
//         $('#filters-list').on( 'change', function() {
//             // get filter value from option value
//             var currentFilter = $(this).val();
//             setPagination(currentFilter);
//             goToPage(1, currentFilter);
//         });

//         // Force 1st tab to be active on loading
//         /* ------------------------------------------------------------------------ */
//         var allPosts = document.querySelector('#all-posts')
//         window.onload = (event) => {
//             /*var url = new URL(location);
//             url.searchParams.delete('dir');
//             history.pushState(null, document.title, url);*/
//             $('.filter-button-group button.active').removeClass('active');
//             $(this).addClass('active');
//             allPosts.click();
//             clearAll();
//         };

//         // Function on resizing window
//         /* ------------------------------------------------------------------------ */
//         if (!isMobile.any()) {
//             $(window).resize(function(){
//                 itemsPerPage = defineItemsPerPage();
//                 var currentFilter = $('.filter-button-group button.active').attr(filterAttribute);
//                 setPagination(currentFilter);
//                 goToPage(1, currentFilter);
//             });         
//         }

//         // Change Chronological order Event handler
//         /* ------------------------------------------------------------------------ */

//         // bind sort button hover
//         $('.sort-by-button-group').on("mouseenter", 'button', function() {

//             /* Get the sorting direction: asc||desc */
//             var directionText = $(this).find('span.text');

//             directionText.text($(this).text() == 'Les plus récents' ? 'Les moins récents' : 'Les plus récents');
            
//             var span = $(this).find('.sort-icon');
//             span.toggleClass('chevron-up chevron-down');
            
//         });

//         // bind sort button hover
//         $('.sort-by-button-group').on("mouseleave", 'button', function() {

//             /* Get the sorting direction: asc||desc */
//             var direction = $(this).attr('data-sort-direction');

//             /* convert it to a boolean */
//             var isAscending = (direction == 'asc');
//             /* change button text */
//             var newText = (isAscending) ? 'Les moins récents' : 'Les plus récents';
//             $(this).find('span.text').text(newText);
            
//             var span = $(this).find('.sort-icon');
//             var newChevronClass = (isAscending) ? 'chevron-up' : 'chevron-down';
//             span.removeClass("chevron-up");
//             span.removeClass("chevron-down");
//             span.addClass(newChevronClass);
            
//         });

//         // bind sort button click
//         $('.sort-by-button-group').on( 'click', 'button', function() {

//             $(this).off("mouseenter");
            
//             /* Get the element name to sort */
//             var sortValue = $(this).attr('data-sort-value');

//             /* Get the sorting direction: asc||desc */
//             var direction = $(this).attr('data-sort-direction');
//             /* convert it to a boolean */
//             var isAscending = (direction == 'desc');
//             var newDirection = (isAscending) ? 'asc' : 'desc';

//             /* pass it to isotope */
//             $grid.isotope({ sortBy: sortValue, sortAscending: isAscending });

//             $(this).attr('data-sort-direction', newDirection);

//             /* change button text */
//             var newText = (isAscending) ? 'Les plus récents' : 'Les moins récents';
//             /* change a href direction */
//             $(this).find('span.text').text(newText);
//             // $(this).attr("href", newDirection);
            
//             var span = $(this).find('.sort-icon');
//             var newChevronClass = (isAscending) ? 'chevron-up' : 'chevron-down';
//             span.removeClass("chevron-up");
//             span.removeClass("chevron-down");
//             span.addClass(newChevronClass);

//             if (isMobile.any()) {
//                 var currentFilter = $('#filters-list').val();
//             } else {
//                 var currentFilter = $('.filter-button-group button.active').attr(filterAttribute);
//             }
//             setPagination(currentFilter);
//             goToPage(1, currentFilter);

//             $(this).off("mouseleave");

//         });
 
//     }
// });


// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  Boutique filter
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/

// // init Isotope
// /* ------------------------------------------------------------------------ */
// jQuery(document).ready(function ($) {
//     if ($('body.page-template-boutique').length) {

//         var itemsPerPage = 12; // Nombre d'éléments par page
//         var currentPage = 1; // Nombre de pages
//         var filteredCards = []; // Tableau pour stocker les cartes filtrées

//         const checkboxes = document.querySelectorAll('.category-checkbox');
//         const cards = document.querySelectorAll('.card-item');
//         const buttonTotal = document.querySelector('.totalProduct button span');
//         var totalItems = cards.length;

//         $('.isotope-button-container button').on('click', function() {
//             currentPage+=1;
//             showItems();
//             if (totalItems <= itemsPerPage * currentPage) {
//                 $(this).css('display', 'none');
//             }
//         });

//         function applyFilters() {
//             const selectedCategories = [];

//             checkboxes.forEach(function (checkbox) {
//                 if (checkbox.checked) {
//                     const category = checkbox.getAttribute('data-category');
//                     selectedCategories.push(category);
//                 }
//             });

//             filteredCards = Array.from(cards).filter(function (card) {
//                 const cardCategory = $(card).data('category').toLowerCase();
//                 const cardCategoryArray = cardCategory.split(" ");
//                 const allElementsIncluded = selectedCategories.every(category => cardCategoryArray.includes(category));
//                 return allElementsIncluded;
//             });

//             totalItems = filteredCards.length; // Mettre à jour le nombre total d'éléments après la filtration
//             currentPage = 1; // Réinitialiser la page actuelle à la première page
//             buttonTotal.textContent = `(${totalItems})`;

//         }

//         function showItems() {
//             const numberCard = itemsPerPage * currentPage;
//             if (totalItems <= numberCard) {
//                 $('.isotope-button-container button').css('display', 'none');
//             }
//             filteredCards.forEach(function (card) {
//                 card.style.display = 'none';
//             });
//             for (i = 0; i < numberCard; i++ ){
//                 if (filteredCards[i]) {
//                     filteredCards[i].style.display = 'block';
//                 }
//             }
//         }
//         applyFilters(); // Appliquer les filtres lors du chargement de la page
//         showItems();
//         $(".totalProduct button").click(function() {
//             var cardItems = document.querySelectorAll('.product-list .card-item');
//             // Applique display: none; à chaque élément
//             cardItems.forEach(function(item) {
//                 item.style.display = 'none';
//             });
//             showItems();
//         });

//         checkboxes.forEach(function (checkbox) {
//             checkbox.addEventListener('change', applyFilters);
//         });
//     }

//     /**
//      * --------------------------------------------------------------------------------------------------------------
//      *                                                  Change Hover Image
//      * --------------------------------------------------------------------------------------------------------------
//      */
//     /**/

//     var produitCardImages = document.querySelectorAll('.produit-card-img.produit-card-hover');
//     produitCardImages.forEach(function(img) {
//         var hoverImage = img.dataset.hoverImage;
//         var originalImage = img.getAttribute('src');
    
//         if (hoverImage) {
//             img.addEventListener('mouseenter', function() {
//                 img.style.opacity = 0; // Réduire l'opacité à 0
//                 img.style.transition = 'opacity 0.1s'; // Ajouter une transition d'opacité de 0.2 seconde
    
//                 // Attendre un court délai pour permettre la transition
//                 setTimeout(function() {
//                     img.src = hoverImage;
//                     img.style.opacity = 1; // Rétablir l'opacité à 1
//                 }, 200);
//             });
    
//             img.addEventListener('mouseleave', function() {
//                 img.style.opacity = 0; // Réduire l'opacité à 0
//                 img.style.transition = 'opacity 0.1s'; // Ajouter une transition d'opacité de 0.2 seconde
    
//                 // Attendre un court délai pour permettre la transition
//                 setTimeout(function() {
//                     img.src = originalImage;
//                     img.style.opacity = 1; // Rétablir l'opacité à 1
//                 }, 200);
//             });
//         }
//     });    
// });


// /**
//  * --------------------------------------------------------------------------------------------------------------
//  *                                                  Model : Search Bar
//  * --------------------------------------------------------------------------------------------------------------
//  */
// /**/

// if(document.querySelectorAll('.headerSearchBar')){ // search bar

//     document.querySelectorAll('.headerSearchBar').forEach(e => {
//         const searchResults = document.createElement('div')
//         searchResults.classList.add('search_result')
//         searchResults.id = 'datafetch'
//         searchResults.innerHTML = `<ul class="sub-menu"><li style="display:flex;justify-content:center;"> <img src="/wp-content/uploads/2023/11/loading.gif" width="20"></li></ul>`
//         // console.log(e);
//         e.append(searchResults)
//     })
    
//     jQuery(document).ready(function($) { // wordpress native search minimaliste
//         document.querySelectorAll('.headerSearchBar').forEach(e => {
//             e.addEventListener('input', (e) => {
//                 e.preventDefault();
//                 if (e.target.value.length > 1) {
//                     // console.log(e.target.parentElement.querySelector('.search-form-icon'));
//                     fetch();
//                     e.target.parentElement.parentElement.parentElement.parentElement.querySelector(".search_result").style.display = "block"
//                 } else {
//                     e.target.parentElement.parentElement.parentElement.parentElement.querySelector(".search_result").style.display = "none"
//                 }
//                 if (e.target.value.length > 0) {
//                     e.target.classList.add('cross')
//                     e.target.parentElement.querySelector('.search-form-icon').style.display = "none"
//                     //e.target.parentElement.querySelector('.search-form-icon i').classList.remove('fa-search');
//                     //e.target.parentElement.querySelector('.search-form-icon i').classList.add('fa-times');

//                 } else {
//                     e.target.parentElement.querySelector('.search-form-icon').style.display = "flex"
//                     e.target.classList.remove('cross')
//                     //e.target.parentElement.querySelector('.search-form-icon i').classList.remove('fa-times');
//                     //e.target.parentElement.querySelector('.search-form-icon i').classList.add('fa-search');
//                 }

//                 jQuery.ajax({
//                     url: '/wp-admin/admin-ajax.php',
//                     type: 'post',
//                     data: { 
//                         action: 'data_fetch',
//                         keyword: e.target.value 
//                     },
//                     success: function(data) {
//                         if(data){
//                             e.target.parentElement.parentElement.parentElement.parentElement.querySelector(".search_result").innerHTML = data;
//                         }else{
//                             e.target.parentElement.parentElement.parentElement.parentElement.querySelector(".search_result").innerHTML = `<ul class="sub-menu"><li style="display:flex;justify-content:center;"><p class="noResults" style="margin-bottom:0;">Pas de résultats.<p/></ul>`
//                         } 
//                     }
//                 });

//             })
//         })
//     })
// }




