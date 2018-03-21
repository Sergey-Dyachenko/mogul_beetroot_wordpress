<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name = "viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://use.fontawesome.com/29af5d7ea7.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
<div id="page" class="site">
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-md fixed-top site-branding">
<!--                <div class="logo-block"  href="#"><img src="dist/img/logo.png" class="logo-block__img" alt="Book your apointment"></div>-->
                <div class="logo-block"  href="#">
                    <?php
                    if (function_exists('the_custom_logo')){
                        the_custom_logo();

                    }?>
                </div>
                <button class="navbar-toggler collapsed " type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                </button>
                <?php
                wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'depth'         =>  2,
                        'container'     =>  'div',
                        'container_class'=> 'navbar-collapse collapse',
                        'container_id'   => 'navbarsExampleDefault',
                        'menu_class'     => 'navbar-nav mr-auto nav-block',
                        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'        =>  new WP_Bootstrap_Navwalker()
                        ));

                ?>

            </nav>
        </div>
    </div>

<div class="spacer-block"></div>
<div class="container-fluid custom-header-box">
<!--  <img src="--><?php //echo get_template_directory_uri() ?><!--/assets/img/header-main-bg.jpg" alt="" class="img-fluid custom-header-box__img">-->
    <?php if (get_header_image()) :?>
        <img src="<?php header_image(); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="img-fluid custom-header-box__img">
    <?php endif; ?>
</div>
</header>

