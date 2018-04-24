<?php get_template_part( 'templates/section', 'form' ); ?>

<footer class="section section--footer footer-main">
<div class="container">

    <div class="clearfix">

    <div class="footer-main__logo">
    <h3 class="highlighted">
        <span><?php bloginfo( 'name' ); ?></span>
    </h3>
    </div>

    <div class="clearfix">
    <div class="footer-main__info">
	<p>This is where we come in. We are masters at translating a vision you have in your head to concrete branding strategies, that will attract business. Rosen+Branding has consistently done this, in many forms, many projects, in many years.</p>

	<h3 class="ex-bold">General Inqueries </h3>
    <p>
    <span>E-mail: info@rosenbranding.com</span>
	<span>Address: Carrer San Vicente 2, El Rafol D’Almunia, Alicante, Spain</span>
	<span>Telephone: 0034.3003.2002.56</span>
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