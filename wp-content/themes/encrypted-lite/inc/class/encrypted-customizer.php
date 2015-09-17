<?php

/**
 * Theme Customizer Boilerplate
 *
 * @package		Theme_Customizer_Boilerplate
 * @copyright	Copyright (c) 2012, Slobodan Manic
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 * @author		Slobodan Manic
 *
 * @since		Theme_Customizer_Boilerplate 1.0
 *
 * License:
 *	
 * Copyright 2013 Slobodan Manic (slobodan.manic@gmail.com)
 *	
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License, version 2, as 
 * published by the Free Software Foundation.
 *	
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *	
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */

global $encrypted_lite_allowedposttags;

add_filter( 'wp_kses_allowed_html', 'encrypted_esw_author_cap_filter',1,1 );

function encrypted_esw_author_cap_filter( $encrypted_lite_allowedposttags ) {

//Here put your conditions, depending your context

//if ( !current_user_can( 'publish_posts' ) )
//return $encrypted_lite_allowedposttags;

// Here add tags and attributes you want to allow

$encrypted_lite_allowedposttags['iframe']=array(

'align' => true,
'width' => true,
'height' => true,
'frameborder' => true,
'name' => true,
'src' => true,
'id' => true,
'class' => true,
'style' => true,
'scrolling' => true,
'marginwidth' => true,
'marginheight' => true,

);
return $encrypted_lite_allowedposttags;

}



/**
 * Arrays of options
 */	
require get_template_directory() . '/inc/class/encrypted-options.php';

/**
 * Helper functions
 */	
require get_template_directory() . '/inc/class/encrypted-helpers.php';

/**
 * Adds Customizer Sections, Settings and Controls
 *
 * - Require Custom Customizer Controls
 * - Add Customizer Sections
 *   -- Add Customizer Settings
 *   -- Add Customizer Controls
 *
 * @uses	thsp_get_theme_customizer_sections()	Defined in helpers.php
 * @uses	thsp_settings_page_capability()			Defined in helpers.php
 * @uses	thsp_get_theme_customizer_fields()		Defined in options.php
 *
 * @link	$wp_customize->add_section				http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_section
 * @link	$wp_customize->add_setting				http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_setting
 * @link	$wp_customize->add_control				http://codex.wordpress.org/Class_Reference/WP_Customize_Manager/add_control
 */
function encrypted_lite_customize_register( $wp_customize ) {
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('nav');

	/**
	 * Custom controls
	 */	
     $wp_customize->add_panel( 'general_settings_panel', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'General Options', 'encrypted-lite' ),
	    'description' => __( 'Edit General Settigns', 'encrypted-lite' ),
	) );
    
    $wp_customize->add_section( 'title_tagline', array(
         'title'          => __( 'Tagline and Title', 'encrypted-lite' ),
         'priority'       => 10,
         'panel'          => 'general_settings_panel', 
    ) );

    $wp_customize->add_section( 'background_image', array(
         'title'          => __( 'Background Image', 'encrypted-lite' ),
         'theme_supports' => 'custom-background',
         'priority'       => 10,
         'panel'          => 'general_settings_panel', 
    ) );
    
    $wp_customize->add_section( 'static_front_page', array(
     'title'          => __( 'Static Front Page', 'encrypted-lite' ),
      // 'theme_supports' => 'static-front-page',
      'priority'       => 120,
      'description'    => __( 'Your theme supports a static front page.', 'encrypted-lite' ),
      'panel'          => 'general_settings_panel',
    ) );



     $wp_customize->add_panel( 'header_settings_panel', array(
	    'priority' => 11,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Header Setting', 'encrypted-lite' ),
	    'description' => __( 'Edit Header Settigns', 'encrypted-lite' ),
	) );

    
    $wp_customize->add_panel( 'slider_settings_panel', array(
	    'priority' => 13,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Slider Settings', 'encrypted-lite' ),
	    'description' => __( 'Edit Slider Settigns', 'encrypted-lite' ),
	) );


	$wp_customize->add_panel( 'home_page_settings_panel', array(
	    'priority' => 14,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home Page Settings', 'encrypted-lite' ),
	    'description' => __( 'You have to create new page, and assing it with the template home and then You have to show that page as Front Page in Customizer > General Option > Static Front Page', 'encrypted-lite' ),
	) );

	$wp_customize->add_panel( 'single_page_post_section_settings_panel', array(
	    'priority' => 15,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Single Page Post Settings', 'encrypted-lite' ),
	    'description' => __( 'Edit Single Page Post Settings', 'encrypted-lite' ),
	) );

	$wp_customize->add_panel( 'social_media_settings_panel', array(
	    'priority' => 17,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Social Media Settings', 'encrypted-lite' ),
	    'description' => __( 'Edit Social Media Settings', 'encrypted-lite' ),
	) );

	

    
	require get_template_directory() . '/inc/class/encrypted-custom-controls.php';



	/*
	 * Get all the fields using a helper function
	 */
	$encrypted_sections = encrypted_lite_get_fields();


	/*
	 * Get name of DB entry under which options will be stored
	 */
	$encrypted_lite_option = encrypted_lite_option();


	/**
	 * Loop through the array and add Customizer sections
	 */
	foreach( $encrypted_sections as $encrypted_section_key => $encrypted_section_value ) {
		
		/**
		 * Adds Customizer section, if needed
		 */
		if( ! $encrypted_section_value['existing_section'] ) {
			
			$encrypted_section_args = $encrypted_section_value['args'];
			
			// Add section
			$wp_customize->add_section(
				$encrypted_section_key,
				$encrypted_section_args
			);
			
		} // end if
		
		/*
		 * Loop through 'fields' array in each section
		 * and add settings and controls
		 */
		$encrypted_section_fields = $encrypted_section_value['fields'];
		foreach( $encrypted_section_fields as $encrypted_field_key => $encrypted_field_value ) {

			/*
			 * Check if 'option' or 'theme_mod' is used to store option
			 *
			 * If nothing is set, $wp_customize->add_setting method will default to 'theme_mod'
			 * If 'option' is used as setting type its value will be stored in an entry in
			 * {prefix}_options table. Option name is defined by encrypted_lite_option() function
			 */
			if ( isset( $encrypted_field_value['setting_args']['type'] ) && 'option' == $encrypted_field_value['setting_args']['type'] ) {
				$setting_control_id = $encrypted_lite_option . '[' . $encrypted_field_key . ']';
			} else {
				$setting_control_id = $encrypted_field_key;
			}
			
			/*
			 * Add default callback function, if none is defined
			 */
			if ( ! isset( $encrypted_field_value['setting_args']['sanitize_callback'] ) ) {
				$encrypted_field_value['setting_args']['sanitize_callback'] = 'encrypted_lite_sanitize_cb'; 
			}
			
			
			/**
			 * Adds Customizer settings
			 */
			$wp_customize->add_setting(
				$setting_control_id,
				 $encrypted_field_value['setting_args'],
                 array('sanitize_callback'=>$encrypted_field_value['setting_args']['sanitize_callback'])
			);

			/**
			 * Adds Customizer control
			 *
			 * 'section' value must be added to 'control_args' array
			 * so control can get added to current section
			 */
			$encrypted_field_value['control_args']['section'] = $encrypted_section_key;
			
			/*
			 * $wp_customize->add_control method requires 'choices' to be a simple key => value pair
			 */
			if ( isset( $encrypted_field_value['control_args']['choices'] ) ) {
				$encrypted_lite_choices = array();
				foreach( $encrypted_field_value['control_args']['choices'] as $encrypted_lite_choice_key => $encrypted_lite_choice_value ) {
					$encrypted_lite_choices[$encrypted_lite_choice_key] = $encrypted_lite_choice_value['label'];
				}
				$encrypted_field_value['control_args']['choices'] = $encrypted_lite_choices;		
			}
			
			
			// Check 
			if ( 'color' == $encrypted_field_value['control_args']['type'] ) {
				$wp_customize->add_control(
					new WP_Customize_Color_Control(
						$wp_customize,
						$setting_control_id,
						$encrypted_field_value['control_args']
					)
				);
			} elseif ( 'image' == $encrypted_field_value['control_args']['type'] ) { 
				$wp_customize->add_control(
					new WP_Customize_Image_Control(
						$wp_customize,
						$setting_control_id,
						$encrypted_field_value['control_args']
					)
				);
			} elseif ( 'upload' == $encrypted_field_value['control_args']['type'] ) { 
				$wp_customize->add_control(
					new WP_Customize_Upload_Control(
						$wp_customize,
						$setting_control_id,
						$encrypted_field_value['control_args']
					)
				);
			} elseif ( 'number' == $encrypted_field_value['control_args']['type'] ) { 
				$wp_customize->add_control(
					new ELT_Customizer_Number_Control(
						$wp_customize,
						$setting_control_id,
						$encrypted_field_value['control_args']
					)
				);
			} elseif ( 'switch' == $encrypted_field_value['control_args']['type'] ) { 
				$wp_customize->add_control(
					new ELT_Customizer_Switch_Control(
						$wp_customize,
						$setting_control_id,
						$encrypted_field_value['control_args']
					)
				);
            }elseif ( 'images_radio' == $encrypted_field_value['control_args']['type'] ) {
				$wp_customize->add_control(
					new ELT_Customizer_Images_Radio_Control(
						$wp_customize,
						$setting_control_id,
						$encrypted_field_value['control_args']
					)
				);
			}elseif ( 'encrypted-lite-important-links' == $encrypted_field_value['control_args']['type'] ) {
				$wp_customize->add_control(
					new ELT_Important_Links(
						$wp_customize,
						$setting_control_id,
						$encrypted_field_value['control_args']
					)
				);
			}
			
			 else {
				$wp_customize->add_control(
					$setting_control_id,
					$encrypted_field_value['control_args']
				);
			}
				
		} // end foreach
		
	} // end foreach
	
	
	// Remove built-in Customizer sections
	$encrypted_lite_remove_sections = apply_filters( 'tshp_cbp_remove_sections', array() );
	if ( is_array( $encrypted_lite_remove_sections) ) {
		foreach( $encrypted_lite_remove_sections as $encrypted_lite_remove_section ) {
			$wp_customize->remove_section( $encrypted_lite_remove_section );
		}
	}

	// Remove built-in Customizer settings
	$encrypted_lite_remove_settings = apply_filters( 'tshp_cbp_remove_settings', array() );
	if ( is_array( $encrypted_lite_remove_settings) ) {
		foreach( $encrypted_lite_remove_settings as $encrypted_lite_remove_setting ) {
			$wp_customize->remove_setting( $encrypted_lite_remove_setting );
		}
	}	

	// Remove built-in Customizer controls
	$encrypted_lite_remove_controls = apply_filters( 'tshp_cbp_remove_controls', array() );
	if ( is_array( $encrypted_lite_remove_controls) ) {
		foreach( $encrypted_lite_remove_controls as $encrypted_lite_remove_control ) {
			$wp_customize->remove_control( $encrypted_lite_remove_control );
		}
	}	

}


/**
 * Theme Customizer sanitization callback function
 */
function encrypted_lite_sanitize_cb( $input ) {
	
	return wp_kses_post( $input );
	
}


function encrypted_lite_enable_disable_switch( $input ) {
	if ( $input == 1 || $input == 0) {
         return $input;
      } else {
         return '';
      }
}

function encrypted_lite_site_layout_sanitize($input) {
      $valid_keys = array(
         'fullwidth' => __('Fullwidth', 'encrypted-lite'),
         'boxed' => __('Boxed', 'encrypted-lite')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }

function encrypted_lite_esc_raw_url($input)
{
	return esc_url_raw($input);
}

function encrypted_lite_text_field($input)
{
	return sanitize_text_field($input);
}

function encrypted_lite_radio_yes_no($input)
{
	$valid_keys = array(
         'yes' => __('Yes', 'encrypted-lite'),
         'no' => __('No', 'encrypted-lite')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
}

function encrypted_lite_slider_transition($input)
{
	$valid_keys = array(
         'fade' => __('Fade', 'encrypted-lite'),
         'slide horizontal' => __('Slide Horizontal', 'encrypted-lite'),
         'slide vertical' => __('Slide Vertical', 'encrypted-lite')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      } 
}

function encrypted_lite_slider_caption($input)
{
	$valid_keys = array(
				'show' => __('Show', 'encrypted-lite'),
				'hide' => __('Hide', 'encrypted-lite')
		);

	if(array_key_exists($input, $valid_keys))
	{
		return $input;
	}
	else
	{
		return '';
	}
}

function encrypted_lite_sanitize_textarea( $input ) {
	global $encrypted_lite_allowedposttags;
	$output = wp_kses( $input, $encrypted_lite_allowedposttags);
	return $output;
}
add_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );

function encrypted_lite_sanitize_googlemaps($input)
{
	global $encrypted_lite_allowedposttags;
	$encrypted_lite_allowedposttags_iframe = encrypted_esw_author_cap_filter($encrypted_lite_allowedposttags);
		
	$output = wp_kses( $input, $encrypted_lite_allowedposttags_iframe);
	return $output;
	//return wp_kses_stripslashes( $input );

	//return preg_replace('%\\\\"%', '"', $test);
	//return $input;
	//print_r(wp_kses_stripslashes($input));
	//echo $input; die();
}

function encrypted_lite_links_sanitize() {
      return '';
   }

add_action( 'customize_register', 'encrypted_lite_customize_register', 11 );


