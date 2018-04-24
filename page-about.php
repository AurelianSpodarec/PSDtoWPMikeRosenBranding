<?php get_header(); ?>

<section class="section">
<div style="background-image: url("<?php the_post_thumbnail(); ?>");">
<div class="container">

	<h2>We love idea's, let us help you supercharge yours.</h2>


</div>
</div>
</section>

<section class="section section--text">
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