<?php 
/* Template Homepage */

// If the header needs to change a specific color with this template, then define it :
//$header_color = '#000000';


echo do_shortcode('[shortcode-home-section]'); 

echo do_shortcode('[shortcode-boutique-section]');

$realisation_title = "Nos réalisations";
echo do_shortcode('[shortcode-histoire-section]');
echo do_shortcode('[shortcode-realisation-section titre="'.$realisation_title.'"]');
echo do_shortcode('[shortcode-influence-section]');
echo do_shortcode('[shortcode-contact-section]');

get_footer() ?>

<script>
// Sélectionnez le conteneur de pagination
const paginationContainer = document.querySelector('.pagination-container');

const swiperSlides = document.querySelectorAll('.swiper-slide');

// Obtenez le nombre total de diapositives
const totalSlides = swiperSlides.length;


// Générez les bulles de pagination
for (let i = 0; i < totalSlides; i++) {
  // Créez une bulle de pagination
  const bullet = document.createElement('span');
  bullet.classList.add('pagination-bullet');
  bullet.setAttribute('data-slide', i);
  
  // Ajoutez un gestionnaire d'événement pour cliquer sur la bulle
  bullet.addEventListener('click', () => {
    // Changez de diapositive en fonction de l'index de la bulle
    swiper.slideTo(i);
  });
  
  // Ajoutez la bulle au conteneur de pagination
  paginationContainer.appendChild(bullet);
}

const swiperContainer = document.querySelector('.swiper-container');
const activeSlide = swiperContainer.querySelector('.swiper-slide.swiper-slide-active');
const activeSlideIndex = Array.from(swiperContainer.querySelectorAll('.swiper-slide')).indexOf(activeSlide);

const paginationBullets = document.querySelectorAll('.pagination-bullet');

// Parcourez toutes les bulles de pagination
paginationBullets.forEach((bullet, index) => {
    // Vérifiez si la slide correspond à l'index de la bulle
    if ((index - 1) === (activeSlideIndex)) {
    // Appliquez un style différent à la bulle de la slide active
    bullet.classList.add('active');
    } else {
    // Supprimez le style de la bulle des autres slides
    bullet.classList.remove('active');
    }
});


</script>
