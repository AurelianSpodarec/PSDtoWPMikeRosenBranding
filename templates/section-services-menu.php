<section class="section section--inverted text-center">
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

            <?php
            if($saved_id === $post->ID) { ?>
                    <li class="services-menu__item--active">
                <?php } else { ?>
                    <li class="services-menu__item">
               <?php }
            ?>
            <a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
    <?php endwhile; wp_reset_postdata(); ?>
    </ul>

</div>
</section>
