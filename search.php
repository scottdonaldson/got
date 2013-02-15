<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article <?php post_class(); ?>>

        <h2 class="entry-title">
        	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        		<?php if (get_field('ep_number')) { ?>
        			<span class="episode">Episode <?php the_field('ep_number'); ?>: </span>
        		<?php } the_title(); ?>
        	</a>
        </h2>   

        <div class="entry-meta">
            <?php $date = get_the_date('F j, Y'); echo $date;
                  // comments_popup_link(); 
                  edit_post_link(' | Edit'); ?>
        </div>   

        <?php the_excerpt(); ?>

	</article><!-- .post -->

<?php endwhile; else: ?>

	<article <?php post_class(); ?>>
		<h2>No results found for '<?php the_search_query(); ?>.' Bummer.</h2>
	</article><!-- .post -->

<?php endif; ?>

</div><!-- #content -->

<div class="load-more atrament"><?php next_posts_link('Load More'); ?></div>

<?php get_footer(); ?>