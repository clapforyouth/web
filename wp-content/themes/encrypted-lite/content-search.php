<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Encrypted Lite
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        	<?php 
            $encrypted_et_to = encrypted_lite_get_options_values();
			if($encrypted_et_to['enable_feature_image'] == 1)
				{
					if(has_post_thumbnail())
				        {
				            $encrypted_image_id = get_post_thumbnail_id();
				            $encrypted_image_url = wp_get_attachment_image_src($encrypted_image_id,'encrypted-lite-blog-image',true);
				            $encrypted_image_alt = get_post_meta($encrypted_image_id, '_wp_attachment_image_alt', true);
				            ?>
							<div class="entry-meta">
					            <div class="blog-wrap clearfix">
					                <div class="blog-img ">
					                    <a href="<?php the_permalink()?>"><img src="<?php echo $encrypted_image_url[0] ?>" alt="<?php the_title(); ?>"/></a>
					                </div>
					            </div>
                                <?php if ( 'post' == get_post_type() ) : ?>
                                <?php encrypted_lite_posted_on(); ?>
                                <?php endif; ?>
				            </div>
					
				            <?php 
				        }
				}
				?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php encrypted_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->