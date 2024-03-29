<?php
/**
 *
 * Template Name: Default Index Template
 *
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.5
 *
 * Last Revised: March 4, 2012
 */
get_header(); ?>
<div class="container">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
  <header class="jumbotron masthead">
    <div class="inner hero-unit">
      <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
      <p class="post-metadata">by 
        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
            <?php the_author_meta('display_name'); ?>
        </a> | <?php echo get_the_date(); ?>
      </p>
      <?php the_content();?>
    </div>
    

  </header>
<?php endwhile; endif; ?>
<hr class="soften">
<div class="marketing">
  <div class="row">
    <div class="span4">
      <?php
      if ( function_exists('dynamic_sidebar')) dynamic_sidebar("home-left");
      ?>
    </div>
    <div class="span4">
      <?php
      if ( function_exists('dynamic_sidebar')) dynamic_sidebar("home-middle");
      ?>
    </div>
    <div class="span4">
      <?php
      if ( function_exists('dynamic_sidebar')) dynamic_sidebar("home-right");
      ?>
    </div>
  </div>
</div><!-- /.marketing -->
<?php get_footer();?>
