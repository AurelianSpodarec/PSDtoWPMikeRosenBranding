<section class="section section--special">
<div data-carousel="home-carousel" class="home-slider">
<div class="container--fluid">

    <ul class="home-slider__slide clearfix slider-statements__list">
    <?php if( have_rows('slider') ):
    while ( have_rows('slider') ) : the_row(); ?>

        <li class="home-slider__slide-item">
        <div class="home-slider__slide-title">
        <h2 class="highlighted--inline-negative-large  ex-bold ">
            <span><?php the_sub_field('title'); ?></span>
        </h2>
        </div>
        </li>

    <?php endwhile; endif; ?>         
    </ul>

    <div class="home-slider-Controller">
    <div class="home-slider-Controller-Nav">
        <div class="home-slider-Controller-Nav-left">
            <div class="home-slider-Controller-Btn-left"></div>
        </div>
        <div class="home-slider-Controller-Nav-right">
            <div class="home-slider-Controller-Btn-right"></div>
        </div>
    </div>
    </div>
    
</div>
</div>
</section>
    <!-- <ul class="slider-statements__list">
        <li class="slider-statements__item">
        <h2 class="standar-underline ex-bold">
            <span>Let's tell your story in a compleing way</span>
        </h2>
        </li>
    </ul> -->


