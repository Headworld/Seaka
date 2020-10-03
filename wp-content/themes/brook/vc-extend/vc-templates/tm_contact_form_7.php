<?php
defined( 'ABSPATH' ) || exit;

$el_class = $style = '';

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class  = $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'tm-contact-form-7 ' . $el_class, $this->settings['base'], $atts );

$css_class .= " style-$style";

wp_enqueue_script( 'brook-contact-form' );

$css_class .= Brook_Helper::get_animation_classes();
?>
<div class="<?php echo esc_attr( trim( $css_class ) ); ?>">
	<?php echo do_shortcode( '[contact-form-7 id="' . $id . '"]' ); ?>
	<div class="tm-form-loading" style="display: none;">
		<?php get_template_part( 'components/preloader/style', 'wave' ); ?>
	</div>
</div>
