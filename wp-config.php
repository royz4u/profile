<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache


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
define( 'DB_NAME', 'royz4u_wpdbraj' );

/** MySQL database username */
define( 'DB_USER', 'royz4u_startex' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mAsxT0nSk})y' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'dB{hBLMcv[fL|z8|#DcbUPDj!%iZ8=d@W^Y6x+hR@SR;**VHXvrB4&>C@6@{wqKZ' );
define( 'SECURE_AUTH_KEY',  '/Q4+Ev2C~*Pb53(#FPev6aC0k`;%O+(Rjqc4DPQJ$1s/@L^_TJ@x&i52EvxxtCXz' );
define( 'LOGGED_IN_KEY',    '=Y;:avTvZ4I?$$Q;`{~9-Yi-a.235<TZoy<w%8C}6~Z;WLq,ZNoe83[ /!Ksd[ *' );
define( 'NONCE_KEY',        '+Y2]g3^+q+tKRvCmNk%r2(]v-4D6%he9a:+Fi+o,;&lBv||aevRg9l>qHgA`AX|u' );
define( 'AUTH_SALT',        'P:W,O9w^=W+W7)L4,a`|&Iel1VJC_qe*SHCI(EK|o+Rj)e}1yL `Mh~D+FAlG(15' );
define( 'SECURE_AUTH_SALT', 'e`s.xD|}_<|u0HOk[,`%2/xL[aj/R3SvJ7L$vt3W7dn_YlP?aR]Ph@^+fMO4L_`w' );
define( 'LOGGED_IN_SALT',   'm+ElK+-3-m8oev~O$r%8}qF#gWy{?QRdN:3r,$Pv. 1ZK-#+3~GlcaEbLX=c~1Y(' );
define( 'NONCE_SALT',       'b5hmS$<nrF+;tu~{rt90$%F]Ft3J%lO!r@u- 09N;/Kj[4R(7s(4:9j+;(6=xXd%' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_321';

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
define( 'WP_DEBUG', true );
define('WP_DEBUG_LOG', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
