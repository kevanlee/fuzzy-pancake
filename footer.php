<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pancake
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<h2><i>Give freely and there will always be more.</i></h2>
			<h3>&mdash; Anne Lamott</h3>
			<p><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'pancake' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'pancake' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'pancake' ), 'pancake', '<a href="https://automattic.com/" rel="designer">Underscores.me</a>' ); ?></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
