<?php

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  TEMPLATE-PART DEDICATED VARIABLES GET FROM PASSED ARGUMENTS 
*/
// var_dump($args);
/* Custom Datas : Section Le centre en images */	 	 			
$galleryArray      		= $args['galleryArray']; // Datas from ACF Queries	


/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  TEMPLATE-PART CONDITIONAL RENDER FROM PASSED TEMPLATE TYPE
*/

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  TEMPLATE-PART FRONT STRUCTURE RENDER
*/

// ACF Flexible Content loop ?>
<!-- SWIPER OF PICTURES -->
<div class="cards-img-container swiper main-swiper-images">
	<div class="swiper-wrapper">
		<?php 
		foreach($galleryArray as $image){
			if($image !== "" ){ ?>
				<div class='swiper-slide slide-img'>
					<img src="<?php echo $image; ?>" alt="Image du centre" class="img-item" />
				</div>
			<?php
			}
		} ?>
	</div>
	<div class="carousel-controller">
		<div class="swiper-pagination"></div>
		<div class="swiper-button-prev cta-swiper-first">
			<svg xmlns="http://www.w3.org/2000/svg" width="8.238" height="4.829" viewBox="0 0 8.238 4.829">
  				<path id="Tracé_23027" data-name="Tracé 23027" d="M14483.618,15579.327a.7.7,0,0,1-.5-.207l-3.413-3.41a.718.718,0,0,1,0-1,.716.716,0,0,1,.5-.211.7.7,0,0,1,.5.211l2.732,2.733.177.176,2.916-2.913a.686.686,0,0,1,.493-.207.71.71,0,0,1,.5,1.212l-3.413,3.41A.69.69,0,0,1,14483.618,15579.327Z" transform="translate(-14479.501 -15574.498)" fill="black"/>
			</svg>
		</div>
		<div class="swiper-button-next cta-swiper-first">
			<svg xmlns="http://www.w3.org/2000/svg" width="8.238" height="4.829" viewBox="0 0 8.238 4.829">
				<path id="Tracé_23027" data-name="Tracé 23027" d="M14483.618,15579.327a.7.7,0,0,1-.5-.207l-3.413-3.41a.718.718,0,0,1,0-1,.716.716,0,0,1,.5-.211.7.7,0,0,1,.5.211l2.732,2.733.177.176,2.916-2.913a.686.686,0,0,1,.493-.207.71.71,0,0,1,.5,1.212l-3.413,3.41A.69.69,0,0,1,14483.618,15579.327Z" transform="translate(-14479.501 -15574.498)" fill="black"/>
			</svg>
		</div>
	</div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script type="module">
    // SWIPER JS
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'
    const mainSwiperImages = new Swiper('.main-swiper-images', {
        loop: false,
        slidesPerView: "auto",
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: 'true'
        },
        mousewheel: {
            enabled: false,
        },
        keyboard: {
            enabled: false,
        },
        allowSlidePrevMouse: false,
        allowSlideNextMouse: false,
    });

    const swipers = document.querySelectorAll(".main-swiper-images");

    swipers.forEach((swiper) => {
        const images = swiper.querySelectorAll(".slide-img");
        const prevArrow = swiper.querySelector(".swiper-button-prev-img");
        const nextArrow = swiper.querySelector(".swiper-button-next-img");
        let index = 0;

        prevArrow.addEventListener("click", () => {
            index = index - 1;
            if (index > 0) {
                prevArrow.style.opacity = 1;
            } else {
                prevArrow.style.opacity = 0;
            }
            if (index < images.length - 1) {
                nextArrow.style.opacity = 1;
            }
        });

        nextArrow.addEventListener("click", () => {
            index = index + 1;
            if (index < images.length - 1) {
                nextArrow.style.opacity = 1;
            } else {
                nextArrow.style.opacity = 0;
            }
            if (index > 0) {
                prevArrow.style.opacity = 1;
            }
        });
    });
</script>
