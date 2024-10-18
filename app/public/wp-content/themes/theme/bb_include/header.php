<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="<?php bloginfo( 'charset' ); ?>" />


<!-- CSS -->
<link rel="stylesheet" id="style-css" href="<?= get_template_directory_uri(); ?>/style.css" type="text/css" media="all" />


<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/ie/html5.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/ie/selectivizr.js"></script>
<![endif]-->


<!-- FONTS -->


