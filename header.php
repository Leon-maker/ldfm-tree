<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/82bd8e2047.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

<?php
get_template_part(
    'template-parts/header',
    null,
    array(
        'header-color' => $header_color
    )
);
?>
