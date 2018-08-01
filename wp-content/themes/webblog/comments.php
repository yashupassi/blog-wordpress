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
        	<img src="<?php echo get_template_directory_uri(); ?>/assets/images/cmnt_icon.png" class="chat-img">
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
		<?php $cpage = get_query_var('cpage') ? get_query_var('cpage') : 1;
 
if( $cpage > 1 ) {
	echo '<div class="misha_comment_loadmore ClanOT-Book"> SHOW MORE COMMENTS</div>
	<script>
	var ajaxurl = \'' . site_url('wp-admin/admin-ajax.php') . '\',parent_post_id = ' . get_the_ID() . ',cpage = ' . $cpage . '</script>';
}?>
		
	</div><!-- #comments -->
