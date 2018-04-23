<section class="section section--inverted text-center">
<div class="container container--fluid">

    <h2 class="heading highlighted highlighted--narrow"><span>Recent Collabs</span></h2>


    <?php
        $args = array( 
          'post_type' => 'work'
        );

        $loop = new WP_Query( $args );
    ?>

    <div class="work-menu">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="work-menu__item">
        <a  href="<?php the_permalink(); ?>">
            <img class="work-menu__img svg" src="<?php the_field( 'thumbnail' ); ?>" />            
            <button class="work-menu__link btn btn--contact">Case</button>
        </a>
        </div>        
    
    <?php endwhile; 
            wp_reset_postdata(); ?>
    </div>

</div>
</section>
