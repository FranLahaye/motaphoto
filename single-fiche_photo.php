<?php
/**
 * The template for displaying all single posts
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
						<h1 class="single_photo_title"><?php the_title(); ?></h1>

						<?php $current_reference = get_post_meta(get_the_ID(), 'reference', true); ?>
						<?php $current_categorie = get_the_terms(get_the_ID(), 'categorie'); ?>
						<?php $current_type = get_post_meta(get_the_ID(), 'type_photo', true); ?>
						<?php $current_format = get_the_terms(get_the_ID(), 'format'); ?>

						<h2 class="single_photo_text">Référence : <span id="single_photo_reference"><?php echo $current_reference ?> </span></h2>
						<h2 class="single_photo_text">Catégorie : <?php echo $current_categorie[0]->name ?> </h2>
						<h2 class="single_photo_text">Format : <?php echo $current_format[0]->name ?> </h2>
						<h2 class="single_photo_text">Type : <?php echo $current_type ?> </h2>
						<h2 class="single_photo_text">Année : <?php the_time("Y"); ?> </h2>
					</div>
				</div> <!-- left container -->

				<div class="single_photo_right_container"><!-- right container -->			
					<?php echo get_the_post_thumbnail(get_the_ID(), 'medium','class=single_photo_thumbnail'); ?>
				</div> <!-- right container -->
			</div> <!-- single_photo_container -->

			<!-- navigation bar -->
			<div class="single_photo_navbar">
				<h2 class="single_photo_question">Cette photo vous intéresse ?</h2>
				<!-- Button to launch contact popup -->
				<button id="single_photo_contact">Contact</button>

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

		<section>
        <?php get_template_part('assets/templates_parts/photo-block'); ?>
		</section> <!-- zone container -->

		
	<?php endwhile; // End of the loop
	?>

	</div> <!-- single_photo_page -->

  <?php else : ?>
	<p>No "Photo" posts in database - Please check site wordpress setup</p>
  <?php endif; ?>

<?php
get_footer();
