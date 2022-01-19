<?php
/**
 * The template for displaying single posts and pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="content-singl" role="main">

	<?php
	//получения все постов
	the_post();
	
	//Проверка на то какие посты выводятся, запихиваем в массив все id или слаги
	if ( is_page( array('contacts', 'reviews', 'about-us')) ) {
		
		//переписать на свой custom-page
	    get_template_part( 'template-parts/content', get_post_type() );
		
		if(is_page(array ('reviews'))) {
			custom_cause_form();
		}

	} else {

	    get_template_part( 'template-parts/content-cover', get_post_type() );

	}

	// if ( have_posts() ) {

	// 	while ( have_posts() ) {
	// 		the_post();

	// 		// get_template_part( 'template-parts/content', get_post_type() );
	// 		get_template_part( 'template-parts/content-cover', get_post_type() );
	// 	}
	// }

	?>

</main><!-- #site-content -->

<?php 
get_template_part( 'template-parts/footer-menus-widgets' ); 
?>

<?php get_footer(); ?>
