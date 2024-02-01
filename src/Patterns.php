<?php
/**
 * Patterns Class.
 *
 * @package folo-up
 */

namespace FoloUp;

/**
 * Class Patterns.
 */
class Patterns {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->init();
	}

	/**
	 * Initialize.
	 */
	private function init() {
		/**
		 * Actions.
		 */
		add_action( 'init', [ $this, 'register_block_patterns' ] );
		add_action( 'init', [ $this, 'register_block_pattern_categories' ] );
	}

	/**
	 * Register Block Patterns.
	 */
	public function register_block_patterns() {
		if ( function_exists( 'register_block_pattern' ) ) {

			// Get the two column pattern content.
			$two_columns_content = folo_up_get_template( 'patterns/two-columns' );

			/**
			 * Register Two Column Pattern
			 */
			register_block_pattern(
				'folo-up/two-columns',
				[
					'title'       => __( 'Folo Up Two Column', 'folo-up' ),
					'description' => __( 'Foloup Two Column Patterns', 'folo-up' ),
					'categories'  => [ 'foloup-columns' ],
					'content'     => $two_columns_content,
				]
			);

			/**
			 * Two Columns Secondary Pattern
			 */
			$two_columns_secondary_content = folo_up_get_template( 'patterns/two-columns-secondary' );

			register_block_pattern(
				'folo-up/two-columns-secondary',
				[
					'title'       => __( 'Foloup Two Columns Secondary', 'folo-up' ),
					'description' => __( 'Foloup Cover Block with image and text', 'folo-up' ),
					'categories'  => [ 'foloup-columns' ],
					'content'     => $two_columns_secondary_content,
				]
			);
		}
	}

	/**
	 * Register Block Pattern Categories.
	 */
	public function register_block_pattern_categories() {

		$pattern_categories = [
			'foloup-columns' => __( 'Folo Up Columns', 'folo-up' ),
		];

		if ( ! empty( $pattern_categories ) ) {
			foreach ( $pattern_categories as $pattern_category => $pattern_category_label ) {
				register_block_pattern_category(
					$pattern_category,
					[ 'label' => $pattern_category_label ]
				);
			}
		}
	}
}
