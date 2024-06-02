<?php
/**
* template for home page motaphoto
 */

get_header(); ?>

<?php if ( is_home() ) : ?>
	<section class="hero">
  		<div>

			<?php
			$args = array(
			'post_type' => 'fiche_photo',
			'posts_per_page' => 1,
			'orderby' => 'rand', // random
			'tax_query' => [
				[
					'taxonomy' => 'format',
					'field' => 'slug',
					'terms' => 'paysage',
				],
			], // format paysage
			);

			$hero_query = new WP_Query($args);
			?>

			<?php while ($hero_query->have_posts()) : $hero_query->the_post();  ?>
			<?php the_post_thumbnail('full', ['class' => 'hero_image']); ?>
			<?php endwhile;
			wp_reset_postdata();
			wp_reset_query(); ?>
  		</div>

		<h1 class="hero_title">PHOTOGRAPHE EVENT</h1>
	</section><!-- hero -->

	<section class="gallery">
		<div class="gallery_filters">

			<div id="gallery_filter_categorie">
				<button class="gallery_filter">CATÉGORIES</button>
				<ul class="gallery_filter_dropdown">
					<li class="gallery_filter_option" data-value=""></li>
					<?php
					
						$categories = get_categories(array('taxonomy' => 'categorie', 'hide_empty' => false));
						foreach ($categories as $category) {
							echo '<li class="gallery_filter_option" data-value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</li>';
						}
					?>				
				</ul>
			</div>
					
			<div id="gallery_filter_format">
				<button class="gallery_filter">FORMATS</button>
				<ul class="gallery_filter_dropdown">
					<li class="gallery_filter_option" data-value=""></li>
					<?php
						$formats = get_categories(array('taxonomy' => 'format', 'hide_empty' => false));
						foreach ($formats as $format) {
							echo '<li class="gallery_filter_option" data-value="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</li>';
						}
					?>				
				</ul>
			</div>

			<div id="gallery_filter_sort">
				<button class="gallery_filter">TRIER PAR</button>
				<ul class="gallery_filter_dropdown">
					<li class="gallery_filter_option" data-value=""></li>
					<li class="gallery_filter_option" data-value="ASC">à partir des plus anciennes</li>
					<li class="gallery_filter_option" data-value="DESC">à partir des plus récentes</li>					
				</ul>
			</div>

		</div><!-- gallery_filters -->
		
<section class="filters">

</section>

		<div class="gallery_photos">
		<?php
		/*
				$category_slug = 'mariage';
				$date_order = 'ASC';

				// request build to get 8 photos with filters selection
				$gallery_args = array(
					'post_type'      => 'fiche_photo',
					'posts_per_page' => 8,
					'orderby'   => 'date',
					'order'   => $date_order,
					'tax_query' => [
						[
							'taxonomy' => 'categorie',
							'field' => 'slug',
							'terms' => $category_slug,
						],
					], 
			
				);

				$gallery_query = new WP_Query($gallery_args);
	
				// display photos
				if ( $gallery_query->have_posts() ) {
					while ( $gallery_query->have_posts() ) {
						$gallery_query->the_post();
	
						get_template_part('/template-parts/photo-block'); // one photo block build
				
					}
				}

				// close current WP loop
				wp_reset_postdata();
				*/
				?>

		</div><!-- gallery_photos -->

		<div class="gallery_load_more">
  			<button class="CTAbutton gallery_load_more_button">Charger plus</button>
		</div>
	</section><!-- gallery -->


	<?php get_template_part('/template_parts/lightbox-modal');?>


<?php endif; /* home page */?>


<?php
get_footer();
