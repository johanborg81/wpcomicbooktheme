<?php

/**
 * The template used to display comic pages archive content. 
 */

if (!defined('ABSPATH')) {
    // Exit if accessed directly
    exit;
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1><?php the_title(); ?></h1>
    </header>
    <div class="content__archive">
        <?php 
        
        the_content(); 

        // From archives-functions.php
        show_last_pages();

        ?>
        <div class="content__archive-months">
            <?php

            // From archives-functions.php
            show_pages_by_months();

            ?>
        </div>
    </div>
</article>
