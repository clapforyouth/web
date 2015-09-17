<?php
/**
* @package CodeTrendy
* @subpackage Encrypted
* @title Main/ Home/ Front Page of Theme
* 
* Change Template form front-page.php to template-home.php to support latest post
* @since ver 1.0.0
* @version 1.0.0
* Template Name: Custom Home Page
*
*/
get_header();
?>

<?php

$encrypted_et_to = encrypted_lite_get_options_values();
$encrypted_ed_cta = $encrypted_et_to['call_to_action'];
if($encrypted_ed_cta==1):
?>
<section class="call-to-action white-bg">
    <div class="el-container">
        <div class="call-to-action-wrapper">
        <?php
        $encrypted_cta_page_id = $encrypted_et_to['call_to_action_post'];
        $encrypted_cta_char = $encrypted_et_to['enter_number_of_character_show_call_to_action'];
        $encrypted_cta_read_more = $encrypted_et_to['read_more_text'];
        if(!empty($encrypted_cta_page_id)):
        $encrypted_args_cta = array('page_id'=>$encrypted_cta_page_id, 'post_status'=>'publish');
        $encrypted_query_cta = new WP_Query($encrypted_args_cta);
        if($encrypted_query_cta->have_posts()):
            while($encrypted_query_cta->have_posts()): $encrypted_query_cta->the_post();
        ?>
            <div class="call-to-action-title wow bounceInLeft animated" data-wow-delay="0.5s"><?php the_title() ?></div>
            <div class="call-to-action-desc wow bounceInLeft animated" data-wow-delay="0.4s"><?php echo encrypted_lite_excerpt(get_the_content(), $encrypted_cta_char, true ); ?></div>
            <?php if(!empty($encrypted_cta_read_more)): ?>
            <div class="btn wow bounceInRight animate" data-wow-delay="0.8s"><a href="<?php the_permalink() ?>"><?php echo esc_attr($encrypted_cta_read_more); ?></a></div>
            <?php endif; ?>
        <?php
            endwhile;
        endif;
        endif;
        ?>
        </div>
    </div>
</section>
<?php endif;  ?>

<?php 
$encrypted_ed_fp = $encrypted_et_to['feature_post'];
if($encrypted_ed_fp==1){ ?>
<section class="feature-layout encrypted-section wow flipInX animated" data-wow-delay="0.5s">
    <div class="el-container">
    
        <div class="three-layout">
            <?php
            $encrypted_feature_page_id1 = $encrypted_et_to['select_post_feature_post_1'];
            $encrypted_feature_page_id2 = $encrypted_et_to['select_post_feature_post_2'];
            $encrypted_feature_page_id3 = $encrypted_et_to['select_post_feature_post_3'];
            $encrypted_feature_page_char= $encrypted_et_to['numbwe_character_feature_post'];
            $encrypted_feature_pages = array($encrypted_feature_page_id1, $encrypted_feature_page_id2, $encrypted_feature_page_id3);
            $encrypted_count = 0;
            if(!empty($encrypted_feature_pages)):
            foreach($encrypted_feature_pages as $encrypted_feature_page){
               
                $encrypted_args_fp = array('page_id'=>$encrypted_feature_page, 'post_status'=>'publish');
                $encrypted_query_fp = new WP_Query($encrypted_args_fp);
                if($encrypted_query_fp->have_posts() && !empty($encrypted_feature_page)):
                while($encrypted_query_fp->have_posts()): $encrypted_query_fp->the_post();
                 $encrypted_count++;
            ?>
            <div class="feature feature<?php $encrypted_count ?>">
                <?php if (has_post_thumbnail()):
                $encrypted_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'thumbnail'); ?>  
                <a href="<?php the_permalink(); ?>">         
                <div class="feature-circle">
                    <img src="<?php echo $encrypted_image[0]; ?>" alt="<?php the_title(); ?>" />
                    <div class="mask"></div>
                </div>
                </a>
                <?php endif; ?>
                <div class="feature_content_wrap">
                    <a href="<?php the_permalink(); ?>"><div class="feature-number"><h2><?php the_title(); ?></h2></div></a>
                    <div class="feature-text"><?php echo encrypted_lite_excerpt(get_the_content(), $encrypted_feature_page_char, true); ?> </div>
                </div>
            </div>
            <?php
            endwhile;
            endif;
            wp_reset_postdata();;
            }
            endif;
           ?>
        </div>
    </div>
    
</section>
<?php } ?>
<?php 
$encrypted_ed_port = $encrypted_et_to['enable_portfolio'];
if($encrypted_ed_port==1){ ?>
<section class="portfolio encrypted-section white-bg wow fadeInUp animated" data-wow-delay="0.5s">
    <div class="el-container">
    <h2><span class="line"> </span>
    <div class="feature-layout-title"><span><?php echo $encrypted_et_to['portfolio_section_title'] ?></span></div>
    </h2>
        <div class="portfolio-desc"><?php echo $encrypted_et_to['portfolio_section_description'] ?></div>
        <div class="grid">
    <?php 
    $encrypted_port_cat = $encrypted_et_to['select_portfolio_category'];
    $encrypted_port_char = $encrypted_et_to['numbwe_character_portfolio'];
    $encrypted_port_args = array('cat'=>$encrypted_port_cat, 'post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1);
    $encrypted_port_query = new WP_Query($encrypted_port_args);
    $encrypted_count = 0;
    if($encrypted_port_query->have_posts() && !empty($encrypted_port_cat)):
        while($encrypted_port_query->have_posts()): $encrypted_port_query->the_post();
        $encrypted_count++;
        $encrypted_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'encrypted-lite-port-home'); ?>
	
               <figure class="effect-sarah">
                <?php if (has_post_thumbnail()):
                ?>
                <img src="<?php echo $encrypted_image[0] ?>" alt="<?php the_title(); ?>" />
                <?php
                 endif;?>
                <figcaption>
                    <h2><?php the_title(); ?></h2>
                    <p><?php echo encrypted_lite_excerpt(get_the_content(), $encrypted_port_char, true); ?></p>
                    <a href="<?php the_permalink() ?>"> </a>
                </figcaption>
            </figure>
	
    <?php
    if($encrypted_count%4==0){
    ?>	
    <div class="clearfix"></div>
    <?php
    }
    endwhile;
    endif;
    wp_reset_postdata();;
    ?>
    </div>
      <div class="divider small-icon">
      <div class="m-divider-wrap">
        <div class="divider-text wow fadeInDown animated" data-wow-delay="0.5s">
          <span class="wow fadeInUp animated" data-wow-delay="0.5s">
            <i class="fa fa-chevron-up"></i>
          </span>
        </div>
      </div>
    </div>
    </div>
</section>
<?php } ?>

<?php 
$encrypted_ed_blog = $encrypted_et_to['enable_blog'];
if($encrypted_ed_blog==1){ ?>
<section class="el-blog encrypted-section white-bg  wow fadeInUp animated" data-wow-delay="0.5s">
    <div class="el-container">
        <h2 class="blog-main-title"><?php echo esc_attr($encrypted_et_to['blog_section_title']); ?></h2>
        <div class="blog-main-desc"><?php echo esc_attr($encrypted_et_to['blog_section_description']); ?></div>
        <div class="blog-wrap">
            <?php 
                $encrypted_blog_cat   = $encrypted_et_to['select_blog_category'];
                $encrypted_ed_date    = $encrypted_et_to['enable_date_over_blog_image'];
                $encrypted_blog_char  = $encrypted_et_to['number_character_blog_content'];
                $encrypted_blog_args  =   array('cat'=>$encrypted_blog_cat, 'post_status'=>'publish', 'posts_per_page'=>3);
                $encrypted_blog_query =   new WP_Query($encrypted_blog_args);
                if($encrypted_blog_query->have_posts() && !empty($encrypted_blog_cat)):
                while($encrypted_blog_query->have_posts()):$encrypted_blog_query->the_post();
                    $encrypted_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'encrypted-lite-land-blog', false );
                     ?>
                    <div class="blogs-main-wrap clearfix">
                        <a href="<?php the_permalink(); ?>">
                            <figure class="blog-img img">
                                <img src="<?php echo $encrypted_image[0]; ?>" alt="<?php the_title(); ?>" />
                                <?php if($encrypted_ed_date==1):?>
                                <div class="el-date"><span><?php echo get_the_date('d'); ?></span><span><?php echo get_the_date('M'); ?></span></div>
                                <?php endif;?>
                                <div class="el-overlay"></div>
                            </figure>
                        </a>
                                                
                        <div class="blog-content-wrap">
                            <a href="<?php the_permalink(); ?>"><div class="blog-title"><?php the_title(); ?></div></a>
                            <div class="blog-content"><?php echo encrypted_lite_excerpt(get_the_content(), $encrypted_blog_char, true);  ?></div>
                        </div>
                                                
                    </div>
                     <?php
                endwhile;
                endif;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php } ?>

<?php 
$encrypted_ed_testi = $encrypted_et_to['enable_testimonial'];
if($encrypted_ed_testi==1){
    $encrypted_testimonials_title = $encrypted_et_to['testimonial_section_title'];
    $encrypted_testimonials_desc = $encrypted_et_to['testimonial_section_description'];
    ?>
<section class="testimonial encrypted-section wow fadeInUp animated" data-wow-delay="0.5s">
     <div class="el-container">
        <h2 class="testimonial-title"><?php echo esc_attr($encrypted_testimonials_title); ?></h2>
        <div class="testimonial-desc"><?php echo esc_attr($encrypted_testimonials_desc); ?></div>
        <div class="testimonial-wrap">
            <?php 
                $encrypted_testi_cat = $encrypted_et_to['select_testimonial_category'];
                $encrypted_testi_char = $encrypted_et_to['number_character_testimonail_content'];
                $encrypted_testi_args  =   array('cat'=>$encrypted_testi_cat, 'post_status'=>'publish', 'posts_per_page'=>-1);
                $encrypted_testi_query =   new WP_Query($encrypted_testi_args);
                if($encrypted_testi_query->have_posts()&& !empty($encrypted_testi_cat)):
                while($encrypted_testi_query->have_posts()):$encrypted_testi_query->the_post();
                    $encrypted_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false );
                     ?>
                    <div class="testimonial-main-wrap">
                        <div class="team-content"><?php echo encrypted_lite_excerpt(get_the_content(), $encrypted_testi_char, true); ?></div>
                        <div class="tm-img">
        					<a href="<?php the_permalink(); ?>"><img src="<?php echo $encrypted_image[0]; ?>" alt="<?php the_title(); ?>" /></a>
                        </div>
                        <div class="team-title"><?php the_title(); ?></div>
                    </div>
                     <?php
                endwhile;
                endif;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php } ?>

<?php 
$encrypted_ed_team = $encrypted_et_to['enable_team_member'];
if($encrypted_ed_team==1){ 
    $encrypted_team_title = $encrypted_et_to['team_member_section_title'];
    $encrypted_team_desc = $encrypted_et_to['team_member_section_description'];
    ?>
<section class="team encrypted-section white-bg  wow fadeInUp animated" data-wow-delay="0.5s">
    <div class="el-container">
        <h2 class="team_memeber_title"><?php echo esc_attr($encrypted_team_title); ?></h2>
        <div class="team_member_desc"><?php echo esc_attr($encrypted_team_desc);?></div>
        <div class="team-wrap-all">
        <?php
        $encrypted_team_char = $encrypted_et_to['number_character_team_member_content'];
        $encrypted_team_cat = $encrypted_et_to['select_team_member_category'];
        $encrypted_team_args = array('cat'=>$encrypted_team_cat, 'post_status'=>'publish', 'posts_per_page'=>4);
        $encrypted_team_query = new WP_Query($encrypted_team_args);
        $i=0;
        if($encrypted_team_query->have_posts() && !empty($encrypted_team_cat) ):
            while($encrypted_team_query->have_posts()): $encrypted_team_query->the_post();
            $i++;
            $animate_class = '';
            if($i%2 == '0'){
                $animate_class = 'slideInRight';
            }
            else{
                $animate_class = 'slideInLeft';
            }
            
        ?>
                <div class="team_member_wrap wow <?php echo $animate_class; ?> animated" data-wow-delay="0.5s">
                    <figure class="team_member_image">
                    <?php
                    $encrypted_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'encrypted-lite-team-home', false );
                    ?>
                        <img src="<?php echo $encrypted_image[0]?>" alt="<?php the_title(); ?>" />
                        <div class="team_detail">
                            <div class="team_member_name"><?php the_title(); ?></div>
                            <div class="team_conten_hover">
                                <div class="team_member_content"><?php echo encrypted_lite_excerpt(get_the_content(), $encrypted_team_char, true) ?></div>
                            </div>
                        </div>
                    </figure>
                </div>
        <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?> 
       </div>       
    </div>
</section>
<?php } ?>


<?php
$encrypted_ed_client_logo = $encrypted_et_to['enable_client_logo_slider_section'];
if($encrypted_ed_client_logo==1):
?>
<section class="client_logo encrypted-section white-bg wow fadeInUp animated" data-wow-delay="0.8s">
    <div class="el-container">
        
        <h2>
           <?php echo esc_attr($encrypted_et_to['client_section_title']); ?>
        </h2>
        <div class="client_desc"><?php echo esc_attr($encrypted_et_to['client_section_description']); ?></div>
        
        <div class="client_logo_wrap">
        <?php
        $encrypted_client_cat = $encrypted_et_to['select_client_category'];
        if(!empty($encrypted_client_cat)){
        $encrypted_client_args = array('cat'=>$encrypted_client_cat, 'post_status'=>'publish', 'posts_per_page'=>-1);
        $encrypted_client_query = new WP_Query($encrypted_client_args);
        if($encrypted_client_query->have_posts()):
            while($encrypted_client_query->have_posts()): $encrypted_client_query->the_post();
            
            $encrypted_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'client-logo', false );
            ?>
            <div class="client_img">
                <img src="<?php echo $encrypted_image[0] ?>" alt="<?php the_title(); ?>" />
            </div>
            <?php
            endwhile;
        endif;
        wp_reset_postdata();
        }
        ?>
        </div>
        
    <div class="divider small-icon">
      <div class="m-divider-wrap">
        <div class="divider-text wow fadeInDown animated" data-wow-delay="0.5s">
          <span class="wow fadeInUp animated" data-wow-delay="0.5s">
            <i class="fa fa-chevron-up"></i>
          </span>
        </div>
      </div>
    </div>
        
    </div>
</section>
<?php endif; ?>
 <?php
$encrypted_ed_gmap = $encrypted_et_to['enable_google_map_section'];
if($encrypted_ed_gmap==1):
$encrypted_google_map =$encrypted_et_to['google_map_iframe'];
$encrypted_title = $encrypted_et_to['map_info_title'];
$encrypted_address = $encrypted_et_to['map_info_adderss'];
$encrypted_phone = $encrypted_et_to['map_info_phone'];
$encrypted_email = $encrypted_et_to['map_info_email'];
?>
<section class="google-map">
<div class="el-container">
    <div class="address wow shake animated" data-wow-delay="0.8s">
        <div class="adddress-wrap">
            <h2><?php echo esc_attr($encrypted_title) ?></h2>
            <div class="contact-info">
            <div class="contact-wrap"><i class="fa fa-map-marker"></i><span><?php echo esc_attr($encrypted_address) ?></span></div>
            <div class="contact-wrap"><i class="fa fa-phone"></i><span><?php echo esc_attr($encrypted_phone) ?></span></div>
            <div class="contact-wrap"><i class="fa fa-envelope"></i><span><?php echo esc_attr($encrypted_email) ?></span></div>
            </div>
        </div>
     </div>
</div> 
    <div class="content-area googlemap-section">
        <div class="googlemap-content">
            <?php echo $encrypted_google_map; ?>
        </div>
     </div>
</section>
<?php
endif;
?>

<?php
/**
 * Removed Latest Post Section Since latest post can be set from Reading -> Setting 
 * @since 1.0.0
 * 
 * 
 */
?>

<?php get_footer(); ?>
