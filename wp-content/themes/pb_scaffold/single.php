<?php
get_header() ;?>
<main>
  <?php 
    get_template_part('nav');
    while ( have_posts() ) : the_post(); 
    get_template_part('post/content',get_post_format());
    endwhile; // End the loop. 

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
    the_post_navigation(
      array(
        'prev_text' => '上一篇',
        'next_text' => '下一篇',
      )
    );
  ?>
</main>

<?php
get_footer();