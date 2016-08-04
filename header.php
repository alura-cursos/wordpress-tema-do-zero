<!doctype html>
<html>
<head>
	<?php $home = get_template_directory_uri(); ?>
	<meta charset="utf-8">
	<title>
		<?php get_titulo(); ?>
	</title>

	<link rel="stylesheet" href="<?= $home ?>/assets/css/reset.css">
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/comum.css">
	<link rel="stylesheet" href="<?= $home; ?>/assets/css/header.css">

	<link rel="stylesheet" href="<?= $home; ?>/assets/css/<?= $css_escolhido; ?>.css">


	<?php	wp_head(); ?>
</head>
<body>

<header>
	<div class="container">
		<?php
			$args = array( 'theme_location' => 'header-menu');
			wp_nav_menu( $args ); 
		?>
	</div>

</header>