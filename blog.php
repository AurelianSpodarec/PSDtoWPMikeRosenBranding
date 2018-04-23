<?php get_header(); ?>

<div>
	<h1>Blog</h1>
</div>

<?php

// check if the flexible content field has rows of data
if( have_rows('template_blocks') ):

     // loop through the rows of data
    while ( have_rows('template_blocks') ) : the_row();

        if( get_row_layout() == 'contact_section' ):
?>
        	<h2><?php the_sub_field('test_field');?></h2>

<?php
        endif;

    endwhile;

else :

    echo "<h2>no layouts found</h2>";

endif;

?>

<?php 

get_template_part('template_blocks', get_row_layout());

?>

<?php get_footer(); ?>