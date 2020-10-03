<?php
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( '__return_zero_string' ) ) {
	function __return_zero_string() {
		return '0';
	}
}

if ( ! function_exists( '__return_none_string' ) ) {
	function __return_none_string() {
		return 'none';
	}
}
