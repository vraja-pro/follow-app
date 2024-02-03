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
        add_action('folo_form_category_edit_form_fields', [ $this, 'folo_meta_box_html' ], 10, 2);
        add_action('folo_form_category_add_form_fields', [ $this, 'folo_meta_box_html' ], 10, 2);

        add_action('created_folo_form_category', [ $this, 'folo_save_form_data' ], 10, 1);
        add_action('edited_folo_form_category', [ $this, 'folo_save_form_data' ], 10, 1);
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
    public function folo_meta_box_html( $term ) {
        $value = get_term_meta( $term->term_id, 'folo_gravity_form_id', true );
        $active_forms = GFAPI::get_forms( true );
        
        ?>
        <div class="form-field term-name-wrap">
        <label for="folo_gravity_form_id"><?php _e('Form to follow up:','folo-up'); ?></label>
        <select id="folo_gravity_form_id" name="folo_gravity_form_id">
            <option value=""><?php _e('Select a form','folo-up'); ?></option>
            <?php foreach ($active_forms as $form){ 
                $selected = (int) $value === $form['id'] ? 'selected' : '';
                if($form){ ?>
                <option value="<?php echo $form['id']; ?>" <?php echo $selected; ?>><?php echo $form['title']; ?></option>
            <?php }} ?>
        </select>
          </div>
        <?php
    }

    
    /**
     * Save Post Data
     * @param int $post_id Post ID.
     * @return void
     */
    public function folo_save_form_data( $term_id ) {
        if ( array_key_exists( 'folo_gravity_form_id', $_POST ) ) {
            $value = get_term_meta( $term_id, 'folo_gravity_form_id', true );
            if($value){
                update_term_meta(
                    $term_id,
                    'folo_gravity_form_id',
                    $_POST['folo_gravity_form_id']
                );
            }else{
                add_term_meta(
                    $term_id,
                    'folo_gravity_form_id',
                    $_POST['folo_gravity_form_id']
                );
            }
        }
    }

}