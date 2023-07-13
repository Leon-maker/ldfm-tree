<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
  
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<?php wp_body_open(); 

// If the header needs to change a specific color from any template, then get it :
$header_color = $args['header-color']; 
// Else define its main color
if (empty($header_color)) {
    $header_color = '#000000';
}

get_template_part(
    'template-parts/header',
    null,
    array(
        'header-color' => $header_color
    )
);
?>
