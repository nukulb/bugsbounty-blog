<?php get_header(); ?>
<div id="content" class="single">
	<div id="main">
	<p class="topicPath"><a href="<?php echo home_url(); ?>"><?php _e('Home', 'Summ'); ?></a> &gt; <?php the_category(' | ') ?> &gt; <span class="current"><?php the_title(); ?></span></p>
	<div class="section entry" id="entry<?php the_ID(); ?>">
	<?php while(have_posts()) : the_post(); ?>
		<div class="post">
			<h1><?php the_title(); ?></h1>
			<div class="entry"><?php the_content(); ?>
			</div>
				<?php wp_link_pages('<p><strong>'.__('Pages').':</strong> ', '</p>', 'number'); ?>
			<p class="infobottom">
		</div>
			<?php endwhile; ?>
		<div class="related">
		
			<?php if(function_exists('st_related_posts')) :{  st_related_posts('number=10&include_page=false&order=count-desc'); } ?>
		</div>
			<div class="flip">
	<div class="prevpost"><?php previous_post_link(' %link ') ?></div>
	<div class="nextpost"><?php next_post_link(' %link ') ?></div>
	</div>
<?php comments_template(); ?>

	</div><!-- section entry -->
	</div><!-- main -->
	<?php	get_sidebar(); ?>	
	<?php	get_footer(); ?>