<?php get_header(); ?>

<article <?php post_class('clearfix'); ?>>

	<h1 class="entry-title"><?php the_title(); ?></h1>

	<div class="entry-meta">
	    <?php $date = get_the_date('F j, Y'); echo $date;
	    	  edit_post_link(' | Edit'); ?>
	</div>	

	<div id="content">
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
	</div>

</article>

<?php get_footer(); ?>