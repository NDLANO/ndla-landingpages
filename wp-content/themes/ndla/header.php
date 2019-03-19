<?php
?>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
  <title><?php bloginfo('description'); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="ndla-site">
  <header id="masthead" class="ndla-header">
    <h1 class="ndla-header__title"><img src="<?php echo get_site_url() . "/wp-content/uploads/2019/03/ndlalogo.png" ?>" alt="Logotyp for NDLA" /><span class="ndla-header__title__alt">NDLA - Nasjonal Digital Læringsarena</span></h1>
  </header>
	<div id="content" class="site-content">
