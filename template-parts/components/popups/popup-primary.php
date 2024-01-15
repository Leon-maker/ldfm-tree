<?php
/* 
	Section : Type Popup Primary
*/

/** --------------------------------------------------------------------------------------------------------------
 *                                                  POST CORE DATAS
*/

$datas          = $args['datas'];

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  POST CUSTOM DATAS
 *                      Custom Datas : ACF Template Contents Order (Related and Dissociated)
*/

$type           = 'primary';
$trigger        = $datas['trigger'];
$name           = $datas['name'];
$content_choice = $datas['content-choice'];
$title_h3       = $datas['content']['title'];
$description    = $datas['content']['subtitle'];
$content        = $datas['content']['editor'];
$button_text    = $datas['content']['button-text'];
$button_link    = $datas['content']['button-link'];
$image_url      = $datas['image'];

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  TEMPLATE-PART FRONT STRUCTURE RENDER
*/

?>

<!--popup-->
<div <?php if($trigger !== "click"){ ?> style="display:none" <?php } ?> id="<?= $name; ?>" class="popup-container <?= $type . ' ' . $trigger ?>">
    <div class="popup-content <?php if ($content_choice === 'image') {echo 'image';} ?>">
        <a href="#" class="close">&times;</a>
        <?php if ($content_choice === 'content') : ?>
            <h3 class="text-center color-red"><?php echo $title_h3; ?></h3>
            <h4><strong><?= $description ?></strong></h4>
            <?= $content ?>
        <?php else : ?>
            <img src="<?= $image_url; ?>" alt="image popup de <?= $name; ?>" class="bkg-image">
        <?php endif; ?>
    </div>
</div>