<?php
/**
 * The template for displaying archive pages
 *
* adapted from theme Twenty_Twenty_One
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->

	<ul>
    <?php while (have_posts()) : the_post(); ?>
      <a href="<?php the_permalink() ?>">
        <li><?php the_title() ?></li>
      </a>
    <?php endwhile ?>
  	</ul>

	<?php the_posts_pagination(); ?>

<?php else : ?>
	<p>Current template is "archive-fiche_photo.php" - No post type "fiche_photo" published</p>
<?php endif; ?>

<?php
get_footer();
