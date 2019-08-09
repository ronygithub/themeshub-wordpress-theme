<?php get_header();?>
    
    <main class="themeshub__main">
        <div class="container">
            <?php
                if(!is_home() && !is_single()){?>
                    <header class="page_header">
                        <div class="page_title">
                            <?php 
                                if(is_archive( )){
                                    echo get_the_archive_title('<h2>', '</h2>');
                                }
                            ?>
                        </div>
                    </header>
                <?php }
            ?>
            <div class="themeshub__main--inner">
                <section class="main__content">                    
                    <?php 
                        if(have_posts()):
                            while(have_posts()): the_post();
                                get_template_part('template-parts/content', 'archive');
                            endwhile;
                        endif;
                    ?>
                </section>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </main>
    
    <?php get_footer();?>