<?php
function SHORTCODE_CTASecondary($arguments)
{
    ob_start();

    $arguments_array = shortcode_atts( array(
        'title' => "Insérez un titre",
        'link' => "",
        'class' => "",
    ), $arguments );

    ?>

    <a href="<?php echo $arguments_array['link'];?>"
       class="cta-secondary<?php
       // Si une ou des classes sont passées en paramètre, on les ajoute à la classe du shortcode
       if ($arguments_array['class'] != "") {
           echo " " . $arguments_array['class'];
       }
       ?>">
        <?php echo $arguments_array['title'];
        if ($arguments_array['class'] != "no-arrow") { ?>
            <span class="arrow"></span>
        <?php } ?>
    </a>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-cta_secondary', 'SHORTCODE_CTASecondary');
