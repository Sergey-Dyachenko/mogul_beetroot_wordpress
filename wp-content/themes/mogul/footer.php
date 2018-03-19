<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2018
 * Time: 22:36
 */
?>
<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 footer-side-block" >
                <?php echo do_shortcode('[contact-form-7 id="36" title="Untitled"]');?>
            </div>
            <div class="col-md-5 footer-center-block">
                <div class="footer-center-block__address">

                    <?php
                    if (is_active_sidebar('footer_info_widget_area')):  ?>
                        <?php dynamic_sidebar('footer_info_widget_area') ?>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-md-4 footer-side-block">
                <div class="footer-side-block__social">
                    <?php
                    if (is_active_sidebar('footer_social_widget_area')):  ?>
                        <?php dynamic_sidebar('footer_social_widget_area') ?>
                    <?php endif; ?>
<!--                    <h3>-->
<!--                        Stay connected with us!-->
<!--                    </h3>-->
<!--                    <p>Stay up to date with blah blah for</p>-->
<!--                    <p>   blah blah and yeah blah</p>-->
<!--                    <div class='icon-wrapper'>-->
<!--                        <i class="fa fa-lg fa-facebook"></i>-->
<!--                    </div>-->
<!--                    <div class='icon-wrapper'>-->
<!--                        <i class="fa fa-lg fa-twitter"></i>-->
<!--                    </div>-->
<!--                    <div class='icon-wrapper'>-->
<!--                        <i class="fa fa-lg fa-instagram"></i>-->
<!--                    </div>-->
<!--                    <div class='icon-wrapper'>-->
<!--                        <i class="fa fa-lg fa-pinterest-p"></i>-->
<!--                    </div>-->
<!--                    <div class='icon-wrapper'>-->
<!--                        <i class="fa fa-lg fa-linkedin"></i>-->
<!--                    </div>-->
<!--                    <div class='icon-wrapper'>-->
<!--                        <i class="fa fa-lg fa-envelope"></i>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

    </div>

</footer>
</div>
</body>
</html>