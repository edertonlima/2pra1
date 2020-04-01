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
define( 'DB_NAME', 'edertton_2pra1' );

/** MySQL database username */
define( 'DB_USER', 'edertton_admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'FsoR8e6YHfO9' );

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
define( 'AUTH_KEY',         '4|e(9|`@>e|aPPI$f5w@(q:ek}..t|H3-T[f3rpjy{m/}<vXP9Sk[[yIgrx;HmEp' );
define( 'SECURE_AUTH_KEY',  'n!$&s_RKQA01T5I9VYj.3H0[D&WcbISkr49rLc$JOEcxW*fHkA4|8ZENeBZv|e5?' );
define( 'LOGGED_IN_KEY',    'AaAtNa<3b60fVSXl:oQhe6_[kts^>>P&(V;o@TvFERc.M5vR! qq@@.5|D+bX}d&' );
define( 'NONCE_KEY',        '9^28/XEhgxW~,0P416$#S#DEhnO~+$/|]{v|@21ZIo1F=C$[;ojSZAezg#bb@<T~' );
define( 'AUTH_SALT',        'f^SA.dniDtOOiFs^B|t%Qwb%>dk9w5y#SB!&!EBPPn:0rmXaE0*LT6:>kFz>i3FY' );
define( 'SECURE_AUTH_SALT', 'ho,:_ u_7Vp~n,Q;;6YgXDo}@qUrIw``?amoEy/@;V_ZmQ 7r^@sXr3*uFDeyL-c' );
define( 'LOGGED_IN_SALT',   'm`SwF&]8K6|)&Rw?T]o^X>qhZTb$l>nu98>/uCTNwpf5^]vDrz!QrS[L(-hRy-6O' );
define( 'NONCE_SALT',       '4:]<H0faEL9Dw, aqF&MFzJBIeMd$=.a]-eznkS<#$nT0Q^csAod7TcZv#FEeh ?' );

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
