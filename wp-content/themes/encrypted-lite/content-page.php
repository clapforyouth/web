<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Encrypted Lite
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
				            $encrypted_image_url = wp_get_attachment_image_src($encrypted_image_id,'full',true);
				            $encrypted_image_alt = get_post_meta($encrypted_image_id, '_wp_attachment_image_alt', true);
				            ?>
							<div class="entry-meta">
					            <div class="blog-wrap clearfix">
					                <div class="blog-img ">
					                    <a href="<?php the_permalink()?>"><img src="<?php echo $encrypted_image_url[0] ?>" alt="<?php the_title(); ?>"/></a>
					                </div>
					            </div>
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

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'encrypted-lite' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->