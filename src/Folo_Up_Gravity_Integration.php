<?php
/**
 * Forms Class.
 *
 * @package folo-up
 */

namespace FoloUp;

use WP_Query;

/**
 * Class Patterns.
 */
class Folo_Up_Gravity_Integration {

    /**
     * Register hooks.
     * @return void
     */
    public function register(){
        add_action( 'gform_after_submission', [ $this, 'create_folo_entry' ], 10, 2 );
    }

    /**
     * Register Custom Post Type
     * @return void
     */
    
    public function create_folo_entry( $entry, $form ) {

        $taxonomy = 'folo_form_category';

        $meta_query_args = [
            'relation' => 'AND',
            [
                'key'     => 'folo_gravity_form_id',
                'value'   => $form['id'],
                'compare' => '='
            ]
        ];
        
        $terms = get_terms( [
            'hide_empty' => false,
            'taxonomy' => $taxonomy,
            'meta_query' => $meta_query_args,
            'fields' => 'ids'
        ] );


        if ( empty($terms) || is_wp_error($terms) ) {
            return;
        }

        $post_id = wp_insert_post( [
            'post_title'  => $entry['id'],
            'post_type'   => 'folo_entry',
            'post_status' => 'publish',
        ] );
    
        if ( is_wp_error( $post_id ) ) {
            return;
        }

        wp_set_object_terms( $post_id, $terms, $taxonomy, true );
         
    }
}