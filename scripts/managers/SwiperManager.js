export default class SwiperManager {
    constructor(parentContainer, options = {}) {
        this._parentContainer = parentContainer;
        this._swiperContainer = this._parentContainer.querySelector('.swiper-container');
        this._swiperWrapper = options.wrapper ? this._swiperContainer.querySelector(`.${options.wrapper}`) : this._swiperContainer.querySelector('.swiper-wrapper');
        this._swiperSlides = this._swiperWrapper.querySelectorAll('.swiper-slide');
        this._swiperNext = this._swiperContainer.querySelector('.swiper-button-next');
        this._swiperPrev = this._swiperContainer.querySelector('.swiper-button-prev');

        this._swiper = null;

        this._options = options;

        this._init();
        this._initDefaultListeners();
    }

    /**
     * Init the swiper
     * @private
     */

    _init() {
        // I want to have 3 slides per view but the 4th one should be the first one when I click on the next button
        this._swiper = new Swiper(this._swiperContainer, {
            slidesPerGroup: this._options.slidesPerGroup || 1,
            slidesPerView: this._options.slidesPerView || 1,
            spaceBetween: this._options.spaceBetween || 0,
            breakpoints: this._options.breakpoints || 0,
            autoplay: this._options.autoplay || false,
            disableOnInteraction: this._options.disableOnInteraction || false,
            loop: this._options.loop || false,

            // Custom wrapper
            wrapperClass: this._options.wrapper || 'swiper-wrapper',

            // Custom slide
            slideClass: this._options.items || 'swiper-slide',

            centeredSlides: this._options.centeredSlides || false,
            centeredSlidesBounds: this._options.centeredSlidesBounds || false,
            watchSlidesVisibility: this._options.watchSlidesVisibility || true,
            watchSlidesProgress: this._options.watchSlidesProgress || true,
            watchOverflow: this._options.watchOverflow || true,

            loopedSlides: this._options.loopedSlides || 7,
            freeMode: this._options.freeMode ? this._options.freeMode : false,
            mousewheel: this._options.mousewheel || false,
            speed: (this._options.speed) ? 300 : (this._options.slidesPerGroup > 1) ? 600 : 300,
            grabCursor: this._options.grabCursor || false,
            mousewheelControl: this._options.mousewheelControl || false,
            keyboardControl: this._options.keyboardControl || false,

            navigation: {
                nextEl: this._swiperNext,
                prevEl: this._swiperPrev,
            },
            thumbs: {
                swiper:  this._swiper
            },

        });
    }

    /**
     * Public methods
     * @public
     */
    addEventListener(event, callback) {
        this._swiper.on(event, callback);
    }

    get swiper() {
        return this._swiper;
    }

    /**
     * Private methods
     * @private
     */
    _initDefaultListeners() {
        // Gestion du bouton suivant
        /*this._swiperNext && this._swiperNext.addEventListener('click', () => {
            this._swiper.slideNext();
        });

        // Gestion du bouton précédent
        this._swiperPrev && this._swiperPrev.addEventListener('click', () => {
            this._swiper.slidePrev();
        });*/

        // Gestion de la désactivation des boutons suivant et précédent
        if (!this._options.loop) {
            this._swiper.on('slideChange', () => {
                if (this._swiper.isBeginning) {
                    this._swiperPrev.classList.add('swiper-button-disabled');
                } else {
                    this._swiperPrev.classList.remove('swiper-button-disabled');
                }

                if (this._swiper.isEnd) {
                    this._swiperNext.classList.add('swiper-button-disabled');
                } else {
                    this._swiperNext.classList.remove('swiper-button-disabled');
                }
            });
        }
    }
}
