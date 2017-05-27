<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package pancake
 */

get_header(); ?>

<div style="clear:both;"></div>

<!-- Hero -->


<div id="hero">
	<div class="hero-text">

		<h2 class="opening"><?php echo get_theme_mod('hero_heading') ?></h2>
		<p><?php echo get_theme_mod('hero_subheading') ?>
		</p>
		<a href="<?php echo get_theme_mod('button_link') ?>" class="btn large" style=""><?php echo get_theme_mod('button_text') ?></a>
	</div>
</div><!-- #hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- Articles -->
			<h3 class="popular-headline">Most Popular Articles</h3>

		<div id="featured-cards">

			<?php

			global $post;
			$args = array( 'posts_per_page' => 6, 'offset'=> 0, 'category_name' => get_theme_mod('featured_cat') );

			$myposts = get_posts( $args );
			foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<article class="card" >
				<a href="<?php the_permalink(); ?>"><div id="post-986195419" class="post type-post has-post-thumbnail  " >
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail('card-thumb', array('class' => 'card-thumbnail')); }
					else { ?>

					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/default.png" />

					<?php } ?>
				<h2 class="card-title"><?php the_title(); ?></h2>
			</div></a>
			</article>
			<?php endforeach;
			wp_reset_postdata();?>

		</div>

		<div class="clear"></div>

			<div id="articles">

				<div id="post-list">

				<h3>Most Recent Articles</h3>

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) {
    		the_post_thumbnail('mini-thumb', array('class' => 'thumb')); } ?>
			<header class="entry-header">
				<div class="entry-meta"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_time('F jS, Y'); ?></a>
				</div><!-- .entry-meta -->
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h3>
			</header><!-- .entry-header -->
		</article>
		<hr>
		<div class="clear"></div>
			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>



		      </div><!-- #post-list -->

		      </div><!-- #articles -->

		  <!-- Sidebar -->

			<?php get_sidebar(); ?>


		      <div  style="clear:both;"></div>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
