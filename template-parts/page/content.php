                  
<article id="post-<?php the_ID(); ?>" <?php post_class('c-page u-margin-bottom-20'); ?>>

			<div class="c-post__inner">
      <?php if(get_the_post_thumbnail() !== '') { ?>
                        <div class="c-post__thumbnail">
                         <?php the_post_thumbnail('full'); ?>
                        </div>
                    <?php } ?>
                
                <header class="entry-header">
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

              </header><!-- .entry-header -->

        
            <div class="entry-content">
              <?php
              the_content(
                sprintf(
                  wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'flexi-theme' ),
                    array(
                      'span' => array(
                        'class' => array(),
                      ),
                    )
                  ),
                  wp_kses_post( get_the_title() )
                )
              );

              wp_link_pages(
                array(
                  'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'flexi-theme' ),
                  'after'  => '</div>',
                )
              );
              ?>
	</div><!-- .entry-content -->
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
</article>