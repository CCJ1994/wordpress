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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '0000' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         '+MHado3<-hFwX^XIS&$NQ4s(KrPr,2?7hQ!+k#BVP=;xW!N/sFYKmV<NyCp/F^}j' );
define( 'SECURE_AUTH_KEY',  'V6IVr({5X,]|lTcY|B+c/C^K2HH3|+jk/HvbJ@j[fJF(YDxKwet&`bFsGjax]@KQ' );
define( 'LOGGED_IN_KEY',    'S{O3/-}n?oSVsDu% YO P=d(x|M;J}vd-=XW-/mt<@hxBx2*wKxjQzGrt.c?^|;-' );
define( 'NONCE_KEY',        ')k3f;HV,lBapqfq4`sU<^3]+BIf{0<ak_R),UY|P0f3boc[ohZh48>(Sgh{cG?[.' );
define( 'AUTH_SALT',        'e.vnvasuU}t%x7bp=ev6uFayl6mva.n/ZF~5O$%VRbi5@)tMPx]@oL17{;3+J)#*' );
define( 'SECURE_AUTH_SALT', 'yA kCcFhgp<Wp4XHJkK(AgPhaI+)JT[Ld;k=_c%B1bz?)q1o1_mY?/kb@=x3FXqL' );
define( 'LOGGED_IN_SALT',   'gP1tM>|]m,}d %-h2F{Qze~[;bRAIo(Gqs}aw|zucf5ut9c`yG$^}}y T?heeNU:' );
define( 'NONCE_SALT',       'c_gl.KF1x_iq2u];9/L&(J [@Rzia%]3CEGP(aOdr]WpCmrFT]>=u1%Vl|%]G9n4' );

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
