<?php
/**
 * The Header for our theme.
 *
 * @package OceanWP WordPress theme
 */

?>
<!DOCTYPE html>
<html class="<?php echo esc_attr( oceanwp_html_classes() ); ?>" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>
	<header>
		<a class="link-logo" href="/"><img class="logo-header" src="http://planty.local/wp-content/themes/Planty_child/img/Logo fond blanc.png" alt="Logo planty"></a>
		
		<?php 
    wp_nav_menu([
        'theme_location' => 'main_menu',
        'menu_class' => 'menu-header',
        'container' => 'nav',
        'container_class' => 'navbar'
    ]);
    ?>
	</header>
</body>

