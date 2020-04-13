<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */
?>

<?php get_header(); ?>

<section class="blog-post">
	<div class="container">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<?php if(has_post_thumbnail()): ?>
				<img src="<?php the_post_thumbnail_url('post_image'); ?>" class="img-cover">
			<?php endif; ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<?php the_tags(); ?>
		<?php endwhile; else: endif; ?>
	</div>
</section>

<?php get_footer(); ?>