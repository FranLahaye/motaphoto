<?php
/**
 * The template for displaying main page
 *
 */

get_header();
?>
<div class="photo_gallery">
	<?php
	/* create query to wordpress posts containing photos */
	$args = array(
		'post_type' => 'fiche_photo',
		'posts_per_page' => -1,
		'meta_key'  => '_main_char_field',
		'orderby'   => 'meta_value_num',

	);
	$photos_query = new WP_Query($args);
	var_dump($photos_query);
	?>
	<?php if ( $photos_query->have_posts() ) : ?>
		<?php
		/* Start the Loop */
		while ($photos_query->have_posts()) :
			$photos_query->the_post();
			?>
			<!-- integrate each photo image -->
			<div class="photo_container">
				<?php
					echo get_the_post_thumbnail( get_the_ID(), 'full' );
					the_title();
				?>
			</div>

		<?php endwhile; // End of the loop 	?>
	<?php else : ?>
		<p>No "Photo" posts in database - Please check site wordpress setup</p>
	<?php endif; ?>
</div> <!-- photo gallery -->

<?php
get_footer();
