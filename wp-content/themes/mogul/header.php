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

<!--                <div class="navbar-collapse collapse" id="navbarsExampleDefault" style="">-->
<!--                    <ul class="navbar-nav mr-auto nav-block">-->
<!--                        <li class="nav-item active nav-block__nav-item">-->
<!--                            <a class="nav-link disabled nav-block__nav-link" href="#">Home <span class="sr-only">(current)</span></a>-->
<!--                        </li>-->
<!--                        <li class="nav-item nav nav-block__nav-item">-->
<!--                            <a class="nav-link disabled nav-block__nav-link" href="#">Reviews</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item nav-block__nav-item">-->
<!--                            <a class="nav-link disabled nav-block__nav-link" href="#">Services</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item nav-block__nav-item">-->
<!--                            <a class="nav-link disabled nav-block__nav-link" href="#">Portfolio</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item nav-block__nav-item">-->
<!--                            <a class="nav-link disabled nav-block__nav-link" href="#">Blog</a>-->
<!--                        </li>-->
<!--                        <li class="nav-item nav-block__nav-item">-->
<!--                            <a class="nav-link disabled nav-block__nav-link" href="#">Contact</a>-->
<!--                        </li>-->
<!---->
<!--                    </ul>-->
<!---->
<!--                </div>-->
            </nav>
        </div>
    </div>

</header>
<div class="spacer-block"></div>
<section class="background-block">
</section>
<!--<main class="main-block">-->
<!--    <article class="container main-article">-->
<!--        <h1>-->
<!--            Professional makeup services throughout New England-->
<!--        </h1>-->
<!---->
<!--        <section class="main-section">-->
<!--            <div class="row justify-content-center">-->
<!--                <div class="main-text-first">-->
<!--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt-->
<!--                    mollit anim Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit ani-->
<!--                    Excepteur sint occaecat cupidatat non proident, sunt-->
<!--                </div>-->
<!--                <div class="col-10">-->
<!--                    <div class="text-center img-block">-->
<!--                        <img src="dist/img/girl.jpg" class="img-fluid img-block__img" >-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="main-text-first col-10">-->
<!--                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt-->
<!--                    mollit anim Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit ani-->
<!--                    Excepteur sint occaecat cupidatat non proident, sunt-->
<!--                </div>-->
<!--                <div class="col-10">-->
<!--                    <div class="text-center img-block">-->
<!--                        <img src="dist/img/allison-photo.jpg" class="img-block__img img-fluid" >-->
<!--                    </div>-->
<!--                    <div class="contact-block">-->
<!--                        <div class="name-adress-block text-center">-->
<!--                            <p class="name">-->
<!--                                Allison Humeniuk, Makeup Artist-->
<!--                            </p>-->
<!--                            <p class="adress">-->
<!--                                Portland, Maine-->
<!--                            </p>-->
<!--                        </div>-->
<!--                        <div class="email-ip-block text-center">-->
<!--                            <p class="email">-->
<!--                                allison@mogulmakeup.com-->
<!--                            </p>-->
<!--                            <p class="ip">-->
<!--                                207.370.4427-->
<!--                            </p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </section>-->
<!---->
<!---->
<!--    </article>-->
<!--</main>-->
