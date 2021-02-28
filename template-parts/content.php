<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Flexi_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('c-post u-margin-bottom-20'); ?>>
<a href="<?php echo esc_url( get_permalink() ); ?>">
<?php if(get_the_post_thumbnail() !== '') { ?>
            <div class="c-post__thumbnail">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
        <?php } ?></a>
<div class="c-post__inner">
			<div class="c-post__header">
							<?php
							if ( is_singular() ) :
								the_title( '<h1 class="entry-title">', '</h1>' );
							else :
								the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;

							if ( 'post' === get_post_type() ) :
								?>
								<div class="entry-meta">
									<?php
									flexi_theme_posted_on();
									flexi_theme_posted_by();
									?>
								</div><!-- .entry-meta -->
							<?php endif; ?>
				</div><!-- .entry-header -->

<?php if(is_single( )) { ?>
            <div class="c-post__content">
                <?php the_content(); 
                wp_link_pages();
                ?>
            </div>
        <?php } else { ?>
            <div class="c-post__excerpt">
                <?php the_excerpt(); ?>
            </div>
  <?php } ?>
						
		<?php if(is_single( )) { ?>
		<footer class="c-post__footer">
			<?php
			if(has_category()) {
					echo '<div class="c-post__cats">';
					/* translators: used betweeen categories */
					$cats_list = get_the_category_list( esc_html__( ', ', 'flexi-theme' ) );
					/* translators: %s is the categories list */
					printf(esc_html__( 'Posted in %s', 'flexi-theme' ), $cats_list);
					echo "</div>";
			}
			if(has_tag()) {
					echo '<div class="c-post__tags">';
					$tags_list = get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' );
					echo $tags_list;
					echo "</div>";
			}
			?>
	</footer>
	<?php } ?>	
</div>
</article><!-- #post-<?php the_ID(); ?> -->
