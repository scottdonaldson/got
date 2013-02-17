<?php get_header(); ?>

<div id="content" class="clearfix">
    <?php 
    // Are we on the home page or a paged page?
    // First, home.
    if (!is_paged()) {
        $query = new WP_Query(array(
                'category_name' => 'episode',
                'posts_per_page' => 5,
                'paged' => get_query_var('page')
            )
        );    
        while ( $query->have_posts() ) : 

        // Increment to help with counting posts
        $counter;
        $query->the_post();
        $counter++;

        // Check to see if we're on the first post
        // and if it's marked to private... If so, declare $private = 'skip' and $skipped = 'skipped'
        // (Will use in offsetting subsequent posts)
        if ( get_field('private') == 'Yes' ) { $private = 'skip'; $skipped = 'skipped'; } else { $private = 'noskip'; };

        // Check to see if we're at the 5th post yet. If not, display post like normal.
        // If we are, then we check to see if we skipped the first post, and if so,
        // Show the 5th (as if it were the 4th), otherwise, do nothing
        if ( 
            ( $counter == 1 && $private == 'noskip' ) ||
            ( $counter>1 && $counter<5 ) ||
            ( $counter == 5 && $skipped == 'skipped' )
            ) { ?>

        <article <?php post_class('clearfix'); ?>>

            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
                if ($image) : ?>
                    <a class="img" href="<?php the_permalink(); ?>">
                        <img src="<?php echo $image[0]; ?>" />
                    </a>
                <?php endif; ?>

            <div class="podcast atrament clearfix">
                <a class="play wpaudio" href="<?php the_field('podcast_file'); ?>"><span class="icon-triangle"></span>Play</a>
                <a class="download" href="<?php the_field('podcast_file'); ?>" title="Either right-click and 'Save' or ask your computer-savvy friend how to download"><span class="icon-triangle-3"></span>Download</a>
                <div class="share"><span class="icon-comments"></span> 
                    Share
                    <?php get_template_part('share'); ?>
                </div>
                
            </div><!-- .podcast --> 

            <div class="entry-content"> 

                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="episode">Episode <?php the_field('ep_number'); ?>:</span> <?php short_title(get_the_title()); ?></a></h2>
            
                <div class="entry-meta">
                    <?php $date = get_the_date('F j, Y'); echo $date;
                          // comments_popup_link(); 
                          edit_post_link(' | Edit'); ?>
                </div>  
                
                <?php
                $excerpt = get_the_excerpt(); 
                $content = get_the_content();
                $link = get_permalink(); 
                echo '<div class="excerpt short">';
                    short_excerpt($excerpt, 20);
                    echo '&nbsp;<a class="read-on" href="'.$link.'">Read&nbsp;on.</a>';
                echo '</div><div class="excerpt long">';
                    echo $excerpt;
                    echo '&nbsp;<a class="read-on" href="'.$link.'">Read&nbsp;on.</a>';
                echo '</div>';
                echo '<div class="content">';
                    echo $content.'</div>'; ?>  

            </div><!-- .entry-content -->

        <div class="read-more more atrament">More</div>  
        </article><!-- .post -->

    <?php } else { };
    endwhile; wp_reset_postdata();

    // Then we must be on a paged page
    } else { 
        
        $paged_query = new WP_Query(array(
                'category_name' => 'episode',
                'posts_per_page' => 3,
                'offset' => -2+3*$paged,
                'paged' => get_query_var('page')
            )
        );
        while ( $paged_query->have_posts() ) : $paged_query->the_post(); ?>

                <article <?php post_class('clearfix'); ?>>

                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
                    if ($image) : ?>
                        <a class="img" href="<?php the_permalink(); ?>">
                            <img src="<?php echo $image[0]; ?>" />
                        </a>
                    <?php endif; ?>

                <div class="podcast atrament">
                    <a class="play wpaudio" href="<?php the_field('podcast_file'); ?>"><span class="icon-triangle"></span>Play</a>
                    <a class="download" href="<?php the_field('podcast_file'); ?>" title="Either right-click and 'Save' or ask your computer-savvy friend how to download"><span class="icon-triangle-3"></span>Download</a>
                    <div class="share"><span class="icon-comments"></span> 
                        Share
                        <?php get_template_part('share'); ?>
                    </div>
                </div><!-- .podcast --> 

                <div class="entry-content"> 

                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span class="episode">Episode <?php the_field('ep_number'); ?>:</span> <?php short_title(get_the_title()); ?></a></h2>
                
                    <div class="entry-meta">
                        <?php $date = get_the_date('F j, Y'); echo $date;
                              // comments_popup_link(); 
                              edit_post_link(' | Edit'); ?>
                    </div>  

                    <?php
                    $excerpt = get_the_excerpt(); 
                    $content = get_the_content();
                    $link = get_permalink(); 
                    echo '<div class="excerpt short">';
                        short_excerpt($excerpt, 20);
                        echo '&nbsp;<a class="read-on" href="'.$link.'">Read&nbsp;on.</a>';
                    echo '</div><div class="excerpt long">';
                        echo $excerpt;
                        echo '&nbsp;<a class="read-on" href="'.$link.'">Read&nbsp;on.</a>';
                    echo '</div>';
                    echo '<div class="content">';
                        echo $content.'</div>'; ?>    

                </div><!-- .entry-content -->

                <div class="read-more more atrament">More</div>  
                </article><!-- .post -->

        <?php endwhile; wp_reset_query(); 
    }
    ?>

</div><!-- #content -->

<div class="load-more atrament"><?php next_posts_link('Load More'); ?></div>

<?php get_footer(); ?>