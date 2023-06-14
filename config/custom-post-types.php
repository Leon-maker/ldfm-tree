<?php
/** ========== CUSTOM POSTS TYPES ========== **/
// CPT EXAMPLE, REMPLACER <NOM DU CPT> PAR LE NOM DU CPT
//function thrive_register_post_types_<NOMDUCPT>() {
//
//    $labels = array(
//        'name' => '<NOM DU CPT>',
//        'all_items' => 'Toutes les <NOM DES CPTs>',
//        'singular_name' => '<NOM DU CPT>',
//        'add_new_item' => 'Ajouter une <NOM DU CPT>',
//        'add_new' => 'Ajouter une <NOM DU CPT>',
//        'edit_item' => 'Modifier la <NOM DU CPT>',
//        'menu_name' => '<NOM DES CPTs>'
//    );
//
//    $args = array(
//        'labels' => $labels,
//        'public' => true,
//        'show_in_rest' => true,
//        'has_archive' => true,
//        'supports' => array('title', 'custom-fields'),
//        'menu_position' => 5,
//        'menu_icon' => 'dashicons-admin-customizer',
//        'show_in_menu' => true
//    );
//    register_post_type('<NOM DU CPT>', $args);
//
//}
//add_action( 'init', 'thrive_register_post_types_<NOM DU CPT>' );


function thrive_register_post_types_MARQUE() {

    $labels = array(
        'name' => 'Marque',
        'all_items' => 'Toutes les marques',
        'singular_name' => 'marque',
        'add_new_item' => 'Ajouter une marque',
        'add_new' => 'Ajouter une marque',
        'edit_item' => 'Modifier la marque',
        'menu_name' => 'Marques'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'supports' => array('title', 'custom-fields'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-customizer',
        'show_in_menu' => true
    );
    register_post_type('marque', $args);

}
add_action( 'init', 'thrive_register_post_types_MARQUE' );

