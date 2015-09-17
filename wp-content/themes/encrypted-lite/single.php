<?php
/**
 * The template for displaying all single posts.
 *
 * @package Encrypted Lite
 */

get_header(); 
$encrypted_et_to = encrypted_lite_get_options_values(); ?>
<div class="el-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php  if($encrypted_et_to['enable_pagination']==1): encrypted_lite_post_nav(); endif; ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>
