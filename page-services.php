<?php get_header(); ?>

<?php get_template_part( 'templates/section', 'services-menu' ); ?>


<section class="section">
<div class="container">


	
	<?php 
 

		$args =   array(
			'post_type' => 'services',
			'meta_query' => array(
				array(
					'key' => 'featured_on_services_page',
					'value' => '1',
				)
			 )
		);
 		$loop = new WP_Query( $args );
	?>

    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
	    <h4 class="uppercase ex-bold" style="margin-bottom: 1.2rem;"><?php the_title(); ?></h4>
    	<?php the_content(); ?>
    
    <?php endwhile; wp_reset_postdata(); ?>


</div>
</section>


<?php get_footer(); ?>