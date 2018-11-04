<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'profile');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'jx,d[ij3`oIo^gR_$.c;j0m]}s|CaXv4BfFf<dNQBGwYsuSN@NZ4U~Q;%B$-Gnp0');
define('SECURE_AUTH_KEY',  'J s&pK9.1NIk3l~ :D!y~%CsUv3{RY) `=Gk_HUJhK<%Q8Md%OK8]0oYpl>g!&QU');
define('LOGGED_IN_KEY',    '}lSD3LPb|4pB/z>lpFV@?4l75:5)E.sgx}.Kf2M7 9PjKbMJN/&62@K]+Wq)?t%F');
define('NONCE_KEY',        '~&S]wziPMndgg3Ox8;+3h!IXYl;^r(udqK/ow/0Z*gY@:uLU<1z0jYie]To}Y``8');
define('AUTH_SALT',        'KY@WjF%`}7`U95&9iIyGeI5r_OV9Cgi^+Pc6py)i0BfXhLNN> y~uFtbnwP/ U$^');
define('SECURE_AUTH_SALT', 'M$bQ(@EAN:{{=3kRtWDCYP:{3fXeV(gO1Oi@s^E*IV`E} OWu:2qV <%pa0 &,c*');
define('LOGGED_IN_SALT',   ')4ROG^s7xo<R9WkU_7W.A/=0MGiN=kqw nSv0YQ]<SNT,gSEN09/@si9.}Stl$6K');
define('NONCE_SALT',       'O%*)nXE}fOQ>y-1M<peiFI$+BqMQrX,?SY}C}dn<u 0/L9#~|q6vU4#J%mHBJr$4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
