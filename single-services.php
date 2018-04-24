<?php get_header(); ?>


<?php get_template_part( 'templates/section', 'services-menu' ); ?>

<section class="section">
<div class="container">

	<?php if ( have_posts() ) : 
	while ( have_posts() ) : the_post(); ?>

	<?php the_content(); ?>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no contentfound.' ); ?></p>
<?php endif; ?>

</div>
</section>


<?php get_footer(); ?>