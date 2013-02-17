<?php get_header(); ?>

<div id="content">
    <?php $query = new WP_Query(array(
            'posts_per_page' => 3,
            'offset' => 2,
            'paged' => get_query_var('page')
        )
    ); while ($query->have_posts()) : $query->the_post(); 
    if( $post->ID == $do_not_duplicate ) continue; ?>

    <article <?php post_class('clearfix'); ?>>

        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
            if ($image) : ?>
                <a class="img" href="<?php the_permalink(); ?>">
                    <img src="<?php echo $image[0]; ?>" />
                </a>
            <?php endif; ?>

        <div class="podcast atrament">
            <a class="play wpaudio" href="<?php the_field('podcast_file'); ?>"><span class="icon-triangle"></span>Play</a>
            <a class="download" href="<?php the_field('podcast_file'); ?>"><span class="icon-triangle-2"></span>Download</a>
            <a class="share" href="#"><span class="icon-comments"></span> Share</a>
        </div><!-- .podcast --> 

        <div class="entry-content"> 

            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="episode">Episode <?php the_field('ep_number'); ?>:</span> <?php the_title(); echo $i; ?></a></h2>
        
            <div class="entry-meta">
                <?php $date = get_the_date('F j, Y'); echo $date.' | ';
                      comments_popup_link(); 
                      edit_post_link(' | Edit'); ?>
            </div>  
            
            <?php
                $excerpt = get_the_excerpt(); 
                echo '<div class="excerpt">';
                    short_excerpt($excerpt, 20);
                echo '</div><div class="excerpt hidden">';
                    echo $excerpt.'<a href="'.get_permalink().'">Read on.</a></div>'; ?>  

        </div><!-- .entry-content -->

    <div class="read-more atrament">More</div>  
    </article><!-- .post -->

    <?php endwhile; wp_reset_postdata(); ?>

</div><!-- #content -->

<div class="load-more atrament"><?php next_posts_link('Load More'); ?></div>

<?php get_footer(); ?>