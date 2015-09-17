<?php
/**
 * @package Encrypted Lite
 */
?>
<?php
$et_to =  encrypted_lite_get_options_values();
    $blog_cat = $et_to['select_blog_category'];
    $client_cat = $et_to['select_client_category'];
    $testimonial_cat =$et_to['select_testimonial_category'];
    $portfolio_cat = $et_to['select_portfolio_category'];
    $team_cat = $et_to['select_team_member_category'];
    if(is_category() && is_category($portfolio_cat) && !empty($portfolio_cat)){
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'encrypted-lite-port-home'); ?>
         <figure class="effect-sarah">
                <?php if (has_post_thumbnail()):
                ?>
                <img src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>" />
                <?php
                 endif;?>
                <figcaption>
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo encrypted_lite_excerpt(get_the_content(), '160', true); ?></p>
                    <a href="<?php the_permalink() ?>"> </a>
                </figcaption>
            </figure>
            
     <?php
    }
elseif(is_category() && is_category($client_cat) && !empty($client_cat)){
    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'encrypted-lite-port-home'); ?>
    <div class="client-wrap clearfix">
        <div class="client-img ">
            <a href="<?php the_permalink()?>"><img src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>"/></a>
        </div>
    </div>
    <?php
}

elseif(is_category() && is_category($testimonial_cat) && !empty($testimonial_cat)){
    ?><div class="testimonial-wrap testimonial-archive">
    <?php 
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false );
             ?>
            <div class="testimonial-main-wrap">
                <div class="team-content"><?php echo encrypted_lite_excerpt(get_the_content(), '250', true); ?></div>
                <div class="tm-img">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /></a>
                </div>
                <div class="team-title"><?php the_title(); ?></div>
            </div>
        </div>
    <?php
}

else{
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : 
        if(has_post_thumbnail()):
        ?>
        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'encrypted-lite-blog-image'); ?>
		<div class="entry-meta">
            <div class="blog-wrap clearfix">
                <div class="blog-img ">
                    <a href="<?php the_permalink()?>"><img src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>"/></a>
                </div>
            </div>
			<?php encrypted_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif;
        endif;
         ?>
	</header><!-- .entry-header -->
    
	<div class="entry-content">
        
        
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'encrypted-lite' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'encrypted-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php encrypted_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<?php } ?>