<?php

// CSS Styles declaration
function theme_enqueue_styles() {
    // Load theme personalized css
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/assets/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function register_menus() {
    
    register_nav_menus(
        array(
            'header-menu' => esc_html__( 'header', 'on header location' ),
            'footer-menu'  => esc_html__( 'footer', 'on footer location' ),
        )
    );
}
add_action( 'after_setup_theme', 'register_menus' );

// Java scripts declaration
function theme_enqueue_scripts() {
        // contact modal
       wp_enqueue_script( 'contact-modal-script', get_stylesheet_directory_uri() . '/assets/js/contact-modal.js', array(), '1.0', true );
        // single custom type page
		wp_enqueue_script( 'single-cpt-script', get_stylesheet_directory_uri() . '/assets/js/single_fiche_photo.js', array(), '1.0', true );
 
   }
   add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );

// suppression of HTML "p" tag generated by plugin contact form7
add_filter('wpcf7_autop_or_not', '__return_false');

/*
function cptui_register_my_cpts_fiche_photo() {

	/**
	 * Post Type: Catalogue photos.
	 */
/*
	$labels = [
		"name" => esc_html__( "Catalogue photos", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "Fiche photo", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "Mes Photos", "custom-post-type-ui" ),
		"all_items" => esc_html__( "Toutes les Photos", "custom-post-type-ui" ),
		"add_new" => esc_html__( "Ajouter une nouvelle photo", "custom-post-type-ui" ),
		"add_new_item" => esc_html__( "Ajouter une nouvelle photo", "custom-post-type-ui" ),
		"edit_item" => esc_html__( "Modifier une photo", "custom-post-type-ui" ),
		"new_item" => esc_html__( "Nouvelle photo", "custom-post-type-ui" ),
		"view_item" => esc_html__( "Voir Photo", "custom-post-type-ui" ),
		"view_items" => esc_html__( "Voir les photos", "custom-post-type-ui" ),
		"search_items" => esc_html__( "Recherche une photo", "custom-post-type-ui" ),
		"not_found" => esc_html__( "Aucune photo trouvée", "custom-post-type-ui" ),
		"not_found_in_trash" => esc_html__( "Aucune photo trouvée dans la corbeille", "custom-post-type-ui" ),
		"parent" => esc_html__( "Photo parent :", "custom-post-type-ui" ),
		"featured_image" => esc_html__( "Image mise en avant pour cette photo", "custom-post-type-ui" ),
		"set_featured_image" => esc_html__( "Définir l’image mise en avant pour cette photo", "custom-post-type-ui" ),
		"remove_featured_image" => esc_html__( "Retirer l’image mise en avant pour cette photo", "custom-post-type-ui" ),
		"use_featured_image" => esc_html__( "Utiliser comme image mise en avant pour cette photo", "custom-post-type-ui" ),
		"archives" => esc_html__( "Archives des photos", "custom-post-type-ui" ),
		"insert_into_item" => esc_html__( "Insérer dans la fiche Photo", "custom-post-type-ui" ),
		"uploaded_to_this_item" => esc_html__( "Téléverser sur cette fiche Photo", "custom-post-type-ui" ),
		"filter_items_list" => esc_html__( "Filtrer la liste des photos", "custom-post-type-ui" ),
		"items_list_navigation" => esc_html__( "Navigation de liste des photos", "custom-post-type-ui" ),
		"items_list" => esc_html__( "Liste de photos", "custom-post-type-ui" ),
		"attributes" => esc_html__( "Attributs des photos", "custom-post-type-ui" ),
		"name_admin_bar" => esc_html__( "Photo", "custom-post-type-ui" ),
		"item_published" => esc_html__( "Photo publiée", "custom-post-type-ui" ),
		"item_published_privately" => esc_html__( "Photo publiée en privé.", "custom-post-type-ui" ),
		"item_reverted_to_draft" => esc_html__( "Photo repassée en brouillon.", "custom-post-type-ui" ),
		"item_trashed" => esc_html__( "Photo mise à la corbeille.", "custom-post-type-ui" ),
		"item_scheduled" => esc_html__( "Photo planifiée", "custom-post-type-ui" ),
		"item_updated" => esc_html__( "Photo mise à jour.", "custom-post-type-ui" ),
		"parent_item_colon" => esc_html__( "Photo parent :", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "Catalogue photos", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "fiche_photo", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 5,
		"supports" => [ "title", "thumbnail" ],
		"taxonomies" => [ "categorie", "format" ],
		"show_in_graphql" => false,
	];

	register_post_type( "fiche_photo", $args );
}

add_action( 'init', 'cptui_register_my_cpts_fiche_photo' );*/
