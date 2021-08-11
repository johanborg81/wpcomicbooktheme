<?php

/**
 * Functions for the character post type.
 * Make all the changes you need here.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly.
    exit;
}

/**
 * Register the character custom post type.
 * 
 * @author JayBee Studios
 * 
 */
function setup_character_post_type() {
    register_post_type('characters',
        [
            'labels'    => [
                'name'  => __('Your Characters'),
                'singular_name' => __('Your Character'),
                'add_new'   => __('Add New Character'),
                'add_new_item'  => __('Add New Character'),
                'edit_item' => __('Edit Character'),
                'search_items'  => __('Search Characters'),
                'not_found' => __('No Characters Found'),
                'not_found_in_trash'    => __('No characters found in trash'),
                'parent_item_colon' => __('Parent Characters')
            ],
            'menu_position' => 6,
            'public'    => true,
            'exclude_from_search'   => true,
            'has_archive'   => true,
            'rewrite'   => ['slug' => 'character'],
            'register_meta_box_cb'  => 'jaybee_characters_meta_box',
            'menu_icon' => 'dashicons-money',
            'show_in_rest'  => true,
            'supports'  => [
                'title', 'thumbnail', 'revisions'
            ],
            'taxonomies'    => ['category', 'post_tag']
        ]
    );
}
add_action('init', 'setup_character_post_type');

/**
 * Create new columns for characters
 * 
 * @author JayBee Studios
 * 
 * @param $columns
 * @return $new_columns
 */
function jaybee_set_characters_columns($columns) {
    $new_columns = [];
    $new_columns['title'] = 'Character Name';
    $new_columns['description'] = 'Description';
    $new_columns['character_image'] = 'Character Image';
    return $new_columns;
}
add_filter('manage_characters_posts_columns', 'jaybee_set_characters_columns');

/**
 * Functions to get the columns and post id
 * 
 * @author JayBee Studios
 * 
 * @param $column
 * @param $post_id
 */
function jaybee_characters_columns($column, $post_id) {
    switch ($column) {
        case 'description' :
            $description = get_post_meta($post_id, '_jaybee_characters_desc_field', true);
            echo $description;
        break;
        case 'character_image' :
            $character_image = get_post_meta($post_id, '_jaybee_characters_image_field', true);
            echo $character_image;
        break;
    }
}
add_action('manage_characters_posts_custom_column', 'jaybee_characters_columns', 10, 2);

/**
 * Add the metabox in the dashboard.
 * 
 * @author JayBee Studios
 */
function jaybee_characters_meta_box() {
    add_meta_box('characters_description', __('Character Description'), 'jaybee_characters_description_callback', 'characters', 'normal', 'high');
    add_meta_box('characters_image', __('Character Image'), 'jaybee_characters_image_callback', 'characters', 'normal', 'high');
}
add_action('add_meta_boxes', 'jaybee_characters_meta_box');

/**
 * The callback function for the character description metabox.
 * Includes the nonce and sets how it will be displayed in the 
 * dashboard when we create a comic page.
 * 
 * @author JayBee Studios
 * @param $post
 */
function jaybee_characters_description_callback($post) {
    wp_nonce_field('jaybee_save_characters_description_data', 'jaybee_characters_desc_field_nonce');
    $description = get_post_meta($post->ID, '_jaybee_characters_desc_field', true);
    ?>
    <label for="jaybee_characters_desc_field"><?php _e("Description"); ?></label>
    <p><span class="marker">*</span>Write a description or intro about your character.</p>
    <textarea name="jaybee_characters_desc_field" id="jaybee_characters_desc_field" class="widefat" size="150"><?= esc_attr($description); ?></textarea>
    <?php
}

/**
 * The callback function for the character image metabox.
 * Includes the nonce and sets how it will be displayed in the
 * dashboard when we create a comic page.
 * 
 * @author JayBee Studios
 * @param $post
 */
function jaybee_characters_image_callback($post) {
    wp_nonce_field('jaybee_save_characters_image_data', 'jaybee_characters_image_field_nonce');
    $character_image = get_post_meta($post->ID, '_jaybee_characters_image_field', true);
    ?>
    <label for="jaybee_characters_image_field"><?php _e("Add the picture of your character"); ?></label>
    <p><span class="marker">*</span></p>
    <input type="button" class="jaybee_custom_image button button-secondary" value="Upload Character Image" id="upload_btn"></input>
    <input readonly type="text" id="jaybee_characters_image_field" name="jaybee_characters_image_field" class="widefat" value="<?= $character_image; ?>"><?= $character_image; ?></input>
    <img style="max-width: 100%;" class="character_img" src="<?= $character_image; ?>" alt="">
    <?php
}

/**
 * Saves the character description.
 * 
 * @author JayBee Studios
 * 
 * @param $post_id
 */
function jaybee_save_characters_description_data($post_id) {
    if (!isset($_POST['jaybee_characters_desc_field_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['jaybee_characters_desc_field_nonce'], 'jaybee_save_characters_description_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (!isset($_POST['jaybee_characters_desc_field'])) {
        return;
    }

    $character_description = sanitize_text_field($_POST['jaybee_characters_desc_field']);

    update_post_meta($post_id, '_jaybee_characters_desc_field', $character_description);
}
add_action('save_post', 'jaybee_save_characters_description_data');

/**
 * Saves the meta character image.
 * 
 * @author JayBee Studios
 * 
 * @param $post_id
 */
function jaybee_save_characters_image_data($post_id) {
    if (!isset($_POST['jaybee_characters_image_field_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['jaybee_characters_image_field_nonce'], 'jaybee_save_characters_image_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (!isset($_POST['jaybee_characters_image_field'])) {
        return;
    }

    if (array_key_exists('jaybee_characters_image_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_jaybee_characters_image_field',
            $_POST['jaybee_characters_image_field']
        );
    }
}
add_action('save_post', 'jaybee_save_characters_image_data');

/**
 * Show the characters
 * 
 * @author JayBee Studios
 * @since 1.0.0
 */
function show_characters($post) {
    $characters = intval(get_post_meta($post->ID, 'characters', true));

    if ($characters > 200 || $characters < 2) $characters = 15;

    $my_query = new WP_QUERY('post_type=characters&nopaging=1');

    if ($my_query->have_posts()) :
    
    ?>
        <div class="characters">
            <ul>
                <?php

                while ($my_query->have_posts()) : $my_query->the_post();

                ?>
                <li class="characters__grid">
                    <div class="characters__grid-img">
                        <?php 
                        
                        $character_img = get_post_meta(get_the_ID(), '_jaybee_characters_image_field', true);

                        if (!empty($character_img)) : 
                        
                        ?>
                        <img src="<?= $character_img; ?>" alt="">

                        <?php endif; ?>
                    </div>
                    <div class="characters__grid-text">
                        <h2><?php the_title(); ?></h2>
                        <?php

                        $character_desc = get_post_meta(get_the_ID(), '_jaybee_characters_desc_field', true);

                        if (!empty($character_desc)) :

                        ?>
                        <p><?= $character_desc; ?></p>

                        <?php endif; ?>
                    </div>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php
    
    wp_reset_postdata();

    endif;
}

// EOF
