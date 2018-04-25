<?php get_header(); ?>

<section class="section section--text">
<div class="container">

	<h4 class="uppercase ex-bold">R+B Insights</h4>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<img src="<?php echo get_the_post_thumbnail_url(); ?>"/>

		<?php the_title(); ?>	
			
			<?php the_content(); ?>

	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

 
</div>
</section>

<?php get_footer(); ?>