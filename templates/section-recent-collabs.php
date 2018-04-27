<section class="section section--collabs-home section--inverted text-center">
<div class="container--fluid">

    <h2 class="heading highlighted--main highlighted--narrow"><span>Recent Collabs</span></h2>

    <?php
        $args = array( 
          'post_type' => 'work'
        );

        $loop = new WP_Query( $args );
    ?>

    <div class="collabs-menu">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="collabs-menu__item">
        <a  href="<?php the_permalink(); ?>">
            <img class="collabs-menu__img svg" src="<?php the_field( 'thumbnail' ); ?>" />            
            <button class="collabs-menu__link btn btn--contact">Case</button>
        </a>
        </div>        
    
    <?php endwhile; 
            wp_reset_postdata(); ?>
    </div>

</div>
</section>
