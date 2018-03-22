<?php
/**
 * Created by PhpStorm.
 * User: it
 * Date: 3/22/18
 * Time: 11:27 AM
 */

get_header();
?>

<main class="main-block">
    <section class="portfolio-wrapper">
        <div class="container">
            <div class="row ">
                <div class="col">
                    <div class="title-page-block">
                        <h1 class="title-page-block__title">
                            Portfolio
                        </h1>
                        <ul class="gallery-titles-block">
                            <?php
                                $gallery_post_type = 'portfolio_images';
                                $cats = get_categories($gallery_post_type);
                                foreach ( $cats as $cat) {
                                ?>
                            <li class="gallery-title-item">
                                    <a class="gallery-title-item__link" href="<?php echo get_category_link($cat->term_id) ?>"><?php echo $cat->name;?></a>
                            </li>

                                    <?php
                                }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row border-top ">
                <div class="col  gallery-row">
                    <img src="dist/img/gallery/beauty.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>
                <div class=" col gallery-row">
                    <img src="dist/img/gallery/bridal.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>

                <div class="col  gallery-row">
                    <img src="dist/img/gallery/fashion.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>

                <div class="col  gallery-row">
                    <img src="dist/img/gallery/candid.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>
                <div class="col gallery-row" >
                    <img src="dist/img/gallery/candid2.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>
            </div>
            <div class="row ">
                <div class="col  gallery-row">
                    <img src="dist/img/gallery/beauty.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>
                <div class="col gallery-row">
                    <img src="dist/img/gallery/bridal.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>

                <div class="col  gallery-row">
                    <img src="dist/img/gallery/fashion.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>

                <div class="col  gallery-row">
                    <img src="dist/img/gallery/candid.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>
                <div class="col  gallery-row">
                    <img src="dist/img/gallery/candid2.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>
            </div>
            <div class="row border-bottom ">
                <div class="col gallery-row">
                    <img src="dist/img/gallery/beauty.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>
                <div class="col gallery-row">
                    <img src="dist/img/gallery/bridal.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>

                <div class="col gallery-row">
                    <img src="dist/img/gallery/fashion.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>

                <div class="col gallery-row">
                    <img src="dist/img/gallery/candid.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>
                <div class="col gallery-row">
                    <img src="dist/img/gallery/candid2.jpg" class="logo-block__img img-fluid" alt="Book your apointment">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 text-block-gallery">
                    <h1 class="text-block-gallery__title">
                        Professional makeup services throughout New England
                    </h1>
                    <p class="text-block-gallery__paragrah">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vulputate egestas lorem vel
                        finibus. Curabitur in dolor sed arcu cursus laoreet. Maecenas a fermentum dui, non euismod urna.
                        Donec dictum sodales odio, et finibus arcu. Sed pulvinar bibendum lectus. Aliquam sapien ligula,
                        rutrum sed dapibus sit amet, tempus id turpis. Vivamus sed elit quis massa rutrum accumsan eget
                        \et mi. Suspendisse convallis tristique iaculis. In mattis diam elit, at maximus ipsum rutrum at.
                        Aenean vestibulum ultrices massa, id hendrerit diam facilisis ut.
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_sidebar();
get_footer();
?>



