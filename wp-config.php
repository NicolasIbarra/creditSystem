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
define('DB_NAME', 'credit');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'd,.zHvFN#9Xw4%!50&%lw?E}q)TtLmo/PU?Gji2Shn`Myza+k?nS]`E{u4t<~<7T');
define('SECURE_AUTH_KEY',  'o](#xark</[bFgmtpKIXw4.]B;HDF7~#y<9?P{cCRQWDy^n~~zLwi8_=lXU88<&p');
define('LOGGED_IN_KEY',    '`5lthUXo]<Sc;H;;]1-.w(%d3]oNXr}Jrbjh<flkj5ngyMy>RGt|{6Sll7rc4meX');
define('NONCE_KEY',        '{uyWN0El>Ud_VvYgfR(_.Iw>py!S1p&r}NVL8/.l,|xN3a}@ IL$W3,jNbCLH[ p');
define('AUTH_SALT',        'y9NHJ?mA,PqqLMtajdzFC:_c37A{P teTOy&~Jr==FOZ<7DX2U||N6w?UT{ICghc');
define('SECURE_AUTH_SALT', '(v Y=@?6]!y>B$ZqK,;(2VNKc3A7)3>TiC`u_f=oK+{zFPh}}uIPoAzM0e8-j!EX');
define('LOGGED_IN_SALT',   'x$5<4^Yo=DhmMU<Twj562}t#+:EO~AGnM)qv;`+3t^XK2nWg4%A;%?bXR+dAY@gI');
define('NONCE_SALT',       'ki]^dBe-nF`V(z.I-w,-vS7[.5iVtB)Sz![6?&:1 ZMFgkwegO[^riY$6+f2nh~I');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'credit_';

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
