<?php if ( is_single() ): ?>
	<ul class="post-nav">
		<li class="next"><?php next_post_link('%link', '<i class="fas fa-chevron-right"></i><strong>'.esc_html__('Next', 'incolor').'</strong> <span>%title</span>'); ?></li>
		<li class="previous"><?php previous_post_link('%link', '<i class="fas fa-chevron-left"></i><strong>'.esc_html__('Previous', 'incolor').'</strong> <span>%title</span>'); ?></li>
		<div class="clear"></div>
	</ul>
<?php endif; ?>