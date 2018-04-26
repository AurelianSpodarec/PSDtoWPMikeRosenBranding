<?php get_header(); ?>


<section class="section section--special">
<div class="container container--fluid">

<div data-carousel="blah" class="Carousel">
    <div class="Carousel-Slide clearfix slider-statements__list">
        <div class="Carousel-Slide-item">
        <div class="slider-statements__item">
		<h2 class="standar-underline ex-bold">
			<span>Let's tell your story in a compleing way</span>
		</h2>
		</div>
        </div>
        <div class="Carousel-Slide-item">
        <div class="slider-statements__item">
		<h2 class="standar-underline ex-bold">
			<span>Let's tell your story in a compleing way</span>
		</h2>
		</div>
        </div>
        <div class="Carousel-Slide-item">
        <div class="slider-statements__item">
		<h2 class="standar-underline ex-bold">
			<span>Let's tell your story in a compleing way</span>
		</h2>
		</div>
        </div>
    </div>
    <div class="Carousel-Controller">
        <div class="Carousel-Controller-Nav">
            <div class="Carousel-Controller-Nav-left">
                <div class="Carousel-Controller-Btn-left"></div>
            </div>
            <div class="Carousel-Controller-Nav-right">
                <div class="Carousel-Controller-Btn-right"></div>
            </div>
        </div>
    </div>
</div>

	<!-- <ul class="slider-statements__list">
		<li class="slider-statements__item">
		<h2 class="standar-underline ex-bold">
			<span>Let's tell your story in a compleing way</span>
		</h2>
		</li>
	</ul> -->


</div>
</section>

<?php get_template_part( 'templates/section', 'rub' ); ?>

<?php get_template_part( 'templates/section', 'featured-home' ); ?>

<?php get_template_part( 'templates/section', 'recent-collabs' ); ?>


<?php get_footer(); ?>