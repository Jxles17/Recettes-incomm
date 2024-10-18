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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'yJi-Bf!2^waAXLUQ9r1tZZF[LGQo0>OK3a_YS_[iBo$kamCI7t_MnD5w6u~<d`^}' );
define( 'SECURE_AUTH_KEY',   '+^e}Od{LgCckmZiE%CN%evM_+|zio!l#nEn$IUYBzdBz:rOmVi/D^PnHMDNWC&x-' );
define( 'LOGGED_IN_KEY',     '_7}O/U]7[A;M.58]x(8_gbRu[k4k;z#~XfZx0|g5^N@Iw:syV1K:$QmP+iV9~N=q' );
define( 'NONCE_KEY',         'DpwsVdluia IkDY.XeOLcC)XdaaE5rLt3AM&MbfPf$GCLfO]1Y(T/z.``6GkxQzW' );
define( 'AUTH_SALT',         '()=/[YP}5BAIqe). j!cp7@Qws7Ha[g0imUfOu^)CX|+0^iI.q.kK%5a$vr16o|_' );
define( 'SECURE_AUTH_SALT',  '<#%jak~_UbU4~Sw8Zlr{p)&bF ML(-v{anC5q;`?~|AR2Xj}F~cWY= Ys*5^O:0(' );
define( 'LOGGED_IN_SALT',    '0Vx30wnv:K(Rw$Xkdk<hl?;<A.JwE|&;,^1Nq+7B}haUrfV&]mq<o.dTRCaKe:X]' );
define( 'NONCE_SALT',        'C)<d-/_OM:P>dMz.l?^c]{~ja4JJMPt5JyK4hc@IIbf2DB5p]O|bl5CUsy&tM{RK' );
define( 'WP_CACHE_KEY_SALT', '-#U}/CrUT}!Ohz3pjDj!WO2Hl`!RV1*!gDgH,#17;lXRNNOGO2*tiKUu(]gaXu_U' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
