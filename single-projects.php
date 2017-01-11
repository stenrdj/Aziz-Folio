<?php
/**
 * The template for displaying all single Projects.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package AzizFolio
 */

get_header(); ?>
<section class="container section" id="projects-page">
    <h2 class="title is-5 has-text-centered" style="color:#2980B9">Works and Projects</h2> <br><br>

		<?php while ( have_posts() ) : the_post(); ?>
		<?php $client = get_post_custom_values($key = 'client');
			  $responsive = get_post_custom_values($key = 'responsive');
		?>
			<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 

<div class="columns is-desktop" id="project-details">
  <div class="column"><?php if ( has_post_thumbnail() ) : ?>
    <figure >
    
   
        <?php the_post_thumbnail(array(900,400)); ?>
   

    </figure>
    <?php endif; ?></div>
  <div class="column"><div class="article-content">
  	<header class="entry-header">
		<?php the_title( '<h1>', '</h1>' ); ?>



  </header>
    <aside>
    <h3>About the Project:</h3>
    <?php the_content(); ?>
    <h3> Short Details</h3>

<p><b>Client:</b> <?php 
echo $client[0]; ?></p>
<p><b>Technologies: </b>		<?php
		$post_tags = get_the_tags();
if ( $post_tags ) {
    foreach( $post_tags as $tag ) {
    echo "<i class='devicon-".strtolower($tag->name)."-plain '></i>"; 
    }
}
?></p>
<p><b>Responsive:</b> <?php 
echo $responsive[0]; ?></p>
	</aside>
      
         
</div></div>

</div>
  	
</article>


		<?php endwhile; // End of the loop. ?>
	
	<?php get_sidebar();?>
</section>

<?php get_footer(); ?>
