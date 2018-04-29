<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'templates/section', 'about-thumb' ); ?>

	<main class="section section--main">
	<div class="container">

		<?php the_content(); ?>

	</div>
	</main>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no content found.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>