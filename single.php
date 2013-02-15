<?php 
if(isset($_POST['submitted'])) {
	$password = $_POST['password'];
}
get_header(); the_post(); ?>

<?php 
// First, check to see if this is a news post
if (in_category('news')) { ?>

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

<?php
// If not, then it must be an episode.
// Check to see if this is a private post and if
// the password has not already been submitted,
// or if the visitor clicked on the 'Preview link' to get here
} elseif ( ( get_field('private') == 'Yes' && !isset($_POST['submitted']) ) || $_GET['preview'] == 'true' )  { ?>

<article <?php post_class('clearfix private'); ?>>
	<p>Subscribers who have donated $25 or more get advanced access to new episodes on Thursdays before the regular Friday release. If you have the password, type it below to hear the latest episode.</p>

	<form action="<?php the_permalink(); ?>" class="clearfix" method="post">
		<input type="text" id="password" name="password" placeholder="Type Password" />
		<input class="atrament" type="submit" id="submitted" name="submitted" value="Submit">
	</form>

	<p class="alignleft">If you would like advance access to episodes, donate now!</p>
	<a class="donate atrament alignright" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=P448F4NBM7WWN&lc=US&item_name=Going%20Off%20Track&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank">Donate</a>
</article>

<?php // If the password has been submitted and is incorrect
} elseif ( isset($_POST['submitted']) && $password != get_field('password')) { ?>

<article <?php post_class('clearfix private'); ?>>
	<p>Trying to guess the password? We're all about fighting the man, unless the man is us. Unless you just mistyped it... Then try again below.</p>

	<form action="<?php the_permalink(); ?>" class="clearfix" method="post">
		<input type="text" id="password" name="password" placeholder="Type Password" />
		<input class="atrament" type="submit" id="submitted" name="submitted" value="Submit">
	</form>

	<p class="alignleft">If you would like advance access to episodes, donate now!</p>
	<a class="donate atrament alignright" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=P448F4NBM7WWN&lc=US&item_name=Going%20Off%20Track&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank">Donate</a>
</article>

<?php // Otherwise the password has been submitted and is correct
	  // or else we're on a non-private post
} else { ?> 

<article <?php post_class('clearfix'); ?>>

	<h1 class="entry-title">
		<span class="episode">Episode <?php the_field('ep_number'); ?>:</span> <?php the_title(); ?>
	</h1>

	<div class="player clearfix">
		<a class="play wpaudio icon-triangle" href="<?php the_field('podcast_file'); ?>"></a>
	</div>

	<div id="content" class="clearfix">
		<div class="graphic atrament">
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); 
				if ($image) : ?>
				<img src="<?php echo $image[0]; ?>" />
				<?php endif; ?>
	    	<a class="download" href="<?php the_field('podcast_file'); ?>" title="Either right-click and 'Save' or ask your computer-savvy friend how to download"><span class="icon-triangle-3"></span>Download</a>
			<div class="share"><span class="icon-comments"></span> 
				Share
				<?php get_template_part('share'); ?>  
			</div>
			  
		</div>

	    <div class="entry-content">	
			<div class="entry-meta">
	    		<?php $date = get_the_date('F j, Y'); echo $date;
	    		  	  edit_post_link(' | Edit'); ?>
	    	</div>		
	    	<?php the_content(); ?> 
	    	<?php the_field('add_content'); ?> 
	    </div><!-- .entry-content -->   
	</div><!-- #content --> 

    <div class="navigation atrament clearfix">
    	<div class="next"><?php next_post_link('%link','<span class="icon-triangle-2"></span>Next Episode', 1); ?></div>
    	<div class="prev"><?php previous_post_link('%link','Previous Episode<span class="icon-triangle"></span>', 1); ?></div>
    </div>

</article>

<?php } ?>

<?php get_footer(); ?>