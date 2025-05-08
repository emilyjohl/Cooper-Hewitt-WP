<?php get_header(); ?>

<main id="main-content">
<div class="content-area">
  <div class="background-image-container">
    <div class="title-wrapper">
      <h1 id="overlay-text">Search our Database</h1>
    </div>
    <img id="background-image" src="https://www.cooperhewitt.org/wp-content/uploads/2014/05/Library_2001-1-e1456859803880.jpg" alt="">
  </div>
  <div>
  <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content(); // ← THIS is what processes shortcodes in post/page content
        endwhile;
    endif;
  ?>


</main>
<?php get_footer(); ?>
