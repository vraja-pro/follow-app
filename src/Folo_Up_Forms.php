<?php
/**
 * Forms Class.
 *
 * @package folo-up
 */

namespace FoloUp;

/**
 * Class Patterns.
 */
class Folo_Up_Forms {

    /**
     * Register hooks.
     * @return void
     */
    public function register(){
        add_action( 'init', [ $this, 'custom_post_type'], 0 );
    }

    /**
     * Register Custom Post Type
     * @return void
     */
    public function custom_post_type() {

        $labels = array(
            'name'                  => _x( 'Folo Forms', 'Post Type General Name', 'folo-up' ),
            'singular_name'         => _x( 'Folo Form', 'Post Type Singular Name', 'folo-up' ),
            'menu_name'             => __( 'Folo Forms', 'folo-up' ),
            'name_admin_bar'        => __( 'Folo Form', 'folo-up' ),
            'archives'              => __( 'Folo Form Archives', 'folo-up' ),
            'attributes'            => __( 'Item Attributes', 'folo-up' ),
            'parent_item_colon'     => __( 'Parent Item:', 'folo-up' ),
            'all_items'             => __( 'All Folo Forms', 'folo-up' ),
            'add_new_item'          => __( 'Add New Folo Form', 'folo-up' ),
            'add_new'               => __( 'Add New', 'folo-up' ),
            'new_item'              => __( 'New Folo Form', 'folo-up' ),
            'edit_item'             => __( 'Edit Folo Form', 'folo-up' ),
            'update_item'           => __( 'Update Folo Form', 'folo-up' ),
            'view_item'             => __( 'View Folo Form', 'folo-up' ),
            'view_items'            => __( 'View Folo Form', 'folo-up' ),
            'search_items'          => __( 'Search Folo Form', 'folo-up' ),
            'not_found'             => __( 'Not found', 'folo-up' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'folo-up' ),
            'featured_image'        => __( 'Featured Image', 'folo-up' ),
            'set_featured_image'    => __( 'Set featured image', 'folo-up' ),
            'remove_featured_image' => __( 'Remove featured image', 'folo-up' ),
            'use_featured_image'    => __( 'Use as featured image', 'folo-up' ),
            'insert_into_item'      => __( 'Insert into item', 'folo-up' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'folo-up' ),
            'items_list'            => __( 'Items list', 'folo-up' ),
            'items_list_navigation' => __( 'Items list navigation', 'folo-up' ),
            'filter_items_list'     => __( 'Filter items list', 'folo-up' ),
        );
        $args = array(
            'label'                 => __( 'Folo Form', 'folo-up' ),
            'description'           => __( 'Folo up form', 'folo-up' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-list-view',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => false,
            'capability_type'       => 'post',
        );
        register_post_type( 'folo_form', $args );

    }

}