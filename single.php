<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AzizFolio
 */

get_header(); ?>

	<section class="container section" id="articles">


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
			</section>
<div style="background: #F4F5F9;">
<section  class="container section" id="other-posts">
	<?php get_sidebar(); ?>
</section>
</div>
	<section class="container section"
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		<!-- #section -->
</section>


<?php get_footer(); ?>
