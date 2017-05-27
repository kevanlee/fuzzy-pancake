

<aside id="secondary" class="widget-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	        <?php dynamic_sidebar( 'sidebar-1' ); ?>
	    <?php else : ?>


		<h3>Your custom info here</h3>
		<p>It can be anything you want. Maybe an email signup with a button?</p>
		<a href="/" class="btn">Sign up here, for instance</a>

		<?php endif; ?>
</aside><!-- #secondary -->
