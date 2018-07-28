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


                





























<footer>
    <div class="f-left">
        <div>
            <a class="f-logo" href="index.php">
                <svg width="135px" height="19px" viewBox="0 0 135 19" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <defs>
                        <polygon id="" points="0.01603857 7.1804996 18.5519576 7.1804996 18.5519576 0.0150705009 0.01603857 0.0150705009 0.01603857 7.1804996"></polygon>
                    </defs>
                    <g id="Desktop_Website" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="" transform="translate(-67.000000, -35.000000)">
                            <g id="" transform="translate(67.000000, 35.000000)">
                                <g id="" transform="translate(19.236025, 11.469737)">

                                    <g id=""></g>
                                    <path d="M9.28087758,7.17761885 L9.28087758,7.18052524 C9.28087758,7.18052524 9.26950695,7.17941397 9.28087758,7.17941397 L9.28087758,7.18052524 L9.28087758,7.17761885 C13.3980708,7.17223347 16.3540922,6.0848152 18.5519576,4.71881063 L18.5519576,0.0150705009 C15.7530732,1.75240947 12.5003897,2.57346541 9.28087758,2.57568795 L9.28592169,2.57568795 C6.06692255,2.57346541 2.81381152,1.75240947 0.01603857,0.0150705009 L0.01603857,4.71881063 C2.21381853,6.0848152 5.17043829,7.17223347 9.28592169,7.17761885 L9.28592169,7.17941397 C9.29848923,7.17941397 9.28592169,7.18052524 9.28592169,7.18052524 L9.28592169,7.17761885 L9.28087758,7.17761885 Z" class="dockabl-o" id="" fill="#2C2CFF" mask=""></path>
                                </g>
                                <path d="M28.4559541,1.70964276e-05 C24.8236797,1.70964276e-05 21.8801404,2.33248272 21.8801404,5.96342201 C21.8801404,9.59521613 24.8236797,11.9270834 28.4559541,11.9270834 C32.0877156,11.9270834 35.0323663,9.59521613 35.0323663,5.96342201 C35.0323663,2.33248272 32.0877156,1.70964276e-05 28.4559541,1.70964276e-05 M28.4559541,8.0266189 C27.1992005,8.0266189 26.1814011,7.22035137 26.1814011,5.96342201 C26.1814011,4.70726199 27.1992005,3.90048157 28.4559541,3.90048157 C29.7121948,3.90048157 30.7311057,4.70726199 30.7311057,5.96342201 C30.7311057,7.22035137 29.7121948,8.0266189 28.4559541,8.0266189" id="" class="dockabl-o" fill="#2C2CFF"></path>
                                <path d="M40.1053335,9.22495025 C40.1053335,16.0892514 44.8623597,18.4031674 50.1847541,18.4031674 C52.0876671,18.4031674 54.0418763,18.1203925 55.199714,17.7346971 L55.199714,13.0297602 L55.0448854,13.0297602 C54.1448959,13.3386072 52.47367,13.5442772 51.1622006,13.5442772 C48.1024758,13.5442772 45.5307475,12.9783 45.5307475,9.22495025 C45.5307475,5.47083119 48.1024758,4.90562329 51.1622006,4.90562329 C52.47367,4.90562329 54.1448959,5.11103687 55.0448854,5.41954191 L55.199714,5.41954191 L55.199714,0.71460503 C54.0418763,0.328738658 52.0876671,0.0458782635 50.1847541,0.0458782635 C44.8623597,0.0458782635 40.1053335,2.36005071 40.1053335,9.22495025" id="" fill="#000000"></path>
                                <path d="M8.43429585,0.225997677 L2.56480331e-05,0.225997677 L2.56480331e-05,18.2230651 L8.43429585,18.2230651 C13.8853578,18.2230651 17.0997403,15.1123701 17.0997403,9.01894684 C17.0997403,3.23428508 13.602973,0.225997677 8.43429585,0.225997677 M7.71427006,13.4668389 L5.32241999,13.4668389 L5.32241999,4.87947431 L7.71427006,4.87947431 C10.3629424,4.87947431 11.6738134,6.06271806 11.6738134,9.19905771 C11.6738134,12.4125022 10.6457548,13.4668389 7.71427006,13.4668389" id="" fill="#000000"></path>
                                <path d="M115.829424,8.81344778 C117.65488,8.19686512 118.478524,6.83359598 118.478524,4.87947431 C118.478524,1.8716998 116.548852,0.225997677 111.741128,0.225997677 L103.409706,0.225997677 L103.409706,18.2230651 L111.71548,18.2230651 C116.857825,18.2230651 119.043294,16.8093615 119.043294,13.1584194 C119.043294,10.6649054 118.117656,9.37925406 115.829424,8.81344778 Z M108.552308,4.18561579 L111.021615,4.18561579 C112.538098,4.18561579 113.361143,4.33991105 113.361143,5.65086512 C113.361143,6.9622466 112.538098,7.14244295 111.021615,7.14244295 L108.552308,7.14244295 L108.552308,4.18561579 Z M111.201408,14.3155056 L108.552308,14.3155056 L108.552308,11.0246997 L111.201408,11.0246997 C112.744051,11.0246997 113.669604,11.281659 113.669604,12.6700599 C113.669604,14.0835071 112.744051,14.3155056 111.201408,14.3155056 Z" id="" fill="#000000"></path>
                                <polygon id="" fill="#000000" points="122.23208 0.225997677 122.23208 18.2236635 134.65214 18.2236635 134.65214 13.6982391 127.580635 13.6982391 127.580635 0.225997677"></polygon>
                                <path d="M78.0071762,0.225997677 L71.7842794,0.225997677 L67.5930488,6.53030536 L67.5930488,6.52509095 C67.4125721,6.78273411 67.336483,6.9110428 67.0010922,6.9110428 L64.8676033,6.9110428 L64.8676033,0.225997677 L59.518535,0.225997677 L59.518535,18.2230651 L64.8676033,18.2230651 L64.8676033,11.3328628 L66.8985,11.3328628 C67.2077298,11.3328628 67.3875225,11.5386183 67.6186968,11.8731954 L67.6186968,11.8527652 L72.1958448,18.2230651 L78.3669326,18.2230651 L71.6733944,8.97902669 L78.0071762,0.225997677 Z" id="" fill="#000000"></path>
                                <path d="M86.6208031,0.225997677 L79.4986007,18.2236635 L84.8982811,18.2236635 L86.119897,14.9840614 L93.9685371,14.9840614 L95.1580929,18.2236635 L100.968911,18.2236635 L93.5893737,0.225997677 L86.6208031,0.225997677 Z M90.0930338,4.4425751 L92.3706646,10.6384914 L87.7570964,10.6384914 L90.0930338,4.4425751 Z" id="" fill="#000000"></path>
                            </g>
                        </g>
                    </g>
                </svg> </a>
            <ul class="social-links">
                <li><a href="https://www.facebook.com/Dockabl-245396762610522/" target="_blank" class="f-fb"><svg width="35px" height="37px" viewBox="0 0 35 37" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs></defs>
                            <g id="" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="" transform="translate(-67.000000, -1225.000000)" fill="#FFFFFF">
                                    <g id="" transform="translate(67.000000, 1183.000000)">
                                        <path d="M35,42 L0,42 L0,79 L17.9284,79 L17.9284,65.85168 L13.3658,65.85168 L13.3658,60.26764 L17.9284,60.26764 L17.9284,56.15028 C17.9284,51.37136 20.6892,48.76804 24.7212,48.76804 C26.6532,48.76804 28.3136,48.92048 28.7966,48.98856 L28.7966,53.98356 L26.0008,53.98356 C23.807,53.98356 23.3828,55.08616 23.3828,56.70232 L23.3828,60.26764 L28.6132,60.26764 L27.9314,65.85168 L23.3828,65.85168 L23.3828,79 L35,79 L35,42 Z" id=""></path>
                                    </g>
                                </g>
                            </g>
                        </svg></a></li>
                <li><a href="https://www.linkedin.com/company-beta/13310501/" target="_blank" class="f-li"><svg width="35px" height="37px" viewBox="0 0 35 37" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs></defs>
                            <g id="" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="" transform="translate(-124.000000, -1225.000000)" fill="#FFFFFF">
                                    <g id="" transform="translate(67.000000, 1183.000000)">
                                        <g id="Page-1" transform="translate(57.000000, 42.000000)">
                                            <path d="M27.23168,28.76972 L23.19968,28.76972 L23.19968,22.09788 C23.19968,20.50688 23.17448,18.46004 21.10388,18.46004 C19.00528,18.46004 18.68468,20.1946 18.68468,21.9854 L18.68468,28.76972 L14.65548,28.76972 L14.65548,15.05012 L18.52228,15.05012 L18.52228,16.92676 L18.57688,16.92676 C19.11588,15.84784 20.43188,14.70972 22.39328,14.70972 C26.47708,14.70972 27.23168,17.55132 27.23168,21.2454 L27.23168,28.76972 Z M10.10828,13.17644 C8.81188,13.17644 7.76888,12.06792 7.76888,10.70336 C7.76888,9.3388 8.81188,8.23028 10.10828,8.23028 C11.39768,8.23028 12.44628,9.3388 12.44628,10.70336 C12.44628,12.06792 11.39768,13.17644 10.10828,13.17644 Z M8.08808,28.76972 L12.12568,28.76972 L12.12568,15.05012 L8.08808,15.05012 L8.08808,28.76972 Z M0.00028,37 L35.00028,37 L35.00028,0 L0.00028,0 L0.00028,37 Z" id=""></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg></a></li>
                <li><a href="https://twitter.com/Dockabl1" target="_blank" class="f-tw"><svg width="35px" height="37px" viewBox="0 0 35 37" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs></defs>
                            <g id="" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="" transform="translate(-181.000000, -1225.000000)" fill="#FFFFFF">
                                    <g id="" transform="translate(67.000000, 1183.000000)">
                                        <g id="" transform="translate(114.000000, 42.000000)">
                                            <path d="M27.1079742,13.6728173 C27.1166452,13.8805366 27.1209806,14.0913106 27.1209806,14.3020846 C27.1209806,20.7184727 22.4993548,28.12 14.0451613,28.12 C11.4496516,28.12 9.0347871,27.3166151 7,25.9389474 C7.35984516,25.9847678 7.72547097,26.0061507 8.09687742,26.0061507 C10.2487226,26.0061507 12.2314839,25.230258 13.8038194,23.9274303 C11.7936,23.8877193 10.0969806,22.4825593 9.51169032,20.5535191 C9.79205161,20.610031 10.0796387,20.6405779 10.3758968,20.6405779 C10.7949935,20.6405779 11.2010839,20.5810114 11.5869419,20.469515 C9.48423226,20.0250568 7.89889032,18.0624149 7.89889032,15.7087719 C7.89889032,15.6873891 7.89889032,15.6675335 7.90033548,15.6461507 C8.52030968,16.0111868 9.22843871,16.2295975 9.98136774,16.2540351 C8.74864516,15.3834469 7.93790968,13.8958101 7.93790968,12.2111455 C7.93790968,11.3222291 8.1648,10.4882972 8.56077419,9.77044376 C10.8253419,12.7090609 14.2128,14.6411558 18.0323613,14.8458204 C17.9543226,14.4884211 17.9124129,14.1188029 17.9124129,13.7369659 C17.9124129,11.0564706 19.9717677,8.88 22.509471,8.88 C23.8317935,8.88 25.0254968,9.47261094 25.8651355,10.4149845 C26.9099871,10.1965738 27.8941419,9.79335397 28.7829161,9.23587203 C28.4389677,10.3706914 27.7106065,11.3222291 26.7611355,11.9224768 C27.6903742,11.804871 28.5777032,11.5452219 29.4,11.1588029 C28.7843613,12.1332508 28.0054194,12.9885655 27.1079742,13.6728173 Z M0,37 L35,37 L35,0 L0,0 L0,37 Z" id=""></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a></li>
            </ul>
        </div>


        <div>
            <ul class="quick-links f-main-links">
                <li><a href="//www.dockabl.com/features#slide_1" target="_blank">Objectives</a></li>
                <li><a href="//www.dockabl.com/features#slide_2" target="_blank">Reviews</a></li>
                <li><a href="//www.dockabl.com/features#slide_3" target="_blank">Recognition</a></li>
            </ul>
        </div>
        <div>
            <ul class="quick-links">
                <li class="hide-xs"><a href="//www.dockabl.com/index#main-home" target="_blank">Request Demo</a></li>
                <li><a href="//www.dockabl.com/contact" target="_blank">Contact</a></li>
                <li class="show-xs"><a href="//www.dockabl.com/team" target="_blank">Team</a></li>
            </ul>
        </div>
    </div>

    <div class="f-right">
      
       <div class="stay-updated">
          <form>
            <div class="stay-updated-ori">
                  <p>Stay updated with the latest at Dockabl</p>

                  <div class="form-group">
                      <input type="email" id="stay-updated-email" name="stay-updated-email" class="input-text" placeholder="email@example.com" required="">
                  </div>

                  <div class="text-center">
                      <input type="hidden" name="type" value="stay-updated">
                      <input type="submit" class="btn-2 btn-black" value="Submit">
                  </div>
              </div>

              <p class="stay-updated-success" style="text-align: center;
  font-size: 30px;display: none">Thank you for becoming a member of the Dockabl network!</p>
          </form>
            
        </div>
    </div>
</footer>
















































<div class="row1" style="display: none;">
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
