<?php 
/*
Template Name: About
*/
get_header(); the_post(); ?>

<div id="content">

	<div class="featured">
	    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
    	    if ($image) : ?>
        	     <img src="<?php echo $image[0]; ?>" />
			<?php endif; ?>
	</div>

	<article <?php post_class('atrament'); ?>>
		<?php the_content(); ?>
	</article>	

	<section class="host jonah">
		<img src="<?php the_field('jonah_photo'); ?>" />
		<h3>Jonah Bayer</h3>
		<p><?php the_field('jonah_bio'); ?></p>
		<div class="links atrament">
			<?php if (get_field('jonah_twitter')) { ?>
				<a class="icon-twitter" href="<?php the_field('jonah_twitter'); ?>" target="_blank"></a>
			<?php } if (get_field('jonah_facebook')) { ?>
				<a class="icon-facebook" href="<?php the_field('jonah_facebook'); ?>" target="_blank"></a>
			<?php } if (get_field('jonah_website')) { ?>
				<a class="website" href="<?php the_field('jonah_website'); ?>" target="_blank">Website</a>
			<?php } ?>
		</div>
	</section>

	<section class="host mike">
		<img src="<?php the_field('mike_photo'); ?>" />
		<h3>Mike Cangemi</h3>
		<p><?php the_field('mike_bio'); ?></p>
		<div class="links atrament">
			<?php if (get_field('mike_twitter')) { ?>
				<a class="icon-twitter" href="<?php the_field('mike_twitter'); ?>" target="_blank"></a>
			<?php } if (get_field('mike_facebook')) { ?>
				<a class="icon-facebook" href="<?php the_field('mike_facebook'); ?>" target="_blank"></a>
			<?php } if (get_field('mike_website')) { ?>
				<a class="website" href="<?php the_field('mike_website'); ?>" target="_blank">Website</a>
			<?php } ?>
		</div>
	</section>

	<section class="host steven">
		<img src="<?php the_field('steven_photo'); ?>" />
		<h3>Steven Smith</h3>
		<p><?php the_field('steven_bio'); ?></p>
		<div class="links atrament">
			<?php if (get_field('steven_twitter')) { ?>
				<a class="icon-twitter" href="<?php the_field('steven_twitter'); ?>" target="_blank"></a>
			<?php } if (get_field('steven_facebook')) { ?>
				<a class="icon-facebook" href="<?php the_field('steven_facebook'); ?>" target="_blank"></a>
			<?php } if (get_field('steven_website')) { ?>
				<a class="website" href="<?php the_field('steven_website'); ?>" target="_blank">Website</a>
			<?php } ?>
		</div>
	</section>

	<section class="host brad">
		<img src="<?php the_field('brad_photo'); ?>" />
		<h3>Brad Worrell</h3>
		<p><?php the_field('brad_bio'); ?></p>
		<div class="links atrament">
			<?php if (get_field('brad_twitter')) { ?>
				<a class="icon-twitter" href="<?php the_field('brad_twitter'); ?>" target="_blank"></a>
			<?php } if (get_field('brad_facebook')) { ?>
				<a class="icon-facebook" href="<?php the_field('brad_facebook'); ?>" target="_blank"></a>
			<?php } if (get_field('brad_website')) { ?>
				<a class="website" href="<?php the_field('brad_website'); ?>" target="_blank">Website</a>
			<?php } ?>
		</div>
	</section>

</div><!-- #content -->	

<?php get_footer(); ?>