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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'zebrasolutions' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'lG^KGp=FY<&qdYQLFH;y4;Xg5?%/0p6VvZUxL^_nCN?Rg|aM9Z6nq=F{r[ZUzL5L' );
define( 'SECURE_AUTH_KEY',  'nya#7w>#*#1grI4>drGJX|P/,T1O0M]03B[nBqL[nP!pF*b)x_VjXWD4CM7_5yAz' );
define( 'LOGGED_IN_KEY',    'Zm3]hS|fgfJw--7->XPhU7?UW7GhvvyrUC03dF/sF$wi$Zb E8Qob}Ds?cTuhiu!' );
define( 'NONCE_KEY',        'yDcO^|[*r6t.P676aEabS^M5>B-@Mg~JA< RJ AqWct!t)O$VLNg=]L&Ps8b !HV' );
define( 'AUTH_SALT',        '4(XiOin0e{LXwwE[JGoB!71)f*4d;f i)58rt3t4{AjtK`:a2n8Y*uT|oWX.Y_lL' );
define( 'SECURE_AUTH_SALT', 'er1$UHTA,^[WoUR%^Ej,>D,|O2Vi%NKK-Xk)TzcUu8Reu#w#G*UWisUGOR&Vx:QV' );
define( 'LOGGED_IN_SALT',   'H-U(9Ou#Oh98Xei8mF_3eX*(JAbPxgH{y_-T)Ac*!@NhPTezL/tdRP5gWS>4>:Hw' );
define( 'NONCE_SALT',       'H&WDbt:f7qPpI#D!&n+yo$.|xm3aisdDydj]Te*<(J&HB-#}&-R(LzSJ#zPLZyUh' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
