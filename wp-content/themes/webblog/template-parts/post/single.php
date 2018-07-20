<?php
/**
 * Template part for displaying posts
 * @package Webblog
 * Version: 1.0.4
 */

?>
<div class="back ClanOT-Book container_header">
        <a href="http://localhost/wordpress">   < Back to all Insights</a>
   </div>
<div>
	<div class="main-img">
        <img src=<?php the_post_thumbnail_url( 'full' );?>>
   </div>
</div>
<div class="box">
	<div>
  		<div class="side-buttons">
    		<ul>
       			
            <a class="fb"  href=<?php echo "https://www.facebook.com/sharer/sharer.php?u=".get_post_permalink();?>>
       				<li style="margin-top: 10px"><i class="fa fa-facebook facebook-li" style="padding-left:14px"></i></li>
            </a>
            <a class="twt" href=<?php echo "https://twitter.com/home?status=".get_post_permalink();?>>
       				<li><i class="fa fa-twitter"style="padding-left:11px"></i></li>
            </a>
            <a class="link" href=<?php echo "https://www.linkedin.com/shareArticle?mini=true&title=&summary=&source=&url=".get_post_permalink();?>>
       				<li><i class="fa fa-linkedin"style="padding-left:11px"></i></li>
            </a>
            <a class="copy" onclick="copyTextFun()">
        			<li><i class="fa fa-link" style="padding-left:11px"></i></li>
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




