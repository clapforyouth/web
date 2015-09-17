<?php
/**
 * @package CodeTrendy
 * @subpackage Encrypted Lite
 * @name Search From
 *  
 */
 $encrypted_et_to = encrypted_lite_get_options_values();
 $encrypted_search_placeholder = $encrypted_et_to['search_placeholder_text'];
 
?>
<form action="<?php echo home_url( '/' )?>" class="search-form" method="get" role="search">
	<label>
		<span class="screen-reader-text"><?php _e('Search for:', 'encrypted-lite'); ?></span>
		<input class="search-text" type="search" title="<?php _e('Search for:', 'encrypted-lite')?>" name="s" value="<?php echo esc_attr($encrypted_search_placeholder); ?>" placeholder="<?php echo esc_attr($encrypted_search_placeholder); ?>" class="search-field">
	</label>
	<input type="submit" value="<?php _e('Search', 'encrypted-lite'); ?>" class="search-submit">
</form>