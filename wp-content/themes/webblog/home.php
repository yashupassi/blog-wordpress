<?php
/**
 * Template Name: Index Page
 * @package Webblog
 * Version: 1.0.4
 */


get_header(); ?>
 
<?php echo'
<div class="container container-sm">
<div class="title ClanOT-Book">
            Dockabl Insights
         </div>
<div class="knowledge-txt ClanOT-Book">
            <p>Because Knowledge is meant for sharing.</p>
         </div>
         '?>



<?php 
// the query
$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
 
<?php if ( $wpb_all_query->have_posts() ) : ?>
<?php 
 $count = 1; 

 

?>
 


  <!-- the loop -->
    <?php
    
     while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
    	<?php 
      
      if($count==1){


    		$count++;
    		$post = get_post( get_the_ID() );

    		// var_dump($post);
              
    		echo '
        <div class="boxed">
            <div class="boxed-left-side"> 
               <a href="?p='. $post->ID .'"><div class="latest-insight ClanOT-News"> <p>Latest Insight</p> </div><img src='.get_the_post_thumbnail_url($post).'>
               </a>
               
            </div>
            <div class="boxed-right-side ClanOT-Medium"><a href="?p='. $post->ID .'">'
             .  custom_echo( $post->post_title , 100) . '</a>'.
               '<p class="ClanOT-Book">'
               .  custom_echo( $post->post_content , 600) . '<a href="?p='. $post->ID .'" class="ClanOT-News"> <b>Read more</b></a>'.
               '</p>
               <div class="flex">
                  <span class="boxed-date ClanOT-News">'
                  .date('F j, Y',strtotime($post->post_date)). 
                  '</span>
                  <span class="boxed-comments ClanOT-News">' . $post->comment_count .' Comments'.'</span>
               </div>
            </div>
         </div><div class="clearfix"></div>';
    	} ?>
    <?php endwhile; ?>
    <!-- end of the loop -->





 
 <?php echo ' <div class="top">
    		<div class="row load-more-container">' ?>
        <?php  $count =0;?>
    <!-- the loop -->
    <?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?>
    	<?php  
       
    		$count++;
    		$post = get_post( get_the_ID() ); 
        if($count!=1){
    		// echo ' <div class="column">
      //             <div>
      //                <a href="?p='. $post->ID .'" ><img src='.get_the_post_thumbnail_url($post).' style="width:100%" class="post-img"></a>
      //                <div class="info">
      //                   <h1 class="ClanOT-Medium"><b><a href="?p='. $post->ID .'">'
      //        .  custom_echo( $post->post_title , 50) . '</a>'.
      //                      '</b>
      //                   </h1>
      //                   <p class="ClanOT-Book">'
      //                   . custom_echo( $post->post_content , 200) . '<a href="?p='. $post->ID .'" class="ClanOT-News"> <b>Read more</b></a>'.
      //                   '</p>
      //                </div>
      //                <div class="flex date-cmnt" style="margin-top:-15px">
      //                <span class="left-side ClanOT-News" >'.date('F j, Y',strtotime($post->post_date)).'</span>
      //                   <span class="right-side ClanOT-News">'.$post->comment_count.' Comments'.'</span>
      //                   </div>
                      
      //             </div>
      //          </div> '; 
             }

             if($count>6){
              break;
             }
    	?>
    <?php endwhile; ?>
    <!-- end of the loop -->


<?php echo'<div class="clearfix"></div> '?>
 
 
    <?php wp_reset_postdata(); ?>
 
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?> 

         
<?php echo do_shortcode('[ajax_load_more post_type="post" scroll="false" posts_per_page="3" button_label="Load more articles"]'); ?>

<?php echo'</div> '?>
</div></div>

<?php get_footer();
