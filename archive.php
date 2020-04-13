<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */
?>

<?php get_header(); ?>

<section class="blog-listing-posts">
	<div class="container">
		<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			<div class="blog-listing-post">
				<?php if(has_post_thumbnail()): ?>
					<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('post_image'); ?>" class="img-cover"></a>
				<?php endif; ?>
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				<p><?php the_excerpt(); ?></p>
				<a href="<?php the_permalink(); ?>">Read more</a>
			</div>
		<?php endwhile; else: endif; ?>

		<?php 
			global $wp_query; $big = 99999;

			echo paginate_links(array(
				'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format'  => '?paged-%#%',
				'current' => max(1, get_query_var('paged')),
				'total'   => $wp_query->max_num_pages
			));
		?>
	</div>
</section>

<?php get_footer(); ?>