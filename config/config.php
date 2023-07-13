<?php

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 Configuration du thème custom 
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

// Initialisation du thème
function init_theme() {

	add_theme_support('post-thumbnails');
	add_theme_support('html5');
	add_theme_support('title-tag');
	add_theme_support( 'align-wide' ); // https://capitainewp.io/formations/wordpress-creer-blocs-gutenberg/pleine-largeur-contenu-gutenberg/
	add_theme_support( 'custom-logo', array(
        'height'      => 175,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
     ) );
    // Register navigations menus
	register_nav_menus( array(
        'top-left'              => 'Top Left',
        'top-right'             => 'Top Right',
        'bottom'                => 'Bottom',
        'bottom-end'            => 'Bottom End',
        'burger-end'            => 'Burger End',
    ));

}
add_action('after_setup_theme', 'init_theme');


// Ajouter du css pour le back-office
function admin_css() {
	$admin_handle = 'admin_css';
	$admin_stylesheet = get_template_directory_uri() . '/styles/admin.css';

	wp_enqueue_style($admin_handle, $admin_stylesheet);
}
add_action('admin_print_styles', 'admin_css', 11);


// Javascript
wp_register_script(
    'script', 
    get_theme_file_uri('/scripts/main-script.js'), 
    array( 'jquery' ), 
    '1.0'
);
wp_enqueue_script('script');

// Active l'import de modules JS
add_filter("script_loader_tag", "make_script_a_module", 10, 3);
function make_script_a_module($tag, $handle, $src)
{
    if ("script" === $handle) {
        $tag = '<script async type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}

// Activer les images sur les articles
add_theme_support('post-thumbnails');

// CSS
wp_enqueue_style(
    'thrive',
    get_template_directory_uri() . '/styles/main.css',
    array(),
    '1.0'
);


/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 Add SVG to allowed file uploads
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    global $wp_version;
    if ( $wp_version !== '4.7.1' ) {
       return $data;
    }
    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  }, 10, 4 );
  function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }
  add_filter( 'upload_mimes', 'cc_mime_types' );
  function fix_svg() {
    echo '';
  }
  add_action( 'admin_head', 'fix_svg' );

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 Add WEBP allowed image file uploads
 * --------------------------------------------------------------------------------------------------------------
 */
// Autoriser l'import des fichiers WEBP
function capitaine_mime_types( $mimes ){
    $mimes['webp'] = 'image/webp';
    return $mimes;
}

// Contrôle de l'import d'un WEBP
function capitaine_file_types( $types, $file, $filename, $mimes ) {
	if ( false !== strpos( $filename, '.webp' ) ) {
    	$types['ext'] = 'webp';
   		$types['type'] = 'image/webp';
	}
	return $types;
}

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 Add ico  allowed image file uploads
 * --------------------------------------------------------------------------------------------------------------
 */
function add_ico_to_upload_mimes( $upload_mimes ) {
    $upload_mimes['ico'] = 'image/x-icon';
    return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_ico_to_upload_mimes' );

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 Add WOFF & WOFF2 allowed fonts files uploads
 * --------------------------------------------------------------------------------------------------------------
 */
/**/
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $new_filetypes['woff'] = 'font/woff';
    $new_filetypes['woff2'] = 'font/woff2';
    $new_filetypes['ttf'] = 'font/ttf';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  MAX uploads sizes & time executions
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

@ini_set( 'upload_max_size' , '256M' );
@ini_set( 'post_max_size', '256M');
@ini_set( 'max_execution_time', '50000' );

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 Change WP connect link
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

function wpb_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );
 
function wpb_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 Hide Admin panel based on role
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

function tf_check_user_role( $roles ) {
    /*@ Check user logged-in */
    if ( is_user_logged_in() ) :
        /*@ Get current logged-in user data */
        $user = wp_get_current_user();
        /*@ Fetch only roles */
        $currentUserRoles = $user->roles;
        /*@ Intersect both array to check any matching value */
        $isMatching = array_intersect( $currentUserRoles, $roles);
        $response = false;
        /*@ If any role matched then return true */
        if ( !empty($isMatching) ) :
            $response = true;        
        endif;
        return $response;
    endif;
}
$roles = [ 'customer', 'subscriber' ];
if ( tf_check_user_role($roles) ) :
    add_filter('show_admin_bar', '__return_false');
endif;

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 AVATAR Shortcode to output custom PHP in Elementor 
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

function wpc_elementor_shortcode( $atts ) {
    if ( is_user_logged_in() ) {
        $current_user = wp_get_current_user();
        if ( ($current_user instanceof WP_User) ) {
            echo get_avatar( $current_user->ID, 192 );
        }
    }
}
add_shortcode( 'my_elementor_php_avatar', 'wpc_elementor_shortcode');
// https://capitainewp.io/autoriser-svg-webp-wordpress/
// SVG ET WEBP
add_filter( 'upload_mimes', 'capitaine_mime_types' );
add_filter( 'wp_check_filetype_and_ext', 'capitaine_file_types', 10, 4 );
/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                  Function to detect mobile devices 
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 TITLE/POSTS excerpt length  
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

function custom_title_length( $title ) {
    if ( strlen( $title ) > 58 ) {
        return substr( $title, 0, 58) . '…'; // change last number to the number of characters you want
    } else {
        return $title;
    }
}

function custom_excerpt_length( $length ) {
    if (isMobile()) {
        if ( strlen( $length ) > 80 ) {
            return substr( $length, 0, 80) . '…'; // change last number to the number of characters you want
        } else {
            return $length;
        }
    } else {
        if ( strlen( $length ) > 120 ) {
            return substr( $length, 0, 120) . '…'; // change last number to the number of characters you want
        } else {
            return $length;
        }
    }
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_length_slider( $length ) {
    if (isMobile()) {
        if ( strlen( $length ) > 70 ) {
            return substr( $length, 0, 70) . '…'; // change last number to the number of characters you want
        } else {
            return $length;
        }
    } else {
        if ( strlen( $length ) > 90 ) {
            return substr( $length, 0, 90) . '…'; // change last number to the number of characters you want
        } else {
            return $length;
        }
    }
}
add_filter( 'excerpt_length', 'custom_excerpt_length_slider', 999 );


function add_menu_link_class($atts, $item, $args) {
    if(isset($args->link_class)) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 10, 3);

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 Gravity Forms : Add French Phone Verification On All Forms
 * --------------------------------------------------------------------------------------------------------------
 */
/**/
add_filter( 'gform_phone_formats', 'fr_phone_format' );
function fr_phone_format( $phone_formats ) {
    $phone_formats['fr'] = array(
        'label'       => 'France',
        'mask'        => false,
        'regex'       => '/^0[1-9](\d{2}){4}$/',
        'instruction' => 'Introduisez les 10 chiffres sans espaces ni tirets.',
    );
 
    return $phone_formats;
}

/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 Google Maps API
 * --------------------------------------------------------------------------------------------------------------
 */
/**/
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyC2p1nVSwcAVGXQYMEkC1cQwfL1kLcum3U');
}
add_action('acf/init', 'my_acf_init');


/**
 * --------------------------------------------------------------------------------------------------------------
 *                                                 Masquer Articles/ Comments
 * --------------------------------------------------------------------------------------------------------------
 */
/**/

function masquer_cpt_comments() {
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'masquer_cpt_comments');

