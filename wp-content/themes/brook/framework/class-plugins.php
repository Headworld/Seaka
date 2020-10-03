<?php
defined( 'ABSPATH' ) || exit;

/**
 * Plugin installation and activation for WordPress themes
 */
if ( ! class_exists( 'Brook_Register_Plugins' ) ) {
	class Brook_Register_Plugins {

		public function __construct() {
			add_filter( 'insight_core_tgm_plugins', array( $this, 'register_required_plugins' ) );
		}

		public function register_required_plugins() {
			/*
			 * Array of plugin arrays. Required keys are name and slug.
			 * If the source is NOT from the .org repo, then source is also required.
			 */
			$plugins = array(
				array(
					'name'     => esc_html__( 'Insight Core', 'brook' ),
					'slug'     => 'insight-core',
					'source'   => 'https://www.dropbox.com/s/tw626ypffwphtwa/insight-core-1.6.9.zip?dl=1',
					'version'  => '1.6.9',
					'required' => true,
				),
				array(
					'name'     => esc_html__( 'WPBakery Page Builder', 'brook' ),
					'slug'     => 'js_composer',
					'source'   => 'https://www.dropbox.com/s/hkzhn2gf8i8f7gv/js_composer-6.2.0.zip?dl=1',
					'version'  => '6.2',
					'required' => true,
				),
				array(
					'name'    => esc_html__( 'WPBakery Page Builder (Visual Composer) Clipboard', 'brook' ),
					'slug'    => 'vc_clipboard',
					'source'  => 'https://www.dropbox.com/s/vouj59phunrc35c/vc_clipboard-4.5.5.zip?dl=1',
					'version' => '4.5.5',
				),
				array(
					'name' => esc_html__( 'Contact Form 7', 'brook' ),
					'slug' => 'contact-form-7',
				),
				array(
					'name' => esc_html__( 'MailChimp for WordPress', 'brook' ),
					'slug' => 'mailchimp-for-wp',
				),
				array(
					'name' => esc_html__( 'WooCommerce', 'brook' ),
					'slug' => 'woocommerce',
				),
				array(
					'name' => esc_html__( 'WPC Smart Compare for WooCommerce', 'brook' ),
					'slug' => 'woo-smart-compare',
				),
				array(
					'name' => esc_html__( 'WPC Smart Wishlist for WooCommerce', 'brook' ),
					'slug' => 'woo-smart-wishlist',
				),
				array(
					'name'     => esc_html__( 'Revolution Slider', 'brook' ),
					'slug'     => 'revslider',
					'source'  => 'https://www.dropbox.com/s/t0tfdtxjrd46svs/revslider-6.2.15.zip?dl=1',
					'version' => '6.2.15',
					'required' => true,
				),
			);

			return $plugins;
		}

	}

	new Brook_Register_Plugins();
}
