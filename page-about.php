<?php get_header(); ?>

<?php if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); ?>


<section class="section">
<div class="container container--fluid">

	<img src="<?php echo get_the_post_thumbnail_url(); ?>"/>
	<?php the_title(); ?>	

</div>
</section>

<section class="section">
<div class="container">

	<h2>We love idea's, let us help you supercharge yours.</h2>


</div>
</section>

<section class="section section--text">
<div class="container">

	<?php the_content(); ?>

</div>
</section>


<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no contentfound.' ); ?></p>
<?php endif; ?>


<?php get_footer(); ?>