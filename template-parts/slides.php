<section class="themeshub__header--slides">
    <div uk-slideshow="animation: fade;autoplay: true;" class="slides__container">
        <ul class="uk-slideshow-items slide_items">
            
            <?php 
                $slidepost = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 1,
            ));?>
            
            <?php while($slidepost->have_posts()): $slidepost->the_post();?>
            <!-- <li uk-slideshow-item ="<?php echo $count_post = $slidepost->current_post + 1;?>"> -->
            <li>
                <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                    <?php if(has_post_thumbnail()){
                        the_post_thumbnail();
                    }?>
                </div>
                <div class="uk-position-center uk-position-small">

                    <a href="<?php the_permalink();?>"><?php the_title('<h2>', '</h2>');?></a>
                    
                </div>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>

        </ul>
    </div>
</section>