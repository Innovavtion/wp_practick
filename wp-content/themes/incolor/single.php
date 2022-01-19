<?php get_header(); ?>

<div class="content">
	
	<?php while ( have_posts() ): the_post(); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

			<header class="entry-header group">
				<div class="entry-category"><?php the_category(' / '); ?></div>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-byline">
					<span class="entry-author"><?php esc_html_e('by','incolor'); ?> <?php the_author_posts_link(); ?></span>
					<span class="entry-date"><?php the_time( get_option('date_format') ); ?></span>
					<?php do_action( 'alx_ext_sharrre' ); ?>
				</div>
				
			</header>
			
			<div class="entry-media">
				<?php if ( get_theme_mod('post-formats-enable','off') == 'on' || get_post_format() ) : ?>
					<?php if( get_post_format() ) { get_template_part('inc/post-formats'); } ?>
				<?php else: ?>
					<?php if ( has_post_thumbnail() ) : ?>
						<?php the_post_thumbnail('incolor-large'); ?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="entry-content">
				<div class="entry themeform">	
					<?php the_content(); ?>
					<?php wp_link_pages(array('before'=>'<div class="post-pages">'.esc_html__('Pages:','incolor'),'after'=>'</div>')); ?>
					<div class="clear"></div>				
				</div><!--/.entry-->
			</div>
			<div class="entry-footer group">
				
				<?php the_tags('<p class="post-tags"><span>'.esc_html__('Tags:','incolor').'</span> ','','</p>'); ?>
				
				<div class="clear"></div>
				
				<?php if ( ( get_theme_mod( 'author-bio', 'on' ) == 'on' ) && get_the_author_meta( 'description' ) ): ?>
					<div class="author-bio">
						<div class="bio-avatar"><?php echo get_avatar(get_the_author_meta('user_email'),'128'); ?></div>
						<p class="bio-name"><?php the_author_meta('display_name'); ?></p>
						<p class="bio-desc"><?php the_author_meta('description'); ?></p>
						<div class="clear"></div>
					</div>
				<?php endif; ?>
				
				<?php do_action( 'alx_ext_sharrre_footer' ); ?>
				
				<?php if ( get_theme_mod( 'post-nav', 'sidebar' ) == 'content' ) { get_template_part('inc/post-nav'); } ?>

				<?php if ( get_theme_mod( 'related-posts', 'categories' ) != 'disable' ) { get_template_part('inc/related-posts'); } ?>
				
				<?php if ( comments_open() || get_comments_number() ) :	comments_template( '/comments.php', true ); endif; ?>
				
			</div>
			
		</article>
	
	<?php endwhile; ?>
	
</div><!--/.content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>