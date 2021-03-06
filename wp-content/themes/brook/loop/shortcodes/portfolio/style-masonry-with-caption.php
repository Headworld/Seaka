<div class="grid-sizer"></div>
<?php
$_image_width = 480;
if ( $masonry_image_size_width && $masonry_image_size_width !== '' ) {
	$_image_width = intval( $masonry_image_size_width );
}
while ( $brook_query->have_posts() ) :
	$brook_query->the_post();

	$classes = array( 'portfolio-item grid-item' );
	?>
	<div <?php post_class( implode( ' ', $classes ) ); ?>>
		<div class="post-wrapper">
			<a href="<?php Brook_Portfolio::the_permalink(); ?>" class="post-permalink link-secret">

				<div class="post-thumbnail-wrapper">
					<div class="post-thumbnail">
						<?php if ( has_post_thumbnail() ) { ?>
							<?php Brook_Image::the_post_thumbnail( array(
								'size'   => 'custom',
								'width'  => $_image_width,
								'height' => 9999,
								'crop'   => false,
							) ); ?>
						<?php } else { ?>
							<?php Brook_Templates::image_placeholder( 480, 480 ); ?>
						<?php } ?>

					</div>

					<?php if ( $overlay_style !== '' ) : ?>
						<?php get_template_part( 'loop/portfolio/overlay', $overlay_style ); ?>
					<?php endif; ?>

				</div>

				<div class="post-info">
					<h3 class="post-title"><?php the_title(); ?></h3>

					<?php
					$terms = get_the_terms( $post->ID, 'portfolio_category' );
					if ( is_array( $terms ) ) { ?>
						<div class="post-categories">
							<?php
							$separator = ', ';
							$_c        = 0;
							$tem       = '';
							foreach ( $terms as $term ) {
								if ( $_c > 0 ) {
									$tem .= $separator;
								}

								$tem .= $term->name;

								$_c++;
							}

							echo esc_html( $tem );
							?>
						</div>
					<?php } ?>

				</div>

			</a>
		</div>
	</div>
<?php endwhile; ?>
