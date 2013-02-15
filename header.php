<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no, width=device-width" />
	<title><?php wp_title(''); ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />

	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/style.css">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/media.css">

  	<script src="<?php echo bloginfo('template_url'); ?>/js/libs/modernizr-2.5.3.min.js"></script>
    
    <?php wp_head(); ?>
</head>
<body <?php body_class('preload'); ?>>
	<!--[if lt IE 8]><p class=chromeframe>Your browser is too old to best experience this site! <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  
<div class="lines"></div>  
  
<header class="clearfix">

	<a href="<?php echo home_url(); ?>" rel="home" title="Going Off Track">
		<img id="logo" src="<?php echo bloginfo('template_url'); ?>/images/logo.png" />

	<?php if (is_home()) { ?>
    	<h1 id="blog-title">Going Off Track</h1>
    <?php } else { ?>
    	<h3 id="blog-title">Going Off Track</h3>
    <?php } ?>
    </a>
    
    <p id="tagline"><?php echo bloginfo('description'); ?></p>
    
    <nav class="atrament clearfix">
	    <?php wp_nav_menu(); ?>
	</nav>

	<?php query_posts(array(
                'category_name' => 'episode',
                'posts_per_page' => 1
            	)
            ); while (have_posts()) : the_post(); ?>
		<a class="preview hidden" href="<?php the_permalink(); ?>?preview=true"></a>
	<?php endwhile; wp_reset_query(); ?>

	<div id="search" class="hidden">
		<?php get_search_form(); ?>
	</div>
	
</header>
  
<div role="main" id="main" class="clearfix">