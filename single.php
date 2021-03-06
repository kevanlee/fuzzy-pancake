<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pancake
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<div id="author-box">
			<?php if ( is_active_sidebar( 'author' ) ) : ?>
			        <?php dynamic_sidebar( 'author' ); ?>
			    <?php else : ?>
	    <h3>Information about the author here</h3>
	    <p>You can customize this by using the WordPress widget section for the Author sidebar. :) </p>
	      <a href="/" class="btn" style="">Custom button</a>
				<?php endif; ?>
  	</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="related-articles">
		<?php

		global $post;
		$args = array( 'posts_per_page' => 2, 'orderby' => 'rand', 'offset'=> 1, 'category' => get_theme_mod('featured_cat') );

		$myposts = get_posts( $args );
		foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		<article class="card" >
			<a href="<?php the_permalink(); ?>" class="card-link">
				<div id="post-986195419" class="post type-post has-post-thumbnail  " >
				<?php the_post_thumbnail('medium', array('class' => 'card-thumbnail')); ?>
					<h2 class="card-title"><a href="<?php the_permalink(); ?>" class="card-link"><?php the_title(); ?></a></h2>
				</div>
			</a>
		</article>
		<?php endforeach;
		wp_reset_postdata();?>

		<div style="clear:both;"></div>

		<div class="read-more-categories">
			<h3>Read more articles about:</h3>
			<ul>
				<li><?php wp_tag_cloud( 'smallest=16&largest=16' ); ?></li>
			</ul>
			<a href="/page/2/" class="btn white">View the complete archives</a>
		</div><!-- tags -->

	</div>

	<div style="clear: both;"></div>

<?php
get_footer();
