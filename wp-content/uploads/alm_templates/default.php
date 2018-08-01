<div class="column">
                  <div>
                  <?php $post= get_post( get_the_ID() ); ?>
                     <a href="?p='. $post->ID .'" ><img src=<?php the_post_thumbnail_url($post);?> style="width:100%" class="post-img"></a>
                     <div class="info">
                        <h1 class="ClanOT-Medium"><b><a href="?p=<?php echo get_the_ID();?>">
             <?php $title  = get_the_title();$title = strip_tags($title);echo substr($title, 0, 50); ?></a></b>
                        </h1>
                        <p class="ClanOT-Book">
                        <?php $content = get_the_content();$content = strip_tags($content);echo substr($content, 0, 200); ?><a href="?p=<?php echo get_the_ID(); ?>" class="ClanOT-News"> <b>Read more</b></a>
                        </p>
                     </div>
                     <div class="flex date-cmnt" style="margin-top:-15px">
                     <span class="left-side ClanOT-News" ><?php the_time("F j, Y"); ?></span>
                        <span class="right-side ClanOT-News"><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></span>
                        </div>
                      
                  </div>
               </div>