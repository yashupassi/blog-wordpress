<?php
/**
 * Template part for displaying posts
 * @package Webblog
 * Version: 1.0.4
 */

?>



<div class="container2">
    <div class="back ClanOT-Book container_header">
        <a href=<?php echo get_site_url()?> ><img src="<?php echo get_template_directory_uri(); ?>/assets/images/back_blog_btn.png"> Back to all Insights</a>
    </div>
<div>
	<div class="main-img">
     
        <img src=<?php the_post_thumbnail_url( 'full' );?>>
   </div>
</div>





<div class="box pos-rel">
<?php 
  if( wpse110867_is_latest_post(  get_the_ID()    ) ){  
    echo '<div class="latest-insight ClanOT-News"> <p>Latest Insight</p> </div>';
  } 
?>
  


	<div>
  		<div class="side-buttons">
    		<ul>
       			
            <a class="fb"  href=<?php echo "//www.facebook.com/sharer/sharer.php?u=".get_permalink();?>  target="_blank">
       				<li style="margin-top: 10px"><i class="fa fa-facebook facebook-li" style="padding-left:14px"></i></li>
            </a>
            <a class="twt" href=<?php echo "//twitter.com/home?status=".get_permalink();?>  target="_blank">
       				<li><i class="fa fa-twitter"style="padding-left:11px"></i></li>
            </a>
            <a class="link" href=<?php echo "//www.linkedin.com/shareArticle?mini=true&title=&summary=&source=&url=".get_permalink();?> target="_blank">
       				<li><i class="fa fa-linkedin"style="padding-left:11px"></i></li>
            </a>
            <a class="copy" onclick="copyTextFun()">
        			<li><img src="<?php echo get_template_directory_uri(); ?>/assets/images/copy_icon.png"></li>
       			</a>
    		</ul>
   		</div>
	</div>
	<div class="post-center">
		<div class="heading ClanOT-Medium">
                 <?php the_title(); ?>
    	</div>
    	<div class="date ClanOT-News">
                 Published on <?php $post_time = webblog_time_link(); echo esc_html( $post_time ); ?>
    	</div>
    	<div class="para ClanOT-Book">
				<?php the_content(); ?>
    	</div>
	</div>
</div>




