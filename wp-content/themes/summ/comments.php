<?php
/**
 * @package WordPress
 * @subpackage Summ
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
	$oddcomment = 'alt';
	/* to split comment and pings */
	$trackpingCount = 0;
	$commentCount = 0;	
	if ($comments) :
		foreach ($comments as $comment) {
			$type = get_comment_type();
			switch( $type ) {
				case 'trackback' :
				case 'pingback' :
					$trackpingArray[$trackpingCount++] = $comment;
					break;
				default :
					$commentArray[$commentCount++] = $comment;
			}
		}
	endif;
?>

<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
	<div id="comments">
				<h2 id="commentsx"><?php if ('open' == $post->comment_status) : _e('Comments', 'Summ'); else : _e('Comments (Close)', 'Summ'); endif; ?>:<?php echo $commentCount; ?></h2>
	</div>
	<div class="page_navi">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	
	<ol class="commentlist">
	<?php wp_list_comments('type=comment&callback=custom_comments'); ?>
	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e( 'Comments are closed.', 'Summ' ); ?></p>
<?php endif; // end ! comments_open() ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<?php comment_form(); ?>

<?php if ($trackpingCount > 0 && 'open' == $post->ping_status) : //display trackback?>
			<div class="section" id="trackback">
				<h2><?php if ('open' == $post->ping_status) : _e('Trackbacks', 'Summ'); else : _e('Trackbacks (Close)', 'Summ'); endif; ?>:<span class="count"><?php echo $trackpingCount; ?></span></h2>
<?php		if ('open' == $post->ping_status) : ?>
				<dl class="info">
				<dt><em><?php _e('Listed below are links to weblogs that reference', 'Summ'); ?><?php printf(__(' %s', 'Summ'), '<a href="'. get_permalink() .'">'. get_the_title() .'</a>'); ?></em></dt>
				<br/>
				</dl>
<?php		endif;
		if ($trackpingCount > 0) : ?>
				<dl class="log">
<?php			foreach ($trackpingArray as $comment) : ?>
					<dt id="ping<?php comment_ID() ?>"><span class="name"><?php printf(__("%s from %s", 'Summ'), get_comment_type(), get_comment_author_link()); ?></span> <span class="date"><?php comment_date( get_option( 'date_format' )); ?></span></dt>
					<dd>
<?php				comment_text() ?>
					</dd>
<?php			endforeach; ?>
				</dl>
<?php		endif; ?>
			</div>
<?php endif; // end of trackback ?>

<?php endif; // if you delete this the sky will fall on your head ?>
