<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="custom-content" href="esc_url( get_permalink() )">
		<?php

			//Image post
			if ( ! is_search() ) {
				get_template_part( 'template-parts/add-custom/custom-image' );
			}

			//Title post
			if ( is_singular() ) {
				the_title( '<h3 class="custom-title">', '</h3>' );
			} else {
				the_title( '<h3 class="custom-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
			}

		?>
		<!-- Text post -->
		<!-- .post-inner -->
		<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

			<?php
			
			// get_template_part( 'template-parts/custom-entry-header' );
			?>

			<!-- .entry-content -->
			<div class="entry-content">

				<?php
				if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
					the_excerpt();
				} else {
					the_content( __( 'Continue reading', 'twentytwenty' ) );
				}
				?>

			</div>

		</div>

		<!-- Отображение автора, даты, коментариев -->
		<div>
			<?php
				twentytwenty_the_post_meta( get_the_ID(), 'single-top' );
			?>
		</div>
	</div>
</article>