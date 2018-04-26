<!doctype html>
<?php $content = get_option('general_settings'); ?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>T & TV School</title>
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
                                    href="<?php echo isset($content['facebook']) ? $content['facebook'] : ""; ?>"><span><i
                                            class="fab fa-facebook-f"></i></span></a></li>
                        <li class="twitter"><a
                                    href="<?php echo isset($content['twitter']) ? $content['twitter'] : ""; ?>"><span><i
                                            class="fab fa-twitter"></i></span></a></li>
                        <li class="linkedin"><a
                                    href="<?php echo isset($content['linkedin']) ? trim($content['linkedin']) : ""; ?>"><span><i
                                            class="fab fa-linkedin-in"></i></span></a></li>
                        <li class="pinterest"><a
                                    href="<?php echo isset($content['pinterest']) ? $content['pinterest'] : ""; ?>"><span><i
                                            class="fab fa-pinterest-p"></i></span></a></li>
                    </ul>
                </div>
                <div class="search-box">
                    <input type="search" id="keyword-search" placeholder="Type your keywords">
                    <span class="search-icon"><i class="fas fa-search"></i></span>
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
                            <a class="navbar-brand" href=""><img
                                        src="<?php echo isset($content['header_logo']) ? wp_get_attachment_url($content['header_logo']) : ""; ?>"
                                        alt="T & TV School">
                                <span class="logo-text">T & TV COLLEGE OF NURSING</span>
                            </a>
                        </div>
                        <div id="navbar1" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <?php
                                $nav_menu = wp_get_nav_menu_items('header');
                                if (isset($nav_menu)) {
                                    $result = array();
                                    foreach ($nav_menu as $menu):
                                        if ($menu->menu_item_parent == 0) {
                                            if (!array_key_exists($menu->ID, $result)) {
                                                $result[$menu->ID] = $menu;
                                            }
                                        } else {
                                            if (array_key_exists($menu->menu_item_parent, $result)) {
                                                if (!isset($result[$menu->menu_item_parent]->submenu)) {
                                                    $result[$menu->menu_item_parent]->submenu = array();
                                                }
                                                $result[$menu->menu_item_parent]->submenu[] = $menu;
                                            }
                                        }
                                    endforeach;
                                    $i = 0;
                                    foreach ($result as $menu):
                                        $class = "";
                                        if ($i == 0) {
                                            $class = "active";
                                        }
                                        if ($menu->menu_item_parent == 0) {
                                            if (isset($menu->submenu) && count($menu->submenu) > 0) {
                                                ?>
                                                <li class="dropdown"><a href="#" class="dropdown-toggle"
                                                                        data-toggle="dropdown" role="button"
                                                                        aria-expanded="false"><span><?php echo $menu->title; ?></span></a>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <?php foreach ($menu->submenu as $row): ?>
                                                            <li>
                                                                <a href="<?php echo esc_url($row->url); ?>"><?php echo $row->title; ?></a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php } else {
                                                ?>
                                                <li class="<?php echo $class; ?>"><a
                                                            href="<?php echo esc_url($menu->url); ?>"><span><?php echo $menu->title; ?></span></a>
                                                </li>
                                            <?php }
                                        }
                                        $i++; endforeach;
                                } ?>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                    <!--/.container-fluid -->
                </nav>
            </div>
        </div>
    </div>

<?php
//$uri_path = $_SERVER['REQUEST_URI'];
//$uri_segments = explode('/', $uri_path);
//echo $uri_segments[1];
?>