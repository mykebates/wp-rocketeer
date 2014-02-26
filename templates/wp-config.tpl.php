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
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', '{{DB_NAME}}');
}
if (!defined('DB_USER')) {
	define('DB_USER', '{{DB_USER}}');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', '{{DB_PASSWORD}}');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', '{{DB_HOST}}');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
//https://api.wordpress.org/secret-key/1.1/salt
define('AUTH_KEY',         ']G+3+8*o/;&(0s%,8o(,XonJ!%.j|:`=q| 6)mHM,AI,lz|msafF$=S-{Ex?cgF_');
define('SECURE_AUTH_KEY',  '^j,@O(nu#^P?)3=SF95>+E@J;9];,V[e5Z-BH=> %J*&g!G!k]UM]n.=(m`%u$)=');
define('LOGGED_IN_KEY',    'su-?W-GX6-dJ9e%#|CSx7g/Y=7OLy-7*{:1qfah-thQ|8|0nA#Qc!h@x1Nj|4E4p');
define('NONCE_KEY',        'jFdq UdiPg)Xw=XCu28.*x69yn*5&+57[)6O9co.,<XHi`.ACgJ:qQ0iiD|qd|]A');
define('AUTH_SALT',        '>o7!^X(|D7QXXDI|:h^V@*]M*V%l$^75ww|UR]r:E0#8S3a!Cx{R@7_X!oux(:m=');
define('SECURE_AUTH_SALT', 'k0%f5g/OsN=4-EM+.&{8O77. Z;WQbv(%26j]s|XbX# hSB.wC1#E7Z4PFJJ]*)l');
define('LOGGED_IN_SALT',   '&/_2-=[RPS[|a-bP@}y?04x:=ts0!VZ^B1f=hf2+Dhngwjp?|qzNQg3x3p5c@G0}');
define('NONCE_SALT',       '6C`TX)NMIjZIs4V!|CQAl88$/GO%~Doc~X,r#y/hr9JlH~w>|f)@K:jIfV8w0_~~');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . '');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
