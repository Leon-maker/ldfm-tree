<?php

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
        'menu_position' => 35,
        'menu_icon' => 'dashicons-welcome-write-blog',
        'show_in_menu' => true
    );
    register_post_type('marque', $args);

}
add_action( 'init', 'thrive_register_post_types_MARQUE' );

function enregistrer_types_publication_genealogie() {

    // Labels personnalisés pour le type de publication
    $labels = array(
        'name' => 'Membres de la famille',
        'singular_name' => 'Membre de la famille',
        'menu_name' => 'Membres de la famille',
        'all_items' => 'Tous les membres de la famille',
        'not_found' => 'Aucun membre de la famille trouvé',

        'add_new' => 'Ajouter un membre de la famille',
        //'edit_item' => 'Modifier le membre de la famille',
        // 'new_item' => 'Nouveau membre',
        // 'view_item' => 'Voir le membre de la famille',
        // 'view_items' => 'Voir les membres de la famille',
        // 'search_items' => 'Rechercher des membres de la famille',
        // 'not_found_in_trash' => 'Aucun membre de la famille trouvé dans la corbeille',
        // 'archives' => 'Archives des membres de la famille',
        // 'attributes' => 'Attributs du membre de la famille',
        // 'insert_into_item' => 'Insérer dans le membre de la famille',
        // 'uploaded_to_this_item' => 'Téléchargé pour ce membre de la famille',
        // 'filter_items_list' => 'Filtrer la liste des membres de la famille',
        // 'items_list_navigation' => 'Navigation dans la liste des membres de la famille',
        // 'items_list' => 'Liste des membres de la famille',
        // 'item_published' => 'Membre de la famille publié.',
        // 'item_published_privately' => 'Membre de la famille publié en privé.',
        // 'item_reverted_to_draft' => 'Membre de la famille rétabli en brouillon.',
        // 'item_scheduled' => 'Membre de la famille planifié.',
        // 'item_updated' => 'Membre de la famille mis à jour.',
    );

    // Arguments pour le type de publication personnalisé
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true, // Activer la prise en charge de l'API REST
        'has_archive' => true, // Activer les archives
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'), // Prise en charge des fonctionnalités
        'menu_position' => 35, // Position dans le menu d'administration
        'menu_icon' => 'dashicons-groups', // Icône dans le menu d'administration
        'show_in_menu' => true, // Afficher dans le menu d'administration
    );

    // Enregistrer le type de publication personnalisé
    register_post_type('membre_famille', $args);

}
add_action('init', 'enregistrer_types_publication_genealogie');
