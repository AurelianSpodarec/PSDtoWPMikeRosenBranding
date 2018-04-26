<?php get_header(); ?>

<section class="section section--text">
<div class="container">

	<h4 class="uppercase ex-bold" style="margin-bottom: 1.2rem;">R+B Insights</h4>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="single-thumbnail">
	<div class="single-thumbnail__wrap">
	<div class="single-thumbnail__overlay"></div>
	<img class="single-thumbnail__img"src="<?php echo get_the_post_thumbnail_url(); ?>"/>
		<h1 class="single-thumbnail__title standar-underline ex-bold"><span><?php the_title(); ?></span></h1>	
	</div>
	</div>

	<?php the_content(); ?>

	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>

 
</div>
</section>

<?php get_footer(); ?>