<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Whatdoyoumean8');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bKkZISkBlY+U54a&,H0YN8|XUF[wJd2`K#b2 ak-|^3J|Gh5GqyM/Xq+c|3eiaa{');
define('SECURE_AUTH_KEY',  '#C9Jh9-4IPb,p-5&{-/H36@,cIV&w*rrs$yF3RMX_M+{9tz^c{*|bLVFio6Iqm:>');
define('LOGGED_IN_KEY',    'Rt#.+eRG_N/mq]} xg?_7]~-X88@uz|H$mtxX)N1Y+{&06*VMfn#v)Y_PY7N0kz^');
define('NONCE_KEY',        ':,cTR?5D=$4fbYV:]YB10!*T{|fG>LacYNJ;Bkhw}z)ywl(@O(8,E@+^tz+,[m[g');
define('AUTH_SALT',        'NePaN!X!nyUl..QwYK$cTvi+t-:}>2@/0Z.4lnT((o<Dd&Bs+u{$9^QsS1Qi3P.j');
define('SECURE_AUTH_SALT', 'FE<(vqjeT+_I/4V73p:o2.Ab-q@tf-bFIr`GT2Z/I3^J#(MW[[_(TWsS`wRCE{!0');
define('LOGGED_IN_SALT',   '!QU1:;!m!_!:6c,|XrV9FtO]an+fb!XZn9$$Tir|s%c}6N3|cjNx:%ivxLF8]<;%');
define('NONCE_SALT',       'PN1U=(zHhKW0r]vx#FozH+8}bnKazWzz+D-x!!3^}w/qg>x#K~1`+--$c4!Efo&R');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'bugsblog_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

