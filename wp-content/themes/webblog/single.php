<?php
/**
 * The template for displaying all single posts
 * @package Webblog
 * Version: 1.0.4
 */

get_header(); ?>


    
                <?php
                /* Start the Loop */
                while ( have_posts() ) : the_post();
    
                    get_template_part( 'template-parts/post/single');
						
					the_post_navigation( array(
                        'prev_text' => '<span class="previous-label">' . __( 'Previous', 'webblog' ) . '</span>
							<span class="nav-title-icon"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></span>
							<span class="nav-title">%title</span>',
                        'next_text' => '<span class="next-label">' . __( 'Next', 'webblog' ) . '</span>
							<span class="nav-title">%title</span>
							<span class="nav-title-icon"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>',
                    ) );
    
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
    
    
                endwhile; // End of the loop.
                ?>





<?php if ( function_exists( "get_yuzo_related_posts" ) ) { get_yuzo_related_posts(); } ?>

           
<?php get_footer();
