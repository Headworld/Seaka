<?php
while ( $brook_query->have_posts() ) :
	$brook_query->the_post();
	$classes = array( 'portfolio-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>

		<a href="<?php Brook_Portfolio::the_permalink(); ?>" class="post-permalink link-secret">
			<?php if ( has_post_thumbnail() ) { ?>
				<?php Brook_Image::the_post_thumbnail( array(
					'size'   => 'custom',
					'width'  => 960,
					'height' => 9999,
					'crop'   => false,
				) ); ?>
			<?php } else { ?>
				<?php Brook_Templates::image_placeholder( 480, 480 ); ?>
			<?php } ?>

			<div class="post-thumbnail">
				<?php if ( $overlay_style !== '' ) : ?>
					<?php get_template_part( 'loop/portfolio/overlay', $overlay_style ); ?>
				<?php endif; ?>
			</div>
		</a>
	</div>
<?php endwhile; ?>
