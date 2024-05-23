<?php
/*
 * Modal for contact form
 */
?>

<div id="contact-modal" class="contact_overlay">
    <div class="contact_popup">
        <img class="contact_popup_header" src="<?php echo get_template_directory_uri(); ?>/assets/img/Contact_header.png" alt="header de la popup contact">
        
        <div class="contact_popup_form">
            <?php
                    // contact 7 form insertion
                    echo do_shortcode('[contact-form-7 id="d5fae1e" title="Contact"]');
            ?>
        </div>
    </div>
</div>
