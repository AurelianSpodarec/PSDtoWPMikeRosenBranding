<?php get_header(); ?>


<?php get_template_part( 'templates/section', 'work-menu' ); ?>

<?php  

	$args =   array(
		'post_type' => 'work',
		'meta_query' => array(
			array(
				'key' => 'feature_on_work_page',
				'value' => '1',
			)
		 )
	);

		$loop = new WP_Query( $args );
?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<main class="section section--main">
<div class="container">

    <?php the_content(); ?>

</div>
</main>
 <?php endwhile; wp_reset_postdata(); ?>


<?php get_footer(); ?>