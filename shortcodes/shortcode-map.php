<?php
function SHORTCODE_Map()
{
    ob_start();
    $map = get_field("informations_pratiques");
    $mapp = $map['adresse'];
    ?>
    <div class="acf-map" data-zoom="16">
            <div class="marker" data-lat="<?php echo esc_attr($mapp['lat']); ?>" data-lng="<?php echo esc_attr($mapp['lng']); ?>"></div>
    </div><?php
    return ob_get_clean();
}

add_shortcode('shortcode-map', 'SHORTCODE_Map');
?>