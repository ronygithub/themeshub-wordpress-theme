<article id="<?php the_ID();?>" class="<?php post_class('page_content');?>">
    
    <header class="page_header">
        <div class="page_title">
            <?php 
                the_title('<h2>', '</h2>');
            ?>
        </div>
        <div class="page_breadcrumb">
            <?php
                if(!is_home() && !is_single()){
                    echo 'I am Breadcrumb';
                }
            ?>
        </div>
    </header>

    <main class="page_body">
        <?php the_content();?>
    </main>    
</article>