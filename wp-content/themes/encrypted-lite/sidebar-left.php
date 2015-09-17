<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package CodeTrendy
 * @subpackage Encrypted
 */

if(is_front_page()){
	$encrypted_post_id = get_option('page_on_front');
}else{
	$encrypted_post_id = $post->ID;
}
$encrypted_post_class = get_post_meta( $encrypted_post_id, 'encrypted_lite_sidebar_layout', true );
if($encrypted_post_class=='left-sidebar' || $encrypted_post_class=='both-sidebar'){
    ?>
    <div id="secondary-left" class="widget-area left-sidebar sidebar">
        <?php if ( is_active_sidebar( 'left-sidebar') ) : ?>
			<?php dynamic_sidebar( 'left-sidebar' ); ?>
		<?php endif; ?>
    </div>
    <?php    
}
?>
