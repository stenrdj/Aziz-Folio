<?php
get_header();
?>
<?php
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

	function azizfolio_check_cat($catslug,$currentcat){
  	if($catslug === $currentcat)
  		return " class='selected'";
  }
?>

<section class="container section" id="projects-page">
    <h2 class="title is-5 has-text-centered" style="color:#2980B9">Works and Projects</h2> 
			<div id="projects-cats" class="has-text-centered">
              <?php
         $cats=get_categories(array('taxonomy'=>'portfolio_category'));
  
  
       foreach ($cats as  $cat) {
       //var_dump($cat);


       echo "<a href='".get_post_type_archive_link('projects')."category/$cat->slug' ".azizfolio_check_cat($cat->slug,$term->slug)."><span>$cat->name</span></a>" ;
       }

            ?>
            </div>
                <div class="columns ">
                
                        <div class="hero-body has-text-centered">
                        

                            <!-- Start Showing randome projects!-->
                             <div class="columns project-item  is-multiline is-mobile">
                           <?php remove_all_filters('posts_orderby'); 
                           $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
                           $args=array('post_type'=>'projects', 'orderby'=>'rand','tax_query' => array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $term->slug,
            )
        )
                           ); $projects=new WP_Query($args); while ($projects->have_posts()) : $projects->the_post(); ?> 
                            <!-- Loop projects!-->
                            <aside class="column is-one-quarter">
                             
                                    <figure class="image">
<a href="<?php the_permalink() ?>">
                                       <?php if ( has_post_thumbnail()) : the_post_thumbnail(array(1000,1000)); else :?> <img src="http://placehold.it/200x200 "/><?php endif; ?>
                                        <p><?php the_title(); ?></p>
                                          </a> 
                                    </figure>
                            </aside> 
                             <!-- End Loop projects!-->
                            <?php endwhile; wp_reset_postdata(); ?>
                            <!-- End Showing randome projects!-->
                           
                            </div>
                    
                        </div>
                 
                </div>
            </section>
		
<?php get_footer(); ?>