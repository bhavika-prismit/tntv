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
define('DB_NAME', 'tntv');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'prism123');

/** MySQL hostname */
define('DB_HOST', 'localhost:8080');

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
define('AUTH_KEY',         'M#a>ZXz%1F#fb$[!JuxZ}O>DY]L3Q$+L<_W#sR+Sr-n&I>fhLA)!^aB90-kf,!3^');
define('SECURE_AUTH_KEY',  'q}:=<P2e$9cKkh3|Hm7T,~j.:9u|.7A->b$Guw)ELYNen{RkBrCjE7ijk0Hsr(&+');
define('LOGGED_IN_KEY',    '.F(>Y7&$Et_Z0%=!!BF(:C,#`-P3PAaBh(Ubo^`6i:lcy4l%yG^*>eh;@U[B$onX');
define('NONCE_KEY',        'BAt81j=1))o+Ns/h9HH}Bw{C~pT#]4SS%^,T0F-K lbGWLv(-o)p+NBor$$<`-8d');
define('AUTH_SALT',        'VrV|rGqWZ,.Lv:X+1+jV+7bf#z]=}0Afe@Z-/?EMP)DUKBq%=-sZ-Q!$g#>V-=f^');
define('SECURE_AUTH_SALT', 'mHd}u>x$bL0`#yK1dF]#gQg8O.fDf9dsOXDdh[D4[}l!413Q}2Y_VL9!4wesT_#[');
define('LOGGED_IN_SALT',   '9y.hb++v+)*<B.Ek#Y.4x,L#2Ib.3(2@43[UD#~>e}|3C34D:ZC+X{,Dccl7zFP4');
define('NONCE_SALT',       '@K(~LbpV4!5^[B8[7[w_`S(UNIBPI;[Nm9#^}+Nv|E4i^jsS|uII!xJsF9_q]r[O');

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
