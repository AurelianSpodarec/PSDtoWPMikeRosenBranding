<?php get_header(); ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'templates/section', 'about-thumb' ); ?>

	<section class="section section--text">
	<div class="container">

		<?php the_content(); ?>

	</div>
	</section>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no content found.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>