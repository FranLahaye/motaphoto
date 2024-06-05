<?php
/*
 * modal of photo lightbox
 */
?>

<div class="lightbox">
    <button class="lightbox__close">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/cross.svg" alt="croix de fermeture">
    </button>
    <button class="lightbox__next">
        <span>Suivante</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow_next.svg" alt="flèche suivante"
        onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/arrow_next_hover.svg'"
        onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/arrow_next.svg'" />
    </button>
    <button class="lightbox__prev">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow_prev.svg" alt="flèche précédente"
        onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/arrow_prev_hover.svg'"
        onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/assets/img/arrow_prev.svg'" />
        <span>Précédente</span>
    </button>
    <div class="lightbox__container">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_Nathalie_Mota.png" alt="Logo">
    </div>
    <div class="lightbox__infos">
        <p class="lightbox__reference">REF</p>
        <p class="lightbox__category photo_description">CAT</p>
    </div>
</div>