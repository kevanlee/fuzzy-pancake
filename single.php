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

		endwhile; // End of the loop.
		?>

		<div id="author-box">
	    <h3>Be the first to get new posts and articles</h3>
	    <p>I lead the marketing team at <a href="https://buffer.com" class="customize-unpreviewable">Buffer</a>, a SaaS tool with a blog of over 1.2M monthly visits. Let me show you how we got there and how we plan to grow.</p>
	      <a href="#contact" class="btn" style="">Sign up to receive updates</a>
  	</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div id="related-articles">
		<?php

		global $post;
		$args = array( 'posts_per_page' => 2, 'offset'=> 1, 'category' => 2 );

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
			<a href="/archives" class="btn white">View the complete archives</a>
		</div><!-- tags -->

	</div>



	<?php
	while ( have_posts() ) : the_post();

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

	<div style="clear: both;"></div>

<?php
get_footer();
