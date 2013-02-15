<?php 
/*
Template Name: News
*/
get_header(); ?>

<div id="content" class="clearfix">
    <?php
    // Are we on the main news page or a paged page?
    // First, main.
    if (!is_paged()) {
        $temp = $wp_query;
        $wp_query= null;
        $wp_query = new WP_Query();
        $wp_query->query(array(
                'category_name' => 'news',
                'posts_per_page' => 5,
                'paged' => get_query_var('page')
            )
        );  
        while ( have_posts() ) : the_post(); ?>

        <article <?php post_class('clearfix'); ?>>

            <div class="entry-content"> 
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <div class="entry-meta">
                    <?php $date = get_the_date('F j, Y'); echo $date;
                          // comments_popup_link(); 
                          edit_post_link(' | Edit'); ?>
                </div>  
                    
                <?php the_content(); ?>

            </div><!-- .entry-content -->
        </article><!-- .post -->

        <?php endwhile; ?>

    <?php } else { 
        $temp = $wp_query;
        $wp_query= null;
        $wp_query = new WP_Query();
        $wp_query->query(array(
                'category_name' => 'news',
                'posts_per_page' => 5,
                'offset' => -5+5*$paged,
                'paged' => get_query_var('page')
            )
        );  
        while ( have_posts() ) : the_post(); ?>

        <article <?php post_class('clearfix'); ?>>

            <div class="entry-content"> 
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <div class="entry-meta">
                    <?php $date = get_the_date('F j, Y'); echo $date;
                          // comments_popup_link(); 
                          edit_post_link(' | Edit'); ?>
                </div>  
                    
                <?php the_content(); ?>

            </div><!-- .entry-content -->
        </article><!-- .post -->

        <?php endwhile; 
    } ?>    

</div><!-- #content -->

<div class="load-more atrament"><?php next_posts_link('Load More'); ?></div>

<?php $wp_query = null; $wp_query = $temp; ?>

<?php get_footer(); ?>