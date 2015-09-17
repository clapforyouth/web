<?php
/*
*	This is the custom function 
*	@package EncryptedLite
*
*/

function encrypted_slider_cb(){
    $encrypted_et_to = encrypted_lite_get_options_values();
        $encrypted_show_slider = $encrypted_et_to['enable_slider'] ;
		$encrypted_show_pager = (!$encrypted_et_to['show_pager'] || $encrypted_et_to['show_pager'] == "yes") ? "true" : "false";
		$encrypted_show_controls = (!$encrypted_et_to['show_controls'] || $encrypted_et_to['show_controls'] == "yes") ? "true" : "false";
		$encrypted_auto_transition = (!$encrypted_et_to['slider_auto_transition']|| $encrypted_et_to['slider_auto_transition'] == "yes") ? "true" : "false";
		$encrypted_slider_transition = (!$encrypted_et_to['slider_transition']) ? "fade" : $encrypted_et_to['slider_transition'];
        /**
         * 
         * @since 1.0.3
         * @param Added Condition to remove bug of slider transition also fixed slider auto transition.
         * @since1.0.5
         * @param Enable Disable Slider and Show hide Slider Caption
         */
        $encrypted_slider_transition1 = $encrypted_slider_transition;
        if($encrypted_slider_transition == 'slide horizontal'){
            $encrypted_slider_transition1 = 'horizontal';
        }
        elseif($encrypted_slider_transition == 'slide vertical'){
            $encrypted_slider_transition1 = 'vertical';
        }
        $encrypted_slider_speed = (!$encrypted_et_to['slider_speed']) ? "5000" : $encrypted_et_to['slider_speed'];
		$encrypted_slider_pause = (!$encrypted_et_to['slider_pause']) ? "5000" : $encrypted_et_to['slider_pause'];
		$encrypted_show_caption = $encrypted_et_to['show_slider_caption'] ;
        $encrypted_slider_cat = $encrypted_et_to['category_as_slider'];
        $encrypted_slider_read_more = $encrypted_et_to['slider_button_text'];
        
	if($encrypted_show_slider == 1):
    ?>
		<script type="text/javascript">
		jQuery(document).ready(function($){
			$('.el-slider .bxslider').bxSlider({
				   	pager: <?php echo esc_attr($encrypted_show_pager) ?>,
					controls: <?php echo esc_attr($encrypted_show_controls) ?>,
					mode: '<?php echo esc_attr($encrypted_slider_transition1) ?>',
					auto : <?php echo esc_attr($encrypted_auto_transition) ?>,
					pause: '<?php echo esc_attr($encrypted_slider_pause) ?>',
					speed: '<?php echo esc_attr($encrypted_slider_speed) ?>'

			});
		});
		</script>
		<section class="el-slider" id="main-slider">
            <div class="bxslider">
			<?php
				$encrypted_slider_cat	=	$encrypted_slider_cat;
                $encrypted_slider_content_char = $encrypted_et_to['slider_content_text'];
				$encrypted_slider_args	=	array('cat'=>$encrypted_slider_cat, 'posts_per_page'=>-1, 'post_status'=>'publish');
				$encrypted_slider_query	=	new WP_Query($encrypted_slider_args);
				if($encrypted_slider_query->have_posts() && !empty($encrypted_slider_cat)):
					while ($encrypted_slider_query->have_posts()):$encrypted_slider_query->the_post();
						$encrypted_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', true)
						
						?>
							<div class="slide">
                            	<img src="<?php echo $encrypted_image[0]; ?>" alt="<?php the_title(); ?>">
                            	<?php if($encrypted_show_caption == 'show'): ?>
                                <div class="caption-wrapper">  
                				<div class="el-container">
                					<div class="slider-caption">
                						<div class="mid-content">
                                            <div class="slider-caption-wrap">
                    							<h1 class="caption-title"><?php the_title() ?> </h1>
                                                <div class="caption-description">
                                                    <?php 
                                                    if(!empty($encrypted_slider_content_char)) :
                                                        echo encrypted_lite_excerpt(get_the_content(), $encrypted_slider_content_char); 
                                                    else:
                                                        the_content();
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                            <?php 
                                                    if(!empty($encrypted_slider_content_char)):?>
                    							<div class="slider-button"><a href="<?php the_permalink(); ?>" class="slider-btn"><?php echo esc_attr($encrypted_slider_read_more); ?></a></div>
                                                <?php endif;?>
                                        </div>
                					</div>
                				</div>
                				</div>
                                <?php endif; ?>
							</div>
						<?php
							
					endwhile;
                else:
                    ?>
                <div class="slide" style="float: none; list-style: none; position: absolute; width: 1263px; z-index: 50; display: block;">
                    <img src="<?php echo get_template_directory_uri().'/images/slider-bg.jpg' ?>" alt="The full Functional">
                             <div class="caption-wrapper">  
                				<div class="el-container">
                					<div class="slider-caption">
                						<div class="mid-content">
                                            <div class="slider-caption-wrap">
                    							<h1 class="caption-title"><?php _e('The full Functional', 'encrypted-lite');?> </h1>
                                                <div class="caption-description">
                                                    <?php _e('Encrypted Lite is full functional theme', 'encrypted-lite');?>                                              </div>
                                            </div>
                                            <div class="slider-button"><a href="<?php echo esc_url('http://codetrendy.com/theme/encrypted-lite'); ?>" class="slider-btn">Details</a></div>
                                        </div>
                					</div>
                				`</div>
                				</div>
                    </div>        
                    <?php
				endif;				
			?>
				
			</div>
		</section>
	<?php
    endif;
}
add_action('encrypted_slider', 'encrypted_slider_cb');

function encrypted_footer_count(){
	$encrypted_count = 0;
	if(is_active_sidebar('footer-1'))
	$encrypted_count++;

	if(is_active_sidebar('footer-2'))
	$encrypted_count++;

	if(is_active_sidebar('footer-3'))
	$encrypted_count++;

	if(is_active_sidebar('footer-4'))
	$encrypted_count++;

	return $encrypted_count;
}

function encrypted_lite_social_cb(){
    $encrypted_et_to = encrypted_lite_get_options_values();
	$encrypted_facebooklink = $encrypted_et_to['facebook'];
	$encrypted_twitterlink = $encrypted_et_to['twitter'];
	$encrypted_google_pluslink = $encrypted_et_to['google_plus'];
	$encrypted_youtubelink = $encrypted_et_to['youtube'];
	$encrypted_pinterestlink = $encrypted_et_to['pinterest'];
	$encrypted_linkedinlink = $encrypted_et_to['linkedin'];
	$encrypted_flickrlink = $encrypted_et_to['flicker'];
	$encrypted_vimeolink = $encrypted_et_to['vimeo'];
	$encrypted_instagramlink = $encrypted_et_to['instagram'];
	$encrypted_tumblrlink = $encrypted_et_to['tumbler'];
	$encrypted_rsslink = $encrypted_et_to['rss'];
	$encrypted_githublink = $encrypted_et_to['github'];
	$encrypted_stumbleuponlink = $encrypted_et_to['stumbleupon'];
	$encrypted_skypelink = $encrypted_et_to['skype'];
    ?>
	<div class="social-icons ">
		<?php if(!empty($encrypted_facebooklink)){ ?>
		<a href="<?php echo esc_url($encrypted_facebooklink); ?>" class="facebook" data-title="Facebook" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_twitterlink)){ ?>
		<a href="<?php echo esc_url($encrypted_twitterlink); ?>" class="twitter" data-title="Twitter" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_google_pluslink)){ ?>
		<a href="<?php echo esc_url($encrypted_google_pluslink); ?>" class="gplus" data-title="Google Plus" target="_blank"><i class="fa fa-google-plus"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_youtubelink)){ ?>
		<a href="<?php echo esc_url($encrypted_youtubelink); ?>" class="youtube" data-title="Youtube" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_pinterestlink)){ ?>
		<a href="<?php echo esc_url($encrypted_pinterestlink); ?>" class="pinterest" data-title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_linkedinlink)){ ?>
		<a href="<?php echo esc_url($encrypted_linkedinlink); ?>" class="linkedin" data-title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_flickrlink)){ ?>
		<a href="<?php echo esc_url($encrypted_flickrlink); ?>" class="flickr" data-title="Flickr" target="_blank"><i class="fa fa-flickr"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_vimeolink)){ ?>
		<a href="<?php echo esc_url($encrypted_vimeolink); ?>" class="vimeo" data-title="Vimeo" target="_blank"><i class="fa fa-vimeo-square"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_instagramlink)){ ?>
		<a href="<?php echo esc_url($encrypted_instagramlink); ?>" class="instagram" data-title="instagram" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_tumblrlink)){ ?>
		<a href="<?php echo esc_url($encrypted_tumblrlink); ?>" class="tumblr" data-title="tumblr" target="_blank"><i class="fa fa-tumblr"></i><span></span></a>
		<?php } ?>
		
		<?php if(!empty($encrypted_rsslink)){ ?>
		<a href="<?php echo esc_url($encrypted_rsslink); ?>" class="rss" data-title="rss" target="_blank"><i class="fa fa-rss"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_githublink)){ ?>
		<a href="<?php echo esc_url($encrypted_githublink); ?>" class="github" data-title="github" target="_blank"><i class="fa fa-github"></i><span></span></a>
		<?php } ?>

		<?php if(!empty($encrypted_stumbleuponlink)){ ?>
		<a href="<?php echo esc_url($encrypted_stumbleuponlink); ?>" class="stumbleupon" data-title="stumbleupon" target="_blank"><i class="fa fa-stumbleupon"></i><span></span></a>
		<?php } ?>
		
		<?php if(!empty($encrypted_skypelink)){ ?>
		<a href="<?php echo "skype:".esc_attr($encrypted_skypelink) ?>" class="skype" data-title="Skype"><i class="fa fa-skype"></i><span></span></a>
		<?php } ?>
    </div>
<?php
}
add_action('encrypted_lite_social','encrypted_lite_social_cb', 10);

function encrypted_lite_excerpt( $encrypted_lite_content , $encrypted_lite_letter_count){
		$encrypted_lite_letter_count = !empty($encrypted_lite_letter_count) ? $encrypted_lite_letter_count : 100 ;
		$encrypted_lite_striped_content = strip_tags($encrypted_lite_content);
		$encrypted_lite_excerpt = mb_substr($encrypted_lite_striped_content, 0 , $encrypted_lite_letter_count);
		if(strlen($encrypted_lite_striped_content) > strlen($encrypted_lite_excerpt)){
			$encrypted_lite_excerpt.= "..";
		}
		return $encrypted_lite_excerpt;
	}
 

function encrypted_lite_web_layout($encrypted_classes){
    $encrypted_et_to = encrypted_lite_get_options_values();
    //echo $encrypted_et_to['page_layout'];
    if($encrypted_et_to['page_layout'] == 'boxed'){
        $encrypted_classes[]= 'boxed-layout';
    }
    elseif($encrypted_et_to['page_layout'] == 'fullwidth'){
        $encrypted_classes[]='fullwidth';
    }   
    return $encrypted_classes;
}
add_filter( 'body_class', 'encrypted_lite_web_layout' );

function encrypted_lite_sidebar_layout($encrypted_classes){
    global $post;
        if( is_404()){
		$encrypted_classes[] = ' ';
		}elseif(is_singular()){
	    $encrypted_post_class = get_post_meta( $post -> ID, 'encrypted_lite_sidebar_layout', true );
	    if(empty($encrypted_post_class)){
        $encrypted_post_class = 'right-sidebar';
        $encrypted_classes[] = $encrypted_post_class;}
        else{
        $encrypted_post_class = get_post_meta( $post -> ID, 'encrypted_lite_sidebar_layout', true );
        $encrypted_classes[] = $encrypted_post_class;}
		}else{
		$encrypted_classes[] = 'right-sidebar';	
		}
        return $encrypted_classes;
   }
add_filter('body_class', 'encrypted_lite_sidebar_layout');

function encrypted_lite_custom_css(){
    $encrypted_et_to = encrypted_lite_get_options_values();
    echo "<style>";
        echo $encrypted_et_to['custom_css'];
    echo "</style>";
}
add_filter('wp_head', 'encrypted_lite_custom_css');