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
define( 'DB_NAME', 'ndla_landingpages' );

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
define( 'AUTH_KEY',         'ADA<6jEJ/L|B_%`!O=+8AJ-.hpA<A&Wz%L0QC{:yG}]C<~/l:M8bO.~(AMehC 4*' );
define( 'SECURE_AUTH_KEY',  '1U(/`7iu>JSb)(VP16u~:P7,F>LT1Pf -_5R(l<j;<Ujnu?AY)yNiGT8> <m[ur/' );
define( 'LOGGED_IN_KEY',    'dG^W4*Wzigv)yM=d$ViV3+rlh1I%U:4@y.BJ_ic<;~ffx^=Y92iweP|`&.W)wGRH' );
define( 'NONCE_KEY',        'O,rz6sD:TS34^-cAPb/PSy(mS#w.z)K$Ow4+3!n;pDV}#PoOU$T#CnywBwmK2&^.' );
define( 'AUTH_SALT',        '29gCT6~|/wu?0i}82q-xXiM?ufVxC75HzZ4Ndy%2w[yqh^<MIuX/jq=hj L_cqS3' );
define( 'SECURE_AUTH_SALT', 'FkWXV0Zc$z6rB=nF,f=:/Tcduf<BaLrS^+{}<O&XP; D<o @oYMM*Ao]!x>Srh=i' );
define( 'LOGGED_IN_SALT',   ';g3*gwt:gLI*)uUQ&ZL&d]i?,[fxZWzibJ (NA?hfq#E -m54BLl5}F}Yo@4X},T' );
define( 'NONCE_SALT',       '?PN81Ug-smY19!i-8;WpNh%&DJ7u`jP@_?wOCx8gRI5?r+8Q4zh?Gn>0sY]K^&Qj' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

set_time_limit(300);
