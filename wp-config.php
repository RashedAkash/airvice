<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'airvice' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '6z]JWyq~p&JUM;5wz=3_L><n$~Mn(K6Ea:hj|AE/u%2F4YArwYr6(txb:dW@gw2.' );
define( 'SECURE_AUTH_KEY',  ':`Z7}UP`:4v(@%L2W>!tp4MeQbXS*YGHnhY:h^cf^DOVm-2}xr%fJei(h?KwkS-_' );
define( 'LOGGED_IN_KEY',    'Wi+F&]QeuYT0|vpaR,xG0C8m?Q@f7e_FAj%3s59jYB8ZxG-(9z(0` axI5^%/}`m' );
define( 'NONCE_KEY',        'X@ed%yoTsgP0|kA=y[q?Q*1)4GaVw*o@6o}&sSBpuIn},${[zA8{M/XFk;Rv eG@' );
define( 'AUTH_SALT',        '?RQw`dt*QIh{j%|K,@,#nDc[e|}G!I=Y-Y-!fuHula8$]+@Vo3YAJas>d;uS1R-/' );
define( 'SECURE_AUTH_SALT', '}bK88=@@KWPpT%1X eGBX,uGo8k#2,6e)R)DFw_s*ivq1GCwC[:c$a2R==5s*,aE' );
define( 'LOGGED_IN_SALT',   'l|!1U_l9}:q t8gd <-B)E+.oP5SLZ_ctTGMu]<hqL^Io.iQV5o.m,bxhbZ%Dlg ' );
define( 'NONCE_SALT',       'hFgaDmBb]2DEB;nIAcY{H]4Is# ur%5XR.=^`gsd=g}/*O?Ox`+#l=y7}Ra8De&A' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
