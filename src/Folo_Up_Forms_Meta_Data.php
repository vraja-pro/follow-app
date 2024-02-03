<?php
/**
 * Forms Class.
 *
 * @package folo-up
 */

namespace FoloUp;

use GFAPI;

/**
 * Class Patterns.
 */
class Folo_Up_Forms_Meta_Data {

    /**
     * Register hooks.
     * @return void
     */
    public function register(){
        add_action( 'add_meta_boxes', [ $this, 'folo_add_meta_box' ] );
        add_action( 'save_post', [ $this, 'folo_save_postdata' ] );
    }

   
    /**
     * Register Custom Post Type
     * @return void
     */
    public function folo_add_meta_box() {
        add_meta_box(
            'folo_meta_box',
            'FoloUp Form',
            [ $this, 'folo_meta_box_html' ], 
            'folo_form',
        );
    }

    /**
     * Meta Box HTML
     * @param object $post Post object.
     * @return void
     */
    public function folo_meta_box_html( $post ) {
        $value = get_post_meta( $post->ID, 'folo_gravity_form_id', true );
        $active_forms = GFAPI::get_forms( true );

        
        
        ?>
        <label for="folo_gravity_form_id">Select a form</label>
        <select id="folo_gravity_form_id" name="folo_gravity_form_id">
            <?php foreach ($active_forms as $form){ 
                $selected = (int) $value === $form['id'] ? 'selected' : '';
                if($form){ ?>
                <option value="<?php echo $form['id']; ?>" <?php echo $selected; ?>><?php echo $form['title']; ?></option>
            <?php }} ?>
        </select>
        <?php
    }

    
    /**
     * Save Post Data
     * @param int $post_id Post ID.
     * @return void
     */
    public function folo_save_postdata( $post_id ) {
        if ( array_key_exists( 'folo_gravity_form_id', $_POST ) ) {
            update_post_meta(
                $post_id,
                'folo_gravity_form_id',
                $_POST['folo_gravity_form_id']
            );
        }
    }

}