<?php
/*
Template Name: General Comments
*/



get_header(); ?>



<!-- all-comments.php -->

<div id="wrapper">



<div id="main_wrapper" class="clearfix">



<div id="page_wrapper">



<div id="content">



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="post general_comments">

<h2 class="post_title"><?php _e( 'General comments on the book', 'commentpress-core' ); ?></h2>
<p>To evaluate the current work as a whole, readers may wish to respond to these review questions. (To comment on a specific essay, please go to that page.)
<ol>
<li>What is the purpose of the manuscript, and how well does it accomplish this goal in its current form?</li>
<li>Who do you envision as the intended audience of the manuscript, and does it address their interests and needs?</li>
<li>Is the manuscript based on sound scholarship?</li>
<li>Is the overall presentation clear? Is the text well written? Does it make effective use of its digital format?</li>
<li>Could the organization be improved? If so, how?</li>
<li>Overall, what are the strongest -- and weakest -- features of the work in its current form?</li>
</ol></p>

<?php comments_template(); ?>

</div><!-- /post -->

<?php endwhile; endif; ?>



</div><!-- /content -->



</div><!-- /page_wrapper -->



</div><!-- /main_wrapper -->



</div><!-- /wrapper -->



<?php get_sidebar(); ?>


<?php get_footer(); ?>