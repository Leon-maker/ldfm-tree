<?php
function SHORTCODE_CTAPrimary($arguments)
{
    ob_start();

    $arguments_array = shortcode_atts( array(
        'title' => "Insérez un titre",
        'link' => "",
        'class' => "",
        'external-link' => false
    ), $arguments );

    ?>

    <a href="<?php echo $arguments_array['link'];?>"
        <?php if ($arguments_array['external-link'] == "true") {
            echo 'target="_blank" ';
        }?>
       class="cta-primary<?php
            // Si une ou des classes sont passées en paramètre, on les ajoute à la classe du shortcode
            if ($arguments_array['class'] != "") {
                echo " " . $arguments_array['class'];
            }
        ?>">
        <?php echo $arguments_array['title'];?>
    </a>

    <?php
    return ob_get_clean();
}

add_shortcode('shortcode-cta_primary', 'SHORTCODE_CTAPrimary');
