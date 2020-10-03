<?php
defined( 'ABSPATH' ) || exit;

/**
 * Initial OneClick import for this theme
 */
if ( ! class_exists( 'Brook_Import' ) ) {
	class Brook_Import {

		public function __construct() {
			add_filter( 'insight_core_import_demos', array( $this, 'import_demos' ) );
			add_filter( 'insight_core_import_generate_thumb', array( $this, 'import_generate_thumb' ) );
		}

		public function import_demos() {
			return array(
				'01' => array(
					'screenshot' => BROOK_THEME_URI . '/screenshot.jpg',
					'name'       => BROOK_THEME_NAME,
					'url'        => 'https://api.thememove.com/import/brook/brook-insightcore01-1.7.0.zip',
				),
			);
		}

		/**
		 * Generate thumbnail while importing
		 */
		function import_generate_thumb() {
			return false;
		}
	}

	new Brook_Import();
}
