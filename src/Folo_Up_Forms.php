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
        add_action( 'init', [ $this, 'create_entries_category_taxonomy' ], 0 );
    }


    /**
     * Register Folo form taxonomy.
     * @return void
     */
    public function create_entries_category_taxonomy() {
        $labels = array(
            'name' => _x( 'Folo Forms', 'taxonomy general name', 'folo-up' ),
            'singular_name' => _x( 'Folo Form', 'taxonomy singular name', 'folo-up' ),
            'search_items' =>  __( 'Search Forms', 'folo-up' ),
            'all_items' => __( 'All forms', 'folo-up' ),
            'parent_item' => __( 'Parent Category', 'folo-up' ),
            'parent_item_colon' => __( 'Parent Category:', 'folo-up' ),
            'edit_item' => __( 'Edit Category', 'folo-up' ),
            'update_item' => __( 'Update Category', 'folo-up' ),
            'add_new_item' => __( 'Add New Category', 'folo-up' ),
            'new_item_name' => __( 'New Category Name', 'folo-up' ),
            'menu_name' => __( 'Folo forms', 'folo-up' ),
        );
    
        register_taxonomy( 'folo_form_category', array('folo_entry'), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'folo_form_category' ),
        ));
    }

}