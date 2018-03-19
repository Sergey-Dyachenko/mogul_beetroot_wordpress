<?php
/**
 * The template for displaying front page
 * */

 get_header(); ?>

<main class="main-block">-
 <article class="container main-article">
     <?php
     while ( have_posts() ) : the_post();

         get_template_part( 'template-parts/content', 'page' );

         // If comments are open or we have at least one comment, load up the comment template.
         if ( comments_open() || get_comments_number() ) :
             comments_template();
         endif;

     endwhile; // End of the loop.
     ?>
 </article>
</main>

<?php get_footer();?>
