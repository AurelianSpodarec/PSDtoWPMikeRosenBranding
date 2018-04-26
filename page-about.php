<?php get_header(); ?>

<?php if ( have_posts() ) : 
		while ( have_posts() ) : the_post(); ?>


<section class="section section--special">
<div class="container--fluid">

	<div class="section-about__thumbnail" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
	<div class="section-about__overlay"></div>
	
		<div class="section-about__title">
		<h2 class="standar-underline ex-bold">
			<span><?php the_field('featured_title'); ?></span>
		</h2>
		</div>

	</div>

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