<?php


/**
 * Customizer Directory
 *
 * @return	string	The directory in which Customizer Boilerplate is located, no trailing slash
 */
//function encrypted_lite_directory_uri() {
//
//	$encrypted_lite_directory_uri = get_template_directory_uri() . '/customizer-boilerplate';
//	
//	return apply_filters( 'encrypted_lite_directory_uri', $encrypted_lite_directory_uri );
//
//}


/**
 * Capability Required to Save Theme Options
 *
 * @return	string	The capability to actually use
 */
function encrypted_lite_capability() {

	return apply_filters( 'theme_mods_encrypted_lite', 'edit_theme_options' );

}


/**
 * Dashboard menu link text
 *
 * Hook into this to make the text translatable, for example you could
 * return this
 * __( 'Theme Customizer', 'encrypted-lite' )
 *
 * @return	string	Menu link text
 */
function encrypted_lite_menu_link_text() {

	return apply_filters( 'encrypted_lite_menu_link_text', __( 'Theme Customizer', 'encrypted-lite' ));

}


/**
 * Name of DB entry under which options are stored if 'type' => 'option'
 * is used for Theme Customizer settings
 *
 * @return	string	DB entry
 */
function encrypted_lite_option() {

	return apply_filters( 'encrypted_lite_option', 'encrypted_lite_theme_options' );

}


/**
 * Get Option Values
 * 
 * Array that holds all of the options values
 * Option's default value is used if user hasn't specified a value
 *
 * @uses	thsp_get_theme_customizer_defaults()	defined in /customizer/options.php
 * @return	array									Current values for all options
 * @since	Theme_Customizer_Boilerplate 1.0
 */
function encrypted_lite_get_options_values() {

	// Get the option defaults
	$encrypted_option_defaults = encrypted_lite_get_options_defaults();
	
	// Parse the stored options with the defaults
	$encrypted_lite_options = wp_parse_args( get_option( encrypted_lite_option(), array() ), $encrypted_option_defaults );
    
	// Return the parsed array
	return $encrypted_lite_options;
	
}


/**
 * Get Option Defaults
 * 
 * Returns an array that holds default values for all options
 * 
 * @uses	thsp_get_theme_customizer_fields()	defined in /customizer/options.php
 * @return	array	$encrypted_option_defaults		Default values for all options
 * @since	Theme_Customizer_Boilerplate 1.0
 */
function encrypted_lite_get_options_defaults() {

	// Get the array that holds all theme option fields
	$encrypted_sections = encrypted_lite_get_fields();
	
	// Initialize the array to hold the default values for all theme options
	$encrypted_option_defaults = array();
	
	// Loop through the option parameters array
	foreach ( $encrypted_sections as $encrypted_section ) {
	
		$encrypted_section_fields = $encrypted_section['fields'];
		
		foreach ( $encrypted_section_fields as $encrypted_field_key => $encrypted_field_value ) {

			// Add an associative array key to the defaults array for each option in the parameters array
			if( isset( $encrypted_field_value['setting_args']['default'] ) ) {
				$encrypted_option_defaults[$encrypted_field_key] = $encrypted_field_value['setting_args']['default'];
			} else {
				$encrypted_option_defaults[$encrypted_field_key] = false;
			}
			
		}
		
	}
	
	// Return the defaults array
	return $encrypted_option_defaults;
	
}