<?php
/**
 * The template for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
?>

<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-4">
				<?php get_sidebar(); ?>
			</div>
			<div class="col-8">
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				<?php endwhile; else: endif; ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>