<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AzizFolio
 */

?>
<article class="has-text-centered" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <header class="entry-header">
		<?php the_title( '<h1>', '</h1>' ); ?>
		<?php
		$post_tags = get_the_tags();
if ( $post_tags ) {
    foreach( $post_tags as $tag ) {
    echo '<span class="tag">'.$tag->name . '</span> '; 
    }
}
?>
<br>
<small><?php if ( 'post' === get_post_type() ) : ?> Written by <b>Aziz Segaoui</b>, <?php azizfolio_posted_on(); ?> <?php azizfolio_entry_footer(); ?>
</small>
<?php endif; ?>
  </header>
  	<div class="article-content">
  	<?php if ( has_post_thumbnail() ) : ?>
    <figure >
    
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
    </a>

    </figure>
    <?php endif; ?>
    <aside>
    	
    <?php the_content(); ?>
		</aside>
      <br>
          
</div>
</article>
