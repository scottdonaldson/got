</div><!-- #main -->

<footer>
	<section id="footer-content" class="clearfix">
		<div class="donate widget">
			<h3>Donate</h3>
			<p>Going Off Track runs on the support of its listeners. Want to show your love?</p>
			<a class="atrament" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=P448F4NBM7WWN&lc=US&item_name=Going%20Off%20Track&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted" target="_blank">Donate via PayPal</a>
		</div>

		<div class="thanks widget">
			<h3>Special Thanks</h3>
			<p>Going Off Track was made possible in part by amazing individuals that supported our Kickstarter campaign. We salute them.</p>
			<?php if (get_field('names','Options')) { ?>
				<div class="marquee">
					<p>
					<?php
					while (has_sub_field('names','Options')) {
						$names[] = get_sub_field('name');
					}
					shuffle($names);
					foreach ($names as $name) {
						echo $name.'&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;';
					} ?>
					</p>
				</div><!-- .list -->
			<?php } ?>
			
		</div>

		<div class="subscribe widget">
			<h3>Subscribe</h3>
			<p>To receive notifications every time a new episode is released, enter your email below.</p>
			<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=goingofftrack-podcast', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
				<input class="email" name="email" type="email" placeholder="Enter Your Email" />
				<input type="hidden" value="goingofftrack-podcast" name="uri" />
				<input type="hidden" name="loc" value="en_US" />
				<input class="atrament" type="submit" value="submit" />
			</form>
		</div>

		<div class="twitter widget">
			<ul class="slides">
				<li class="jonah">
					<img src="<?php echo bloginfo('template_url'); ?>/images/jonah_web.jpg" />
					<a class="atrament icon-twitter" href="http://www.twitter.com/mynameisjonah" target="_blank"><span>@mynameisjonah</span></a>
					<div class="tweet" id="tweet-jonah"></div>
				</li>
				<li class="steven">
					<img src="<?php echo bloginfo('template_url'); ?>/images/steven_web.jpg" />
					<a class="atrament icon-twitter" href="http://www.twitter.com/stevensmithsays" target="_blank"><span>@stevensmithsays</span></a>
					<div class="tweet" id="tweet-steven"></div>
				</li>
				<li class="brad">
					<img src="<?php echo bloginfo('template_url'); ?>/images/brad_web.jpg" />
					<a class="atrament icon-twitter" href="http://www.twitter.com/soundwag" target="_blank"><span>@soundwag</span></a>
					<div class="tweet" id="tweet-brad"></div>
				</li>
			</ul>
		</div>
	</section>

	<section id="footer-bottom" class="clearfix">
		<div class="row">
			<p class="alignleft">&copy; <?php echo date('Y'); ?> Going Off Track</p>
			<p class="alignright">design + code by <a href="http://www.parsleyandsprouts.com" target="_blank">Parsley &amp; Sprouts</a>
		</div>
	</section>
</footer>

<script src="<?php echo bloginfo('template_url'); ?>/js/plugins.js"></script>
<!--[if gt IE 8]>
	<script src="<?php echo bloginfo('template_url'); ?>/js/jquery.tooltips.js"></script>
<![endif]-->
<!--[if lte IE 7]>
	<script src="<?php echo bloginfo('template_url'); ?>/js/icomoon-ie7.js"></script>
<![endif]-->
<script src="<?php echo bloginfo('template_url'); ?>/js/script.js"></script>

<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount','UA-30781042-1']);
	_gaq.push(['_trackPageview']);
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script>

<?php wp_footer(); ?>
</body>
</html>