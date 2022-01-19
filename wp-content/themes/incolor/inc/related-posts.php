<?php $related = incolor_related_posts(); ?>

<?php if ( $related->have_posts() ): ?>

<h4 class="heading">
	<i class="fas fa-hand-point-right"></i><?php esc_html_e('You may also like...','incolor'); ?>
</h4>

<div class="category-featured-cards group">
	
	<?php while ( $related->have_posts() ) : $related->the_post(); ?>
		<?php get_template_part('content-featured-category'); ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

</div>
<?php endif; ?>

<?php wp_reset_postdata(); ?>
