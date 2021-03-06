<?php
defined( 'ABSPATH' ) || exit;

$style      = $el_class = $items = $loop = $equal_height = $auto_play = $v_center = $h_center = $fw_image = $nav = $pagination = '';
$image_size = $image_size_width = $image_size_height = '';
$atts       = vc_map_get_attributes( $this->getShortcode(), $atts );
$css_id     = uniqid( 'tm-case-study-slider-' );
$this->get_inline_css( "#$css_id", $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-case-study-slider tm-swiper ' . $el_class, $this->settings['base'], $atts );

$css_class .= " style-$style";

if ( $nav !== '' ) {
	$css_class .= " nav-style-$nav";
}

if ( $pagination !== '' ) {
	$css_class .= " pagination-style-$pagination";
}

if ( $equal_height === '1' ) {
	$css_class .= ' equal-height';
}

if ( $v_center === '1' ) {
	$css_class .= ' v-center';
}

if ( $h_center === '1' ) {
	$css_class .= ' h-center';
}

$css_class .= Brook_Helper::get_animation_classes();

$items = (array) vc_param_group_parse_atts( $items );

if ( count( $items ) <= 0 ) {
	return;
}
?>

<div class="<?php echo esc_attr( trim( $css_class ) ); ?>" id="<?php echo esc_attr( $css_id ); ?>"
     data-lg-items="1"

	<?php if ( $gutter > 1 ) : ?>
		data-lg-gutter="<?php echo esc_attr( $gutter ); ?>"
	<?php endif; ?>

	<?php if ( $nav !== '' ) : ?>
		data-nav="1"
	<?php endif; ?>

	<?php if ( $nav === 'custom' ) : ?>
		data-custom-nav="<?php echo esc_attr( $slider_button_id ); ?>"
	<?php endif; ?>

	<?php if ( $pagination !== '' ) : ?>
		data-pagination="1"
	<?php endif; ?>

	<?php if ( $auto_play !== '' ) : ?>
		data-autoplay="<?php echo esc_attr( $auto_play ); ?>"
	<?php endif; ?>

	<?php if ( $loop === '1' ) : ?>
		data-loop="1"
	<?php endif; ?>
>
	<div class="swiper-container">
		<div class="swiper-wrapper">

			<?php $p_count = 0; ?>

			<?php foreach ( $items as $item ) {
				$slide_class = 'swiper-slide';

				$p_count          += 1;
				$p_count_template = str_pad( $p_count, 2, '0', STR_PAD_LEFT );
				$p_count_template = $p_count_template . '.';
				?>
				<div class="<?php echo esc_attr( $slide_class ); ?>">
					<div class="swiper-slide-inner">
						<div class="row">
							<div class="col-md-5">
								<?php
								$_flag = false;
								if ( isset( $item['link'] ) ) {
									$link = vc_build_link( $item['link'] );
									if ( $link['url'] !== '' ) {
										$_target = $link['target'] !== '' ? ' target="_blank"' : '';
										$_title  = $link['title'] !== '' ? ' title="' . esc_attr( $link['title'] ) . '"' : '';
										echo '<a href="' . esc_url( $link['url'] ) . '"' . $_target . $_title . ' class="link-secret">';
										$_flag = true;
									}
								}
								?>


								<div class="slider-content">

									<div class="post-count">
										<?php echo esc_html( $p_count_template ); ?>
									</div>

									<?php if ( isset( $item['sub_title'] ) ) : ?>
										<h6 class="sub-title"><?php echo esc_html( $item['sub_title'] ); ?></h6>
									<?php endif; ?>

									<?php if ( isset( $item['title'] ) ) : ?>
										<h5 class="title"><?php echo esc_html( $item['title'] ); ?></h5>
									<?php endif; ?>

									<?php if ( isset( $item['text'] ) ) : ?>
										<div class="text"><?php echo esc_html( $item['text'] ); ?></div>
									<?php endif; ?>
								</div>

								<?php
								if ( $_flag === true ) {
									echo '</a>';
								}
								?>
							</div>
							<div class="col-md-7">
								<?php if ( isset( $item['image'] ) ) : ?>
									<div class="image-wrap">
										<div class="image">
											<?php Brook_Image::the_attachment_by_id( array(
												'id'     => $item['image'],
												'size'   => $image_size,
												'width'  => $image_size_width,
												'height' => $image_size_height,
											) ); ?>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
