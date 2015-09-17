<?php

/**
 * Get Theme Customizer Fields
 *
 * @package		Theme_Customizer_Boilerplate
 * @copyright	Copyright (c) 2013, Slobodan Manic
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 * @author		Slobodan Manic
 *
 * @since		Theme_Customizer_Boilerplate 1.0
 */


/**
 * Helper function that holds array of theme options.
 *
 * @return	array	$options	Array of theme options
 * @uses	thsp_get_theme_customizer_fields()	defined in customizer/helpers.php
 */
function encrypted_lite_get_fields()
{

    /*
    * Using helper function to get default required capability
    */
    $encrypted_option_cat = "";
    // Pull all categories
    $encrypted_options_categories = array();
    $encrypted_options_categories_obj = get_categories();


    $encrypted_options_categories = array();
    $encrypted_options_categories_obj = get_categories();
    $encrypted_options_categories[''] = array('label' => __('Select Category:', 'encrypted-lite'));
    foreach ($encrypted_options_categories_obj as $category) {
        //$options_categories[$category->cat_ID] = $category->cat_name;
        $encrypted_options_categories[$category->cat_ID] = array('label' => $category->cat_name);
    }

    // Pull all the pages into an array
    //$options_pages = array();
    $encrypted_select_lists = array();
    $encrypted_options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $encrypted_options_pages[''] = array('label' => __('Select a page:', 'encrypted-lite'));
    foreach ($encrypted_options_pages_obj as $page) {
        $encrypted_options_pages[$page->ID] = array('label' => $page->post_title);
        //$options_pages[$page->ID] = $page->post_title;
    }


    $encrypted_lite_capability = encrypted_lite_capability();

    $options = array(

        /**
         * General Settings starts here
         */

        'enable_responsive_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Enable Responsive', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 1,
                'panel' => 'general_settings_panel'),

            'fields' => array('enable_responsive' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Responsive', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 10))),

            ),


        'page_layout_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Page Layout', 'encrypted-lite'),
                'description' => __('Edit Page Layout', 'encrypted-lite'),
                'priority' => 2,
                'panel' => 'general_settings_panel'),

            'fields' => array('page_layout' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_site_layout_sanitize'), 'control_args' =>
                        array(
                        'label' => __('Page Layout', 'encrypted-lite'),
                        'type' => 'radio', // Text field control
                        'priority' => 10,
                        'choices' => array('fullwidth' => array('label' => __('Fullwidth', 'encrypted-lite')), 
                        'boxed' => array('label' => __('Boxed', 'encrypted-lite'))),
                        ))),

            ),


        



        'copyright_footer_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Copyright Footer Text', 'encrypted-lite'),
                'description' => __('Edit Copyright Text', 'encrypted-lite'),
                'priority' => 5,
                'panel' => 'general_settings_panel'),

            'fields' => array('copyright_footer' => array('setting_args' => array(
                        //'default'=> __('Upload Logo','encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => '',
                        'type' => 'text', // Text field control
                        'priority' => 10))),

            ),

        'custom_css_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Custom Css', 'encrypted-lite'),
                'description' => __('Edit Custom Css', 'encrypted-lite'),
                'priority' => 6,
                'panel' => 'general_settings_panel'),
            'fields' => array('custom_css' => array('setting_args' => array(
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array( //'label' => __('Custom Css', 'encrypted-lite'),
                            'type' => 'textarea', 'priority' => 10)))),

        /**
         * General Settings ends here
         */

        /**
         * Header Settings Starts here
         */


        'header_social_mail_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Enable/Disable Top Header', 'encrypted-lite'),
                'description' => __('Show/hide top header', 'encrypted-lite'),
                'priority' => 1,
                'panel' => 'header_settings_panel'),
            'fields' => array('header_social_mail' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        //'label' => __('Show Hide', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)), )
            ),

        'header_phone_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Header Phone', 'encrypted-lite'),
                'description' => __('Phone Number', 'encrypted-lite'),
                'priority' => 2,
                'panel' => 'header_settings_panel',
                ),
            'fields' => array('header_phone' => array('setting_args' => array(
                        'default' => __('+977 XXXXXXXXXX', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' =>
                        array(
                        'label' => '',
                        'type' => 'text',
                        'priority' => 10))),
            ),

        'header_email_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Header Email', 'encrypted-lite'),
                'description' => __('Email Address', 'encrypted-lite'),
                'priority' => 3,
                'panel' => 'header_settings_panel',
                ),
            'fields' => array('header_email' => array('setting_args' => array(
                        'default' => __('email@email.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' =>
                        array(
                        'label' => '',
                        'type' => 'text',
                        'priority' => 10))),
            ),

        'show_search_header_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Show Search in Header', 'encrypted-lite'),
                'description' => '',
                'priority' => 4,
                'panel' => 'header_settings_panel',
                ),
            'fields' => array('show_search_header' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Show Hide Search in header', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10))),
            ),

        'search_placeholder_text_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Search PlaceHolder Text', 'encrypted-lite'),
                'description' => '',
                'priority' => 5,
                'panel' => 'header_settings_panel'),
            'fields' => array('search_placeholder_text' => array('setting_args' => array(
                        'default' => __('Search...', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Place Holder Text', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 10)), )),



        'header_image' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Upload Logo of Website', 'encrypted-lite'),
                'description' => __('Edit Logo', 'encrypted-lite'),
                'priority' => 7,
                'theme_supports' => 'custom-header',
                'panel' => 'header_settings_panel'),

            'fields' => array('upload_logo' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => '',
                        'type' => 'image', // Text field control
                        'priority' => 10))),

            ),


        /**
         * Header Settings ends here
         */


        /**
         * Slider Settings starts here
         */


        'enable_slider_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Enable Slider', 'encrypted-lite'),
                'description' => '',
                'priority' => 1,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('enable_slider' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Click to enable', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10))),
            ),

        'category_slider_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Choose the category to show in Slider', 'encrypted-lite'),
                'description' => '',
                'priority' => 2,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('category_as_slider' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Choose the slider category', 'encrypted-lite'),
                        'type' => 'select',
                        'priority' => 10,
                        'choices' => $encrypted_options_categories))),
            ),

        'slider_button_text_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Slider Button Text', 'encrypted-lite'),
                'description' => '',
                'priority' => 3,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('slider_button_text' => array('setting_args' => array(
                        'default' => __('Details', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Type to change the slider button text', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 10,
                        ))),
            ),

        'show_pager_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Show Pager', 'encrypted-lite'),
                //'description' => __('Show Hide Navigation Dot', 'encrypted-lite'),
                'priority' => 4,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('show_pager' => array('setting_args' => array(
                        'default' => __('yes', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_radio_yes_no'), 'control_args' => array(
                        'label' => __('Show Hide Navigation Dot', 'encrypted-lite'),
                        'type' => 'radio',
                        'priority' => 10,
                        'choices' => array(
                            'yes' => array('label' => __('Yes', 'encrypted-lite')),
                            'no' => array('label' => __('No', 'encrypted-lite')),
                            )))),
            ),


        'show_controls_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Show Controls', 'encrypted-lite'),
                'description' => '',
                'priority' => 5,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('show_controls' => array('setting_args' => array(
                        'default' => __('yes', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_radio_yes_no'), 'control_args' => array(
                        'label' => __('Show hide slider controls', 'encrypted-lite'),
                        'type' => 'radio',
                        'priority' => 10,
                        'choices' => array(
                            'yes' => array('label' => __('Yes', 'encrypted-lite')),
                            'no' => array('label' => __('No', 'encrypted-lite')),
                            )))),
            ),

        'slider_transition_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Slider Transition', 'encrypted-lite'),
                //'description' => __('Fade/Slide', 'encrypted-lite'),
                'priority' => 6,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('slider_transition' => array('setting_args' => array(
                        'default' => __('fade', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_slider_transition'), 'control_args' =>
                        array(
                        'label' => __('Choose the slider transition', 'encrypted-lite'),
                        'type' => 'radio',
                        'priority' => 10,
                        'choices' => array(
                            'fade' => array('label' => __('Fade', 'encrypted-lite')),
                            'slide horizontal' => array('label' => __('Slide Horizontal', 'encrypted-lite')),
                            'slide vertical' => array('label' => __('Slide Vertical', 'encrypted-lite')))))),
            ),

        'slider_auto_transition_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Slider auto Transitions', 'encrypted-lite'),
                'description' => '',
                'priority' => 7,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('slider_auto_transition' => array('setting_args' => array(
                        'default' => __('yes', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_radio_yes_no'), 'control_args' => array(
                        'label' => __('Select slider auto transition', 'encrypted-lite'),
                        'type' => 'radio',
                        'priority' => 10,
                        'choices' => array('yes' => array('label' => __('Yes', 'encrypted-lite')), 'no' =>
                                array('label' => __('No', 'encrypted-lite')))))),
            ),


        'slider_speed_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Slider Speed', 'encrypted-lite'),
                'description' => '',
                'priority' => 8,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('slider_speed' => array('setting_args' => array(
                        'default' => __(5000, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Type the slider speed in milliseconds (ms)', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 10,
                        ))),
            ),


        'slider_pause_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Slider Pause', 'encrypted-lite'),
                'description' => '',
                'priority' => 9,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('slider_pause' => array('setting_args' => array(
                        'default' => __(5000, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Type the slider pause time in millisecond (ms)', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 10,
                        ))),
            ),

        'show_slider_caption_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Show Slider Caption', 'encrypted-lite'),
                'description' => '',
                'priority' => 10,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('show_slider_caption' => array('setting_args' => array(
                        'default' => __('show', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_slider_caption'), 'control_args' => array
                        (
                        'label' => __('Show hide slider caption', 'encrypted-lite'),
                        'type' => 'radio',
                        'priority' => 10,
                        'choices' => array('show' => array('label' => __('Show', 'encrypted-lite')),
                                'hide' => array('label' => __('Hide', 'encrypted-lite')))))),
            ),
            
        'slider_content_text_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('No of Slider Content Character', 'encrypted-lite'),
                'description' => '',
                'priority' => 11,
                'panel' => 'slider_settings_panel',
                ),
            'fields' => array('slider_content_text' => array('setting_args' => array(
                        'default' => __('150', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Type to change the number of  slider content character to show. Leave Empty to show full content which will disable Read More button', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 10,
                        ))),
            ),


        /**
         * Slider Settings ends here
         */


        /**
         * Home Page Settings starts here
         */

        'call_to_action_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Call To Action Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 1,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'call_to_action' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Call to Action Section', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'call_to_action_post' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Select Post to Display as Call to Action', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 11)),
                'enter_number_of_character_show_call_to_action' => array('setting_args' => array
                        (
                        'default' => __(250, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Enter the Number of Characters to show in Call to Action', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 12,
                        )),
                'read_more_text' => array('setting_args' => array(
                        'default' => __('Read More', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Read More Text for Call to Action', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 13,
                        )),

                ),
            ),

        'feature_post_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Feature Page Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 2,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'feature_post' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Feature Page', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'title_feature_post_section' => array('setting_args' => array(
                        'default' => __('Feature Page', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Title for Feature Section', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),
                'select_post_feature_post_1' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Select Post for the Featured Post 1', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 12)),
                'select_post_feature_post_2' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Select Post for the Featured Post 2', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 13)),
                'select_post_feature_post_3' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Select Post for the Featured Post 3', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_pages,
                        'priority' => 14)),
                'numbwe_character_feature_post' => array('setting_args' => array(
                        'default' => __(250, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Number of Characters to show in Feature Post', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 15,
                        )),
                

                )),


        'portfolio_section_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Portfolio Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 3,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_portfolio' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Portfolio', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'portfolio_section_title' => array('setting_args' => array(
                        'default' => __('Portfolio', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Portfolio Section Title', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),

                'portfolio_section_description' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Portfolio Section Description', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'select_portfolio_category' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Select Portfolio Category', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_categories,
                        'priority' => 13)),
                'numbwe_character_portfolio' => array('setting_args' => array(
                        'default' => __(150, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Number of Characters to show in Portfolio', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 14,
                        )),
                

                )),

        'blog_section_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Blog Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 4,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_blog' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Blog', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'blog_section_title' => array('setting_args' => array(
                        'default' => __('Blog', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Blog Section Title', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),

                'blog_section_description' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Blog Section Description', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'select_blog_category' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Select Category for the Blog', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_categories,
                        'priority' => 13)),
                'enable_date_over_blog_image' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Date Over Blog Image', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 14)),
                'number_character_blog_content' => array('setting_args' => array(
                        'default' => __(250, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Number of Character to show in the blog content', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 15,
                        )),
                )),

        'testimonial_section_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Testimonial Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 5,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_testimonial' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Testimonial', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'testimonial_section_title' => array('setting_args' => array(
                        'default' => __('Testimonial', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Testimonial Section Title', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),

                'testimonial_section_description' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Testimonial Section Description', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'select_testimonial_category' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Select Testimonial Category', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_categories,
                        'priority' => 13)),
                'number_character_testimonail_content' => array('setting_args' => array(
                        'default' => __(250, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Number of Characters to show in the Testimonial content', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 15,
                        )),
                )),

        'team_member_section_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Team Member Section', 'encrypted-lite'),
                'description' => '',
                'priority' => 6,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_team_member' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Team Member', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'team_member_section_title' => array('setting_args' => array(
                        'default' => __('Team Member', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Team Member Section Title', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),

                'team_member_section_description' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Team Member Section Description', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'select_team_member_category' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Select Team Member Category', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_categories,
                        'priority' => 13)),
                'number_character_team_member_content' => array('setting_args' => array(
                        'default' => __(250, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Number of Character to show in the Team Member content', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 15,
                        )),
                )),

        'client_logo_slider_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Client Logo Slider', 'encrypted-lite'),
                'description' => '',
                'priority' => 7,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_client_logo_slider_section' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable/Disable Client Logo Slider', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'client_section_title' => array('setting_args' => array(
                        'default' => __('Client', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Client/Associates Section Title', 'encrypted-lite'),
                        'type' => 'text',
                        'priority' => 11,
                        )),

                'client_section_description' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_sanitize_textarea'), 'control_args' =>
                        array(
                        'label' => __('Client/Associates Section Description', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'select_client_category' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'), 'control_args' => array(
                        'label' => __('Select Category for the Client/Associates', 'encrypted-lite'),
                        'type' => 'select',
                        'choices' => $encrypted_options_categories,
                        'priority' => 13)))),

        'google_map_setting' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Google Map', 'encrypted-lite'),
                'description' => '',
                'priority' => 8,
                'panel' => 'home_page_settings_panel',
                ),
            'fields' => array(
                'enable_google_map_section' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable or Disable Google Map Section', 'encrypted-lite'),
                        'type' => 'switch',
                        'priority' => 10)),
                'google_map_iframe' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_sanitize_googlemaps'), 
                'control_args' =>
                        array(
                        'label' => __('Google map iframe', 'encrypted-lite'),
                        'type' => 'textarea', // Textarea control
                        'priority' => 12)),
                'map_info_title' => array(
                    'setting_args' => array(
                        'default' => __(' Encrypted Lite', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'
                        ),
                    'control_args' => array(
                            'label' => __('Info Title', 'encrypted-lite'),
                            'type' => 'text',
                            'priority' => 13
                        )
                    ),
                'map_info_adderss' => array(
                    'setting_args' => array(
                        'default' => __('Pepsicola, Kathmandu', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'
                        ),
                    'control_args' => array(
                            'label' => __('Info Address', 'encrypted-lite'),
                            'type' => 'textarea',
                            'priority' => 14
                        )
                    ),
                'map_info_phone' => array(
                    'setting_args' => array(
                        'default' => __('+9779841762231', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'
                        ),
                    'control_args' => array(
                            'label' => __('Info Phone', 'encrypted-lite'),
                            'type' => 'text',
                            'priority' => 15
                        )
                    ),
                'map_info_email' => array(
                    'setting_args' => array(
                        'default' => __('email@email.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_text_field'
                        ),
                    'control_args' => array(
                            'label' => __('Info Email', 'encrypted-lite'),
                            'type' => 'text',
                            'priority' => 16
                        )
                    ),

                )),


               


        /**
         * Home Page Settings ends here
         */


        /**
         * Single Page Post Settings starts here
         */


        'enable_feature_image_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Enable or Disable Featured Image', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 1,
                'panel' => 'single_page_post_section_settings_panel'),

            'fields' => array('enable_feature_image' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Disable Featured Image', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 10))),

            ),

        'enable_posted_date_in_post_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Enable Disable Posted Date', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 2,
                'panel' => 'single_page_post_section_settings_panel'),

            'fields' => array('enable_posted_date_in_post' => array('setting_args' => array
                        (
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable disable posted dates in Posts', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 11))),

            ),

        'enable_tags_category_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Enable Disable Tags and Category', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 3,
                'panel' => 'single_page_post_section_settings_panel'),

            'fields' => array('enable_tags_category' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable disable tags and category in posts', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 12))),

            ),

        'enable_pagination_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Enable Disable Post Pagination', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 4,
                'panel' => 'single_page_post_section_settings_panel'),

            'fields' => array('enable_pagination' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => __('Enable Disable post pagination', 'encrypted-lite'),
                        'type' => 'switch', // Text field control
                        'priority' => 13))),

            ),

        /**
         * Single Page Post Settings ends here
         */

        

        /**
         * Social Media Settings starts here
         */


        'enable_disable_social_links_section_header' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Enable or Disable Social links in Header', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 1,
                'panel' => 'social_media_settings_panel'),

            'fields' => array('enable_disable_social_links_header' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => '',
                        'type' => 'switch', // Text field control
                        'priority' => 13))),

            ),
            
            'enable_disable_social_links_section_footer' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Enable or Disable Social links in Footer', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 2,
                'panel' => 'social_media_settings_panel'),

            'fields' => array('enable_disable_social_links_footer' => array('setting_args' => array(
                        'default' => __(1, 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_enable_disable_switch'), 'control_args' =>
                        array(
                        'label' => '',
                        'type' => 'switch', // Text field control
                        'priority' => 14))),

            ),


        'social_media_section' => array(
            'existing_section' => false,
            'args' => array(
                'title' => __('Social Media Settings', 'encrypted-lite'),
                //'description' => __('Edit General Settings', 'encrypted-lite'),
                'priority' => 3,
                'panel' => 'social_media_settings_panel'),

            'fields' => array(
                'facebook' => array('setting_args' => array(
                        'default' => __('http://www.facebook.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Facebook', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 10)),
                'twitter' => array('setting_args' => array(
                        'default' => __('http://www.twitter.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Twitter', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 11)),
                'google_plus' => array('setting_args' => array(
                        'default' => __('http://www.plus.google.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Google Plus', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 12)),
                'youtube' => array('setting_args' => array(
                        'default' => __('http://www.youtube.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Youtube', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 13)),
                'pinterest' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Pinterest', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 14)),
                'linkedin' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Linkedin', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 15)),
                'flicker' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Flicker', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 16)),
                'vimeo' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Vimeo', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 17)),
                'stumbleupon' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Stumbleupon', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 18)),
                'instagram' => array('setting_args' => array(
                        'default' => __('http://www.instagram.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Instagram', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 19)),
                'sound_cloud' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Sound Cloud', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 20)),
                'github' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('GitHub', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 21)),
                'skype' => array('setting_args' => array(
                        'default' => __('http://www.skype.com', 'encrypted-lite'),
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Skype', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 22)),
                'tumbler' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('Tumbler', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 23)),
                'rss' => array('setting_args' => array(
                        'default' => '',
                        'type' => 'option',
                        'capability' => $encrypted_lite_capability,
                        'transport' => 'refresh',
                        'sanitize_callback' => 'encrypted_lite_esc_raw_url'), 'control_args' => array(
                        'label' => __('RSS', 'encrypted-lite'),
                        'type' => 'text', // Text field control
                        'priority' => 24)),

                ),

            ),

        'encrypted_lite_important_links_section' => array(
                    'existing_section' => false,
                    'args' => array(
                    'title' => __('Encrypted Lite Important Links', 'encrypted-lite'),
                    //'description' => __('Edit General Settings', 'encrypted-lite'),
                    'priority' => 700,
                    //'panel' => 'archive_page_settings_panel'
                    ),

                    'fields' => array(
                        'important_links' => array('setting_args' => array(
                            'default' => '',
                            'type' => 'option',
                            'capability' => $encrypted_lite_capability,
                            'transport' => 'refresh',
                            'sanitize_callback' => 'encrypted_lite_links_sanitize'
                            ), 
                        'control_args' => array(
                            'label' => '',
                            'type' => 'encrypted-lite-important-links', // Text field control
                            'priority' => 10))),            )


        /**
         * Social Media Settings ends here
         */
        

        );


    /**
     * insert slider categories in array starts here
     *
     * foreach ($options_categories_obj as $category) {
     * $options['category_slider_setting']['fields']['enable_slider']['control_args']['choices'][$category->cat_ID] = array(
     * 'label'=>__($category->cat_name,'encrypted-lite')
     * );
     * 
     * //$options_categories[$category->cat_ID] = $category->cat_name;
     * }

     * /**
     * insert slider categories in array ends here
     */
    /*
    * 'encrypted_lite_options_array' filter hook will allow you to 
    * add/remove some of these options from a child theme
    */
    return apply_filters('encrypted_lite_options_array', $options);

}
