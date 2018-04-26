<section class="section section--small section--inverted text-center">
<div class="container container--fluid">

    <?php
        $args = array( 
          'post_type' => 'services'

        );

        $loop = new WP_Query( $args );

        if (is_single()) {
            $saved_id = $post->ID;
        } else {
            $saved_id = false;
        }
 
    ?>

 
    <ul class="services-menu">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


   
                <?php if (is_page()) { ?>
                
                    <?php if (get_field( 'featured_on_services_page' ) == 1 ) { ?>
                        <li class="services-menu__item--active">
                    <?php } else { ?>
                        <li class="services-menu__item">
                    <?php } ?>

                <?php } else if($saved_id === $post->ID) { ?>
                    <li class="services-menu__item--active">
                <?php } else { ?>
                    <li class="services-menu__item">
                <?php } ?>


            <a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
    <?php endwhile; wp_reset_postdata(); ?>
    </ul>

</div>
</section>
