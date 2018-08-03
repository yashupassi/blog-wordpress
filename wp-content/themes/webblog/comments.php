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
						$comment_count = comments_number('0 Comments', '1 Comment', '% Comments');
						if ( 1 === $comment_count ) {
							printf(
								/* translators: 1: title. */
								esc_html__( ' &ldquo;%1$s&rdquo;', 'webblog' ),
								'<span></span>'
							);
						} else {
							echo $comment_count . " ";
							
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
<script type="text/javascript">
  jQuery(function(jQuery){
 
  // load more button click event
  jQuery('.misha_comment_loadmore').click( function(){
    var button = jQuery(this);
 
    // decrease the current comment page value
    cpage--;
 
    jQuery.ajax({
      url : ajaxurl, // AJAX handler, declared before
      data : {
        'action': 'cloadmore', // wp_ajax_cloadmore
        'post_id': parent_post_id, // the current post
        'cpage' : cpage, // current comment page
      },
      type : 'POST',
      beforeSend : function ( xhr ) {
        button.text('Loading...'); // preloader here
      },
      success : function( data ){
        if( data ) {
          jQuery('ol.comment-list').append( data );
          button.text('SHOW MORE COMMENTS'); 
           // if the last page, remove the button
          if ( cpage == 1 )
            button.remove();
        } else {
          button.remove();
        }
      }
    });
    return false;
  });
 
});
</script>
<script type="text/javascript">
  jQuery(document).on('scroll', function() {
  var button = jQuery('.misha_comment_loadmore');
  if( (jQuery(this).scrollTop() + jQuery(window).height() ) >= button.offset().top){
 
    // check if the ajax request isn't in process right now
    if( button.text() == ' SHOW MORE COMMENTS' ) {
      button.trigger('click'); // click the button
    }
 
  }
});</script>
		
	</div><!-- #comments -->
