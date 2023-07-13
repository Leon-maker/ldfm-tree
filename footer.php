<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// custom footer
get_template_part( 'template-parts/footer' );

// core footer
//wp_footer(); ?>
<script>
window.addEventListener('DOMContentLoaded', function() {
  var sections = document.querySelectorAll('.fade-section');

  function checkScroll() {
    sections.forEach(function(section) {
      var sectionTop = Math.round(section.getBoundingClientRect().top);
      var windowHeight = Math.round(window.innerHeight);
	  console.log(sectionTop);
	  console.log(windowHeight);

      if ((sectionTop + 400) < windowHeight) {
        section.classList.add('fade-in');
      }
    });
  }

  window.addEventListener('scroll', checkScroll);
  checkScroll();
});
</script>



</body>
</html>