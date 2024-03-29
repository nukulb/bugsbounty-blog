<?php
/**
 * Index Template
 *
 * This is the default template.  It is used when a more specific template can't be found to display
 * posts.  It is unlikely that this template will ever be used, but there may be rare cases.
 *
 * @package Oxygen
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<div class="aside">
	
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
		
		<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
	
	</div>

	<?php do_atomic( 'before_content' ); // oxygen_before_content ?>
	
	<div class="content-wrap">

		<div id="content">
	
			<?php do_atomic( 'open_content' ); // oxygen_open_content ?>
	
			<div class="hfeed">
	
				<?php if ( have_posts() ) : ?>
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php do_atomic( 'before_entry' ); // oxygen_before_entry ?>
	
							<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">		
	
							<?php do_atomic( 'open_entry' ); // oxygen_open_entry ?>
	
							<div class="entry-header">
										
								<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
								
								<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[entry-published]', hybrid_get_parent_textdomain() ) . '</div>' ); ?>
			
								<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'by [entry-author]', hybrid_get_parent_textdomain() ) . '</div>' ); ?>
			
								<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[entry-edit-link]', hybrid_get_parent_textdomain() ) . '</div>' ); ?>
		
							</div>

							<?php echo apply_atomic_shortcode( 'byline', '<div class="byline-cat">' . __( '[entry-terms taxonomy="category" before=""]', hybrid_get_parent_textdomain() ) . '</div>' ); ?>
							
							<!--?php if ( current_theme_supports( 'get-the-image' ) ) {
											
								get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'archive-thumbnail', 'image_class' => 'featured', 'width' => "100%", 'height' => 60, 'default_image' => get_template_directory_uri() . '/images/archive-thumbnail-placeholder.gif' ) );							
									
							} ?-->
	
							<div class="entry-summary">
								
								<?php the_excerpt(); ?>
								
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', hybrid_get_parent_textdomain() ), 'after' => '</p>' ) ); ?>
								
							</div>
								
							<a class="read-more" href="<?php the_permalink(); ?>">Read Article &rarr;</a>
	
							<?php do_atomic( 'close_entry' ); // oxygen_close_entry ?>
	
						</div><!-- .hentry -->
	
						<?php do_atomic( 'after_entry' ); // oxygen_after_entry ?>
	
					<?php endwhile; ?>
	
				<?php else : ?>
	
					<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // oxygen_close_content ?>
	
			<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>
	
		</div><!-- #content -->
	
		<?php do_atomic( 'after_content' ); // oxygen_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>
