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

        $query = new WP_Query( array(
            'post_type'  => 'folo-form',
            'posts_per_page' => 1,
            'meta_query' => array(
                array(
                    'key'   => 'folo_gravity_form_id',
                    'value' => $form['id'],
                )
            )
        ) );


        if ( !$query->have_posts() ) {
            return;
        }

        $post_id = wp_insert_post( array(
            'post_title' => $entry['id'],
            'post_type' => 'folo-entry',
            'post_status' => 'publish',
        ) );
    
        if ( is_wp_error( $post_id ) ) {
            return;
        }

        $category_slug = $form['id'];
        $category = term_exists( $category_slug, 'category' );

        if ( 0 === $category || null === $category ) {
            $category = wp_insert_term(
                $form['title'], 
                'category', 
                array(
                    'slug' => $category_slug,
                )
            );
        }

        wp_set_post_terms( $post_id, $category_slug, 'category' );
         
    }
}