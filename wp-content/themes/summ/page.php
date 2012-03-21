<?php get_header(); ?>
<div id="content">
	<div id="main">
	<div class="section entry" id="entry<?php the_ID(); ?>">
		<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
		<div class="post">
			<h2><?php the_title(); ?></h2>
				<div class="entry"><?php the_content('Continue Reading','Mflat'); ?></div>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		</div>
		<?php comments_template( '', true ); ?>
			<?php endwhile; ?>
	<?php else : ?>
	<div id="main">
	 <h2><?php _e('Not Found', 'Summ'); ?></h2>
	</div>
		<?php endif; ?>
	</div><!-- section entry -->
	</div><!-- main -->
	<?php	get_sidebar(); ?>
	<?php	get_footer(); ?>