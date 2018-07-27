<?php
/**
 * The template for displaying the footer
 * @package Webblog
 * Version: 1.0.4
 */

?>

			</div>
        </div><!-- #content -->




        <div class="newmodal refer-modal visible" style="display: none;" id="refer-model" onclick="jQuery(this).hide()">
            <div class="modal-body">
              <a href="javascript:void(0)" class="close-modal" onclick="jQuery('#refer-model').hide()">
                <?php include 'assets/images/new-modal.svg';?>
              </a>

              <div class="modal-inner grid" onclick="event.stopPropagation();" >
                <div class="">
                  <?php include 'assets/images/inner-left.svg';?>
                </div>
                  <div>
                    <form class="myform" action="email/mail.php" novalidate="">
                    <div class="refer-ori">
                        <p class="form-lead">Refer Dockabl
                            <span style="margin-right: -5px;">Someone who might benefit from using this awesome product!</span> 
                        </p>
                        <div class="form-element">
                            <input type="email" class="input parsley-error" id="refer-email" name="refer-email" required="" data-parsley-id="17">
                            <label for="refer-email">
                               Email Address
                            </label>
                        </div>
                           <!--                        <p class="validate-msg " ></p>-->
                        <input type="hidden" name="type" value="refer">
                        <input type="submit" class="btn btn-submit" value="Send Invite">
                    </div>
                  </div>
              </div>
            </div>
        </div>


                




<div class="row1">
   <div class="column1">
      <div class="main-row">
         <div class="main-co1" style="float: left;">
            <a href="//www.dockabl.com/"> <img src="/wp-content/uploads/2018/07/Capturedockabl.png" class="dock-img"></a>

 <div class="row11">
                       <div class="column111">
     <a href="//www.facebook.com/Dockabl1/" target="_blank" ><li style="padding-left: 11px;font-size: 29px;"><i class="fa fa-facebook"></i></li></a>          
          </div>
                       <div class="column112">
      <a href="//www.linkedin.com/company/dockabl/" target="_blank"><li><i class="fa fa-linkedin"></i></li> </a>            
           </div>
                       <div class="column113">
         <a href="//twitter.com/Dockabl1" target="_blank"><li><i class="fa fa-twitter"></i></li></a>
      
             
           </div>
        </div>
        
      </div>
      

      <div class="main-co2" >
        <div>
        <div style="color: white">
         <a href="//www.dockabl.com/features#slide_1" class="objectives ClanOT-Bold " target="_blank"> Objectives</a>
        </div><div style="color: white" style="margin-top: 10px">
          <a href="//www.dockabl.com/features#slide_2" class="ClanOT-Bold objectives" target="_blank"> Reviews</a>
        </div>
        <div style="color: white">
         
         <a href="//www.dockabl.com/features#slide_3" class="ClanOT-Bold objectives" target="_blank">   Recognition</a>
        </div>
      </div>
        
      </div>
<div class="main-co3">
        <div>
          <div style="color: white">
          <a href="//www.dockabl.com/team" class="request-demo ClanOT-Book" target="_blank">Team</a>
        </div><div style="color: white">
          <a href="//www.dockabl.com/contact" class="request-demo ClanOT-Book"target="_blank">Contact us</a>
        </div>
        
        <div style="color: white">
          <a href="javascript:void(0)" onclick="jQuery('#refer-model').show();" class="request-demo ClanOT-Book">Refer us</a>
        </div>
      </div>
      </div>




 </div>

  </div>
  <div class="column2" style="float: right;">
   <div class="column2-style">
    <div class="col2-text" >
      <p>Stay updated with the latest at Dockabl.</p>
    <form class="myform">
      
    
    <input type="email" placeholder="johnappleseed@gmail.com" class="txt" required>
<a href="">
      <button class="submit-btn">Submit</button></a>
    </form>
    </div>
</div>
</div>
</div>

		<!-- #colophon -->
</div><!-- #page -->
<?php $back_to_top_type = webblog_get_option( 'back_to_top_type' );
if($back_to_top_type == 'enable'): ?>
<a href="#page" class="back-to-top" id="back-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<?php endif; ?>
<?php wp_footer(); ?>






<div class="outer-popup" id="mypopup">
        <div class="popup" >
          <div class="close-btn" id="closeBtn">&times;
          </div>
          <div class="popup-left">
            <div class="Login-to-Comment">
                Login to Comment
            </div>
            <div class="Lorem-ipsum-dolor-si">
                Lorem ipsum dolor sit amet consectetur adipiscing elit sed. 
            </div>
            <div class="login_form">
        
          <?php echo do_shortcode('[login_widget]'); ?>
        
      </div>
      <div class ="display_none">
        
          <?php echo do_shortcode(' [rp_register_widget] '); ?>
        
      </div>
      <span class="line"></span>
    </div>
    <div class="popup-right">
      <div class="Lorem-ipsum-dolor-si-Copy">
          Lorem ipsum dolor sit amet consectetur adipiscing elit sed. 
      </div>
      <div class="social-btn">
        <?php echo do_shortcode('[apsl-login-lite]'); ?>   
      </div>
    </div>
  </div>
</div>






<!-- #script -->

<script>
  var modal = document.getElementById('mypopup');
var btn = document.getElementById("myBtn");
var closeBtn = document.getElementById("closeBtn");
btn.onclick = function() {
    modal.style.display = "flex";
}
closeBtn.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";

    }
}
</script>


 

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<script type="text/javascript">
  jQuery('.post-carousel').owlCarousel({
    loop:false,
    margin:53,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        800:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
</script>
<script type="text/javascript">
 /* $(document).on('click','.load-more-article', function(){
   
   var page = $(this).data('page');
   var ajaxurl = $(this).data('url');

   $.ajax({

    url : ajaxurl,
    data :{

        page : page,
        action : 'load-more-article'
   },

   error : function( response ){
    console.log(response);
   },
   success : function( response ){
     $('.load-more-container').append( response );
   }

   });
  });
*/
</script>
<script type="text/javascript">
  jQuery('#myform').submit(function(e){
    e.preventDefault();

    // do ajax now
     jQuery.ajax({
                    url: f.attr('action'),
                    data: f.serialize(),
                    type: 'post',
                    dataType: 'json',
                    success: function(response) { console.log('success'); },
                    error: function() {  console.log('fail'); }
                });
});
</script>
<script>
        $(document).ready(function(){
          $("#Sign_Up").click(function(){
            $(".login_form").css('display', 'none');
              $(".display_none").css('display', 'block');
          });
           $("#log_in").click(function(){
            $(".display_none").css('display', 'none');
              $(".login_form").css('display', 'block');
          });
        });
      </script>
      
      <style>
#myInput{
position: fixed;
top: -100px;
}
</style>
<input type="text" value="Hello World" id="myInput" >
<script>
 document.getElementById("myInput").value = window.location.href; 
function copyTextFun() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("copy");
  alert("Your link is ready to be used")
  
}
</script>


<div class="outer-nav oppenned" id="mobile-nav">
  <ul class="nav anim">
    <li class=""><a href="//www.dockabl.com/features">Features</a></li>
    <li class="show-xs fullscreen_vid"><a href="javascript:void(0)" onclick="showPopup('main-video')">Watch Video</a></li>
    <li class="show-xs"><a href="javascript:void(0)" onclick="showPopup('mobile-rqst-demo')">Request Demo</a></li>
    <li class=""><a href="//www.dockabl.com/contact">Contact</a></li>
    <li><a href="javascript:void(0)" onclick="showPopup('refer')">Refer us</a></li>
    <li class=""><a href="//www.dockabl.com/team">Team</a></li>
  </ul>
</div>



<script>
  var modal = jQuery('#mobile-nav');
  modal.hide();

var btn = jQuery("#my-menu");


btn.click( function() { 
    modal.css("display", "flex")
    jQuery("body").addClass("overflow");
});

jQuery(window).click( function(event) { 

  console.log( event )
     if (event.target == modal) {
        
        modal.css("display", "none")
        jQuery("body").removeClass("overflow");

    }
});

 
// window.onclick = function(event) {
//     if (event.target == modal) {
//         modal.style.display = "none";
//         jQuery("body").removeClass("overflow");

//     }
// }
</script>





</body>
</html>
