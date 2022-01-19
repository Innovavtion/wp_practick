<?php
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

/*  Add Config
/* ------------------------------------ */
Kirki::add_config( 'incolor', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/*  Add Links
/* ------------------------------------ */
Kirki::add_section( 'morelink', array(
	'title'       => esc_html__( 'AlxMedia', 'incolor' ),
	'type'        => 'link',
	'button_text' => esc_html__( 'View More Themes', 'incolor' ),
	'button_url'  => 'http://alx.media/themes/',
	'priority'    => 13,
) );
Kirki::add_section( 'reviewlink', array(
	'title'       => esc_html__( 'Like This Theme?', 'incolor' ),
	'panel'       => 'options',
	'type'        => 'link',
	'button_text' => esc_html__( 'Write a Review', 'incolor' ),
	'button_url'  => 'https://wordpress.org/support/theme/incolor/reviews/#new-post',
	'priority'    => 1,
) );

/*  Add Panels
/* ------------------------------------ */
Kirki::add_panel( 'options', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Theme Options', 'incolor' ),
) );

/*  Add Sections
/* ------------------------------------ */
Kirki::add_section( 'general', array(
    'priority'    => 10,
    'title'       => esc_html__( 'General', 'incolor' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'blog', array(
    'priority'    => 20,
    'title'       => esc_html__( 'Blog', 'incolor' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'header', array(
    'priority'    => 30,
    'title'       => esc_html__( 'Header', 'incolor' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'footer', array(
    'priority'    => 40,
    'title'       => esc_html__( 'Footer', 'incolor' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'layout', array(
    'priority'    => 50,
    'title'       => esc_html__( 'Layout', 'incolor' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'sidebars', array(
    'priority'    => 60,
    'title'       => esc_html__( 'Sidebars', 'incolor' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'social', array(
    'priority'    => 70,
    'title'       => esc_html__( 'Social Links', 'incolor' ),
	'panel'       => 'options',
) );
Kirki::add_section( 'styling', array(
    'priority'    => 80,
    'title'       => esc_html__( 'Styling', 'incolor' ),
	'panel'       => 'options',
) );

/*  Add Fields
/* ------------------------------------ */

// General: Mobile Sidebar
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'mobile-sidebar-hide',
	'label'			=> esc_html__( 'Mobile Sidebar Content', 'incolor' ),
	'description'	=> esc_html__( 'Sidebar content on low-resolution mobile devices (320px)', 'incolor' ),
	'section'		=> 'general',
	'default'		=> 'on',
) );
// General: Recommended Plugins
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'recommended-plugins',
	'label'			=> esc_html__( 'Recommended Plugins', 'incolor' ),
	'description'	=> esc_html__( 'Enable or disable the recommended plugins notice', 'incolor' ),
	'section'		=> 'general',
	'default'		=> 'on',
) );
// Blog: Enable Blog Heading
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'heading-enable',
	'label'			=> esc_html__( 'Enable Blog Heading', 'incolor' ),
	'description'	=> esc_html__( 'Show heading on blog home', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> 'on',
) );
// Blog: Heading
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'text',
	'settings'		=> 'blog-heading',
	'label'			=> esc_html__( 'Heading', 'incolor' ),
	'description'	=> esc_html__( 'Your blog heading', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> '',
) );
// Blog: Subheading
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'text',
	'settings'		=> 'blog-subheading',
	'label'			=> esc_html__( 'Subheading', 'incolor' ),
	'description'	=> esc_html__( 'Your blog subheading', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> '',
) );
// Blog: Excerpt Length
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'excerpt-length',
	'label'			=> esc_html__( 'Excerpt Length', 'incolor' ),
	'description'	=> esc_html__( 'Max number of words. Set it to 0 to disable.', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> '20',
	'choices'     => array(
		'min'	=> '0',
		'max'	=> '100',
		'step'	=> '1',
	),
) );
// Blog: Featured Posts Include
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'featured-posts-include',
	'label'			=> esc_html__( 'Featured Posts', 'incolor' ),
	'description'	=> esc_html__( 'Exclude featured posts from the content below', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> 'off',
) );
// Blog: Featured Category
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'select',
	'settings'		=> 'featured-category',
	'label'			=> esc_html__( 'Featured Category', 'incolor' ),
	'description'	=> esc_html__( 'By not selecting a category, it will show your latest post(s) from all categories', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> '',
	'choices'		=> Kirki_Helper::get_terms( 'category' ),
	'placeholder'	=> esc_html__( 'Select a category', 'incolor' ),
) );
// Blog: Featured Post Count
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'featured-posts-count',
	'label'			=> esc_html__( 'Featured Post Count', 'incolor' ),
	'description'	=> esc_html__( 'Max number of featured posts to display. Set it to 0 to disable', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> '5',
	'choices'     => array(
		'min'	=> '0',
		'max'	=> '14',
		'step'	=> '1',
	),
) );
// Blog: Frontpage Widgets Top
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'frontpage-widgets-top',
	'label'			=> esc_html__( 'Frontpage Widgets Top', 'incolor' ),
	'description'	=> esc_html__( '2 columns of widgets', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> 'off',
) );
// Blog: Frontpage Widgets Bottom
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'frontpage-widgets-bottom',
	'label'			=> esc_html__( 'Frontpage Widgets Bottom', 'incolor' ),
	'description'	=> esc_html__( '2 columns of widgets', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> 'off',
) );
// Blog: Comment Count
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'comment-count',
	'label'			=> esc_html__( 'Comment Count', 'incolor' ),
	'description'	=> esc_html__( 'Comment count on bubbles', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> 'on',
) );
// Blog: Single - Authorbox
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'author-bio',
	'label'			=> esc_html__( 'Single - Author Bio', 'incolor' ),
	'description'	=> esc_html__( 'Shows post author description, if it exists', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> 'on',
) );
// Blog: Single - Related Posts
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio',
	'settings'		=> 'related-posts',
	'label'			=> esc_html__( 'Single - Related Posts', 'incolor' ),
	'description'	=> esc_html__( 'Shows randomized related articles below the post', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> 'categories',
	'choices'		=> array(
		'disable'	=> esc_html__( 'Disable', 'incolor' ),
		'categories'=> esc_html__( 'Related by categories', 'incolor' ),
		'tags'		=> esc_html__( 'Related by tags', 'incolor' ),
	),
) );
// Blog: Single - Post Navigation
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio',
	'settings'		=> 'post-nav',
	'label'			=> esc_html__( 'Single - Post Navigation', 'incolor' ),
	'description'	=> esc_html__( 'Shows links to the next and previous article', 'incolor' ),
	'section'		=> 'blog',
	'default'		=> 'sidebar',
	'choices'		=> array(
		'disable'	=> esc_html__( 'Disable', 'incolor' ),
		'sidebar'	=> esc_html__( 'Sidebar', 'incolor' ),
		'content'	=> esc_html__( 'Below content', 'incolor' ),
	),
) );
// Header: Search
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'header-search',
	'label'			=> esc_html__( 'Header Search', 'incolor' ),
	'description'	=> esc_html__( 'Header search button', 'incolor' ),
	'section'		=> 'header',
	'default'		=> 'on',
) );
// Header: Social Links
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'header-social',
	'label'			=> esc_html__( 'Header Social Links', 'incolor' ),
	'description'	=> esc_html__( 'Social link icon buttons', 'incolor' ),
	'section'		=> 'header',
	'default'		=> 'on',
) );
// Header: Profile Avatar
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'image',
	'settings'		=> 'profile-image',
	'label'			=> esc_html__( 'Profile Image', 'incolor' ),
	'description'	=> esc_html__( '320px minimum width ', 'incolor' ),
	'section'		=> 'header',
	'default'		=> '',
) );
// Header: Profile Name
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'text',
	'settings'		=> 'profile-name',
	'label'			=> esc_html__( 'Profile Name', 'incolor' ),
	'description'	=> esc_html__( 'Your name appears below the image', 'incolor' ),
	'section'		=> 'header',
	'default'		=> '',
) );
// Header: Profile Description
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'textarea',
	'settings'		=> 'profile-description',
	'label'			=> esc_html__( 'Profile Description', 'incolor' ),
	'description'	=> esc_html__( 'A short description of you', 'incolor' ),
	'section'		=> 'header',
	'default'		=> '',
) );
// Footer: Ads
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'footer-ads',
	'label'			=> esc_html__( 'Footer Ads', 'incolor' ),
	'description'	=> esc_html__( 'Footer widget ads area', 'incolor' ),
	'section'		=> 'footer',
	'default'		=> 'off',
) );
// Footer: Widget Columns
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'footer-widgets',
	'label'			=> esc_html__( 'Footer Widget Columns', 'incolor' ),
	'description'	=> esc_html__( 'Select columns to enable footer widgets. Recommended number: 3', 'incolor' ),
	'section'		=> 'footer',
	'default'		=> '0',
	'choices'     => array(
		'0'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'1'	=> get_template_directory_uri() . '/functions/images/footer-widgets-1.png',
		'2'	=> get_template_directory_uri() . '/functions/images/footer-widgets-2.png',
		'3'	=> get_template_directory_uri() . '/functions/images/footer-widgets-3.png',
		'4'	=> get_template_directory_uri() . '/functions/images/footer-widgets-4.png',
	),
) );
// Footer: Social Links
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'footer-social',
	'label'			=> esc_html__( 'Footer Social Links', 'incolor' ),
	'description'	=> esc_html__( 'Social link icon buttons', 'incolor' ),
	'section'		=> 'footer',
	'default'		=> 'on',
) );
// Footer: Custom Logo
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'image',
	'settings'		=> 'footer-logo',
	'label'			=> esc_html__( 'Footer Logo', 'incolor' ),
	'description'	=> esc_html__( 'Upload your custom logo image', 'incolor' ),
	'section'		=> 'footer',
	'default'		=> '',
) );
// Footer: Copyright
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'text',
	'settings'		=> 'copyright',
	'label'			=> esc_html__( 'Footer Copyright', 'incolor' ),
	'description'	=> esc_html__( 'Replace the footer copyright text', 'incolor' ),
	'section'		=> 'footer',
	'default'		=> '',
) );
// Footer: Credit
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'credit',
	'label'			=> esc_html__( 'Footer Credit', 'incolor' ),
	'description'	=> esc_html__( 'Footer credit text', 'incolor' ),
	'section'		=> 'footer',
	'default'		=> 'on',
) );
// Layout: Global
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-global',
	'label'			=> esc_html__( 'Global Layout', 'incolor' ),
	'description'	=> esc_html__( 'Other layouts will override this option if they are set', 'incolor' ),
	'section'		=> 'layout',
	'default'		=> 'col-2cl',
	'choices'     => array(
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Home
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-home',
	'label'			=> esc_html__( 'Home', 'incolor' ),
	'description'	=> esc_html__( '(is_home) Posts homepage layout', 'incolor' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Single
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-single',
	'label'			=> esc_html__( 'Single', 'incolor' ),
	'description'	=> esc_html__( '(is_single) Single post layout - If a post has a set layout, it will override this.', 'incolor' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Archive
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-archive',
	'label'			=> esc_html__( 'Archive', 'incolor' ),
	'description'	=> esc_html__( '(is_archive) Category, date, tag and author archive layout', 'incolor' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout : Archive - Category
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-archive-category',
	'label'			=> esc_html__( 'Archive - Category', 'incolor' ),
	'description'	=> esc_html__( '(is_category) Category archive layout', 'incolor' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Search
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-search',
	'label'			=> esc_html__( 'Search', 'incolor' ),
	'description'	=> esc_html__( '(is_search) Search page layout', 'incolor' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Error 404
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-404',
	'label'			=> esc_html__( 'Error 404', 'incolor' ),
	'description'	=> esc_html__( '(is_404) Error 404 page layout', 'incolor' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );
// Layout: Default Page
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'radio-image',
	'settings'		=> 'layout-page',
	'label'			=> esc_html__( 'Default Page', 'incolor' ),
	'description'	=> esc_html__( '(is_page) Default page layout - If a page has a set layout, it will override this.', 'incolor' ),
	'section'		=> 'layout',
	'default'		=> 'inherit',
	'choices'     => array(
		'inherit'	=> get_template_directory_uri() . '/functions/images/layout-off.png',
		'col-1c'	=> get_template_directory_uri() . '/functions/images/col-1c.png',
		'col-2cl'	=> get_template_directory_uri() . '/functions/images/col-2cl.png',
		'col-2cr'	=> get_template_directory_uri() . '/functions/images/col-2cr.png',
	),
) );


function incolor_kirki_sidebars_select() { 
 	$sidebars = array(); 
 	if ( isset( $GLOBALS['wp_registered_sidebars'] ) ) { 
 		$sidebars = $GLOBALS['wp_registered_sidebars']; 
 	} 
 	$sidebars_choices = array(); 
 	foreach ( $sidebars as $sidebar ) { 
 		$sidebars_choices[ $sidebar['id'] ] = $sidebar['name']; 
 	} 
 	if ( ! class_exists( 'Kirki' ) ) { 
 		return; 
 	}
	// Sidebars: Select
	Kirki::add_field( 'incolor_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-home',
		'label'			=> esc_html__( 'Home', 'incolor' ),
		'description'	=> esc_html__( '(is_home) Primary', 'incolor' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'incolor' ),
	) );
	Kirki::add_field( 'incolor_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-single',
		'label'			=> esc_html__( 'Single', 'incolor' ),
		'description'	=> esc_html__( '(is_single) Primary - If a single post has a unique sidebar, it will override this.', 'incolor' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'incolor' ),
	) );
	Kirki::add_field( 'incolor_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-archive',
		'label'			=> esc_html__( 'Archive', 'incolor' ),
		'description'	=> esc_html__( '(is_archive) Primary', 'incolor' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'incolor' ),
	) );
	Kirki::add_field( 'incolor_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-archive-category',
		'label'			=> esc_html__( 'Archive - Category', 'incolor' ),
		'description'	=> esc_html__( '(is_category) Primary', 'incolor' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'incolor' ),
	) );
	Kirki::add_field( 'incolor_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-search',
		'label'			=> esc_html__( 'Search', 'incolor' ),
		'description'	=> esc_html__( '(is_search) Primary', 'incolor' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'incolor' ),
	) );
	Kirki::add_field( 'incolor_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-404',
		'label'			=> esc_html__( 'Error 404', 'incolor' ),
		'description'	=> esc_html__( '(is_404) Primary', 'incolor' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'incolor' ),
	) );
	Kirki::add_field( 'incolor_theme', array(
		'type'			=> 'select',
		'settings'		=> 's1-page',
		'label'			=> esc_html__( 'Default Page', 'incolor' ),
		'description'	=> esc_html__( '(is_page) Primary - If a page has a unique sidebar, it will override this.', 'incolor' ),
		'section'		=> 'sidebars',
		'choices'		=> $sidebars_choices, 
		'default'		=> '',
		'placeholder'	=> esc_html__( 'Select a sidebar', 'incolor' ),
	) );
	
 } 
add_action( 'init', 'incolor_kirki_sidebars_select', 999 ); 

// Social Links: List
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'repeater',
	'label'			=> esc_html__( 'Create Social Links', 'incolor' ),
	'description'	=> esc_html__( 'Create and organize your social links', 'incolor' ),
	'section'		=> 'social',
	'tooltip'		=> esc_html__( 'Font Awesome names:', 'incolor' ) . ' <a href="https://fontawesome.com/icons?d=gallery&s=brands&m=free" target="_blank"><strong>' . esc_html__( 'View All', 'incolor' ) . ' </strong></a>',
	'row_label'		=> array(
		'type'	=> 'text',
		'value'	=> esc_html__('social link', 'incolor' ),
	),
	'settings'		=> 'social-links',
	'default'		=> '',
	'fields'		=> array(
		'social-title'	=> array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Title', 'incolor' ),
			'description'	=> esc_html__( 'Ex: Facebook', 'incolor' ),
			'default'		=> '',
		),
		'social-icon'	=> array(
			'type'			=> 'text',
			'label'			=> esc_html__( 'Icon Name', 'incolor' ),
			'description'	=> esc_html__( 'Font Awesome icons. Ex: fa-facebook ', 'incolor' ) . ' <a href="https://fontawesome.com/icons?d=gallery&s=brands&m=free" target="_blank"><strong>' . esc_html__( 'View All', 'incolor' ) . ' </strong></a>',
			'default'		=> 'fa-',
		),
		'social-link'	=> array(
			'type'			=> 'link',
			'label'			=> esc_html__( 'Link', 'incolor' ),
			'description'	=> esc_html__( 'Enter the full url for your icon button', 'incolor' ),
			'default'		=> 'http://',
		),
		'social-color'	=> array(
			'type'			=> 'color',
			'label'			=> esc_html__( 'Icon Color', 'incolor' ),
			'description'	=> esc_html__( 'Set a unique color for your icon (optional)', 'incolor' ),
			'default'		=> '',
		),
		'social-target'	=> array(
			'type'			=> 'checkbox',
			'label'			=> esc_html__( 'Open in new window', 'incolor' ),
			'default'		=> false,
		),
	)
) );
// Styling: Enable
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'dynamic-styles',
	'label'			=> esc_html__( 'Dynamic Styles', 'incolor' ),
	'description'	=> esc_html__( 'Turn on to use the styling options below', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> 'on',
) );
// Styling: Boxed Layout
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'switch',
	'settings'		=> 'boxed',
	'label'			=> esc_html__( 'Boxed Layout', 'incolor' ),
	'description'	=> esc_html__( 'Use a boxed layout', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> 'off',
) );
// Styling: Font
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'select',
	'settings'		=> 'font',
	'label'			=> esc_html__( 'Font', 'incolor' ),
	'description'	=> esc_html__( 'Select font for the theme', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> 'roboto',
	'choices'     => array(
		'titillium-web'			=> esc_html__( 'Titillium Web, Latin (Self-hosted)', 'incolor' ),
		'titillium-web-ext'		=> esc_html__( 'Titillium Web, Latin-Ext', 'incolor' ),
		'droid-serif'			=> esc_html__( 'Droid Serif, Latin', 'incolor' ),
		'source-sans-pro'		=> esc_html__( 'Source Sans Pro, Latin-Ext', 'incolor' ),
		'lato'					=> esc_html__( 'Lato, Latin', 'incolor' ),
		'raleway'				=> esc_html__( 'Raleway, Latin', 'incolor' ),
		'ubuntu'				=> esc_html__( 'Ubuntu, Latin-Ext', 'incolor' ),
		'ubuntu-cyr'			=> esc_html__( 'Ubuntu, Latin / Cyrillic-Ext', 'incolor' ),
		'roboto'				=> esc_html__( 'Roboto, Latin-Ext', 'incolor' ),
		'roboto-cyr'			=> esc_html__( 'Roboto, Latin / Cyrillic-Ext', 'incolor' ),
		'roboto-condensed'		=> esc_html__( 'Roboto Condensed, Latin-Ext', 'incolor' ),
		'roboto-condensed-cyr'	=> esc_html__( 'Roboto Condensed, Latin / Cyrillic-Ext', 'incolor' ),
		'roboto-slab'			=> esc_html__( 'Roboto Slab, Latin-Ext', 'incolor' ),
		'roboto-slab-cyr'		=> esc_html__( 'Roboto Slab, Latin / Cyrillic-Ext', 'incolor' ),
		'playfair-display'		=> esc_html__( 'Playfair Display, Latin-Ext', 'incolor' ),
		'playfair-display-cyr'	=> esc_html__( 'Playfair Display, Latin / Cyrillic', 'incolor' ),
		'open-sans'				=> esc_html__( 'Open Sans, Latin-Ext', 'incolor' ),
		'open-sans-cyr'			=> esc_html__( 'Open Sans, Latin / Cyrillic-Ext', 'incolor' ),
		'pt-serif'				=> esc_html__( 'PT Serif, Latin-Ext', 'incolor' ),
		'pt-serif-cyr'			=> esc_html__( 'PT Serif, Latin / Cyrillic-Ext', 'incolor' ),
		'arial'					=> esc_html__( 'Arial', 'incolor' ),
		'georgia'				=> esc_html__( 'Georgia', 'incolor' ),
		'verdana'				=> esc_html__( 'Verdana', 'incolor' ),
		'tahoma'				=> esc_html__( 'Tahoma', 'incolor' ),
	),
) );
// Styling: Container Width
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'container-width',
	'label'			=> esc_html__( 'Website Max-width', 'incolor' ),
	'description'	=> esc_html__( 'Max-width of the container. Use default for full width.', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '1280',
	'choices'     => array(
		'min'	=> '1024',
		'max'	=> '1920',
		'step'	=> '1',
	),
) );
// Styling: Primary Color
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-1',
	'label'			=> esc_html__( 'Primary Color', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '#009ae4',
) );
// Styling: Background Color
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-background',
	'label'			=> esc_html__( 'Background Color', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '#151a23',
) );
// Styling: Background Color (Boxed)
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-background-boxed',
	'label'			=> esc_html__( 'Background Color (Boxed)', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '#2d313a',
) );
// Styling: Header Background
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-header-background',
	'label'			=> esc_html__( 'Header Color', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Carousel Background
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-carousel-background',
	'label'			=> esc_html__( 'Carousel Color', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Content Background
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-content-background',
	'label'			=> esc_html__( 'Content Color', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Widget Background
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-widget-background',
	'label'			=> esc_html__( 'Sidebar Widget Color', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Profile Background
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-profile-background',
	'label'			=> esc_html__( 'Sidebar Profile Color', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Profile Name Background
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-profile-name',
	'label'			=> esc_html__( 'Sidebar Profile Name Color', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Footer Background
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-footer-background',
	'label'			=> esc_html__( 'Footer Color', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Footer Bottom Background
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'color',
	'settings'		=> 'color-footer-bottom-background',
	'label'			=> esc_html__( 'Footer Bottom Color', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '',
) );
// Styling: Header Logo Max-height
Kirki::add_field( 'incolor_theme', array(
	'type'			=> 'slider',
	'settings'		=> 'logo-max-height',
	'label'			=> esc_html__( 'Header Logo Image Max-height', 'incolor' ),
	'description'	=> esc_html__( 'Your logo image should have the double height of this to be high resolution', 'incolor' ),
	'section'		=> 'styling',
	'default'		=> '60',
	'choices'     => array(
		'min'	=> '40',
		'max'	=> '200',
		'step'	=> '1',
	),
) );
