<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'font-awesome','simple-line-icons','oceanwp-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION

// Création de la fonction
function ajouter_lien_admin($items, $args) {
// Vérification de l'emplacement du menu
    if($args->theme_location == 'main_menu') {
// Création de la variable qui va contenir le lien et de la variable qui va créer un tableau de notre menu
        $news_items = '';
        $items_array = explode('</li>', $items);
// On boucle sur le tableau
        foreach($items_array as $item) {
// Vérification si le menu contient les autres liens et si l'utilisateur est connecté
            if(strpos($item, 'nous rencontrer') !== false) {
                $news_items .= $item.'</li>';
                if(is_user_logged_in()) {
                    $news_items .= '<li class="menu-item-89"><a href="'.admin_url().'">Admin</a></li>';
                }
            } elseif(strpos($item, 'commander') !== false) {
                if(is_user_logged_in()) {
                    $news_items .= '<li class="menu-item-89"><a href="'.admin_url().'">Admin</a></li>';
                }
                $news_items .= $item.'</li>';
            } else {
                $news_items .= $item.'</li>';
            }
        }
// Dans le cas où nous sommes dans le bon emplacement de menu retour des nouveaux éléments sinon retour des anciens
        return $news_items;
    } else {
        return $items;
    }
}
// On attache le hook avec notre fonction
add_filter('wp_nav_menu_items', 'ajouter_lien_admin', 10, 2);



