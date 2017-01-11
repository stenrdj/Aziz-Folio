<?php
get_header(); ?>

<section class="container has-text-centered " style="background: #F4F5F9;">
                <div class="columns ">
                    <aside class="column" >
                   <div id="left-text-name" > 
                     <h1 class="title is-5">
       Hello, my name is <b>Aziz Segaoui</b></h1>
                        <h2 class="subtitle">
        I build strong, beauty 
Websites & Web apps.</h2>
</div>
                    </aside>
                    <aside class="column ">
                        <figure class="image" style="margin-bottom: 10px;">
                            <img src="<?php echo get_template_directory_uri()?>/img/websitephoto.png">
                        </figure>
                    </aside>
                </div>
            </section>
            <section class="container section">
                <div class="columns ">
                    <aside class="column hero">
                        <div class="hero-body has-text-centered ">
                            <h2 class="title is-5 has-text-centered" style="color:#2980B9">A few Selected PROJECTS</h2>

                            <!-- Start Showing randome projects!-->
                             <div class="columns project-item is-desktop">
                           <?php remove_all_filters('posts_orderby'); $args=array('post_type'=>'projects', 'orderby'=>'rand', 'posts_per_page'=>'4'); $projects=new WP_Query($args); while ($projects->have_posts()) : $projects->the_post(); ?> 
                            <!-- Loop projects!-->
                            <aside class="column">
                            
                                    <figure class="image">
         <a href="<?php the_permalink() ?>">
                                       <?php if ( has_post_thumbnail()) : the_post_thumbnail(array(350,700)); else :?> <img src="http://placehold.it/200x200 "/><?php endif; ?>
                                        <p><?php the_title(); ?></p>
                                       </a>
                                    </figure>
                                </aside> 
                             <!-- End Loop projects!-->
                            <?php endwhile; wp_reset_postdata(); ?>
                            <!-- End Showing randome projects!-->
                           
                            </div>
                    
                        </div>
                    </aside>
                </div>
            </section>
    
  
            <section class="container section" id="latest-articles">
                <h2 class="title is-5 has-text-centered" style="color:#cb506f">Latest Posts From the blog</h1>
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-12">
                            <?php
    $args = array( 'numberposts' => '3', 'order'=> 'ASC');
    $recent_posts = get_posts( $args );

foreach ( $recent_posts as $key=>$post ) :
  setup_postdata( $post ); 
  $post_tags = get_the_tags();


if($key==0):
   ?> 
                        <div class="tile is-parent">
                            <article class="tile is-child">
                            <header >
                                <a href="<?php the_permalink();?>"><h3 class="title is-5"><?php the_title(); ?> </h3></a>
                                <?php
    echo '<p class="subtitle">';
if ( $post_tags ) {
    foreach( $post_tags as $tag ) {
    echo '<span class="tag">'.$tag->name . '</span> '; 
    }
}
echo '</p>';
                                ?>

                                </header>
                                <figure class="image 3">
                                  <?php 
                                   the_post_thumbnail('full');  ?>
                                </figure>
                            </article>
                        </div>
                    <?php 
                    
                        elseif($key==1):
                    ?>
                        <div class="tile">
                            <div class="tile is-parent is-vertical">
                                <article class="tile is-child">
                                <header>
                                    <a href="<?php the_permalink();?>"> <h3 class="title is-5"><?php the_title(); ?> </h3></a>
                                     <?php
    echo '<p class="subtitle">';
if ( $post_tags ) {
    foreach( $post_tags as $tag ) {
    echo '<span class="tag">'.$tag->name . '</span> '; 
    }
}
echo '</p>';
                                ?>
                                    </header>
                                    <figure class="image is-2by1">
                                       <?php the_post_thumbnail(); ?>
                                    </figure>
                                </article>
                            </div>
                    <?php 
                    
                    else:?>
                            <div class="tile is-parent">
                                <article class="tile is-child">
                                <header>
                                   <a href="<?php the_permalink();?>">  <h3 class="title is-5"><?php the_title(); ?> </h3></a>
                                     <?php
    echo '<p class="subtitle">';
if ( $post_tags ) {
    foreach( $post_tags as $tag ) {
    echo '<span class="tag">'.$tag->name . '</span> '; 
    }
}
echo '</p>';
                                ?>
                                    </header>
                                    <figure class="image is-2by1">
                                    <?php the_post_thumbnail(); ?>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <?php
                       endif;
                         endforeach; 

                      wp_reset_query();?>
                    </div>
                </div>
            </section>
            <?php
get_footer(); ?>