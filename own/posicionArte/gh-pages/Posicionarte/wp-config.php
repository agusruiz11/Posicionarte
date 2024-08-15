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
define( 'AUTH_KEY',          'j<u(y3@$M(kkX*w-^!eI?!Bcbp*Josl,+,$VM 9e{ U82Y$AX!t/tR@%E*e=uoXL' );
define( 'SECURE_AUTH_KEY',   'h: UMbFw1&SyyMHZ~%zEViGag,#XN|^|)9o0Kbq|)2+3GTH7iV(P0vy-3Jq*?2-h' );
define( 'LOGGED_IN_KEY',     '5&EDF~[1j_]1D {,y2>5?wAI_MM;j+.$f:I#78I= ;J}+C}itP+=*f:knpT%*~(>' );
define( 'NONCE_KEY',         'mnm[shAL;&riGv5o!nBFc8$?>SfO(w3R-qtgp2*T4M1]vCfmZn`<^d(#SHwp7& H' );
define( 'AUTH_SALT',         'h_(f2?Z>[n.OkT~zL4]E-81k6GcH2bB}Xn1O1.#`Z;kkmH):kfRziGCCT53YGN#X' );
define( 'SECURE_AUTH_SALT',  ',?6+o~yi559Y2P(==@)f5#Zu-H%16J*%`Zjg_dJLTBGtIfChy~49b>x!P^_Fh<A`' );
define( 'LOGGED_IN_SALT',    'T7!]U@g<x;pGe{hz$7,<u$oi+2x)e4(5MIt.^(YTa:N*}m(Z40z2($oR0gqS,&Ru' );
define( 'NONCE_SALT',        'N #8as|~)T)gsv>zE:? wdo6 Rv0OYnF8{^|u3b(XDP4VUF/*i#W1Vr]5{xy8d6:' );
define( 'WP_CACHE_KEY_SALT', '$17|A}J<vM6+`szXJf0@m74wKL]FLf,~lVlu=nWBaOmp9G<ikg*Q|/B,R;]dTL0w' );


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
