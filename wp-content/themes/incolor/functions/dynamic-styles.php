<?php
/* ------------------------------------------------------------------------- *
 *  Dynamic styles
/* ------------------------------------------------------------------------- */

/*  Convert hexadecimal to rgb
/* ------------------------------------ */
if ( ! function_exists( 'incolor_hex2rgb' ) ) {

	function incolor_hex2rgb( $hex, $array=false ) {
		$hex = str_replace("#", "", $hex);

		if ( strlen($hex) == 3 ) {
			$r = hexdec(substr($hex,0,1).substr($hex,0,1));
			$g = hexdec(substr($hex,1,1).substr($hex,1,1));
			$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
			$r = hexdec(substr($hex,0,2));
			$g = hexdec(substr($hex,2,2));
			$b = hexdec(substr($hex,4,2));
		}

		$rgb = array( $r, $g, $b );
		if ( !$array ) { $rgb = implode(",", $rgb); }
		return $rgb;
	}
	
}	


/*  Google fonts
/* ------------------------------------ */
if ( ! function_exists( 'incolor_enqueue_google_fonts' ) ) {

	function incolor_enqueue_google_fonts () {
		if ( get_theme_mod('dynamic-styles', 'on') == 'on' ) {
			if ( get_theme_mod( 'font' ) == 'titillium-web-ext' ) { wp_enqueue_style( 'titillium-web-ext', '//fonts.googleapis.com/css?family=Titillium+Web:400,400italic,300italic,300,600&subset=latin,latin-ext' ); }		
			if ( get_theme_mod( 'font' ) == 'droid-serif' )	{ wp_enqueue_style( 'droid-serif', '//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700' ); }				
			if ( get_theme_mod( 'font' ) == 'source-sans-pro' )	{ wp_enqueue_style( 'source-sans-pro', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300italic,300,400italic,600&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'lato' ) { wp_enqueue_style( 'lato', '//fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700' ); }
			if ( get_theme_mod( 'font' ) == 'raleway' )	{ wp_enqueue_style( 'raleway', '//fonts.googleapis.com/css?family=Raleway:400,300,600' ); }
			if ( get_theme_mod( 'font' ) == 'ubuntu' ) { wp_enqueue_style( 'ubuntu', '//fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'ubuntu-cyr' ) { wp_enqueue_style( 'ubuntu-cyr', '//fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,cyrillic-ext' ); }
			/*default*/ if ( ( get_theme_mod( 'font' ) == '' ) || ( get_theme_mod( 'font' ) == 'roboto' ) ) { wp_enqueue_style( 'roboto', '//fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-cyr' ) { wp_enqueue_style( 'roboto-cyr', '//fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-condensed' ) { wp_enqueue_style( 'roboto-condensed', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-condensed-cyr' ) { wp_enqueue_style( 'roboto-condensed-cyr', '//fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-slab' ) { wp_enqueue_style( 'roboto-slab', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'roboto-slab-cyr' ) { wp_enqueue_style( 'roboto-slab-cyr', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'playfair-display' ) { wp_enqueue_style( 'playfair-display', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'playfair-display-cyr' ) { wp_enqueue_style( 'playfair-display-cyr', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700&subset=latin,cyrillic' ); }
			if ( get_theme_mod( 'font' ) == 'open-sans' ) { wp_enqueue_style( 'open-sans', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'open-sans-cyr' ) { wp_enqueue_style( 'open-sans-cyr', '//fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,cyrillic-ext' ); }
			if ( get_theme_mod( 'font' ) == 'pt-serif' ) { wp_enqueue_style( 'pt-serif', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,latin-ext' ); }
			if ( get_theme_mod( 'font' ) == 'pt-serif-cyr' ) { wp_enqueue_style( 'pt-serif-cyr', '//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,cyrillic-ext' ); }
		}
	}	
	
}
add_action( 'wp_enqueue_scripts', 'incolor_enqueue_google_fonts' ); 	


/*  Dynamic css output
/* ------------------------------------ */
if ( ! function_exists( 'incolor_dynamic_css' ) ) {

	function incolor_dynamic_css() {
		if ( get_theme_mod('dynamic-styles', 'on') == 'on' ) {
		
			// rgb values
			$color_1 = get_theme_mod('color-1');
			$color_1_rgb = incolor_hex2rgb($color_1);
			
			// start output
			$styles = '';		
			
			// google fonts
			if ( get_theme_mod( 'font' ) == 'titillium-web-ext' ) { $styles .= 'body { font-family: "Titillium Web", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'droid-serif' ) { $styles .= 'body { font-family: "Droid Serif", serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'source-sans-pro' ) { $styles .= 'body { font-family: "Source Sans Pro", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'lato' ) { $styles .= 'body { font-family: "Lato", Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'raleway' ) { $styles .= 'body { font-family: "Raleway", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'ubuntu' ) || ( get_theme_mod( 'font' ) == 'ubuntu-cyr' ) ) { $styles .= 'body { font-family: "Ubuntu", Arial, sans-serif; }'."\n"; }	
			/*default*/ if ( ( get_theme_mod( 'font' ) == '' ) || ( get_theme_mod( 'font' ) == 'roboto' ) || ( get_theme_mod( 'font' ) == 'roboto-cyr' ) ) { $styles .= 'body { font-family: "Roboto", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'roboto-condensed' ) || ( get_theme_mod( 'font' ) == 'roboto-condensed-cyr' ) ) { $styles .= 'body { font-family: "Roboto Condensed", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'roboto-slab' ) || ( get_theme_mod( 'font' ) == 'roboto-slab-cyr' ) ) { $styles .= 'body { font-family: "Roboto Slab", Arial, sans-serif; }'."\n"; }			
			if ( ( get_theme_mod( 'font' ) == 'playfair-display' ) || ( get_theme_mod( 'font' ) == 'playfair-display-cyr' ) ) { $styles .= 'body { font-family: "Playfair Display", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'open-sans' ) || ( get_theme_mod( 'font' ) == 'open-sans-cyr' ) )	{ $styles .= 'body { font-family: "Open Sans", Arial, sans-serif; }'."\n"; }
			if ( ( get_theme_mod( 'font' ) == 'pt-serif' ) || ( get_theme_mod( 'font' ) == 'pt-serif-cyr' ) ) { $styles .= 'body { font-family: "PT Serif", serif; }'."\n"; }	
			if ( get_theme_mod( 'font' ) == 'arial' ) { $styles .= 'body { font-family: Arial, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'georgia' ) { $styles .= 'body { font-family: Georgia, serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'verdana' ) { $styles .= 'body { font-family: Verdana, sans-serif; }'."\n"; }
			if ( get_theme_mod( 'font' ) == 'tahoma' ) { $styles .= 'body { font-family: Tahoma, sans-serif; }'."\n"; }
			
			// container width
			if ( get_theme_mod('container-width','1280') != '1280' ) {			
				if ( get_theme_mod( 'boxed' ) ) { 
					$styles .= '.boxed #wrapper { max-width: '.esc_attr( get_theme_mod('container-width') ).'px; }'."\n";
				}
				else {
					$styles .= '.full-width .container-inner { max-width: '.esc_attr( get_theme_mod('container-width') ).'px; }'."\n";
				}
			}
			// primary color
			if ( get_theme_mod('color-1','#009ae4') != '#009ae4' ) {
				$styles .= '
a,
.themeform label .required,
.entry a { color: '.esc_attr( get_theme_mod('color-1') ).'; }

.themeform input[type="button"],
.themeform input[type="reset"],
.themeform input[type="submit"],
.themeform button[type="button"],
.themeform button[type="reset"],
.themeform button[type="submit"],
.themeform input[type="button"]:hover,
.themeform input[type="reset"]:hover,
.themeform input[type="submit"]:hover,
.themeform button[type="button"]:hover,
.themeform button[type="reset"]:hover,
.themeform button[type="submit"]:hover,
.slick-featured .slick-posts-nav .slick-prev,
.slick-featured .slick-posts-nav .slick-next,
.slick-featured .slick-posts-nav .slick-prev:hover,
.slick-featured .slick-posts-nav .slick-next:hover,
.slick-featured .slick-posts-nav .slick-prev:focus,
.slick-featured .slick-posts-nav .slick-next:focus,
.card-comments,
.author-bio .bio-avatar:after,
.alx-tabs-nav li.active a,
.commentlist li.bypostauthor > .comment-body:after,
.commentlist li.comment-author-admin > .comment-body:after,
.wp-pagenavi a:hover,
.wp-pagenavi a:active,
.wp-pagenavi span.current,
#profile { background-color: '.esc_attr( get_theme_mod('color-1') ).'; }

.card-comments:before { border-right: 10px solid '.esc_attr( get_theme_mod('color-1') ).'; }
				'."\n";
			}
			// background color
			if ( get_theme_mod('color-background','#151a23') != '#151a23' ) {
				$styles .= '
body,
.themeform input[type="search"],
.themeform input[type="text"], 
.themeform input[type="password"], 
.themeform input[type="email"], 
.themeform input[type="url"],
.themeform input[type="tel"],
.themeform input[type="number"],
.themeform select,
.themeform textarea,
.search-expand .themeform input,
#profile-name { background-color: '.esc_attr( get_theme_mod('color-background') ).'; }

#profile-name:after { border-top-color: '.esc_attr( get_theme_mod('color-background') ).'; }

#wrapper-bg { display: none; }
				'."\n";
			}
			// background color (boxed)
			if ( get_theme_mod('color-background-boxed','#2d313a') != '#2d313a' ) {
				$styles .= '
.boxed #wrapper { background-color: '.esc_attr( get_theme_mod('color-background-boxed') ).'; }
				'."\n";
			}
			// header background color
			if ( get_theme_mod('color-header-background','') != '' ) {
				$styles .= '
#header { background-color: '.esc_attr( get_theme_mod('color-header-background') ).'; }
				'."\n";
			}
			// carousel background color
			if ( get_theme_mod('color-carousel-background','') != '' ) {
				$styles .= '
.slick-featured { background-color: '.esc_attr( get_theme_mod('color-carousel-background') ).'; }
				'."\n";
			}
			// content background color
			if ( get_theme_mod('color-content-background','') != '' ) {
				$styles .= '
#page,
.themeform input[type="search"],
.themeform input[type="text"], 
.themeform input[type="password"], 
.themeform input[type="email"], 
.themeform input[type="url"],
.themeform input[type="tel"],
.themeform input[type="number"],
.themeform select,
.themeform textarea { background-color: '.esc_attr( get_theme_mod('color-content-background') ).'; }
#wrapper-bg { display: none; }
				'."\n";
			}
			// sidebar widget background color
			if ( get_theme_mod('color-widget-background','') != '' ) {
				$styles .= '
.sidebar .widget,
.sidebar .widget:hover,
.sidebar .post-nav { background-color: '.esc_attr( get_theme_mod('color-widget-background') ).'; }
				'."\n";
			}
			// sidebar profile background color
			if ( get_theme_mod('color-profile-background','') != '' ) {
				$styles .= '
#profile { background-color: '.esc_attr( get_theme_mod('color-profile-background') ).'; }
				'."\n";
			}
			// sidebar profile name background color
			if ( get_theme_mod('color-profile-name','') != '' ) {
				$styles .= '
#profile-name { background-color: '.esc_attr( get_theme_mod('color-profile-name') ).'; }
#profile-name:after { border-top-color: '.esc_attr( get_theme_mod('color-profile-name') ).'; }
				'."\n";
			}
			// footer background color
			if ( get_theme_mod('color-footer-background','') != '' ) {
				$styles .= '
#footer { background-color: '.esc_attr( get_theme_mod('color-footer-background') ).'; }
				'."\n";
			}
			// footer bottom background color
			if ( get_theme_mod('color-footer-bottom-background','') != '' ) {
				$styles .= '
#footer-bottom { background-color: '.esc_attr( get_theme_mod('color-footer-bottom-background') ).'; }
				'."\n";
			}
			// header logo max-height
			if ( get_theme_mod('logo-max-height','60') != '60' ) {
				$styles .= '.site-title a img { max-height: '.esc_attr( get_theme_mod('logo-max-height') ).'px; }'."\n";
			}
			// header text color
			if ( get_theme_mod( 'header_textcolor' ) != '' ) {
				$styles .= '.site-title a, .site-description { color: #'.esc_attr( get_theme_mod( 'header_textcolor' ) ).'; }'."\n";
			}
			wp_add_inline_style( 'incolor-style', $styles );	
		}
	}
	
}
add_action( 'wp_enqueue_scripts', 'incolor_dynamic_css' );
