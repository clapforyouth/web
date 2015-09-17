<?php
add_action('add_meta_boxes', 'encrypted_lite_add_sidebar_layout_box');
function encrypted_lite_add_sidebar_layout_box()
{
    
    add_meta_box(
                 'encrypted_lite_sidebar_layout', // $id
                 'Sidebar Layout', // $title
                 'encrypted_lite_sidebar_layout_callback', // $callback
                 'page', // $page
                 'normal', // $context
                 'high'); // $priority
                 
}
$encrypted_lite_sidebar_layout = array(
        'left-sidebar' => array(
                        'value'     => 'left-sidebar',
                        'label'     => __( 'Left sidebar', 'encrypted-lite' ),
                        'thumbnail' => get_template_directory_uri() . '/images/left-sidebar.png'
                    ), 
        'right-sidebar' => array(
                        'value' => 'right-sidebar',
                        'label' => __( 'Right sidebar<br/>(default)', 'encrypted-lite' ),
                        'thumbnail' => get_template_directory_uri() . '/images/right-sidebar.png'
                    ),
        'both-sidebar' => array(
                        'value'     => 'both-sidebar',
                        'label'     => __( 'Both Sidebar', 'encrypted-lite' ),
                        'thumbnail' => get_template_directory_uri() . '/images/both-sidebar.png'
                    ),
       
        'no-sidebar' => array(
                        'value'     => 'no-sidebar',
                        'label'     => __( 'No sidebar', 'encrypted-lite' ),
                        'thumbnail' => get_template_directory_uri() . '/images/no-sidebar.png'
                    )   
                    
                        

    );
    

function encrypted_lite_sidebar_layout_callback()
{ 
global $post , $encrypted_lite_sidebar_layout;
wp_nonce_field( basename( __FILE__ ), 'encrypted_lite_sidebar_layout_nonce' ); 
?>

<table class="form-table">
<tr>
<td colspan="4"><em class="f13"><?php _e('Choose Sidebar Template', 'encrypted-lite')?></em></td>
</tr>

<tr>
<td>
<?php  
   foreach ($encrypted_lite_sidebar_layout as $field) {  
                $encrypted_lite_sidebar_metalayout = get_post_meta( $post->ID, 'encrypted_lite_sidebar_layout', true ); ?>

                <div class="radio-image-wrapper" style="float:left; margin-right:30px;">
                <label class="description">
                <span><img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" /></span></br>
                <input type="radio" name="encrypted_lite_sidebar_layout" value="<?php echo esc_attr($field['value']); ?>" <?php checked( $field['value'], $encrypted_lite_sidebar_metalayout ); if(empty($encrypted_lite_sidebar_metalayout) && $field['value']=='right-sidebar'){ checked('right-sidebar','right-sidebar'); } ?>/>&nbsp;<?php echo $field['label']; ?>
                </label>
                </div>
                <?php } // end foreach 
                ?>
                <div class="clear"></div>
</td>
</tr>
<tr>
    <td><em class="f13"><?php printf( __('You can set up the sidebar content %1$s', 'encrypted-lite'), '<a href="'. admin_url('/widgets.php') .'" target="_blank">'. __('Here', 'encrypted-lite') .'</a>' ) ?> </em></td>
</tr>
</table>

<?php } 

/**
 * save the custom metabox data
 * @hooked to save_post hook
 */
function encrypted_lite_save_sidebar_layout( $post_id ) { 
    global $encrypted_lite_sidebar_layout, $post; 

    // Verify the nonce before proceeding.
    if ( !isset( $_POST[ 'encrypted_lite_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'encrypted_lite_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
        return;

    // Stop WP from clearing custom fields on autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)  
        return;
        
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can( 'edit_page', $post_id ) )  
            return $post_id;  
    } elseif (!current_user_can( 'edit_post', $post_id ) ) {  
            return $post_id;  
    }  
    

    foreach ($encrypted_lite_sidebar_layout as $field) {  
        //Execute this saving function
        $encrypted_old = get_post_meta( $post_id, 'encrypted_lite_sidebar_layout', true); 
        $encrypted_new = sanitize_text_field($_POST['encrypted_lite_sidebar_layout']);
        if ($encrypted_new && $encrypted_new != $old) {  
            update_post_meta($post_id, 'encrypted_lite_sidebar_layout', $encrypted_new);  
        } elseif ('' == $encrypted_new && $encrypted_old) {  
            delete_post_meta($post_id,'encrypted_lite_sidebar_layout', $encrypted_old);  
        } 
     } // end foreach   
     
}
add_action('save_post', 'encrypted_lite_save_sidebar_layout');