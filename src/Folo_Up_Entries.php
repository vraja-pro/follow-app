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
class Folo_Up_Entries {

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
            'name'                  => _x( 'Folo Entries', 'Post Type General Name', 'folo-up' ),
            'singular_name'         => _x( 'Folo Entry ', 'Post Type Singular Name', 'folo-up' ),
            'menu_name'             => __( 'Folo Entries', 'folo-up' ),
            'name_admin_bar'        => __( 'Folo Entry ', 'folo-up' ),
            'archives'              => __( 'Folo Entry Archives', 'folo-up' ),
            'attributes'            => __( 'Item Attributes', 'folo-up' ),
            'parent_item_colon'     => __( 'Parent Item:', 'folo-up' ),
            'all_items'             => __( 'All Folo Entries', 'folo-up' ),
            'add_new_item'          => __( 'Add New Folo Entry ', 'folo-up' ),
            'add_new'               => __( 'Add New', 'folo-up' ),
            'new_item'              => __( 'New Folo Entry ', 'folo-up' ),
            'edit_item'             => __( 'Edit Folo Entry ', 'folo-up' ),
            'update_item'           => __( 'Update Folo Entry ', 'folo-up' ),
            'view_item'             => __( 'View Folo Entry ', 'folo-up' ),
            'view_items'            => __( 'View Folo Entry ', 'folo-up' ),
            'search_items'          => __( 'Search Folo Entry ', 'folo-up' ),
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
            'label'                 => __( 'Folo Entry ', 'folo-up' ),
            'description'           => __( 'Folo up Entry ', 'folo-up' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor' ),
            'taxonomies'            => array( 'folo_form_category', 'post_tag' ),
            'hierarchical'          => false,
            'public'                => false,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 6,
            'menu_icon'             => 'dashicons-email-alt',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => false,
            'capability_type'       => 'post',
        );
        register_post_type( 'folo_entry', $args );

    }

}