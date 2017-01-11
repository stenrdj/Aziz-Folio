<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package AzizFolio
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function azizfolio_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'azizfolio_body_classes' );
// Registre the project post side bar 
function custom_sidebars() {
	$args = array(
	'class'         => 'widgets-projects',
	'id'          => 'projects-single',
	'name'          => __( 'Projects single', 'azizfolio' ),
	'description'   => __( 'Sidebar for single project', 'azizfolio' ),
	'before_title'  => '<h2 class="title is-5 has-text-centered" style="color:#2980B9;">',
	'after_title'   => '</h2>',
	'before_widget' => '<div id="widgets-project">',
	'after_widget'  => '</div>',);
register_sidebar( $args );}
add_action( 'widgets_init', 'custom_sidebars' );


// Creat A widget for Lastest Project posts
class Projects_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'projects_widget',
			__( 'Other Projects ', 'azizfolio' ),
			array(
				'description' => __( 'Show other Projects.', 'azizfolio' ),
				'classname'   => 'widget_projects',
			)
		);

	}

	public function widget( $args, $instance ) {

		$title  = ( ! empty( $instance['projects_title']  ) ) ? $instance['projects_title'] : __( 'Recent projects' );
		$number = ( ! empty( $instance['projects_number'] ) ) ? absint( $instance['projects_number'] ) : 5;

		if ( ! $number )
			$number = 5;

		// Before widget tag
		echo $args['before_widget'];

		// Title
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// Recent Posts
		$query = new WP_Query( array (
			'post_type'           => 'projects',
			'posts_per_page'      => $number,
			'orderby'=>'rand'
		) );
		if ( $query->have_posts() ) :
			echo '<div class="columns project-item is-mobile">';

		
			while ( $query->have_posts() ) : $query->the_post();
			//	$post_title = ( get_the_title() ? get_the_title() : get_the_ID() );
			?>
			<aside class="column">
			
	
                                    <figure class="image">
          <a href="<?php the_permalink() ?>">
                                       <?php if ( has_post_thumbnail()) : the_post_thumbnail(array(350,700)); else :?> <img src="http://placehold.it/200x200 "/><?php endif; ?>
                                        <p><?php the_title(); ?></p>
                                       </a>
                                    </figure>
                                </aside> 
                             <?php
			endwhile;
					wp_reset_postdata();
	echo '</div>';

		endif;
		// After widget tag
		echo $args['after_widget'];

	}

	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array( 
			'projects_title' => '',
			'projects_number' => '',
		) );

		// Retrieve an existing value from the database
		$projects_title = !empty( $instance['projects_title'] ) ? $instance['projects_title'] : '';
		$projects_number = !empty( $instance['projects_number'] ) ? $instance['projects_number'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'projects_title' ) . '" class="projects_title_label">' . __( 'Title', 'text_domain' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'projects_title' ) . '" name="' . $this->get_field_name( 'projects_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr( $projects_title ) . '">';
		echo '	<span class="description">' . __( 'The widget title.', 'text_domain' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'projects_number' ) . '" class="projects_number_label">' . __( 'projects to show', 'text_domain' ) . '</label>';
		echo '	<input type="number" id="' . $this->get_field_id( 'projects_number' ) . '" name="' . $this->get_field_name( 'projects_number' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr( $projects_number ) . '">';
		echo '	<span class="description">' . __( 'The number of projects to show.', 'text_domain' ) . '</span>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['projects_title'] = !empty( $new_instance['projects_title'] ) ? strip_tags( $new_instance['projects_title'] ) : '';
		$instance['projects_number'] = !empty( $new_instance['projects_number'] ) ? strip_tags( $new_instance['projects_number'] ) : '';

		return $instance;

	}

}

function projects_register_widgets() {
	register_widget( 'projects_Widget' );
}
add_action( 'widgets_init', 'projects_register_widgets' );

// Creat A widget for Randome Post 
class RandomPost_Widget extends WP_Widget {

	public function __construct() {

		parent::__construct(
			'randomPost_widget',
			__( 'Random Post ', 'azizfolio' ),
			array(
				'description' => __( 'Show other randomPost.', 'azizfolio' ),
				'classname'   => 'widget_randomPost',
			)
		);

	}

	public function widget( $args, $instance ) {

		$title  = ( ! empty( $instance['randomPost_title']  ) ) ? $instance['randomPost_title'] : __( 'Recent randomPost' );
		$number = ( ! empty( $instance['randomPost_number'] ) ) ? absint( $instance['randomPost_number'] ) : 5;

		if ( ! $number )
			$number = 5;

		// Before widget tag
		echo $args['before_widget'];

		// Title
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// Recent Posts
		$query = new WP_Query( array (
			'post_type'           => 'post',
			'posts_per_page'      => $number,
			'orderby'=>'rand'
		) );
			echo '<div class="columns has-text-centered">';
		if ( $query->have_posts() ) :

		
			while ( $query->have_posts() ) : $query->the_post();
			//	$post_title = ( get_the_title() ? get_the_title() : get_the_ID() );
			?>
			<aside class="column">
			
	    <a href="<?php the_permalink() ?>">
                                    <figure class="image">
     
                                       <?php if ( has_post_thumbnail()) : the_post_thumbnail(array(350,700)); else :?> <img src="http://placehold.it/200x200 "/><?php endif; ?>
                                      
                                    
                                    </figure>
                                       </a>
                                         <p><?php the_title(); ?></p>
                                </aside> 
                             <?php
			endwhile;
					wp_reset_postdata();

		endif;
	echo '</div>';
		// After widget tag
		echo $args['after_widget'];

	}

	public function form( $instance ) {

		// Set default values
		$instance = wp_parse_args( (array) $instance, array( 
			'randomPost_title' => '',
			'randomPost_number' => '',
		) );

		// Retrieve an existing value from the database
		$randomPost_title = !empty( $instance['randomPost_title'] ) ? $instance['randomPost_title'] : '';
		$randomPost_number = !empty( $instance['randomPost_number'] ) ? $instance['randomPost_number'] : '';

		// Form fields
		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'randomPost_title' ) . '" class="randomPost_title_label">' . __( 'Title', 'text_domain' ) . '</label>';
		echo '	<input type="text" id="' . $this->get_field_id( 'randomPost_title' ) . '" name="' . $this->get_field_name( 'randomPost_title' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr( $randomPost_title ) . '">';
		echo '	<span class="description">' . __( 'The widget title.', 'text_domain' ) . '</span>';
		echo '</p>';

		echo '<p>';
		echo '	<label for="' . $this->get_field_id( 'randomPost_number' ) . '" class="randomPost_number_label">' . __( 'randomPost to show', 'text_domain' ) . '</label>';
		echo '	<input type="number" id="' . $this->get_field_id( 'randomPost_number' ) . '" name="' . $this->get_field_name( 'randomPost_number' ) . '" class="widefat" placeholder="' . esc_attr__( '', 'text_domain' ) . '" value="' . esc_attr( $randomPost_number ) . '">';
		echo '	<span class="description">' . __( 'The number of randomPost to show.', 'text_domain' ) . '</span>';
		echo '</p>';

	}

	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['randomPost_title'] = !empty( $new_instance['randomPost_title'] ) ? strip_tags( $new_instance['randomPost_title'] ) : '';
		$instance['randomPost_number'] = !empty( $new_instance['randomPost_number'] ) ? strip_tags( $new_instance['randomPost_number'] ) : '';

		return $instance;

	}

}

function randomPost_register_widgets() {
	register_widget( 'randomPost_Widget' );
}
add_action( 'widgets_init', 'randomPost_register_widgets' );