<?php get_header();?>
    
    <main class="themeshub__main">
        <div class="container">
            <div class="themeshub__main--inner">
                <section class="main__content">
                    <?php 
                        if(have_posts()):
                            while(have_posts()): the_post();
                                get_template_part('template-parts/content', 'page');
                            endwhile;
                        endif;
                    ?>
                </section>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </main>
    
    <?php get_footer();?>