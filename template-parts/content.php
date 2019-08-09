
<figure id="post-<?php the_ID();?>" class="<?php post_class('single_item');?>">
    
    
    <div class="featured_image_container">
        <?php if(has_post_thumbnail()){
            the_post_thumbnail('product_thumb');
            // if(is_main_query() && is_single() || is_singular()){
                
            // }
        }?>
    </div>
    <figcaption>
        <?php if(is_page() && is_single()){
           ?><h3 class="single_item_title"> <?php the_title();?> </h3><?php
        }else{ ?>
            <h3 class="single_item_title"><a href="<?php the_permalink();?>"><?php the_title();?></a> 
            
            <div class="uk-inline">
                <button class="th-button" type="button"><i class="fa fa-ellipsis-v"></i></button>
                <!-- <span id="product-option" class="product_option">...</span> -->
                <div uk-dropdown="mode: click" class="template_options"> 
                    <a href="<?php the_field('live_preview_link');?>" target="_blank"><i class="fa fa-eye"></i> Preview</a>
                    <a href="<?php the_field('live_preview_link');?>" target="_blank"><i class="fa fa-download"></i> Download</a>
                </div>
            </div>
            </h3>
        <?php } ?>
        <?php the_category();?>
    </figcaption>
</figure>