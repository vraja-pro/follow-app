<?php
/**
 * Entries Class.
 *
 * @package folo-up
 */

namespace FoloUp;

/**
 * Class Patterns.
 */
class Folo_Up_Entry_Comments {

    /**
     * Register hooks.
     * @return void
     */
    public function register(){
        add_action( 'edit_form_after_title', [ $this, 'enqueue_editor_assets' ], 10, 1 );
		add_action( 'edit_form_top', [ $this, 'entry_title' ], 10, 1 );
    }

    /**
	 * Enqueue Admin Scripts
	 */
	public function enqueue_editor_assets( $post ) {

		$asset_config_file = sprintf( '%s/assets.php', FOLO_UP_PLUGIN_BUILD_PATH );

		if ( ! file_exists( $asset_config_file ) ) {
			return;
		}

		$asset_config = include_once $asset_config_file;

		if ( empty( $asset_config['js/editor.js'] ) ) {
			return;
		}

		$editor_asset    = $asset_config['js/editor.js'];
		$js_dependencies = ( ! empty( $editor_asset['dependencies'] ) ) ? $editor_asset['dependencies'] : [];
		$version         = ( ! empty( $editor_asset['version'] ) ) ? $editor_asset['version'] : filemtime( $asset_config_file );

	
        wp_enqueue_script(
            'folo-up-js',
            FOLO_UP_PLUGIN_BUILD_URL . '/js/editor.js',
            $js_dependencies,
            $version,
            true
        );

		// Theme Gutenberg blocks CSS.
		$css_dependencies = [
			'wp-block-library-theme',
			'wp-block-library',
		];

		wp_enqueue_style(
			'folo-up-css',
			FOLO_UP_PLUGIN_BUILD_URL . '/css/editor.css',
			$css_dependencies,
			filemtime( FOLO_UP_PLUGIN_BUILD_PATH . '/css/editor.css' ),
			'all'
		);

		echo '<textarea class="wp-editor-area" name="content" id="content">'. $post->post_content .'</textarea>
		<div id="folo-up-root"></div>';
	}

	/**
	 * Entry Title
	 */
	public function entry_title( $post ) {
		echo '<h2>'. 
		__( 'Entry number:', 'folo-up' ) . ' ' .
		$post->post_title .'</h2>';
	}

}