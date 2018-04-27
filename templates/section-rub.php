<section class="section section--inverted text-center">
<div class="container">


    <?php if( have_rows('intro') ): 
    while( have_rows('intro') ): the_row(); ?>

        <h2 class="heading highlighted highlighted--main highlighted--narrow">
            <span><?php the_sub_field('title'); ?></span>
        </h2>

        <p><?php the_sub_field('paragraph'); ?></p>

    <?php endwhile; endif; ?>


</div>
</section>