<article id="<?php the_ID();?>" class="<?php post_class('single_post_item page_content');?>">
    
    <div class="uk-position-relative uk-visible-toggle uk-light" uk-slideshow="animation: reveal; autoplay: true; ratio: 8:4">
        <?php 
            $images = get_field('preview_images');
            if( $images ): ?>
                <ul class="uk-slideshow-items">
                    <?php foreach( $images as $image ): ?>
                        <li uk-lightbox="animation: slide">
                            <a href="<?php echo $image; ?>" data-alt="<?php echo $image; ?>" data-caption="<?php the_title();?>">
                                <img src="<?php echo $image; ?>" alt="<?php the_title();?>" />
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
            <?php endif; ?>
        </div>
    
    <h2 class="single_item_title"><?php the_title();?>
        <div>
            <a target="_blank" href="<?php the_field('download_link');?>" title="Download Theme"> <i class="fa fa-download"></i></a>
            <a target="_blank" href="<?php the_field('live_preview_link');?>" title="Preview Demo"> <i class="fa fa-eye"></i></a>
        </div>
    </h2>
    <p class="single_post_meta">
        By AR_Rony
    </p>
    <div class="single_item_content">
        <?php
            the_content();
        ?>
    </div>
</article>