<section class="section section--featured-home">
<div class="container--fluid ">
<div class="posts-featured">

    <h2 class="heading highlighted--main highlighted--narrow highlighted--alternate">
    <span>R+B Insights</span>
    </h2>

 	<?php query_posts( array(
		'showposts' => 10,
		'meta_query' => array(
			array(
				'key' => 'feature_on_home',
				'value' => '1',
			)
		)
	)
	);?>
	<ul class="posts-featured__list">
	<?php if (have_posts()) : 	
		while (have_posts()) : the_post(); ?>
	         
        <li class="posts-featured__item triangle-right">
        <a href="<?php the_permalink(); ?>" class="posts-featured__link highlighted highlighted--inline">
        	<span class="uppercase bold"><?php the_title(); ?></span>
        </a>
    	</li>
    
    <?php endwhile; endif; ?>
    </ul>


  
</div>
</div>
</section>