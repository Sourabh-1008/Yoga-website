<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'yoga' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', '' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'UA*C05vg1`JW_R7m23wA]7y5;Z3|{Uq 1Z|p6uNBB-AILS19i]N?!-3=*L*clv&+' );
define( 'SECURE_AUTH_KEY',  '(lK3P;0dl<+d}A&TqstL}SRZ.0qbW|#d1OP#]1,T8Oxpg^d2*#mfg]+GF:.J7W5l' );
define( 'LOGGED_IN_KEY',    'YRMwL#jOSrI%]Kv<HjP+?Je%CVX^sB;1.|J,5}xSmfA8R%%n{er4%|4k<Sy>mxYU' );
define( 'NONCE_KEY',        'i17/e_9q:[rO@`2Hn2qEN9j1J$5ub5e?.jrFpqNj>PW*Cur,U_nym,XMZ-3S;oDc' );
define( 'AUTH_SALT',        'P`wuT-3{W >-O~V:8ZFpa5kwl+lr7/$n[A[eZ}ifyU ai1i7/,cnN}`lg>W20#W^' );
define( 'SECURE_AUTH_SALT', '7=<`Ai$rJ(XU{HLRFwL&S4VVdn}2|&[Ao bO}yV=v5sR,$3X3i.tMi[1iO>A`P.x' );
define( 'LOGGED_IN_SALT',   '6QrCnVF!.?>w4=;sOY@Nf_Y_Eie _6*Mo1KtpBpJ85PiwueZJ_E:g}x(KdUWnnF~' );
define( 'NONCE_SALT',       'ir,`y4f;9S)@QBx/3N(_.NyGtZ8?@N 1x<$+%%C%9)qJ&1iHYTd@yZ<U,Z`Fs3BM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
