<?php get_header(); ?>

<?php get_template_part( 'templates/section', 'work-menu' ); ?>


<section class="section section--text">
<div class="container">


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
	         
    	<?php the_content(); ?>
    
    <?php endwhile; wp_reset_postdata(); ?>

</div>
</section>


<?php get_footer(); ?>