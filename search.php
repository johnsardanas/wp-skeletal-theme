<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */
?>

<?php get_header(); ?>

<section>
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<h1>
				<?php _e( 'Search results for: ', 'custom-theme' ); ?>
				<span class="page-description"><?php echo get_search_query(); ?></span>
			</h1>
			<?php while (have_posts()) : the_post(); ?>
				<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
				<?php the_content(); ?>
			<?php endwhile;
				global $wp_query; $big = 99999;
				echo paginate_links(array(
					'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
					'format'  => '?paged-%#%',
					'current' => max(1, get_query_var('paged')),
					'total'   => $wp_query->max_num_pages
				));
		else : ?>
			<h1>
				<?php _e( 'Search results for: ', 'custom-theme' ); ?>
				<span class="page-description"><?php echo get_search_query(); ?></span>
			</h1>
			<?php echo '<h2>No results found.</h2>';
		endif;
		?>
	</div>
</section>

<?php get_footer(); ?>