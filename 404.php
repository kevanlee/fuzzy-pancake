<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pancake
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404. Well, this is unexpected.', 'pancake' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					 <div class="tumblr-post" data-href="https://embed.tumblr.com/embed/post/Seni87DTJyIl2wEIryQ_sQ/133428590809" data-did="da39a3ee5e6b4b0d3255bfef95601890afd80709"><a href="http://blogdogz.tumblr.com/post/133428590809">http://blogdogz.tumblr.com/post/133428590809</a></div>  <script async src="https://assets.tumblr.com/post.js"></script>
					<p><?php esc_html_e( 'Sorry, I failed to find this page. Maybe try one of the links below or a search?', 'pancake' ); ?></p>

					<?php
						get_search_form();

						the_widget( 'WP_Widget_Recent_Posts' );

						// Only show the widget if site has multiple categories.
						if ( pancake_categorized_blog() ) :
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'pancake' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->

					<?php
						endif;

						the_widget( 'WP_Widget_Tag_Cloud' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
