<!doctype html>
<?php $content = get_option('general_settings');
global $wp;?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php  wp_title('', true);?></title>
    <link rel="icon" href="<?php echo isset($content['favicon']) ? wp_get_attachment_url($content['favicon']) : ""; ?>"
          type="image/png" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:400,600,700"
          rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>
<div class="main-body">
    <div class="navbar-area">
        <div class="search-box-area">
            <div class="container-1510">
                <div class="social-icons">
                    <ul>
                        <li class="facebook"><a
                                    href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(home_url($wp->request)); ?>" target="_blank"><span><i
                                            class="fab fa-facebook-f"></i></span></a></li>
                        <li class="twitter"><a
                                    href="http://twitter.com/intent/tweet/?text=&amp;url=<?php echo home_url($wp->request); ?>" target="_blank"><span><i
                                            class="fab fa-twitter"></i></span></a></li>
<!--                        <li class="linkedin"><a-->
<!--                                    href="--><?php //echo home_url($wp->request); ?><!--"><span><i-->
<!--                                            class="fab fa-linkedin-in"></i></span></a></li>-->
                        <li class="pinterest"><a
                                    href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(home_url($wp->request)); ?>" target="_blank"><span><i
                                            class="fab fa-pinterest-p"></i></span></a></li>
                    </ul>
                </div>
                <div class="search-box">
                    <input type="search" id="keyword-search" placeholder="Type your keywords">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
        <div class="navigation-menu-div">
            <div class="container-1510">
                <nav class="navbar navbar-default">
                    <div>
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo get_site_url(); ?>"><img
                                        src="<?php echo isset($content['header_logo']) ? wp_get_attachment_url($content['header_logo']) : ""; ?>"
                                        alt="T & TV School">
                                <span class="logo-text">T & TV COLLEGE OF NURSING</span>
                            </a>
                        </div>
                        <div id="navbar1" class="navbar-collapse collapse">
                            <?php
                            wp_nav_menu(array('menu_class' => 'nav navbar-nav',
                                'menu' => 'header'
                            )); ?>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                    <!--/.container-fluid -->
                </nav>
            </div>
        </div>
    </div>