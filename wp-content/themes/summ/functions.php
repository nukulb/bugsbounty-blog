<?php/** * @package WordPress * @subpackage Summ */ add_theme_support( 'automatic-feed-links' );  if ( ! isset( $content_width ) ) $content_width = 900; 	/** -----------------------------------------------		 * custom background	*/  add_custom_background(); 	define('HEADER_TEXTCOLOR', '111111');	define('HEADER_IMAGE', '%s/images/default_header.jpg'); // %s is the template dir uri	define('HEADER_IMAGE_WIDTH', 1000); // use width and height appropriate for your theme	define('HEADER_IMAGE_HEIGHT', 138);	/** -----------------------------------------------		 * LOCALIZATION	*/ load_theme_textdomain('Summ', get_template_directory() . '/languages'); 	/** -----------------------------------------------		 * gets included in the site header	*/ function header_style() {    ?><style type="text/css">        #header {            background: url(<?php header_image(); ?>);        }		.siteName a,.description{color:#<?php header_textcolor() ?>}    </style><?php}	/** -----------------------------------------------		 * gets included in the admin header	*/ function admin_header_style() {    ?><style type="text/css">        #headimg {            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;        }    </style><?php}add_custom_image_header('header_style', 'admin_header_style');    register_sidebar( array(		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',		'after_widget' => '</li>',		'before_title' => '<span class="widget-title">',		'after_title' => '</span>',	));	/** -----------------------------------------------		 * Theme uses wp_nav_menu() in one location. Chack if function exist	*/ if( function_exists('register_nav_menus') )register_nav_menus( array(		'primary' => __( 'Primary Navigation', 'Summ' ),) );    /**     * Return older post     *     * @return mixed If not NULL     */function older_post_exists()    {        static $older;        if (empty($older)) {            if (is_attachment()) {                global $post;                $older = &get_post($post -> post_parent);            } else {                $older = &get_previous_post();            }        }        return $older;    }    /**     * Return newer post     *     * @return mixed If not NULL     */function newer_post_exists()    {        static $newer;        if (empty($newer)) $newer = &get_next_post();        return $newer;    }	/** -----------------------------------------------	 * custom comments	*/function custom_comments($comment, $args, $depth) {$GLOBALS['comment'] = $comment;?><li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">	<div id="comment-<?php comment_ID(); ?>"><span class="avatarx"><?php echo get_avatar($comment,$size='40',$default='<path_to_url>' ); ?></span><div class="message_head"><span class="name"><?php comment_author_link() ?></span><span class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></span><br/><span class="date"><?php printf( __( '%1$s at %2$s', 'Summ' ), get_comment_date(),  get_comment_time() ); ?></span><div class="cmt_text"><?php comment_text(); ?></div>	</div></div>	<?php }// Theme Optionsfunction Summ_theme_options(){	$items = array (		array(			'id' => 'logo_src',			'name' => __('Logo image', 'Summ'),			'desc' => __('Put your logo image address here (max size: 280px*100px). If empty, display blog title with text.', 'Summ')		),		array(			'id' => 'rss_url',			'name' => __('RSS URL', 'Summ'),			'desc' => __('Put your full rss subscribe address here.(with http://). If empty, auto-set system defaults.', 'Summ')		),		array(			'id' => 'excerpt_check',			'name' => __('Excerpt?', 'Summ'),			'desc' => __('If the home page and archive pages to display excerpt of post, check.', 'Summ')		),		array(			'id' => 'desc',			'name' => __('Disable the site description','Summ'),			'desc' => __('Disabling this will remove the site description.', 'Summ')		)	);	return $items;}add_action( 'admin_init', 'Summ_theme_options_init' );add_action( 'admin_menu', 'Summ_theme_options_add_page' );function Summ_theme_options_init(){	register_setting( 'Summ_options', 'Summ_theme_options', 'Summ_options_validate' );}function Summ_theme_options_add_page() {	add_theme_page( __( 'Theme Options' , 'Summ'), __( 'Theme Options' , 'Summ'), 'edit_theme_options', 'theme_options', 'Summ_theme_options_do_page' );}function Summ_default_options() {	$options = get_option( 'Summ_theme_options' );	foreach ( Summ_theme_options() as $item ) {		if ( ! isset( $options[$item['id']] ) ) {			$options[$item['id']] = '';		}	}	update_option( 'Summ_theme_options', $options );}add_action( 'init', 'Summ_default_options' );function Summ_theme_options_do_page() {	if ( ! isset( $_REQUEST['updated'] ) )		$_REQUEST['updated'] = false;?>	<div class="wrap">		<?php screen_icon(); echo "<h2>" . sprintf( __( '%1$s Theme Options', 'Summ' ), get_current_theme() )	 . "</h2>"; ?>		<?php if ( false !== $_REQUEST['updated'] ) : ?>		<div class="updated fade"><p><strong><?php _e( 'Options saved', 'Summ' ); ?></strong></p></div>		<?php endif; ?>		<form method="post" action="options.php">			<?php settings_fields( 'Summ_options' ); ?>			<?php $options = get_option( 'Summ_theme_options' ); ?>			<table class="form-table">			<?php foreach (Summ_theme_options() as $item) { ?>				<?php if ($item['id'] == 'rss_url' || $item['id'] == 'logo_src') { ?>				<tr valign="top" style="margin:0 10px;">					<th scope="row"><?php echo $item['name']; ?></th>					<td>						<input name="<?php echo 'Summ_theme_options['.$item['id'].']'; ?>" type="text" value="<?php if ( $options[$item['id']] != "") { echo $options[$item['id']]; } else { echo ''; } ?>" size="80" />						<br/>						<label class="description" for="<?php echo 'Summ_theme_options['.$item['id'].']'; ?>"><?php echo $item['desc']; ?></label>					</td>				</tr>				<?php } else { ?>				<tr valign="top" style="margin:0 10px;">					<th scope="row"><?php echo $item['name']; ?></th>					<td>						<input name="<?php echo 'Summ_theme_options['.$item['id'].']'; ?>" type="checkbox" value="true" <?php if ( $options[$item['id']] ) { $checked = "checked=\"checked\""; } else { $checked = ""; } echo $checked; ?> />						<label class="description" for="<?php echo 'Summ_theme_options['.$item['id'].']'; ?>"><?php echo $item['desc']; ?></label>					</td>				</tr>				<?php } ?>			<?php } ?>			</table>			<p class="submit">				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'Summ' ); ?>" />			</p>		</form>	</div><?php}function Summ_options_validate($input) {	foreach ( Summ_theme_options() as $item ) {		$input[$item['id']] = wp_filter_nohtml_kses($input[$item['id']]);	}	return $input;}