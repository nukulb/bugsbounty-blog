<div id="sidebar">
<?php if ( !dynamic_sidebar() ) : ?>
		<ul>
				<?php wp_list_bookmarks('class=widget-container'); ?>

				<li class="widget-container"><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
				</li>

			
		</ul>	<?php endif; ?>
</div>