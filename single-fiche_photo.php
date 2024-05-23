<?php
/**
 * template for displaying each customized single photo
 *
 */

get_header();
?>

<?php if (have_posts()) : ?>

	<div class="single_photo_page">

	<?php 
	/* Start the Loop */
	while (have_posts()) : the_post(); ?>
	  	<!-- zone container -->
	  	<section class="zone_container">
			<!-- single photo container -->
			<div class="single_photo_container">
				<div class="single_photo_left_container"><!-- left container -->
					<!-- text for photo -->
					<div class="single_photo_card">
						<h2 class="single_photo_title"><?php the_title(); ?></h2>

						<?php $current_reference = get_post_meta(get_the_ID(), 'reference', true); ?>
						<?php $current_categorie = get_the_terms(get_the_ID(), 'categorie'); ?>
						<?php $current_type = get_post_meta(get_the_ID(), 'type_photo', true); ?>
						<?php $current_format = get_the_terms(get_the_ID(), 'format'); ?>

						<p class="single_photo_text photo_description">Référence : <span id="single_photo_reference"><?php echo $current_reference ?> </span></p>
						<p class="single_photo_text photo_description">Catégorie : <?php echo $current_categorie[0]->name ?> </p>
						<p class="single_photo_text photo_description">Format : <?php echo $current_format[0]->name ?> </p>
						<p class="single_photo_text photo_description">Type : <?php echo $current_type ?> </p>
						<p class="single_photo_text photo_description">Année : <?php the_time("Y"); ?> </p>
					</div>
				</div> <!-- left container -->

				<div class="single_photo_right_container"><!-- right container -->			
					<?php echo get_the_post_thumbnail(get_the_ID(), 'medium','class=single_photo_thumbnail'); ?>
				</div> <!-- right container -->
			</div> <!-- single_photo_container -->

			<!-- navigation bar -->
			<div class="single_photo_navbar">
				<p>Cette photo vous intéresse ?</p>
				<!-- Button to launch contact popup -->
				<button id="single_photo_contact" class="CTAbutton">Contact</button>

				<div class="single_photo_direction_container">

					<!--  thumbnail creation -->
					<div class="single_photo_small_thumbnail">
						<!--  get previous thumbnail -->
						<?php  
						$prev_post = get_previous_post();
						if ($prev_post) :
							echo get_the_post_thumbnail($prev_post->ID, 'thumbnail','id=single_photo_previous_thumbnail');
						endif; ?>
						
						<!--  get next thumbnail -->
						<?php  
						$next_post = get_next_post();
						if ($next_post) :
							echo get_the_post_thumbnail($next_post->ID, 'thumbnail','id=single_photo_next_thumbnail');
						endif; ?>
					</div>  <!-- single_photo_small_thumbnail -->

					<!--  arrows creation -->
					<div class="single_photo_direction_arrows">
						<?php
						if ($prev_post) :
							echo '<a href="' . get_permalink($prev_post->ID) . '" class="single_photo_direction_arrow_left" title="' . esc_attr($prev_post->post_title) . '">';?>
							<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/Line 6.png';?>" alt='arrow left' onmouseover="show_arrow_left()" onmouseout="hide_arrow_left()">
							<?php 
							echo '</a>';
						endif; ?>
						<?php
						if ($next_post) :
							echo '<a href="' . get_permalink($next_post->ID) . '" class="single_photo_direction_arrow_right" title="' . esc_attr($next_post->post_title) . '">';?>
							<img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/Line 7.png';?>" alt='arrow right'onmouseover="show_arrow_right()" onmouseout="hide_arrow_right()">
							<?php 
							echo '</a>';
						endif; ?>  
					</div>  <!-- single_photo_direction_arrows -->

				</div> <!-- single_photo_direction_container -->
			</div> <!-- single_photo_navbar -->
		</section> <!-- zone container -->

		<section class="related_container">
			<h3 class="related_photo_title">VOUS AIMEREZ AUSSI</h3>

			<div class="related_2photos"> 
				<?php
				
				// Collect current taxonomy "categorie" of single post page
				$category = get_the_terms(get_the_ID(), 'categorie');
				$category_slug = $category[0]->slug;

				// request build to get 2 photos of the same taxonomy
				$related_args = array(
					'post_type'      => 'fiche_photo',
					'posts_per_page' => 2,
					'orderby'   => 'date',
					'order'   => 'ASC',
					'tax_query' => [
						[
							'taxonomy' => 'categorie',
							'field' => 'slug',
							'terms' => $category_slug,
						],
					], // same taxonomy
					'post__not_in'   => array( get_the_ID() ), // exclude current single photo
				);

				$related_query = new WP_Query($related_args);
	
				// Afficher les photos
				if ( $related_query->have_posts() ) {
					while ( $related_query->have_posts() ) {
						$related_query->the_post();
	
						get_template_part('/template-parts/photo-block'); // one photo block build
				
					}
				}

				// Reset this request to return to global post loop
				wp_reset_postdata();
				
				?>

			</div> <!-- related_2photos -->

		</section> <!-- related_container -->

		
	<?php endwhile; // End of the loop
	?>

	</div> <!-- single_photo_page -->

  <?php else : ?>
	<p>No "Photo" posts in database - Please check site wordpress setup</p>
  <?php endif; ?>

<?php
get_footer();
