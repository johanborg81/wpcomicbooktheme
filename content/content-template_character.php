<?php

/**
 * The template used to display your characters.
 */
if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}

?>
<section id="character-<?php the_ID(); ?>" <?php post_class(); ?>>
    <h1><?php the_title(); ?></h1> 
    <div class="content">
        <?php

        the_content();

        // From characters/functions.php
        show_characters($post);

        ?>
    </div>   
</section>
