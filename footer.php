<footer class="section section--footer footer-main">
<div class="container">

    <div class="clearfix">
    <h3 class="ex-bold"><span><?php bloginfo( 'name' ); ?></span></h3>

    <div class="footer-main__info">
	<p>This is where we come in. We are masters at translating a vision you have in your head to concrete branding strategies, that will attract business. Rosen+Branding has consistently done this, in many forms, many projects, in many years.</p>

	<h3 class="ex-bold">General Inqueries: </h3>
	<p>Address: Carrer San Vicente 2, El Rafol D’Almunia, Alicante, Spain</p>
	<p>Telephone: 0034.3003.2002.56</p>
    </div>

    <div class="footer-main__menu">
    <?php
        $args = [
            'theme_location' => 'footer-menu',
            'container'      => 'ul',
            'menu_class'     => 'footer-main__nav',
            'container_class' => 'custom-menu-class' ,
        ];
        wp_nav_menu( $args ); 
    ?>  
    </div>
    </div>

    <div class="footer-main__bottom clearfix triangle-top">

    <a class="footer-main__bottom-link" href=""><span class="uppercase bold">Back to the top</span></a>
    </div>
    
</div>
</footer>


	<?php wp_footer(); ?>

</body>
</html>	