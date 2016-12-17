<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AzizFolio
 */

?>


<article class="has-text-centered" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <header class="entry-header">
 <?php the_title( sprintf( '<h2 ><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

<small><?php if ( 'post' === get_post_type() ) : ?> Written by <b>Aziz Segaoui</b>, <?php azizfolio_posted_on(); ?> - 		<?php azizfolio_entry_footer(); ?>
</small>
<?php endif; ?>
  </header>
  	<div class="article-content">
  	<?php if ( has_post_thumbnail() ) : ?>
    <figure class="image">
    
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
    </a>

    </figure>
    <?php endif; ?>
    <aside>
    	
    
     <?php $content = get_the_content();
  $trimmed_content = wp_trim_words( $content, 40, '...' ); ?>
 <?php echo $trimmed_content; ?>

	

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'azizfolio' ),
				'after'  => '</div>',
			) );
		?>
		</aside>
      <br>
          
</div>
<footer><a href="<?php echo get_permalink();?>"><span>Keep reading</span></a></footer>
</article>
