<?php
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="ndla-site">
  <header id="masthead" class="ndla-header">
    <h1 class="ndla-header__title">
			<!-- <a href="<?php print get_home_url(); ?>"> -->
				<img src="<?php echo get_site_url() . "/wp-content/uploads/2019/04/ndlalogo.png" ?>" alt="Logotyp for NDLA" />
				<span class="ndla-header__title__alt">NDLA - Nasjonal Digital Læringsarena</span>
			<!-- </a> -->
		</h1>
		<a href="https://ndla.no" target="_blank" class="ndla-header__link">Gå til ndla.no<i class="mdi mdi-launch"></i></a>
  </header>
	<div id="content" class="ndla-site__content">
