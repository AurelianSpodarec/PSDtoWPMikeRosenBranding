<section class="section section--small section--inverted text-center">
<div class="container container--fluid">

    <?php
        $args = array( 
          'post_type' => 'work'
        );

        $loop = new WP_Query( $args );


        if (is_single()) {
            $saved_id = $post->ID;
        } else {
            $saved_id = false;
        }

    ?>

    <div class="work-menu">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

       


                    <?php if (is_page()) { ?>
                
                        <?php if (get_field( 'feature_on_work_page' ) == 1 ) { ?>
                            <div class="work-menu__item--active">
                        <?php } else { ?>
                            <div class="work-menu__item">
                        <?php } ?>

                    <?php } else if($saved_id === $post->ID) { ?>

                            <div class="work-menu__item--active">
                            <?php } else { ?>
                            <div class="work-menu__item">

                    <?php } ?>


        <a  href="<?php the_permalink(); ?>">
            <img class="work-menu__img svg" src="<?php the_field( 'thumbnail' ); ?>" />            
        </a>
        </div>        
    
    <?php endwhile; 
            wp_reset_postdata(); ?>
    </div>

</div>
</section>
