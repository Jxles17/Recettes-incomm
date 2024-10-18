<?php

/*REMOVE EMOJI*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );

remove_action( 'wp_print_styles', 'print_emoji_styles' );

add_filter( 'use_default_gallery_style', '__return_false' );

add_filter( 'wpcf7_autop_or_not', '__return_false' ); //remove cf7 <p>

add_theme_support( 'post-thumbnails' );

add_action( 'after_setup_theme', 'theme_setup' );


function theme_setup() {
      if ( function_exists( 'add_theme_support' ) ) {
        add_image_size( 'picslide', 1500, 900, array( 'center', 'center' ) );
        add_image_size( 'portrait', 455, 271, true );
        add_image_size( 'plan', 300, 300, false );
        add_image_size( 'topinter', 1000, 160, true );
        add_image_size( 'imagette', 300, 140, true );
    }

}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(

        'picslide' => __( 'picslide' ),
        'portrait' => __( 'portrait' ),
        'plan' => __( 'plan' ),
        'topinter' => __( 'topinter' ),
        'imagette' => __( 'imagette' )

    ) );
}

register_nav_menus(array(
    'header' => 'Menu principal (header)',
	'footer' => 'Menu pied de page (footer)'
));




function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}


// Function that will return our Wordpress menu
function list_menu($atts, $content = null) {
    extract(shortcode_atts(array(
        'menu'            => '',
        'container'       => 'div',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'depth'           => 0,
        'walker'          => '',
        'theme_location'  => ''),
        $atts));


    return wp_nav_menu( array(
        'menu'            => $menu,
        'container'       => $container,
        'container_class' => $container_class,
        'container_id'    => $container_id,
        'menu_class'      => $menu_class,
        'menu_id'         => $menu_id,
        'echo'            => false,
        'fallback_cb'     => $fallback_cb,
        'before'          => $before,
        'after'           => $after,
        'link_before'     => $link_before,
        'link_after'      => $link_after,
        'depth'           => $depth,
        'walker'          => $walker,
        'theme_location'  => $theme_location));
}
//Create the shortcode
add_shortcode("listmenu", "list_menu");
function twentyten_get_gallery_images() {
    $images = array();

    if ( function_exists( 'get_post_galleries' ) ) {
        $galleries = get_post_galleries( get_the_ID(), false );
        if ( isset( $galleries[0]['ids'] ) )
            $images = explode( ',', $galleries[0]['ids'] );
    } else {
        $pattern = get_shortcode_regex();
        preg_match( "/$pattern/s", get_the_content(), $match );
        $atts = shortcode_parse_atts( $match[3] );
        if ( isset( $atts['ids'] ) )
            $images = explode( ',', $atts['ids'] );
    }

    if ( ! $images ) {
        $images = get_posts( array(
            'fields'         => 'ids',
            'numberposts'    => 999,
            'order'          => 'ASC',
            'orderby'        => 'menu_order',
            'post_mime_type' => 'image',
            'post_parent'    => get_the_ID(),
            'post_type'      => 'attachment',
        ) );
    }

    return $images;
}


add_filter( 'wp_nav_menu_objects', 'submenu_limit', 10, 2 );

function submenu_limit( $items, $args ) {
    if ( empty( $args->submenu ) ) {
        return $items;
    }
    $ids       = wp_filter_object_list( $items, array( 'title' => $args->submenu ), 'and', 'ID' );
    $parent_id = array_pop( $ids );
    $children  = submenu_get_children_ids( $parent_id, $items );
    foreach ( $items as $key => $item ) {
        if ( ! in_array( $item->ID, $children ) ) {
            unset( $items[$key] );
        }
    }
    return $items;
}

/**/
function submenu_get_children_ids( $id, $items ) {
    $ids = wp_filter_object_list( $items, array( 'menu_item_parent' => $id ), 'and', 'ID' );
    foreach ( $ids as $id ) {
        $ids = array_merge( $ids, submenu_get_children_ids( $id, $items ) );
    }
    return $ids;
}


// passer par recaptcha.net au lieu de google.com pour éviter un dépôt de cookie supp.
// Rajouter l'attribut data-requires-vendor-consent="gmaps" aux iframes google maps


add_action( 'wp_print_scripts', 'alter_src_recaptcha' );
function alter_src_recaptcha() {
global $wp_scripts;
$enqueued_scripts = array();
    foreach( $wp_scripts->queue as $handle ) {
        if (strpos($wp_scripts->registered[$handle]->src, 'www.google.com/recaptcha/api')
        !== false) {
            $wp_scripts->registered[$handle]->src = str_replace("google.com", "recaptcha.net",
            $wp_scripts->registered[$handle]->src);
        }
        $enqueued_scripts[] = $wp_scripts->registered[$handle]->src;
    }
}

function create_recette_cpt() {
    $labels = array(
        'name' => 'Recettes',
        'singular_name' => 'Recette',
        'menu_name' => 'Recettes',
        'add_new' => 'Ajouter nouvelle recette',
        'add_new_item' => 'Ajouter nouvelle recette',
        'edit_item' => 'Modifier la recette',
        'new_item' => 'Nouvelle recette',
        'view_item' => 'Voir la recette',
        'all_items' => 'Toutes les recettes',
        'search_items' => 'Chercher recettes',
        'not_found' => 'Aucune recette trouvée',
        'not_found_in_trash' => 'Aucune recette trouvée dans la corbeille'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'recettes'),
        'show_in_rest' => true, // Important pour l'éditeur Gutenberg
    );

    register_post_type('recettes', $args);
}
add_action('init', 'create_recette_cpt');


function mon_theme_enfant_enqueue_styles() {
    // Charger le style du thème parent
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    
    // Charger le style du thème enfant
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}
add_action('wp_enqueue_scripts', 'mon_theme_enfant_enqueue_styles');



?>
