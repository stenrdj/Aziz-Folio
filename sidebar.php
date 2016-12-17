<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AzizFolio
 */

if ( is_active_sidebar( 'sidebar-1' ) && is_singular( 'post' )) {
	?>
	<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->

	<?php
} elseif(is_active_sidebar( 'projects-single' ) && is_singular( 'projects' ) )
{
dynamic_sidebar( 'projects-single' ); 

}
?>

