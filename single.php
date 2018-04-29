<?php get_header(); ?>


<main class="section section--main">
<div class="container">

	<h4>R+B Insights</h4>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'templates/section', 'thumbnail-single' ); ?>

		<?php the_content(); ?>

	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

 
</div>
</main>


<?php get_footer(); ?>