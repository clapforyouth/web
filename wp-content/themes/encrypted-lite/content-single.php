<?php
/**
 * @package Encrypted Lite
 * 
 * @since 1.0.1
 * @edited in 1.0.0
 */


$encrypted_et_to = encrypted_lite_get_options_values();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
			<?php 
			if($encrypted_et_to['enable_feature_image'] == 1)
				{
					if(has_post_thumbnail())
				        {
				            $encrypted_image_id = get_post_thumbnail_id();
				            $encrypted_image_url = wp_get_attachment_image_src($encrypted_image_id,'encrypted-lite-blog-image',true);
				            $encrypted_image_alt = get_post_meta($encrypted_image_id, '_wp_attachment_image_alt', true);
                            ?><div class="entry-meta"><?php
                            if(!empty($encrypted_image_url[0])):
				            ?>
							
					            <div class="blog-wrap clearfix">
					                <div class="blog-img ">
					                    <a href="<?php the_permalink()?>"><img src="<?php echo $encrypted_image_url[0] ?>" alt="<?php the_title(); ?>"/></a>
					                </div>
					            </div>
                                <?php 
                            endif;
                            if($encrypted_et_to['enable_posted_date_in_post']==1):
                                encrypted_lite_posted_on(); 
                            endif;    
                                ?>
				            </div>
					
				            <?php 
				        }
				}
				?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'encrypted-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
   <?php if($encrypted_et_to['enable_tags_category']==1):?>
	<footer class="entry-footer">
		<?php encrypted_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-## -->