<?php get_template_part( 'templates/section', 'form' ); ?>
    
<footer class="section section--footer footer-main">
<div class="container">

    <div class="clearfix">

    <div class="footer-main__logo">
    <h3 class="highlighted--main highlighted--narrow highlighted--left">
        <span><?php bloginfo( 'name' ); ?></span>
    </h3>
    </div>

    <div class="clearfix">
    <div class="footer-main__info">
	<?php the_field('about', 'user_1'); ?>
	<h3 class="ex-bold">General Inqueries </h3>
    <p>
    <?php
        if( have_rows( 'footer_contact_details', 'user_1' ) ):
            while ( have_rows('footer_contact_details', 'user_1' ) ) : the_row();
        ?>           
        <span>E-mail: <a href="mailto: <?php the_sub_field('e-mail') ?>"><?php the_sub_field('e-mail') ?></a></span>
    	<span>Address: <?php the_sub_field('address') ?></span>
    	<span>Telephone: <a href="tel: <?php the_sub_field('telephone') ?>"><?php the_sub_field('telephone') ?></a></span>
    <?php endwhile; endif; ?>
    </p>
    </div>

    <?php
        $args = [
            'theme_location' => 'footer-menu',
            'container'      => 'ul',
            'menu_class'     => 'footer-main__nav',
            'container_class' => 'custom-menu-class' ,
            'walker' => new Nav_Footer_Walker()
        ];
        wp_nav_menu( $args ); 
    ?>  

    </div>
    </div>

    <div class="footer-main__bottom clearfix arrow-up triangle-top">

    <button class="footer-main__bottom-link arrow-up"><span class="uppercase bold arrow-up">Back to the top</span></button>
    </div>
    
</div>
</footer>

	<?php wp_footer(); ?>

</body>
</html>	