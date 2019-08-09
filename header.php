<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' )?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head();?>
</head>
<body <?php body_class('themeshub'); ?>>
    <header class="themeshub__header">
        <div class="themeshub__header--inner">
            <a class="brand_logo" href="<?php echo site_url(); ?>"><?php bloginfo('name');?></a>
            <button class="offcanvas_toggler" uk-icon="icon: menu" uk-toggle="target: #offcanvas-nav">Menu</button>
            <nav class="navbar">
                <?php wp_nav_menu(array(
                    'theme_location' => 'main_menu',
                ));?>
            </nav>

            <div id="offcanvas-nav" uk-offcanvas="overlay: true">
                <?php wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'menu_class' => 'uk-nav uk-nav-default',
                        'container' => 'div',
                        'container_class' => 'uk-offcanvas-bar',
                ));?>
            </div>
        </div>
    </header>