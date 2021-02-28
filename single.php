<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Flexi_Theme
 */

get_header();

?>

<?php
	$layout = _flexi_theme_meta(get_the_ID(), '__flexi_post_layout', 'full' );
	$sidebar = is_active_sidebar( 'primary-sidebar' );
	if($layout === 'primary-sidebar' && !$sidebar) {
			$layout = 'full';
	}
?>

<div class="o-container u-margin-bottom-40 o-single-post-<?php echo $layout; ?>">
		<div class="o-row">
						<div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $layout === 'primary-sidebar' ? '8' : '12' ?>@medium">
								<main id="main" class="spacer site-main">
								<?php get_template_part( 'loop', 'single'); ?>
								</main><!-- #main -->

					</div> <!-- End Column -->
					<?php if( $layout === 'primary-sidebar') { ?>
								<div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
								<?php get_sidebar(); ?>
								</div><!-- End Sidebar -->
								<?php } ?>
					</div><!-- End Row -->
		</div> <!-- End Container -->
<?php get_footer(); ?>

