<?php

/**
 * Template for content
 * 
 * @package Aquila
 * */
?>

<div class="entry-content">
	<?php 
		if (is_single()) {
			the_content(
				sprintf(
					wp_kses(
						__('Continue reading %1$s <span class="meta-nav">&rarr;</span>', 'aquila'),
						[
							'span' => [
								'class'
							]
						]
					),
					the_title('<span class="screen-reader-text">"', '"</span>', false)
				)
			);

			wp_link_pages( 
				[
					'before' => '<div class="page-links">' . esc_html('Pages:', 'aquila'),
					'after' => '<div>',
				]
			);
		} else {
			aquila_the_excerpt();
			echo aquila_excerpt_more();
		}

		
	?>
</div>
