<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Encrypte Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">


    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php

$encrypted_et_to = encrypted_lite_get_options_values();
$encrypted_ed_header = $encrypted_et_to['header_social_mail'];
$encrypted_header_phone = $encrypted_et_to['header_phone'];
$encrypted_header_email = $encrypted_et_to['header_email'];
$encrypted_ed_search = $encrypted_et_to['show_search_header'];
$encrypted_ed_header_social = $encrypted_et_to['enable_disable_social_links_header'];
$header_class = '';
if ($encrypted_ed_header != 1):
    $header_class = 'top-boder-masthead';
endif;
?>

<div id="page" class="hfeed site">
    <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'encrypted-lite'); ?></a>

    <header id="masthead" class="site-header <?php echo esc_attr($header_class); ?>" role="banner">
        <?php if ($encrypted_ed_header == 1): ?>
            <div class="header_text">
                <div class="el-container">
                    <div class="header_text_wrap">
                        <!--                    <div class="el-tel"><i class="fa fa-phone"></i><span><a href="tel:-->
                        <?php //echo esc_attr($encrypted_header_phone); ?><!--">-->
                        <?php //echo esc_attr($encrypted_header_phone); ?><!--</a></span></div>-->
                        <!--                    <div class="el-mail"><i class="fa fa-envelope"></i><span><a href="mailto:-->
                        <?php //echo esc_attr($encrypted_header_email); ?><!--">-->
                        <?php //echo esc_attr($encrypted_header_email); ?><!--</a></span></div>-->
                    </div>
                    <?php if ($encrypted_ed_header_social == 1): ?>
                        <div class="header-social">
                            <?php
                            do_action('encrypted_lite_social');
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        <?php endif; ?>

        <div class="el-container">
            <?php encrypted_lite_admin_header_image(); ?>
            <?php if ($encrypted_ed_search == 1): ?>
                <div class="search-icon">
                    <div class="search-click"><i class="fa fa-search"></i></div>

                    <div class="search-box">
                        <div class="close"> &times; </div>
                        <?php get_search_form(); ?>
                    </div>
                </div> <!--  search-icon-->
            <?php endif; ?>
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <button class="menu-toggle"><?php _e('Primary Menu', 'encrypted-lite'); ?></button>


                <?php wp_nav_menu(array('theme_location' => 'primary')); ?>

            </nav>
            <!-- #site-navigation -->


            <div id="dl-menu" class="dl-menuwrapper hide">
                <button class="dl-trigger"><?php _e('Primary Menu', 'encrypted-lite'); ?></button>
                <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => '', 'menu_class' => 'dl-menu')); ?>
            </div>
        </div>
    </header>
    <!-- #masthead -->


    <div id="content" class="site-content">
        <?php if (is_front_page() || is_home()) { ?>
            <section class="slider-wrapper">
                <?php
                do_action('encrypted_slider');
                ?>
            </section>
        <?php } ?>
	