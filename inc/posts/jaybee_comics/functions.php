<?php
/**
 * Functions for the custom post type.
 * Make all the changes you need here.
 * 
 * @package jaybeecomictheme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}

/**
 * Register the custom post type.
 * 
 * @author JayBee Studios
 * 
 */
function setup_comic_post_type() {
    register_post_type('comics',
    [
        'labels'    => [
            'name'  => __('Comic Pages'),
            'singular_name' => __('Comic Page'),
            'add_new'   => __('Add New Comic Page'),
            'add_new_item'  => __('Add New Comic Page'),
            'edit_item' => __('Edit Comic Page'),
            'search_items'  => __('Search Comic Pages'),
            'not_found' => __('No pages found'),
            'not_found_in_trash'    => __('No pages found in trash'),
            'parent_item_colon' => 'Parent Pages'
        ],
        'menu_position' => 5,
        'public'    => true,
        'exclude_from_search'   => true,
        'has_archive'   => true,
        'rewrite'   => ['slug' => 'comic'],
        'register_meta_box_cb' => 'jaybee_comics_meta_box',
        'menu_icon' => 'dashicons-edit-page',
        'show_in_rest'  => true,
        'supports'  => [
            'title', 'thumbnail', 'excerpt', 'revisions'
        ],
        'taxonomies'    => ['category', 'post_tag']
    ]);
}
add_action('init', 'setup_comic_post_type');

/**
 * Create new custom columns.
 * Any extra columns you want to add.
 * 
 * @author JayBee Studios
 * @return html $new_columns
 */
function jaybee_set_comic_pages_columns($columns) {
    $new_columns = [];
    $new_columns['title'] = 'Comic Title';
    $new_columns['description'] = 'Description';
    $new_columns['comic_page'] = 'Comic Page';
    $new_columns['date'] = 'Published';
    return $new_columns;
}
add_filter('manage_comics_posts_columns', 'jaybee_set_comic_pages_columns');

/**
 * Function to get the columns and post id
 * @author JayBee Studios
 * 
 * @param $column 
 * @param $post_id
 */
function jaybee_comics_columns($column, $post_id) {
    switch ($column) {
        case 'description' : 
            $description = get_post_meta($post_id, '_jaybee_comics_field', true);
            echo $description;
        break;
        case 'comic_page' :
            $image = get_post_meta($post_id, '_jaybee_comics_pages_field', true);
            echo $image;
        break;    
        case 'date' :
            echo get_the_date();
        break;
    }
}
add_action('manage_comics_posts_custom_column', 'jaybee_comics_columns', 10, 2);

/**
 * Add the metabox in the dashboard
 * @author JayBee Studios
 */
function jaybee_comics_meta_box() {
    add_meta_box('comics_description', __('Comic Description'), 'jaybee_comics_description_callback', 'comics', 'normal', 'high');
    add_meta_box('comics_image', __('Comic Page'), 'jaybee_comics_image_callback', 'comics', 'normal', 'high');
}
add_action('add_meta_boxes', 'jaybee_comics_meta_box');

/**
 * The callback function for the jaybee_comics_meta_box().
 * Includes the nonce and sets how it will be displayed in the 
 * dashboard when we create a comic page.
 * 
 * @author JayBee Studios
 * @param $post
 */
function jaybee_comics_description_callback($post) {
    wp_nonce_field('jaybee_save_comics_description_data', 'jaybee_comics_field_nonce');
    $description = get_post_meta($post->ID, '_jaybee_comics_field', true);
    ?>
    <label for="jaybee_comics_field"><?php _e("Description"); ?></label>
    <p><span class="marker">*</span>Write a description or intro about this episode. Will be displayed below the comic page.</p>
    <textarea type="text" class="widefat" id="jaybee_comics_field" name="jaybee_comics_field" size="150"><?php echo esc_attr($description); ?></textarea>
    <?php
}

/**
 * The callback function for the jaybee_comics_meta_box() for the image.
 * Includes the nonce and sets how it will be displayed in the
 * dashboard when we create a comic page.
 * 
 * @author JayBee Studios
 * @param $post
 */
function jaybee_comics_image_callback($post) {
    wp_nonce_field('jaybee_save_image', 'jaybee_comics_pages_field_nonce');
    $image = get_post_meta($post->ID, '_jaybee_comics_pages_field', true);
    ?>
    <label for="jaybee_comics_pages_field"><?php _e("Upload your comic page") ?></label>
    <p><span class="marker">*</span>The width of the page is 800px width.</p>
    <input type="button" class="jaybee_custom_image button button-secondary" value="Upload Comic Page" id="upload_button"></input>
    <input type="hidden" id="jaybee_comics_pages_field" name="jaybee_comics_pages_field" value="<?= $image; ?>"></input>
    <p><?= $image; ?></p>
    <img src="<?= $image; ?>" alt="">
    <?php
}

/**
 * Saves the meta data description.
 * 
 * @author JayBee Studios
 * 
 * @param $post_id
 */
function jaybee_save_comics_description_data($post_id) {
    if (!isset($_POST['jaybee_comics_field_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['jaybee_comics_field_nonce'], 'jaybee_save_comics_description_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    if (!isset($_POST['jaybee_comics_field'])) {
        return;
    }
    
    $my_data = sanitize_text_field($_POST['jaybee_comics_field']);

    update_post_meta($post_id, '_jaybee_comics_field', $my_data);
}
add_action('save_post', 'jaybee_save_comics_description_data');

/**
 * Saves the meta data comic page
 * 
 * @author JayBee Studios
 * 
 * @param $post_id
 */
function jaybee_save_image($post_id)
{
    if (!isset($_POST['jaybee_comics_pages_field_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['jaybee_comics_pages_field_nonce'], 'jaybee_save_image')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (array_key_exists('jaybee_comics_pages_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_jaybee_comics_pages_field',
            $_POST['jaybee_comics_pages_field']
        );
    }
}
add_action('save_post', 'jaybee_save_image');

// EOF
