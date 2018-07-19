<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package Webblog
 * Version: 1.0.4
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	
	return;
}
?>

<div id="comments" class="comments-area">
</div>
    <div class="comment-sec">
      

      <div>
        <img src="http://localhost/wordpress/wp-content/uploads/2018/07/chat.png" class="chat-img">
          <div class="cmnt ClanOT-News">
			<?php
				$comment_count = get_comments_number();
				if ( 1 === $comment_count ) {
					printf(
						/* translators: 1: title. */
						esc_html__( ' &ldquo;%1$s&rdquo;', 'webblog' ),
						'<span>' . Comments . '</span>'
					);
				} else {
					echo $comment_count . " Comments";
					
				}
			?>
          </div>
      </div>

	
	<?php
	

	    comment_form(array('title_reply'=>''));
	?>
    <ol class="comment-list">
	<?php
				wp_list_comments( array(
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => __( 'Reply', 'webblog' ),
				) );
			?>
	</ol>

	

  <!--  <div class="paginate-comments ClanOT-Book">

   	

   	<?php paginate_comments_links(array('prev_text' => '&laquo; PREV', 'next_text' => 'NEXT &raquo;'));

    ?>
   </div> -->

  <?php 
  // $comment_count = get_comments_number();
 
  	if( $comment_count > 5){


 		echo '<div class="paginate-comments ClanOT-Book">';
 			paginate_comments_links(array('prev_text' => '&laquo; PREV', 'next_text' => 'NEXT &raquo;'));

		   echo' </div>';


  	}

  ?>


     
</div><!-- #comments -->
