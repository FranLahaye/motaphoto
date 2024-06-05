<?php
/*
 * block of one photo displayed
 */
?>

<!-- photo block -->
<div class="photo_block">
    <!-- image -->
    <a href=" <?php the_permalink(); ?>" >
    <?php echo get_the_post_thumbnail(get_the_ID(), 'medium','class=block_img'); ?>
    </a>

    <!-- overlay -->
    <div class="block_overlay">

        <!-- fullsize icon -->
        <img class="block_icon_full" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/Icon_fullscreen.png';?>"
         alt='pour afficher dans la lightbox' data-fullphoto-url="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" >

        <!--single link icon -->
        <a href=" <?php the_permalink(); ?>" >
            <img class="block_icon_eye" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/Icon_eye.png';?>" alt='pour ouvrir la fiche photo'>
        </a>

        <!-- reference text -->
        <p class="block_infos_reference"><?php echo get_post_meta(get_the_ID(), 'reference', true); ?></p>
        <!-- category text -->
        <?php
            // get the taxonomy "categorie" of the post
            $category = get_the_terms(get_the_ID(), 'categorie');
            // if exist
            if ($category && !is_wp_error($category)) {
                echo '<p class="block_infos_category photo_description">'. $category[0]->name . '</p>';
            }
        ?>

    </div> <!-- block_overlay -->


</div> <!-- photo_block -->
