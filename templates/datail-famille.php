<?php
/**
 * Template Name: Template Detail Famille Page
 */

$id_correspondant = $_GET['id']; // Récupérer l'ID de l'URL

 // Utiliser l'ID récupéré pour afficher les détails correspondants
echo do_shortcode('[tree id="' . $id_correspondant . '"]');