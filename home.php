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








<?php endif; /* home page */?>


<?php
get_footer();
