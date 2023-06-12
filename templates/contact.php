<?php
/**
 * Template Name: Template Contact Page
 */

// If the header needs to change a specific color with this template, then define it :
//$header_color = '#000000';
if ($header_color) {
  get_header( '', array( 'header-color' => $header_color) ); 
} else {
  get_header();
}

$title_page = get_the_title(); ?> 

<section class="section-single nom-de-la-section bkg-white">
	<?php
	if(!isMobile()){ ?>
		<div class="section-title">
			<h1 class="text-center"><?php echo $title_page; ?></h1>
		</div>
	<?php } ?>

    <div class="columns-wrapper">
        <?php if(isMobile()){ ?>
			<div class="section-title">
				<h1><?php echo $title_page; ?></h1>
			</div>
		<?php } ?>

        <div class="left-container">
		</div>
    </div>
</section>

<section class="page-contact no-margin-top next-section-ascend no-margin-bottom">
	<div class="wrap bkg-yellow">

		<div class="left-content">
			<div class="contact">
        <section class="bkg-wrapper breadcrumb-container bkg-pink">
          <?php echo do_shortcode('[shortcode-fil_ariane title2="Contact"]'); ?>
        </section>
      </div>

			<section class="nav">

				<div class="left-content">
					<div class="contact-menu">
						<ul>
							<li>
								<h3>COORDONNÉES</h3>
							</li>
							<li>
                <a href="tel:0611182430">06 07 08 09 10</a>
              </li>
              <li>
                <a href="mailto:hello@escapethecity.fr">wordpress@agencethrive.fr</a>
              </li>
						</ul>
					</div>

					<div class="social-media-menu">
						<div class="wrap">
							<?php get_template_part( 'template-parts/navigation/nav', 'social' ); ?>
						</div>
					</div>
          
				</div>

				<div class="right-content">
				</div>				

			</section>
		</div>

		<div class="right-content">
			<div class="formulaire contact">
        <h3>Formulaire</h3>
        <?php echo do_shortcode('[gravityform id="1" title="true"]'); ?>
			</div>
		</div>

	</div>

</section>
<script>
  var x, i, j, l, ll, selElmnt, a, b, c;
  /*look for any elements with the class "custom-select":*/
  x = document.getElementsByClassName("ginput_container_select");
  l = x.length;
  for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV"); 
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 0; j < ll; j++) {
      /*for each option in the original select element,
      create a new DIV that will act as an option item:*/
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[j].innerHTML;  
      c.addEventListener("click", function(e) {
          /*when an item is clicked, update the original select box,
          and the selected item:*/
          var y, i, k, s, h, sl, yl;
          s = this.parentNode.parentNode.getElementsByTagName("select")[0];
          sl = s.length;
          h = this.parentNode.previousSibling;
          for (i = 0; i < sl; i++) {
            if (s.options[i].innerHTML == this.innerHTML) {
              s.selectedIndex = i;
              h.innerHTML = this.innerHTML;
              y = this.parentNode.getElementsByClassName("same-as-selected");
              yl = y.length;
              for (k = 0; k < yl; k++) {
                y[k].removeAttribute("class");
              }
              this.setAttribute("class", "same-as-selected");
              break;
            }
          }
          h.click();
      });
      b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
      });
  }
  function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
      if (elmnt == y[i]) {
        arrNo.push(i)
      } else {
        y[i].classList.remove("select-arrow-active");
      }
    }
    for (i = 0; i < xl; i++) {
      if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
      }
    }
  }
  /*if the user clicks anywhere outside the select box,
  then close all select boxes:*/
  document.addEventListener("click", closeAllSelect);
</script>


<?php
get_footer();
?>