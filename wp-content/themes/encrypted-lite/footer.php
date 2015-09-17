<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Encrypted Lite
 */
?>

	</div><!-- #content -->
    <footer id="colophon" class="site-footer" role="contentinfo">
    
     <?php
     $encrypted_et_to = encrypted_lite_get_options_values();
		if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' )  || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' )) : ?>
		<div class="top-footer footer-column-<?php echo encrypted_footer_count(); ?>">
		<div class="el-container">
			<div class="footer-block-1 footer-block">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer-block-2 footer-block">
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer-block-3 footer-block">
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				<?php endif; ?>	
			</div>

			<div class="footer-block-4 footer-block">
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
					<?php dynamic_sidebar( 'footer-4' ); ?>
                     <?php endif; ?>
            </div>
            </div>
            </div>
            <?php endif; ?>
       	<div class="site-info">
			<div id="bottom-footer">
		<div class="el-container">
			<div class="copyright">
				Copyright &copy; <?php echo date('Y') ?> 
				<a href="<?php echo home_url(); ?>">
				<?php
                $copyright = $encrypted_et_to['copyright_footer'];
                 if(!empty($copyright)){
					echo $copyright; 
					}else{
						echo bloginfo('name');
					} ?>
				</a>
                |
                <?php  _e('WordPress Theme by ', 'encrypted-lite')?><a target="_blank" href="<?php echo esc_url('http://codetrendy.com');?>"><?php _e('CodeTrendy', 'encrypted-lite') ?></a>
                
			</div>
            <?php 
            $encrypted_ed_footer_social = $encrypted_et_to['enable_disable_social_links_footer'];
            if($encrypted_ed_footer_social == 1): ?>
            <div class="footer-social">
            <?php  do_action('encrypted_lite_social'); ?>
            </div>
            <?php endif; ?>
        </div>
		</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<div id="el-top"><i class="fa fa-angle-up"></i><?php _e('Top', 'encrypted-lite'); ?></div>
<?php wp_footer(); ?>

</body>
</html>