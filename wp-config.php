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
define( 'DB_NAME', 'practica_wp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'CLv4_4/4t4avi-y{>3O9=V5I$x{/Qh%>AOQvPVG+bJBheCxswTT!nDLwvn`X_o~?' );
define( 'SECURE_AUTH_KEY',  '0gW %JlHOcH?}oUAFBOm]0yhQBLdwGF8`rIsHcyn;R:4)utl+MezqGv2^?,xPFF~' );
define( 'LOGGED_IN_KEY',    'knM]t< _F`rEdVFjx+q%6R.mQ)P{Mg~IuU#^ut.dK8{$Ufy`~m%-aGaQ-ZJj7W]%' );
define( 'NONCE_KEY',        '(M]#h0q^oDKa&j4T7va(3>Lx @b)ImQaetHu>&sUoqE?_|[M:>%z^$rcwvHMy61e' );
define( 'AUTH_SALT',        'k4a%WpLEA8iqhjBh^DVp{}a##U&s8?[+]`FpStHA4mell`M=9dR0Dk4/Xs|SH=!S' );
define( 'SECURE_AUTH_SALT', 'sv<!Wh]>us^wVBLcr}H|3ih3?)1AQ {qbnj;?n4DmvX[J_O3P_[CBD@rMHaD_N|O' );
define( 'LOGGED_IN_SALT',   '}QehG6!#d|x~OlsLQ%#q3745;3r|L4UF8.*yauNCI0,iWiY{Y+vx@IB!]C0=qU]7' );
define( 'NONCE_SALT',       'byCceh ,/Hor6aS]l;ewOzlr.364h4b}qB@,SL4lcU*zPE(-cYJvR(K,VH!rUL9R' );

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
