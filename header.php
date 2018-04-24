<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta, Title, Styles, Scripts
    ================================================== -->
    <meta name="charset" content="UTF-8">
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width" />
    <title><?php  wp_title( '-', true, 'right' ) . bloginfo( 'name' ); ?></title>
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
    
    <!-- FONT AWESOME | REPLACE WITH NPM IF YOU WANT-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php wp_head(); ?> 

</head>
<body <?php body_class(); ?>>

    <header class="site-header">
    <div class="site-header__outer">
    <div class="site-header__inner">


        <div class="site-header__nav-head">
        <div class="site-header__nav-outer">
        <div class="site-header__nav-head__inner">

            <a class="site-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <span class="site-header__logo-text"><?php bloginfo( 'name' ); ?></span>
            </a>

            <button class="site-header__hamburger">
                <div class="site-header__hamburger-bars">
                    <span class="site-header__hamburger--bar"></span>
                    <span class="site-header__hamburger--bar"></span>
                    <span class="site-header__hamburger--bar"></span>
                </div>
            </button>

        </div>
        </div>
        </div>


        <div class="site-nav">
        <nav class="site-nav__main">
        <?php
            $args = [
                'theme_location' => 'main-menu',
                'container'      => 'ul',
                'menu_class'     => 'site-nav__list',
                'container_class' => 'custom-menu-class' ,
                'walker'        => new Primary_Walker_Nav_Menu()
            ];
            wp_nav_menu( $args ); 
        ?>  
        </nav>
        </div>


    </div>
    </div>
    </header>