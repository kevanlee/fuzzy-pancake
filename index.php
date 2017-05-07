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

		<h2 class="opening"><b>Hi, I'm Kevan.</b> <br>I'll tell you everything I know about content marketing for startups.    </h2>
		<p>I lead the marketing team at <a href="https://buffer.com" class="customize-unpreviewable">Buffer</a>, a SaaS tool with a blog of over 1.2M monthly visits. Let me show you how we got there and how we plan to grow.
		</p>
		<a href="<?php echo get_theme_mod('button_link') ?>" class="btn large" style="">Ask Me Anything ✌︎</a>
	</div>
</div><!-- #hero -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<!-- Articles -->

		<div id="featured-cards">
			<h3 style="margin-left:15px;">Most Popular Articles</h3>

			<?php

			global $post;
			$args = array( 'posts_per_page' => 6, 'offset'=> 1, 'category' => 2 );

			$myposts = get_posts( $args );
			foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			<article class="card" >
				<a href="<?php the_permalink(); ?>" ><div id="post-986195419" class="post type-post has-post-thumbnail  " >
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail('card-thumb', array('class' => 'card-thumbnail')); }
					else { ?>

					<img src="<?php bloginfo('template_directory'); ?>/default.png" />

					<?php } ?>
				<h2 class="card-title"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
			</div></a>
			</article>
			<?php endforeach;
			wp_reset_postdata();?>

		</div>

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
