<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package AccessPress Staple
 */

global $post;
$encrypted_post_id= "";
if(is_front_page()){
	$encrypted_post_id = get_option('page_on_front');
}
elseif(is_search()){
    $encrypted_post_id= "";
}
else{

	$encrypted_post_id = $post->ID;
}
$encrypted_post_class = get_post_meta( $encrypted_post_id, 'encrypted_lite_sidebar_layout', true );
if($encrypted_post_class=='right-sidebar' || $encrypted_post_class=='both-sidebar' || empty($encrypted_post_class)){
    ?>
    <div id="secondary-right" class="widget-area right-sidebar sidebar">
        <?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
		<?php endif; ?>
    </div>
    <?php    
}    
?>